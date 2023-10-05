
<?php
include('config.php');
session_start();

$emri = "";
$telefon="";
$email= "";
$subjekti="";
$empty_err=$emri_err=$telefon_err=$email_err=""; 
 
if (isset($_POST['shto_kontakt'])) {
  $emri =mysqli_real_escape_string($con,$_POST['emri']);
  $telefon =mysqli_real_escape_string($con, $_POST['telefon']);
  $email =mysqli_real_escape_string($con, $_POST['email']);
  $subjekti=mysqli_real_escape_string($con,$_POST['subjekti']);


  if(empty($email)||empty($emri)||empty($subjekti)||empty($telefon)){
    $empty_err="Keni fusha te paplotesuara";
  }else{
    if(!preg_match("/^[a-zA-Z]+$/",$emri)) {$emri_err="Emri duhet te permbaje vetem shkronja";}
    if(!preg_match('/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/',$telefon)) {$telefon_err="Formati i numrit te telefonit jo i sakte";}
    if(!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/",$email)) {$email_err="Shkruaj sakte emailin";}
}

  if($empty_err==""&&$emri_err==""&&$telefon_err==""&&$email_err=="") {
    $query = "INSERT INTO kontakt (emri,email,telefon,subjekti) values('$emri','$email','$telefon','$subjekti')";
  	$insert=mysqli_query($con, $query);
  	header('Location: index.php');
    }else{
    header("Location:contact.php");
  }
  
}
?>