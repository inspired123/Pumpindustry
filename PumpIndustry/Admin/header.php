<?php

session_start();
$email_address= !empty($_SESSION['email'])?$_SESSION['email']:'';
if(!empty($email_address))
{
  header("location:dashboard.php");
}

include('config/database.php');
include('scripts/admin-login.php');
?>