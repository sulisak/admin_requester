 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 
	

	$("#vid").change(function(){  
				var vid=$("#vid").val();
				//alert(vid);
				$.ajax({    //create an ajax request to display.php
								type: "GET",
								url: <?php echo  "'".  URL ."'";?> + 'Fuel/loadmileage?id=' + vid,             
								dataType: "html",   //expect html to be returned                
								success: function(response){                    
									//$("#response").html(response); 
									//alert(response);
									
	 
								$("#mm").val(response);
								$("#mm1").val(response);
								}

							});
			return false;
			
		});
	

	

	$("#amount").change(function(){  
			var amount=$("#amount").val();
			var oil=$("#oil").val();
			//alert("sadsa");
			var totallitter= amount / oil;
			var f = totallitter;
			f.toFixed( 2 ); 
			$("#tl1").val(f.toFixed( 2 ));
			$("#tl").val(f.toFixed( 2 ));
		return false;
		
	});
	
	$("#oil").change(function(){  
			var amount=$("#amount").val();
			var oil=$("#oil").val();
			var totallitter= amount / oil;
			var f = totallitter;
			f.toFixed( 2 ); 
			$("#tl1").val(f.toFixed( 2 ));
			$("#tl").val(f.toFixed( 2 ));
		return false;
		
	});

	

	
});

</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vehicle Fuel/ນ້ຳມັນລົດ</h1>
          </div><!-- /.col -->
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo URL ;?>Fuel" >Vehicle Fuel List/
			  <span class="laotext">ລາຍການນ້ຳມັນລົດ</span></a></li>
              <li class="breadcrumb-item active">Update Vehicle Fuel/
			  <span class="laotext">ປ່ຽນແປງນ້ຳມັນລົດ</span></li>
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
					Update Vehicle Fuel/<span class="laotext">ປ່ຽນແປງນ້ຳມັນລົດ</span>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
							<form action ="<?php echo URL ;?>Fuel/Updatepro" method="post" >
								<div class="row">
						<div class="col-md-6">	
						<strong >VEHICLE/<span class="laotext">ລົດ</span></STRONG>
						</div>
						<div class="col-md-6">	
						<strong >DRIVER/<span class="laotext">ຄົນຂັບ</span></STRONG>
						</div>
						
				</div>
					
						
				<hr>
					<div class="row">
						<div class="col-md-6">
							
							<div class="input-group mb-3">
							<input  type="hidden" class="form-control" name="id" value="<?php echo $id;?>" required>	
							<select  class="form-control" name="vehicle" id="vid" required>	
							<?php
							echo '<option value="'. $vid.'">'. $maker.' '. $model .' '. $color .' #'. $plate .'</option>';
							?>
							<?php
							
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
						<div class="col-md-6">
							
							<div class="input-group mb-3">
							<input  class="form-control" name="driver" required value="<?php echo $driver;?>"  placeholder ="Enter Dirver" /> 	
										
							</div>
						</div>
						
						
				</div>
				<hr>
				<div class="row">
						<div class="col-md-6">	
						<strong >DATE/<span class="laotext">ວັນທີ</span></STRONG>
						</div>
						<div class="col-md-6">	
						<strong >GAS STATION/<span class="laotext">ປ້ຳນ້ຳມັນ</span></STRONG>
						</div>
						
				</div>
						
				<hr>
				<div class="row">
						<div class="col-md-6">		
							<div class="input-group mb-3">
							<input type="date"  class="form-control" name="ddate"  value="<?php echo $fdate;?>" required>	
											
							</div>	
						</div>
						<div class="col-md-6">		
							<div class="input-group mb-3">
							<input type ="text" class="form-control" name="gas"  value="<?php echo $GasStation;?>" required  placeholder ="Enter Gas Station">	
													
							</div>	
						</div>
						
				</div>
				
				<hr>
				<div class="row">						
						<div class="col-md-6">	
						<strong >AMOUNT/<span class="laotext">ລວມລາຄາ</span></STRONG>
						</div>
						<div class="col-md-6">	
						<strong >OIL PRICE PER LITER/<span class="laotext">ລາຄາຕໍ່ລິດ</span></STRONG>
						</div>
						
			
				</div>
						
				<hr>
				<div class="row">
						
						<div class="col-md-6">		
							<div class="input-group mb-3">
							<input type="number"  class="form-control" name="amount" id="amount" value="<?php echo $Amount;?>"  placeholder ="Enter Amount" required>	
													
							</div>		
					   </div>
					   <div class="col-md-6">		
							<div class="input-group mb-3">
							<input type="number" class="form-control" name="oil"   id="oil" value="<?php echo $oilprice;?>"   placeholder ="Enter Oil price" required>	
													
							</div>			
						</div>
						
				</div>
				
				<hr>
				<div class="row">						
						<div class="col-md-6">	
						<strong >TOTAL LITER(S)/<span class="laotext">ຈຳນວນລິດ</span></STRONG>
						</div>
						<div class="col-md-6">	
						<strong >MILEAGE/
						<span class="laotext">ເລກໄມສະສົມ</span></STRONG>
						</div>
						
			
				</div>
						
				<hr>
				<div class="row">
						
						<div class="col-md-6">		
							<div class="input-group mb-3">
							<input type="number" id="tl" disabled style="background:#fff" value="<?php echo $liter;?>" class="form-control" name="liter"  placeholder ="Enter Total Liter" required>	
							<input type="hidden" id="tl1" class="form-control" name="liter" value="<?php echo $liter;?>"  placeholder ="Enter Total Liter" required>	
													
							</div>		
					   </div>
					   <div class="col-md-6">		
							<div class="input-group mb-3">
							<input type="number" id ="mm"  value="<?php echo $mileage;?>" disabled style="background:#fff" class="form-control" name="mileage" placeholder ="Enter Mileage"  required>	
							<input type="hidden"  id ="mm1"  class="form-control"   value="<?php echo $mileage;?>" name="mileage" placeholder ="Enter Mileage"  required>	
													
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
