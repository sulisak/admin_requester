
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="">


 

                <table class="table table-bordered table-responsive table-hover  table-striped" id="example" width="100%"  height="500px" cellspacing="0">
                 <thead>
                  <tr>
                       <th >Action/<span class="laotext">ຈັດການ</span></th>     
                       <th>Status/<span class="laotext">ສະຖານະ</span></th>
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Request No/<span class="laotext">ເລກຮ້ອງຂໍ.</span></th>
                    <th>Requestor/<span class="laotext">ຜູ້ຮ້ອງຂໍ</span></th>                   
                    <th>Vehicle/<span class="laotext">ລົດ</span></th>                   
                    <th>Date/<span class="laotext">ວັນທີ</span></th>
                    <th>Location/<span class="laotext">ທີ່ຕັ້ງ</span></th>
                    <th>Amount/<span class="laotext">ລາຄາລວມ</span></th>
                    <th>Purpose/<span class="laotext">ຈຸດປະສົງ</span></th>
                    <th>Approved by/<span class="laotext">ອະນຸມັດໂດຍ</span></th>                     
                    
					             
                         
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($list1 as $app) { 
				  $c++;
				  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
				  if (isset($app->reqnum)) { $reqnum= $app->reqnum;	}else{$reqnum="";}
					if (isset($app->rid)){  $rid= $app->rid;	}else{$rid="";}
					if (isset($app->rdate)){  $rdate= $app->rdate;	}else{$rdate="";}
					if (isset($app->location)){  $location= $app->location;}else{$location="";}	
					if (isset($app->cost)){  $cost= $app->cost;	}else{$cost="";}
					if (isset($app->purpose)) { $purpose= $app->purpose;	}else{$purpose="";}
					if (isset($app->approved)){  $approved= $app->approved;	}else{$approved="";}
					if (isset($app->vid)) { $vid= $app->vid;	}else{$vid="";}
					if (isset($app->requestor)) { $requestor= $app->requestor;	}else{$requestor="";}
					if (isset($app->approval)) { $approval= $app->approval;	}else{$approval="";}
					if (isset($app->status)) { $status= $app->status;	}else{$status="";}
					if (isset($app->vyear)) { $vyear= $app->vyear;	}else{$vyear="";}
					if (isset($app->color)) { $color= $app->color;	}else{$color="";}
					if (isset($app->plate)) { $plate= $app->plate;	}else{$plate="";}
					if (isset($app->maker)) { $maker= $app->maker;	}else{$maker="";}
					if (isset($app->model)) { $model= $app->model;	}else{$model="";}
				
					
					
					echo "<tr>";
							echo '<td class="d-flex">
							<a href="'. URL .'Maintainance/LoadPicture?id='.$id.'" class="btn btn-xs btn-block bg-gradient-primary btn-flat "  title="Add Photo">
								<i class="fas fa-plus"></i> 
							</a>
							<a href="#" class="btn btn-xs  bg-gradient-info btn-flat  app"  id="del_'.$id.'" title="Update">
								<i class="fas fa-check"></i> 
							</a>';
							
						
						echo '
							<a href="#" class="btn btn-xs btn-block bg-gradient-danger btn-flat deleteGroup" id="del_'.$id.'" title="Delete">
								<i class="fas fa-trash"></i> 
							</a>
							
						 </td>';
						 
					if($status==1){
						echo "<td ><p id='id_".$id."'>Complete</p></td>";					
					}else{
						echo "<td><p id='id_".$id."'>Pending</p></td>";	
					}	 
					echo "<td>".$c."</td>";
					echo "<td><div style='width:150px'>".$reqnum ."</td>";
					echo "<td><div style='width:250px'>".strtoupper($requestor)."</div></td>";
				
					echo "<td><div style='width:350px'>".$maker." ".$model." ".$vyear ." #".$plate." 
					" . $color."</div></td>";
					echo "<td><div style='width:150px'>".$rdate."</div></td>";
					echo "<td><div style='width:250px'>".$location."</div></td>";
					echo "<td>".number_format($cost)."</td>";
					echo "<td><div style='width:450px'>".($purpose)."</div></td>";
					
					
					
					if($status==1){
						echo "<td><div style='width:250px'>".strtoupper($approval)."</div></td>";					
					}else{
						echo "<td><p id='nameid_".$id."'> </p></td>";	
					}
					
					
				
					
					
			
					
					echo "</tr>";
				  }
				  ?>
                 
                
                
					
                  </tbody>
                </table>
				
              </div>
			  
<script>
$(document).ready(function(){

    // Delete 
    $('.app').click(function(){
		
		
	
		
	  
		
        var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];
		
		$.ajax({
					url: <?php echo "'". URL . "'" ?> + "Maintainance/UpdateStatus",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
					var id='#id_' + deleteid;
					var namme='#nameid_' + deleteid;
					$(id).html("Complete");
					$(namme).html(<?php echo "'".$_SESSION['SESS_MEMBER_Fname']."'"?>);
						//alert(response);
					}
				});
		
		return false;
		
		
    });
});
</script>			  
						  
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
					url: <?php echo "'". URL . "'" ?> + "Maintainance/deleteMaintainance",
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
  