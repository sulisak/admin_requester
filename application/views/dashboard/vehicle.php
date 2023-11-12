
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

tr td{
  padding: 0 0 0 10px !important;
  margin: 0 !important;
    vertical-align: middle !important;
}


</style>

<div class="">


 

                <table  class="table table-bordered table-condensed  table-responsive table-striped" id="example" cellspacing="0" >
                
				<thead>
				 
                  <tr>
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Photo</th>
                    <th>Vechicle_Identification_Number/<span class="laotext">ເລກຈັກ</span></th>
                    <th >Vechicle/<span class="laotext">ລົດ</span> </th> 
					<th>ODM/<span class="laotext">ເລກກົງເຕີ</span></th>
                    
                    
				
			
                
                    <!-- <th >Status</th>-->
                   <th width="50px" >Action/<span class="laotext">ຈັດການ</span></th>
                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				 // print_r($list1 );
				  foreach ($list1 as $app) { 
				  $c++;
					  if (isset($app->vid))  {$vid= $app->vid;	}else{$vid= "";	}
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
					if (isset($app->logo))  { $logo= $app->logo;	}else{$logo= "";	}
				
					date_default_timezone_set('Asia/Bangkok'); 
				    $CURR =date("Y-m-d");	
					$CURR = strtotime($CURR);
					$CURR = date("Y-m-d", strtotime("+1 month", $CURR));
					
										
					//IF(($LaoInsureExpired) > ($CURR)){ }ELSE{$bg='bgcolor="#eca3aa"';}
					//IF(($ThaiExpired) > ($CURR)){ }ELSE{$bg='bgcolor="#eca3aa"';}
					//IF($CarInsExpired >  $CURR){ }ELSE{$bg='bgcolor="#eca3aa"';}
					//IF($RoadTaxExpire > $CURR){ }ELSE{$bg='bgcolor="#eca3aa"';}
					
				
				    if($logo== ""){$logo= "dd1.jpg";}
					
					
					echo '<tr >';
					echo "<td>".$c."</td>";
					echo "<td><a href ='". URL ."public/img/car/".$logo."' target='_blank'> <img src='". URL ."public/img/car/".$logo."' width='70px'></a> </td>";
					echo "<td>".$vin."</td>";
				
					echo "<td >
							<div style='width:300px!important; vertical-align:middle!important;'>
							".$makercar." ".$modelcar." ".$vyear ." #".$plate."
							</div>
						</td>";
					echo "<td>".number_format($mileage)."</td>";
					
			
					/*date_default_timezone_set('Asia/Bangkok'); 
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
					echo "<td>".$fueltype."</td>";
					echo "<td>".number_format($changeoil)."</td>";
					echo "<td>".$vcolor."</td>";
					
					echo "<td>".$maxpassenger."</td>";
					echo "<td>".$transmission."</td>";
					echo "<td>".$engine."</td>";
					echo "<td>".$tankcapacity."</td>";
					
					
					/*if($st==0){
						echo '<td><label class="switch">
						  <input type="checkbox" id ="togBtn_'.$vid.'" checked>
						  <span class="slider round"></span>
						</label></td>';
					}else{
						echo '<td><label class="switch">
						  <input type="checkbox" id ="togBtn_'.$vid.'" >
						  <span class="slider round"></span>
						</label></td>';
					}*/
					echo '<td class="d-flex">
							<a href="#" class="btn btn-xs 
									bg-gradient-info btn-flat loaddetails" id="del_'.$vid.'" >
								<i class="fas fa-eye"></i> 
							</a><a href="'. URL .'Dashboard/UpdateVehicleForm?id='.$vid.'" class="btn btn-xs 
									bg-gradient-success btn-flat" onClick="return confirm(\'Are you sure you want to edit?\');">
								<i class="fas fa-edit"></i> 
							</a>
							<a href="#" class="btn btn-xs  bg-gradient-danger btn-flat deleteGroup" id="del_'.$vid.'">
								<i class="fas fa-trash"></i> 
							</a>
						 </td>';
					
					echo "</tr>";
					
					echo '
					<script>
						var switchStatus = false;
						$("#togBtn_'.$vid.'").on("change", function() {
							var switchStatus="";
							var id="'.$vid.'";
							if ($(this).is(":checked")) {
								switchStatus = $(this).is(":checked");
								
							}
							else {
							   switchStatus = $(this).is(":checked");
							 
							}
							//alert(switchStatus);// To verify
							var pass="";
							if(switchStatus==true){
								pass=0;
							}else{
								pass=1;
							}
							//alert(pass);// To verify
							$.ajax({
							url: "'. URL . '" + "Dashboard/Updatestat",
							type: "GET",
							data: { id:id,st:pass },
							success: function(response){
							alert("Update Successfully!");
							
								
							}
						});
						});
						</script>';
					
				  }
				  ?>
                 
                
                
					
                  </tbody>
                </table>
				
              </div>
<div class="modal " id="viewLocation" tabindex="-1" role="dialog " style=" background-color: rgba(0,0,0,.01) !important;
  width: 100%;
  height: 100%;
  overflow: auto;">
		
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content " style="border-radius:5px; ">
                        <div class="modal-header">
                            <h4 style="color:#000"
							class="modal-title" id="defaultModalLabel">Vechicle Info/
							<span class="laotext">ຂໍ້ມູນລົດ</span></h4>
                        </div>
                        <div class="modal-body" >
							<div id="loadGetInfo"></div>
                        </div>
                        <div class="modal-footer">
						
						
							<a href="#" id="" data-color="pink" 
						    class="btn bg-pink closemodal waves-effect">CLOSE/
							<span class="laotext">ປິດ</span></a>
                         
                        </div>
                    </div>
                </div>
     
</div>	 			  
<script>
$(document).ready(function(){
	$('.closemodal').click(function(){	
	 $('#viewLocation').hide();	
	 });

	$('.loaddetails').click(function(){
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// Delete id
			var id = splitid[1];
			//alert(id);
				$.ajax({
						url: <?php echo '"'. URL .'Dashboard/getData"';?>,
						type: 'GET',
						data: { id:id },
						success: function(response){
						//	alert(response);
							$("#loadGetInfo").html(response); 
							$('#viewLocation').show();	
							
						}
					});
			
		});










	 
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
  