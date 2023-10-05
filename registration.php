<?php 
  include('header.php');
  ?>
</header>
	<div class="wrap">
		<div class="content-top" style="min-height:300px;padding:30px">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading text-white"><h2 style="color: red;"><strong>Regjistrohu</strong></h2></div>
				  <div class="panel-body">
          <?php include('msgbox.php');?>
			  	<form action="process_registration.php" method="post">
				    <div class="form-group has-feedback">
              <input name="emer_perdorues" type="text" size="25" placeholder="Emri" class="form-control"/>
            </div>
            <div class="form-group has-feedback">
              <input name="mosha" type="text" size="25" placeholder="Mosha" class="form-control"/>
            </div>
            <div class="form-group has-feedback">
              <select name="gjinia" class="form-control">
                <option value>Zgjidh gjinine</option>
                <option>Mashkull</option>
                <option>Femer</option>
              </select>
            </div>
            <div class="form-group has-feedback">
              <input name="telefon" type="text" size="25" placeholder="Numri i telefonit" class="form-control"/>
            </div>
            <div class="form-group has-feedback">
              <input name="email" type="text" size="25" placeholder="Email" class="form-control"/>
            </div>
            <div class="form-group has-feedback">
              <input name="password" type="password" size="25" placeholder="Password" class="form-control" placeholder="Password" />
            </div>
            <div class="form-group has-feedback">
              <input name="cpassword" type="password" size="25" placeholder="Konfirmo passwordin" class="form-control" placeholder="Password" />
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="vazhdo">Vazhdo</button>
            </div>
          </form>
        </div>
        </div>
			</div>
		</div>
  </div>
<?php include('footer.php');?>
<style>
  body{
    background-image: url("./images/c_view.jpg");
    background-repeat: no-repeat;
    background-size:cover;
  }
</style>



