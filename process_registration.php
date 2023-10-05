<?php
include('config.php');
session_start();

$emri = "";
$mosha="";
$gjinia="";
$telefon="";
$email= "";
$password="";
$cpassword="";
$empty_err=$pnm_err=$g_err=$emri_err=$telefon_err=$mosha_err=$password_err=$email_err=""; 
if (isset($_POST['vazhdo'])) {
  $emri =mysqli_real_escape_string($con,$_POST['emer_perdorues']);
  $mosha = mysqli_real_escape_string($con,$_POST['mosha']);
  $gjinia = mysqli_real_escape_string($con,$_POST['gjinia']);
  $telefon =mysqli_real_escape_string($con, $_POST['telefon']);
  $email =mysqli_real_escape_string($con, $_POST['email']);
  $password=mysqli_real_escape_string($con,$_POST['password']);
  $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);


  if(empty($email)||empty($emri)||empty($mosha)||empty($gjinia)||empty($password)||empty($cpassword)){
    $empty_err="Keni fusha te paplotesuara";
  }else{
    if ($password != $cpassword) { $pnm_err=="Kujdes ne konfirmimin e password.";}

    $user_check = "SELECT * FROM identifikimi WHERE emer_perdorues='$emri' OR email='$email' LIMIT 1";
    $result = mysqli_query($con, $user_check);
    $user = mysqli_fetch_assoc($result);
  
    if ($user) { // if user exists
      if ($user['emer_perdorues'] === $emri) {$g_err="Emri perdoruesit egziston";}
      if ($user['email'] === $email) {$g_err="Emaili eshte perdorur njeher";}
    }

    if(!preg_match("/^[a-zA-Z]+$/",$emri)) {$emri_err="Emri duhet te permbaje vetem shkronja";}
    if(!preg_match("/^(0?[0-9]?[0-9]|1[01][0-1]|11[0-1])$/",$mosha)) {$mosha_err="Shkruaj sakte moshen";}
    if(!preg_match('/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/',$telefon)) {$telefon_err="Formati i numrit te telefonit jo i sakte";}
    if(!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/",$email)) {$email_err="Shkruaj sakte emailin";}
    if(!preg_match( "/^[a-zA-Z0-9]{8,}$/",$password)) {"Shkruaj sakte passwordin";}
  }
  // Regjistro perdoruesin nese ska errore
  if($empty_err==""&&$pnm_err==""&&$g_err==""&&$emri_err==""&&$telefon_err==""&&$mosha_err==""&&$password_err==""&&$email_err=="") {
    $password = md5($password);
    $query = "INSERT INTO identifikimi (emer_perdorues, email, telefon,mosha,gjinia,password,tipi_perdorues) values('$emri','$email','$telefon','$mosha','$gjinia','$password','2')";
  	$insert=mysqli_query($con, $query);
    $_SESSION["success"]="Ju u regjistruat me sukses!";
  	header('Location: login.php');
  }else{
    $_SESSION["error"]=
    "<div>
      <div>$empty_err</div>
      <div>$g_error</div>
      <div>$emri_err</div>
      <div>$telefon_err</div>
      <div>$mosha_err</div>
      <div>$password_err</div>
      <div>$email_err</div>
      <div>$pnm_error</div>
    </div>";

    header("Location:registration.php");

  }
}
?>