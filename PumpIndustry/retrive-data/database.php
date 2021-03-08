<?php
$url='localhost';
$username='travelsa_PumpIndustry';
$password='Inspired@123';
$conn=mysqli_connect($url,$username,$password,"travelsa_PumpIndustry");
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>