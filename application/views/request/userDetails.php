
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="">


 

                <table class="table table-bordered table-hover table-responsive  table-striped" id="example" width="100%" height="500px" cellspacing="0" >
                 <thead>
                  <tr>
                    <th width="30px">No/
					<span class="laotext">ລຳດັບ</span></th>
                    <th>VRNo#/<span class="laotext">ເລກທີເບີກ</span></th>
                    <th>Fullname/<span class="laotext">ຊື່ລົດ</span></th>
                               
                 
                    <th>Vehicle/<span class="laotext">ຊື່ລົດ</span></th>               
                               
                    <th>Driver_Type/<span class="laotext">ປະເພດຄົນຂັບລົດ</span></th>               
                    <th>Driver/<span class="laotext">ຄົນຂັບລົດ</span></th>               
                    <th>Status/<span class="laotext">ສະຖານະ</span></th>               
                    <th width="50px">LineMngr/<span class="laotext">ຫົວໜ້າສາຍງານ</span></th>                              
                    <th width="50px">Admin<span class="laotext">/ຜູ້ບໍລິຫານ</span></th>                              
                  
                    <th width="50px">Action/<span class="laotext">ຈັດການ</span></th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
					$rstatus="";
					$userid="";
					$username="";
					$fullname="";	
					$contact="";
					$company="";
					$department="";
					$driverId=0;
				  foreach ($list as $app) { 
				  $c++;
				  if (isset($app->vrno))  $vrno= $app->vrno;	
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
					if (isset($app->Dfname))  $Dfname= $app->Dfname;		
					if (isset($app->dateRequest))  $dateRequest= $app->dateRequest;		
					if (isset($app->plate))  $plate= $app->plate;	
					if (isset($app->lineManager))  $lineManager= $app->lineManager;	
					if (isset($app->adminApp))  $adminApp= $app->adminApp;	
					
					if (isset($app->Dfname)){  $Dfname= $app->Dfname;} else{ $Dfname="";}	
					if (isset($app->driverId)){  $driverId= $app->driverId;} else{ $driverId=0;}	
					if (isset($app->drivertype)){  $drivertype= $app->drivertype;} else{ $drivertype="";}	
					
					
					
					$dateRequest=date_create($dateRequest);
					$dateRequest=date_format($dateRequest,"D jS \of M Y");
					
					
					$departdate=date_create($departdate);
					$departdate=date_format($departdate,"D jS \of M Y");
					
					$datereturn=date_create($datereturn);
					$datereturn=date_format($datereturn,"D jS \of M Y");
					
					echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td><a href='' title='View details'  class='viewDetails' 
					 id='del_".$rid."'
					>".$vrno."</a></td>";
					echo "<td>".$fullname."</td>";
				
					echo "<td>".$makername." ".$modelname." #".$plate." </td>";
					
					
				
					
					if($drivertype==0 ) {
								echo '<td >						
								Drive by self  
								</td>';
						}else{
									echo '<td >Request Driver</td>';
					}
				
						echo '<td >						
								'.$Dfname.'
							</td>';
					
					if($rstatus=='Pending'){
						echo '<td align="center">						
								<center><div class="circledivPending">P</div></center>
							</td>';
					}ELSEif($rstatus=='Completed'){
						echo '<td align="center">						
								<center><div class="circledivComplete">C</div></center>
							</td>';
					}ELSEif($rstatus=='Booked'){
						echo '<td align="center">						
								<center><div class="circledivComplete">B</div></center>
							</td>';
					}else{
						echo '<td  align="center">
								<center><div class="circledivCancel">X</div></center>
							  </td>';
					}
				
					
					if($lineManager=='P'){
						echo '<td align="center">						
								<center><div class="circledivPending">P</div></center>
							</td>';
					}ELSEif($lineManager=='C'){
						echo '<td align="center">						
								<center><div class="circledivComplete">C</div></center>
							</td>';
					}else{
						echo '<td  align="center">
								<center><div class="circledivCancel">C</div></center>
							  </td>';
					}
				
					
					if($adminApp=='P'){
						echo '<td align="center">						
								<center><div class="circledivPending">P</div></center>
							</td>';
					}ELSEif($adminApp=='C'){
						echo '<td align="center">						
								<center><div class="circledivComplete">C</div></center>
							</td>';
					}else{
						echo '<td  align="center">
								<center><div class="circledivCancel">X</div></center>
							  </td>';
					}
				
				
					echo '<td class="d-flex">					
							';
														
														
							if($rstatus=='Booked' || $rstatus=='Cancelled' || $rstatus=='Completed'){
								echo '
								<!--<button  disabled class="btn btn-xs  bg-gradient-success btn-flat " disabled id="del_'.$rid.'">
											<i class="fas fa-check"></i>
										</button>
										<button class="btn btn-xs  bg-gradient-info btn-flat "  disabled id="del_'.$rid.'">
										<i class="fas fa-check"></i> 
										</button>
										<button class="btn btn-xs   bg-gradient-danger btn-flat "    disabled id="del_'.$rid.'">
											<i class="fas fa-times"></i> 
										</button>-->
										<button title="View details"  class="btn btn-xs   bg-gradient-primary btn-flat viewDetails" 
										 id="del_'.$rid.'"
										>
											<i class="fas fa-eye"></i> 
										</button>
										';
							}else{
								if($lineManager=='C' ){
									echo '
									<!--	<button  disabled class="btn btn-xs  bg-gradient-success btn-flat appManager" id="del_'.$rid.'">
											<i class="fas fa-check"></i>
										</button>
										<button class="btn btn-xs  bg-gradient-info btn-flat appAdmin"  id="del_'.$rid.'">
										<i class="fas fa-check"></i> 
										</button>
										<button class="btn btn-xs   bg-gradient-danger btn-flat cancelBook"    id="del_'.$rid.'">
											<i class="fas fa-times"></i> 
										</button>-->
										<button title="View details"  class="btn btn-xs   bg-gradient-primary btn-flat viewDetails" 
										 id="del_'.$rid.'"
										>
											<i class="fas fa-eye"></i> 
										</button>
										
										';
										
								}else{
									echo '
									<!--<button class="btn btn-xs  bg-gradient-success btn-flat appManager" id="del_'.$rid.'">
										<i class="fas fa-check"></i>
									</button>
									<button class="btn btn-xs   bg-gradient-primary btn-flat appAdmin"  disabled id="del_'.$rid.'">
										<i class="fas fa-check"></i> 
									</button>								
									<button class="btn btn-xs   bg-gradient-danger btn-flat cancelBook"    id="del_'.$rid.'">
											<i class="fas fa-times"></i> 
										</button>-->
										<button title="View details"  class="btn btn-xs   bg-gradient-primary btn-flat viewDetails" 
										 id="del_'.$rid.'"
										>
											<i class="fas fa-eye"></i> 
										</button>
										
										
										';
								}
								
								
							}


							
							echo '
								
							</td>';
					
					echo "</tr>";
				  }
				  ?>
                 
                
                
					
                  </tbody>
                </table>
				
              </div>
			  
               
