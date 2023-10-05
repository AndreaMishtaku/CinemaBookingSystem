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
        <li class="active">Detajet e kinemase</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
         <div class="box-header with-border">
              <h3 class="box-title">Detaje te pergjithshme</h3>
            </div>
        <div class="box-body">
          <?php
            $k=mysqli_query($con,"select * from kinema where kinema_id='".$_SESSION['menaxher_id']."'");
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
         <div class="box">
         <div class="box-header with-border">
              <h3 class="box-title">Detajet e salles</h3>
            </div>
        <div class="box-body">
          <?php
            $s=mysqli_query($con,"select * from salla where kinema_id='".$_SESSION['menaxher_id']."'");
            if(mysqli_num_rows($s))
            {
          ?>
            <table class="table table-bordered table-hover">
              <th class="col-md-1">Numri i salles</th>
              <th class="col-md-3">Emri i salles</th>
              <th class="col-md-1">Numri i karrigeve</th>
              <th class="col-md-1">Cmimi</th>
              <th class="col-md-3">Orari i shfaqjes</th>
                <?php 
                $t=1;
                while($salla=mysqli_fetch_array($s))
                {
                  ?>
                  <tr>
                    <td><?php echo $t;?></td>
                    <td><?php echo $salla['emer_salla'];?></td>
                    <td><?php echo $salla['nr_karrige'];?></td>
                    <td><?php echo $salla['cmimi'];?></td>
                    <?php 
                      $salla_id=$salla['salla_id'];
                      $o=mysqli_query($con,"select * from orari where salla_id=$salla_id");
                      
                    ?>
                    <td><?php if(mysqli_num_rows($o)) { while($orari=mysqli_fetch_array($o))
                    { echo date('h:i a',strtotime($orari['koha_nisjes']))." ,";}}
                    else
                    {echo "Nuk eshte shtuar asnje orar i ri!";}
                    ?></td>
                    <td class="text-right"><button  class="btn btn-sm "><a href="add_time.php?salla_id=<?php echo $salla_id;?>"> Shto orar</a></button></td>
                  </tr>
                  <?php
                  $t++;
                }
                ?>
            </table>
            <?php
            }
            ?>
        </div> 
      </div>
    </section>
  </div>
  <?php
include('footer.php');
?>
</script>