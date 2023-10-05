<?php
session_start();
include('../../config.php');

$film_id=$_GET['film_id'];
mysqli_query($con,"DELETE FROM filma WHERE film_id='$film_id'");
 $_SESSION['success']="Filmi u fshi";
header("location:view_movie.php");
?>