<script src="<?php echo URL; ?>public/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#vid").val('0');
		$("#tl").val('0');
		$("#tl1").val('0');
		$("#mm").val('0');
		$("#mm1").val('0');
		getAjaxProject();

		function getAjaxProject() {
			$.ajax({ //create an ajax request to display.php
				type: "GET",
				url: <?php echo  "'" .  URL  . "MeetingRoom/LoadRoombyuser'"; ?>,
				dataType: "html", //expect html to be returned                
				success: function(response) {


					$("#response").html(response);

					loading.swal()
					//alert(response);
				}

			});
		};


		$("#submitins").submit(function() {
			var d1 = Date.parse($('#sdate').val());
			var d2 = Date.parse($('#edate').val());
			var t1 = Date.parse($('#stime').val());
			var t2 = Date.parse($('#etime').val());
			var today = new Date();
			var dd = String(today.getDate()).padStart(2, '0');
			var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
			var yyyy = today.getFullYear();

			today = yyyy + '-' + mm + '-' + dd

			var todayparse = Date.parse(today);
			// alert(d1);
			// alert(todayparse);
			var room = $('#room').val();

			// alert(inclusions);
			if (room === 0) {

				alert('Select Room!');
				$('#room').focus();
			} else {


				if (Date.parse($('#sdate').val() + ' ' + $('#stime').val()) < Date.parse($('#edate').val() + ' ' + $('#etime').val())) {
					$.ajax({
							type: "POST",
							url: <?php echo '"' . URL . '"'; ?> + "BookRoom/addRoom",
							data: $(this).serialize()
						})
						.done(function(data) {
							$('#addres').fadeOut(500).html(data).fadeIn(300);
							getAjaxProject();
							//$('#submitins').trigger("reset");
						})
						.fail(function() {
							alert("Posting failed.");
						});

					//	alert("Please wait we do some modifications");
				} else {

					alert('Invalid Dates!');
					$('#depdate').focus();
				}


			}

			return false;





		});


		$("#room").change(function() {
			var room = $("#room").val();
			//	alert(room);
			$.ajax({ //create an ajax request to display.php
				type: "GET",
				url: <?php echo  "'" .  URL  . "BookRoom/getInclusion?id='"; ?> + room,
				dataType: "html", //expect html to be returned                
				success: function(response) {
					//	alert(response);
					$("#inclusions").html(response);
					$('#inclusions1').val(response);
					return false;

				}

			});
			return false;

		});

		$("#oil").change(function() {
			var amount = $("#amount").val();
			var oil = $("#oil").val();
			var totallitter = amount / oil;
			var f = totallitter;
			f.toFixed(2);
			$("#tl1").val(f.toFixed(2));
			$("#tl").val(f.toFixed(2));
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
								<button class="btn btn-xs btn-block bg-gradient-primary btn-flat" data-toggle="modal" data-target="#Add">
									<i class="fas fa-plus"></i> Book new Room/<span class="laotext">ຈອງຫ້ອງປະຊຸມໃໝ່</span>
								</button>
							</h3>
						</div>
						<!-- /.card-header -->
						<!-- <div class="row mb-2">
							<div class="col-sm-3">
								<h3 class="m-2" style="color:blue">Your booked </h3>
							</div>
						</div> -->
						<div class="card-body sm-6">

							<div id="response"></div>


						</div>
						<!-- card ---------------------->

						<!--test update new ---------------------------------------------->
						<div class="table-responsive">
							<div class="row mb-2">
								<div class="col-sm-6">
									<h3 class="m-2" style="color:blue">List all staff booked room </h3>
								</div>
							</div>

							<table class="table table-bordered table-hover   table-striped" id="example" width="10%" height="50px" cellspacing="0">
								<thead>

									<tr>
										<th style="width:2%">No/<span class="laotext"> ລຳດັບ</span></th>
										<th style="width:30%">Room/<span class="laotext"> ຫ້ອງປະຊຸມ</span></th>
										<th style="width:20%">Requestor/<span class="laotext"> ຜູ້ຮ້ອງຂໍ</span></th>
										<!-- <th>Start/<span class="laotext"> ເລີ່ມ</span></th>  -->
										<th style="width:20%">End/<span class="laotext"> ສິ້ນສຸດ</span></th>
										<th style="width:20%">Purposed/<span class="laotext"> ຈຸດປະສົງ</span></th>
										<!-- <th>Participant/<span class="laotext"> ຜູ້ເຂົ້າຮ່ວມ</span></th> 
                    <th>Remark/<span class="laotext"> ໝາຍເຫດ</span></th>  -->
										<th style="width:2%">Status/<span class="laotext"> ສະຖານະ</span></th>


										<!-- <th >Action/<span class="laotext"> ຈັດການ</span></th>                    -->
									</tr>
								</thead>
								<tbody>
									<?php
									$c = 0;
									//   foreach ($listuserrequest as $app) { 
									foreach ($listallrequestroom as $app) {
										$c++;
										if (isset($app->rbid)) {
											$id = $app->rbid;
										} else {
											$id = "";
										}
										if (isset($app->purposed)) {
											$purposed = $app->purposed;
										} else {
											$purposed = "";
										}
										if (isset($app->participant)) {
											$participant = $app->participant;
										} else {
											$participant = "";
										}
										if (isset($app->startdate)) {
											$startdate = $app->startdate;
										} else {
											$startdate = "";
										}
										if (isset($app->enddate)) {
											$enddate = $app->enddate;
										} else {
											$enddate = "";
										}
										if (isset($app->remarks)) {
											$remarks = $app->remarks;
										} else {
											$remarks = "";
										}
										if (isset($app->roomName)) {
											$roomName = $app->roomName;
										} else {
											$roomName = "";
										}
										if (isset($app->requestor)) {
											$requestor = $app->requestor;
										} else {
											$requestor = "";
										}
										if (isset($app->creator)) {
											$creator = $app->creator;
										} else {
											$creator = "";
										}
										if (isset($app->status)) {
											$status = $app->status;
										} else {
											$status = "";
										}


										echo "<tr>";
										echo "<td>" . $c . "</td>";
										echo "<td><div style='min-width:300px'>" . strtoupper($roomName) . "</div></td>";
										echo "<td><div style='min-width:250px'>" . strtoupper($requestor) . "</div></td>";
										// echo "<td><div style='min-width:200px'>".($startdate)."</div></td>";
										echo "<td><div style='min-width:200px'>" . ($enddate) . "</div></td>";
										echo "<td><div style='min-width:300px'>" . strtoupper($purposed) . "</div></td>";
										// echo "<td>".number_format($participant)."</td>";
										// echo "<td><div style='min-width:300px'>".($remarks)."</div></td>";
										echo "<td>
					<span class='cc'>" . ($status) . "</span>
					
					</td>";



										// if($status=='Completed'  ||  $status=='Cancelled' ){
										// echo "<td></td>";
										// }else{
										// echo '<td class="d-flex">

										// 		<a href="#" class="btn btn-xs btn-block bg-gradient-primary btn-flat checkin" id="del_'.$id.'">
										// 			<i class="cc"></i> Check-In
										// 		</a>
										// 	 </td>';
										// }
										echo "</tr>";
									}
									?>




								</tbody>
							</table>

						</div>
						<!--test update new ---------------------------------------------->

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
	.container input[type="radio"] {
		display: block;
		width: 200px;
		float: left;
		clear: both;

	}

	.container label {
		display: block;
		width: calc(100% - 30px);
		float: left;
		margin-right: 200px;
	}

	.container label>span {
		display: block;
		margin: 5px 0;
		font-style: italic;
	}
</style>

<div class="modal fade" id="Add">
	<form id="submitins" method="post">
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
						<div class="col-md-12">





							<!-- --------------------- update new 02-06-2021 -------------------------------------------------------------------->



							<div class="row">

								<div class="col-md-4" style="margin: 0px 15px 0px 0px;">
									<P><strong>REQUESTOR/ <span class="laotext">ຜູ້ຮ້ອງຂໍ </span></STRONG></P>
									<div class="input-group mb-4">



										<?php
										$fullname = $_SESSION['SESS_MEMBER_Fname'];
										$userid = $_SESSION['SESS_MEMBER_ID'];

										echo '<input class="form-control" name="Fname" id="Fname"
							 	  value="' . $fullname . '" type="text" required>';

										echo '<input class="form-control" name="requestor" id="requestor"
							 	  value="' . $userid . '" type="hidden" required>';

										?>
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-user"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-4" style="margin: 0px 15px 0px 0px;">
									<P><strong>BUSINESS UNIT/ <span class="laotext"> ຫົວໜ່ວຍທຸລະກິດ </span> </STRONG></P>
									<div class="input-group mb-3">
										<?php
										$company = $_SESSION['SESS_MEMBER_company'];
										echo '<input class="form-control" name="company" id="company"
							 		value="' . $company . '" type="text" required>';
										?>

										<div class="input-group-append">

											<span class="input-group-text"><i class="fas fa-building"></i></span>
										</div>
									</div>

								</div>
								<div class="col-md-4" style="margin: 0px 15px 0px 0px;">
									<P><strong>ROOM/ <span class="laotext">ຫ້ອງປະຊຸມ </span> </STRONG></P>

									<div class="input-group mb-3">
										<select class="form-control" name="room" id="room" required />
										<?php

										echo "<option value=''> --Select Room--</option>";
										foreach ($listroom as $app) {
											if (isset($app->roomid))  $roomid = $app->roomid;
											if (isset($app->roomname))  $roomname = $app->roomname;

											echo "<option value ='" . $roomid . "'> " . $roomname . "</option>";
										}
										?>
										</select>
										<input type="hidden" name="inclusions" id="inclusions1">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-person-booth"></i></span>
										</div>
									</div>
								</div>



							</div>



							<!-- --------------------- update new 02-06-2021 -------------------------------------------------------------------->




							<div class="row">

								<div class="col-md-8" style="margin: 0px 15px 0px 0px;">
									<P><strong>PURPOSED/ <span class="laotext">ຈຸດປະສົງ </span></STRONG></P>
									<div class="input-group mb-4">

										<input type="text" class="form-control" name="purpose" placeholder="Please Enter purposed" required />
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-question-circle"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-4" style="margin: 0px 15px 0px 0px;">
									<P><strong>PARTICIPANT/ <span class="laotext"> ຜູ້ເຂົ້າຮ່ວມປະຊຸມ </span> </STRONG></P>
									<div class="input-group mb-3">

										<input type="number" class="form-control" name="participant" min="1" placeholder="0" required />
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-user"></i></span>
										</div>
									</div>
								</div>


							</div>



							<div class="row">
								<div class="col-md-6" style="margin: 0px 15px 0px 0px;">
									<P><strong>START DATE/ <span class="laotext">ວັນເລີ່ມຕົ້ນ </span> </STRONG></P>
									<div class="input-group mb-3">
										<input type="date" class="form-control" name="sd" id="sdate" min="<?php echo  $date; ?>" required placeholder="Enter Start Time">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-calendar"></i></span>
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin: 0px 15px 0px 0px;">
									<P><strong>START TIME/ <span class="laotext"> ເວລາເລີ່ມຕົ້ນ </span></STRONG></P>
									<div class="input-group mb-3">
										<input type="time" class="form-control" name="st" id="stime" min="<?php echo $time = date("h:i:sa"); ?>" required placeholder="Enter Start Time">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-hourglass-start"></i></span>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6" style="margin: 0px 15px 0px 0px;">
									<P><strong>END DATE/ <span class="laotext"> ວັນທີສິ້ນສຸດ </span> </STRONG></p>
									<div class="input-group mb-3">

										<input type="date" class="form-control" name="ed" id="edate" min="<?php echo  $date; ?>" required placeholder="Enter End Date">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-calendar"></i></span>
										</div>
									</div>
								</div>

								<div class="col-md-6" style="margin: 0px 15px 0px 0px;">
									<P><strong>END TIME/ <span class="laotext"> ເວລາສິ້ນສຸດ </span> </STRONG></p>
									<div class="input-group mb-3">
										<input type="time" class="form-control" name="et" id="etime" min="<?php echo $time = date("h:i:sa"); ?>" required placeholder="Enter End Time">
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-hourglass-start"></i></span>
										</div>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-md-6" style="margin: 0px 15px 0px 0px;">
									<P><b>MEETING ROOM INCLUSIONS/
											<span class="laotext">ອຸປະກອນໃນຫ້ອງປະຊຸມ</span></b><br></P>
									<div id="inclusions"></div>


								</div>
								<div class="col-md-6" style="margin: 0px 15px 0px 0px;">
									<P><B> REMARKS/
											<span class="laotext">ໝາຍເຫດ </span></b></P>
									<textArea rows="8" class="form-control" name="remarks" required Placeholder=" Please enter remarks"></textArea>
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
					<BR><BR>
				</div>
				<!-- /.modal-dialog -->
	</form>
</div>
<!-------------------->
<!--add new 18052023 -->
<script>
	$(document).ready(function() {

		// Delete 
		$('.checkin').click(function() {


			var r = confirm("Are you sure you want to check-in?");
			if (r == true) {



				var el = this;
				var id = this.id;
				var splitid = id.split("_");

				// Delete id
				var deleteid = splitid[1];

				$.ajax({
					url: <?php echo "'" . URL . "'" ?> + "MeetingRoom/CheckinRoom",
					type: 'GET',
					data: {
						id: deleteid
					},
					success: function(response) {
						//alert(deleteid);
						window.location.href = <?php echo "'" .  URL  . "BookRoom';"; ?>



					}
				});
			} else {

			}

		});
	});
</script>
<!--add new 18052023 -->

<script>
	$(document).ready(function() {
		var table = $('#example').DataTable({
			lengthChange: true,
			// buttons: [ 'copy', 'excel', 'csv' ],
			buttons: [{
					extend: 'copyHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				'colvis'
			]

		});

		table.buttons().container()
			.appendTo('#example_wrapper .col-md-6:eq(0)');
	});
</script>

<!---------------------------->







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