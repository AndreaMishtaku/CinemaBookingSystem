<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Shto film
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Kreu</a></li>
        <li class="active">Shto film</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
          <?php include('../../msgbox.php');?>
          <form action="process_add_movie.php" method="post" enctype="multipart/form-data" id="form1">
            <div class="form-group">
              <label class="control-label">Emri i filmit</label>
              <input type="text" name="emer_film" class="form-control"/>
            </div>
            <div class="form-group">
              <label class="control-label">Kasti i aktoreve</label>
              <input type="text" name="kasti" class="form-control"/>
            </div>
            <div class="form-group">
              <label class="control-label">Pershkrimi</label>
              <textarea name="pershkrimi" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label class="control-label">Data e lancimit</label>
              <input type="date" name="data_lancimit" class="form-control"/>
            </div>
            <div class="form-group">
              <label class="control-label">Foto</label>
              <input type="file" name="foto" class="form-control"/>
            </div>
            <div class="form-group">
              <label class="control-label">Traileri</label>
              <input type="text" name="video_url" class="form-control"/>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success" name="shto_film">Shto film</button>
            </div>
          </form>
        </div> 
      </div>
    </section>
  </div>
  <?php
include('footer.php');
?>