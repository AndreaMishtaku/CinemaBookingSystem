<?php
    include('../../config.php');

    if(isset($_POST['shto'])){

        extract($_POST);
        $q=mysqli_query($con,"select * from kinema where emri='$emri'");
        if(mysqli_num_rows($q)>0){
            header('location:add_room.php?emri='.$emri);
        }else{
            mysqli_query($con,"insert into  kinema(emri,adresa,qyteti,shteti) values ('$emri','$adresa','$qyteti','$shteti')");
            header('location:add_room.php?emri='.$emri);
        }
    }

?>