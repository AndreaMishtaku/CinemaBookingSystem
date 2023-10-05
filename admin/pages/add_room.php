<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Detajet e kinemase
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Kreu</a></li>
        <li><a href="add_cinema.php">Shto kinema</a></li>
        <li class="active">Shto detajet per kinemane</li>
      </ol>
    </section>
    <section class="content"> 
      <div class="box">
         <div class="box-header with-border">
              <h3 class="box-title">Detaje te pergjithshme</h3>
            </div>
        <div class="box-body">
          <?php
            $emri_k=$_GET['emri'];
            $k=mysqli_query($con,"select * from kinema where emri='$emri_k'");
            $kinema=mysqli_fetch_array($k);
          ?>
            <table class="table table-bordered table-hover">
                <tr>
                    <td class="col-md-6">Emri i kinemase</td>
                    <td  class="col-md-6"><?php echo $kinema['emri'];?></td>
                </tr>
                <tr>
                    <td>Adresa e kinemase</td>
                    <td><?php echo $kinema['adresa'];?></td>
                </tr>
                <tr>
                    <td>Qyteti</td>
                    <td><?php echo $kinema['qyteti'];?></td>
                </tr>
                <tr>
                    <td>Shteti</td>
                    <td><?php echo $kinema['shteti'];?></td>
                </tr>
                
            </table>
        </div> 
      </div>
<!-- ////////////////////////////////////////////////////////////////-->
      <?php
      $k1=mysqli_query($con,"select * from kinema where emri='$emri_k'");
      $kinema_id=mysqli_fetch_assoc($k1)["kinema_id"];
      ?>
<!-- //////////////////////////////////////////////////////////////-->
      <div class="box-body">
       <!-- <h3 class="text-center" style="color: green;"><?php if(isset($_SESSION["success"])){echo $_SESSION["success"]; unset($_SESSION["success"]);}?></h3>-->
        <h2 class="text-center">Shto salle</h2>
            <form action="save_room.php" method="post">
              <div class="form-group">
                <label class="control-label">Emri i salles</label>
                <input type="text" name="emer_salla" class="form-control"/>
              </div>
              <div class="form-group">
                <label class="control-label">Numri i karrigeve</label>
                <input type="text" name="nr_karrige" class="form-control"/>
              </div>
              <div class="form-group">
                <label class="control-label">Cmimi</label>
                <input type="text" name="cmimi" class="form-control"/>
              </div>
              <input type="hidden" name="kinema_id" value="<?php echo $kinema_id;?>">
              <div class="form-group">
                <button class="btn btn-success" name="shto_salle" type="submit">Shto salle</button>
              </div>
            </form>
        </div> 
<!--///////////////////////////////////////////////////////////////-->
    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>



