
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List to be done/<span class="laotext">ລາຍການທີ່ຕ້ອງປະຕິບັດ</span></h1>
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
					
					<div class="row">
						<div class="col-md-6">
						<button class="btn btn-xs btn-block bg-gradient-primary btn-flat"  data-toggle="modal" data-target="#Add">
										<i class="fas fa-file-import"></i> Import/<span class="laotext">ນຳເຂົ້າ</span> 
						</button>
						</div>
						<div class="col-md-6">
						<button class="btn btn-xs btn-block bg-gradient-primary btn-flat"  data-toggle="modal" data-target="#Add1">
										<i class="fas fa-plus"></i> Add new/<span class="laotext">ເພີ່ມໃໝ່</span> 
						</button>
						</div>
						
					</div>
					
				</div>
              </div>
              <!-- /.card-header -->
						<div class="card-body">
								
								<form method="post" id="senddataform" >
										<div class="row">
											
										<div class="col-md-4">
											<input type="date" name="startdate" class="form-control">
										</div>
										<div class="col-md-4">
											<input type="date" name="enddate" class="form-control">
										</div>
										<div class="col-md-4">
											<input type="submit" class="btn btn-primary" value="Search Data/ຄົ້ນຫາ">
										</div>
										
										
										</div>
							 </form>
							<hr>
							<div id="response"></div>
							<hr>
							<table class="table-responsive">
								<tr>
									<td bgcolor="#00cc00" style="width:30px"></td>
									<td>&nbsp; Completed/<span class="laotext">ສຳເລັດ</span></td>
									<td style="width:10px"></td>
									<td bgcolor="#1ba1e2" style="width:30px"></td>
									<td>&nbsp; Processing / In Progress(<span class="laotext">ດຳເນີນການ</span>)</td>
									<td style="width:10px"></td>
									<td bgcolor="#a20025" style="width:30px"></td>
									<td>&nbsp; In Complete / Deffered(<span class="laotext">ເຍີ້ນໄປ</span>)	</td>
									<td style="width:10px"></td>
									<td bgcolor="#e3c800" style="width:30px"></td>
									<td>&nbsp; Extend/<span class="laotext">ຂະຫຍາຍເວລາ</span></td>
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

