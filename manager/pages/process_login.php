<?php
include('../../config.php');
session_start();
$email = $_POST["email"];
$pass = $_POST["password"];
$menaxher_id=$_POST["menaxher_id"];
$q=mysqli_query($con,"select * from identifikimi where email='$email' and password='$pass' and menaxher_id='$menaxher_id'");
if(mysqli_num_rows($q)==1){
	$usr=mysqli_fetch_array($q);
	if($usr['tipi_perdorues']==1)
	{
		$_SESSION['m_id']=$usr["perdorues_id"];
		$_SESSION['menaxher_id']=$menaxher_id;
		header('location:index.php');
	}
	else
	{
		$_SESSION['error']="Identifikimi Deshtoi!";
		header("location:../index.php");
	}
	
}else
{
	$_SESSION['error']="Identifikimi Deshtoi!";
	header("location:../index.php");
}
?>