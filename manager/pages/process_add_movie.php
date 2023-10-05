<?php
    session_start();
    include('../../config.php');
    if(isset($_POST['shto_film'])){
        extract($_POST);

        $target_dir = "../../images/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $flname="images/".basename($_FILES["foto"]["name"]);
    
        mysqli_query($con,"insert into  filma(kinema_id,emer_film,kasti,pershkrimi,data_lancimit,foto,video_url,gjendja) values('".$_SESSION['menaxher_id']."','$emer_film','$kasti','$pershkrimi','$data_lancimit','$flname','$video_url','0')");
    
        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file); 
        $_SESSION['success']="Filmi u shtua!!!";
        header('location:add_movie.php');
    }
?>