
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vehicle Inspection/
			<span class="laotext">ການກວດກາລົດ</span></h1>
          </div><!-- /.col -->
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo URL ;?>Inspection" >Inspection List/
			  <span class="laotext">ລາຍການກວດກາ</span></a></li>
              <li class="breadcrumb-item active">Update Vehicle Inspection/
			  <span class="laotext">ປັບປຸງລາຍການກວດກາ</span></li>
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
					Update Vehicle Inspection/
					<span class="laotext">ປັບປຸງລາຍການກວດກາ</span>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
							<form action ="<?php echo URL ;?>Inspection/Updatepro" method="post" >
								  <div class="row">
													<div class="col-md-6">	
													<strong >VEHICLE/
													<span class="laotext">ລົດ</span></STRONG>
													</div>
													<div class="col-md-6">	
													<strong >CHECKER/<span class="laotext">ຜູ້ກວດກາ</span></STRONG>
													</div>
													
									</div>
									<hr>
					<div class="row">
						<div class="col-md-6">
							
							<div class="input-group mb-3">
							<select  class="form-control" name="vehicle" required>	
							<?php
									
							echo '<option value="'. $vid.'">'.strtoupper($vehiclename).'</option>';
						
							
							
							
					
							foreach ($vehicle as $app) { 
							if (isset($app->vid))  $vid= $app->vid;	
							if (isset($app->vyear))  $vyear= $app->vyear;
							if (isset($app->maker))  $maker= $app->maker;
							if (isset($app->modelcar))  $modelcar= $app->modelcar;
							if (isset($app->vcolor))  $vcolor= $app->vcolor;
							if (isset($app->plate))  $plate= $app->plate;
							
							echo '<option value="'. $vid.'">'. strtoupper($maker).' '. strtoupper($modelcar) .' '. strtoupper($vcolor) .' #'. $plate .'</option>';
							}			
							?>
							
							  </select>					
							</div>
						</div>
						<div class="col-md-6">
							
							<div class="input-group mb-3">
							<input  class="form-control" name="id"  type="hidden" required value="<?php echo $id;?>">	
							<select  class="form-control" name="checker" required>	
							
							<?php
							echo '<option value="'. $checkerid.'">'.strtoupper($fcheck).'</option>';
						
							foreach ($checker as $app) { 
							if (isset($app->userid))  $userid= $app->userid;	
							if (isset($app->fullname))  $fullname= $app->fullname;
							echo '<option value="'. $userid.'">'. strtoupper($fullname).'</option>';
							}			
							?>
							
							  </select>					
							</div>
						</div>
						
						
				</div>
				<hr>
				<div class="row">
						<div class="col-md-4">	
						<strong >TYRE/<span class="laotext">ຢາງລົດ</span></STRONG>
						</div>
						<div class="col-md-4">	
						<strong >INTERNAL/<span class="laotext">ພາຍໃນ</span></STRONG>
						</div>
						<div class="col-md-4">	
						<strong >EXTERNAL/<span class="laotext">ພາຍນອກ</span></STRONG>
						</div>
				</div>
						
				<hr>
				<div class="row">
						<div class="col-md-4">		
							<div class="input-group mb-3">
							<select  class="form-control" name="tyre" required>	
								<?php
								if($tyre==1){
									echo '<option value="1">Good Condition</option>';
						
								}else{
									echo '<option value="0">Bad Condition</option>';
						
								}
								
								?>
								<option value="1">Good Condition/
								<span class="laotext">ເງື່ອນໄຂດີ</span></option>
								<option value="0">Bad Condition/
								<span class="laotext">ເງື່ອນໄຂບໍ່ດີ</span></option>
							</select>					
							</div>	
						</div>
						<div class="col-md-4">		
							<div class="input-group mb-3">
							<select  class="form-control" name="internal" required>	
								<?php
								if($internal==1){
									echo '<option value="1">Good Condition</option>';
						
								}else{
									echo '<option value="0">Bad Condition</option>';
						
								}
								
								?>
								<option value="1">Good Condition/
								<span class="laotext">ເງື່ອນໄຂດີ</span></option>
								<option value="0">Bad Condition/
								<span class="laotext">ເງື່ອນໄຂບໍ່ດີ</span></option>
							</select>					
							</div>	
						</div>
						<div class="col-md-4">		
							<div class="input-group mb-3">
								<select  class="form-control" name="external" required>	
								<?php
								if($external==1){
									echo '<option value="1">Good Condition</option>';
						
								}else{
									echo '<option value="0">Bad Condition</option>';
						
								}
								
								?>
								<option value="1">Good Condition/
								<span class="laotext">ເງື່ອນໄຂດີ</span></option>
								<option value="0">Bad Condition/
								<span class="laotext">ເງື່ອນໄຂບໍ່ດີ</span></option>
							</select>					
							</div>	
						</div>
				</div>
				
				<hr>
				<div class="row">						
						<div class="col-md-4">	
						<strong >ENGINE OIL LIGHT/
						<span class="laotext">ໄຟນ້ຳມັັນຈັກ</span></STRONG>
						</div>
						<div class="col-md-4">	
						<strong >BREAK LIGHT/<span class="laotext">ໄຟເບກ </span></STRONG>
						</div>
						<div class="col-md-4">	
						<strong >INSPECTION DATE/<span class="laotext">ວັນທີກວດກາ</span></STRONG>
						</div>
			
				</div>
						
				<hr>
				<div class="row">
						
						<div class="col-md-4">		
							<div class="input-group mb-3">
							<select  class="form-control" name="engine" required>
								<?php
								if($engineoillight==1){
									echo '<option value="1">Good Condition</option>';
						
								}else{
									echo '<option value="0">Bad Condition</option>';
						
								}
								
								?>	
								<option value="1">Good Condition/
								<span class="laotext">ເງື່ອນໄຂດີ</span></option>
								<option value="0">Bad Condition/
								<span class="laotext">ເງື່ອນໄຂບໍ່ດີ</span></option>
							</select>					
							</div>		
					   </div>
					   <div class="col-md-4">		
							<div class="input-group mb-3">
							<select  class="form-control" name="break" required>	
							<?php
								if($brakeLight==1){
									echo '<option value="1">Good Condition</option>';
						
								}else{
									echo '<option value="0">Bad Condition</option>';
						
								}
								?>
								<option value="1">Good Condition/
								<span class="laotext">ເງື່ອນໄຂດີ</span></option>
								<option value="0">Bad Condition/
								<span class="laotext">ເງື່ອນໄຂບໍ່ດີ</span></option>
							</select>					
							</div>			
						</div>
						<div class="col-md-4">	
								<div class="input-group mb-3">
							
								<Input type="date"  class="form-control" name="idate" value="<?php echo $dateInspect;?>" required>	
													
								</div>			
					 </div>
				</div>
				
				<hr>
				<div class="row">
						<div class="col-md-6">	
						<strong >SHORT COMMENT/
						<span class="laotext">ໝາຍເຫດໂດຍຫຍໍ້ </span></STRONG>
						</div>
						
				</div>
						
				<hr>
				<div class="row">
						<div class="col-md-12">		
							<div class="input-group mb-3">
							<Textarea  class="form-control" rows="3" name="remarks" placeholder="Enter short comment..." required><?php echo $remarks;?></Textarea>
											
							</div>			
						</div>						
				</div>
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
