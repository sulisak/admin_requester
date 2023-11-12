 <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 
	

	$("#vid").change(function(){  
				var vid=$("#vid").val();
				//alert(vid);
				$.ajax({    //create an ajax request to display.php
								type: "GET",
								url: <?php echo  "'".  URL ."'";?> + 'Fuel/loadmileage?id=' + vid,             
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

	

	
});

</script>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List to be done/<span class="laotext">ລາຍການວຽກຕ້ອງປະຕິບັດ</span></h1>
          </div><!-- /.col -->
           <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo URL ;?>TaskControl" >List to be done/<span class="laotext">ລາຍການວຽກຕ້ອງປະຕິບັດ</span></a></li>
              <li class="breadcrumb-item active">Update List to be done/<span class="laotext">ປັບປຸງລາຍການວຽກຕ້ອງປະຕິບັດ</span></li>
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
					Update Record/<span class="laotext">ປັບປຸງຂໍ້ມູນ</span>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
							<form action ="<?php echo URL ;?>TaskControl/Updatepro" method="post" >
						<div class="row">
						<div class="col-md-4">
							<b>No. Code/<span class="laotext">ລະຫັດ</span></b>
							<div class="input-group mb-3">
							  <input type="hidden" class="form-control"  style="background:#fff" name="id" required value="<?php echo $id;?>" Placeholder="Enter No. Code">							
							  <input type="text" class="form-control" disabled style="background:#fff" name="tid" required value="<?php echo $tid;?>" Placeholder="Enter No. Code">							
							</div>
						</div>
						
						<div class="col-md-4">
							<b>Work Code/<span class="laotext">ລະຫັດໜ້າວຽກ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="code" value="<?php echo $code;?>"required Placeholder="Enter Work Code">							
							</div>
						</div>
						<div class="col-md-4">
							<b>Topic/<span class="laotext">ຫົວຂໍ້</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="topic" value="<?php echo $topic;?>"required  Placeholder="Enter Topic">									
							</div>
						</div>
				 </div>
					<div class="row">
						<div class="col-md-3">
							<b>Task Details/<span class="laotext">ລາຍລະອຽດໜ້າວຽກ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="taskstatus" value="<?php echo $taskstatus;?>"required  placeholder ="Enter Task Details">							
							</div>
						</div>
						<div class="col-md-3">
							<b>Incharge/<span class="laotext">ຮັບຜິດຊອບ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" name="incharge" value="<?php echo $incharge;?>" required  placeholder ="Enter Incharge">							
							</div>
						</div>
						<div class="col-md-3">
							<b>Priority/<span class="laotext">ຄວາມສຳຄັນ</span></b>
							<div class="input-group mb-3">
							  <select class="form-control" name="priority" required Placeholder="Enter Priority">	
								<Option value="<?php echo $priority;?>"><?php echo $priority;?></option>
								<Option value="NORMAL">NORMAL/<span class="laotext">ທຳມະດາ</span></option>
								<Option value="LOW">LOW/<span class="laotext">ຕ່ຳ</span></option>
								<Option value="MEDIUM">MEDIUM/<span class="laotext">ປານກາງ</span></option>
								<Option value="HIGH">HIGH/<span class="laotext">ສຳຄັນ</span></option>
							  </select>
							</div>
						</div>
						
						<div class="col-md-3">
							<b>Work Progess/<span class="laotext">ຂັ້ນຕອນ</span></b>
							<div class="input-group mb-3">
								<select class="form-control" name="workprogress" required >	
								<Option value="<?php echo $workprogress;?>"><?php echo $workprogress;?></option>
								<Option value="COMPLETED">COMPLETED/<span class="laotext">ສຳເລັດ</span></option>
								<Option value="DEFERRED">DEFERRED/<span class="laotext">ເຍີ້ນໄປ</span></option>
								<Option value="IN PROGRESS">IN PROGRESS/<span class="laotext">ດຳເນີນການ</span></option>
								<Option value="EXTEND">EXTEND/<span class="laotext">ຂະຫຍາຍເວລາ</span></option>
							  </select>							  
							</div>
						</div>
						
				 </div>
				<div class="row">
						<div class="col-md-3">
							<b>Start Date/<span class="laotext">ວັນທີເລີ່ມ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" value="<?php echo $startdate;?>"name="startdate" required Placeholder="Enter Start Date">								
							</div>
						</div>
						<div class="col-md-3">
							<b>Deadline/<span class="laotext">ວັນທີສຸດທ້າຍ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" value="<?php echo $deadline;?>" name="deadline" required Placeholder="Enter Deadline">							
							</div>
						</div>
						
						<div class="col-md-3">
							<b>Deadline 2/<span class="laotext">ວັນທີສຸດທ້າຍ</span> 2</b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" value="<?php echo $deadline2;?>"name="deadline2" required Placeholder="Enter Deadline 2">							
							</div>
						</div>
						<div class="col-md-3">
							<b>Duration/<span class="laotext">ໄລຍະເວລາ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" value="<?php echo $duration;?>"name="duration" required  Placeholder="Enter Duration">								
							</div>
						</div>
				 </div>
				<div class="row">
						<div class="col-md-4">
							<b>Completed Date/<span class="laotext">ວັນທີສຳເລັດ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control" value="<?php echo $completedDate;?>" name="completeddate" required Placeholder="Enter Completed Date">							
							</div>
						</div>
						
						<div class="col-md-4">
							<b>Completed Month/<span class="laotext">ເດືອນທີ່ສຳເລັດ</span></b>
							<div class="input-group mb-3">
							  <input type="text" class="form-control"  value="<?php echo $completedmonth;?>" name="completedmonth" required Placeholder="Enter Completed Month">							
							</div>
						</div>
						
						<div class="col-md-4">
							<b>Percentage/<span class="laotext">ເປີເຊັນ</span></b>
							<div class="input-group mb-3">
							  <input type="number" class="form-control" value="<?php echo $percentage;?>" name="percentage" required  placeholder ="Enter Percentage">							
							</div>
						</div>
				 </div>
				<div class="row">
						<div class="col-md-6">
							<b>Description/<span class="laotext">ລາຍລະອຽດ</span></b>
							<div class="input-group mb-3">
							    <Textarea class="form-control" name="description" rows="7" required Placeholder="Enter Description"><?php echo $details;?></Textarea>					
							</div>
						</div>
						
						<div class="col-md-6">
							<b>Remarks/<span class="laotext">ໝາຍເຫດ</span></b>
							<div class="input-group mb-3">
							  <Textarea class="form-control" name="remarks" rows="7" required Placeholder="Enter Remaks"><?php echo $remarks;?></Textarea>							
							</div>
						</div>
						
				 </div>
					
				
							<button type="submit" class="btn btn-primary">Save Details/<span class="laotext">ບັນທຶກ</span></button>
							</form>
			 

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
