<?php include('header.php');
extract($_POST);
?>
</header>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<h3>Filmat</h3>
			
			<?php
          	$today=date("Y-m-d");
          	$q=mysqli_query($con,"SELECT DISTINCT emer_film,film_id,foto,kasti from filma where emer_film='".$kerko."'");
          	 while($filma=mysqli_fetch_array($q)){
            ?>
                    
                    <div class="col_1_of_4 span_1_of_4">
					<div class="imageRow">
						  	<div class="single">
						  	
						  		<a href="about.php?id=<?php echo $filma['film_id'];?>" ><img src="<?php echo $filma['foto'];?>" alt="" /></a>
						  	</div>
						  	<div class="movie-text">
						  		<h4 class="h-text"><a href="about.php?id=<?php echo $filma['film_id'];?>"><?php echo $filma['emer_film'];?></a></h4>
						  		Kasti:<Span class="color2"><?php echo $filma['kasti'];?></span><br>
						  		
						  	</div>
		  				</div>
		  		</div>
		  		
  	    <?php
  	    	}
  	    ?>
			
		</div>
		<div class="clear"></div>		
	</div>
</div>
<?php include('footer.php');?>