<script src="<?php echo URL; ?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL; ?>public/js/jquery.js"> </script>

<link rel="stylesheet" href="<?php echo URL; ?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css1/responsive.bootstrap4.min.css">
<style>
	.scroll {
		width: 100%;

		overflow-y: scroll;
	}

	.scroll::-webkit-scrollbar {
		width: 2px;
	}

	.scroll::-webkit-scrollbar-track {
		-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
		border-radius: 10px;
	}

	.scroll::-webkit-scrollbar-thumb {
		border-radius: 10px;
		-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
	}

	.circledivPending {
		height: 35px;
		width: 35px;
		display: table-cell;
		text-align: center;
		vertical-align: middle;
		border-radius: 50%;

		background: #ffd24b;
	}

	.circledivCancel {
		height: 35px;
		width: 35px;
		display: table-cell;
		text-align: center;
		vertical-align: middle;
		border-radius: 50%;

		background: #f2727f;
	}

	.circledivComplete {
		height: 35px;
		width: 35px;
		display: table-cell;
		text-align: center;
		vertical-align: middle;
		border-radius: 50%;

		background: #3dcfa4;
	}

	.hori-timeline .events {
		border-top: 3px solid #e9ecef;
	}

	.hori-timeline .events .event-list {
		display: block;
		position: relative;
		text-align: center;
		padding-top: 40px;
		margin-right: 0;
	}

	.hori-timeline .events .event-list:before {
		content: "";
		position: absolute;
		height: 36px;
		border-right: 2px dashed #dee2e6;
		top: 0;
	}

	.hori-timeline .events .event-list .event-date {
		position: absolute;

		left: 0;
		right: 0;

		margin: 0 auto;

	}

	@media (min-width: 1140px) {
		.hori-timeline .events .event-list {
			display: inline-block;
			width: 150px;
			padding-top: 45px;
		}

		.hori-timeline .events .event-list .event-date {
			top: -30px;
		}
	}

	@media (min-width: 992px) {
		.modal-lg {
			max-width: 1000px;
		}
	}

	.text {
		font-size: 12px;
	}


	.labelmodal {
		font-size: 10px;
		font-weight: 990;
	}
</style>


