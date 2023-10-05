<?php
    include('../../config.php');
    if(isset($_POST['shto_lajmerim'])){
      extract($_POST);
      $uploaddir = '../news_images/';
      $uploadfile = $uploaddir . basename($_FILES['bashkangjitje']['name']);
      move_uploaded_file($_FILES['bashkangjitje']['tmp_name'],$uploadfile);
      $flname="news_images/".basename($_FILES["bashkangjitje"]["name"]);
      mysqli_query($con,"insert into  lajmerime(emri,kasti,data_lajmerim,pershkrimi,bashkangjitje) values('$emri','$kasti','$data_lajmerim','$pershkrimi','$flname')");
      $_SESSION['shto']=1;
      header('location:add_movie_news.php');
    }
?>