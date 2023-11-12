<script src="<?php echo URL; ?>public/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function() {



		getAjaxProject();

		function getAjaxProject() {

			$.ajax({ //create an ajax request to display.php
				type: "GET",
				url: <?php echo  "'" .  URL  . "Stationary/LoadData'"; ?>,
				dataType: "html", //expect html to be returned
				success: function(response) {
					$("#response").html(response);
					//alert(response);
				}

			});
		};
		var generateRandomNDigits = (n) => {
			return Math.floor(Math.random() * (9 * (Math.pow(10, n)))) + (Math.pow(10, n));
		}
		var vrr = generateRandomNDigits(7);
		$('#vr').val(vrr);
		$('#vr1').val(vrr);
		$(".addnew").click(function() {
			var generateRandomNDigits = (n) => {
				return Math.floor(Math.random() * (9 * (Math.pow(10, n)))) + (Math.pow(10, n));
			}
			var vrr = generateRandomNDigits(7);
			$('#vr').val(vrr);
			$('#vr1').val(vrr);

		});


		$("#cid").change(function() {
			//alert($("#cid").val());
			var cid = $("#cid").val();
			$("#productselect").show();
			$.ajax({ //create an ajax request to display.php
				type: "GET",
				url: <?php echo  "'" .  URL  . "'"; ?> + "Stationary/LoadStock?cid=" + cid,
				dataType: "html", //expect html to be returned
				success: function(response) {
					$("#user").html(response);
					//alert(response);
				}

			});
			return false;


		});
		$("#catid").change(function() {
			//alert($("#cid").val());
			var catid = $("#catid").val();
			$.ajax({ //create an ajax request to display.php
				type: "GET",
				url: <?php echo  "'" .  URL  . "'"; ?> + "Stationary/LoadProduct?catid=" + catid,
				dataType: "html", //expect html to be returned
				success: function(response) {
					$("#product").html(response);
					//alert(response);
				}

			});
			return false;


		});

		// ================= add new 01/06/2021 =============================



		// ================= add new 01/06/2021 =============================






		$("#addData").submit(function(e) {
			e.preventDefault();
			var user = $("#userid").val();
			var catid = $("#catid").val();
			var barcode = $("#barcode").val();

			if (user == "" || user == 0) {
				alert("Select User!");
				$("#user").focus();
			} else if (catid == "" || catid == 0) {
				alert("Select Category!");
				$("#catid").focus();
			} else if (barcode == "" || barcode == 0) {
				alert("Select barcode!");
				$("#barcode").focus();
			} else {
				loading(Swal);
				$.ajax({
						type: "POST",
						url: <?php echo '"' . URL . '"'; ?> + "Stationary/AddData",
						data: $(this).serialize()
					})
					.done(function(data) {
						// console.log(data);
						$('#addres').fadeOut(500).html(data).fadeIn(300);

						if (data.trim() == "Create Successfully!") {
							getAjaxProject();
							$('#addData').trigger("reset");
							location.reload();
						}
					})
					.fail(function() {
						alert("Posting failed.");
					});
			}
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
					<h1 class="m-0 text-dark">Stationary List/
						<span class="laotext">ລາຍການເບີກເຄື່ອງ</span>
					</h1>
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
								<button class="addnew btn btn-xs btn-block bg-gradient-primary btn-flat" data-toggle="modal" data-target="#modal-default">
									<i class="fas fa-plus"></i> Add new/
									<span class="laotext">ເພີ່ມໃໝ່ </span>
								</button>

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
<div class="modal fade" id="modal-default">
	<form id="addData" method="post">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add New Request/
						<span class="laotext">ເພີ່ມລາຍການຮ້ອງຂໍໃໝ່</span>
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-4" style="margin: 0px 0px 0px 0px;">
							<P><b>Request Code /<span class="laotext">ລະຫັດຮ້ອງຂໍ</span></b></P>
							<div class="input-group mb-3">
								<input class="form-control" name="id" id="vr1" type="text" style="background:#fff" disabled required>
								<input class="form-control" name="id" id="vr" type="hidden" required>

								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-align-justify"></i></span>
								</div>
							</div>
						</div>
						<div class="col-md-4" style="margin: 0px 0px 0px 0px;">
							<P><b>Business Unit /<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></b> </P>
							<div class="input-group mb-3">
								<?php
								$cid = $_SESSION['SESS_MEMBER_cid'];
								$company = $_SESSION['SESS_MEMBER_company'];
								echo '<input class="form-control" name="cid" id="cid"
							 value="' . $cid . '" type="hidden" required>
							<input class="form-control"
							 value="' . $company . '" type="text" required>';

								?>


								<!-- No need this, because no need to select business unit, just get BU from user login  -->

								<!-- <select class="form-control" name="cid" id="cid" required>
												<?php
												echo '<option value="0">--Select Business Unit--</option>';
												foreach ($listbusiness as $app) {
													if (isset($app->cid))  $cid = $app->cid;
													if (isset($app->cname))  $cname = $app->cname;
													echo '<option value="' . $cid . '">' . $cname . '</option>';
												}
												?>

						  </select>-->


								<!-- No need this, because no need to select business unit, just get BU from user login  -->



								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-building"></i></span>
								</div>
							</div>
						</div>
						<div class="col-md-4 laotext" style="margin: 0px 0px 15px 0px;">
							<P>Requestor Name /<span class="laotext">ຊື່ຜູ້ເບີກເຄື່ອງ</span></b> </P>
							<?php
							$name =	$_SESSION['SESS_MEMBER_Fname'];

							echo '<input class="form-control" name="userid" id="userid"
							 value="' . $userId . '" type="hidden" required>
							<input class="form-control"
							 value="' . $name . '" type="text" required>';

							?>
							<!--<div id="user"></div>-->
						</div>

					</div>


					<div id="productselect" style="">

						<div class="row">
							<div class="col-md-6" style="margin: 0px 0px 0px 0px;">
								<P><b>Category /<span class="laotext">ປະເພດ </span> </b></P>
								<div class="input-group mb-3">
									<select class="form-control laotext" name="catid" id="catid" required>
										<?php
										echo '<option value="0">--Select Category/<span class="laotext">ເລືອກປະເພດອຸປະກອນ</span>--</option>';
										foreach ($cat as $app) {
											if (isset($app->catid))  $catid = $app->catid;
											if (isset($app->categoryname))  $categoryname = $app->categoryname;
											echo '<option value="' . $catid . '">' . $categoryname . '</option>';
										}
										?>

									</select>
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-building"></i></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">

								<div id="product"></div>

							</div>

						</div>
						<div class="row">
							<div class="col-md-12">
								<b>Picture /<span class="laotext">ຮູບອຸປະກອນທີ່ເບີກ</span></b>
								<div id="imgdata"></div>
							</div>
						</div>
					</div>
					<div id="addreq" style="display:none">
						<hr>
						<div class="row">
							<div class="col-md-2">
								<b>Request Qty /<span class="laotext">ຈຳນວນຮ້ອງຂໍ </span></b>
								<div class="input-group mb-3">
									<input class="form-control" name="qty" type="number" min="1" placeholder="0 " required>
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-box"></i></span>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<b>Date Needed /<span class="laotext">ວັນທີຕ້ອງການ </span></b>
								<div class="input-group mb-3">
									<input class="form-control" name="dateneed" type="date" placeholder="Enter Date Needed " required>
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<b>Remarks /<span class="laotext">ໝາຍເຫດ </span></b>
								<div class="input-group mb-3">
									<input class="form-control" name="remark" type="text" placeholder="Enter Date remarks " required>
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-marker"></i></span>
									</div>
								</div>
							</div>


						</div>
					</div>

					<div id="addres"></div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close/
						<span class="laotext">ປິດ</span></button>
					<button type="submit" class="btn btn-primary" id="save" style="display:none">Save
						changes/
						<span class="laotext">ບັນທຶກຂໍເບີກເຄື່ອງ</span></button>
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