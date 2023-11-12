
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
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
                <div class="card-title">					
						Activity for <?php echo date('F d Y', strtotime($date));?>
					</div>
              </div>
              <!-- /.card-header -->
						<div class="card-body">
							
			<div class="row">
			<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo number_format($totalRequest);?></h3>

                <p>Total Request Vehicle/<span class="laotext">ລວມການຂໍເບີກລົດ</span></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo URL ;?>Request/History" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo number_format($totalRequestBook);?></h3>

                <p>Total Room Request/
				<span class="laotext">ລວມການຈອງຫ້ອງປະຊຸມ</span></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo URL ;?>BookRoom" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 ><?php echo number_format($totalRequestStationary);?></h3>

                <p >Total Stationary Request/
				<span class="laotext">ລວມການຮ້ອງຂໍເບີກເຄື່ອງ</span></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo URL ;?>Stationary" class="small-box-footer" >More info
			  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                 <h3 ><?php echo number_format($totalUserActive);?></h3>

                <p>Total  Active  User(s)/
				<span class="laotext">ລວມຜູ້ໃຊ້ງານທັງໝົດ</span></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
			  <a href="#" class="small-box-footer" style="color:#fff"> <i class="fas fa-arrow-circle-right1"></i></a>
             </div>
          </div>
          <!-- ./col -->
        </div>
		
		
		
		<div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Active Users/
					<span class="laotext">ຜູ້ໃຊ້ງານເຂົ້າໃຊ້ງານປະຈຸບັນ </span> </h3>

                    <div class="card-tools">
                     <!-- <span class="badge badge-danger">8 New Members</span>-->
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>-->
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
					
						<?php
						//print_r($listuser);
						
						foreach ($listuser as $app) { 
						
						  if (isset($app->Uname)){  $Uname= $app->Uname;}else{$Uname="";}	
						  if (isset($app->profile)){  $profile= $app->profile;}else{$profile="";}	
						  if (isset($app->username)){  $username= $app->username;}else{$username="";}	
						  echo '
						  <li>
								<img src="'. URL .'public/img/profile/'. $profile .'" alt="User Image"
									width="60px">
								<a class="users-list-name" href="#">'. $Uname .'</a>
								<span class="users-list-date">'. $username .'</span>
							  </li>
						  ';
						}
						?>
                      
                      
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="<?php echo URL ;?>Users">View All Users/
					<span class="laotext">ຜູ້ໃຊ້ງານທັງໝົດ</span></a>
                  </div>
                  <!-- /.card-footer -->
                </div>

		
		
			
			
			
						
						</div>
					 </div>
				</div>
		 </div>
		 
		 <div class="card">
              <div class="card-header border-0">
			    <form method="post" action="<?php echo URL ;?>Dashboard/Details" enctype="multipart/form-data">								
								<div class="row">
									<div class="col-md-3">		
										<b>Start Date/<span class="laotext">ວັນທີເລີ່ມຕົ້ນ</span>	</b>		
											<input class="form-control" name="startsearch" type="date"  value="<?php echo $startsearch;?>" required>								
									</div>	
									<div class="col-md-3">		
										<b>End Date/<span class="laotext">ວັນທີສຸດທ້າຍ</span></b>										
										
											<input class="form-control" name="endsearch" type="date" value="<?php echo $endsearch;?>"  required>								
									</div>	
									<div class="col-md-3">
									<br>
										<button type="submit" class="btn btn-md btn-primary" id="submit"
										>Search record/<span class="laotext">ຄົ້ນຫາຂໍ້ມູນ</span>
										</button>
									</div>	
									
														
								</div>
								
									
								
							 </form>
							 <hr>
                <h3 class="card-title" style="font-weight:bold">Request Vehicle/
				<span class="laotext">ຂໍເບີກລົດ</span></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                </div>
              </div>
              <div class="card-body p-0">
			
					<div class="row">
						<div class="col-md-4">
							<table class="table table-striped table-valign-middle ">
							  <thead>
							  <tr class="bg-info">
								<th>No./<span class="laotext">ລຳດັບ</span></th>
								<th>Request Status/<span class="laotext">ສະຖານະຮ້ອງຂໍ</span></th>
								<th>Count/<span class="laotext">ຈຳນວນ</span>	</th>								
							  </tr>
							  </thead>
							  <tbody>
							  <tr>								
								<td>1</td>
								<td> Pending/<span class="laotext">ລໍຖ້າ</span></td>
								<td> <?php echo number_format($totalPending); ?></td>
							  </tr>
							  <tr>								
								<td> 2</td>
								<td> Completed/<span class="laotext">ສຳເລັດ</span></td>
								<td> <?php echo number_format($totalComplete); ?></td>
							  </tr>
							  
							  <tr>								
								<td> 3</td>
								<td> Cancelled/<span class="laotext">ຍົກເລີກ</span></td>
								<td> <?php echo number_format($totalCancel); ?></td>
							  </tr>
							  </tbody>
							</table>
							
						</div>
						<div class="col-md-8">
						<table class="table table-striped table-valign-middle ">
							  <thead>
							  <tr class="bg-info">
								<th >No./<span class="laotext">ລຳດັບ</span></th>
								<th>Top most request vehicle/
								<span class="laotext">ລວມການຂໍເບີກລົດທັງໝົດ</span></th>
															
							  </tr>
							  </thead>
							  <tbody>
							  <?php
							  $c=0;
							  foreach ($listtop as $app) { 
									if (isset($app->vehicleid)){  $vehicleid= $app->vehicleid;}else{$vehicleid="";}	
									if (isset($app->vmaker)){  $vmaker= $app->vmaker;}else{$vmaker="";}	
									if (isset($app->vmodel)){  $vmodel= $app->vmodel;}else{$vmodel="";}	
									if (isset($app->platenum)){  $platenum= $app->platenum;}else{$platenum="";}	
									if (isset($app->vyear)){  $vyear= $app->vyear;}else{$vyear="";}	
									if (isset($app->vcolor)){  $vcolor= $app->vcolor;}else{$vcolor="";}	
									$c++;
									echo "
									  <tr>	
											<td>".$c."</td>
											<td>".strtoupper($vmaker)." ".$vmodel." ".strtoupper($vcolor)."  ".$vyear."  #".$platenum." 
									  </tr>
									";
								}
								
							  ?>
							 
							  </tbody>
							</table>
						</div>
					</div>
					
					<hr>
					<div class="row">
						<div class="col-md-12" style="padding-left:25px">
						<h3  class="card-title" style="font-weight:bold">
						Vehicle Maintainance/<span class="laotext">ການບຳລຸງຮັກສາລົດ</span></h3>
						</div>
					</div>
					
					<br>
					
					<div class="row">
						<div class="col-md-4">
							<table class="table table-striped table-valign-middle ">
							  <thead>
							  <tr class="bg-info">
								<th>No./<span class="laotext">ລຳດັບ</span></th>
								<th>Details/<span class="laotext">ລາຍລະອຽດ</span></th>														
								<th>Count/<span class="laotext">ຈຳນວນ</span></th>														
							  </tr>
							  </thead>
							  <tbody>
							  <tr>								
								<td> 1</td>
								<td> Total Cost/<span class="laotext">ລາຄາລວມ</span></td>
								<td> <?php echo number_format($totalCost); ?></td>
							  </tr>
							  <tr>								
								<td> 2</td>
								<td> Total Pending work/<span class="laotext">ລວມວຽກທີ່ຍັງຄ້າງ</span></td>
								<td> <?php echo number_format($totalMPending); ?></td>
							  </tr>
							  
							  </tbody>
							</table>
							
						</div>
						<div class="col-md-8">
						<table class="table table-striped table-valign-middle">
							  <thead>
							  <tr class="bg-info">
								<th>No./<span class="laotext">ລຳດັບ</span></th>
								<th>Top 3 most cost vehicle/
								<span class="laotext">ລວມລາຄາສ້ອມແປງ 3 ຄັນ</span></th>
															
							  </tr>
							  </thead>
							  <tbody>
							  <?php
							  $c=0;
							 // print_r($listtopcost);
							  foreach ($listtopcost as $app) { 
									if (isset($app->vid)){  $vid= $app->vid;}else{$vid="";}	
									if (isset($app->vmaker)){  $vmaker= $app->vmaker;}else{$vmaker="";}	
									if (isset($app->vmodel)){  $vmodel= $app->vmodel;}else{$vmodel="";}	
									if (isset($app->platenum)){  $platenum= $app->platenum;}else{$platenum="";}	
									if (isset($app->vyear)){  $vyear= $app->vyear;}else{$vyear="";}	
									if (isset($app->vcolor)){  $vcolor= $app->vcolor;}else{$vcolor="";}	
									$c++;
									echo "
									  <tr>	
											<td>".$c."</td>
											<td>".strtoupper($vmaker)." ".$vmodel." ".strtoupper($vcolor)."  ".$vyear."  #".$platenum." </td>
									  </tr>
									";
								}
								
							  ?>
							 
							  </tbody>
							</table>
						</div>
					</div>
					
					<hr>
					<div class="row">
						<div class="col-md-12" style="padding-left:25px">
						<h3  class="card-title" style="font-weight:bold">Vehicle Fuel/<span class="laotext">
						ນ້ຳມັນລົດ</span></h3>
						</div>
					</div>
					
					<br>
					
					<div class="row">
						<div class="col-md-4">
							<table class="table table-striped table-valign-middle">
							  <thead>
							  <tr class="bg-info">
								<th>No./<span class="laotext">	ລຳດັບ</span></th>
								<th>Details/<span class="laotext">ລາຍລະອຽດ</span></th>														
								<th>Count/<span class="laotext">ຈຳນວນ</span>	</th>														
							  </tr>
							  </thead>
							  <tbody>
							  <tr>								
								<td> 1</td>
								<td> Total Fuel Cost/ <span class="laotext">ລວມລາຄານ້ຳມັນ</span></td>
								<td> <?php echo number_format($totalFuel); 
								//echo $newdate = date("Y-m-d", strtotime("-1 months",$startsearch));
								
								?></td>
							  </tr>
							  <tr>								
								<td> 2</td>
								<td> Total Fuel Last Cost/ <span class="laotext">ລວມລາຄານ້ຳມັນລ້າສຸດ</span></td>
								<td> <?php echo number_format($totalFuellast); ?></td>
							  </tr>
							  <tr>								
								<td> 3</td>
								<td> Total Difference/
								 <span class="laotext">ລວມຄວາມແຕກຕ່າງທັງໝົດ</span></td>
								<td> <?php echo number_format($totalFuel - $totalFuellast); ?></td>
							  </tr>
							  
							  </tbody>
							</table>
							
						</div>
						<div class="col-md-8">
						<table class="table table-striped table-valign-middle">
							  <thead>
							  <tr class="bg-info">
								<th>No./ <span class="laotext">ລຳດັບ</span></th>
								<th>Top 3 most cosumable vehicle/
								 <span class="laotext">3 ລຳດັບຕົ້ນທີ່ໃຊ້ລ້າສຸດ</span></th>
															
							  </tr>
							  </thead>
							  <tbody>
							  <?php
							  $c=0;
							 // print_r($listtopcostfuel);
							  foreach ($listtopcostfuel as $app) { 
									if (isset($app->vid)){  $vid= $app->vid;}else{$vid="";}	
									if (isset($app->vmaker)){  $vmaker= $app->vmaker;}else{$vmaker="";}	
									if (isset($app->vmodel)){  $vmodel= $app->vmodel;}else{$vmodel="";}	
									if (isset($app->platenum)){  $platenum= $app->platenum;}else{$platenum="";}	
									if (isset($app->vyear)){  $vyear= $app->vyear;}else{$vyear="";}	
									if (isset($app->vcolor)){  $vcolor= $app->vcolor;}else{$vcolor="";}	
									$c++;
									echo "
									  <tr>	
											<td>".$c."</td>
											<td>".strtoupper($vmaker)." ".$vmodel." ".strtoupper($vcolor)."  ".$vyear."  #".$platenum." </td>
									  </tr>
									";
								}
								
							  ?>
							 
							  </tbody>
							</table>
						</div>
					</div>
					
					<hr>
					<div class="row">
						<div class="col-md-12" style="padding-left:25px">
						<h3  class="card-title" style="font-weight:bold">Meeting Room Request/
						 <span class="laotext">ການຮ້ອງຂໍຈອງຫ້ອງປະຊຸມ</span></h3>
						</div>
					</div>
					
					<br>
					
					<div class="row">
						<div class="col-md-4">
							<table class="table table-striped table-valign-middle">
							  <thead>
							  <tr class="bg-success">
								<th>No./ <span class="laotext">ລຳດັບ</span></th>
								<th>Details/ <span class="laotext">ລາຍລະອຽດ</span>		</th>														
								<th>Count/ <span class="laotext">ຈຳນວນ</span></th>														
							  </tr>
							  </thead>
							  <tbody>
							  <tr>								
								<td> 1</td>
								<td> Total  Pending Request/ <span class="laotext">ລວມການຈອງທີ່ຍັງຄ້າງ</span></td>
								<td> <?php echo number_format($totalBookPending); 
								//echo $newdate = date("Y-m-d", strtotime("-1 months",$startsearch));
								
								?></td>
							  </tr>
							  <tr>								
								<td> 2</td>
								<td> Total  Completed Request/ <span class="laotext">ລວມການຈອງສຳເລັດ</span></td>
								<td> <?php echo number_format($totalBookcomplete); ?></td>
							  </tr>
							  <tr>								
								<td> 3</td>
								<td> Total  Cancelled Request/ <span class="laotext">ລວມການຈອງຖືກຍົກເລີກ</span></td>
								<td> <?php echo number_format($totalBookcancel); ?></td>
							  </tr>
							 
							  
							  </tbody>
							</table>
							
						</div>
						<div class="col-md-8">
						<table class="table table-striped table-valign-middle">
							  <thead>
							  <tr class="bg-success">
								<th>No./ <span class="laotext">ລຳດັບ</span></th>
								<th>Top 3 most used room/ <span class="laotext">ລວມການໃຊ້ຫ້ອງປະຊຸມ 3 ຫ້ອງລ້າສຸດ</span></th>
															
							  </tr>
							  </thead>
							  <tbody>
							  <?php
							  $c=0;
							// print_r($listtop3meetingroom);
							  foreach ($listtop3meetingroom as $app) { 
									if (isset($app->roomName)){  $roomName= $app->roomName;}else{$roomName="";}	
								
									$c++;
									echo "
									  <tr>	
											<td>".$c."</td>
											<td>".strtoupper($roomName)."</td>
									  </tr>
									";
								}
								
							  ?>
							 
							  </tbody>
							</table>
						</div>
					</div>
					
						
					<hr>
					<div class="row">
						<div class="col-md-12" style="padding-left:25px">
						<h3  class="card-title" style="font-weight:bold">Stationary Request/
						 <span class="laotext">ຂໍເບີກເຄື່ອງ</span></h3>
						</div>
					</div>
					
					<br>
					
					<div class="row">
						<div class="col-md-4">
							<table class="table table-striped table-valign-middle">
							  <thead>
							  <tr class="bg-warning">
								<th>No./ <span class="laotext">ລຳດັບ</span></th>
								<th>Details/ <span class="laotext">ລາຍລະອຽດ</span></th>														
								<th>Count/ <span class="laotext">ຈຳນວນ</span></th>														
							  </tr>
							  </thead>
							  <tbody>
							  <tr>								
								<td> 1</td>
								<td> Total Pending Request/ <span class="laotext">ລວມຮ້ອງຂໍທີ່ຍັງຄ້າງ</span></td>
								<td> <?php echo number_format($totalStationPending); 
								//echo $newdate = date("Y-m-d", strtotime("-1 months",$startsearch));
								
								?></td>
							  </tr>
							  <tr>								
								<td> 2</td>
								<td> Total Completed Request/ <span class="laotext">ລວມຮ້ອງຂໍສຳເລັດ</span></td>
								<td> <?php echo number_format($totalStationCompleted); ?></td>
							  </tr>
							  <tr>								
								<td> 3</td>
								<td> Total Cancelled Request/ <span class="laotext">ລວມຍົກເລີກ </span></td>
								<td> <?php echo number_format($totalStationCancelled); ?></td>
							  </tr>
							  
							  </tbody>
							</table>
							
						</div>
						<div class="col-md-8">
						<table class="table table-striped table-valign-middle">
							  <thead>
							  <tr class="bg-warning">
								<th>No./ <span class="laotext">ລຳດັບ</span></th>
								<th>Top 3 most requested item/ <span class="laotext">
								ລາຍການຮ້ອງຂໍ 3 ລາຍການຕົ້ນ</span></th>
															
							  </tr>
							  </thead>
							  <tbody>
							  <?php
							  $c=0;
							 // print_r($listtopcostfuel);
							  foreach ($listtop3item as $app) { 
									if (isset($app->barcode)){  $barcode= $app->barcode;}else{$barcode="";}	
									if (isset($app->pname)){  $pname= $app->pname;}else{$pname="";}	
									if (isset($app->uom)){  $uom= $app->uom;}else{$uom="";}	
								
									$c++;
									echo "
									  <tr>	
											<td>".$c."</td>
											<td>".strtoupper($pname)." - ".strtoupper($pname)."  (".$uom.")   </td>
									  </tr>
									";
								}
								
							  ?>
							 
							  </tbody>
							</table>
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


