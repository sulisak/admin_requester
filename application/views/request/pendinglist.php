
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
                    <th>VRn#/<span class="laotext">ເລກຖັງ</span></th>
                    <th>Photo</th>
                    <th>Fullname/<span class="laotext">ຊື່ຜູ້ຮ້ອງຂໍ</span></th>
                               
                 
                    <th>Vehicle/<span class="laotext">ຊື່ລົດ</span></th>               
                               
                    <th>Driver_Type/<span class="laotext">ປະເພດຄົນຂັບ</span></th>               
                    <th>Driver/<span class="laotext">ຄົນຂັບລົດ</span></th>               
                    <th>Status/<span class="laotext">ສະຖານະ</span></th>               
                    <th width="50px">LineMngr/<span class="laotext">ຫົວໜ້າສາຍງານ.</span></th>                              
                    <th width="50px">Admin/<span class="laotext">ຜູ້ບໍລິຫານລະບົບ.</span></th>                              
                  
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
					if (isset($app->logo)){  $logo= $app->logo;} else{ $logo="";}	
					
					if($logo==""){
					  $logo="dd1.jpg";
					}
					$dateRequest=date_create($dateRequest);
					$dateRequest=date_format($dateRequest,"D jS \of M Y");
					
					
					$departdate=date_create($departdate);
					$departdate=date_format($departdate,"D jS \of M Y");
					
					$datereturn=date_create($datereturn);
					$datereturn=date_format($datereturn,"D jS \of M Y");
					
					echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td><a href='' title='View details'  class='viewDetails' 
					 id='del_".$rid."'>".$vrno."</a></td>";
					 
					echo "<td>
					    <a href='". URL ."public/img/car/". $logo."' target='_blank'>
    				    	<img src='". URL ."public/img/car/". $logo."'    width='70px'/>
					    </a>
					</td>";
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
					url: <?php echo "'". URL . "'" ?> + "Request/ViewDetailpro_1?id=" + id,
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
<style>
				.scroll {
				   width: 100%;
				 
				   overflow-y: scroll;
				}
				.scroll::-webkit-scrollbar {
					width: 2px;
				}

				.scroll::-webkit-scrollbar-track {
					-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
					border-radius: 10px;
				}

				.scroll::-webkit-scrollbar-thumb {
					border-radius: 10px;
					-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
				}	  
				.circledivPending {
				  height: 35px;
				  width: 35px;
				  display: table-cell;
				  text-align: center;
				  vertical-align: middle;
				  border-radius: 50%;

				  background: #ffd24b;
				} 
				
				.circledivCancel {
				  height: 35px;
				  width: 35px;
				  display: table-cell;
				  text-align: center;
				  vertical-align: middle;
				  border-radius: 50%;
				
				  background: #f2727f;
				}
				.circledivComplete {
				  height: 35px;
				  width: 35px;
				  display: table-cell;
				  text-align: center;
				  vertical-align: middle;
				  border-radius: 50%;

				  background: #3dcfa4;
				}
				.hori-timeline .events {
					border-top: 3px solid #e9ecef;
				}
				.hori-timeline .events .event-list {
					display: block;
					position: relative;
					text-align: center;
					padding-top: 70px;
					margin-right: 0;
				}
				.hori-timeline .events .event-list:before {
					content: "";
					position: absolute;
					height: 36px;
					border-right: 2px dashed #dee2e6;
					top: 0;
				}
				.hori-timeline .events .event-list .event-date {
					position: absolute;
				  
					left: 0;
					right: 0;
				   
					margin: 0 auto;
					
				}
				@media (min-width: 1140px) {
					.hori-timeline .events .event-list {
						display: inline-block;
						width: 150px;
						padding-top: 45px;
					}
					.hori-timeline .events .event-list .event-date {
						top: -30px;
					}
				}
				@media (min-width: 992px){
				.modal-lg {
					max-width: 1000px;
				}
				}
				.text{font-size:12px;}
				

				.labelmodal{
					font-size:10px;
				font-weight:990;}
				</style>		  
		<div class="modal " id="showDiv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"
		style=" background-color: rgba(0,0,0,.01) !important;
  width: 100%;
  height: 100%;
  overflow: auto;">

       <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">Request Details/ລາຍລະອຽດການຮ້ອງຂໍເບີກລົດ</h6>
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
  