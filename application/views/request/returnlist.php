

<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="">


 

                <table class="table table-bordered table-hover table-responsive table-striped" id="example" width="100%" height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th width="30px">No/<span class="laotext">ລຳດັບ</span> </th>                   
                    <th>Fullname/<span class="laotext">ຊື່ເຕັມ</span></th>                   
                    <th>VRNo/<span class="laotext">ເລກຈັກ</span></th>
                    
                    <th>Departure/<span class="laotext">ອອກໄປ</span></th>
                    <th>Arrival/<span class="laotext">ມາຮອດ</span></th>
                    <th>Driver/<span class="laotext">ຄົນຂັບ</span></th>
                                  
                    <th width="30px">Action/<span class="laotext">ຈັດການ</span></th>
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
				  if (isset($app->Dfname)){$Dfname= $app->Dfname;}else{$Dfname='';}		
					if (isset($app->dateRequest))  $dateRequest= $app->dateRequest;		
					if (isset($app->drivertype))  $drivertype= $app->drivertype;		
					if (isset($app->plate))  $plate= $app->plate;	
					if (isset($app->vcolor))  $vcolor= $app->vcolor;	
					if (isset($app->mileage))  $mileage= $app->mileage;	
					if (isset($app->driverId))  $driverId= $app->driverId;	

					$dateRequest=date_create($dateRequest);
					$dateRequest=date_format($dateRequest,"D jS \of M Y");
					
					
					$departdate=date_create($departdate);
					$departdate=date_format($departdate,"D jS \of M Y");
					
					$datereturn=date_create($datereturn);
					$datereturn=date_format($datereturn,"D jS \of M Y");
					
					echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td>".$fullname."</td>";
					echo "<td><a href='' title='View details'  class='viewDetails' 
					 id='del_".$rid."'
					target='_blank'>".$vrno."</a></td>";
				
					echo "<td>".strtoupper($departdate) ." - ". $daparttime ."</td>";
					echo "<td>".strtoupper($datereturn) ." - ". $returntime ."</td>";					
					//echo "<td><p class='st'>".$Dfname."</p>  </td>";
					if($Dfname=="" ){
						
							if($driverId==0 ){
								echo '<td >						
								Drive by self  
								</td>';
							}else{
									echo '<td >		</td>';
							}
							
						
						
					}else{
						echo '<td  >
								'.$Dfname.' 
							  </td>';
					}
				
					
					echo '<td class="d-flex text-center" align="center">					
							<button class="btn btn-xs  bg-gradient-success btn-flat addModel" id="del_'.$rid.'">
								<i class="fas fa-undo"></i>  
							</button>
							<button title="View details"  class="btn btn-xs   bg-gradient-primary btn-flat viewDetails" 
										 id="del_'.$rid.'"
										>
											<i class="fas fa-eye"></i> 
										</button>
					
							
						</td>';
					
					echo "</tr>";
				  }
				  ?>
                 
                
                
					
                  </tbody>
                </table>
				
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
						
						}
				});
			
			
			
			return false;
		});
	
			
			
			
		$(".addModel").click(function(){
			  var r = confirm("Are you sure you want to return?");
			if (r == true) {
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			//alert(id);
			$('#addModalDiv').show();	
			
			 $.ajax({
					url: <?php echo "'". URL . "'" ?> + "Request/getinfoReturn?id=" + id,
					type: 'GET',
					data: { id:id },
					success: function(response){
						//alert(response);
						$('#responseAdd').html(response);	
						/*
							$.ajax({    //create an ajax request to display.php
								type: "GET",
								url: <?php echo  "'".  URL  ."Request/ReturnRequestList'";?>,             
								dataType: "html",   //expect html to be returned                
								success: function(response){                    
									$("#response").html(response); 
									//alert('Approved!');
								}

							/*/
							}
					});
			 
			 }
			 return false;
			
			
					
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
	  
	  
<div class="modal " id="addModalDiv">
	<form id="AddModel" method="post">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Return Vehicle/ສົ່ງລົດ</h4>
              <button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" >
				
				 <div id="responseAdd">	 </div>
				
			
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger closemodal" data-dismiss="modal">Close/ປິດ</button>
              <button type="submit" class="btn btn-primary">Save Details/ບັນທຶກ</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </form>
        <!-- /.modal-dialog -->
      </div>			  
			  
			  
			  
		<div class="modal " id="showDiv" style=" background-color: rgba(0,0,0,.01) !important;
  width: 100%;
  height: 100%;
  overflow: auto;">

       <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Request Details/ລາຍລະອຽດເບີກລົດ</h4>
              <button type="button" class="close closemd" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body scroll" >				
				<div id="vdres"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger closemd" data-dismiss="modal">Close/ປິດ</button>
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
  
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
  