
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 
	$("#vid").val('0');
	$("#tl").val('0');
	$("#tl1").val('0');
	$("#mm").val('0');
	$("#mm1").val('0');
	getAjaxProject() ;
	 function getAjaxProject() {
					$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Fuel/LoadFuel'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	};
	$("#vid").change(function(){  
				var vid=$("#vid").val();
				//alert(vid);
				$.ajax({    //create an ajax request to display.php
								type: "GET",
								url: <?php echo  "'".  URL ."'";?> + 'Fuel/loadmileage?id=' + vid,             
								dataType: "html",   //expect html to be returned                
								success: function(response){                    
									//$("#response").html(response); 
									$("#mm").val(response);
								    $("#mm1").val(response);
								}

							});
							
						
			return false;
			
		});
	
	$("#submitins").submit(function(){  
		var newmil= $("#newMil").val();
		var oldmil= $("#mm1").val();
		
			if(oldmil< newmil){
				$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Fuel/AddFuel", 
							data: $(this).serialize()
							})
							.done(function(data){
							$('#addres').fadeOut(500).html(data).fadeIn(300);
							getAjaxProject() ;
							$('#submitins').trigger("reset");
							})
							.fail(function() {
							alert( "Posting failed." );
							});
				return false;
			}else{
				/*$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Fuel/AddFuel", 
							data: $(this).serialize()
							})
							.done(function(data){
							$('#addres').fadeOut(500).html(data).fadeIn(300);
							getAjaxProject() ;
							$('#submitins').trigger("reset");
							})
							.fail(function() {
							alert( "Posting failed." );
							});*/
							
						//	alert(newmil);
							//alert(oldmil);
							alert("Invalid Input!");
							$("#newMil").val('');
							$("#newMil").focus();
							return false;
							
			}
			
		
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
	$("#senddataform").submit(function(){  
	
			$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Fuel/LoadFuel", 
							data: $(this).serialize()
							})
							.done(function(data){
							//alert(data); 
							$("#response").html(data); 
							//alert("SAsa");
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
            <h1 class="m-0 text-dark">Vehicle Fuel/
			 <span class="laotext">ນ້ຳມັນລົດ</span></h1>
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
								<i class="fas fa-plus"></i> Add new/
								 <span class="laotext">ເພີ່ມໃໝ່ </span>
							</button>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
					<!--<form method="post" id="senddataform" >
							<div class="row">
								
							<div class="col-md-4">
								<input type="date" name="start" class="form-control" required>
							</div>
							<div class="col-md-4">
								<input type="date" name="end" class="form-control" required>
							</div>
							<div class="col-md-4">
								<input type="submit" class="btn btn-primary" value="Search Data">
							</div>
							
							
							</div>
							
							</form>	
							<hr>-->
							<div id="response"></div>
			 

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

<div class="modal fade" id="Add">
<form id ="submitins" method="post">
       <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD NEW RECORD/
			   <span class="laotext">ເພີ່ມໃໝ່</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="row">
						<div class="col-md-6">	
						<strong >VEHICLE/ <span class="laotext">ລົດ</span></STRONG>
						</div>
						<div class="col-md-6">	
						<strong >DRIVER/ <span class="laotext">ຄົນຂັບ</span></STRONG>
						</div>
						
				</div>
						
				<hr>
					<div class="row">
						<div class="col-md-6">
							
							<div class="input-group mb-3">
							<select  class="form-control" name="vehicle" id="vid" required>	
							<option value=""></option>
							<?php
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
						<div class="col-md-6">
							
							<div class="input-group mb-3">
							<input  class="form-control" name="driver" required  placeholder ="Enter Dirver" /> 	
										
							</div>
						</div>
						
						
				</div>
				<hr>
				<div class="row">
						<div class="col-md-6">	
						<strong >DATE/ <span class="laotext">ວັນທີ</span></STRONG>
						</div>
						<div class="col-md-6">	
						<strong >GAS STATION/ <span class="laotext">ປ້ຳນ້ຳມັນ</span></STRONG>
						</div>
						
				</div>
						
				<hr>
				<div class="row">
						<div class="col-md-6">		
							<div class="input-group mb-3">
							<input type="date"  class="form-control" name="ddate" required>	
											
							</div>	
						</div>
						<div class="col-md-6">		
							<div class="input-group mb-3">
							<input type ="text" class="form-control" name="gas" required  placeholder ="Enter Gas Station">	
													
							</div>	
						</div>
						
				</div>
				
				<hr>
				<div class="row">						
						<div class="col-md-6">	
						<strong >AMOUNT/ <span class="laotext">ລວມລາຄາ</span></STRONG>
						</div>
						<div class="col-md-6">	
						<strong >OIL PRICE PER LITER/
						 <span class="laotext">ລາຄານ້ຳມັນຕໍ່ລິດ</span></STRONG>
						</div>
						
			
				</div>
						
				<hr>
				<div class="row">
						
						<div class="col-md-6">		
							<div class="input-group mb-3">
							<input type="number"  class="form-control" name="amount" id="amount" placeholder ="Enter Amount" required>	
													
							</div>		
					   </div>
					   <div class="col-md-6">		
							<div class="input-group mb-3">
							<input type="number" class="form-control" name="oil"   id="oil"   placeholder ="Enter Oil price" required>	
													
							</div>			
						</div>
						
				</div>
				
				<hr>
				<div class="row">						
						<div class="col-md-6">	
						<strong >TOTAL LITER(S)/ <span class="laotext">ຈຳນວນລິດ</span></STRONG>
						</div>
						<div class="col-md-6">	
						<strong >MILEAGE/ <span class="laotext">ເລກໄມ</span></STRONG>
						</div>
						
			
				</div>
						
				<hr>
				<div class="row">
						
						<div class="col-md-6">		
							<div class="input-group mb-3">
							<input type="number" id="tl" disabled style="background:#fff" class="form-control" name="liter"  placeholder ="Enter Total Liter" required>	
							<input type="hidden" id="tl1" class="form-control" name="liter"  placeholder ="Enter Total Liter" required>	
													
							</div>		
					   </div>
					   <div class="col-md-6">		
							<div class="input-group mb-3">
							<input type="number" id ="mm" disabled style="background:#fff" class="form-control" name="mileage" placeholder ="Enter Mileage"  required>	
							<input type="number"  id ="newMil"  class="form-control" name="newMil" placeholder ="Enter New Mileage"  required>	
							<input type="hidden"  id ="mm1"  class="form-control" name="mileage" placeholder ="Enter Mileage"  required>	
													
							</div>			
						</div>
						
				</div>
				
				
				
				<div id="addres"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close/
			   <span class="laotext">ປິດ</span></button>
              <button type="submit" class="btn btn-primary">Save Details/
			  <span class="laotext">ບັນທຶກ</span></button>
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
