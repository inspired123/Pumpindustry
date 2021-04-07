<?php
namespace cms\news\helpers;

use cms\news\Models\NewsFromResourceModel;

use DOMDocument;
use DomXPath;
use Log;

class NewsBot {
	private $newsArray;

	public function __construct() {
		$this->newsArray = [];
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
			$url = "https://www.worldpumps.com/";
			$d = file_get_contents($url);
			$doc = new DOMDocument();
			@$doc->loadHTML($d);

			$finder = new DomXPath($doc);
			$classname="articleSnippet";
			$nodes = $finder->query("//*[contains(@class, '$classname')]");

			// $today = date('Y/m/d');

			foreach ($nodes as $key => $news) {
				$itemType = $news->getAttribute('itemtype');
				$div = $this->getElementsByClass($news, 'div','newsDesc')[0];//$news->getElementsByTagName('div')->item(0);
				$a = $div->getElementsByTagName('a')->item(0);
				if($div && $a) {
					$title = $a->getElementsByTagName('span')->item(0)->nodeValue;
					$desc = $div->getElementsByTagName('p')->item(0);
					$img = $news->getElementsByTagName('img')->item(0);
					// $meta = $news->getElementsByTagName('meta')->item(0);

					// if($meta) {
					// 	$date = $meta->getAttribute('content')
					// } else {
					// 	$date = $today;
					// }

					if($img) {
						$img = $img->getAttribute('src');
					} else {
						$img = skin().'/images/news-placeholder.jpg';
					}

					if($title && $a && $desc) {
						if($itemType == 'http://schema.org/NewsArticle') {
							// if(strlen($img->getAttribute('src')) < 1000) {
								$data = [
									'title' => preg_replace('/\s+/', ' ', trim($title)),
									'url' => str_replace(":443", "",$a->getAttribute('href')),
									'image' => $img,
									// 'date' => $today,
									'short_content' => preg_replace('/\s+/', ' ', trim($desc->nodeValue)),
									'source' => 'worldpumps.com'
								];

								$this->newsArray[] = $data;
							// }
						}
					}
				}
								
			}
			

		} catch(\Exception $e) {
			Log::info('Error in worldpumps at '.$e->getLine().' '. $e->getMessage());
		}
	}

	/**
	 * empoweringpumps.com
	 */
	public function empoweringpumps()
	{
		try {
			$url = "https://empoweringpumps.com/blog/category/news/";
			$d = file_get_contents($url);
			$doc = new DOMDocument();
			@$doc->loadHTML($d);

			$finder = new DomXPath($doc);
			$classname="article-single";
			$nodes = $finder->query("//*[contains(@class, '$classname')]");

			foreach ($nodes as $key => $news) {
				$div = $this->getElementsByClass($news, 'div','inner');
				$a = $news->getElementsByTagName('a')->item(0);
				
				if($a) {
					$title = $news->getElementsByTagName('h1')->item(0)->nodeValue;

					if($div && isset($div[0]) && $div[0]->getElementsByTagName('p')->item(0)) {
						$desc = $div[0]->getElementsByTagName('p')->item(0)->nodeValue;
					} else {
						$desc = '-';
					}
					$img = $news->getElementsByTagName('img')->item(0);
					$sponsored = $this->getElementsByClass($news, 'div','sponsored');

					if($img) {
						$img = $img->getAttribute('src');
					} else {
						$img = skin().'/images/news-placeholder.jpg';
					}

					if($title && $a && $desc && count($sponsored) == 0) {
						$data = [
							'title' => preg_replace('/\s+/', ' ', trim($title)),
							'url' => $a->getAttribute('href'),
							'image' => $img,
							// 'date' => $today,
							'short_content' => preg_replace('/\s+/', ' ', trim($desc)),
							'source' => 'empoweringpumps.com'
						];

						$this->newsArray[] = $data;
							
					}
				}
								
			}
			

		} catch(\Exception $e) {
			Log::info('Error in empoweringpumps at '.$e->getLine().' '. $e->getMessage());
		}
	}

	public function impellerHomePage() {
		try {
			$url = "https://impeller.net/";
			$d = file_get_contents($url);
			$doc = new DOMDocument();
			@$doc->loadHTML($d);

			$finder = new DomXPath($doc);
			$classname="post";
			$nodes = $finder->query("//*[contains(@class, '$classname')]");

			foreach ($nodes as $key => $news) {
				$a = $news->getElementsByTagName('a')->item(0);
				// echo 'k1'.$key.'/n';
				
				if($a) {
					$title = $news->getElementsByTagName('h3')->item(0);

					if($news->getElementsByTagName('p')->item(0)) {
						$desc = $news->getElementsByTagName('p')->item(0)->nodeValue;
					} else {
						$desc = '-';
					}
					$img = skin().'/images/news-placeholder.jpg';

					if($title && isset($title->nodeValue) && $a && $desc) {
						$data = [
							'title' => preg_replace('/\s+/', ' ', trim($title->nodeValue)),
							'url' => $a->getAttribute('href'),
							'image' => $img,
							// 'date' => $today,
							'short_content' => preg_replace('/\s+/', ' ', trim($desc)),
							'source' => 'impeller.net'
						];

						$this->newsArray[] = $data;
							
					}
				}
								
			}
		} catch(\Exception $e) {
			Log::info('Error in impeller at '.$e->getLine().' '.$e->getMessage());
		}
	}

	public function impellerNewsByCategory($category) {
		try {
			$url = "https://impeller.net/$category";
			$d = file_get_contents($url);
			$doc = new DOMDocument();
			@$doc->loadHTML($d);

			$finder = new DomXPath($doc);
			$classname="post row";
			$nodes = $finder->query("//*[contains(@class, '$classname')]");

			foreach ($nodes as $key => $news) {
				$h3 = $news->getElementsByTagName('h3')->item(0);
				$img = $news->getElementsByTagName('img')->item(0);
				
				if($h3) {
					$a = $h3->getElementsByTagName('a')->item(0);
					$title = $a->nodeValue;

					if($news->getElementsByTagName('p')->item(0)) {
						$desc = $news->getElementsByTagName('p')->item(0)->nodeValue;
					} else {
						$desc = '-';
					}
					if($img) {
						$img = $img->getAttribute('src');
					} else {
						$img = skin().'/images/news-placeholder.jpg';
					}

					if($title && $a && $desc) {
						$data = [
							'title' => preg_replace('/\s+/', ' ', trim($title)),
							'url' => $a->getAttribute('href'),
							'image' => $img,
							// 'date' => $today,
							'short_content' => preg_replace('/\s+/', ' ', trim($desc)),
							'source' => 'impeller.com'
						];

						$this->newsArray[] = $data;
							
					}
				}
								
			}
		} catch(\Exception $e) {
			Log::info('Error '. $e->getMessage());
		}
	}

	public function getNewsFromResource($isBot = false) {
		if($isBot == true) {
			$this->worldpumps();
			$this->empoweringpumps();
			$this->impellerHomePage();
			$this->impellerNewsByCategory('magazin_category/technical-news/');
			$this->impellerNewsByCategory('magazin_category/corporate-news/');
			$this->impellerNewsByCategory('magazin_category/internet-software-2/');
			$this->impellerNewsByCategory('magazin_category/books-papers/');
			$this->impellerNewsByCategory('magazin_category/contracts-case-stories/');
			$this->impellerNewsByCategory('magazin_category/miscellaneous/');
		}

		// $this->save();
		
	}

	public function getNews() {
		return $this->newsArray;
	}


	public function save() {
		foreach ($this->newsArray as $key => $news) {
			$old = NewsFromResourceModel::where('title',$news['title'])->first();
			if($old == null) {
				$obj = new NewsFromResourceModel;
				$obj->title = $news['title'];
				$obj->short_content = substr($news['short_content'],0, 500);
				$obj->url = $news['url'];
				$obj->image = $news['image'];
				$obj->source = $news['source'];
				$obj->status = 0;
				$obj->save();
			}
		}
	}
}