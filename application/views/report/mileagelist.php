
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

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


 

                <table class="table table-bordered table-hover  table-responsive " id="example" width="100%" height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th width="30px">No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Vehicle/<span class="laotext">ລົດ</span></th>                
                    <th>Color/<span class="laotext">ສີ</span></th>
                   <th>Need_Maintaince/<span class="laotext">ຕ້ອງການບຳລຸງຮັກສາ</span></th>	
                    <th> Curr._Mileage(s)/<span class="laotext">ເລກໄມປະຈຸບັນ</span></th>
                    <th> Last_Change_oil/<span class="laotext">ປ່ຽນນ້ຳມັນເຄື່ອງລ້າສຸດ</span></th>
                    				
              
                    <th>Status/<span class="laotext">ສະຖານະ</span></th>
                   <th width="30px">Action/<span class="laotext">ຈັດການ</span></th>
                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  $changeTheOil=0;
				  foreach ($list1 as $app) { 
				  $c++;
					if (isset($app->vid))  $vid= $app->vid;	
					if (isset($app->vin))  $vin= $app->vin;	
					if (isset($app->vyear))  $vyear= $app->vyear;	
					if (isset($app->maker))  $maker= $app->maker;	
					if (isset($app->model))  $model= $app->model;	
					if (isset($app->vcolor))  $vcolor= $app->vcolor;	
					if (isset($app->plate))  $plate= $app->plate;	
					if (isset($app->maxpassenger))  $maxpassenger= $app->maxpassenger;	
					if (isset($app->transmission))  $transmission= $app->transmission;	
					if (isset($app->engine))  $engine= $app->engine;	
					if (isset($app->tankcapacity))  $tankcapacity= $app->tankcapacity;	
					if (isset($app->fueltype))  $fueltype= $app->fueltype;	
					if (isset($app->mileage))  $mileage= $app->mileage;	
					if (isset($app->vehicleStat))  $vehicleStat= $app->vehicleStat;	
						if (isset($app->modelcar))  $modelcar= $app->modelcar;	
					if (isset($app->makercar))  $makercar= $app->makercar;	
					if (isset($app->changeoil))  $changeoil= $app->changeoil;		
					if (isset($app->startingMileage))  $startingMileage= $app->startingMileage;
					if (isset($app->needchangeoil))  $needchangeoil= $app->needchangeoil;
					if (isset($app->lastchange))  $lastchange= $app->lastchange;
					
					// $changeTheOil=$startingMileage + $changeoil;
					 
					//5900 > 6000
					if($needchangeoil-500  <=  $mileage ){					
						echo "<tr bgcolor='#fd828d'>";
					}else{
					
						
							echo "<tr>";
						
					}
					
					
					
					
					echo "<td>".$c."
					
					</td>";
					
					echo "<td >".$makercar." ".$modelcar." ".$vyear ."  #".$plate." </td>";
					echo "<td>".strtoupper($vcolor)."</td>";	
					echo "<td>".number_format($needchangeoil)."   </td>";					
					echo "<td>".number_format($mileage)."   </td>";
					
					echo "<td>".number_format($lastchange)."</td>";
					
					
					echo "<td>".$vehicleStat."</td>";
					
						echo '<td class="d-flex">
							
							<a href="#" class="btn btn-xs btn-block bg-gradient-success btn-flat deleteGroup" id="del_'.$vid.'">
								<i class="fas fa-check"></i> 
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
		
		
	  var r = confirm("Are you sure you want to Add Change-oil Marked?");
	  if (r == true) {
		
	  
		
        var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];
      
				$.ajax({
					url: <?php echo "'". URL . "'" ?> + "Dashboard/updateNeedChangeoil",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
						alert("Update Successfully!");
						$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Report/VehicleMileageList'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

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
  