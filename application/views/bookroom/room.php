
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="">


 
        <?php echo $today;?>
                <table class="table table-bordered table-hover table-responsive  table-striped" id="example" width="100%"  height="500px"  cellspacing="0">
                 <thead>
                  <tr>
                    <th>No/<span class="laotext"> ລຳດັບ</span></th>
                    <th>Room/<span class="laotext"> ຫ້ອງປະຊຸມ</span></th>
                    <th>Requestor/<span class="laotext"> ຜູ້ຮ້ອງຂໍ</span></th>                    
                    <th>Start/<span class="laotext"> ເລີ່ມ</span></th> 
                    <th>End/<span class="laotext"> ສິ້ນສຸດ</span></th> 
                    <th>Purposed/<span class="laotext"> ຈຸດປະສົງ</span></th> 
                    <th>Participant/<span class="laotext"> ຜູ້ເຂົ້າຮ່ວມ</span></th> 
                    <th>Remark/<span class="laotext"> ໝາຍເຫດ</span></th> 
                    <th>Status/<span class="laotext"> ສະຖານະ</span></th> 
                   
					             
                    <th >Action/<span class="laotext"> ຈັດການ</span></th>                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($list as $app) { 
				  $c++;
				  if (isset($app->rbid)){  $id= $app->rbid;}else{$id="";}	
				  if (isset($app->purposed)) { $purposed= $app->purposed;	}else{$purposed="";}
					if (isset($app->participant)){  $participant= $app->participant;	}else{$participant="";}
					if (isset($app->startdate)){  $startdate= $app->startdate;	}else{$startdate="";}
					if (isset($app->enddate)){  $enddate= $app->enddate;}else{$enddate="";}	
					if (isset($app->remarks)){  $remarks= $app->remarks;	}else{$remarks="";}
					if (isset($app->roomName)) { $roomName= $app->roomName;	}else{$roomName="";}
					if (isset($app->requestor)){  $requestor= $app->requestor;	}else{$requestor="";}
					if (isset($app->creator)) { $creator= $app->creator;	}else{$creator="";}
					if (isset($app->status)) { $status= $app->status;	}else{$status="";}
					
					
					echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td><div style='min-width:300px'>".strtoupper($roomName)."</div></td>";
					echo "<td><div style='min-width:250px'>".strtoupper($requestor)."</div></td>";
					echo "<td><div style='min-width:200px'>".($startdate)."</div></td>";
					echo "<td><div style='min-width:200px'>".($enddate)."</div></td>";
					echo "<td><div style='min-width:300px'>".strtoupper($purposed)."</div></td>";
					echo "<td>".number_format($participant)."</td>";
					echo "<td><div style='min-width:300px'>".($remarks)."</div></td>";
					echo "<td>
					<Span class='cc'>".($status)."</span>
					
					</td>";
					
					
					
					if($status=='Completed' ||  $status=='Checked-In' ||  $status=='Cancelled'){
					echo "<td></td>";
					}else{
					echo '<td class="d-flex">
							
							<!--<a href="'. URL .'Fuel/UpdateFuel?id='.$id.'" class="btn btn-xs  bg-gradient-success btn-flat" onClick="return confirm(\'Are you sure you want to edit?\');">
								<i class="fas fa-edit"></i> 
							</a>-->
							<a href="#" class="btn btn-xs btn-block bg-gradient-danger btn-flat deleteGroup" id="del_'.$id.'">
								<i class="fas fa-trash"></i> Cancel
							</a>
						 </td>';
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
    $('.deleteGroup').click(function(){
		
		
	  var r = confirm("Are you sure you want to Cancel?");
	  if (r == true) {
		
	  
		
        var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];
      
				$.ajax({
					url: <?php echo "'". URL . "'" ?> + "BookRoom/DeleteBooked",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
					//alert(deleteid);
					window.location.href = <?php echo "'".  URL  ."BookRoom';";?>
					//alert(response);
					 ///Removing row from HTML Table
						//$(el).closest('tr').css('background','tomato');
						//$(el).closest('tr').fadeOut(800, function(){      
						//	$(this).remove();
						//});
						
						
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
			 
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
  