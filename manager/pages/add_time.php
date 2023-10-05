<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="cinema_details.php">Detajet e Kinemase</a></li>
        <li class="active">Shto orarin</li>
      </ol>
    </section>
    <section class="content"> 
      <?php
      $salla_id=$_GET['salla_id'];
      ?>
<!-- //////////////////////////////////////////////////////////////-->
      <div class="box-body">
       <!-- <h3 class="text-center" style="color: green;"><?php if(isset($_SESSION["success"])){echo $_SESSION["success"]; unset($_SESSION["success"]);}?></h3>-->
        <h2 class="text-center" style="color: orangered;">Shto orarin</h2>
            <form action="save_time.php" method="post">
              <div class="form-group">
                <label class="control-label">Koha e nisjes</label>
                <input type="time" name="koha_nisjes" class="form-control"/>
              <input type="hidden" name="salla_id" value="<?php echo $salla_id;?>">
              <div class="form-group">
                <button class="btn btn-success" name="shto_orar" type="submit">Shto orarin</button>
              </div>
            </form>
        </div> 
    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>