<div class="row">
	<?php

	$c = 0;
	foreach ($list1 as $app) {
		$c++;

		$id = isset($app->id) ? $app->id : '';
		$barcode = isset($app->barcode) ? $app->barcode : '';
		$pname = isset($app->pname) ? $app->pname : '';
		$uom = isset($app->uom) ? $app->uom : '';
		$reqqty = isset($app->reqqty) ? $app->reqqty : '';
		$unitprice = isset($app->unitprice) ? $app->unitprice : 0;
		$category = isset($app->category) ? $app->category : '';
		$reqCode = isset($app->reqCode) ? $app->reqCode : '';
		$requestorname = isset($app->requestorname) ? $app->requestorname : '';
		$requestor = isset($app->requestor) ? $app->requestor : '';
		$productid = isset($app->productid) ? $app->productid : '';
		$dateneeded = isset($app->dateneeded) ? $app->dateneeded : '';
		$daterequest = isset($app->daterequest) ? $app->daterequest : '';
		$remarks = isset($app->remarks) ? $app->remarks : '';
		$lineManagerid = isset($app->lineManagerid) ? $app->lineManagerid : '';
		$adminid = isset($app->adminid) ? $app->adminid : '';
		$givendate = isset($app->givendate) ? $app->givendate : '';
		$linemane = isset($app->linemane) ? $app->linemane : '';
		$adminname = isset($app->adminname) ? $app->adminname : '';
		$totalcost = isset($app->totalcost) ? $app->totalcost : 0;
		$status = isset($app->status) ? $app->status : '';
		$given = isset($app->given) ? $app->given : '';
		$givenby = isset($app->givenby) ? $app->givenby : '';
		$givenprofile = isset($app->givenprofile) ? $app->givenprofile : '';
		$lineprofile = isset($app->lineprofile) ? $app->lineprofile : '';
		$adminprofile = isset($app->adminprofile) ? $app->adminprofile : '';
		$requestorprofile = isset($app->requestorprofile) ? $app->requestorprofile : '';
		$linemanagerdate = isset($app->linemanagerdate) ? $app->linemanagerdate : '';
		$admindate = isset($app->admindate) ? $app->admindate : '';
		$givendate = isset($app->givendate) ? $app->givendate : '';
		$company = isset($app->company) ? $app->company : '';
		$department = isset($app->department) ? $app->department : '';
		$canceldate = isset($app->canceldate) ? $app->canceldate : '';
		$logo = isset($app->logo) ? $app->logo : 'dd1.jpg';
	?>

		<div class='col-md-4' id='divdata<?= $id ?>'>
			<div class='card'>
				<div class='card-header'>
					<h3 class='card-title'>
						Request Code /<span class='laotext'>ເລກທີເບີກ</span> <?= $reqCode ?>
					</h3>
				</div>
				<div class='card-body' style='font-size:12px'>
					<b>STATUS</b> :<br> <?= $status ?> <br>
					<b>CATEGORY /<span class='laotext'>ປະເພດ</span></b> : <br><?= strtoupper($category) ?> <br>
					<b>BARCODE /<span class='laotext'>ເລກລະຫັດອຸປະກອນ</span> </b> : <br><?= strtoupper($barcode) ?> <br>
					<b>PRODUCT NAME /<span class='laotext'>ຊື່ອຸປະກອນ</span> </b> : <br><?= strtoupper($pname) ?> <br>
					<!--- <b>PRODUCT NAME /<span class='laotext'>ມາຮອດ</span> </b> : <br><?= strtoupper($pname) ?>  <br> --->
					<b>UOM /<span class='laotext'>ຫົວໜ່ວຍ</span> </b> : <br><?= strtoupper($uom) ?> <br>
					<b>REQUESTED QTY /<span class='laotext'>ຈຳນວນທີ່ຂໍເບີກ</span> </b> : <br><?= number_format($reqqty) ?> <br>
					<b>UNIT PRICE /<span class='laotext'>ລາຄາຕໍ່ໜ່ວຍ</span> </b> : <br><?= ($unitprice) ?> <br>
					<b>TOTAL COST/<span class='laotext'>ລາຄາລວມ</span> </b> : <br><?= number_format($totalcost) ?> <br>
					<b>DATE NEEDED /<span class='laotext'>ວັນທີຕ້ອງການ</span> </b> : <br><?= ($dateneeded) ?> <br>
					<b>DATE REQUEST /<span class='laotext'>ວັນທີຂໍເບີກ</span> </b> : <br><?= ($daterequest) ?> <br>

					<hr>
					<img src='https://aifgrouplaos.la/public/img/stock/<?= $logo ?>' class='img-fluid'>
					<hr>

					<a href="#view<?= $id ?>" class="btn btn-md  bg-gradient-primary btn-flat" style="width:100%" data-toggle="modal" data-target="#view<?= $id ?>">
						<i class="fas fa-eye"></i> View Details
					</a>
					<hr>
					<div class="d-flex">

						<?php if ($status == 'Approved by Line Manager' || $status == 'Approved by Admin' || $status == 'Completed' || $status == 'Cancelled') {
						} else {
							$pos = $_SESSION['SESS_MEMBER_POS'];
							if ($pos == 'Administration' || $pos == 'LineManager') { ?>
								<a href="#" class="btn btn-md  bg-gradient-danger btn-flat " id="cancel<?= $id ?>" style="width:50%">
									<i class="fas fa-trash"></i> Cancel
								</a>

								<a href="#" class="btn btn-md btn-block bg-gradient-success btn-flat " id="approve<?= $id ?>" style="width:50%">
									<i class="fas fa-check"></i> Approve
								</a>
							<?php	} else { ?>
								<a href="#" class="btn btn-md  bg-gradient-danger btn-flat " id="cancel<?= $id ?>" style="width:100%">
									<i class="fas fa-trash"></i> Cancel
								</a>
						<?php	}
						} ?>

					</div>
				</div>

			</div>

		</div>

		<div class="modal fade" id="view<?= $id ?>">
			<form id="submitins" method="post">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<span class="laotext">
								<h4 class="modal-title" laotext>REQUEST DETAILS/ລາຍການເບີກເຄື່ອງ</h4>
							</span>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-4" style="margin: 0px 15px 0px 0px;">
									<p><b>Request Code</b></p>
									<div class="input-group mb-3">
										<input class="form-control" name="id" value="<?= $reqCode ?>" type="text" style="background:#fff" disabled required>


										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-align-justify"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-4" style="margin: 0px 15px 0px 0px;">
									<p><b>Business Unit</b></p>
									<div class="input-group mb-3">
										<input class="form-control" name="id" value="<?= $company ?>" type="text" style="background:#fff" disabled required>
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-building"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-4" style="margin: 0px 15px 0px 0px;">
									<p><b>Fullname</b></p>
									<div class="input-group mb-3">
										<input class="form-control" name="id" value="<?= $requestorname ?> (<?= $department ?>)" type="text" style="background:#fff" disabled required>
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-id-card"></i></span>
										</div>
									</div>
								</div>

							</div>


							<div class="row">
								<div class="col-md-6" style="margin: 0px 15px 0px 0px;">
									<p><b>Category</b></P>
									<div class="input-group mb-3">
										<input class="form-control laotext" name="id" value="<?= $category ?>" type="text" style="background:#fff" disabled required>
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-building"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-6" style="margin: 0px 15px 0px 0px;">
									<p><b>Product </b></P>
									<div class="input-group mb-3">
										<input class="form-control laotext" name="id" value="<?= $pname ?>" type="text" style="background:#fff" disabled required>
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-id-card"></i></span>
										</div>
									</div>
								</div>

							</div>



							<div class="row">
								<div class="col-md-2" style="margin: 0px 15px 0px 0px;">
									<P><b>Request Qty </b></P>
									<div class="input-group mb-3">
										<input class="form-control" name="qty" value="<?= $reqqty ?>" type="number" min="1" type="text" style="background:#fff" disabled placeholder="0 " required>
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-box"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-4" style="margin: 0px 15px 0px 0px;">
									<p><b>Date Needed </b></P>
									<div class="input-group mb-3">
										<input class="form-control" name="dateneed" value="<?= $dateneeded ?>" type="text" style="background:#fff" disabled type="date" placeholder="Enter Date Needed " required>
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-6" style="margin: 0px 15px 0px 0px;">
									<P><b>Remarks </b></P>
									<div class="input-group mb-3 laotext">
										<input class="form-control" name="remark" value="<?= $remarks ?>" type="text" style="background:#fff" disabled type="text" placeholder="Enter Date remarks " required>
										<div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-marker"></i></span>
										</div>
									</div>
								</div>


							</div>

							<!---Approval Line--->

							<div class="row">
								<div class="col-md-12 text-center">
									<center>
										<br>
										<hr>
										<center>
											<h4 style="opacity:0.8">APPROVAL LINE</h4>
										</center>
										<br>
										<br>

										<div class="hori-timeline" dir="ltr">
											<ul class="list-inline events">
												<li class="list-inline-item event-list">
													<div class="px-1">
														<div class="event-date text-center">
															<img src="https://aifgrouplaos.la/public/img/profile/<?= $requestorprofile ?>" style="vertical-align: middle; width: 50px; height: 50px; border-radius: 50%;">
														</div>
														<?php $isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));

														echo $isMob  ? "<br></br></br>" : "";

														// ---- ori ---------------------------------
													 if ($status == 'Approved by Admin') { ?>

															<center>
																<div class="circledivPending">P</div>
															</center>
														<?php	} 

														else if ($status == 'Completed') { ?>
															<center>
																<div class="circledivComplete">C</div>
															</center>
														<?php	}

														 else if ($status == 'Cancelled') { ?>
															<center>
																<div class="circledivCancel">X</div>
															</center>
														<?php } 
														
														else { ?>
															<center>
																<div class="circledivPending">P</div>
															</center>
														<?php } ?>
														<h6 class="labelmodal">REQUESTOR</h6>
														<p style="font-size:10px"><?= $daterequest ?></p>

													</div>
												</li>
												<li class="list-inline-item event-list">
													<div class="px-1">
														<?php if ($adminname == '') { ?>
															<div class="event-date text-center">
																<img src="https://aifgrouplaos.la/public/img/linemanager.png" width="50px">
															</div>
														<?php $isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
															echo $isMob ? "<br></br></br>" : "";
														} else { ?>
															<div class="event-date text-center">
																<img src="https://aifgrouplaos.la/public/img/profile/<?php $adminprofile ?>" style="vertical-align: middle;
																  width: 50px;
																  height: 50px;
																  border-radius: 50%;">
															</div>
															<?php $isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
															echo $isMob ? "<br></br></br>" : "";
														}


														if ($adminid == null) {
															if ($status != "Cancelled") { ?>
																<center>
																	<div class="circledivPending">P</div>
																</center>
																<?php } else {
																if ($canceldate == '0000-00-00 00:00:00') { ?>
																	<center>
																		<div class="circledivPending">P</div>
																	</center>
																<?php } else { ?>
																	<center>
																		<div class="circledivCancel">X</div>
																	</center>
															<?php 	}
															}
														} else { ?>
															<center>
																<div class="circledivComplete">C</div>
															</center>
														<?php } ?>


														<h6 class="labelmodal">ADMIN HEAD</h6>

														<?php if ($adminname == '') { ?>
															<p style="font-size:10px"><br></p>
														<?php } else { ?>
															<p style="font-size:10px"><?php $admindate ?></p>
														<?php	} ?>

													</div>
												</li>
												<li class="list-inline-item event-list">
													<div class="px-1">
														<?php if ($givenby == '') { ?>
															<div class="event-date text-center">
																<img src="https://aifgrouplaos.la/public/img/linemanager.png" width="50px">
															</div>
														<?php $isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
															echo $isMob ? "<br></br></br>" : "";
														} else { ?>
															<div class="event-date text-center">
																<img src="https://aifgrouplaos.la/public/img/profile/<?php $givenprofile ?>" style="vertical-align: middle;
																  width: 50px;
																  height: 50px;
																  border-radius: 50%;">
															</div>
															<?php $isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
															echo $isMob ? "<br></br></br>" : "";
														}



														if ($given == null) {
															if ($status != "Cancelled") { ?>
																<center>
																	<div class="circledivPending">P</div>
																</center>
																<?php } else {
																if ($canceldate == '0000-00-00 00:00:00') { ?>
																	<center>
																		<div class="circledivPending">P</div>
																	</center>
																<?php } else { ?>
																	<center>
																		<div class="circledivCancel">X</div>
																	</center>
															<?php }
															}
														} else { ?>
															<center>
																<div class="circledivComplete">C</div>
															</center>
														<?php } ?>



														<h6 class="labelmodal">GAVE BY </h6>

														<?php if ($givenby == '') { ?>
															<p style="font-size:10px"><br></p>
														<?php } else { ?>
															<p style="font-size:10px"><?php $givendate ?></p>
														<?php }
														?>

													</div>
												</li>
											</ul>

										</div>
									</center>
								</div>
							</div>

						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<div class="d-flex">

							</div>
							<input type="hidden" id="id<?= $id ?>" value="<?= $id ?>" />

						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</form>
		</div>
		<script>
			$(document).ready(function() {
				$('#approve<?= $id ?>').click(function() {
					var id = $('#id<?= $id ?>').val();
					var r = confirm('Are you sure you want to approve this request?');
					if (r == true) {
						$.ajax({
							url: '<?= URL ?>Stationary/AppLine',
							type: 'GET',
							data: {
								id: id
							},
							success: function(response) {
								alert(response);

								$('#divdata' + id).css('background', 'tomato');
								$('#divdata' + id).fadeOut(800, function() {
									$(this).remove();
								});



							}
						});
					}
					return false;

				});
				$('#cancel<?= $id ?>').click(function() {
					var id = $('#id<?= $id ?>').val();
					var r = confirm('Are you sure you want to cancel this request?');
					if (r == true) {
						$.ajax({
							url: '<?= URL ?>Stationary/cancelRequest',
							type: 'GET',
							data: {
								id: id
							},
							success: function(response) {
								alert(response);
								$('#divdata' + id).css('background', 'tomato');
								$('#divdata' + id).fadeOut(800, function() {
									$(this).remove();
								});



							}
						});
					}
					return false;

				});
				$('#gavebyStat<?= $id ?>').click(function() {
					var id = $('#id<?= $id ?>').val();
					var r = confirm('Are you sure you want to Update?');
					if (r == true) {
						$.ajax({
							url: '<?= URL ?>Stationary/gavebyStat',
							type: 'GET',
							data: {
								id: id
							},
							success: function(response) {
								alert(response);
								$('.modal-backdrop').remove();
								$.ajax({
									type: 'GET',
									url: '<?= URL ?>Stationary/LoadData',
									dataType: 'html', //expect html to be returned
									success: function(response) {
										$('.modal-backdrop').remove();
										$('#view<?= $id ?>').hide(); // closes all active pop ups.
										$('#response').html(response);

									}

								});


							}
						});
					}
					return false;

				});
				$('#linemanager<?= $id ?>').click(function() {
					var id = $('#id<?= $id ?>').val();
					var r = confirm('Are you sure you want to Approved?');
					if (r == true) {
						$.ajax({
							url: '<?= URL ?>Stationary/AppLine',
							type: 'GET',
							data: {
								id: id
							},
							success: function(response) {
								alert(response);
								$('.modal-backdrop').remove();
								$.ajax({
									type: 'GET',
									url: '<?= URL ?>Stationary/LoadData',
									dataType: 'html', //expect html to be returned
									success: function(response) {
										$('.modal-backdrop').remove();
										$('#view<?= $id ?>').hide(); // closes all active pop ups.
										$('#response').html(response);

									}

								});


							}
						});
					}
					return false;

				});

				$('#adminApp<?= $id ?>').click(function() {
					var id = $('#id<?= $id ?>').val();
					var r = confirm('Are you sure you want to Approved?');
					if (r == true) {
						$.ajax({
							url: '<?= URL ?>Stationary/AdminLine',
							type: 'GET',
							data: {
								id: id
							},
							success: function(response) {
								alert(response);
								$('.modal-backdrop').remove();
								$.ajax({
									type: 'GET',
									url: '<?= URL ?>Stationary/LoadData',
									dataType: 'html', //expect html to be returned
									success: function(response) {
										$('.modal-backdrop').remove();
										$('#view<?= $id ?>').hide(); // closes all active pop ups.
										$('#response').html(response);

									}

								});


							}
						});
					}
					return false;
				});




			});
		</script>
	<?php } ?>
