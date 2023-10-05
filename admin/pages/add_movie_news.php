<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Shto lajmerimin per filmin e rradhes
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Kreu</a></li>
        <li class="active">Shto lajmerimin per film</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
            <form action="process_add_news.php" method="post" enctype="multipart/form-data" id="form1">
              <div class="form-group">
                <label class="control-label">Emri i filmit</label>
                <input type="text" name="emri" class="form-control"/>
              </div>
              <div class="form-group">
                 <label class="control-label">Kasti i aktoreve</label>
                <input type="text" name="kasti" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="control-label">Data e lancimit</label>
                <input type="date" name="data_lajmerim" class="form-control" required/>
              </div>
              <div class="form-group">
                <label class="control-label">Pershkrimi</label>
                 <input type="text" name="pershkrimi" class="form-control" required>
              </div>
              <div class="form-group">
                  <label class="control-label">Foto</label>
              <input type="file"  name="bashkangjitje" class="form-control" placeholder="Foto" required>
              </div>
              <div class="form-group">
                <button class="btn btn-success" name="shto_lajmerim" type="submit">Shto lajmerim</button>
              </div>
        </form>
        </div> 
      </div>
    </section>
  </div>
  <?php
include('footer.php');
?>