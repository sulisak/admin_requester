
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


 

                <table class="table table-bordered table-hover table-responsive table-striped" id="example" width="100%" cellspacing="0">
                 <thead>
                  <tr>
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Vechicle_Identification_Number/<span class="laotext">ເລກຈັກ</span></th>
                    <th >Vechicle/<span class="laotext">ລົດ</span></th> 
					<th>ODM/<span class="laotext">ເລກກົງເຕີລົດ</span></th>	
					<th>Lao_Insurance/<span class="laotext">ປະກັນໄພລາວ</span></th>	
					<th>Lao_Insurance_Renew/<span class="laotext">ຕໍ່ສັນຍາປະກັນໄພລາວໃໝ່</span></th>	
					<th>Lao_Insurance_Expiration/<span class="laotext">ວັນໝົດປະກັນໄພລາວ</span></th>	
					<th>Thai_Insurance/<span class="laotext">ປະກັນໄພໄທ</span></th>	
					<th>Thai_Insurance_Renew/<span class="laotext">ຕໍ່ສັນຍາປະກັນໄພໄທ</span></th>	
					<th>Thai_Insurance_Expiration/<span class="laotext">ວັນໝົດປະກັນໄພໄທ</span></th>	
					<th>Car_Inspection_Expiration/<span class="laotext">ວັນໝົດອາຍຸການກວດກາລົດ</span></th>	
					<th>Road_Tax_Expiration/<span class="laotext">ວັນໝົດອາຍຸເສຍຄ່າທາງ</span></th>	
					<th>Business_Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></th>	
					<th>Fuel_Cons./<span class="laotext">ການໃຊ້ນ້ຳມັນ</span></th>
					<th>Fuel/<span class="laotext">ນ້ຳມັນ</span></th>							
                    <th>Color/<span class="laotext">ສີ</span></th>                   
                    <th>Max_seat/<span class="laotext">ທີ່ນັ່ງສູງສຸດ</span></th>
                    <th>Transmission/<span class="laotext">ແບບການຂັບເຄື່ອນ</span></th>
                    <th>Engine/<span class="laotext">ຂະໜາດເຄື່ອງຈັກ</span></th>
                    <th>Tank/<span class="laotext">ຂະໜາດຖັງ</span></th>
                    <th>Change_oil_every/<span class="laotext">ປ່ຽນນ້ຳມັນທຸກໆ</span></th>
                   
                
                   
                
                 
                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($list1 as $app) { 
				  $c++;
						if (isset($app->vin)) {  $vin= $app->vin;	}else{$vin= "";	}
						if (isset($app->vyear)) {  $vyear= $app->vyear;	}else{$vyear= "";	}
						if (isset($app->maker)) {  $maker= $app->maker;	}else{$maker= "";	}
						if (isset($app->model)) {  $model= $app->model;	}else{$model= "";	}
						if (isset($app->vcolor)) {  $vcolor= $app->vcolor;}else{$vcolor= "";	}	
						if (isset($app->plate))  { $plate= $app->plate;	}else{$plate= "";	}
						if (isset($app->maxpassenger)) {  $maxpassenger= $app->maxpassenger;	}else{$maxpassenger= "";	}
						if (isset($app->transmission)) {  $transmission= $app->transmission;	}else{$transmission= "";	}
						if (isset($app->engine)) {  $engine= $app->engine;	}else{$engine= "";	}
						if (isset($app->tankcapacity)){  $tankcapacity= $app->tankcapacity;	}else{$tankcapacity= "";	}
						if (isset($app->fueltype))  { $fueltype= $app->fueltype;	}else{$fueltype= "";	}
						if (isset($app->mileage)) {  $mileage= $app->mileage;	}else{$mileage= "";	}
						if (isset($app->makercar)) {  $makercar= $app->makercar;	}else{$makercar= "";	}
						if (isset($app->modelcar)) {  $modelcar= $app->modelcar;	}else{$modelcar= "";	}
						if (isset($app->changeoil)) {  $changeoil= $app->changeoil;	}else{$changeoil= "";	}
						
					if (isset($app->LaoType)) {  $LaoType= $app->LaoType;	}else{$LaoType= "";	}
					if (isset($app->LaoRenew)) {  $LaoRenew= $app->LaoRenew;	}else{$LaoRenew= "";	}
					if (isset($app->LaoInsureExpired)) {  $LaoInsureExpired= $app->LaoInsureExpired;	}else{$LaoInsureExpired= "";	}
					if (isset($app->ThaiType)) {  $ThaiType= $app->ThaiType;	}else{$ThaiType= "";	}
					if (isset($app->ThaiRenew)) {  $ThaiRenew= $app->ThaiRenew;	}else{$ThaiRenew= "";	}
					if (isset($app->ThaiExpired)){   $ThaiExpired= $app->ThaiExpired;	}else{$ThaiExpired= "";	}
					if (isset($app->CarInsExpired)){   $CarInsExpired= $app->CarInsExpired;	}else{$CarInsExpired= "";	}
					if (isset($app->RoadTaxExpire)){   $RoadTaxExpire= $app->RoadTaxExpire;	}else{$RoadTaxExpire= "";	}
					if (isset($app->BusinessUnit))  { $BusinessUnit= $app->BusinessUnit;	}else{$BusinessUnit= "";	}
					if (isset($app->fuelcons))  { $fuelcons= $app->fuelcons;	}else{$fuelcons= "";	}
					
					echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td>".$vin."</td>";
					echo "<td >
							<div style='width:300px!important; vertical-align:middle!important;'>
							".$makercar." ".$modelcar." ".$vyear ." #".$plate."
							</div>
						</td>";
					echo "<td>".number_format($mileage)."</td>";
					
					date_default_timezone_set('Asia/Bangkok'); 
				    $CURR =date("Y-m-d");	
					$CURR = strtotime($CURR);
					$CURR = date("Y-m-d", strtotime("+1 month", $CURR));
					
					
					
					echo "<td>".($LaoType)."</td>";
					echo "<td>".($LaoRenew)."</td>";
					IF(strtotime($LaoInsureExpired) > strtotime($CURR)){
							echo "<td>".($LaoInsureExpired)."</td>";
					}ELSE{
					
							echo "<td bgcolor='#eca3aa'>".($LaoInsureExpired)."</td>";
					}
					
					echo "<td>".($ThaiType)."</td>";
					echo "<td>".($ThaiRenew)."</td>";
					
					
					
					IF(strtotime($ThaiExpired) > strtotime($CURR)){
							echo "<td>".($ThaiExpired)."</td>";
					}ELSE{
					
							echo "<td bgcolor='#eca3aa'>".($ThaiExpired)."</td>";
					}
					
					
					
					
					IF($CarInsExpired >  $CURR){
							echo "<td>".($CarInsExpired)."</td>";
					}ELSE{
					
							echo "<td bgcolor='#eca3aa'>".($CarInsExpired)."</td>";
					}
					
					
					IF($RoadTaxExpire > $CURR){
							echo "<td>".($RoadTaxExpire)."</td>";
					}ELSE{
					
							echo "<td bgcolor='#eca3aa'>".($RoadTaxExpire)."</td>";
					}
					
					
					echo "<td>".($BusinessUnit)."</td>";
					echo "<td>".($fuelcons)."</td>";
					
					
					
					echo "<td>".$vcolor."</td>";
					
					echo "<td>".$maxpassenger."</td>";
					echo "<td>".$transmission."</td>";
					echo "<td>".$engine."</td>";
					echo "<td>".$tankcapacity."</td>";
					echo "<td>".$fueltype."</td>";
					
					echo "<td>".number_format($changeoil)."</td>";
					
				
					
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
					url: <?php echo "'". URL . "'" ?> + "Dashboard/deleteVehicle",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
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
  