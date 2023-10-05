<?php include('header.php');
if(!isset($_SESSION['perdorues_id'])){
	header('location:login.php');
}
?>
</header>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
					<h5 class="text-center" style="color: orange;"><?php if(isset($_SESSION['success'])){ echo $_SESSION['success'];unset($_SESSION['success']);}else if(isset($_SESSION['error'])){ echo $_SESSION['error'];unset($_SESSION['error']);}?></h5>
						<h3 style="color:black;" class="text-center">Historiku i Rezervimeve</h3>
						<?php
						$q=mysqli_query($con,"select * from rezervimet where perdorues_id='".$_SESSION['perdorues_id']."'");
						if(mysqli_num_rows($q)){
					?>
					<table class="table table-bordered">
						<thead>
						<th>Id_bileta</th>
						<th>Filmi</th>
						<th>Kinemaja</th>
						<th>Salla</th>
						<th>Numri i ulesve</th>
						<th>Shuma</th>
						<th></th>
						</thead>
						<tbody>
						<?php
						while($rezervim=mysqli_fetch_array($q))
						{
							$f=mysqli_query($con,"select * from filma where film_id=(select film_id from shfaqja where shfaqja_id='".$rezervim['shfaqja_id']."')");
							$film=mysqli_fetch_array($f);
							$s=mysqli_query($con,"select * from salla where salla_id='".$rezervim['salla_id']."'");
							$srn=mysqli_fetch_array($s);
							$k=mysqli_query($con,"select * from kinema where kinema_id='".$rezervim['kinema_id']."'");
							$kin=mysqli_fetch_array($k);
							$st=mysqli_query($con,"select * from orari where orari_id=(select orari_id from shfaqja where shfaqja_id='".$rezervim['shfaqja_id']."')");
							$stm=mysqli_fetch_array($st);
							?>
							<tr>
								<td>
									<?php echo $rezervim['bileta_id'];?>
								</td>
								<td>
									<?php echo $film['emer_film'];?>
								</td>
								<td>
									<?php echo $kin['emri'];?>
								</td>
								<td>
									<?php echo $srn['emer_salla'];?>
								</td>
								<td>
									<?php echo $rezervim['nr_karrige'];?>
								</td>
								<td>
									<?php echo $rezervim['shuma'];?> Leke
								</td>
								<td>
									<?php  if($rezervim['data_bileta']<date('Y-m-d'))
									{
										?>
										<i class="glyphicon glyphicon-ok"></i>
										<?php
									}
									else
									{?>
									<a href="cancel.php?id=<?php echo $rezervim['rezervimi_id'];?>" style="text-decoration:none; color:red;">Anullo</a>
									<?php
									}
									?>
								</td>
							</tr>
							<?php
						}
						?></tbody>
					</table>
					<?php
				}
				else
				{
					?>
					<h3 style="color:red;" class="text-center">Ju nuk keni kryer asnje rezervim deri me tani!</h3>
					<p class="text-center">Ne qofte se keni rezervuar te pakten 1 here,ti mund te shikosh gjithe historikun e rezervimeve ketu.</p>
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
