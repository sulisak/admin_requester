
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 

	getAjaxProject() ;
	 function getAjaxProject() {
					$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Document/LoadData1'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	};

	
	$("#ddd").click(function(){  
	
							var generateRandomNDigits = (n) => {
							return Math.floor(Math.random() * (9 * (Math.pow(10, n)))) + (Math.pow(10, n));
							}
							
							var vrr = generateRandomNDigits(7);
							$('#ref').val(vrr);
							$('#ref1').val(vrr);
							
		
	});

	
	$("#submitins").submit(function(){  
			$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Document/AddDocument", 
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

	
	$("#user").change(function(){  
		var userid= $("#user").val();
		//alert(userid);
		$.ajax({
				type: "GET",
				url:  <?php echo '"'. URL .'"';?> + "Document/getuserdataout?id=" +  userid, 
				data: $(this).serialize()
				}).done(function(data){
					$("#company").html(data); 
				}).fail(function() {
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
            <h1 class="m-0 text-dark">Document Out/<span class="laotext">
			ເອກະສານຂາອອກ</span></h1>
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
				<button class="btn btn-xs btn-block bg-gradient-primary btn-flat" id="ddd"  data-toggle="modal" data-target="#Add">
								<i class="fas fa-plus"></i> Add new/
								<span class="laotext">ເພີ່ມໃໝ່ </span>
							</button>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
					
							<div id="response"></div>
			 

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
              <h4 class="modal-title">ADD NEW DOCUMENT/<span class="laotext">ເພີ່ມເອກະສານໃໝ່</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<b>Ref. No./<span class="laotext">ເລກອ້າງອີງ</span></b>
						<div class="input-group mb-3">
						 <input type="hidden" class="form-control"  
						  style="background:#fff"  name="document" required value="1">
						   <input type="text" class="form-control"    name="dc" required placeholder="Enter Document number">
						  <input type="hidden" class="form-control" disabled style="background:#fff" id="ref" required placeholder="Enter Department name">
						  <input type="hidden" class="form-control" id="ref1" name="ref" required placeholder="Enter Department name">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-code-branch"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6">
						<b>Sender/<span class="laotext">ຜູ້ສົ່ງ</span></b>
							<div class="input-group mb-3">
							 <select class="form-control" value="<?php echo strtoupper(uniqid()) ;?>" id ="user" name="userid" required  >
							 <option value=''>--Select User--/<span class="laotext">ເລືອກຜູ້ໃຊ້</span></option>
							   <?php 
									foreach ($list as $app) { 
										if (isset($app->userid))  $userid= $app->userid;	
										if (isset($app->fullname))  $fullname= $app->fullname;	
										echo "<option value='".$userid."'>".$fullname."</option>";
									}
									?>
							 </select>
							  <div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							  </div>
						</div>
					</div>
				</div>
				
				<div id="company"></div>
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
