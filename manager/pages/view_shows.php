<?php
include('header.php');
?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Shih shfaqjet
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Kreu</a></li>
        <li class="active">Shih shfaqjet</li>
      </ol>
    </section>
    <section class="content"> 
      <div class="box">
         <div class="box-header with-border">
              <h3 class="box-title">Shfaqjet e disponnueshme</h3>
            </div>
        <div class="box-body">
          <?php include('../../msgbox.php');?>
          <?php
          $kinema_id=$_SESSION['menaxher_id'];
          $sh=mysqli_query($con,"select * from shfaqja where kinema_id=$kinema_id and gjendja='1'");
          if(mysqli_num_rows($sh))
          {?>
            <table class="table">
              <th class="col-md-1">
                Numri i salles
              </th>
              <th class="col-md-2">
                Salla
              </th>
              <th class="col-md-3">
                Orari
              </th>
              <th class="col-md-3">
                Filmi
              </th>
              <?php
              $sl=1;
              while($shfaqja=mysqli_fetch_array($sh))
              {
                ?>
                <tr>
                  <td>
                    <?php echo $sl; $sl++;?>
                  </td>
                  <?php
                  $o=mysqli_query($con,"select * from orari where orari_id='".$shfaqja['orari_id']."'");
                  $orari=mysqli_fetch_array($o);
                  $s=mysqli_query($con,"select * from salla where salla_id='".$orari['salla_id']."'");
                  $salla=mysqli_fetch_array($s);
                  $f=mysqli_query($con,"select * from filma where film_id='".$shfaqja['film_id']."'");
                  $film=mysqli_fetch_array($f);
                  ?>
                  <td>
                    <?php echo $salla['emer_salla'];?>
                  </td>
                  <td>
                    <?php echo date('h:i A',strtotime($orari['koha_nisjes']));?>
                  </td>
                  <td>
                    <?php echo $film['emer_film'];?>
                  </td>
                  <td>
                    <a href="delete_show.php?shfaqja_id=<?php echo $shfaqja['shfaqja_id'];?>"><button class="btn btn-warning">Fshi shfaqjen</button></a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </table>
            <?php
          }
          else
          {
            ?>
            <h3>Asnje shfaqje e shtuar</h3>
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