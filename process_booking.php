
<?php include('config.php');
session_start();
if(!isset($_SESSION['emer_perdorues'])){
	header('location:login.php');
}else{
    if(isset($_POST["rezervo"])){
        $bileta_id="BID".rand(1000,9999);
        extract($_POST);
        $kinema_id=$_SESSION['kinema_id'];
        $perdorues_id=$_SESSION['perdorues_id'];
        $shfaqja_id=$_SESSION['shfaqja_id'];
        $data_rezervim=date("Y-m-d");
        $cmimi_total=$nr_karrige*$cmimi;
        echo $cmimi_total;
        mysqli_query($con,"INSERT into rezervimet(bileta_id,kinema_id,perdorues_id,shfaqja_id,salla_id,nr_karrige,shuma,data_bileta,data_rezervim,gjendja) values('$bileta_id','$kinema_id','$perdorues_id','$shfaqja_id',$salla,'$nr_karrige','$cmimi_total','$date','$data_rezervim','1')");
        $_SESSION['success']="Ju sapo kryet nje rezervim te ri";
        header("Location:profile.php");
    }else
    {
        $_SESSION['error']="Rezervimi deshtoi!";
        header("Location:profile.php");
    }
}