</div>



<script>
	$(document).ready(function() {
		// hide form on page load
		$('#cancel').hide();
	});




	$(document).ready(function() {

		// Delete
		$('.deleteGroup').click(function() {


			var r = confirm("Are you sure you want to Remove?");
			if (r == true) {



				var el = this;
				var id = this.id;
				var splitid = id.split("_");

				// Delete id
				var deleteid = splitid[1];

				$.ajax({
					url: <?php echo "'" . URL . "'" ?> + "Stocks/deleteStock",
					type: 'GET',
					data: {
						id: deleteid
					},
					success: function(response) {
						//alert(deleteid);
						//alert(response);
						///Removing row from HTML Table
						$(el).closest('tr').css('background', 'tomato');
						$(el).closest('tr').fadeOut(800, function() {
							$(this).remove();
						});


					}
				});
			} else {

			}

		});
	});
</script>






<!-- Bootstrap core JavaScript-->
<script src="<?php echo URL; ?>public/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo URL; ?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo URL; ?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo URL; ?>public/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo URL; ?>public/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo URL; ?>public/js/demo/datatables-demo.js"></script>

<script src="<?php echo URL; ?>public/js1/jquery-3.3.1.js"></script>
<script src="<?php echo URL; ?>public/js1/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>public/js1/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo URL; ?>public/js1/dataTables.buttons.min.js"></script>
<script src="<?php echo URL; ?>public/js1/buttons.bootstrap4.min.js"></script>
<script src="<?php echo URL; ?>public/js1/jszip.min.js"></script>
<script src="<?php echo URL; ?>public/js1/pdfmake.min.js"></script>
<script src="<?php echo URL; ?>public/js1/vfs_fonts.js"></script>
<script src="<?php echo URL; ?>public/js1/buttons.html5.min.js"></script>
<script src="<?php echo URL; ?>public/js1/buttons.print.min.js"></script>
<script src="<?php echo URL; ?>public/js1/buttons.colVis.min.js"></script>

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