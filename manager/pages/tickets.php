<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Rezervimet e sotme
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Kreu</a></li>
        <li class="active">Rezervimet e sotme</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
          <div class="panel panel-default">
            <div class="panel-body">
              <?php  
              $kinema_id=$_SESSION['menaxher_id'];
              $r=mysqli_query($con,"Select * from rezervimet where data_rezervim=CURDATE() and kinema_id=$kinema_id");
              if(mysqli_num_rows($r)>0){
                echo "<table border='2px'><tbody>";
                while($rezervimet=mysqli_fetch_assoc($r)){
                  $bileta_id=$rezervimet['bileta_id'];
                  $perdorues_id=$rezervimet['perdorues_id'];
                  $nr_karrige=$rezervimet['nr_karrige'];
                  $shuma=$rezervimet['shuma'];
                  echo "<tr>
                  <td>$bileta_id</td>
                  <td>$perdorues_id</td>
                  <td>$nr_karrige</td>
                  <td>$shuma</td>
                  </tr>";
                }
                echo "</tbody></table>";
              }else{
                echo "<div>Nuk eshte kryer asnje rezervim ne daten e sotme</div>";
              }
              ?>
            </div>
          </div>
        </div> 
      </div>
    </section>
  </div>
  <?php
include('footer.php');
?>