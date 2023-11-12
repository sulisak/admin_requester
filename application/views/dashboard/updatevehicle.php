<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 


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
								url:  <?php echo '"'. URL .'"';?> + "Dashboard/UpdateVehiclePro", 
							data: $(this).serialize()
							})
							.done(function(data){
							alert("Updated Successfully!");
							//$('#addres').fadeOut(500).html(data).fadeIn(300);
							//getAjaxProject() ;
							
							//location.href=<?php echo "'". URL ."'Dashboard";?> ;
							window.location.replace(<?php echo '"'. URL .'Dashboard/"';?>);
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
            <h1 class="m-0 text-dark">Update Vehicle/<span class="laotext">ປັບປຸງລົດ</span></h1>
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
				UPDATE FORM/<span class="laotext">ແບບຟອມປັບປຸງ</span>
				</h3>
              </div>
			  
			  <?php 
			   $vid= 0;	
				$vin= 0;	
				 $vyear= 0;	
				 $maker= 0;	
				$model=0;		
				 $vcolor= 0;	
				  $plate= 0;		
				$maxpassenger= 0;	
				 $transmission= 0;		
				  $engine= 0;	
				 $tankcapacity= 0;		
				$fueltype=0;		
				 $mileage= 0;		
				 $makercar= 0;	
				  $modelcar= 0;	
//print_r($uplist);				  
			  foreach ($uplist as $app) { 
			if (isset($app->vid))  {$vid= $app->vid;	}else{$vid= "";	}
			  if (isset($app->vin)) {  $vin= $app->vin;	}else{$vin= "";	}
			  if (isset($app->vyear)) {  $vyear= $app->vyear;	}else{$vyear= "";	}
				if (isset($app->maker)) {  $maker= $app->maker;	}else{$maker= "";	}
				if (isset($app->model)) {  $model= $app->model;	}else{$model= "";	}
				if (isset($app->vcolor)) {  $vcolor= $app->vcolor;}else{$vcolor= "";	}	
				if (isset($app->plate))  { $plate= $app->plate;	}else{$plate= "";	}
				if (isset($app->maxpassenger)) {  $maxpassenger= $app->maxpassenger;	}else{$maxpassenger= "";	}
				if (isset($app->transmission)) {  $transmission= $app->transmission;	}else{$transmission= "";	}
				if (isset($app->engine)) {  $engine= $app->engine;	}else{$engine= "";	}
				if (isset($app->tankcapacity)){  $tankcapacity= $app->tankcapacity;	}else{$tankcapacity= "";	}
				if (isset($app->fueltype))  { $fueltype= $app->fueltype;	}else{$fueltype= "";	}
				if (isset($app->mileage)) {  $mileage= $app->mileage;	}else{$mileage= "";	}
				if (isset($app->makercar)) {  $makercar= $app->makercar;	}else{$makercar= "";	}
				if (isset($app->modelcar)) {  $modelcar= $app->modelcar;	}else{$modelcar= "";	}
				if (isset($app->changeoil)) {  $changeoil= $app->changeoil;	}else{$changeoil= "";	}
				
					if (isset($app->LaoType)) {  $LaoType= $app->LaoType;	}else{$LaoType= "";	}
					if (isset($app->LaoRenew)) {  $LaoRenew= $app->LaoRenew;	}else{$LaoRenew= "";	}
					if (isset($app->LaoInsureExpired)) {  $LaoInsureExpired= $app->LaoInsureExpired;	}else{$LaoInsureExpired= "";	}
					if (isset($app->ThaiType)) {  $ThaiType= $app->ThaiType;	}else{$ThaiType= "";	}
					if (isset($app->ThaiRenew)) {  $ThaiRenew= $app->ThaiRenew;	}else{$ThaiRenew= "";	}
					if (isset($app->ThaiExpired)){   $ThaiExpired= $app->ThaiExpired;	}else{$ThaiExpired= "";	}
					if (isset($app->CarInsExpired)){   $CarInsExpired= $app->CarInsExpired;	}else{$CarInsExpired= "";	}
					if (isset($app->RoadTaxExpire)){   $RoadTaxExpire= $app->RoadTaxExpire;	}else{$RoadTaxExpire= "";	}
					if (isset($app->BusinessUnit))  { $BusinessUnit= $app->BusinessUnit;	}else{$BusinessUnit= "";	}
					if (isset($app->fuelcons))  { $fuelcons= $app->fuelcons;	}else{$fuelcons= "";	}
					if (isset($app->logo))  { $logo= $app->logo;	}else{$logo= "";	}
					if($logo== ""){$logo= "dd1.jpg";}
			  }
			  
			  ?>
              <!-- /.card-header -->
					<div class="card-body">
					<form  method="post" action ="<?php echo URL ;?>Dashboard/UpdateVehiclePro" enctype="multipart/form-data">
					    <div class="row">
        				    <div class="col-md-6">	
        							<div class="row">	
        								<div class="col-md-12">								
        										<img src="<?php echo URL ;?>public/img/car/<?php echo $logo;?> " class="img-fluid" id="uploadPreview" class="img-fluid">
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
            									  <input type="hidden" class="form-control" name="vid" required value="<?php echo $vid;?>">							
            									  <input type="text"  disabled class="form-control" name="vin" required Placeholder="Enter VIN"
            										value="<?php echo $vin;?>">									  
            									</div>
            								</div>
            								<div class="col-md-6">						
            								Maker/<span class="laotext">ຍີ່ຫໍ້</span>
            									<div class="input-group mb-3">
            									 <select  class="form-control"  disabled="disabled"name="maker" id="maker" >	
            									 <option disabled="disabled" selected="selected" value="">Current :  <?php echo $makercar;?></option>
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
            									<div id="model"> Model/<span class="laotext">ລຸ້ນ</span><br>
            									</div>
            										  <input type="text" disabled class="form-control" name="model" required value="<?php echo $modelcar;?>">	
            								</div>
            								<div class="col-md-6">
        									Year/<span class="laotext">ປີ</span>
        									<div class="input-group mb-3">
        									  <input type="text" class="form-control" name="year" required Placeholder="Enter year"value="<?php echo $vyear;?>">						
        									</div>
        								</div>
            					   	    
            					   	 </div>
            					   	 <div class="row">
								
            								<div class="col-md-6">						
            								Color/<span class="laotext">ສີ</span>
            									<div class="input-group mb-3">
            									  <input type="text" class="form-control" name="color" required Placeholder="Enter color"
            										value="<?php echo $vcolor;?>">
            									</div>
            								</div>
            								<div class="col-md-6">						
            								Plate Number/<span class="laotext">ເລກທະບຽນ</span>
            									<div class="input-group mb-3">
            									  <input type="text" class="form-control" name="plate" required Placeholder="Enter plate"
            									  value="<?php echo $plate;?>">
            									</div>
            								</div>
            						</div>
            						
            							<div class="row">
            								<div class="col-md-6">
            									Transmission/<span class="laotext">ແບບການຂັບເຄື່ອນ</span>
            									<div class="input-group mb-3">
            									  <select  class="form-control" name="transmission" >
            									  
            											<option  disabled="disabled" selected="selected" value="<?php echo $transmission;?>">
            											Current : <?php echo $transmission;?> </option>
            											<option value="Manual">Manual/
            											<span class="laotext">ກະປຸກ</span></option>
            											<option value="Automatic">Automatic/
            											<span class="laotext">ອໍໂຕເມຕິກ</span></option>
            									  </select>
            									</div>
            								</div>
            								<div class="col-md-6">						
            									Engine Size/
            									<span class="laotext">ຂະໜາດຈັກ</span>
            									<div class="input-group mb-3">
            									  <input type="text" class="form-control" name="engine"  required Placeholder="Enter egine size"
            									 value="<?php echo $engine;?>"
            									  >								
            									</div>
            								</div>
            								
            						</div>
            						<div class="row">
            						    <div class="col-md-6">
    									Fuel Type/
    									<span class="laotext">ປະເພດນ້ຳມັນ</span>
    									<div class="input-group mb-3">
    									<select  class="form-control" name="fuel" >	
    											<option  disabled="disabled" selected="selected" value="<?php echo $fueltype;?>">
    											Current : <?php echo $fueltype;?> </option>
    											<option value="BioDiesel">BioDiesel/
    											<span class="laotext">ກາຊວນຊີວະພາບ</span></option>
    											<option value="Diesel">Diesel/
    											<span class="laotext">ກາຊວນ</span></option>
    											<option value="Regular">Regular/
    											<span class="laotext">ແອັດຊັງ</span></option>
    											<option value="Super">Super/<span class="laotext">
    											ພິເສດ</span></option>
    									  </select>					
    									</div>
    								</div>
    								<div class="col-md-6">						
    									ODM/<span class="laotext">ເລກກົງເຕີລົດ</span>
    									<div class="input-group mb-3">
    									  <input type="number" class="form-control" name="mileage" required Placeholder="Enter mileage"
    									   value="<?php echo $mileage;?>">								
    									</div>
    								</div>
                				</div>
                				<div class="row">
                				            <div class="col-md-6">						
            									Tank capacity/
            									<span class="laotext">ຄວາມຈຸຖັງ</span>
            									<div class="input-group mb-3">
            									  <input type="number" class="form-control" name="tank" required Placeholder="Enter tank capacity"
            									  value="<?php echo $tankcapacity;?>"
            									  >								
            									</div>
            								</div>
            								<div class="col-md-6">						
            									Max Passenger/
            									<span class="laotext">ຜູ້ໂດຍສານສູງສຸດ</span>
            									<div class="input-group mb-3">
            									  <input type="number" class="form-control" name="maxpassenger" required Placeholder="Enter max passenger"  value="<?php echo $maxpassenger;?>">								
            									</div>
            								</div>
                				</div>
                					     
                					     
                					     
                					     
        				    </div>
					    </div>
					    
					    
						<hr>
								
						
					
		
							
						<div class="row">	
							<div class="col-md-4">						
									Lao Insurance  Type/
									<span class="laotext">ປະກັນໄພລາວ </span>
									<div class="input-group mb-3">
									  <input type="Text" class="form-control" name="laotype" required  value="<?php echo  $LaoType;?>" Placeholder="Enter Lao Insurance  Type">								
									</div>
								</div>
								<div class="col-md-4">						
									Lao Insurance  Renew Date/
									<span class="laotext">ວັນທີຕໍ່ປະກັນໄພລາວ</span>
									<div class="input-group mb-3">
									  <input type="date" class="form-control" name="laoInsren" value="<?php echo  $LaoRenew;?>" required >								
									</div>
								</div>
								<div class="col-md-4">						
									Lao Insurance  Expiration Date/<span class="laotext">
									ວັນທີໝົດປະກັນໄພລາວ</span>
									<div class="input-group mb-3">
									  <input type="date" class="form-control" name="laoInsexp" value="<?php echo  $LaoInsureExpired;?>" required >								
									</div>
								</div>
						</div>
				
						<div class="row">	
							<div class="col-md-4">						
								Thai Insurance  Type/<span class="laotext"> ປະກັນໄພໄທ</span>
								<div class="input-group mb-3">
								  <input type="text" class="form-control" name="thaitype" value="<?php echo  $ThaiType;?>"  required  Placeholder="Enter Thai Insurance  Type">									
								</div>
							</div>
							<div class="col-md-4">						
								Thai Insurance  Renew  Date/<span class="laotext">ວັນທີຕໍ່ປະກັນໄພໄທ</span>
								<div class="input-group mb-3">
								  <input type="date" class="form-control" name="thaiInsrenew" value="<?php echo  $ThaiRenew;?>"   required >								
								</div>
							</div>
							
							<div class="col-md-4">						
								Thai Insurance  Expiration Date/
								<span class="laotext">ວັນທີໝົດສັນຍາປະກັນໄພໄທ</span>
								<div class="input-group mb-3">
								  <input type="date" class="form-control" name="thaiInsexp" value="<?php echo  $ThaiExpired;?>"  required >								
								</div>
							</div>
							
						</div>
						
					
						<div class="row">	
							<div class="col-md-4">						
									Car Inspection Expiration  Date/<span class="laotext">
									ວັນທີໝົດກຳນົດກວດກາເຕັກນິກ</span>
									<div class="input-group mb-3">
									  <input type="date" class="form-control" name="Insdate" required  value="<?php echo  $CarInsExpired;?>">								
									</div>
								</div>
							<div class="col-md-4">						
								Road Tax  Expiration Date/<span class="laotext">ວັນທີໝົດກຳນົດເສຍຄ່າທາງ</span>
								<div class="input-group mb-3">
								  <input type="date" class="form-control" name="roadDate" required value="<?php echo  $RoadTaxExpire;?>">								
								</div>
							</div>
							<div class="col-md-4">						
								Fuel consumption/<span class="laotext">ການໃຊ້ນ້ຳມັນ</span>
								<div class="input-group mb-3">
								  <input type="text" class="form-control" name="fuelcons" required placeholder ="Enter fuel consumption " value="<?php echo  $fuelcons;?>">								
								</div>
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-md-6">						
								Change oil every/<span class="laotext">ປ່ຽນນ້ຳມັນທຸກໆ</span>
								<div class="input-group mb-3">
								  <input type="number" class="form-control" name="coil" required Placeholder="Enter change oil" value="<?php echo $changeoil;?>">								
								</div>
								</div>
							<div class="col-md-6">						
								Business Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ </span>
								<div class="input-group mb-3">
								  <input type="text" class="form-control" name="location" required placeholder ="Enter Business Unit " value ="<?php echo $BusinessUnit;?>">								
								</div>
							</div>
						</div>
							
							
							
							
						</div>
						</div>
						<hr>
						<div class="row">	
						<div class="col-md-8"></div>	
						<div class="col-md-2">						
							<button class="btn btn-md btn-block bg-gradient-primary btn-flat"  type="submit">
								<i class="fas fa-edit"></i> Update/<span class="laotext">ປັບປຸງ</span>
							</button>
						</div>	
						<div class="col-md-2">						
							<a href="<?php echo URL ;?>Dashboard" class="btn btn-md btn-block bg-gradient-warning btn-flat"  >
								<i class="fas fa-undo"></i> Cancel/<span class="laotext">ຍົກເລີກ</span>
							</a>
						</div>
						</div>
						<div id="addres"></div>	 

						</form>
						
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
