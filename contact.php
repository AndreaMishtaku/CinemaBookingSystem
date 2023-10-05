<?php include ("header.php");
?>
</header>
<div class="content mt-0">
	<div class="wrap">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h3>Lini mesazhin tuaj</h3>
					    <form action="process_contact.php" method="post" >
					    	<div>
						    	<label>Emri
						    	<input type="text" required name="emri"></label>
								<label>E-mail
						    	<input type="text"  required name="email"></label>
								<label>Numri telefonit:
						    	<input type="text"  required name="telefon"></label>
						    </div>
						    <div>
						    	<span><label>Subjekti</label></span>
						    	<span><textarea required name="subjekti"> </textarea></span>
						    </div>
						   <div>
						   		<input type="submit" value="Dergo" name="shto_kontakt">
								
						  </div>
					    </form>
				  </div>
  				</div>
      			<div class="company_address">
				     	<h3>Informacionet e kompanise :</h3>
						    	<p>Forumi i Filmit</p>
						<p>Phone:+355 68 29 27 877</p>
				 	 	<p>Email: <span>forumifilmit@fti.edu.al</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Instagram</span></p>
				   </div>
				 </div>
				<div class="clear"></div>		
	</div>
</div>
<style>
	content{

		background-color: red;
	}
</style>
<?php include("footer.php");?>