<script>
$(document).ready(function(){
	$('.lineok').hide();
	$('#showDriver').hide();	
	 
	
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
					url: <?php echo "'". URL . "'" ?> + "Request/ViewDetailpro?id=" + id,
					type: 'GET',
					data: { id:id },
					success: function(response){
					//alert(response);
						
						$("#vdres").html(response); 
						
						}
				});
			
			
			
			return false;
		});
	
	  

	   
		
});
</script>	
  
		<div class="modal " id="showDiv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"
		style=" background-color: rgba(0,0,0,.01) !important;
  width: 100%;
  height: 100%;
  overflow: auto;">

       <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Request Details/ລາຍລະອຽດເບີກລົດ/</h6>
              <button type="button" class="close closemd" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body ">				
				<div id="vdres"></div>
            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
  
</div>	
			  
		<div class="modal-footer justify-content-between">
             
            </div>  
			  
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo URL ;?>public/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo URL ;?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo URL ;?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo URL ;?>public/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo URL ;?>public/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo URL ;?>public/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo URL ;?>public/js/demo/datatables-demo.js"></script>
    <script src="<?php echo URL ;?>public/js1/jquery-3.3.1.js"></script>
    <script src="<?php echo URL ;?>public/js1/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/dataTables.buttons.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/jszip.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/pdfmake.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/vfs_fonts.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.html5.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.print.min.js"></script>
    <script src="<?php echo URL ;?>public/js1/buttons.colVis.min.js"></script>

    <script>
	$(document).ready(function() {
	    var table = $('#example').DataTable( {
	        lengthChange: true,
	       // buttons: [ 'copy', 'excel', 'csv' ],
		    buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                   columns: ':visible'
                }
            },
            'colvis'
        ]
			 ,
			paging:         true,	
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
  