<div class="modal fade" id="Add1">
<form method="post" id="addData" enctype="multipart/form-data">
       <div class="modal-dialog modal-lg" style="max-width: 80%;">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add new record/<span class="laotext">ເພີ່ມໃໝ່</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				
					<div class="row">
						<div class="col-md-4">
							<b>No. Code/<span class="laotext">ລະຫັດ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="tid" required Placeholder="Enter No. Code">							
							</div>
						</div>
						
						<div class="col-md-4">
							<b>Work Code/<span class="laotext">ລະຫັດວຽກ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="code" required Placeholder="Enter Work Code">							
							</div>
						</div>
						<div class="col-md-4">
							<b>Topic/<span class="laotext">ຫົວຂໍ້</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="topic" required  Placeholder="Enter Topic">									
							</div>
						</div>
				 </div>
					<div class="row">
						<div class="col-md-3">
							<b>Task Details/<span class="laotext">ລາຍລະອຽດໜ້າວຽກ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="taskstatus" required  placeholder ="Enter Task Details">							
							</div>
						</div>
						<div class="col-md-3">
							<b>Incharge/<span class="laotext">ຮັບຜິດຊອບ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="incharge" required  placeholder ="Enter Incharge">							
							</div>
						</div>
						<div class="col-md-3">
							<b>Priority</b>
							<div class="input-group mb-3">
							  <select class="form-control" name="priority" required Placeholder="Enter Priority">	
								<Option value="NORMAL">NORMAL/<span class="laotext">ທຳມະດາ</span></option>
								<Option value="LOW">LOW/<span class="laotext">ຕ່ຳ</span></option>
								<Option value="MEDIUM">MEDIUM/<span class="laotext">ປານກາງ</span></option>
								<Option value="HIGH">HIGH/<span class="laotext">ສຳຄັນ</span></option>
							  </select>
							</div>
						</div>
						
						<div class="col-md-3">
							<b>Work Progess/<span class="laotext">ຂັ້ນຕອນວຽກ</span></b>
							<div class="input-group mb-3">
								<select class="form-control" name="workprogress" required >	
								<Option value="COMPLETED">COMPLETED/<span class="laotext">ສຳເລັດ</span></option>
								<Option value="DEFERRED">DEFERRED/<span class="laotext">ເຍີ້ນໄປ</span></option>
								<Option value="IN PROGRESS">IN PROGRESS/<span class="laotext">ດຳເນີກການ</span></option>
								<Option value="EXTEND">EXTEND/<span class="laotext">ຂະຫຍາຍເວລາ</span></option>
							  </select>							  
							</div>
						</div>
						
				 </div>
				<div class="row">
						<div class="col-md-3">
							<b>Start Date/<span class="laotext">ວັນທີເລີ່ມຕົ້ນ</span></b>
							<div class="input-group mb-3">
							  <input type="date" class="form-control" name="startdate" required Placeholder="Enter Start Date">								
							</div>
						</div>
						<div class="col-md-3">
							<b>Deadline/<span class="laotext">ວັນສິ້ນສຸດ</span></b>
							<div class="input-group mb-3">
							  <input type="date" class="form-control" name="deadline" required Placeholder="Enter Deadline">							
							</div>
						</div>
						
						<div class="col-md-3">
							<b>Deadline 2/<span class="laotext">ວັນສິ້ນສຸດທີ່</span> 2</b>
							<div class="input-group mb-3">
							  <input type="date" class="form-control" name="deadline2" required Placeholder="Enter Deadline 2">							
							</div>
						</div>
						<div class="col-md-3">
							<b>Duration/<span class="laotext">ໄລຍະເວລາ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="duration" required  Placeholder="Enter Duration">								
							</div>
						</div>
				 </div>
				<div class="row">
						<div class="col-md-4">
							<b>Completed Date/<span class="laotext">ວັນທີສຳເລັດ</span></b>
							<div class="input-group mb-3">
							  <input type="date" class="form-control" name="completeddate" required Placeholder="Enter Completed Date">							
							</div>
						</div>
						
						<div class="col-md-4">
							<b>Completed Month/<span class="laotext">ເດືອນທີ່ສຳເລັດ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="completedmonth" required Placeholder="Enter Completed Month">							
							</div>
						</div>
						
						<div class="col-md-4">
							<b>Percentage/<span class="laotext">ເປີເຊັນ</span></b>
							<div class="input-group mb-3">
							  <input type="number" class="form-control" name="percentage" required  placeholder ="Enter Percentage">							
							</div>
						</div>
				 </div>
				<div class="row">
						<div class="col-md-6">
							<b>Description/<span class="laotext">ລາຍລະອຽດ</span></b>
							<div class="input-group mb-3">
							    <Textarea class="form-control" name="description" rows="7" required Placeholder="Enter Description"></Textarea>					
							</div>
						</div>
						
						<div class="col-md-6">
							<b>Remarks/<span class="laotext">ໝາຍເຫດ</span></b>
							<div class="input-group mb-3">
							  <Textarea class="form-control" name="remarks" rows="7" required Placeholder="Enter Remaks"></Textarea>							
							</div>
						</div>
						
				 </div>
					
				
				<div id="addres"></div>		
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close/<span class="laotext">ປິດ</span></button>
              <button type="submit" class="btn btn-primary" id="submit" >Save Details/<span class="laotext">ບັນທຶກ</span></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </form>
</div>

<div class="modal fade" id="Add">
<form method="post" id="load_excel_form" enctype="multipart/form-data">
       <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Import Record/<span class="laotext">ນຳເຂົ້າຂໍ້ມູນ</span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="row">
					<div class="col-md-12">
					Select Excel File/<span class="laotext">ເລືອກຟາຍ</span> excel<br>
					<input type="file"  class="form-control" name="select_excel" required id="filedata"
					accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />  
					</div>
					<div class="col-md-12 text-center loading">
						<img src="public/img/load.gif" class="img-fluid">
					<h2>Importing Data/<span class="laotext">ກຳລັງນຳເຂົ້າຂໍ້ມູນ</span> ... </h2>
					</div>
				</div>
				
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close/<span class="laotext">ປິດ</span></button>
              <button type="submit" class="btn btn-primary" id="submit" >Save Details/<span class="laotext">ບັນທຶກ</span></button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </form>
</div>

<script>
$(document).ready(function(){
	$('.loading').hide();
	 $('#submit').prop('disabled', false);
	$('#load_excel_form').on('submit', function(event){
    event.preventDefault();
	$('.loading').show();
	 $('#submit').prop('disabled', true);
	// $('#filedata').prop('disabled', true);
    $.ajax({
      url:<?php echo "'". URL ."TaskControl/Import'";?>,
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      success:function(data)
      {
		$('.loading').hide();
		$('#submit').prop('disabled', false);
		
		 
		alert("Import Successfully!");	
		
		getAjaxProject() ;
		document.getElementById("load_excel_form").reset();
		
      }
    });
	
	 });
	 
	$('#senddataform').submit(function(){  
				$.ajax({
						type: "POST",
						url: <?php echo  "'".  URL  ."TaskControl/loaddata'";?>,         
						data: $(this).serialize()
						}).done(function(data){
							//alert(data);
							$("#response").html(data); 
						}).fail(function() {
							alert( "Posting failed." );
						});
								
		 return false;						
	});
	
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
								url:  <?php echo '"'. URL .'"';?> + "TaskControl/AddData", 
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
