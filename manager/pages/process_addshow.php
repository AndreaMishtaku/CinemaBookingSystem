<?php
session_start();
include('../../config.php');
if(isset($_POST["shto_shfaqje"])){
    extract($_POST);
    mysqli_query($con,"insert into  shfaqja(orari_id,kinema_id,film_id,data,gjendja) values('$orari_id','".$_SESSION['menaxher_id']."','$film_id','$data','1')");
    
    $_SESSION['success']="Shfaqja u shtua!!!";
    header('location:add_show.php');
}
?>
    