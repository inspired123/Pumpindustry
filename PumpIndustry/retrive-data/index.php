<?php include "../header.php" ?>
<?php
$url='localhost';
$username='travelsa_PumpIndustry';
$password='Inspired@123';
$conn=mysqli_connect($url,$username,$password,"travelsa_PumpIndustry");
$result = mysqli_query($conn,"SELECT * FROM PumpNews");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>

<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 <style>
	 
	 table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%; 
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: white;
}
	 </style>
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<div class="container">
  <table>
  
  <tr>
   <td>id</td>
    <td>Category</td>
    <td>Link</td>
    <td>Title</td>
    <td>Date</td>
     <td>Connent</td>
      <td>ImageDtls</td>
       <td>ImageLink</td>
        <td>Source</td>
  </tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>

<tr>
	 <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["Category"]; ?></td>
    <td><?php echo $row["Link"]; ?></td>
    <td><?php echo $row["Title"]; ?></td>
    <td><?php echo $row["Date"]; ?></td>
    <td><?php echo $row["Connent"]; ?></td>
    <td><?php echo $row["ImageDtls"]; ?></td>
    <td><?php echo $row["ImageLink"]; ?></td>
     <td><?php echo $row["Source"]; ?></td>
</tr>

<?php
$i++;
}
?>
</table>
</div>
 <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
 <?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>
<?php include "../footer.php" ?>