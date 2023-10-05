<?php
include('header.php');
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h3 class="text-center" style="color: greenyellow;"><?php if(isset($_SESSION["success"])){echo $_SESSION["success"]; unset($_SESSION["success"]);} ?></h3>
      <h1>
        Lista e filmave
      </h1>
      <ol class="breadcrumb">
        <li><a href="index"><i class="fa fa-dashboard"></i> Kreu</a></li>
        <li class="active">Lista e filmave</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-body">
            <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <?php include('../../msgbox.php');?>
              <ul class="todo-list">
                 <?php 
                        $q=mysqli_query($con,"select * from filma");
                        if(mysqli_num_rows($q))
                        {
                        while($c=mysqli_fetch_array($q))
                        {
                        ?>
                <li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-film"></i>
                        
                      </span>
                  <!-- checkbox -->
                  <!-- todo text -->
                  <span class="text"><?php echo $c['emer_film'];?></span>
                  <!-- Emphasis label -->
                  
                  <!-- General tools such as edit or delete-->
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
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>
<script>
function del(m)
    {
        if (confirm("Je i sigurt qe deshiron ta fshish kete film?") == true) 
        {
            window.location="process_delete_movie.php?mid="+m;
        } 
    }
    </script>