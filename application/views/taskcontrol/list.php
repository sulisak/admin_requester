
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">

<style>
table{
  margin: 0 auto;
  width: 100%;
  clear: both;
  border-collapse: collapse;
  table-layout: fixed; // ***********add this
  word-wrap:break-word; // ***********and this
}
</style>

<div class="">


 

                <table class="table table-bordered table-hover table-responsive  table-striped" id="example" width="100%" height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Code/<span class="laotext">ລະຫັດ</span></th>
                    <th>Work_Code/<span class="laotext">ລະຫັດໜ້າວຽກ</span></th>
                    <th>Topic/<span class="laotext">ຫົວຂໍ້</span></th>        
					            
                    <th >Description/<span class="laotext">ລາຍລະອຽດ</span></th>                    
                     <th>Task_Details/<span class="laotext">ລາຍລະອຽດໜ້າວຽກ</span></th>  
                    <th>Incharge/<span class="laotext">ຮັບຜິດຊອບ</span></th> 
                    <th>Priority/<span class="laotext">ຄວາມສຳຄັນ</span></th> 
                    <th>Progress/<span class="laotext">ຂັ້ນຕອນ</span></th> 
                    <th>Start/<span class="laotext">ເລີ່ມ</span></th> 
                    <th>Deadline/<span class="laotext">ວັນສິ້ນສຸດ</span></th> 
                    <th>Deadline_2/<span class="laotext">ວັນສິ້ນສຸດ</span> 2</th> 
                    <th>Duration/<span class="laotext">ໄລຍະເວລາ</span></th> 
                    <th>Completed_Date/<span class="laotext">ວັນທີສຳເລັດ</span></th> 
                    <th>Completed_Month/<span class="laotext">ເດືອນສຳເລັດ</span></th> 
                    <th>%Completed/<span class="laotext">ເປີເຊັນສຳເລັດ</span></th> 
                    <th>Remark/<span class="laotext">ໝາຍເຫດ</span></th> 
                
					             
                    <th >Action/<span class="laotext">ຈັດການ</span></th>                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  //print_r($list);
				  foreach ($list as $app) { 
				  $c++;
				  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
				  if (isset($app->tid)) { $tid= $app->tid;	}else{$tid="";}
					if (isset($app->code)){  $code= $app->code;	}else{$code="";}
					if (isset($app->topic)){  $topic= $app->topic;	}else{$topic="";}
					if (isset($app->details)){  $details= $app->details;}else{$details="";}	
					if (isset($app->taskstatus)){  $taskstatus= $app->taskstatus;	}else{$taskstatus="";}
					if (isset($app->incharge)) { $incharge= $app->incharge;	}else{$incharge="";}
					if (isset($app->priority)){  $priority= $app->priority;	}else{$priority="";}
					if (isset($app->workprogress)) { $workprogress= $app->workprogress;	}else{$workprogress="";}
					if (isset($app->startdate)) { $startdate= $app->startdate;	}else{$startdate="";}
					if (isset($app->deadline)) { $deadline= $app->deadline;	}else{$deadline="";}
					if (isset($app->deadline2)) { $deadline2= $app->deadline2;	}else{$deadline2="";}
					if (isset($app->duration)) { $duration= $app->duration;	}else{$duration="";}
					if (isset($app->completedDate))  {$completedDate= $app->completedDate;	}else{$completedDate="";}
					if (isset($app->completedmonth))  {$completedmonth= $app->completedmonth;	}else{$completedmonth="";}
					if (isset($app->percentage )) { $percentage = $app->percentage ;	}else{$percentage="";}
					if (isset($app->remarks )) { $remarks = $app->remarks ;	}else{$remarks="";}
			
				
					
					
					echo "<tr>";
					echo "<td>".$c."</td>";	
					echo "<td><div style='width:150px'>".strtoupper($tid)."</div></td>";
					echo "<td><div style='width:150px'>".strtoupper($code)."</div></td>";
					echo "<td><div style='width:350px'>".($topic)."</div></td>";
					echo "<td><div style='width:250px'>".($details)."</div></td>";
					echo "<td><div style='width:250px'>".($taskstatus)."</div></td>";
					echo "<td><div style='width:150px'>".($incharge)."</div></td>";
					
					
					$priority1=strtoupper($priority);
					/*if($priority1=="NORRMAL"){
							echo "<td><span style='color:#fff; background:#f8cecc; width:100%'> ".strtoupper($priority1)."</span></td>";
					}elseif($priority1=="HIGH"){
						echo "<td><span style='color:#fff; background:#f8cecc; width:100%'> ".strtoupper($priority1)."</span></td>";
					}elseif($priority1=="LOW"){
						echo "<td><span style='color:#fff; background:#f8cecc; width:100%'> ".strtoupper($priority1)."</span></td>";
					}elseif($priority1=="MEDIUM"){
						echo "<td><span style='color:#fff; background:#f8cecc; width:100%'> ".strtoupper($priority1)."</span></td>";
					}elseif($priority1=="Completed"){
						echo "<td><span style='color:#fff; background:#f8cecc; width:100%'> ".strtoupper($priority1)."</span></td>";
					}	
					*/
						
				
					if($priority1=="NORMAL"){
							echo "<td><span style='color:#000; background:#fff3cd; width:100%; padding:10px 10px 10px 10px' > ".strtoupper($priority1)."</span></td>";
					}elseif($priority1=="HIGH"){
						echo "<td><span style='color:#000; background:#f8cecc; width:100%;padding:10px 10px 10px 10px'> ".strtoupper($priority1)."</span></td>";
					}elseif($priority1=="LOW"){
						echo "<td><span style='color:#000; background:#fff3cd; width:100%;padding:10px 10px 10px 10px'> ".strtoupper($priority1)."</span></td>";
					}elseif($priority1=="MEDIUM"){
						echo "<td><span style='color:#000; background:#fff3cd; width:100%;padding:10px 10px 10px 10px'> ".strtoupper($priority1)."</span></td>";
					}	
					
					
					$workprogress1=strtoupper($workprogress);
				
				
				
					if($workprogress1=="IN PROGRESS"){
							echo "<td><span style='color:#fff; background:#1ca4e5; width:100%; padding:10px 10px 10px 10px' > IN_PROGRESS</span></td>";
					}elseif($workprogress1=="DEFERRED"){
						echo "<td><span style='color:#fff; background:#a20025; width:100%;padding:10px 10px 10px 10px'> ".strtoupper($workprogress1)."</span></td>";
					}elseif($workprogress1=="CANCELLED"){
						echo "<td><span style='color:#fff; background:#a20025; width:100%;padding:10px 10px 10px 10px'> ".strtoupper($workprogress1)."</span></td>";
					}elseif($workprogress1=="PROCESSING"){
						echo "<td><span style='color:#fff; background:#1ca4e5; width:100%;padding:10px 10px 10px 10px'> ".strtoupper($workprogress1)."</span></td>";
					}elseif($workprogress1=="COMPLETED"){
						echo "<td><span style='color:#fff; background:#00cc00; width:100%;padding:10px 10px 10px 10px'> ".strtoupper($workprogress1)."</span></td>";
					}else{
						echo "<td> ".strtoupper($workprogress1)."</td>";
					}	
					
					
					echo "<td><div style='width:150px'>".($startdate)."</div></td>";
					echo "<td><div style='width:150px'>".($deadline)."</div></td>";
					echo "<td><div style='width:150px'>".($deadline2)."</div></td>";
					echo "<td>".($duration)."</td>";
					echo "<td>".($completedDate)."</td>";
					echo "<td>".($completedmonth)."</td>";
					
					
					
					
					if($workprogress1=="IN PROGRESS"){
							echo "<td><span style='color:#fff; background:#1ca4e5; width:100%; padding:10px 10px 10px 10px' >".($percentage)."</span></td>";
					}elseif($workprogress1=="DEFERRED"){
						echo "<td><span style='color:#fff; background:#a20025; width:100%;padding:10px 10px 10px 10px'> ".($percentage)."</span></td>";
					}elseif($workprogress1=="CANCELLED"){
						echo "<td><span style='color:#fff; background:#a20025; width:100%;padding:10px 10px 10px 10px'> ".($percentage)."</span></td>";
					}elseif($workprogress1=="PROCESSING"){
						echo "<td><span style='color:#fff; background:#1ca4e5; width:100%;padding:10px 10px 10px 10px'> ".($percentage)."</span></td>";
					}elseif($workprogress1=="COMPLETED"){
						echo "<td><span style='color:#fff; background:#00cc00; width:100%;padding:10px 10px 10px 10px'> ".($percentage)."</span></td>";
					}elseif($workprogress1=="EXTEND"){
						echo "<td><span style='color:#fff; background:#e3c800; width:100%;padding:10px 10px 10px 10px'> ".($percentage)."</span></td>";
					}else{
						echo "<td> ".($percentage)." </td>";
					}	
					
					
					
					echo "<td><div style='width:350px'>".($remarks)."</div></td>";
				
					
					
					
					echo '<td class="d-flex">
							
							<a href="'. URL .'TaskControl/UpdateForm?id='.$id.'" class="btn btn-xs  bg-gradient-success btn-flat" onClick="return confirm(\'Are you sure you want to edit?\');">
								<i class="fas fa-edit"></i> Edit 
							</a>
							<a href="#" class="btn btn-xs  bg-gradient-danger btn-flat deleteGroup" id="del_'.$id.'">
								<i class="fas fa-trash"></i>  Delete
							</a>
						 </td>';
					
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
		
		
	  var r = confirm("Are you sure you want to Remove?");
	  if (r == true) {
		
	  
		
        var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];
      
				$.ajax({
					url: <?php echo "'". URL . "'" ?> + "TaskControl/DeleteTask",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
					
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
  