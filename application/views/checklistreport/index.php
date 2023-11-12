
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cleaning Checklist Report/<span class="laotext">
			ລາຍງານລາຍການທຳຄວາມສະອາດ</span></h1>
          </div><!-- /.col -->
         
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
						List of Duties/<span class="laotext">ລາຍການໜ້າທີ່	
					</span></div>
              </div>
              <!-- /.card-header -->
						<div class="card-body">
							<form method="post" id="addData" enctype="multipart/form-data">								
								<div class="row">
									<div class="col-md-3">		
										<b>Start Date/<span class="laotext">ວັນທີເລີ່ມຕົ້ນ</span>	</b>										
											<input class="form-control" name="fid" id="facility" type="hidden" required>
											<input class="form-control" name="date" type="date"  id="date" required>								
									</div>	
									<div class="col-md-3">		
										<b>End Date/<span class="laotext">ວັນທີສິ້ນສຸດ</span></b>										
										
											<input class="form-control" name="enddate" type="date" required>								
									</div>	
									<div class="col-md-3">
										<b>Business Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></b>
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
									<div class="col-md-3">		
										<div id="loaddata"></div>
										
									</div>
														
								</div>
								<div id="divshow" style="display:none">
									<button type="submit" class="btn btn-sm btn-primary" id="submit" >
									Search record/<span class="laotext">ຄົ້ນຫາ</span></button>
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
	
	

	
	$("#addData").submit(function(){  
			$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "ChecklistReport/addDuties", 
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
							url: <?php echo  "'".  URL  ."ChecklistReport/loadfacility?id='";?> + cid ,             
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
