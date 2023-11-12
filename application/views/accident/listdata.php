<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Accident Report/<span class="laotext">ລາຍງານອຸປະຕິເຫດ</span></h1>
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
                
                	<form method="post" action="<?php echo URL ;?>AccidentReport/ListData" 
					enctype="multipart/form-data">								
								<div class="row">
									<div class="col-md-3">		
										<b>Start Date/<span class="laotext">ເລີ່ມວັນທີ</span>	</b>		
											<input class="form-control" name="start" type="date"  value="<?php echo $start;?>" required>								
									</div>	
									<div class="col-md-3">		
										<b>End Date/<span class="laotext">ວັນທີສິ້ນສຸດ</span>	</b>										
										
											<input class="form-control" name="end" type="date" value="<?php echo $end;?>"  required>								
									</div>	
									<div class="col-md-3">
									<br>
										<button type="submit" class="btn btn-md btn-primary" id="submit" >
										Search record/<span class="laotext">ຄົ້ນຫາ</span></button>
									</div>	
									
														
								</div>
								
									
								
							 </form>
						
              </div>
              <!-- /.card-header -->
					<div class="card-body">
								<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>


<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="">



 

                <table class="table table-bordered table-hover table-responsive  table-striped" id="example" width="100%" cellspacing="0">
                 <thead>
                 <tr>
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Date/<span class="laotext">ວັນທີ</span></th><th>Driver/<span class="laotext">ຄົນຂັບລົດ</span></th>
                    <th>Vehicle/<span class="laotext">ຊື່ລົດ</span> </th> 
                    <th>Cause_of_Accident/<span class="laotext">ສາເຫດອຸປະຕິເຫດ</span> </th> 
                                
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				 // print_r($list1);
				  foreach ($list1 as $app) { 
				  $c++;
				  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
				  if (isset($app->driver)) { $driver= $app->driver;	}else{$driver="";}
					if (isset($app->datetime)){  $datetime= $app->datetime;	}else{$datetime="";}
					if (isset($app->cause)){  $cause= $app->cause;	}else{$cause="";}					
					if (isset($app->remarks)){  $remarks= $app->remarks;	}else{$remarks="";}
					if (isset($app->vyear)) { $vyear= $app->vyear;	}else{$vyear="";}
					if (isset($app->color)) { $color= $app->color;	}else{$color="";}
					if (isset($app->plate)) { $plate= $app->plate;	}else{$plate="";}
					if (isset($app->maker)) { $maker= $app->maker;	}else{$maker="";}
					if (isset($app->model))  {$model= $app->model;	}else{$model="";}					
					if (isset($app->vid )){  $vid = $app->vid ;	}else{$vid="";}
				
					
					
						echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td><div style='width:150px'>".$datetime."</div></td>";
					echo "<td><div style='width:150px'>".$driver."</div></td>";
					echo "<td><div style='width:450px'>".$maker." ".$model." ".$vyear ." #".$plate." " . $color."</div></td>";
					echo "<td><div style='width:500px'>".$cause."</div></td>";
				
								
	
					echo "</tr>";
					
				
				  }
				  ?>
                    </tbody>
                </table>
				
              </div>
			  

			  
			  
			  
			  
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo URL ;?>public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo URL ;?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo URL ;?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo URL ;?>public/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo URL ;?>public/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo URL ;?>public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo URL ;?>public/js/demo/datatables-demo.js"></script>
  
       <script src="<?php echo URL ;?>public/js1/jquery-3.3.1.js"></script>
    <script src="<?php echo URL ;?>public/js1/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/dataTables.buttons.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/jszip.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/pdfmake.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/vfs_fonts.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.html5.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.print.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.colVis.min.js"></script>

    <script>
	$(document).ready(function() {
	    var table = $('#example').DataTable( {
	         lengthChange: true,
	       // buttons: [ 'copy', 'excel', 'csv' ],
		    buttons: [
            {
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
			 ,
			paging:         true,	
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
  
								
								
								
								
								

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
