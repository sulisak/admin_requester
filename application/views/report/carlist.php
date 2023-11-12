
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
  width: 50px;
  height: 20px;
  margin-top:10px;
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
  height: 10px;
  width: 15px;
  left: 5px;
  bottom: 5px;
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
  border-radius: 14px;
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


<div class="e">
			<div id="updatem" style="display:none" >
				<div class="col-md-6" style="width:100%;height:350px;border:1px solid #007bff; padding:10px">
				<div style="max-height:100%;overflow:auto;padding:10px">
				<FORM id="submitremark" method="post">
					Date Completed/<span class="laotext">ວັນທີສຳເລັດ</span>
					<?php
					date_default_timezone_set('Asia/Bangkok'); 
					 $time =date("H:i");
					?>
					<input type="date" class="form-control" name="ed" id="ed" min="<?php echo $date;?>" required>
					<input type="hidden" class="form-control" name="sd" id="sd" value="<?php echo $date;?>" required>
					
					<span id="dddddd" class="laotext">Time Completed/ເວລາສຳເລັດ</span> <span id="resss" style="color:red"></span>
					<div
					style="display:none">
					<input type="time" class="form-control" name="stime" id="start_time" required value="<?php echo $time;?>" >
					</div>
					<input type="time" class="form-control" name="etime" id="end_time" required >
					
					
					
					<input type="hidden" id="vid" class="form-control" name="vid" required>
					Remarks/<span class="laotext">ໝາຍເຫດ</span>
					<Textarea name="remarks" class="form-control" rows="4" id="txt" placeholder =" Enter short remarks... "required></textarea>
					<br>
					<button class="btn btn-primary" type="submit">Submit & disabled vehicle/
					<span class="laotext">ບັນທຶກ</span></button>
					<button class="btn btn-danger" id="canceldis" type="button">Cancel/
					<span class="laotext">ຍົກເລີກ</span></button>
				</form>	
				</div>	
				</div>	
			</div>
			<hr>
 

                <table class="table table-bordered table-responsive  " id="example" width="100%" height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th width="30px">No/<span class="laotext">ລຳດັບ</span></th>
                    <th >Vehicle/<span class="laotext">ລົດ</span></th>                
                    <th>Color/<span class="laotext">ສີ</span></th>
                    <th>Plate#/<span class="laotext">ເລກທະບຽນ</span></th>                   
                    <th>Transmission/<span class="laotext">ແບບການຂັບເຄື່ອນ</span></th>
                    <th>Mileage/<span class="laotext">ເລກໄມສະສົມ</span></th>
                    <th>Book_Status/<span class="laotext">ສະຖານະການຈອງ</span></th>
                    <th>Start/<span class="laotext">ເລີ່ມ</span></th>
                    <th>End/<span class="laotext">ສິ້ນສຸດ</span></th>
                    <th>Car_Status/<span class="laotext">ສະຖານະລົດ</span></th>
                    <th>Short Comment/<span class="laotext">ໝາຍເຫດຫຍໍ້</span></th>
                    <th width="30px">Status/<span class="laotext">ສະຖານະ</span></th>
                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				 // print_r($list1);
				  foreach ($list1 as $app) { 
				  $c++;
					if (isset($app->vid))  {$vid= $app->vid;	}else{$vid="";}	
					if (isset($app->vin)) { $vin= $app->vin;	}else{$vin="";}	
					if (isset($app->vyear)) { $vyear= $app->vyear;	}else{$vyear=""; }	
					if (isset($app->maker)) { $maker= $app->maker;	}else{$maker="";}	
					if (isset($app->model)) { $model= $app->model;	}else{$model="";}	
					if (isset($app->vcolor)) { $vcolor= $app->vcolor;	}else{ $vcolor=""; }	
					if (isset($app->plate))  {$plate= $app->plate;	}else{$plate="";}	
					if (isset($app->maxpassenger)){  $maxpassenger= $app->maxpassenger;	}else{ $maxpassenger="";}	
					if (isset($app->transmission)) { $transmission= $app->transmission;	}else{$transmission="";}	
					if (isset($app->engine))  {$engine= $app->engine;	}else{$engine=""; }	
					if (isset($app->tankcapacity)) { $tankcapacity= $app->tankcapacity;	}else{$tankcapacity="";}	
					if (isset($app->fueltype)){  $fueltype= $app->fueltype;	}else{$fueltype="";}	
					if (isset($app->mileage)) { $mileage= $app->mileage;	}else{$mileage="";}	
					if (isset($app->vehicleStat)) { $vehicleStat= $app->vehicleStat;	}else{$vehicleStat="";}	
						if (isset($app->modelcar)) { $modelcar= $app->modelcar;	}else{ $vehicleStat="";}	
					if (isset($app->makercar)) { $makercar= $app->makercar;	}else{$makercar=""; }		
				  if (isset($app->st)) { $st= $app->st;	}else{$st="";}	
				  if (isset($app->sdate)) { $sdate= $app->sdate;}else{ $sdate= '';}		
				  if (isset($app->edate))  {$edate= $app->edate;}	else{$edate='';}
					if (isset($app->remarks)){  $remarks= $app->remarks;}else{$remarks='';}			
							
					
					
					if($vehicleStat == 'Pending'){
						echo "<tr bgcolor='#ffde7a'>";
					}elseIf($vehicleStat == 'Booked'){
						echo "<tr bgcolor='#fd828d'>";
					}else{
						echo "<tr  >";
					}
					
					
					echo "<td>".$c."</td>";
					
					echo "<td ><div style='width:300px!important; vertical-align:middle!important;'>".$makercar." ".$modelcar." ".$vyear ."  </div> </td>";
					echo "<td>".$vcolor."</td>";
					echo "<td>".$plate."</td>";
					echo "<td>".$transmission."</td>";
					echo "<td>".number_format($mileage)."</td>";
					echo "<td>".$vehicleStat."   </td>";
					if($sdate!=''){
					echo "<td><div style='width:200px!important; vertical-align:middle!important;'>".  ($sdate)." </div>  </td>";
					}else{
						echo "<td>  </td>";
					}
					if($edate!=''){
					echo "<td><div style='width:200px!important; vertical-align:middle!important;'>".  ($edate)." </div>  </td>";
					}else{
						echo "<td>  </td>";
					}
					
					if ($st==0){
						echo "<td bgcolor='#f3c9cd'> Disabled</td>";
					}else{
						echo "<td  bgcolor='#beefd3'>Available</td>";
					}
					
					echo "<td>".$remarks."   </td>";
					
					if($vehicleStat=="Available"){
						if($st==1){
							echo '<td><label class="switch">
							  <input type="checkbox" id ="togBtn_'.$vid.'" checked>
							  <span class="slider round"></span>
							</label></td>';
						}else{
							echo '<td><label class="switch">
							  <input type="checkbox" id ="togBtn_'.$vid.'" >
							  <span class="slider round"></span>
							</label></td>';
						}
					}else{
						if($st==1){
							echo '<td><label class="switch">
							  <input type="checkbox" id ="togBtn_'.$vid.'" checked>
							  <span class="slider round"></span>
							</label></td>';
						}else{
							echo '<td><label class="switch">
							  <input type="checkbox" id ="togBtn_'.$vid.'" >
							  <span class="slider round"></span>
							</label></td>';
						}
					}
					
					echo "</tr>";
					
					echo '
					<script>
						var switchStatus = false;
						$("#togBtn_'.$vid.'").on("change", function() {
							var switchStatus="";
							var id="'.$vid.'";
							if ($(this).is(":checked")) {
								switchStatus = $(this).is(":checked");
								$("#updatem").hide();
								var pass="1";
								$.ajax({
									url: "'. URL . '" + "Report/UpdatestatOn",
									type: "GET",
									data: { id:id,st:pass },
									success: function(response){
									
											$.ajax({    //create an ajax request to display.php
											type: "GET",
											url:  "'.  URL  .'Report/CarAvailabilityList",             
											dataType: "html",   //expect html to be returned                
											success: function(response){                    
												$("#response").html(response); 
												
											}

										});
								
									
										
									}
								});
							}
							else {
								switchStatus = $(this).is(":checked");
								
		
							   $("#updatem").show();
							}
							//alert(switchStatus);// To verify
							var pass="";
							if(switchStatus==true){
								pass=0;
							}else{
								pass=1;
							}
							
							
							//alert(pass);// To verify
							$("#vid").val('.$vid.');
							
							
						});
						</script>';
					
					
				  }
				  ?>
                 
                
                
					
                  </tbody>
                </table>
				
              </div>
			  
						<script>
