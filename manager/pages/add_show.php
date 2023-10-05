<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Shto shfaqje
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Kreu</a></li>
        <li class="active">Shto shfaqje</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
          <?php include('../../msgbox.php');?>
          <form action="process_addshow.php" method="post" id="form1">
            <div class="form-group">
              <label class="control-label">Zgjidh film</label>
              <select name="film_id" class="form-control">
                <option value>Zgjidh film</option>
                  <?php
                  $f=mysqli_query($con,"select * from filma where gjendja='0'");
                  while($filma=mysqli_fetch_array($f))
                  {
                  ?>
                    <option value="<?php echo $filma['film_id'];?>"><?php echo $filma['emer_film']; ?></option>
                    <?php
                  }
                ?>
              </select>
            </div>
        </div>
          <div class="form-group">
              <label class="control-label">Zgjidh orarin e shfaqjes</label>
              <select name="orari_id" class="form-control" >
              <?php
                  $kinema_id=$_SESSION['menaxher_id'];
                  $o=mysqli_query($con,"select * from orari where salla_id in (select salla_id from salla where kinema_id=$kinema_id)");
                  while($orari=mysqli_fetch_array($o))
                  {
                  ?>
                    <option value="<?php echo $orari['orari_id'];?>"><?php echo $orari['koha_nisjes']; ?></option>
                    <?php
                  }
                ?>
              </select>
          </div>

          <div class="form-group">
            <label class="control-label">Data e shfaqjes</label>
            <input type="date" name="data" class="form-control"/>
          </div>
            <div class="form-group">
              <button class="btn btn-success" type="submit" name="shto_shfaqje">Shto shfaqje</button>
            </div>
          </form>
        </div> 
      </div>
    </section>
  </div>
  <?php
include('footer.php');
?>