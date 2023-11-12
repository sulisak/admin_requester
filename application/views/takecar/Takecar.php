
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>


<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="">
<div  class="row "id="updatem1" style="display:none" >
<div  class="col-md-3" >

<b>Vechicle List</b>
<select class="form-control" name="stat" id ="selectdiv">
							<option value="1"> Good  Contition/
							<span class="laotext">ເງື່ອນໄຂດີ</span></option>
							<option value="0"> Disable Vehicle/
							<span class="laotext">ປິດການນຳໃຊ້ລົດ</span></option>
</select>

</div>
</div>
<br>
<div  class="row "id="approveonly" style="display:none;">
<div  class="col-md-3" style="width:100%;">
<FORM id="approvedsend" method="post">

<input  id='idup1' type ='hidden' name="id" >
<input  id='cons1' class="form-control"  type ='hidden' name="cons" >
<input type="hidden" class="form-control" value="Good Condition">

<button class="btn btn-primary" type="submit">Approved/
<span class="laotext">ອະນຸມັດ</span></button>
<button class="btn btn-danger canceldis"  type="button">Cancel/
<span class="laotext">ຍົກເລີກ</span></button>
</form>
</div>
</div>
<div id="updatem" style="display:none" >				
				<div class="col-md-6" style="width:100%;height:250px;border:1px solid #007bff; padding:10px">
				<div style="max-height:100%;overflow:auto;padding:10px">
				
				
				<FORM id="submitremark" method="post">				
				
				
					Date Completed/<span class="laotext">ວັນທີສຳເລັດ </span>
					<?php
					date_default_timezone_set('Asia/Bangkok'); 
					 $time =date("H:i");
					?>
					<input  id='cons' type ='hidden' name="cons" >
					<input  id='inputs' type ='hidden' name="vid" >
					<input  id='idup' type ='hidden' name="id" >
					<input type="date" class="form-control" name="ed" id="ed" min="<?php echo $date;?>" required>
					<div
					style="display:none">
					<input type="date" class="form-control" name="sd" id="sd" value="<?php echo $date;?>" required>
					</div>
					<span id="dddddd" class="laotext">Time Completed/
ສຳເລັດເວລາ</span> <span id="resss" style="color:red"></span>
					<div
					style="display:none">
					<input type="time" class="form-control" name="stime" id="start_time" required value="<?php echo $time;?>" >
					</div>
					<input type="time" class="form-control" name="etime" id="end_time" required >
					
					
					
					<Textarea  name="remarks"  style="display:none" class="form-control" rows="4" id="txt" placeholder =" Enter short remarks... "required></textarea>
					<br>
					<button class="btn btn-primary" type="submit">Submit & disabled vehicle</button>
					<button class="btn btn-danger canceldis" type="button">Cancel/
					<span class="laotext">ຍົກເລີກ</span></button>
				</form>	
				
				</div>	
				</div>	
