<?php
    include('../../config.php');

    if(isset($_POST['shto_salle'])){
        extract($_POST);
        $q=mysqli_query($con,"select * from salla where emer_salla='$emer_salla'");
        if(mysqli_num_rows($q)>0){
            header("location:index.php");
        }else{
            mysqli_query($con,"Insert into salla(kinema_id,emer_salla,nr_karrige,cmimi) values('$kinema_id','$emer_salla','$nr_karrige',$cmimi)");
            header("location:index.php");
        }
    }
?>