
<div class="listview_1_of_3 images_1_of_3">
	<h2 style="color:#555;">Kinema</h2>				
	<?php
        $today=date("Y-m-d");
    	$sql=mysqli_query($con,"select * from  filma where gjendja='0' order by rand() limit 4");

        while($filma=mysqli_fetch_array($sql)){
    ?>
    <div class="content-left">
		<div class="listimg listimg_1_of_2">
			<a href="about.php?id=<?php echo $filma['film_id'];?>"><img src="<?php echo $filma['foto'];?>"></a>
		</div>
		<div class="text list_1_of_2">
			<div class="extra-wrap1">
                <a href="about.php?id=<?php echo $filma['film_id'];?>" class="link4" style="text-decoration:none; font-size:18px;"><?php echo $filma['emer_film'];?></a><br>
                <span class="data">Data e lancimit: <?php echo $filma['data_lancimit'];?></span><br>
                    Kasti: <Span class="data"><?php echo $filma['kasti'];?></span><br>
                    Pershkrimi: <span" class="color2" style="text-decoration:none;"><?php echo $filma['pershkrimi'];?></span><br>
            </div>
		</div>	
		<div class="clear"></div>
	</div>
  	<?php } ?>			
</div>		
<div class="clear"></div>		
			
