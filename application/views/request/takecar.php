

<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">

<style>
    
    tr td{
    padding: 0 10px 0 10px !important;
     margin: 0 !important;
    vertical-align: middle !important;
}

</style>


  <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {	 

	getAjaxProject() ;
	 function getAjaxProject() {
					$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."'";?>,   
			


							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
	}});
</script> 



<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
         <div class="row">
          <div class="col-12">
            
              <!-- /.card-header -->
					<hr>
					<h4> Take Car</h4>
					<hr>
						<div class="row">
						<?php
						
						 foreach ($list as $app) { 
			
				   $returnTimekey='';
					if (isset($app->rid))  $rid= $app->rid;	
					if (isset($app->userid))  $userid= $app->userid;	
					if (isset($app->vrno))  $vrno= $app->vrno;	
					if (isset($app->departdate))  $departdate= $app->departdate;	
					if (isset($app->daparttime))  $daparttime= $app->daparttime;	
					if (isset($app->datereturn))  $datereturn= $app->datereturn;	
					if (isset($app->returntime))  $returntime= $app->returntime;	
					if (isset($app->rstatus))  $rstatus= $app->rstatus;						
					if (isset($app->location))  $location= $app->location;		
					if (isset($app->dateRequest))  $dateRequest= $app->dateRequest;		
					if (isset($app->purpose))  $purpose= $app->purpose;		
					if (isset($app->modelname))  $modelname= $app->modelname;		
					if (isset($app->cname))  $cname= $app->cname;		
					if (isset($app->makername))  $makername= $app->makername;		
					if (isset($app->department))  $department= $app->department;		
					if (isset($app->Email))  $Email= $app->Email;		
					if (isset($app->fullname))  $fullname= $app->fullname;		
				  if (isset($app->Dfname))  {$Dfname= $app->Dfname;}else{$Dfname='';}		
					if (isset($app->dateRequest))  $dateRequest= $app->dateRequest;		
					if (isset($app->plate))  $plate= $app->plate;	
					if (isset($app->drivertype))  $drivertype= $app->drivertype;	
					
					if (isset($app->returnTimekey))  $returnTimekey= $app->returnTimekey;	
                    if (isset($app->logo))  { $logo= $app->logo;	}else{$logo= "";	}
				
                    
					$dateRequest=date_create($dateRequest);
					$dateRequest=date_format($dateRequest,"D jS \of M Y");
					
					
					$departdate=date_create($departdate);
					$departdate=date_format($departdate,"D jS \of M Y");
					
					$datereturn=date_create($datereturn);
					$datereturn=date_format($datereturn,"D jS \of M Y");
					
					if ($returnTimekey==''){
						$returnTimekey='---';
					}
					else{
					$returnTimekey=date_create($returnTimekey);
					$returnTimekey=date_format($returnTimekey,"D jS \of M Y -  H:i:s");
					}
					if($logo== ""){$logo= "dd1.jpg";}
					
					
					echo "
					<div class='col-md-4 '  id='divdata".$rid."'>
					<div class='card'>
						  <div class='card-header'>
							<h3 class='card-title'>
								VRNO /<span class='laotext'>ເລກທີເບີກ</span> :	".$vrno."
							</h3>
						  </div>
						<div class='card-body' style='font-size:12px'>
							<b>CAR MODEL</b> :<br> ".$makername." ".$modelname." #".$plate." <br>
							<b>DEPART /<span class='laotext'>ພະແນກ</span></b> : <br>".strtoupper($departdate)."  ".$daparttime." <br>
							<b>ARRIVAL /<span class='laotext'>ມາຮອດ</span> </b> : <br>".strtoupper($datereturn)." ".$returntime." <br>";
								if($Dfname==""){
									if($drivertype==0){
										echo '<b>DRIVER/<span class="laotext">ພະນັກງານຂັບລົດ</span></b> :<br>DRIVE BY SELF <br>	';
									}else{
										echo '					
											
										';
									}
									
								}else{
									echo '
									<b>DRIVER/<span class="laotext">ພະນັກງານຂັບລົດ</span></b> :<br> '.strtoupper($Dfname).'	 <br>	';
									



								}
							
							
							echo "
							<hr>
							
								<img src='https://aifgrouplaos.la/public/img/car/".$logo."' class='img-fluid'>
							
							<hr>
						
							 <div class='d-flex'>
								<a href='#' class='btn btn-primary btn-sm viewDetails'  style='width:50%'
							 id='del_".$rid."' ><i class='fas fa-eye'></i>  View Detail</A>
							 
							 </a>";
							echo '
									<button   class="btn btn-xs  bg-gradient-success btn-flat takecar" id="del_'.$rid.'" style="width:50%">
																<i class="fas fa-check"></i> Take Car
							</button>';
								  
							echo " 
						</div>
						
					</div>
					
					</div>
					";
								
				 }
						
				?>
				 </div>

					
		 </div>
		 
		 
		 
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>



               
<script>
$(document).ready(function(){
	 $('.closemodal').click(function(){		 	
		$('#addModalDiv').hide();	
		 
	 });
	  $('.closemd').click(function(){	  
			$("#showDiv").hide();
		});
	   
	   $('.viewDetails').click(function(){	   
			$("#showDiv").show();
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			//alert(id);
			  $.ajax({
					url: <?php echo "'". URL . "'" ?> + "Request/ViewDetail?id=" + id,
					type: 'GET',
					data: { id:id },
					success: function(response){
						//alert(response);
						
						$("#vdres").html(response); 
						var lineManager =$("#lineManager").val(); //====== add new
						var addapp =$("#adminApp").val();
						var takecarcc =$("#takecarcc").val();
						//alert(addapp);
						/*if(addapp=="C"){   //========= add new 
							$("#takecar").show();								
							if(takecarcc=="C"){
								$("#takecar").hide();
							}
						}else{
							if(lineManager=="C" && addapp=="C"  ){
								$("#takecar").show();
							}else{

							   $("#takecar").hide();
							}
							
						
						}*/


						}
				});
			
			
			
			return false;
		});
	
			

			
		



		$(".takecar").click(function(){
			
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
		//	var rid = $("#rid").val();
	        
			$.ajax({
					url: <?php echo "'". URL . "'" ?> + "Request/Takecar",
					type: 'GET',
					data: { rid:id },
					
					success: function(response){
					  //  alert(id);
					    //alert(response);
						alert("Take Car Successfully!");
						$("#divdata" + id).css('background','tomato');
						$("#divdata" + id).fadeOut(800, function(){      
							$(this).remove();
						});
				
					}
			});	
	
					  	




		});
		$("#AddModel").submit(function(){
			$.ajax({
					type: "POST",
					url: <?php echo  "'".  URL  ."Request/AddReturn'";?>,         
					data: $(this).serialize()
					}).done(function(data){
					//$("#responseAdd").fadeOut(500).html(data).fadeIn(300);
					
						if(data=="ok"){
						
						$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Request/ReturnRequestList'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});	
						}else{
							alert(data);
						}
					
					
					})
					.fail(function() {
						alert( "Posting failed." );
					});		
					  	
					
					return false;	
			
		
		});
	 	
});
</script>	

		  


		<div class="modal " id="showDiv" style=" background-color: rgba(0,0,0,.01) !important;
  width: 100%;
  height: 100%;
  overflow: auto;">

       <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title laotext">Request Details/ລາຍລະອຽດເບີກລົດ</h4>
              <button type="button" class="close closemd" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body " >				
				<div id="vdres"></div>
            </div>
            <div class="modal-footer  " style="justify-content: flex-start;">

  <button type="button" class="btn btn-danger closemd" data-dismiss="modal">Close/ປິດ
  </button>
 


	




            </div>

 <!-- ====================================== Add new ======================================== -->
           
            </div>
<!-- ========================================================== -->

          </div>
          <!-- /.modal-content -->
        </div>
  
</div>		  
			
<div class="modal " id="addModalDiv" style=" background-color: rgba(0,0,0,.01) !important;
  width: 100%;
  height: 100%;
  overflow: auto;">
	<form id="AddModel" method="post">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Return vehicle/ສົ່ງກະແຈລົດ</h4>
              <button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" >
				
				 <div id="responseAdd">	 </div>
				
			
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger closemodal" data-dismiss="modal">Close/ປິດ</button>
              <button type="submit" class="btn btn-primary">
                            	Save Details/ບັນທຶກ 
              	</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </form>
        <!-- /.modal-dialog -->
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















