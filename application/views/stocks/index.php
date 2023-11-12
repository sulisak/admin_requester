
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
            <h1 class="m-0 text-dark">Stocks List/
			<span class="laotext">ລາຍການສາງ</span></h1>
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
				<button class="btn btn-xs btn-block bg-gradient-primary btn-flat"  data-toggle="modal" data-target="#Add">
								<i class="fas fa-plus"></i> Add new/
								<span class="laotext">ເພີ່ມໃໝ່ </span>
							</button>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body ">
					
							<div id="response"></div>
			 <hr>
							<table class="table-responsive laotext">
								<tr>
									
									<td bgcolor="#ffced4" style="width:30px"></td>
									<td>&nbsp; Exceed the maximum critical limit of items/
									<span class="laotext">ເກີນຂີດຈຳກັດສູງສຸດຂອງລາຍການ</span></td>
									
								<tr>
							<table>

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

<div class="modal fade" id="Add">
<form id ="submitins" method="post">
       <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">ADD NEW RECORD/
			  <span class="laotext">ເພີ່ມໃໝ່</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="row">
						<div class="col-md-6">	
						<strong >Product ID /Barcode/
						<span class="laotext">ລະຫັດເຄື່ອງ-ບາໂຄດ</span></STRONG>
							<div class="input-group mb-3">
								<input type="text"  class="form-control" name="barcode" placeholder ="Enter Product ID /Barcode" required>	
							</div>	
						</div>
						<div class="col-md-6">	
							<strong >Product Name/
							<span class="laotext">ຊື່</span></STRONG>
							<div class="input-group mb-3">
								<input type="text"  class="form-control" name="pname" placeholder ="Enter Product Name" required>	
							</div>	
						</div>						
				</div>
				<div class="row">
							<div class="col-md-4">	
							<strong >Category/<span class="laotext">ປະເພດ</span></STRONG>
							<div class="input-group mb-3">
							<select   class="form-control laotext" name="cat"   required>	
								<?php
								foreach ($listcat as $app) { 	
									if (isset($app->catid)){  $catid= $app->catid;}else{$catid="";}	
									if (isset($app->categoryname)){  $categoryname= $app->categoryname;}else{$categoryname="";}	
									echo "
									<option value='".$catid."'>".$categoryname."</option>
									";
								}?>
								</select>
							</div>	
						</div>	
						<div class="col-md-4">	
						<strong >UOM</STRONG>
							<div class="input-group mb-3">
								<select   class="form-control laotext" name="uom"  required>	
							<option value='PCS'><span class="laotext">ອັນ/PCS</span></option>
									<option value='PACK'><span class="laotext">ແພັກ/Pack</span></option>
									<option value='BOX'><span class="laotext">ກັບ/BOX</span></option>
									<option value='ຖົງ/Bags'>	<span class="laotext">ຖົງ/Bags</span></option>
										<option value='ຕຸກ/Bottle'><span class="laotext">ຕຸກ/Bottle</span></option>
											<option value='ຊອງ/Envelope'><span class="laotext">ຊອງ/Envelope</span></option>
												<option value='ລ່າມ/Pack'><span class="laotext">ລ່າມ/Pack</span></option>
													<option value='ກໍ້/Roll'><span class="laotext">ກໍ້/Roll</span></option>
														<option value='ກ່ອງ/Boxes'><span class="laotext">ກ່ອງ/Boxes</span></option>
															<option value='ຕັບ/Pack'><span class="laotext">ຕັບ/Pack</span></option>
															
								<option value='ກ້ານ/PCS'><span class="laotext">ກ້ານ/PCS</span></option>
								<option value='ຫົວ/Unit'><span class="laotext">ຫົວ/Unit</span></option>
						
										<option value='ຫໍ່/Pack'><span class="laotext">ຫໍ່/Pack</span></option>
								<option value='ຄູ່/Pair'><span class="laotext">ຄູ່/Pair</span></option	>		
								</select>
							</div>	
						</div>
						<div class="col-md-4">	
							<strong >Replenish/
							<span class="laotext">ທົດແທນ</span></STRONG>
							<div class="input-group mb-3">
								<input type="number"  class="form-control" name="rep" placeholder ="Enter Replenish " min="0" required>	
							</div>	
						</div>	
													
						
				</div>
				<div class="row">
						<div class="col-md-5">	
						<strong >Quantity/
						<span class="laotext">ຈຳນວນ</span>
							<div class="input-group mb-3">
								<input type="number"  class="form-control" name="qty" min="0" placeholder ="Enter Quantity" required>	
							</div>	
						</div>
						<div class="col-md-12">	
								<strong >Unit Price Per PCS/ <span class="laotext"> ລາຄາຕໍ່ຫົວໜ່ວຍ </span></STRONG>
							<div class="input-group mb-3">
								<input type="number"  class="form-control" name="unitprice" min="1"  placeholder ="Enter Unit Price " required>	
							</div>	
						</div>	
											
				</div>
				
				
				<div id="addres"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close/
			  <span class="laotext">ປິດ</span></button>
              <button type="submit" class="btn btn-primary">Save Details/
			  <span class="laotext">ບັນທຶກ</span></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </form>
</div>









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
