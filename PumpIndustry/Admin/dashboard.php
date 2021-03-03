<?php
session_start();

  $email_address= !empty($_SESSION['email'])?$_SESSION['email']:'';
if(!empty($email_address))
{
      ?>
      
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--custom style-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
		
</head>
<body>
<?php include('partials/header.php');
 ?>
 <div id="confirmBox">
  <p>Are You Sure to Delete ?</p>
  <button value="1" >Yes</button><button value="0">No</button>
 </div>
<div id="alertBox">mhvmbvbm</div>
<div class="container-fluid">
  <div class="row">
      <div class="col-sm-2">
 <?php include('partials/sidebar.php'); ?>
      </div>
      <div class="col-sm-10">
        <div id="dynamic-page">
          <!--dynamic page content-->
          <?php
    
  
        
        if(!empty($cat) && !empty($subcat)){
          
            
            $sub=explode('-', $subcat);
if($sub[0]=='add')
{
           $val=[];
          foreach ($sub as $key => $value) {
            if($value==$sub[0])
            {
             continue;
            }
            $val[]=$value;
            
         }
        
      include($cat."/".implode('-',$val).".php");   
 }else{
  include($cat."/".$subcat.".php");
 }
 
        }else{
            echo "<h1 class='text-success text-center'>Welcome To Admin Panel</h1>";
        }

         ?> 
          <!-- dynamic page content-->
        </div>
    <!------>
    	<div class="container">
    		<br />
    		<h3 align="center">hello <?php echo $_SESSION['email'];?></h3>
    		<br />
    		<div class="table-responsive">
    			<span id="message"></span>
          <form method="post" id="load_excel_form" enctype="multipart/form-data">
            <table class="table">
              <tr>
                <td width="25%" align="right">Select Excel File</td>
                <td width="50%"><input type="file" name="import_excel" /></td>
                <td width="25%"><input type="submit" name="load" class="btn btn-primary" /></td>
              </tr>
            </table>
          </form>
	    		<br />
          <div id="excel_area"></div>
    		</div>
    	</div>
    	
		<div class="container">	<h3>No of Rows - <span style="color:red;"><?php echo $row_count;?></span></h3>
			<br />
		
			<br />
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-lg-9">Sample Data</div>
						<div class="col-lg-3">
							<select name="column_name" id="column_name" class="form-control selectpicker" multiple>
						      	<option value="1">Category</option>
						      	<option value="2">Link</option>
						      	<option value="3">Title</option>
						      	<option value="4">Date</option>
						      	<option value="5">Connent</option>
						      	<option value="6">ImageDtls</option>
						      	<option value="7">ImageLink</option>
						      	<option value="8">Source</option>
						      						
							</select>
						</div>
					</div>
				</div>
			
				<div class="card-body">
					<div class="table-responsive">
						<table id="sample_data" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Category</th>
									<th>Link</th>
									<th>Title</th>
									<th>Date</th>
									<th>Connent</th>
									<th>ImageDtls</th>
									<th>ImageLink</th>
									<th>Source</th>
														
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
		
		
    <!------->
    
    
    
    
    
    
    
    
    
    
    
      </div>
  </div>
  </div>
  
  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script type="text/javascript" src="scripts/ajax-script.js">
  
  
  
  
  
  
  
  
</script>
<script type="text/javascript">
  var acontent = document.querySelectorAll('.accordion-content');
var atitle = document.querySelectorAll('.accordion-content .title');
for (i = 0; i < atitle.length; i++) {
        
    atitle[i].onclick=function(){
        
        var contentClass = this.parentNode.className;
        
        for (i = 0; i < acontent.length; i++) {
            acontent[i].className = 'accordion-content hide';
         }
        
        if (contentClass == 'accordion-content hide') {
            this.parentNode.className = 'accordion-content show';
        }
   }
}
</script>

<script>
// Add the following code if you want the name of the file appear on select
$(document).on("change", ".custom-file-input", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script
    type="text/javascript"
    src='https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js'
    referrerpolicy="origin">
  </script>
  <script type="text/javascript">

  tinymce.init({
    selector: 'textarea',
    height: 300,
    plugins: [
      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'table emoticons template paste help'
    ],
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
      'bullist numlist outdent indent | link image | print preview media fullpage | ' +
      'forecolor backcolor emoticons | help',
    menu: {
      favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | spellchecker | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table help',
    content_css: 'css/content.css'
  });


  $(document).ready(function(){
   
    $('body').find('.tox-notifications-container').hide();
  })
  </script>
  
  
  <script type="text/javascript" language="javascript">

$(document).ready(function(){
	
	var dataTable = $('#sample_data').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"https://caasaservice.com/PumpIndustry/Admin/ex/fetch.php",
			type:"POST"
		}
	});
	
	
		
  $('#load_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"https://caasaservice.com/PumpIndustry/Admin/ex/import.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data)
      {
      }
    })
  });
  

	
	$('#column_name').selectpicker();

	$('#column_name').change(function(){

		var all_column = ["0", "1", "2", "3", "4", "5", "6", "7", "8"];

		var remove_column = $('#column_name').val();

		var remaining_column = all_column.filter(function(obj) { return remove_column.indexOf(obj) == -1; });

		dataTable.columns(remove_column).visible(false);

		dataTable.columns(remaining_column).visible(true);

	});

});	
</script>
 
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script> 
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  
  
  
</body>
</html>
      <?php

}else{
          echo '<script>window.location.href="index.php"</script>';

}
exit;
   unset($_SESSION['email']);
   session_destroy();
header('location:index.php');
?>