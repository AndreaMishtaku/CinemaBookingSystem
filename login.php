<?php include('header.php');?>  <!--Kontrollo taget div-->
</header>

	<div class="wrap" style="min-height:410px">
		<div class="content-top" style="min-height:300px;padding:50px">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading text-white"><h2 style="color: green;"><strong>Identifikohu</strong></h2></div>
				  <div class="panel-body">
          <?php include('msgbox.php');?>
				    <form action="process_login.php" method="post">
              <div class="form-group has-feedback">
                <input name="email" type="text" size="25" placeholder="Email" class="form-control" placeholder="Email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input name="password" type="password" size="25" placeholder="Password" class="form-control" placeholder="Password" />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <br>
              <br>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="identifikohu">Identifikohu</button>
                <p style="padding-top:20px"><h4 style="color:white;"><strong>I ri ketu? </strong><a href="registration.php" class="h4"><strong>Regjistrohu</strong></a></h4></p>
              </div>
          </div>
        </div>
        </form>
			</div>
	  </div>		
	</div>

  <style>
    body{
      background-image: url("./images/c_view.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

  </style>

  
<?php include('footer.php');?>