</div>
			<hr>

 

                <table class="table table-bordered table-hover table-responsive  table-striped" id="example" width="100%" height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>VehicleImage</th>
                    <th>ReportImage</th>
                    <th>Checker/<span class="laotext">ຜູ້ກວດກາ</span></th>
                    <th>Date/<span class="laotext">ວັນທີ</span></th>                    
                    <th>Vehicle/<span class="laotext">ລົດ</span></th> 
                    <th>Tyre/<span class="laotext">ຢາງລົດ</span></th> 
                    <th>Internal/<span class="laotext">ພາຍໃນ</span></th> 
                    <th>External/<span class="laotext">ພາຍນອກ</span></th> 
                    <th>Engine/<span class="laotext">ເຄື່ອງຈັກ</span></th> 
                    <th>Brake/<span class="laotext">ເບກ</span></th> 
                    <th>Remarks/<span class="laotext">ໝາຍເຫດ</span></th> 
                    <th>Car_Status/<span class="laotext">ສະຖານະລົດ</span></th> 
                    <th>Status/<span class="laotext">ສະຖານະ</span></th> 
					             
                    <th >Action/<span class="laotext">ຈັດການ</span></th>                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($list1 as $app) { 
				  $c++;
				  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
				  if (isset($app->tyre)) { $tyre= $app->tyre;	}else{$tyre="";}
					if (isset($app->internal)){  $internal= $app->internal;	}else{$internal="";}
					if (isset($app->external)){  $external= $app->external;	}else{$external="";}
					if (isset($app->engineoillight)){  $engineoillight= $app->engineoillight;}else{$engineoillight="";}	
					if (isset($app->brakeLight)){  $brakeLight= $app->brakeLight;	}else{$brakeLight="";}
					if (isset($app->dateInspect)) { $dateInspect= $app->dateInspect;	}else{$dateInspect="";}
					if (isset($app->remarks)){  $remarks= $app->remarks;	}else{$remarks="";}
					if (isset($app->vyear)) { $vyear= $app->vyear;	}else{$vyear="";}
					if (isset($app->color)) { $color= $app->color;	}else{$color="";}
					if (isset($app->plate)) { $plate= $app->plate;	}else{$plate="";}
					if (isset($app->maker)) { $maker= $app->maker;	}else{$maker="";}
					if (isset($app->model))  {$model= $app->model;	}else{$model="";}
					if (isset($app->mileage))  {$mileage= $app->mileage;	}else{$mileage="";}
					if (isset($app->checker )) { $checker = $app->checker ;	}else{$checker="";}
					if (isset($app->status )){  $status = $app->status ;	}else{$status="";}
					if (isset($app->deactivate )){  $deactivate = $app->deactivate ;	}else{$deactivate="";}
					if (isset($app->logo )){  $logo = $app->logo ;	}else{$logo="";}
				    if (isset($app->vehicleimage )){  $vehicleimage = $app->vehicleimage ;	}else{$vehicleimage="";}
					if (isset($app->vid )){  $vid = $app->vid ;	}else{$vid="";}
					
					if($vehicleimage==""){$vehicleimage="dd1.jpg";}
					if($logo==""){$logo="item.png";}
					
					echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td align='center'>
					<a href='" . URL ."/public/img/car/".$vehicleimage."' target ='_Blank'>
					<img src='" . URL ."/public/img/car/".$vehicleimage."' width='70px'/>
					</a>
					</td>";
					echo "<td align='center'>
					<a href='" . URL ."/public/img/inspection/".$logo."' target ='_Blank'>
					<img src='" . URL ."/public/img/inspection/".$logo."' width='70px'/>
					</a>	
					</td>";
					
					echo "<td><div style='width:150px'>".$checker ."</div></td>";
					echo "<td><div style='width:150px'>".$dateInspect."</div></td>";
					echo "<td><div style='width:300px'>".$maker." ".$model." ".$vyear ." #".$plate." " . $color."</div></td>";
					if($tyre==1){
						echo "<td ><div style='width:150px'>Good Condition</div></td>";					
					}else{
						echo "<td><div style='width:150px'>Bad Condition</div></td>";		
					}
					if($internal==1){
						echo "<td><div style='width:150px'>Good Condition</div></td>";					
					}else{
						echo "<td><div style='width:150px'>Bad Condition</div></td>";		
					}
					if($external==1){
						echo "<td><div style='width:150px'>Good Condition</div></td>";					
					}else{
						echo "<td><div style='width:150px'>Bad Condition</div></td>";		
					}
					if($engineoillight==1){
						echo "<td><div style='width:150px'>Good Condition</div></td>";					
					}else{
						echo "<td><div style='width:150px'>Bad Condition</div></td>";		
					}
					if($brakeLight==1){
					echo "<td><div style='width:150px'>Good Condition</div></td>";					
					}else{
					echo "<td><div style='width:150px'>Bad Condition</div></td>";	
					}						
						echo "<td><div style='width:300px'>".$remarks."</div></td>";		
					
					if($deactivate==1){
					echo "<td><div style='width:150px'><p id='".$id."'>Normal Condition </p>
					</div>
						</td>";					
					}else if($deactivate==0){
					echo "<td><div style='width:150px'><p id='".$id."'>Request to disable</p></div>
					
						</td>";	
						
					}
					
					if($status==1){
						echo "<td ><p id='id_".$id."'>Complete</p></td>";					
					}else{
						echo "<td><p id='id_".$id."'>Pending</p></td>";	
					}
					
					if($deactivate==1){
						if($status==1){
							echo '<td class="d-flex">
									
									
								 </td>';


					
							}else{
								echo '<td class="d-flex">
									<a href="#" class="btn btn-xs  bg-gradient-info btn-flat  app"  id="ids_'.$id.'">
										<i class="fas fa-check"></i> 
									</a>
									<a href="'. URL .'Inspection/UpdateInspection?id='.$id.'" class="btn btn-xs  bg-gradient-success btn-flat" onClick="return confirm(\'Are you sure you want to edit?\');">
										<i class="fas fa-edit"></i> 
									</a>
									<a href="#" class="btn btn-xs btn-block bg-gradient-danger btn-flat deleteGroup" id="del_'.$id.'">
										<i class="fas fa-trash"></i> 
									</a>
								 </td>';
							}
						
						
					
					}else{
							if($status==1){
									
									echo '<td class="d-flex">
									
										</td>';				
								}else{
									echo '<td class="d-flex">
										<a href="#" class="btn btn-xs  bg-gradient-info btn-flat  app"  id="ids_'.$id.'">
											<i class="fas fa-check"></i>
										</a>
										<a href="'. URL .'Inspection/UpdateInspection?id='.$id.'" class="btn btn-xs  bg-gradient-success btn-flat" onClick="return confirm(\'Are you sure you want to edit?\');">
											<i class="fas fa-edit"></i> 
										</a>
										<a href="#" class="btn btn-xs btn-block bg-gradient-danger btn-flat deleteGroup" id="del_'.$id.'">
											<i class="fas fa-trash"></i> 
										</a>
									 </td>';
								}

						
						
					}
					echo "</tr>";
					
					
					echo "
					<script>
					$(document).ready(function(){
						 
						$('#ids_".$id."').click(function(){
							$('#inputs').val(".$vid.");
							$('#idup1').val(".$id.");
							$('#idup').val(".$id.");
							$('#txt').html('".$remarks."');
							$('#updatem1').show();
							 $('#approveonly').show();
							return false;
							
							
						});
					});
					</script>	
					";
				  }
				  ?>
                    </tbody>
                </table>
				
              </div>
			  
