

<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">
<div class="e">
<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none" id="messageres">
  <p><b>Message/ຂໍ້ຄວາມ : </b> <span  id="msg">You should check in on some of those fields below/<span class="laotext">ກວດເບິ່ງໃນບາງຫ້ອງຂໍ້ມູນດັ່ງລຸ່ມນີ້.</span></p>
  <button type="button" id="closebt" class="close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
(Reset Password/<span class="laotext">ຕັ້ງລະຫັດຄືນໃໝ່ເປັນ</span> :12345)
<hr>
                <table class="table table-bordered table-hover  table-striped table-responsive" id="example" width="100%" height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th width="30px">No/<span class="laotext">ລຳດັບ</span></th>
                    <th width="50px">Profile/<span class="laotext">ຂໍ້ມູນ</span></th>
                    <th>Username/<span class="laotext">ຊື່ເຂົ້າໃຊ້ງານ</span></th>
                    <th>Fullname/<span class="laotext">ຊື່ເຕັມ</span></th>
                    <th>Email/<span class="laotext">ອີເມວ</span></th>
                    <th >User_type/<span class="laotext">ປະເພດຜູ້ໃຊ້</span></th>
                    <th >Position/<span class="laotext">ຕຳແໜ່ງ</span></th>
                    <th >Business Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></th>
                    <th >Department/<span class="laotext">ພະແນກ</span></th>
                    <th >Contact/<span class="laotext">ເບີຕິດຕໍ່</span></th>
                    <th width="120px">Action/<span class="laotext">ຈັດການ</span></th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				// print_r($list1);
				  foreach ($list1 as $app) { 
				  $c++;
					if (isset($app->userid))  $userid= $app->userid;	
					if (isset($app->username))  $username= $app->username;	
					if (isset($app->fullname))  $fullname= $app->fullname;	
					if (isset($app->contact))  $contact= $app->contact;	
					if (isset($app->depid))  $depid= $app->depid;	
					if (isset($app->department))  $department= $app->department;	
					if (isset($app->cid))  $cid= $app->cid;	
					if (isset($app->company))  $company= $app->company;	
					if (isset($app->profile))  $profile= $app->profile;	
					if (isset($app->position))  $position= $app->position;	
					if (isset($app->Email))  $Email= $app->Email;	
					if (isset($app->position1))  $position1= $app->position1;
					
				
					echo "<tr class='data' >";
					echo "<td style='vertical-align: middle;'>".$c."</td>";
					echo "<td style='vertical-align: middle;'><img src='". URL ."public/img/profile/".$profile."' class='img-circle'
					width='40px' height='40px' >
					</td>";
					echo "<td style='vertical-align: middle;'><div style='width:150px'>".$username."</div></td>";
					echo "<td style='vertical-align: middle;'><div style='width:150px'>".($fullname)."</div></td>";
					echo "<td style='vertical-align: middle;'><div style='width:250px'>".($Email)."</div></td>";
					
					echo '<td style="vertical-align: middle;"><div style="width:150px">'.$position.'</div></td>';
					echo '<td style="vertical-align: middle;"><div style="width:150px">'.$position1.'</div></td>';
					echo '<td style="vertical-align: middle;"><div style="width:150px">'.$company.'</div></td>';
					echo '<td style="vertical-align: middle;"><div style="width:150px">'.$department.'</div></td>';
					echo '<td style="vertical-align: middle;"><div style="width:150px">'.$contact.'</div></td>';
				
			
					
					echo '<td style="vertical-align: middle;" align="center">
								<div style="width:150px">
									<a href="#" class="btn btn-sm bg-gradient-info btn-flat edit"  id="reset_'.$userid.'">
										<i class="fas fa-undo"></i> 
									</a>
									<a href="'. URL .'Users/UpdateForm?id='.$userid.'" class="btn btn-sm bg-gradient-success btn-flat">
										<i class="fas fa-check"></i> 
									</a>
								
									<a href="#" class="btn btn-sm  bg-gradient-danger btn-flat deleteGroup" id="del_'.$userid.'">
										<i class="fas fa-trash"></i> 
									</a>
								</div>
							
						</td>';
					echo "</tr>";
					
					echo "<script>
							$(document).ready(function(){
								
								$('#messageres').hide();
								$('#closebt').click(function(){
										$('#messageres').hide();
								});
									
								//reset
								$('#reset_".$userid."').click(function(){
									
									
								  var r = confirm('Are you sure you want to reset password?');
								  if (r == true) {
									
								  
									
									var el = this;
									var id = this.id;
									var splitid = id.split('_');
	
									// Delete id
									var deleteid = splitid[1];
									
									$.ajax({
											url: '". URL ."' + 'Users/ResetPassword',
											type: 'GET',
											data: { id:deleteid},
											success: function(response){
											$('#messageres').show();
											//alert(response);
											$('#msg').html(response);
											$('#messageres').fadeIn();
											$('#messageres').fadeIn('slow');
											$('#messageres').fadeIn(3000);
											
											
												
												
											}
										});
									} else {
									
								  }	
									
								});
							});
							</script>";
					
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
					url: <?php echo "'". URL . "'" ?> + "Users/DeleteUser",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
					//alert(deleteid);
					///alert(response);
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
  