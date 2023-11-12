
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 
	
	getAjaxProject() ;
	 function getAjaxProject() {
					$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Stocks/LoadStock'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	};

	
	$("#submitins").submit(function(){  
		
				$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Stocks/AddStocks", 
							data: $(this).serialize()
							})
							.done(function(data){
								alert(data);
							$('#addres').fadeOut(500).html(data).fadeIn(300);
							getAjaxProject() ;
							//$('#submitins').trigger("reset");
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
            <h1 class="m-0 text-dark">Stocks History/ປະຫວັດສາງ</h1>
          </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo URL ;?>Stocks">Stocks List/ລາຍການສາງ</a></li>
              <li class="breadcrumb-item active">Stocks History/ປະຫວັດສາງ</li>
            </ol>
          </div>
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
				<?php echo $barcode. " ( ".$name." )";?>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
					

<div class="">



 

                <table class="table table-bordered table-responsive  table-striped laotext" id="example" width="100%" cellspacing="0">
                 <thead>
                  <tr>
				  
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Barcode/<span class="laotext">ບາໂຄດ</span></th>
                    <th >Date In/Out/<span class="laotext">ວັນທີເຂົ້າ-ອອກ</span></th>                    
                    <th width="250px">Qty/<span class="laotext">ຈຳນວນ</span></th>                    
                    <th>Unit_Price/<span class="laotext">ລາຄາ</span></th> 
                    
                    <th>Total_Amount/<span class="laotext">ລາຄາລວມ</span></th>                   
                    
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
				  //if (isset($app->barcode)) { $barcode= $app->barcode;	}else{$barcode="";}
				  if (isset($app->datein)) { $datein= $app->datein;	}else{$datein="";}
				  if (isset($app->addqty)) { $addqty= $app->addqty;	}else{$addqty="";}
				  if (isset($app->unitprice)) { $unitprice= $app->unitprice;	}else{$unitprice="";}
				  if (isset($app->totalcost)) { $totalcost= $app->totalcost;	}else{$totalcost="";}
				  $total=$total + $addqty;
				  $totalcost1=$totalcost1 + $totalcost ;
					
					
							echo "<tr>";
					
					echo "<td>".$c."</td>";
					
					echo "<td>".$barcode."</td>";
					echo "<td><div style='width:200px'>".$datein."</div></td>";
					echo "<td><div style='width:150px'>".number_format($addqty)."</div></td>";
					echo "<td><div style='width:150px'>".number_format($unitprice)."</div></td>";
					echo "<td><div style='width:150px'>".number_format($totalcost)."</div></td>";
			
					echo "</tr>";
					
				  }
				 
                
						 ?>
                
					
                  </tbody>
                </table>
				<hr>
				<?php echo "<h6>Total Qty:   ".number_format($total)."</h6>";?>
				<?php echo "<h6>Total Cost:   ".number_format($totalcost1)."</h6>";?>
						
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

<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">

			  
			  
			  
			  
			  
			  
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
	        lengthChange: false,
	        buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
  