<script>
$(document).ready(function(){
		$('#disablediv').hide();
		$('.canceldis').click(function(){
			$('#updatem1').hide();
			$('#updatem').hide();
			$('#approveonly').hide();
		});	
		
		
		 $("#selectdiv").change(function(){ 
			var val = $("#selectdiv").val();
        //  alert(val);
		  if(val==0){
			  
			  $("#cons1").val(val);
			  $("#cons").val(val);
			  $('#updatem').show();
			  $('#approveonly').hide();
		  }else{
			   $("#cons1").val(val);
			  $("#cons").val(val);
			  $('#updatem').hide();
			  $('#approveonly').show();
		  }
		
		});
			
			
		$("#approvedsend").submit(function(){ 
								$.ajax({
							type: "POST",
								url:  <?php echo '"'. URL .'"';?> + "Inspection/SaveApproved", 
							data: $(this).serialize()
							})
							.done(function(data){
						
									$.ajax({    //create an ajax request to display.php
									type: "GET",
									url: <?php echo  "'".  URL  ."Inspection/Loadinspection'";?>,             
									dataType: "html",   //expect html to be returned                
									success: function(response){                    
										$("#response").html(response); 
										
										}

									});
									
								 $('#updatem1').hide();
								$('#updatem').hide();
								$('#approveonly').hide();
							})
							.fail(function() {
							alert( "Posting failed." );
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
								url:  <?php echo '"'. URL .'"';?> + "Inspection/SaveRemark", 
							data: $(this).serialize()
							})
							.done(function(data){
							
									$.ajax({    //create an ajax request to display.php
									type: "GET",
									url: <?php echo  "'".  URL  ."Inspection/Loadinspection'";?>,             
									dataType: "html",   //expect html to be returned                
									success: function(response){                    
										$("#response").html(response); 
										//alert(response);
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

    // Delete 
    $('.app').click(function(){
			
	  /*var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];
		
		$.ajax({
					url: <?php echo "'". URL . "'" ?> + "Inspection/UpdateStatus",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
					var id='#id_' + deleteid;
					$(id).html("Complete");
						$.ajax({    //create an ajax request to display.php
									type: "GET",
									url: <?php echo  "'".  URL  ."Inspection/Loadinspection'";?>,             
									dataType: "html",   //expect html to be returned                
									success: function(response){                    
										$("#response").html(response); 
										//alert(response);
										}

									});
					}
				});
	*/
		$('#updatem1').show();
		return false;
		
		
    });
});
</script>			  
						  
<!-- <script>
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
					url: <?php echo "'". URL . "'" ?> + "Inspection/deleteInspection",
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
</script> -->			  
			  
			  
			  
			  
			  
			  
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
  