$(document).ready(function(){
		$('#updatem').hide();
		$('#canceldis').click(function(){
			$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: <?php echo  "'".  URL  ."Report/CarAvailabilityList'";?>,             
							dataType: "html",   //expect html to be returned                
							success: function(response){                    
								$("#response").html(response); 
								//alert(response);
							}

						});
		});	
	$("#submitremark").submit(function(){ 
					//start time
			var start_time = $("#start_time").val();

			//end time
			var end_time = $("#end_time").val();
			var sd = $("#sd").val();
			var ed = $("#ed").val();

			//convert both time into timestamp
			var stt = new Date(sd + " " + start_time);
			stt = stt.getTime();

			var endt = new Date(ed + " " + end_time);
			endt = endt.getTime();

			//by this you can see time stamp value in console via firebug
			

			if(stt > endt) {
				$("#resss").val("");
				$("#resss").fadeOut("slow").html("* Its should be higher than previous date and time!").fadeIn(500);				
				$("#end_time").focus();
				return false;
			}else{
		
			$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Report/SaveRemark", 
							data: $(this).serialize()
							})
							.done(function(data){
								
							
								$.ajax({    //create an ajax request to display.php
									type: "GET",
									url: <?php echo  "'".  URL  ."Report/CarAvailabilityList'";?>,             
									dataType: "html",   //expect html to be returned                
									success: function(response){                    
										$("#response").html(response); 
										
									}

								});
								
								 $("#end_time").val("");
								 $("#ed").val("");
								 $("#txt").val("");
								 
								$('#updatem').hide();
								$("#resss").val("");
							})
							.fail(function() {
							alert( "Posting failed." );
							});
							return false;
			}				
			return false;
		
		});
		/*$('.viewdetails').click(function(){
				
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			alert(id);
			/*$("#idcredit").val(id); 
			$("#getdetails").html(""); 
				$.ajax({    //create an ajax request to display.php
							type: "GET",
							url: "getdetailsbox.php?boxid=" + id,             
							dataType: "html",   //expect html to be returned     
													
							success: function(response){
							
								$("#wait").css("display", "none");
								$("#getdetails").html(response); 
								
							}

				});
			
			
		});*/
		
		
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
  