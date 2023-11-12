
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cleaning Checklist/<span class="laotext">ລາຍການກວດສອບຄວາມສະອາດ </span></h1>
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
						Add Cleaning Checklist/<span class="laotext">ເພີ່ມລາຍການກວດສອບຄວາມສະອາດ</span>	
					</div>
              </div>
              <!-- /.card-header -->
						<div class="card-body">
							<form method="post" id="addData" enctype="multipart/form-data">								
								<div class="row">
									<div class="col-md-4">
										<b>Business Unit/ <span class="laotext"> ຫົວໜ່ວຍທຸລະກິດ </span></b>
										<div class="input-group mb-3">
											  <select class="form-control" name="cid" id="cid" required>
											  
													<?php
													echo '<option value="0">--Select Business Unit--</option>';
													foreach ($listbusiness as $app) { 	
														if (isset($app->cid))  $cid= $app->cid;	
														if (isset($app->cname))  $cname= $app->cname;
														echo '<option value="'.$cid.'">'.$cname.'</option>';
													}
													?>
													
											  </select>						  
										 </div>
									</div>	
									<div class="col-md-8">		
										<div id="loaddata"></div>
									</div>						
								</div>
								<div id="divshow" style="display:none">
								<hr>
									<div class="row">
										<div class="col-md-4">
											<b>Date/<span class="laotext">ວັນທີ</span></b>
											<input class="form-control" name="duties" id="duties" type="hidden" required>
											<input class="form-control" name="fid" id="facility" type="hidden" required>
											<input class="form-control" name="date" type="date"  id="date" required>
										</div>
										<div class="col-md-4">
											<b>Cleaner/<span class="laotext"> ຜູ້ທຳຄວາມສະອາດ</span></b>
											<input class="form-control" name="cleaner" type="text" required>
										</div>
										<div class="col-md-4">
										<b>Grade</b>
											 <select class="form-control" name="grade" required>		
												<option value="GOOD">GOOD/<span class="laotext"> ດີ</span></option>
												<option value="FAIR">FAIR/<span class="laotext"> ປານກາງ</span></option>
												<option value="POOR">POOR/<span class="laotext"> ບໍ່ສະອາດ</span></option>
											</select>
										</div>
									</div>
									<hr>
									<button type="submit" class="btn btn-sm btn-primary" id="submit"
									>Save Details/<span class="laotext"> ບັນທຶກ</span></button>
								</div>
							 </form>
							
							<hr>
							<div id="addres"></div>	
							
							
						
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


<script>
$(document).ready(function(){
	
	
	 getAjaxProject() ;
	 function getAjaxProject() {
					$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."TaskControl/loaddata'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	};
	
	$("#addData").submit(function(){  
			$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Checklist/addDuties", 
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
	
	$("#cid").change(function(){  
			var cid=$("#cid").val();
			//alert(room);
			$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Checklist/loadfacility?id='";?> + cid ,             
							dataType: "html",   //expect html to be returned                
							success: function(response){     
									//alert(response);
								$("#loaddata").html(response); 
								return false;
		
							}

						});
		return false;
		
	});

});
</script>






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
