
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vehicle Maintenance/<span class="laotext">ບຳລຸງຮັກສາລົດ</span></h1>
          </div><!-- /.col -->
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo URL ;?>Maintainance" >
			  Maintenance List/<span class="laotext">ລາຍການບຳລຸງຮັກສາ</span></a></li>
              <li class="breadcrumb-item active">Update Vehicle Maintenance/
			  <span class="laotext">ປັບປຸງການບຳລຸງຮັກສາ</span></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
         <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
					Update Vehicle Maintenance/<span class="laotext">ປັບປຸງການບຳລຸງຮັກສາ</span>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
							<form action ="<?php echo URL ;?>Maintainance/Updatepro" method="post" >
								 <div class="row">
						
						<div class="col-md-6">	
						<strong >DATE/<span class="laotext">ວັນທີ</span></STRONG>
						</div>
						<div class="col-md-6">	
						<strong >VEHICLE/<span class="laotext">ລົດ</span></STRONG>
						</div>
						
				</div>
						
				<hr>
					<div class="row">
						<div class="col-md-6">
								<input type="hidden" class="form-control" name="id" value ="<?php echo $id ; ?>" required>	
								<input type="date" class="form-control" name="date" value ="<?php echo $rdate ; ?>" required>	
						</div>
						
						<div class="col-md-6">
							
							<div class="input-group mb-3">
							<select  class="form-control" name="vehicle" required>	
							<?php
							echo '<option value="'. $vid.'">'. $maker.' '. $modelcar .' '. $color .' #'. $plate .'</option>';
							//print_r($checker);
							foreach ($vehicle as $app) { 
							if (isset($app->vid))  $vid= $app->vid;	
							if (isset($app->vyear))  $vyear= $app->vyear;
							if (isset($app->maker))  $maker= $app->maker;
							if (isset($app->modelcar))  $modelcar= $app->modelcar;
							if (isset($app->vcolor))  $vcolor= $app->vcolor;
							if (isset($app->plate))  $plate= $app->plate;
							
							echo '<option value="'. $vid.'">'. $maker.' '. $modelcar .' '. $vcolor .' #'. $plate .'</option>';
							}			
							?>
							
							  </select>					
							</div>
						</div>
						
						
						
				</div>
				<hr>
				<div class="row">
						
						<div class="col-md-6">	
						<strong >LOCATION/<span class="laotext">ທີ່ີຕັ້ງ</span></STRONG>
						</div>
						<div class="col-md-6">	
						<strong >AMOUNT/<span class="laotext">ລາຄາລວມ</span></STRONG>
						</div>
						
				</div>
						
				<hr>
					<div class="row">
						<div class="col-md-6">
								<input type="text" class="form-control" name="location" placeholder="Enter Location"  value ="<?php echo $location ; ?>" required>	
						</div>
						
						<div class="col-md-6">
							
								<input type="number" class="form-control" name="amount"  value ="<?php echo $cost ; ?>" placeholder="Enter Amount"  required>				
						
						</div>
						
						
						
				</div>
				<hr>
				<div class="row">
						
						<div class="col-md-6">	
						<strong >PURPOSE/<span class="laotext">ຈຸດປະສົງ</span></STRONG>
						</div>
						
						
				</div>
						
				<hr>
					<div class="row">
						<div class="col-md-12">
								<TextArea rows="5" class="form-control" name="purpose"placeholder="Enter Purpose"  required><?php echo $purpose ; ?></TextArea>	
						</div>
								
				</div>
				<hr>
				<button type="submit" class="btn btn-primary">Save Details/
				<span class="laotext">ບັນທຶກ</span></button>
							</form>
			 

						</div>
					 </div>
				</div>
		 </div>
		 
		 
		 
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </di 	 	v>
  <!-- /.content-wrapper -->
<style>
.container input[type="radio"]
{
    display:block;
    width:200px;
    float:left;
    clear:both;
	
}

.container label 
{
    display:block;
    width:calc(100% - 30px);
    float:left;
	margin-right:200px;
}

.container label>span
{
    display:block;
    margin:5px 0;
    font-style:italic;
}
</style>











  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="https://aifgrouplaos.com/" target="_blank"></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo URL ;?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo URL ;?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo URL ;?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL ;?>public/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo URL ;?>public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo URL ;?>public/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo URL ;?>public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo URL ;?>public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo URL ;?>public/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo URL ;?>public/js/pages/dashboard2.js"></script>
</body>
</html>
