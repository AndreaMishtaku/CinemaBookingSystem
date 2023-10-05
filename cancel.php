<?php
session_start();
include('config.php');
mysqli_query($con,"delete from rezervimet where rezervimi_id='".$_GET['id']."'");
$_SESSION['success']="Rezervimi u anullua!!!";
header('location:profile.php');
?>