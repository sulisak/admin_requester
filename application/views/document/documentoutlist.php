
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>


<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">
<style>
tr td{
  padding: 0 0 0 10px !important;
  margin: 0 !important;
    vertical-align: middle !important;
}
</style>


<div class="">
		
<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none" id="messageres">
  <p><b>Message/<span class="laotext">ຂໍ້ຄວາມ </span>: </b> <span class="laotext" id="msg"></span></p>
  <button type="button" id="closebt" class="close">
    <span aria-hidden="true">&times;</span>
  </button>
  
 </div>		
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none" id="messageres2">
  <p><b>Message/<span class="laotext">ຂໍ້ຄວາມ : </span></b> <span  class="laotext">Already Exist/ມີຂໍ້ມູນນີ້ແລ້ວ</span></p>
  <button type="button" id="closebt2" class="close">
    <span aria-hidden="true">&times;</span>
  </button>
 </div>

                <table class="table table-bordered table-hover table-responsive  table-striped" id="example" width="100%"  height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th width="30px">No/<span class="laotext">ລຳດັບ</span></th>
                    <th>REFNO/<span class="laotext">ເລກອ້າງອີງ</span></th>
                    <th>INTENDED_REC/<span class="laotext">ບັນທຶກຜູ້ເຂົ້າຮ່ວມ</span></th>                   
                    <th>MESSENGER/<span class="laotext">ຜູ້ສົ່ງຈົດໝາຍ</span></th>
                    <th>RECEIVER/<span class="laotext">ຜູ້ຮັບເອກະສານ</span></th>
                    <th>SENDER/<span class="laotext">ຜູ້ສົ່ງ</span></th>
                     <th>WORKPLACE/<span class="laotext">ສະຖານທີ່ເຮັດວຽກ</span></th
                    <th>DOCTYPE/<span class="laotext">ປະເພດເອກະສານ</span></th>
                    <th>TYPE</th>
                    <th>STATUS</th>
                    <th width="60px">Action/<span class="laotext">ຈັດການ</span></th>                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($listDoc as $app) { 
				  $c++;
				  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
				  if (isset($app->refno)) { $refno= $app->refno;	}else{$refno="";}
				  if (isset($app->intentedrec)) { $intentedrec= $app->intentedrec;	}else{$intentedrec="";}
				  if (isset($app->recEmail )) { $recEmail = $app->recEmail ;	}else{$recEmail ="";}
				  if (isset($app->businessunit )) { $businessunit = $app->businessunit ;	}else{$businessunit ="";}
				  if (isset($app->description )) { $description = $app->description ;	}else{$description ="";}
				  if (isset($app->messenger )) { $messenger = $app->messenger ;	}else{$messenger ="";}
				  if (isset($app->messengertel )) { $messengertel = $app->messengertel ;	}else{$messengertel ="";}
				  if (isset($app->receiver )) { $receiver = $app->receiver ;	}else{$receiver ="";}
				  if (isset($app->sender )) { $sender = $app->sender ;	}else{$sender ="";}
				  if (isset($app->senderemail )) { $senderemail = $app->senderemail ;	}else{$senderemail ="";}
				  if (isset($app->datesend )) { $datesend = $app->datesend ;	}else{$datesend ="";}
				  if (isset($app->doctype )) { $doctype = $app->doctype ;	}else{$doctype ="";}
				  if (isset($app->type )) { $type = $app->type ;	}else{$type ="";}
				  if (isset($app->status )) { $status = $app->status ;	}else{$status ="";}
				  if (isset($app->companyid )) { $companyid = $app->companyid ;	}else{$companyid ="";}
				  if (isset($app->userid )) { $userid = $app->userid ;	}else{$userid ="";}
				  if (isset($app->department )) { $department = $app->department ;	}else{$department ="";}
					
				    if (isset($app->documentNum )) { $documentNum = $app->documentNum ;	}else{$documentNum ="";}
				      if (isset($app->Remarks )) { $Remarks = $app->Remarks ;	}else{$Remarks ="";}
				        if (isset($app->workplace )) { $workplace = $app->workplace ;	}else{$workplace ="";}
				
				
					echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td>".$documentNum."</td>";
						echo "<td>".$intentedrec."</td>";
					echo "<td>".$messenger."</td>";
					echo "<td>".$receiver."</td>";
					
				
				
						echo "<td>".$sender."</td>";
					echo "<td>".$Remarks."</td>";
					echo "<td>".$doctype."</td>";
					echo "<td>".$type."</td>";
					
					if($status==0){
							echo "<td bgcolor='#ffe697' i>Pending</td>";
							echo '<td class="d-flex" style="vertical-align: middle;" align="center">
							<a href="#" class="btn btn-sm btn-block bg-gradient-info btn-flat " title=" VIEW"
							 data-toggle="modal" data-target="#Add'.$id.'">
						
								<i class="fas fa-eye"></i> VIEW 
							</a>
						<a href="#"  class="btn btn-sm  bg-gradient-success btn-flat confirm"  id="edt_'.$id.'"
							 title="CONFIRM">
								<i class="fas fa-check"></i> CONFIRM
							</a>
							<a href="#" class="btn btn-sm btn-block bg-gradient-danger btn-flat DeteleDepart" id="del_'.$id.'" title="CANCEL">
						
								<i class="fas fa-trash"></i> CANCEL
							</a>
							
							
						 </td>';
					}elseif($status==2){
						echo "<td bgcolor='#e7acac'>Cancelled</td>";
						echo '<td >	<a href="#" class="btn btn-sm btn-block bg-gradient-info btn-flat " title=" VIEW"
							 data-toggle="modal" data-target="#Add'.$id.'">VIEW</a></td>';
						
					}else{
						echo "<td bgcolor='#a2f2b7'>Completed</td>";
						echo '<td class="d-flex" style="vertical-align: middle;" align="center">
							<a href="#" class="btn btn-sm btn-block bg-gradient-info btn-flat " title=" VIEW"
							 data-toggle="modal" data-target="#Add'.$id.'">
						
								<i class="fas fa-eye"></i> VIEW 
							</a>
							<a href="#"  class="btn btn-sm  bg-gradient-success btn-flat confirm" id="edt_'.$id.'"
							title="CONFIRM">
								<i class="fas fa-check"></i> CONFIRM
							</a>
							<!--<a href="#" class="btn btn-sm btn-block bg-gradient-danger btn-flat DeteleDepart" id="del_'.$id.'"  title="CANCEL">
						
								<i class="fas fa-trash"></i> CANCEL
							</a>-->
							
							
						 </td>';
					}
				
					
					
					
					
					echo "</tr>";
					
							
							
							echo '
							<div class="modal fade" id="Add'.$id.'">
									   <div class="modal-dialog modal-lg">
										  <div class="modal-content">
											<div class="modal-header">
											  <h4 class="modal-title">View Details</h4>
											  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											  </button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
														<b>Ref. No.</b>
														<div class="input-group mb-3">
														  <input type="text" class="form-control" value="'.$documentNum.'"  disabled="disabled"  style="background:#fff" name="ref" required placeholder="Enter Department name">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-code-branch"></i></span>
														  </div>
														</div>
													</div>
													<div class="col-md-6">
													
														<b>Sender/ <span class="laotext">ຜູ້ສົ່ງເອກະສານຕົ້ນທາງ</span></b>
															<div class="input-group mb-3">
															  <input type="text" class="form-control" value="'.$sender.'"  disabled="disabled"  style="background:#fff" name="ref" required placeholder="Enter Department name">
															  <div class="input-group-append">
																<span class="input-group-text"><i class="fas fa-user"></i></span>
															  </div>
														</div>
													</div>
												</div>
												
												
													<div class="row">
													<div class="col-md-6">
													<b>Business Unit/ <span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></b>
														<div class="input-group mb-3">
														  
														  <input type="text" class="form-control" disabled="disabled"  disabled="disabled"  style="background:#fff" value ="'.$businessunit.'" required placeholder="Enter Description">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-building"></i></span>
														  </div>
														</div>
													</div>
													<div class="col-md-6">
													<b>Department/<span class="laotext">ພະແນກ</span></b>
														<div class="input-group mb-3">
														  
														  <input type="text" class="form-control" disabled="disabled" required  disabled="disabled"  style="background:#fff" value ="'.$department.'">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-code-branch"></i></span>
														  </div>
														</div>
													</div>
													</div>
													<div class="row">
													<div class="col-md-4">
													<b>Description/<span class="laotext">ອະທິບາຍ</span></b>
														<div class="input-group mb-3">
														  <input type="text" class="form-control" name="des"  disabled="disabled"  style="background:#fff" value ="'.$description.'
														  required placeholder="Enter Description">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-code-branch"></i></span>
														  </div>
														</div>
													</div>
													<div class="col-md-4">
											<b>Messenger Name/<span class="laotext">ຊື່ຜູ້ຈັດສົ່ງເອກະສານ</span></b>
														<div class="input-group mb-3">
														  <input type="text" class="form-control" name="messenger"  disabled="disabled"  style="background:#fff"  value ="'.$messenger.'" required placeholder="Enter Messenger Name">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-envelope"></i></span>
														  </div>
														</div>
													</div>
													<div class="col-md-4">
											<b>Messenger Tel/<span class="laotext">ເບີໂທຜູ້ຈັດສົ່ງເອກະສານ</span></b>
														<div class="input-group mb-3">
														  <input type="text" class="form-control" name="messengertel"  disabled="disabled"  style="background:#fff"  value ="'.$messengertel.'" required placeholder="Enter Messenger Email">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-phone"></i></span>
														  </div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
													<b>(Receptionist /EA) / <span class="laotext">  ຜູ້ຈັດເອກະສານຂາອອກ  </span></b>
														<div class="input-group mb-3">
														  <input type="text" class="form-control" name="receiver" disabled="disabled"  style="background:#fff" value ="'.$receiver.'" required placeholder="Enter Receiver">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-user"></i></span>
														  </div>
														</div>
													</div>
													<div class="col-md-6">
													
													<b>Intended Receiver/<span class="laotext">  ຜູ້ຮັບເອກະສານປາຍທາງ </span></b>
														<div class="input-group mb-3">
														  <input type="text" class="form-control" name="sender"   disabled="disabled"  style="background:#fff" value ="'.$intentedrec.'" required placeholder="Enter Sender">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-user"></i></span>
														  </div>
														</div>
													</div>
													
													
												</div>
												<div class="row">
                                    				    <div class="col-md-6">
                                    			<b>Receivers Email/<span class="laotext">ອີເມວຜູ້ຮັບເອກະສານປາຍທາງ</span></b>
                                    						<div class="input-group mb-3">
                                    						  <input type="email" class="form-control" name="email"  disabled="disabled"  style="background:#fff" value ="'.$recEmail.'"  required placeholder="Enter Receiver Email">
                                    						  <div class="input-group-append">
                                    							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    						  </div>
                                    						</div>
                                    					</div>
                                    					<div class="col-md-6">
                                    				<b>Workplace/<span class="laotext">ສະຖານທີ່ເຮັດວຽກຜູ້ຮັບເອກະສານປາຍທາງ</b>
                                    						<div class="input-group mb-3">
                                    						  <input type="text" class="form-control" name="workplace"  disabled="disabled"  style="background:#fff" value ="'. $Remarks.'" required placeholder="Enter Workplace">
                                    						  <div class="input-group-append">
                                    							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    						  </div>
                                    						</div>
                                    					</div>
                                    				</div>
												<div class="row">
													<div class="col-md-4">
													<b>Date   /<span class="laotext">  ວັນທີ  </span></b>
														<div class="input-group mb-3">
														  <input type="date" class="form-control" name="date" disabled="disabled"  style="background:#fff" value ="'.$datesend.'" required placeholder="Enter Receiver">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-calendar"></i></span>
														  </div>
														</div>
													</div>
													<div class="col-md-4">
													<b>Doc Type  /<span class="laotext">  ປະເພດບັນຈຸພັ  </span></b>
														<div class="input-group mb-3">
														  <input type="text" class="form-control" name="date"  disabled="disabled"  style="background:#fff" value ="'.$doctype.'" required placeholder="Enter Receiver">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-paperclip"></i></span>
														  </div>
														</div>
														</div>
														<div class="col-md-4">
													<b>Type   /<span class="laotext"> ປະເພດ   </span></b>
														<div class="input-group mb-3">
														  
															 <input type="text" class="form-control" name="date"  disabled="disabled"  style="background:#fff" value ="'.$type.'" required placeholder="Enter Receiver">
														  <div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-copy"></i></span>
														  </div>
														</div>
													</div>
													
												</div>
														<div class="row">
					        <div class="col-md-12">
					        	<b>Remarks/<span class="laotext">ໝາຍເຫດ</span></b>
					           <Textarea class="form-control" name="remarks"  disabled="disabled"  style="background:#fff" placeholder="Enter remarks" rows="7">'.$workplace.'</textarea>
					        </div>
					</div>
												
											</div>
											<div class="modal-footer justify-content-between">
											
											</div>
										  </div>
										  <!-- /.modal-content -->
										</div>
										
								</div>';	
			
				
				
				
				  }
				  ?>
                    </tbody>
                </table>
				
              </div>
			  
<script>
$(document).ready(function(){
	
	

    // confirm 
    $('.confirm').click(function(){
			var r = confirm("Are you sure you want to send email and marked as complete??");
	  if (r == true) {
		
	  var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];
		//alert(deleteid);
		
		$.ajax({
					url: <?php echo "'". URL . "'" ?> + "Document/updateComplete",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
//alert(response);
							$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Document/LoadData1'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						 });
						 return false;
						
					}
				});
	  }
		return false;
		
		
    }); 
	// Delete 
    $('.DeteleDepart').click(function(){
			var r = confirm("Are you sure you want to cancel?");
	  if (r == true) {
		
	  var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];
	
		
		$.ajax({
					url: <?php echo "'". URL . "'" ?> + "Document/deleteData",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
					
							$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Document/LoadData1'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						 });
						 return false;
						
					}
				});
	  }
		return false;
		
		
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
  