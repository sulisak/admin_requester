
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
							url: <?php echo  "'".  URL  ."Report/FuelReportPro'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	};
	$("#vid").change(function(){  
				var vid=$("#vid").val();
				//alert(vid);
				$.ajax({    //create an ajax request to display.php
								type: "GET",
								url: <?php echo  "'".  URL ."'";?> + 'Report/loadmileage?id=' + vid,             
								dataType: "html",   //expect html to be returned                
								success: function(response){                    
									//$("#response").html(response); 
									//alert(response);
									
	 
								$("#mm").val(response);
								$("#mm1").val(response);
								}

							});
			return false;
			
		});
	
	$("#submitins").submit(function(){  
			$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Fuel/AddFuel", 
							data: $(this).serialize()
							})
							.done(function(data){
							$('#addres').fadeOut(500).html(data).fadeIn(300);
							getAjaxProject() ;
							})
							.fail(function() {
							alert( "Posting failed." );
							});
							return false;
		
	});
	

	$("#amount").change(function(){  
			var amount=$("#amount").val();
			var oil=$("#oil").val();
			//alert("sadsa");
			var totallitter= amount / oil;
			var f = totallitter;
			f.toFixed( 2 ); 
			$("#tl1").val(f.toFixed( 2 ));
			$("#tl").val(f.toFixed( 2 ));
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
	$("#senddataform").submit(function(){  
	
			$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Report/FuelReportPro", 
							data: $(this).serialize()
							})
							.done(function(data){
							//alert(data); 
							$("#response").html(data); 
							//alert("SAsa");
							//getAjaxProject() ;
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
            <h1 class="m-0 text-dark">Vehicle Fuel/
			<span class="laotext">ນ້ຳມັນລົດ</span></h1>
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
				Vehicle List/<span class="laotext">ລາຍການລົດ
				</span>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
					<form method="post" id="senddataform" >
							<div class="row">
								
							<div class="col-md-3">
								<input type="date" name="start" class="form-control" required>
							</div>
							<div class="col-md-3">
								<input type="date" name="edate" class="form-control" required>
							</div>
							<div class="col-md-3">
							
								<Select class="form-control"  name="car">
								<option value="ALL">ALL/
								<span class="laotext">ທັງໝົດ</span></option>
								<?php
									//print_r($vehicle);
									 foreach ($vehicle as $app) { 
									  if (isset($app->vid)){  $vid= $app->vid;}else{$vid="";}	
									  if (isset($app->vyear)){  $vyear= $app->vyear;}else{$vyear="";}	
									  if (isset($app->plate)){  $plate= $app->plate;}else{$plate="";}	
									  if (isset($app->maker)){  $maker= $app->maker;}else{$maker="";}	
									  if (isset($app->modelcar)){  $modelcar= $app->modelcar;}else{$modelcar="";}	
									  if (isset($app->vcolor)){  $vcolor= $app->vcolor;}else{$vcolor="";}	
									  echo '<option value="'.$vid.'">'.$maker.' '.$modelcar.' '.$vyear.' '.$vcolor.' #'.$plate.' </option>';
									 }
								 ?>
								</Select>
							</div>
							<div class="col-md-3">
								<input type="submit" class="btn btn-primary" value="Search Data">
							</div>						
							
							</div>
							
							</form>	
							<hr>
							<div id="response"></div>
			 

						</div>
					 </div>
				</div>
		 </div>
		 
		 
		 
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </di 	 	v>
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
