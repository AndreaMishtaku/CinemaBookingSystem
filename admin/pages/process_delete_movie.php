<?php
session_start();
include('../../config.php');

$mid=$_GET['mid'];
mysqli_query($con,"delete  from filma where film_id='$mid'");
 $_SESSION['success']="Filmi u fshi me sukses";
header("location:index.php");
?>