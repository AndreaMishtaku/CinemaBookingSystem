<?php
include('../../config.php');
session_start();
if(isset($_POST['identifikohu'])){
	$email = $_POST["email"];
	$pass = $_POST["password"];
	$q=mysqli_query($con,"select * from identifikimi where email='$email' and password='$pass'");
	if(mysqli_num_rows($q)==1){
		$a=mysqli_fetch_array($q);
		if($a['tipi_perdorues']==0){
			$_SESSION['admin_id']=$a['perdorues_id'];
			header('location:./index.php');
		}else{
		$_SESSION['error']="Identifikimi si administrator deshtoi!";
		header("location:../index.php");
		}
	}else{
	$_SESSION['error']="Identifikimi deshtoi!";
	header("location:../index.php");
	}
}
?>