<?php
namespace cms\events\helpers;

use cms\news\Models\NewsFromResourceModel;

use DOMDocument;
use DomXPath;
use Log;

class EventsBot {
	private $eventsArray;

	public function __construct() {
		$this->eventsArray = [];
	}


	private function getElementsByClass(&$parentNode, $tagName, $className) {
	    $nodes=array();

	    $childNodeList = $parentNode->getElementsByTagName($tagName);

	    for ($i = 0; $i < $childNodeList->length; $i++) {
	        $temp = $childNodeList->item($i);
	        if (stripos($temp->getAttribute('class'), $className) !== false) {
	            $nodes[]=$temp;
	        }
	    }

	    return $nodes;
	}

	/**
	 * worldpumps.com
	 */
	public function worldpumps()
	{
		try {
			$url = "https://www.worldpumps.com/events/";
			$d = file_get_contents($url);
			$doc = new DOMDocument();
			@$doc->loadHTML($d);

			$finder = new DomXPath($doc);
			$classname="articleSnippet";
			$nodes = $finder->query("//*[contains(@class, '$classname')]");


			// $today = date('Y/m/d');

			foreach ($nodes as $key => $news) {
				$itemType = $news->getAttribute('itemtype');
				$div = $this->getElementsByClass($news, 'div','newsDesc');//$news->getElementsByTagName('div')->item(0);
				$a = $news->getElementsByTagName('a')->item(0);
				
				if($a) {
					$title = $a->getElementsByTagName('span')->item(0)->nodeValue;
					if($div && isset($div[0]) && $div[0]->getElementsByTagName('p')->item(0)) {
						$desc = $div[0]->getElementsByTagName('p')->item(0)->nodeValue;
					} else {
						$desc = '-';
					}
					// $img = $news->getElementsByTagName('img')->item(0);
					$startDate = $news->getElementsByTagName('meta')->item(0);
					$endDate = $news->getElementsByTagName('meta')->item(1);
                    $location = $this->getElementsByClass($news, 'span','articleAuthors');

					if($location && isset($location[0])) {
						$location = $location[0]->nodeValue;
					}

					if($startDate) {
						$startDate = $startDate->getAttribute('content');
					}
                    if($endDate) {
						$endDate = $endDate->getAttribute('content');
					}

					// if($img) {
					// 	$img = $img->getAttribute('src');
					// } else {
					// 	$img = skin().'images/news-placeholder.jpg';
					// }

					if($title && $a && $desc && $startDate) {
						if($itemType == 'http://schema.org/Event') {
							// if(strlen($img->getAttribute('src')) < 1000) {
								$day_count = 1;
								if($endDate) {
									$d1 = date_create($endDate);
									$d2 = date_create($startDate);
									$day_count = date_diff($d2, $d1)->d;
									if($day_count == 0) {
										$day_count = 1;
									}
								} else {
									$endDate = $startDate;
								}
								$data = [
									'title' => preg_replace('/\s+/', ' ', trim($title)),
									'url' => str_replace(":443", "",$a->getAttribute('href')),
                                    'location' => $location ?? '-',
									'event_date' => date_format(date_create($startDate),"Y-m-d"),
									'event_end_date' => date_format(date_create($endDate),"Y-m-d"),
									'day_count' => $day_count,
									'short_content' => preg_replace('/\s+/', ' ', trim($desc)),
									'source' => 'worldpumps.com'
								];

								$this->eventsArray[] = $data;
							// }
						}
					}
				}
								
			}
			

		} catch(\Exception $e) {
			Log::info('Error '. $e->getMessage());
		}
	}

	public function impeller() {
		try {
			$url = "https://impeller.net/events";
			$d = file_get_contents($url);
			$doc = new DOMDocument();
			@$doc->loadHTML($d);

			$finder = new DomXPath($doc);
			$classname="tribe-events-list";
			$nodes = $finder->query("//*[contains(@class, '$classname')]")[0];
			$node = $this->getElementsByClass($nodes, 'div','tribe-events-loop');

			$activeYear = date('Y');

			foreach ($node[0]->childNodes as $key => $element) {

				if($element->tagName == 'h2') {
					$span = $element->getElementsByTagName('span')->item(0);
					if($span) {
						$arr = explode(" ", $span->nodeValue);
						if(isset($att[1])) {
							$activeYear = $att[1];
						}
					}
				} elseif ($element->tagName == 'div') {
					$a = $element->getElementsByTagName('a')->item(0);
					$span = $element->getElementsByTagName('span');
					$startDate = $span->item(0)->nodeValue. " $activeYear";
					$endDate = $span->item(1)->nodeValue. " $activeYear";
					$location = '-';
					if($span->item(2)) {
						$location = $span->item(2)->nodeValue;
					}
					if($a) {
						$title = $a->nodeValue;

						$day_count = 1;
						if($endDate) {
							$d1 = date_create($endDate);
							$d2 = date_create($startDate);
							$day_count = date_diff($d2, $d1)->d;
							if($day_count == 0) {
								$day_count = 1;
							}
						} else {
							$endDate = $startDate;
						}

						$data = [
							'title' => preg_replace('/\s+/', ' ', trim($title)),
							'url' => $a->getAttribute('href'),
							'location' => $location ?? '-',
							'event_date' => date_format(date_create($startDate),"Y-m-d"),
							'event_end_date' => date_format(date_create($endDate),"Y-m-d"),
							'day_count' => $day_count,
							'short_content' => preg_replace('/\s+/', ' ', trim('-')),
							'source' => 'impeller.net'
						];

						$this->eventsArray[] = $data;
					}
				}
			}
		} catch(\Exception $e) {
			Log::info('Error in impeller at '.$e->getLine().' '.$e->getMessage());
		}
	}

	public function getEventsFromResource($isBot = false) {
		if($isBot == true) {
			$this->worldpumps();
			// $this->impeller();
		}

		// $this->save();
		
	}

	public function getEvents() {
		return $this->eventsArray;
	}


	public function save() {
		foreach ($this->eventsArray as $key => $news) {
			$old = NewsFromResourceModel::where('title',$news['title'])->first();
			if($old == null) {
				$obj = new NewsFromResourceModel;
				$obj->title = $news['title'];
				$obj->short_content = substr($news['short_content'],0, 500);
				$obj->url = $news['url'];
				$obj->location = $news['location'];
				// $obj->image = $news['image'];
				$obj->source = $news['source'];
				$obj->status = 0;
				$obj->save();
			}
		}
	}
}