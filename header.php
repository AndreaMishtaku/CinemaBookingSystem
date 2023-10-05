<?php
    include('config.php');
    session_start();
    date_default_timezone_set('Europe/Rome');
  ?> 
  <html>
  <head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Menyra se si shfaqen filmat -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="all" />
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

<title>Forumi i Filmit</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"> Forumi i Filmit</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Kreu
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="movies_events.php">Filmat</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="contact.php">Kontakt</a>
          </li>
          <?php if(isset($_SESSION['emer_perdorues'])){
			  		   $sql=mysqli_query($con,"select * from identifikimi where perdorues_id='".$_SESSION['emer_perdorues']."'");
               $perdorues=mysqli_fetch_array($sql);?>
              <li class="nav-item">
                <a href="profile.php" class="nav-link"><?php echo $_SESSION['emer_perdorues'];?></a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">Dil</a>
              </li>
              <?php }else{?>
                <li class="nav-item">
                  <a href="login.php" class="nav-link">Identifikohu</a> 
                </li>
                <li class="nav-item">
                   <a href="registration.php" class="nav-link">Regjistrohu</a>
                </li>
              </li><?php }?>
        </ul>
      </div>
    </div>
  </nav>
  </html>
 