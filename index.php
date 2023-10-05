<html>
<body>
<?php
include('header.php');
?>
    <div class="container h-25">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-4 text-white mt-5 mb-2  ml-0">Mire se erdhe ne Forumi i Filmit <?php if(isset($_SESSION['emer_perdorues'])){ echo $_SESSION['emer_perdorues'];}?></h1>
          <p class="lead mb-5 text-white-50">Platforma kryesore per rezervimin e biletave te kinemase ne internet</p>
          <div class="block">
          <form action="process_search.php" id="reservation-form" method="post" onsubmit="myFunction()">
		      <fieldset>
           		 <div class="input-group">
              		<input type="search" class="form-control rounded" placeholder="Kerko per filma..." id="search111" aria-label="Search" aria-describedby="search-addon" name="kerko" />
             		<button type="submit" class="btn btn-dark">Kerko</button>
          		 </div>
		       </fieldset>
          </form>
            <div class="clear"></div></div>
        </div>
      </div>
    </div>

  </header>

<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="listview_1_of_3 images_1_of_3">
					<h2 style="color:#555;">Filmat qe priten ne vijim</h2>
					<?php 
					$q1=mysqli_query($con,"SELECT * FROM lajmerime LIMIT 5");
					while($lajmerime=mysqli_fetch_array($q1)){
					?>
				<div class="content-left">
					<div class="listimg listimg_1_of_2">
						 <img src="./<?php echo $lajmerime['bashkangjitje'];?>">
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap">
						  	<span style="text-color:#000" class="data"><strong><?php echo $lajmerime['emri'];?></strong><br>
						  	<span style="text-color:#000" class="data"><strong>Kasti:<?php echo $lajmerime['kasti'];?></strong><br>
                                <div class="data">Data e lancimit:<?php echo $lajmerime['data_lajmerim'];?></div>
                                <span class="text-top"><?php echo $lajmerime['pershkrimi'];?></span>
                          </div>
					</div>
					<div class="clear"></div>
				</div>
				<?php
				}
				?>	
		</div>				
		<div class="listview_1_of_3 images_1_of_3">
					<h2 style="color:#555;">Trailerat e filmave</h2>
						<div class="middle-list">
					<?php 
					$q2=mysqli_query($con,"SELECT * FROM filma ORDER BY rand() LIMIT 3");
				
					while($trailer=mysqli_fetch_array($q2)){
					?>
					
						<div class="listimg1">
							 <a  href="<?php echo $trailer['video_url'];?>"><img src="<?php echo $trailer['foto'];?>" alt=""/></a>
							 <a  href="<?php echo $trailer['video_url'];?>" class="link" style="text-decoration:none; font-size:14px;"><?php echo $trailer['emer_film'];?></a>
						</div>
						<?php
					}
					?>
					</div>
					
					
		</div>			
		<?php include('movie_sidebar.php');?>
	</div>
</div>
<?php include('footer.php');?>
</div>