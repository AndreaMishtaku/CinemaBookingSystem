<?php
session_start();
include('../../config.php');
extract($_GET);
mysqli_query($con,"delete from shfaqja  where shfaqja_id='$shfaqja_id'");
$_SESSION['success']="Shfaqja u fshi!!!";
header('location:view_shows.php');?>