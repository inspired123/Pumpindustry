<? include "../header.php" ?>
	<head>
		<title>Folder wise Tree structure with PHP and jQuery</title>
		<link rel="stylesheet" href="css/filetree.css" type="text/css" >
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>		
		<script type="text/javascript" >
			$(document).ready( function() {
			
				$( '#container' ).html( '<ul class="filetree start"><li class="wait">' + 'Generating Tree...' + '<li></ul>' );
				
				getfilelist( $('#container') , 'Sample' );
				
				function getfilelist( cont, root ) {
					
					$( cont ).addClass( 'wait' );
					
					$.post( 'https://caasaservice.com/PumpIndustry/Pump-Directory/Foldertree.php', { dir: root }, function( data ) {
						
						$( cont ).find( '.start' ).html( '' );
						$( cont ).removeClass( 'wait' ).append( data );
						if( 'Sample' == root ) 
						$( cont ).find('UL:hidden').show();
						else 
						$( cont ).find('UL:hidden').slideDown({ duration: 500, easing: null });
						
					});
				}
				
				$( '#container' ).on('click', '.cli', function() {
					var entry = $(this).parent();
					
					if( entry.hasClass('folder') ) {
						if( entry.hasClass('collapsed') ) {
							
							entry.find('UL').remove();
							getfilelist( entry, escape( $(this).attr('rel') ));
							entry.removeClass('collapsed').addClass('expanded');
						}
						else {
							
							entry.find('UL').slideUp({ duration: 500, easing: null });
							entry.removeClass('expanded').addClass('collapsed');
						}
						} else {
						$( '#selected_file' ).text( "File:  " + $(this).attr( 'rel' ));
					}
					return false;
				});
				
			});
		</script>
		<style type="text/css">
			
			.fixed-panel {
			min-height: 10;
			max-height: 10;
		
			}
			.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
}
.panel-primary {
    border-color: #337ab7;
}

.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.panel-primary>.panel-heading {
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

		</style>
	</head>
	<body>
		
		
		<div id="pgtitle">
			
		</div>
		<div class="container" style="padding: 11rem 7px 0 7px;">
			<div class="row">
				<div class="col-sm-offset-3 col-sm-6">
					<div class="panel panel-primary" style="border-color: #337ab7;">
						<div class="panel-heading">
							<h3 class="panel-title">Folder wise tree view structure with jquery </h3>
						</div>
						<div class="panel-body fixed-panel">
							<div id="container">
							</div>
							<div id="selected_file"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		
	</body>

<? include "../footer.php" ?>