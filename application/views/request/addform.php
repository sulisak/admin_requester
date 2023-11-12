<!-- Content Wrapper. Contains page content -->
<style>

    .h4 div{

        font-family: "Phetsarath OT";
    }
</style>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Vehicle Management/
						<span class="laotext">ຄຸ້ມຄອງຈັດການພະຫະນະ</span>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item "><a href="<?php echo URL ?>Request">
								Vehicle Management/
								<span class="laotext">ຄຸ້ມຄອງຈັດການພະຫະນະ</span></a></li>
						<li class="breadcrumb-item active ">Add Form Vehicle/
							<span class="laotext">ຮ້ອງຂໍເບີກລົດ</span>
						</li>
					</ol>
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
								User List/
								<span class="laotext">ລານການຮ້ອງຂໍ</span>
								<?php //echo $expi =date("Y-m-d H:i:s"); 
								?>
							</h3>
						</div>
						<!-- /.card-header -->

						<?php
						// $Email='';
						// foreach ($listemail_approver as $app)

						if (isset($app->Email))  $Email = $app->Email;
						
						// print_r($listemail_approver);


						?>
						<?php

						if (isset($app->department))  $department = $app->department;
						// print_r($list_department);


						?>


						<div class="card-body">
							<form method="post" action="<?php echo URL; ?>Request/AddRequest">


								<?php
								// print_r($listData ); // show data in array
								$userid = '';
								$username = '';
								$company = '';
								$fullname = '';
								$department = '';
								$contact = '';
								$vrno = '';
								foreach ($listrequester_info as $app) {
									if (isset($app->username))  $username = $app->username;
									if (isset($app->userid))  $userid = $app->userid;
									if (isset($app->company))  $company = $app->company;
									if (isset($app->fullname))  $fullname = $app->fullname;
									if (isset($app->department))  $department = $app->department;
									if (isset($app->contact))  $contact = $app->contact;
									if (isset($app->vrno))  $vrno = $app->vrno;
								}

								?>


								<center>
									<!-- <br> -->

								</center>




								<div id="loadGetInfo">
									<script src="<?php echo URL; ?>public/js/jquery.js"> </script>
									<script>
										$(document).ready(function() {
											var generateRandomNDigits = (n) => {
												return Math.floor(Math.random() * (9 * (Math.pow(10, n)))) + (Math.pow(10, n));
											}

											var vrr = generateRandomNDigits(7);
											$('#vr').val(vrr);
											$('#vr1').val(vrr);
											$('#car').change(function() {

												var id = $('#car').val();
												$.ajax({
													url: '<?php echo URL; ?>  + Request/getcarinfo?id=' + id,
													type: 'GET',
													data: {
														id: id
													},
													success: function(response) {
														$('#loadcarinfo').fadeOut(500).html(response).fadeIn(300);


													}
												});
											});
										});
									</script>

									<div class="row">
										<div class="col-md-2" style="margin-top: 15px;">
											<p class="labelmodal">User ID</p>
											<input type="hidden" name="userid" id="cmodel" value="<?php echo $userid; ?>">
											<input type="text" name="fname" disabled="" class="form-control mt-3" style="background:#fff" value="<?php echo $username; ?>">
										</div>
										<div class="col-md-2" style="margin-top: 15px;">
											<p class="labelmodal">Company</p>
											<input type="text" name="cid" disabled="" class="form-control mt-3" style="background:#fff" value="<?php echo $company; ?>">
										</div>
										<div class="col-md-2" style="margin-top: 15px;">
											<p class="labelmodal">Fullname</p>
											<input type="text" name="fname" disabled="" class="form-control text" style="background:#fff" value="<?php
																																					echo $_SESSION['SESS_MEMBER_Fname'];
																																					?>">
										</div>
										<div class="col-md-2" style="margin-top: 15px;">
											<p class="labelmodal">Department</p>
											<input type="text" name="cid" disabled="" class="form-control text" style="background:#fff" value="<?php echo $department; ?>">
										</div>
										<div class="col-md-2" style="margin-top: 15px;">
											<p class="labelmodal">Contact</p>

											<input type="text" name="fname" disabled="" class="form-control text" style="background:#fff" value="<?php echo $contact; ?>">
										</div>
										<div class="col-md-2" style="margin-top: 15px;">
											<p class="labelmodal">VRNO.</p><input type="hidden" name="vr" class="form-control text" id="vr" value="<?php echo $vrno; ?>">
											<input type="text" disabled="" class="form-control text" id="vr1" style="background:#fff">
										</div>

									</div>

									<div class="row">
										<div class="col-md-3">
											<div class="form-group" style="margin-top: 15px;">
												<p class="labelmodal"> Departure Date:</p>

												<input type="date" class="form-control datetimepicker-input text" required="" id="depdate" name="depdate">

											</div>
										</div>
										<div class="col-md-3">
											<p class="labelmodal">Departure Time:</p>
											<input type="time" class="form-control datetimepicker-input text" required="" name="deptime" id="deptime">
										</div>
										<div class="col-md-3" style="margin-top: 15px;">
											<div class="form-group">
												<p class="labelmodal">Arrival Date:</p>
												<input type="date" class="form-control datetimepicker-input text" required="" name="redate" id="redate">
											</div>
										</div>
										<div class="col-md-3">
											<p class="labelmodal">Arrival Time:</p>
											<input type="time" class="form-control datetimepicker-input text" required="" name="retime" id="retime">
										</div>
									</div>

									<div class="row">
										<div class="col-md-4" style="margin-top: 15px;">
											<div class="form-group">
												<p class="labelmodal">Location</p>
												<input type="text" class="form-control datetimepicker-input text" required="" name="location" placeholder="Enter Location">
											</div>
										</div>
										<div class="col-md-4">
											<p class="labelmodal">Purpose</p>
											<input type="text" class="form-control datetimepicker-input text" required="" name="purpose" placeholder="Enter purpose">
										</div>
										<div class="col-md-4" style="margin-top: 15px;">

											<div class="form-group">
												<p class="labelmodal"> Select Driver Type</p>

												<select class="form-control select2bs4 text" name="driver" style="width: 100%;" required="">
													<option value="0">Drive by self</option>
													<option value="1">Request Driver</option>
												</select>

											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<div id="availableCar"></div>
												<!--  <p class="labelmodal"> Select Car (Available)</p>						 
								<select class="form-control text" name="car" id="car" style="width: 100%;" required="">
									   
									<?php
									echo '<option  value="">--select vehicle_test---</option>';
									foreach ($vehicleinfolist as $app2) {
										if (isset($app2->vid))  $vid = $app2->vid;
										if (isset($app2->makername))  $makername = $app2->makername;
										if (isset($app2->modelname))  $modelname = $app2->modelname;
										if (isset($app2->plate))  $plate = $app2->plate;
										echo '<option  value="' . $vid . '">' . $makername . ' ' . $modelname . ' #' . $plate . '</option>';


										// print_r($vehicleinfolist);
									}
									?>
									</select>-->
											</div>

										</div>
										<div class="col-md-8">
											<div id="loadcarinfo"></div>
										</div>
									</div>

								</div>
								<div class="row">
									<div class="col-md-4" style="margin-top: 15px;">
										<button type="sumbit" class="btn btn-md btn-primary">Submit Details</button>

									</div>
								</div>
								<script>
									$(document).ready(function() {
										$('#depdate').change(function() {
											var depart = $("#depdate").val();
											var redate = $("#redate").val();
											var deptime = $("#deptime").val();
											var retime = $("#retime").val();



											$.ajax({
												url: <?php echo "'" . URL . "'" ?> + "Request/GetCarAvailable",
												type: 'GET',
												data: {
													depart: depart,
													redate: redate,
													deptime: deptime,
													retime: retime
												},
												success: function(response) {
													//  alert(response);
													$("#availableCar").html(response);
												}
											});




											return false;
										});


										$('#redate').change(function() {
											var depart = $("#depdate").val();
											var redate = $("#redate").val();
											var deptime = $("#deptime").val();
											var retime = $("#retime").val();



											$.ajax({
												url: <?php echo "'" . URL . "'" ?> + "Request/GetCarAvailable",
												type: 'GET',
												data: {
													depart: depart,
													redate: redate,
													deptime: deptime,
													retime: retime
												},
												success: function(response) {
													//  alert(response);
													$("#availableCar").html(response);
												}
											});




											return false;
										});
										$('#deptime').change(function() {
											var depart = $("#depdate").val();
											var redate = $("#redate").val();
											var deptime = $("#deptime").val();
											var retime = $("#retime").val();



											$.ajax({
												url: <?php echo "'" . URL . "'" ?> + "Request/GetCarAvailable",
												type: 'GET',
												data: {
													depart: depart,
													redate: redate,
													deptime: deptime,
													retime: retime
												},
												success: function(response) {
													//  alert(response);
													$("#availableCar").html(response);
												}
											});




											return false;
										});
										$('#retime').change(function() {
											var depart = $("#depdate").val();
											var redate = $("#redate").val();
											var deptime = $("#deptime").val();
											var retime = $("#retime").val();



											$.ajax({
												url: <?php echo "'" . URL . "'" ?> + "Request/GetCarAvailable",
												type: 'GET',
												data: {
													depart: depart,
													redate: redate,
													deptime: deptime,
													retime: retime
												},
												success: function(response) {
													//  alert(response);
													$("#availableCar").html(response);
												}
											});




											return false;
										});


									});
								</script>






								<br>
								<hr>
								<center>
									<h4 style="opacity:0.8">APPROVAL LINE</h4>
								</center>

								<Div class="row">
									<div class="col-md-12 text-center">
										<div class="hori-timeline" dir="ltr">
											<ul class="list-inline events">
												<li class="list-inline-item event-list">
													<div class="px-1">
														<img src="<?php echo URL; ?>public/img/avatar31.png" width="50px">

														<center>
															<div class="circledivPending">P</div>
														</center>
														<h6 class="labelmodal ">REQUESTOR <span class="laotext"> /ຜູ້ຮ້ອງຂໍເບີກ</span></h6>

													</div>
												</li>

												<!-- <li class="list-group-item"> -->
												<li class="list-inline-item event-list">
													<div class="px-1">

														<img src="<?php echo URL; ?>public/img/linemanager.png" width="50px">


														<center>
															<div class="circledivPending">P</div>
														</center>

														<h6 class="labelmodal ">LINE MANAGER <span class="laotext"> /ຫົວໜ້າສາຍງານ</span></h6>
													</div>
												</li>


												<!-- <li class="list-group-item"> -->
												<li class="list-inline-item event-list">
													<div class="px-1">

														<img src="<?php echo URL; ?>public/img/admin.png" width="50px">

														<center>
															<div class="circledivPending">P</div>
														</center>
														<h6 class="labelmodal laotext">ADMIN HEAD <span class="laotext"> /ຫົວໜ້າຜູ້ບໍຫານລະບົບ</span></h6>


													</div>
												</li>
												<!-- <li class="list-group-item"> -->
												<li class="list-inline-item event-list">
													<div class="px-0.5">

														<img src="<?php echo URL; ?>public/img/avatar31.png" width="50px">

														<center>
															<div class="circledivPending">P</div>
														</center>
														<h6 class="labelmodal laotext">TAKE CAR <span class="laotext"> /ເອົາລົດ</span></h6>
													</div>
												</li>
												<li class="list-inline-item event-list">
													<!-- <li class="list-group-item"> -->
													<div class="px-1">

														<img src="<?php echo URL; ?>public/img/avatar31.png" width="50px">

														<center>
															<div class="circledivPending">P</div>
														</center>
														<h6 class="labelmodal laotext">RETURN <span class="laotext"> /ສົ່ງລົດ</span></h6>


													</div>
												</li>


											</ul>

										</div>
									</div>
								</div>



						</div>

						</form>
						<!-- /.modal-content -->







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
<script src="<?php echo URL; ?>public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo URL; ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo URL; ?>public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL; ?>public/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo URL; ?>public/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo URL; ?>public/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo URL; ?>public/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo URL; ?>public/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo URL; ?>public/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo URL; ?>public/js/pages/dashboard2.js"></script>
</body>

</html>