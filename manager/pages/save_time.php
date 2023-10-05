<?php
    include('../../config.php');
    if(isset($_POST['shto_orar'])){
        extract($_POST);
        mysqli_query($con,"insert into orari(salla_id,koha_nisjes) values('$salla_id','$koha_nisjes')");
        header("Location:cinema_details.php");

    }
?>