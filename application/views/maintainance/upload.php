
 <script src="<?php echo URL ;?>public/js/jquery.js"></script>


<style>
.gall:hover {
  opacity: 0.3;
  filter: alpha(opacity=30);
   
}
.container1 {
  position: relative;

}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(220, 220, 220, 0);
  transition: background 0.5s ease;
}

.container1:hover .overlay {
  display: block;
  background: rgba(220, 220, 220, 0.3);
 
}




.container1:hover .title {
  top: 90px;
}

.button1 {
  position: absolute;
  width: 100%;
  left:0;
  top: 25%;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
}

.button1 a {
  width: 200px;
  padding: 12px 48px;
  background:#e74a3b;
  text-align: center;
  color: white;
  border: solid 2px white;
  z-index: 1;
}

.container1:hover .button1 {
  opacity: 1;
}

.item{
	background: url("<?php echo URL ;?>public/img/shadow_wide.png") no-repeat center bottom;
	padding-bottom: 6px;
	display: inline-block;
	margin-bottom: 30px;
	position:relative;
}

.item .delete{
	background:url('<?php echo URL ;?>public/img/delete_icon1.png') no-repeat;
	width:37px;
	height:38px;
	position:absolute;
	cursor:pointer;
	top:-18px;
	right:-10px
}

.item a{
	background-color: #FAFAFA;
	border: none;
	display: block;
	padding: 10px;
	text-decoration: none;
}



.item a img{
	display:block;
	border:none;
}


</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vehicle Maintenance/
			<span class="laotext">ບຳລຸງຮັກສາລົດ</span></h1>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL ;?>Maintainance">Vehicle Maintenance/
	        		<span class="laotext">ບຳລຸງຮັກສາລົດ</span></a></li>
           
              <li class="breadcrumb-item active">Upload Image</li>
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
				<button class="btn btn-xs btn-block bg-gradient-primary btn-flat"  data-toggle="modal" data-target="#Add">
								<i class="fas fa-plus"></i> Add new/
								<span class="laotext">ເພີ່ມໃໝ່ 
							</span>
							</button>
				</h3>
              </div>
              <!-- /.card-header -->
					<div class="card-body">
				            
			            <div class="table-responsive">
					 <table >
						  <?php 
						 
						  //print_r($list );
						  $c=0;
						  $row = 0;
						  $column = 0;
						  foreach ($list as $app) { 						  
							  if (isset($app->id))  {$pid= $app->id;	}else{$pid= "";	}
							  if (isset($app->mid))  {$mid= $app->mid;	}else{$mid= "";	}
							  if (isset($app->photo))  {$photo= $app->photo;	}else{$photo= "";	}
								if ($column == 0) {
								echo '<tr>';
													}
								if (($column == 6) && ($row = 0)){
								 echo '<td></td>';
								 }	
								echo '
								
								<td style="padding-right:10px">
								<br>
								 <div class="item container1">
											
												<img src="'. URL .'public/img/maintainance/'.$photo.'" width ="220px" class="gall" />
											
											<div class="delete deleteGroup" id="del_'.$pid.'"></div>
										</div>
									
									</td>
								
								';			
								$column++;
								if ($column >= 6) {
								 $row++;
								 echo '</tr>';
								  $column = 0;
								 }	
							
							
							
						  }
						?>
					 </table>
					 </div>

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

<div class="modal fade" id="Add">
<form action="<?php echo URL;?>Maintainance/AddPhotopro" method="post"  multipart="" enctype="multipart/form-data">
       <div class="modal-dialog modal-lg" >
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add new photo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
					<div class="col-md-12">
						<input name="id" class="form-control" type="hidden" value="<?php echo $id;?>" />
				
						<input name="img[]" multiple accept="image/x-png,image/gif,image/jpeg"  class="form-control" type="file" />
					</div>
	         </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </form>
</div>






<script src="<?php echo URL ;?>public/jquery.confirm/jquery.confirm.js"></script>
              
<script>
$(document).ready(function(){
	// Delete 
    $('.deleteGroup').click(function(){
		
		
	  var r = confirm("Are you sure you want to Remove?");
	  if (r == true) {
		
	  
		
        var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];
      
				$.ajax({
					url: <?php echo "'". URL . "'" ?> + "Maintainance/DeletePhoto",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
					//alert(deleteid);
					///alert(response);
					 ///Removing row from HTML Table
						
						$(el).closest('td').css('background','tomato');
						$(el).closest('td').fadeOut(800, function(){      
							$(this).remove();
							
						});
						
						
					}
				});
		} else {
		
	  }	
		
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
