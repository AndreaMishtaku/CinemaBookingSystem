<?php include('header.php');
	$qry2=mysqli_query($con,"select * from filma where film_id='".$_GET['id']."'");//kontrollo
	$film=mysqli_fetch_array($qry2);
	?>
</header>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3 style="color:#444; font-size:23px;" class="text-center"><?php echo $film['emer_film']; ?></h3>	
							<div class="about-top">	
								<div class="grid images_3_of_2">
									<img src="<?php echo $film['foto']; ?>" alt=""/>
								</div>
								<div class="desc span_3_of_2">
									<p class="p-link" style="font-size:15px"><b>Kasti : </b><?php echo $film['kasti']; ?></p>
									<p class="p-link" style="font-size:15px"><b>Data lancimit : </b><?php echo date('d-M-Y',strtotime($film['data_lancimit'])); ?></p>
									<p style="font-size:15px"><?php echo $film['pershkrimi']; ?></p>
									<a href="<?php echo $film['video_url']; ?>" target="_blank" class="watch_but" style="text-decoration:none;">Shiko Trailerin</a>
								</div>
								<div class="clear"></div>
							</div>
							<?php $s=mysqli_query($con,"select DISTINCT kinema_id from shfaqja where film_id='".$film['film_id']."'");
							if(mysqli_num_rows($s)){?>
							<table class="table table-hover table-bordered text-center">
								<h3 style="color:#444;" class="text-center">Shfaqjet ne dispozicion</h3>

								<thead>
										<tr>
											<th class="text-center" style="font-size:16px;"><b>Kinema:</b></th>
											<th class="text-center" style="font-size:16px;"><b>Koha e shfaqjeve</b></th>
										</tr>
									</thead>
							<?php

							
								
								while($shfaqja=mysqli_fetch_array($s))
								{
									
									$t=mysqli_query($con,"select * from kinema where kinema_id='".$shfaqja['kinema_id']."'");
									$kinema=mysqli_fetch_array($t);
									?>
									

									<tbody>
									<tr>
										<td >
											<?php echo $kinema['emri'].", ".$kinema['qyteti'];?>
										</td>
										<td>
											<?php $tr=mysqli_query($con,"select * from shfaqja where film_id='".$film['film_id']."' and kinema_id='".$shfaqja['kinema_id']."'");
											while($sh=mysqli_fetch_array($tr))
											{
												$orari=mysqli_query($con,"select  * from orari where orari_id='".$sh['orari_id']."'");
												$koha=mysqli_fetch_array($orari);
												
												?>
												
												<a href="check_login.php?shfaqja_id=<?php echo $sh['shfaqja_id'];?>&film_id=<?php echo $sh['film_id'];?>&kinema_id=<?php echo $shfaqja['kinema_id'];?>"><button class="btn btn-default"><?php echo date('h:i A',strtotime($koha['koha_nisjes']));?></button></a>
												<?php
											}
											?>
										</td>
									</tr>
									</tbody>
									<?php
								}
							?>
						</table>
							<?php
							}
						
							else
							{
								?>
								<h3 style="color:#444; font-size:23px;" class="text-center">Tani nuk ka shfaqje te disponueshme!</h3>
								<p class="text-center">Ju lutem kontrolloni serish me vone!</p>
								<?php
							}
							?>
						
					</div>			
				<?php include('movie_sidebar.php');?>
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>