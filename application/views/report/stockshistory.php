
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Stocks In and Out Report/
			<span class="laotext">ລາຍງານສາງເຂົ້າ-ອອກ</span></h1>
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
				Stock List/<span class="laotext">ລາຍການສາງ
              </span>
              </div>
			 
              <!-- /.card-header -->
					<div class="card-body">
							<form method="post" action="<?php echo URL ;?>Report/StockHistoryReport" enctype="multipart/form-data">								
								<div class="row">
									<div class="col-md-3">		
										<b>Start Date/<span class="laotext">ວັນທີເລີ່ມຕົ້ນ</span>	</b>		
											<input class="form-control" name="start" type="date"  value="<?php echo $start;?>" required>								
									</div>	
									<div class="col-md-3">		
										<b>End Date/
										<span class="laotext">ວັນທີສິ້ນສຸດ</span></b>										
										
											<input class="form-control" name="end" type="date" value="<?php echo $end;?>"  required>								
									</div>	
									<div class="col-md-3">
									<br>
										<button type="submit" class="btn btn-md btn-primary" id="submit" >Search record/ຄົ້ນຫາ
										</button>
									</div>	
									
														
								</div>
								
									
								
							 </form>
							<hr>
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">
 <table class="table table-bordered table-responsive  table-striped" id="example" width="100%" height="500px" cellspacing="0">
                 <thead>
                  <tr>
				  
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Barcode/<span class="laotext">ບາໂຄດ</span></th>
                    <th>Product/<span class="laotext">ເຄື່ອງ</span></th>
                    <th >Date_In/Out/<span class="laotext">ວັນທີເຂົ້າ-ອອກ</span></th>                    
                    <th width="250px">Qty/<span class="laotext">ຈຳນວນ</span></th>                    
                    <th>Unit_Price/<span class="laotext">ລາຄາ</span></th> 
                    
                    <th>Total_Amount/<span class="laotext">ລວມລາຄາ</span></th>                   
                    
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  $total=0;
				  $totalcost1=0;
				  //print_r($list);
				  foreach ($list as $app) { 
				  $c++;
				  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
				  if (isset($app->barcode)) { $barcode= $app->barcode;	}else{$barcode="";}
				  if (isset($app->datein)) { $datein= $app->datein;	}else{$datein="";}
				  if (isset($app->addqty)) { $addqty= $app->addqty;	}else{$addqty="";}
				  if (isset($app->unitprice)) { $unitprice= $app->unitprice;	}else{$unitprice="";}
				  if (isset($app->totalcost)) { $totalcost= $app->totalcost;	}else{$totalcost="";}
				  if (isset($app->pname)) { $pname= $app->pname;	}else{$pname="";}
				  if (isset($app->uom)) { $uom= $app->uom;	}else{$uom="";}
				  $total=$total + $addqty;
				  $totalcost1=$totalcost1 + $totalcost ;
					
					
							echo "<tr>";
					
					echo "<td>".$c."</td>";
					
					echo "<td>".$barcode."</td>";
					echo "<td><div style='width:300px'>".$pname."</div></td>";
					echo "<td><div style='width:200px'>".$datein."</div></td>";
					echo "<td><div style='width:150px'>".number_format($addqty)."</div></td>";
					echo "<td><div style='width:150px'>".number_format($unitprice)."</div></td>";
					echo "<td><div style='width:150px'>".number_format($totalcost)."</div></td>";
			
					echo "</tr>";
					
				  }
				 
                
						 ?>
                
					
                  </tbody>
                </table>
				
              </div>
			 
						
						</div>
						
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
  