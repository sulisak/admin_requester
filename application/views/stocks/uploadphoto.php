
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Stocks List/
			<span class="laotext">ລາຍການສາງ</span></h1>
          </div><!-- /.col -->
				<div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo URL ;?>Stocks">Stocks List/
			<span class="laotext">ລາຍການສາງ</span></a></li>
              <li class="breadcrumb-item active">Update Image</li>
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
				Update Photo <?php echo $name;?>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
					            	<form  method="post" action="<?php echo  URL ;?>Stocks/loadPicturepro"    multipart="" enctype="multipart/form-data">
                        							<br>
                        							<img src="<?php echo  URL ;?>public/img/stock/<?php echo $photo;?>" class="img-fluid" id="uploadPreview" >
                        										<br>
                        									   <label for="FileInput">
                        										
                        										<i class="fas fa-edit" style="color:#c7c7c7;font-size:16px">click to photo</i>
                        										
                        									   </label>
                        									  <input id="FileInput" type="file" name="logo" required
                        									  onchange="PreviewImage()" style="cursor: pointer;  display: none" accept="image/x-png,image/gif,image/jpeg" />
                        					
                        										<script>
                        										   function PreviewImage() {
                        												var oFReader = new FileReader();
                        												oFReader.readAsDataURL(document.getElementById("FileInput").files[0]);
                        
                        												oFReader.onload = function (oFREvent) {
                        													document.getElementById("uploadPreview").src = oFREvent.target.result;
                        												};
                        											};
                        										</script>
										<br>
										<input type="hidden" name="id" value="<?php echo $id;?>"/>
										  <button type="submit" class="btn btn-primary " >Save Details</button>
										 </form>
				
				

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
