
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="">


 

                <table class="table table-bordered table-hover table-responsive table-striped" id="example" width="100%" height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Vehicle/<span class="laotext">ລົດ</span></th>
                    <th>Driver/<span class="laotext">ຄົນຂັບ</span></th>                    
                    <th>Date/<span class="laotext">ວັນທີ</span></th> 
                    <th>Fuel_Consumption/<span class="laotext">ການໃຊ້ນ້ຳມັນ</span></th> 
                    <th>Gas_Station/<span class="laotext">ປ້ຳນ້ຳມັນ</span></th> 
                    <th>Amount/<span class="laotext">ລວມລາຄາ</span></th> 
                    <th>Price_per_Liter/<span class="laotext">ລາຄາຕໍ່ລິດ</span></th> 
                    <th>Liter/<span class="laotext">ລິດ</span></th> 
                    <th>Mileage/<span class="laotext">ເລກໄມສະສົມ</span></th> 
                
					             
                    <th >Action/<span class="laotext">ຈັດການ</span>  </th>                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($list1 as $app) { 
				  $c++;
				  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
				  if (isset($app->vid)) { $vid= $app->vid;	}else{$vid="";}
					if (isset($app->driver)){  $driver= $app->driver;	}else{$driver="";}
					if (isset($app->fdate)){  $fdate= $app->fdate;	}else{$fdate="";}
					if (isset($app->GasStation)){  $GasStation= $app->GasStation;}else{$GasStation="";}	
					if (isset($app->Amount)){  $Amount= $app->Amount;	}else{$Amount="";}
					if (isset($app->oilprice)) { $oilprice= $app->oilprice;	}else{$oilprice="";}
					if (isset($app->liter)){  $liter= $app->liter;	}else{$liter=0;}
					if (isset($app->mileage)) { $mileage= $app->mileage;	}else{$mileage="";}
					if (isset($app->color)) { $color= $app->color;	}else{$color="";}
					if (isset($app->plate)) { $plate= $app->plate;	}else{$plate="";}
					if (isset($app->maker)) { $maker= $app->maker;	}else{$maker="";}
					if (isset($app->model))  {$model= $app->model;	}else{$model="";}
					if (isset($app->mileage))  {$mileage= $app->mileage;	}else{$mileage=0;}
					if (isset($app->vyear )) { $vyear = $app->vyear ;	}else{$vyear="";}
					if (isset($app->fuelcons )) { $fuelcons = $app->fuelcons ;	}else{$fuelcons="";}
			
				
					
					
					echo "<tr>";
					echo "<td>".$c."</td>";
					
					echo "<td><div style='min-width:440px'>
					".$maker." ".$model." ".$vyear ." #".$plate." " . $color."</div></td>";
					echo "<td><div style='min-width:200px'>".strtoupper($driver)."</div></td>";
					echo "<td><div style='min-width:150px'>".strtoupper($fdate)."</div></td>";
					echo "<td>".($fuelcons)."</td>";
					echo "<td><div style='min-width:300px'>".strtoupper($GasStation)."</div></td>";
					echo "<td>".number_format($Amount)."</td>";
					echo "<td>".number_format($oilprice)."</td>";
					echo "<td>".number_format((float)$liter, 2, '.', '')."</td>";
					echo "<td>".number_format($mileage)."</td>";
					
					
					
					echo '<td class="d-flex">
							
							<!--<a href="'. URL .'Fuel/UpdateFuel?id='.$id.'" class="btn btn-xs  bg-gradient-success btn-flat" onClick="return confirm(\'Are you sure you want to edit?\');">
								<i class="fas fa-edit"></i> 
							</a>-->
							<a href="#" class="btn btn-xs btn-block bg-gradient-danger btn-flat deleteGroup" id="del_'.$id.'">
								<i class="fas fa-trash"></i> 
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
					url: <?php echo "'". URL . "'" ?> + "Fuel/deleteFuel",
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
  