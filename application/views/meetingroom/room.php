
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>


<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="">
<div class="alert alert-success alert-dismissible fade show" role="alert" id="update"  style="display:none">
  <strong>Message/<span class="laotext">ຂໍ້ຄວາມ </span>:</strong> Update Successfully/<span class="laotext">ສຳເລັດແລ້ວ!</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="danger"  style="display:none">
  <strong>Message/<span class="laotext">ຂໍ້ຄວາມ </span>:</strong> Already Exits/<span class="laotext">ມີຂໍ້ມູນນີ້ແລ້ວ!</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

 

                <table class="table table-bordered table-hover table-responsive table-striped" id="example" width="100%" height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th width="30px" >No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Room_Name/<span class="laotext">ຊື່ຫ້ອງປະຊຸມ</span> </th>                   
                    <th>Inclusions/<span class="laotext">ອຸປະກອນທີ່ມີໃນຫ້ອງປະຊຸມ</span> </th>                   
					 <th width="30px" >Action/<span class="laotext">ຈັດການ</span> </th>                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($list as $app) { 
				  $c++;
				  if (isset($app->roomid)){  $id= $app->roomid;}else{$id="";}	
				  if (isset($app->roomname)) { $roomname= $app->roomname;	}else{$roomname="";}
				  if (isset($app->INCLUSIONS)) { $INCLUSIONS= $app->INCLUSIONS;	}else{$INCLUSIONS="";}
				  	$INCLUSIONS1 = strlen($INCLUSIONS) > 100 ? substr($INCLUSIONS,0,100)."..." : $INCLUSIONS;
					echo "<tr>";
					echo "<td style='vertical-align:middle'>".$c."</td>";
					echo '<td style="vertical-align:middle">'.$roomname .' </td>';
					echo '<td style="vertical-align:middle">'.$INCLUSIONS1 .' </td>';
					
					echo '<td class="d-flex" style="vertical-align:middle">
									
									<a href="" class="btn btn-xs  bg-gradient-success btn-flat"  data-toggle="modal" data-target="#Add'.$id.'"
									id="ids_'.$id.'" onClick="return confirm(\'Are you sure you want to edit?\');">
										<i class="fas fa-check"></i> 
									</a>
									<a href="#" class="btn btn-xs btn-block bg-gradient-danger btn-flat deleteGroup" id="del_'.$id.'">
										<i class="fas fa-trash"></i> 
									</a>
								 </td>';
							
					echo "</tr>";
					echo '<div class="modal fade" id="Add'.$id.'">
							
								   <div class="modal-dialog modal-md">
									  <div class="modal-content">
										<div class="modal-header">
										  <h4 class="modal-title">UPDATE MEETING ROOM</h4>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										  </button>
										</div>
										<div class="modal-body">
											
											<div class="row">
													<div class="col-md-6">	
													<strong >ROOM NAME </STRONG>
													</div>
													
											</div>
											
													
											<hr>
											<div class="row">
													<div class="col-md-12">		
														<div class="input-group mb-3">
														<input type="hidden" value="'.$id .'" id="id'.$id.'" class="form-control" name="id" placeholder="Enter room name..." required />
														<input type="text" value="'.$roomname .'" id="name'.$id.'" class="form-control" name="name" placeholder="Enter room name..." required />
																		
														</div>			
													</div>						
											</div>
											
											
											<div class="row">
													<div class="col-md-6">	
													<strong >INCLUSIONS </STRONG>
													</div>
													
											</div>
											
											<hr>
											<div class="row">
													<div class="col-md-12">		
														<div class="input-group mb-3">
														<textArea class="form-control" name="inc" id="inc'.$id.'" placeholder="Enter room inclusion..." rows="10" required >'.$INCLUSIONS .'</textArea>
																		
														</div>			
													</div>						
											</div>
											<div id="addres'.$id.'"></div>
										</div>
										<div class="modal-footer justify-content-between">
										  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										  <button type="submit" class="btn btn-primary" id="updatekey'.$id.'">Save Details</button>
										</div>
									  </div>
									  <!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								 
							</div>';
					
					echo '
					<script type="text/javascript">
							$(document).ready(function() {
								
										$("#updatekey'.$id.'").click(function(){  
										var id=$("#id'.$id.'").val();
										var name=$("#name'.$id.'").val();
										var inc=$("#inc'.$id.'").val();
										
										
										$.ajax({    //create an ajax request to display.php
											type: "GET",
											url: "'.  URL  .'MeetingRoom/UpdateRoom?id=" + id + "&&name=" + name + "&&inc=" + inc ,             
											dataType: "html",   //expect html to be returned                
											success: function(response){                    
												alert(response); 
												window.location.href = "'.  URL  .'MeetingRoom";
												
											}

										});
										
										return false;
										
									});
								});
						</script>';
					
				/*	echo "
					
					
					
					
					
					<script>
					$(document).ready(function(){
						
						 $('#danger').hide();
						 $('#update').hide();
						$('.close').click(function(){
								$('#danger').hide();
								$('#update').hide();
						});
						$('#ids_".$id."').click(function(){
								
						  var el = this;
							var id = this.id;
							var splitid = id.split('_');

							//  id
							var deleteid = splitid[1];
							
							var name=$('#name_".$id."').val();
							 $('#danger').hide();
							$('#update').hide();
							$.ajax({
									url: '". URL . "'  + 'MeetingRoom/UpdateRoom',
									type: 'GET',
									data: { id:deleteid ,name:name },
									success: function(response){
										if(response=='Update Successfully!'){
											$('#update').show().fadeIn(500);
									
										}else{
											$('#danger').show().fadeIn(500);
										}
										
									
									}
								});
						
							
							return false;
							
							
						});
					});
					</script>	
					";*/
				  }
				  ?>
                    </tbody>
                </table>
				
              </div>
			  
	  
						  
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
					url: <?php echo "'". URL . "'" ?> + "MeetingRoom/DeleteRoom",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
					//alert(deleteid);
					//alert(response);
					 ///Removing row from HTML Table
						$(el).closest('tr').css('background','tomato');
						$(el).closest('tr').fadeOut(800, function(){      
							$(this).remove();
						});
						
						
					}
				});
		} else {
		
	  }	
		
    });
});
</script>			  
			  
			  
			  
			  
			  
			  
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
  