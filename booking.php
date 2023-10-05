<?php include('header.php');
if(!isset($_SESSION['emer_perdorues'])){
	header('location:login.php');
}
	$q=mysqli_query($con,"select * from filma where film_id='".$_SESSION['film_id']."'");
	$filma=mysqli_fetch_array($q);
?>
</header>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3><?php echo $filma['emer_film']; ?></h3>	
							<div class="about-top">	
								<div class="grid images_3_of_2">
									<img src="<?php echo $filma['foto']; ?>" alt=""/>
								</div>
								<div class="desc span_3_of_2">
									<p class="p-link" style="font-size:15px"><b>Kasti : </b><?php echo $filma['kasti']; ?></p>
									<p class="p-link" style="font-size:15px"><b>Data lancimit : </b><?php echo date('d-M-Y',strtotime($filma['data_lancimit'])); ?></p>
									<p style="font-size:15px"><?php echo $filma['pershkrimi']; ?></p>
									<a href="<?php echo $filma['video_url']; ?>" target="_blank" class="watch_but">Shiko Trailerin</a>
								</div>
								<div class="clear"></div>
							</div>
							<table class="table table-hover table-bordered text-center">
							<?php
								$s=mysqli_query($con,"select * from shfaqja where shfaqja_id='".$_SESSION['shfaqja_id']."'");
								$shfaqja=mysqli_fetch_array($s);
								
									$k=mysqli_query($con,"select * from kinema where kinema_id='".$shfaqja['kinema_id']."'");
									$kinema=mysqli_fetch_array($k);
									?>
									<tr>
										<td class="col-md-6">
											Kinema:
										</td>
										<td>
											<?php echo $kinema['emri'].", ".$kinema['qyteti'];?>
										</td>
										</tr>
										<tr>
											<td>
												Salla
											</td>
										<td>
											<?php 
												$t=mysqli_query($con,"select  * from orari where orari_id='".$shfaqja['orari_id']."'");
												
												$orari=mysqli_fetch_array($t);
												
												$sn=mysqli_query($con,"select  * from salla where salla_id='".$orari['salla_id']."'");
												
												$salla=mysqli_fetch_array($sn);
												echo $salla['emer_salla'];
							
												?>
										</td>
									</tr>
									<tr>
										<td>
											Data
										</td>
										<td>
											<?php 
											if(isset($_GET['date']))
							{
								$date=$_GET['date'];
							}
							else
							{
								if($shfaqja['data']>date('Y-m-d'))
								{
									$date=date('Y-m-d',strtotime($shfaqja['data']));
								}
								else
								{
									$date=date('Y-m-d');
								}
								$_SESSION['dd']=$date;
							}
							?>
							<div class="col-md-12 text-center" style="padding-bottom:20px">
								<?php if($date>$_SESSION['dd']){?><a href="booking.php?date=<?php echo date('Y-m-d',strtotime($date . "-1 days"));?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-left"></i></button></a> <?php } ?><span style="cursor:default" class="btn btn-default"><?php echo date('d-M-Y',strtotime($date));?></span>
								<?php if($date!=date('Y-m-d',strtotime($_SESSION['dd'] . "+4 days"))){?>
								<a href="booking.php?date=<?php echo date('Y-m-d',strtotime($date . "+1 days"));?>"><button class="btn btn-default"><i class="glyphicon glyphicon-chevron-right"></i></button></a>
								<?php }
								$av=mysqli_query($con,"select sum(nr_karrige) from rezervimet where shfaqja_id='".$_SESSION['shfaqja_id']."' and data_bileta='$date'");
								$avl=mysqli_fetch_array($av);
								?>
							</div>
										</td>
									</tr>
									<tr>
										<td>
											Koha e shfaqjes
										</td>
										<td>
											<?php echo date('h:i A',strtotime($orari['koha_nisjes']));?> Shfaqja
										</td>
									</tr>
									<tr>
										<td>
											Cmimi i biletes
										</td>
										<td>
											<?php echo $salla['cmimi'];?> Leke
										</td>
									</tr>
									<tr>
										<td>
											Numri i karrigeve
										</td>
										<td>
									    <form  action="process_booking.php" method="post">
												<input type="hidden" name="salla" value="<?php echo $salla['salla_id'];?>"/>
												<input type="number"  max="<?php echo $salla['nr_karrige']-$avl[0];?>" min="0" name="nr_karrige" class="form-control" value="1" style="text-align:center"/>
												<input type="hidden" name="cmimi"  value="<?php echo $salla['cmimi'];?>"/>
												<input type="hidden" name="date" value="<?php echo $date;?>"/>
										</td>
									</tr>
									<tr>
										<td colspan="2"><?php if($avl[0]==$salla['nr_karrige']){?><button type="button" class="btn btn-danger" style="width:100%">Jane te rezervuara te gjitha vendet!!!</button><?php } else { ?>
										<button class="btn btn-info" type="submit" name="rezervo" style="width:100%">Rezervo tani</button>
										<?php } ?>
										</form></td>
									</tr>
						<table>
							<tr>
								<td></td>
							</tr>
						</table>
					</div>			
				<?php include('movie_sidebar.php');?>
			</div>	
			</div>
	</div>
</div>
<?php include('footer.php');?>
