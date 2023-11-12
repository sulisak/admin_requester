
<script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 

	getAjaxProject() ;
	 function getAjaxProject() {
					$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Dashboard/VehicleList'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	};
	$("#maker").change(function(){
		var maker=$("#maker").val();
		///alert(maker);
		$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Dashboard/modelList'";?>  + "?id=" + maker,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#model").html(response); 
								//alert(response);
							}

		});
		return false;
	
	});
	
	$("#addCar").submit(function(){  
			$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Dashboard/AddVehicle", 
							data: $(this).serialize()
							})
							.done(function(data){
							$('#addres').fadeOut(500).html(data).fadeIn(300);
							getAjaxProject() ;
							})
							.fail(function() {
							alert( "Posting failed." );
							});
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
            <h1 class="m-0 text-dark">Vehicle List/<span class="laotext">ລາຍການລົດ</span></h1>
          </div><!-- /.col -->
          <!--  <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div>/.col -->
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
				<button class="btn btn-xs btn-block bg-gradient-primary btn-flat"  data-toggle="modal" data-target="#Add">
								<i class="fas fa-plus"></i> Add new/<span class="laotext">ເພີ່ມໃໝ່ </span>
							</button>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
							<div id="response"></div>
			 
						<!---<hr>
						<h4> Remarks</h4>
						<div class="d-flex text-center">
						
						
						 <Strong style="
						padding :10px ;
						color:#000; 
						width: 200px;						
						height: 40px;							
						background: #eca3aa;
						-moz-border-radius: 100px / 50px;
						-webkit-border-radius: 100px / 50px;
						border-radius: 100px / 50px;
					    border: 1px solid #818181;
						margin-right:10px;
						font-size:10px;
						
						 "> <i class="fas fa-times"></i>  Expired & going to Expired</strong>
						<Strong style="
						padding :10px ;
						color:#000; 
						width: 110px;						
						height: 40px;							
						background: #fff;
						-moz-border-radius: 100px / 50px;
						-webkit-border-radius: 100px / 50px;
						border-radius: 100px / 50px;
					    border: 1px solid #818181;
						margin-right:10px;
						font-size:10px;
						
						 "><i class="fas fa-check"></i>  Healthy</strong>
						-->
						
						</div>
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
<form action="<?php echo  URL ;?>Dashboard/AddVehicle" 
  method="post" enctype="multipart/form-data">
       <div class="modal-dialog modal-lg" style="min-width:60%">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New CAR/<span class="laotext">ເພີ່ມລົດໃໝ່</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="row">
				    <div class="col-md-6">	
							<div class="row">	
								<div class="col-md-12">								
										<img src="<?php echo URL ;?>public/img/dd1.jpg" class="img-fluid" id="uploadPreview" class="img-fluid">
										<br>
									   <label for="FileInput">
										
										
										<i style="color:red;font-size:13px">
										Set image /<span class="laotext">ຕັ້ງຮູບຜູ້ໃຊ້</span></i>
									   </label>

									  <input id="FileInput" type="file" name="logo" required
									  onchange="PreviewImage()" style="cursor: pointer;  display: none"/>
					
										<script>
										   function PreviewImage() {
												var oFReader = new FileReader();
												oFReader.readAsDataURL(document.getElementById("FileInput").files[0]);

												oFReader.onload = function (oFREvent) {
													document.getElementById("uploadPreview").src = oFREvent.target.result;
												};
											};
										</script>
					
								</div>
							</div>
				    </div>
						<div class="col-md-6">
							<div class="row">				    
									<div class="col-md-6">
										VIN/<span class="laotext">ເລກຈັກ</span>
										<div class="input-group mb-3">
										  <input type="text" class="form-control" name="vin" required Placeholder="Enter VIN">							
										</div>
									</div>
									<div class="col-md-6">						
									Maker/<span class="laotext">ຍີ່ຫໍ້</span>
										<div class="input-group mb-3">
										 <select  class="form-control" name="maker" id="maker" required>	
										 <option disabled="disabled" selected="selected" value="">
										 Select Maker/<span class="laotext">ເລືອກຍີ່ຫໍ້</span></option>
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
									
						   </div>
						   
						   
						   <div class="row">
									<div class="col-md-6">						
										<div id="model">Select Model/<span class="laotext">ເລືອກລຸ້ນ</span></div>
									</div>
									<div class="col-md-6">
											Year/<span class="laotext">ປີ</span>
											<div class="input-group mb-3">
											  <input type="text" class="form-control" name="year" required Placeholder="Enter year">						
											</div>
										</div>
						   
						   </div>
						   <div class="row">
										
										<div class="col-md-6">						
										Color/<span class="laotext">ສີ</span>
											<div class="input-group mb-3">
											  <input type="text" class="form-control" name="color" required Placeholder="Enter color">								
											</div>
										</div>
										<div class="col-md-6">						
										Plate Number/<span class="laotext">ເລກທະບຽນ</span>
											<div class="input-group mb-3">
											  <input type="text" class="form-control" name="plate" required Placeholder="Enter plate">								
											</div>
										</div>
								</div>
								<div class="row">
										<div class="col-md-6">
											Transmission/<span class="laotext">ແບບຂັບເຄື່ອນ</span>
											<div class="input-group mb-3">
											  <select  class="form-control" name="transmission" required>	
													<option value="Manual">Manual/<span class="laotext">ແບບກະປຸກ</span></option>
													<option value="Automatic">Automatic/<span class="laotext">ແບບອໍໂຕເມຕິກ</span></option>
											  </select>
											</div>
										</div>
										<div class="col-md-6">						
											Engine Size/<span class="laotext">ຂະໜາດຈັກ</span>
											<div class="input-group mb-3">
											  <input type="text" class="form-control" name="egine"  required Placeholder="Enter egine size">								
											</div>
										</div>
								</div>
								<div class="row">								
										<div class="col-md-6">						
											Tank capacity/<span class="laotext">ຄວາມຈຸຖັງ</span>
											<div class="input-group mb-3">
											  <input type="number" class="form-control" name="tank" required Placeholder="Enter tank capacity">								
											</div>
										</div>
										<div class="col-md-6">
											Fuel Type/<span class="laotext">ປະເພດນ້ຳມັນ</span>
											<div class="input-group mb-3">
											<select  class="form-control" name="fuel" required>	
													<option value="BioDiesel"><span class="laotext">BioDiesel/ກາຊວນຊີວະພາບ</span></option>
													<option value="Diesel"><span class="laotext">Diesel/ກາຊວນ</span></option>
													<option value="Regular"><span class="laotext">Regular/ແອັດຊັງ</span></option>
													<option value="Super"><span class="laotext">Super/ພິເສດ</span></option>
											  </select>					
											</div>
										</div>
								</div>
								
								<div class="row">
									
								</div>
						   
						</div>
						
				</div>
				
						
				
				<hr>
				<div class="row">
						
						<div class="col-md-4">						
										ODM/<span class="laotext">ເລກກົງເຕີລົດ</span>
										<div class="input-group mb-3">
										  <input type="number" class="form-control" name="mileage" required Placeholder="Enter mileage">								
										</div>
									</div>
						<div class="col-md-4">						
										Max Passenger/<span class="laotext">ຂີ່ໄດ້ສຸງສຸດ</span>
										<div class="input-group mb-3">
										  <input type="number" class="form-control" name="maxpassenger" required Placeholder="Enter max passenger">								
										</div>
						</div>
						
						<div class="col-md-4">						
							Lao Insurance  Type/<span class="laotext">ປະກັນໄພລາວ </span>
							<div class="input-group mb-3">
							  <input type="Text" class="form-control" name="laotype" required  Placeholder="Enter Lao Insurance  Type">								
							</div>
						</div>
						<div class="col-md-4">						
							Lao Insurance  Renew Date/<span class="laotext">ວັນທີຕໍ່ສັນຍາໃໝ່ປະກັນໄພລາວ</span>
							<div class="input-group mb-3">
							  <input type="date" class="form-control" name="laoInsren" required >								
							</div>
						</div>
						<div class="col-md-4">						
							Lao Insurance  Expiration Date/<span class="laotext">ວັນທີໝົດສັນຍາປະກັນໄພລາວ</span>
							<div class="input-group mb-3">
							  <input type="date" class="form-control" name="laoInsexp" required >								
							</div>
						</div>
						
						<div class="col-md-4">						
							Thai Insurance  Type/<span class="laotext">ປະກັນໄພໄທ </span>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="thaitype" required  Placeholder="Enter Thai Insurance  Type">									
							</div>
						</div>
						<div class="col-md-4">						
							Thai Insurance  Renew  Date/<span class="laotext">ວັນທີຕໍ່ສັນຍາໃໝ່ປະກັນໄພໄທ</span>
							<div class="input-group mb-3">
							  <input type="date" class="form-control" name="thaiInsrenew" required >								
							</div>
						</div>
						
						<div class="col-md-4">						
							Thai Insurance  Expiration Date/<span class="laotext">ວັນທີໝົດສັນຍາປະກັນໄພໄທ</span>
							<div class="input-group mb-3">
							  <input type="date" class="form-control" name="thaiInsexp" required >								
							</div>
						</div>
						<div class="col-md-4">						
							Car Inspection Expiration  Date/<span class="laotext">ວັນທີໝົດອາຍຸຂອງການກວດກາລົດ</span>
							<div class="input-group mb-3">
							  <input type="date" class="form-control" name="Insdate" required >								
							</div>
						</div>
						<div class="col-md-4">						
							Road Tax  Expiration Date/<span class="laotext">ວັນທີໝົດເສຍຄ່າທາງ</span>
							<div class="input-group mb-3">
							  <input type="date" class="form-control" name="roadDate" required >								
							</div>
						</div>
						<div class="col-md-4">						
							Fuel consumption/<span class="laotext">ການໃຊ້ນໍ້າມັນເຊື້ອໄຟ </span>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="fuelcons" required placeholder ="Enter fuel consumption ">								
							</div>
						</div>
						<div class="col-md-4">
							Change oil every/<span class="laotext">ປ່ຽນນ້ຳມັນທຸກໆ</span>
							<div class="input-group mb-3">
							<input type="number" class="form-control" name="coil" required="" placeholder="Enter change oil">
							</div>
							</div>
						<div class="col-md-6">						
							Business Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="location" required placeholder ="Enter 	Business Unit ">								
							</div>
						</div>
						
				</div>
				<div id="addres"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close/<span class="laotext">
			  ປິດ</span></button>
              <button type="submit" class="btn btn-primary">Save changes/<span class="laotext">ບັນທຶກ</span></button>
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