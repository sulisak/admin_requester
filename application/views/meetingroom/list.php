
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>


<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="row">


 
            <!--
                <table class="table table-bordered table-hover table-responsive table-striped" id="example" width="100%" height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th width="30px" >No/<span class="laotext">ລຳດັບ</span></th>
                   
                    <th>Room_Name/<span class="laotext">ຊື່ຫ້ອງປະຊຸມ</span> </th>                   
                    <th>Requestor/<span class="laotext">ຊື່ຜູ້ຈອງຫ້ອງປະຊຸມ</span> </th>
                    <th width="40px" >START DATE/<span class="laotext">ວັນທີເລີ່ມຕົ້ນ</span> </th>
                     <th width="40px" >END DATE/<span class="laotext">ວັນທີສຳເລັດ</span> </th>
                      <th width="30px" >Purpose/<span class="laotext">ຈຸດປະສົງ</span> </th>
                       <th width="30px" >Participant/<span class="laotext">ຈຳນວນຜູ້ເຂົ້າຮ່ວມ</span> </th>
                        <th width="30px" >Remark/<span class="laotext">ໝາຍເຫດ</span> </th>
                         <th width="30px" >Status/<span class="laotext">ສະຖານະ</span> </th>

                         <th width="30px" >Action/<span class="laotext">ຈັດການ</span> </th>


                         <!--  <th width="30px" >Action/<span class="laotext">ຈັດການ</span> </th> -->                   
                 <!-- </tr>
                  </thead>
                  <tbody>
                  -->
				  <?php 
				  $c=0;
				  // print_r($listuserrequest); // to display data in array
				  foreach ($listuserrequest as $app) { 
				  $c++;
if (isset($app->rbid)){  $rbid= $app->rbid;}else{$rbid="";}	
if (isset($app->rid)){  $rid= $app->rid;}else{$rid="";} 
if (isset($app->roomName)){ $roomName= $app->roomName;}else{$roomName="";}
if (isset($app->requestor)) { $requestor= $app->requestor;}else{$requestor="";}
if (isset($app->startdate)) { $startdate= $app->startdate;}else{$startdate="";}
if (isset($app->enddate)) { $enddate= $app->enddate;}else{$enddate="";}
if (isset($app->purposed)) { $purposed= $app->purposed;}else{$purposed="";}
if (isset($app->participant)) { $participant= $app->participant;}else{$participant="";}
if (isset($app->remark)) { $remark= $app->remark;}else{$remark="";}
if (isset($app->status)) { $status= $app->status;}else{$status="";}
				
    echo "<div class='col-md-4 '>
                    <div class='card'>
                          <div class='card-header'>
                            <h3 class='card-title'>
                                <b>Room Name /<span class='laotext'>ຊື່ຫ້ອງປະຊຸມ</span> </b><br> ".strtoupper($roomName)."
                            </h3>
                          </div>
                        <div class='card-body' style='font-size:12px'>
                           
                         <b>START DATE & TIME /<span class='laotext'>ວັນທີ-ເວລາເລີ່ມຕົ້ນ</span></b> : <br>".strtoupper($startdate)."  <br>
                            <b>END DATE & TIME /<span class='laotext'>ວັນທີ-ເວລາສິ້ນສຸດ</span> </b> : <br>".strtoupper($enddate)."  <br>
                            <b>PURPOSED /<span class='laotext'>ຈຸດປະສົງ</span> </b> : <br>".strtoupper($purposed)."  <br>
                            <b>PARTICIPANT /<span class='laotext'>ຈຳນວນຜູ້ເຂົ້າຮ່ວມ</span> </b> : <br>".number_format($participant)."  <br>
                            <b>REMARKS /<span class='laotext'>ໝາຍເຫດ</span> </b> : <br>".strtoupper($remark)."  <br>
                            
                            <b>STATUS /<span class='laotext'>ສະຖານະ</span> </b> : <br>".strtoupper($status)."  <br>
                          

                            ";
                            
                    echo "                         
                            ";

                        if($status=="Cancelled")
                         {
                                            echo "";
                         }elseif($status=="Completed"){
                             echo "";
                        }elseif($status=="Booked"){
                         echo "
                         <hr>
                         <a href='". URL ."MeetingRoom/CheckinRoom?rbid=".$rbid."'  
                                 class='btn btn-xs bg-gradient-primary' target='_blank'>                               
                                 Check-In </a> 
                               
                                <a href='". URL ."MeetingRoom/CancelRoom?rbid=".$rbid."'  
                                class='btn btn-xs btn-danger float-right' target='_blank'> Cancel </a>
                            ";
                     }elseif($status=="Checked-In"){        
                      echo "
                      <hr>
                        <a href='". URL ."MeetingRoom/CheckoutRoom?rbid=".$rbid."'  
                               class='btn btn-xs btn-success viewDetails' target='_blank'>
                          <i class='fas fa-sign-out-alt></i>'></i> Check-Out </a>
                        ";
                        } else{
                        echo "
                        <hr>
                        <a href='#' title='View details'  
                                   class='btn btn-xs btn-success viewDetails' 
                                             id='del_".$rid."'
                                      target='_blank'>Checkout </a>
                             ";
                            }
  

                            echo '
                            


                        </div>
                        
                    </div>
                    
                    </div>';





					/*echo "<tr>";
					echo "<td style='vertical-align:middle'>".$c."</td>";

          echo '<td style="vertical-align:middle">'.$roomName .' </td>';
					echo '<td style="vertical-align:middle">'.$requestor .' </td>';
					echo '<td style="vertical-align:middle">'.$startdate .' </td>';
					echo '<td style="vertical-align:middle">'.$enddate .' </td>';
					echo '<td style="vertical-align:middle">'.$purposed .' </td>';
					echo '<td style="vertical-align:middle">'.$participant .' </td>';
					echo '<td style="vertical-align:middle">'.$remark.' </td>';
					echo '<td style="vertical-align:middle">'.$status .' </td>';

          // =========a dd new =================================================================

if($status=="Cancelled")
                {
                    echo "<td> </td>";
                }

elseif($status=="Completed"){

     echo "<td> </td>";

              // echo "<td> </td>";
                     // echo "<td><a href='". URL ."MeetingRoom/CompletedRoom?rbid=".$rbid."'</td>";
            }

elseif($status=="Booked"){
                    echo "<td>

                     <a href='". URL ."MeetingRoom/CheckinRoom?rbid=".$rbid."'  
                     class='btn btn-xs bg-gradient-primary' target='_blank'>
                     <!-- <i class='fas fa-check'></i>  -->
                     Check-In </a> 
                     <hr>
                    <a href='". URL ."MeetingRoom/CancelRoom?rbid=".$rbid."'  
                    class='btn btn-xs btn-danger' target='_blank'> Cancel </a>

                   

                   </td>";
                   
            }




elseif($status=="Checked-In"){

        
                   echo "<td><a href='". URL ."MeetingRoom/CheckoutRoom?rbid=".$rbid."'  
                    class='btn-xs bg-gradient-success ' target='_blank'>
                   <i class='fas fa-sign-out-alt></i>'></i> Check-Out </a>

                    </td>";
            }



            else{
                 echo "<td>

                     <a href='#' title='View details'  class='viewDetails' 
                             id='del_".$rid."'
                      target='_blank'>Checkout </a>
             </td>";
            }



          /*  echo '<td align="center"> <div style="min-width:110px"> 
              <button title="View details"  class="btn btn-xs   bg-gradient-primary btn-flat viewDetails" 
                     id="del_'.$rid.'"
                    >
                      
              </button>
          
              </div>
              </td>';*/
					// =========a dd new =================================================================
					/*		
					echo "</tr>";
					
					*/
				
				
				  }
				  ?>
                 <!--   </tbody>
                </table> -->
				
              </div>
			  
 <!-- ================ add new 03-06-21========================================= -->
						  
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
          url: <?php echo "'". URL . "'" ?> + "BookRoom/viewbookroomselect?id=" + id,
          type: 'GET',
          data: { id:id },
          success: function(response){
            //alert(response);

            var checkin =$("#checkin").val();
            //alert(addapp);
          
              $("#checkin").show();               
             // if(checkin=="C"){
            //    $("#checkin").hide();
              }
            }

            );
        });
        
      
      });
      
      return false;
    
     
   
</script> 
			  
	       
 <!-- ================ add new 03-06-21========================================= -->		  
			  
			  
			  
			  
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
  