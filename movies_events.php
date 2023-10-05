<?php include('header.php');?>
</header>
<div class="content">
	<div class="wrap">
		<div class="content-top">
			<center><h1 style="color:#555;">Menuja e Filmave <?php echo date("D-M-Y");?></h1></center>
			<?php
          	 $today=date("Y-m-d");
          	 $sql=mysqli_query($con,"SELECT * from  filma");
		
          	  while($filma=mysqli_fetch_array($sql)){
            ?>
                    
            <div class="col_1_of_4 span_1_of_4">
				<div class="imageRow">
					<div class="single">
						<a href="about.php?id=<?php echo $filma['film_id'];?>"><img src="<?php echo $filma['foto'];?>" alt="" /></a>
					</div>
					<div class="movie-text">
						<h4 class="h-text"><a href="about.php?id=<?php echo $filma['film_id'];?>" style="text-decoration:none;"><?php echo $filma['emer_film'];?></a></h4>
					    Kasti: <Span class="color2" style="text-decoration:none;"><?php echo $filma['kasti'];?></span><br>
						  		
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