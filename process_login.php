<?php
include('config.php');
session_start();
if(isset($_POST["identifikohu"])){
    $email=$_POST["email"];
    $password=md5($_POST["password"]);

    if(empty($email) || empty($password)){
        $_SESSION['error']="Plotesoni email dhe password.";
        header("Location:login.php");
    }else{
        $sql="SELECT * from identifikimi where email='$email' and password='$password'";

        $result=mysqli_query($con,$sql);

        if(mysqli_num_rows($result)===1){

            while($rreshti=mysqli_fetch_assoc($result)){
				if($rreshti["tipi_perdorues"]==2){
                	$_SESSION["email"]=$rreshti["email"];
               	 	$_SESSION["emer_perdorues"]=$rreshti["emer_perdorues"];
                	$_SESSION["perdorues_id"]=$rreshti["perdorues_id"];
                	header("Location:index.php");
                	exit();
				}else
				{
					$_SESSION['error']="Identifikimi deshtoi!";
					header("location:login.php");
				}
            }
        }else{
			$_SESSION['error']="Identifikimi deshtoi!";
			header("location:login.php");
        }
    }
}
?>