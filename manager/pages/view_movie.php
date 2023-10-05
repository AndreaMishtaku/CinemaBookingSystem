<?php
include('header.php');
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Lista e filmave
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Kreu</a></li>
        <li class="active">Lista e filmave</li>
      </ol>
    </section>
    <section class="content">
      <div class="box">
        <div class="box-body">
            <div class="box box-primary">
            <div class="box-body">
              <?php include('../../msgbox.php');?>
              <ul class="todo-list">
                <?php 
                        $q=mysqli_query($con,"select * from filma");
                        if(mysqli_num_rows($q)){
                          while($c=mysqli_fetch_array($q))
                        {
                        ?>
                <li>
                      <span class="handle">
                        <i class="fa fa-film"></i>
                        
                      </span>

                  <span class="text"><?php echo $c['emer_film'];?></span>
                  <div class="tools">
                    
                    <button class="fa fa-trash-o" onclick="del(<?php echo $c['film_id'];?>)"></button>
                  </div>
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
<script>
function del(m)
    {
        if (confirm("Je i sigurt qe deshiron ta fshish kete film?") == true) 
        {
            window.location="del_movie.php?film_id="+m;
        } 
    }
    </script>