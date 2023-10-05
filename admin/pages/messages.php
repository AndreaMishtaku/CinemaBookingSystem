<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Lista e mesazheve
      </h1>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
            <div class="box box-primary">
            <div class="box-body">
              <ul class="todo-list">
                <?php 
                        $q=mysqli_query($con,"select * from kontakt");
                        if(mysqli_num_rows($q)){
                          while($mesazhe=mysqli_fetch_array($q))
                        {
                        ?>
                <li>
                      <span class="handle">
                        <i class="fa fa-list-alt"></i>
                      </span>
                     <span class="text"><?php echo $mesazhe['emri'];?></span>
                     <span class="text"><?php echo $mesazhe['email'];?></span>
                     <span class="text"><?php echo $mesazhe['telefon'];?></span>
                     <span class="text"><?php echo $mesazhe['subjekti'];?></span>
                </li>
                  <?php
                      }}
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