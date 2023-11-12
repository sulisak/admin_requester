
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update User Form/<span class="laotext">ແບບຟອມແກ້ໄຂຜູ້ໃຊ້ງານ</span></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo URL ;?>Users">User list/<span class="laotext">ລາຍການຜູ້ໃຊ້</span></a></li>
              <li class="breadcrumb-item active">Update User Information/<span class="laotext">ແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້</span></li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="<?php echo URL ;?>Users/UpdateUser" method="Post" enctype="multipart/form-data" >
         <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
				
				Update User Information/<span class="laotext">ແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້</span>
				
				</h3>
              </div>
			  <?php
			 //print_r($list);
			    foreach ($list as $app) { 
				
					if (isset($app->userid))  $userid= $app->userid;	
					if (isset($app->username))  $username= $app->username;	
					if (isset($app->fullname))  $fullname= $app->fullname;	
					if (isset($app->contact))  $contact= $app->contact;	
					if (isset($app->depid))  $depid= $app->depid;	
					if (isset($app->department))  $department= $app->department;	
					if (isset($app->cid))  $cid= $app->cid;	
					if (isset($app->company))  $company= $app->company;	
					if (isset($app->profile))  $profile= $app->profile;	
					if (isset($app->position))  $position= $app->position;	
					if (isset($app->Email))  $Email= $app->Email;	
						if (isset($app->position1))  $position1= $app->position1;
						if (isset($app->signatories))  $signatories= $app->signatories;
						
				}
				?>
              <!-- /.card-header -->
					<div class="card-body">	
					
							<div class="row">
								<div class="col-md-4 mt-3 text-center">
								<img src="<?php echo URL ;?>public/img/profile/<?php echo $profile;?>" class="img-circle" id="uploadPreview" width="150px" height="150px">
														<br>
													   <label for="FileInput">
														
														<i class="fas fa-edit" style="color:#c7c7c7;font-size:16px">	click edit/ຄຼິກແກ້ໄຂ</i><br>
														<i style="color:#c7c7c7;font-size:11px">
														Set image profile/<span class="laotext">ຕັ້ງຮູບຜູ້ໃຊ້</span></i>
													   </label>

													  <input id="FileInput" type="file" name="logo" 
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
									<div class="col-md-8">
									<div class="row">
									<div class="col-md-12">
										<b>USERNAME/<span class="laotext">ຜູ້ໃຊ້ງານ</span></b>
										<div class="input-group mb-3">
										  <input type="text" class="form-control" disabled="disabled" placeholder="Enter Username" value="<?php echo $username;?>">
										  <div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-id-card"></i></span>
										  </div>
										</div>
										<b>FULLNAME/<span class="laotext">ຊື່ເຕັມ</span></b>
										<div class="input-group mb-3">
										  <input type="text" class="form-control" name="fn" required placeholder="Enter Fullname" value="<?php echo $fullname;?>">
										  <input type="hidden" class="form-control" name="id" value="<?php echo $userid;?>" required placeholder="Enter Fullname">
										  <div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-user"></i></span>
										  </div>
										</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<b>Email/<span class="laotext">ອີເມວ</span></b>
											<div class="input-group mb-3">
											  <input type="text" class="form-control" name="email" required placeholder="Enter Email" value="<?php echo $Email;?>">
											  <div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-mobile"></i></span>
											  </div>
											</div>
										</div>
										<div class="col-md-6">
											<b>CONTACT NUMBER/<span class="laotext">ເບີຕິດຕໍ່</span></b>
											<div class="input-group mb-3">
											  <input type="text" class="form-control" name="cn" required placeholder="Enter Contact Number" value="<?php echo $contact;?>">
											  <div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-mobile"></i></span>
											  </div>
											</div>
										</div>
									</div>
										
										
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-md-6">
									<b>BUSINESS UNIT/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></b>
										<div class="input-group mb-3">
										
										  <select class="form-control" name="bu" required >
											<?php
											echo '<option value="'.$cid.'">'.$company.'</option>';
											  foreach ($listcompany as $app) { 
												if (isset($app->cid))  $cid= $app->cid;	
												if (isset($app->cname))  $cname= $app->cname;
												echo '<option value="'.$cid.'">'.$cname.'</option>';
											  }
											?>
											
										  </select>
										  <div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-filter"></i></span>
										  </div>
										</div>
									</div>
									<div class="col-md-6">
										<b>DEPARTMENT/<span class="laotext">ພະແນກ</span></b>
											<div class="input-group mb-3">
											
											  <select class="form-control" name="dep" required >
												<?php
												echo '<option value="'.$depid.'">'.$department.'</option>';
												  foreach ($listdepartment as $app) { 
													if (isset($app->did))  $did= $app->did;	
													if (isset($app->department))  $department= $app->department;
													echo '<option value="'.$did.'">'.$department.'</option>';
												  }
												?>
												
											  </select>
											  <div class="input-group-append">
												<span class="input-group-text"><i class="fas fa-filter"></i></span>
											  </div>
											</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<b>USER TYPE/<span class="laotext">ປະເພດຜູ້ໃຊ້</span></b>
										<div class="input-group mb-3">
										
										  <select class="form-control" name="ut" required >
										  <?php
												echo '<option value="'.$position.'">'.$position.'</option>';
											?>
											<option value="Requestor">Requestor/<span class="laotext">ຜູ້ຮ້ອງຂໍ</span></option>
												<option value="DocumentController">DocumentController/<span class="laotext"> ຜູ້ຄວບຄຸມເອກະສານ  </span></optionon>
												<option value="Finance">Finance/<span class="laotext"> ການເງິນ  </span></option>
											<option value="LineManager">LineManager/<span class="laotext">ຫົວໜ້າສາຍງານ</span></option>
											<option value="Inspector">Inspector/<span class="laotext">ຜູ້ກວດກາເຕັກນິກ</span></option>
											<option value="Administration">Administration/<span class="laotext">ຜູ້ບໍລິຫານລະບົບ</span></option>
										 </select>
										  <div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-filter"></i></span>
										  </div>
										</div>
									</div>
									<div class="col-md-6">
										<b>POSITION/<span class="laotext">ຕຳແໜ່ງ</span></b>
										<div class="input-group mb-3">
										   <input type="text" class="form-control" name="position"  value=" <?php echo $position1;?> " placeholder="Enter Position " required >
										  <div class="input-group-append">
											<span class="input-group-text"><i class="fas fa-vote-yea"></i></span>
										  </div>
										</div>
									</div>
								</div>
									<div class="row">	
								    	<div class="col-md-6">
    										<b>PASSWORD/<span class="laotext">ລະຫັດ</span></b>
    										<div class="input-group mb-3">
    										  <input type="text" class="form-control" disabled value="******" name="pw" required placeholder="Enter Password">
    										  <div class="input-group-append">
    											<span class="input-group-text"><i class="fas fa-key"></i></span>
    										  </div>
    										</div>
    									</div>
    									<div class="col-md-6">
                    						<b>SIGNATORIES FOR PCM<span class="laotext"></span></b>
                    						<div class="input-group mb-3">
                    						   <select class="form-control" name="sig" required >
                    						       
                    						       <?php 
                    						            If($signatories==0){
                    						                echo '<option value="0" selected>NO<span class="laotext"></span></option>';
                    						            }else{
                    						                echo '<option value="1" selected>YES<span class="laotext"></span></option>';
                    						            }
                    						       ?>
                    						       
                    						       
                    						       	
                			                    	<option value="0">NO<span class="laotext"></span></option>
                						            <option value="1">YES<span class="laotext"> </span></option>
                						            </select>
                    						  <div class="input-group-append">
                    							<span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                    						  </div>
                    						</div>
                    					</div>
									</div>
								
				
				
				
									


						</div>
						 <div class="modal-footer ">
						  <button type="button" class="btn btn-danger" data-dismiss="modal">Close/<span class="laotext">ປິດ</span></button>
						  <button type="submit" class="btn btn-primary">Save User/<span class="laotext">ບັນທຶກ</span></button>
						</div>
						
						
					 </div>
				</div>
				</form>
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
