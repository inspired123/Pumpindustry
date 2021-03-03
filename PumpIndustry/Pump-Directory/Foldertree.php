<?php
	/*
		Creating a folder wise tree view structure with jquery php.
		
		P. Thirumani Raj
		http://www.hackandphp.com
		
	*/
	
	class treeview {
		
		private $files;
		private $folder;
		
		function __construct( $path ) {
			
			$files = array();	
			
			if( file_exists( $path)) {
				if( $path[ strlen( $path ) - 1 ] ==  '/' )
				$this->folder = $path;
				else
				$this->folder = $path . '/';
				
				$this->dir = opendir( $path );
				while(( $file = readdir( $this->dir ) ) != false )
				$this->files[] = $file;
				closedir( $this->dir );
			}
		}
		
		function create_tree( ) {
			
			if( count( $this->files ) > 2 ) { /* First 2 entries are . and ..  -skip them */
				natcasesort( $this->files );
				$list = '<ul class="filetree" style="display: none;">';
				// Group folders first
				foreach( $this->files as $file ) {
					if( file_exists( $this->folder . $file ) && $file != '.' && $file != '..' && is_dir( $this->folder . $file )) {
						$list .= '<li class="collapsed">
						<div class="row">
						<div class="folder col-sm-12"><a href="#" class="cli" rel="' . htmlentities( $this->folder . $file ) . '/">' . htmlentities( $file ) . '</a>
						</div>
						</div/</li>';
					}
				}
				// Group all files
				foreach( $this->files as $file ) {
					if( file_exists( $this->folder . $file ) && $file != '.' && $file != '..' && !is_dir( $this->folder . $file )) {
						$ext = preg_replace('/^.*\./', '', $file);
						$list .= '<li><div class="row">
						<div class="col-sm-1">
						<img src="css/images/filetypes/big/file_extension_'.$ext.'.png">
						</div>
						<div class="col-sm-11"><a href="' . htmlentities( $this->folder . $file ) . '" rel="' . htmlentities( $this->folder . $file ) . '">' . htmlentities( $file ) . '</a>
						</div>
						</div>
						</li>';
					}
				}
				$list .= '</ul>';	
				return $list;
			}
		}
	}
	
	$path = urldecode( $_REQUEST['dir'] );
	$tree = new treeview( $path );
	echo $tree->create_tree();
	
?>