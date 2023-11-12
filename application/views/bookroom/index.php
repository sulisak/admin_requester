
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
							url: <?php echo  "'".  URL  ."BookRoom/LoadReserveRoom'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	};

	
	$("#submitins").submit(function(){  
					var d1 = Date.parse($('#sdate').val());
					var d2 = Date.parse($('#edate').val());
					var t1 = Date.parse($('#stime').val());
					var t2 = Date.parse($('#etime').val());
					var today = new Date();
					var dd = String(today.getDate()).padStart(2, '0');
					var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
					var yyyy = today.getFullYear();

					today =  yyyy +'-' + mm + '-' + dd 
				
					var todayparse = Date.parse(today);
				

					//if(todayparse <= d1 ){
						if(Date.parse($('#sdate').val() + ' ' + $('#stime').val()  ) <= Date.parse($('#edate').val() + ' ' + $('#etime').val() )) {
								$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "BookRoom/addRoom", 								
								data: $(this).serialize()
								})
								.done(function(data){
								$('#addres').fadeOut(500).html(data).fadeIn(300);
								getAjaxProject() ;
								//$('#submitins').trigger("reset");
								})
								.fail(function() {
								alert( "Posting failed." );
								});	
						}else{

							alert('Invalid times rang, please check  start time and end time!');
							$('#depdate').focus();
						  }
					  	
				//	}else{					
				////	  alert('Invalid date and time!');
				//	}
					
					return false;
			
			
				
			
		
	});
	

	$("#room").change(function(){  
			var room=$("#room").val();
		//	alert(room);
			$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."BookRoom/getInclusion?id='";?> + room ,             
							dataType: "html",   //expect html to be returned                
							success: function(response){     
								//	alert(response);
								$("#inclusions").html(response); 
								return false;
		
							}

						});
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
            <h1 class="m-0 text-dark">Book Room/<span class="laotext">ຈອງຫ້ອງປະຊຸມ</span></h1>
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
								<i class="fas fa-plus"></i> Add new/<span class="laotext">ເພີ່ມໃໝ່</span>
							</button>
				</h3>
              </div>
              <!-- /.card-header -->
              
              
                    <!--card ------------------------->
					<div class="card-body">
				
					<div id="response"></div>
			 

					</div>
						
				  <!--card ------------------------->	
				  
				  
						
						
					 </div>
				</div>
		 </div>
		 
		 
		 
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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
              <h4 class="modal-title">ADD NEW RECORD/<span class="laotext">ເພີ່ມໃໝ່</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="row">
						<div class="col-md-6">	
							<strong >REQUESTOR/<span class="laotext">ຜູ້ຮ້ອງຂໍ </span></STRONG>
							<?php
						//echo $wtoday = date("Y-m-d H:i:s", strtotime($today . ' -15 minutes'));							  
									?>
							<div class="input-group mb-3">
								<select class="form-control" name="requestor" required />
									<?php
									  foreach ($list as $app) { 
									  if (isset($app->userid))  $userid= $app->userid;
									  if (isset($app->department))  $department= $app->department;
									  if (isset($app->company))  $company= $app->company;
									  if (isset($app->fullname))  $fullname= $app->fullname;
									  echo "<option value ='".$userid."'> ".$fullname." - (".$company." / ".$department.")</option>";

									  }							  
									?>
									</select>
								  <div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								  </div>
							</div>
						
						</div>
						<div class="col-md-6">	
							<strong >ROOM/ <span class="laotext">ຫ້ອງປະຊຸມ </span>	</STRONG>	

							<div class="input-group mb-3">							
							<select class="form-control" name="room" id ="room" required />
							<?php
							  echo "<option value ='0'> --Select Room--</option>";
							  foreach ($listroom as $app) { 
							  if (isset($app->roomid))  $roomid= $app->roomid;
							  if (isset($app->roomname))  $roomname= $app->roomname;
							
							  echo "<option value ='".$roomid."'> ".$roomname."</option>";

							  }							  
							?>
							</select>
							<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-person-booth"></i></span>
								  </div>
							</div>
						</div>
						
				</div>	
				<hr>
				<div class="row">
						<div class="col-md-8">	
						<strong >PURPOSED/ <span class="laotext">ຈຸດປະສົງ </span></STRONG>
								<div class="input-group mb-3">
								
										<input type ="text"  class="form-control" name="purpose"  placeholder="Please Enter purposed" required />
								  <div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-question-circle"></i></span>
								  </div>
								</div>
						</div>
						<div class="col-md-4">	
						  <strong >PARTICIPANT/ <span class="laotext"> ຜູ້ເຂົ້າຮ່ວມປະຊຸມ </span> </STRONG>
								<div class="input-group mb-3">
								
									<input type ="number"  class="form-control" name="participant"   min="1" placeholder="0" required />
								  <div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								  </div>
								</div>
						</div>			
					
						
				</div>					
				<hr>
					<div class="row">
						<div class="col-md-6">
						<strong >START DATE/ <span class="laotext">ວັນເລີ່ມຕົ້ນ  </span> </STRONG>
								<div class="input-group mb-3">
								  <input type="date" class="form-control" name="sd" id="sdate"  min="<?php echo  $date ;?>" required placeholder="Enter Start Time">
								  <div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-calendar"></i></span>
								  </div>
								</div>
						</div>					
						
						<!--<div class="col-md-6">-->
						<!--<strong >START TIME/ <span class="laotext"> ເວລາເລີ່ມຕົ້ນ </span></STRONG>-->
						<!--	 <div class="input-group mb-3">-->
						<!--		  <input type="time" class="form-control" name="st" id="stime"   required placeholder="Enter Start Time">-->
						<!--		  <div class="input-group-append">-->
						<!--			<span class="input-group-text"><i class="fas fa-hourglass-start"></i></span>-->
						<!--		  </div>-->
						<!--		</div>-->
						<!--	</div>-->
						<div class="col-md-6">
						<strong >START TIME/ <span class="laotext"> ເວລາເລີ່ມຕົ້ນ </span></STRONG>
							 <div class="input-group mb-3">
								  <input type="time-local" class="form-control" name="st" id="stime"  value="<?php echo date('h:i:s') ?>" required placeholder="Enter Start Time">
								  <div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-hourglass-start"></i></span>
								  </div>
								</div>
							</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
						<strong >END DATE/ <span class="laotext"> ວັນທີສິ້ນສຸດ </span> </STRONG>
								<div class="input-group mb-3">
								  <input type="date" class="form-control" name="ed" id="edate" min="<?php echo  $date ;?>" required placeholder="Enter End Date">
								  <div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-calendar"></i></span>
								  </div>
								</div>
						</div>					
						
						<!--<div class="col-md-6">-->
						<!--<strong >END TIME/ <span class="laotext"> ເວລາສິ້ນສຸດ </span> </STRONG>-->
						<!--	 <div class="input-group mb-3">-->
						<!--		  <input type="time" class="form-control" name="et" id="etime"  required placeholder="Enter End Time">-->
						<!--		  <div class="input-group-append">-->
						<!--			<span class="input-group-text"><i class="fas fa-hourglass-start"></i></span>-->
						<!--		  </div>-->
						<!--		</div>-->
						<!--</div>-->
						<div class="col-md-6">
						<strong >END TIME/ <span class="laotext"> ເວລາສິ້ນສຸດ </span> </STRONG>
							 <div class="input-group mb-3">
								  <input type="time-local" class="form-control" name="et" id="etime" value="<?php echo date('h:i:s') ?>" required placeholder="Enter End Time">
								  <div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-hourglass-start"></i></span>
								  </div>
								</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<b>MEETING ROOM INCLUSIONS/
							<span class="laotext">ອຸປະກອນໃນຫ້ອງປະຊຸມ</span></b><br>
							<div id ="inclusions"></div>
						
								
						</div>	
						<div class="col-md-6">
						<B> REMARKS/
						<span class="laotext">ໝາຍເຫດ </span></b>
							<textArea rows="8" class="form-control" name="remarks" required
							Placeholder=" Please enter remarks"></textArea>
						</div>		 
					</div>		 
				
				
				
				<div id="addres"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close/
			  <span class="laotext">ປິດ</span></button>
              <button type="submit" class="btn btn-primary">Save Details/<span class="laotext">ບັນທຶກ
			  </span></button>
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
