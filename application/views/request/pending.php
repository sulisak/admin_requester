
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 

	getAjaxProject() ;
	 function getAjaxProject() {
					$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Request/ApproveRequestList'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	};
	

	
});

</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Approve Request/ 
			<span class="laotext">ອະນຸມັດເບີກລົດ</span></h1>
          </div>
           <div class="col-sm-6">
           
          </div><!--/.col -->
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
					Request List/
					<span class="laotext">ລາຍການຮ້ອງຂໍເບີກລົດ</span>
					<?php
					//echo $today;
				//print_r($listDrivercancel );
					?>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
							<div id="response"></div>
			 

						</div>
					 </div>
				</div>
		 </div>
		 
		 
		 
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div class="modal fade" id="Add">
<form id ="addCar" method="post">
       <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New CAR/ເພີ່ມລົດໃໝ່</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				
				<div class="row">
						<div class="col-md-4">
							VIN/ເລກຈັກ
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="vin" required Placeholder="Enter VIN">							
							</div>
						</div>
						<div class="col-md-4">						
						Maker/ຍີ່ຫໍ້
							<div class="input-group mb-3">
							 <select  class="form-control" name="maker" id="maker" required>	
							 <option disabled="disabled" selected="selected" value="">Select Maker/ເລືອກຍີ່ຫໍ້ </option>
							 <?php
							 foreach ($makerlist as $app) { 
									
									if (isset($app->makerid))  $makerid= $app->makerid;	
									if (isset($app->makername))  $makername= $app->makername;	
									echo '<option value="'.$makerid.'">'.$makername.'</option>';	
							 }	
							 ?>
							  </select>
							
							 							
							</div>
						</div>
						<div class="col-md-4">						
							<div id="model">Select Model/ເລືອກລຸ້ນ</div>
						</div>
			   </div>
						
				<div class="row">
						<div class="col-md-4">
							Year/ປີ
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="year" required Placeholder="Enter year">						
							</div>
						</div>
						<div class="col-md-4">						
						Color/ສີ
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="color" required Placeholder="Enter color">								
							</div>
						</div>
						<div class="col-md-4">						
						Plate Number/ເລກທະບຽນ
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="plate" required Placeholder="Enter plate">								
							</div>
						</div>
				</div>
				<div class="row">
						<div class="col-md-4">
							Transmission/ແບບການຂັບເຄື່ອນ
							<div class="input-group mb-3">
							  <select  class="form-control" name="transmission" required>	
									<option value="Manual">Manual/ແບບກະປຸກ</option>
									<option value="Automatic">Automatic/ແບບອໍໂຕເມຕິກ</option>
							  </select>
							</div>
						</div>
						<div class="col-md-4">						
							Engine Size/ຂະໜາດຈັກ
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="egine"  required Placeholder="Enter egine size">								
							</div>
						</div>
						<div class="col-md-4">						
							Tank capacity/ຄວາມຈຸຖັງ
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="tank" required Placeholder="Enter tank capacity">								
							</div>
						</div>
				</div>
				<div class="row">
						<div class="col-md-4">
							Fuel Type/ປະເພດນ້ຳມັນ
							<div class="input-group mb-3">
							<select  class="form-control" name="fuel" required>	
									<option value="BioDiesel">BioDiesel/ກາຊວນຊີວະພາບ</option>
									<option value="Diesel">Diesel/ກາຊວນ</option>
									<option value="Regular">Regular/ແອັດຊັງ</option>
									<option value="Super">Super/ພິເສດ</option>
							  </select>					
							</div>
						</div>
						<div class="col-md-4">						
							Mileage/ເລກໄລຍະສະສົມ
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="mileage" required Placeholder="Enter mileage">								
							</div>
						</div>
						<div class="col-md-4">						
							Max Passenger/ນັ່ງໄດ້ສູງສຸດ
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="maxpassenger" required Placeholder="Enter max passenger">								
							</div>
						</div>
				</div>
				<div id="addres"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close/ປິດ</button>
              <button type="submit" class="btn btn-primary">Save changes/ບັນທຶກ</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </form>
</div>









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
</font>
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
