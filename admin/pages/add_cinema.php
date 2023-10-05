<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Shto kinema
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Kreu</a></li>
        <li class="active">Shto kinema</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
            <form action="process_add_cinema.php" method="post" id="form1">
              <div class="form-group">
                <label class="control-label">Emri i kinamase</label>
                <input type="text" name="emri" class="form-control"/>
              </div>
              <div class="form-group">
                <label class="control-label">Adresa e kinemase</label>
                <input type="text" name="adresa" class="form-control"/>
              </div>
              <div class="form-group">
                <label class="control-label">Qyteti</label>
                <input type="text" name="qyteti" class="form-control">
              </div>
              <div class="form-group">
                 <label class="control-label">Shteti</label>
                <input type="text" name="shteti" id="administrative_area_level_1" s placeholder="Shteti" class="form-control">
              </div>
              <div class="form-group">
                <button class="btn btn-success" name="shto" type="submit">Shto kinema</button>
              </div>
            </form>
        </div> 
      </div>
    </section>
  </div>
  <?php
include('footer.php');
?>
