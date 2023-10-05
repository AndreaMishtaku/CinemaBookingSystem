<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Menaxheri i kinemase
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Kreu</a></li>
        <li class="active">Kreu</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
            
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Filmat qe do te transmetohen</h3>
            </div>
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th class="col-md-1">Numri</th>
                  <th class="col-md-3">Salla</th>
                  <th class="col-md-4">Orari</th>
                  <th class="col-md-4">Filmi</th>
                </tr>
                <?php 
					$q=mysqli_query($con,"select * from shfaqja where gjendja=1 and kinema_id='".$_SESSION['menaxher_id']."'");
					$nr=1;
					while($shfaqja=mysqli_fetch_array($q))
					{
					 $q1=mysqli_query($con,"select * from filma where film_id='".$shfaqja['film_id']."'");
					 $mov=mysqli_fetch_array($q1);
					 $q2=mysqli_query($con,"select * from orari where orari_id='".$shfaqja['orari_id']."'");
					 $orari=mysqli_fetch_array($q2);
					 $q3=mysqli_query($con,"select * from salla where salla_id='".$orari['salla_id']."'");
					 $salla=mysqli_fetch_array($q3);
					?>
                <tr>
                  <td><?php echo $nr;?></td>
                  <td><span class="badge bg-green"><?php echo $salla['emer_salla'];?></span></td>
                  <td><span class="badge bg-light-blue"><?php echo $orari['koha_nisjes'];?></span></td>
                  <td><?php echo $mov['emer_film'];?></td>
                  </tr>
                  <?php
					       $nr=$nr+1;
					  
					}
                  ?>
              </table>
            </div>
          </div>
            
            
        </div> 
      </div>
    </section>
  </div>
  <?php
include('footer.php');
?>