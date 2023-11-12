
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">

<style>


</style>

<div >



 

                <table class="table table-bordered laotext table-responsive " id="example" width="100%" height="500px" height="500px" cellspacing="0">
                 <thead>
                  <tr style=" padding: 1 !important;
  margin: 0 !important; border: 1px solid #000;
    vertical-align: middle;">
				  	<th width="150px"><p>Action/
					<Span class="laotext">ຈັດການ</span> </p> </th>   
                    <th>No/<Span class="laotext">ລຳດັບ</span>  </th>
                     <th>Photo  </th>
                    <th><p>Barcode/<Span class="laotext">ບາໂຄດ</span> </p> </th>
                    <th >Name/<Span class="laotext">ຊື່</span>  </th>                    
                    <th width="250px">Category_Name/<Span class="laotext">ຊື່ປະເພດ</span>  </th>                    
                    <th>UOM</th> 
                    <th>Qty/<Span class="laotext">ຈຳນວນ</span>  </th> 
                    <th>Unit_Price/<Span class="laotext">ລາຄາ</span>  </th> 
                    <th>Total_Amount/<Span class="laotext">ລາຄາທັງໝົດ</span>  </th>                   
                    <th>DateIn/<Span class="laotext">ວັນທີເຂົ້າ</span>  </th>                   
                    <th>Critical/<Span class="laotext">ແຈ້ງເຕືອນ</span>  </th>                   
				                
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($list1 as $app) { 
				  $c++;
				  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
				  if (isset($app->barcode)) { $barcode= $app->barcode;	}else{$barcode="";}
					if (isset($app->pname)){  $pname= $app->pname;	}else{$pname="";}
					if (isset($app->uom)){  $uom= $app->uom;	}else{$uom="";}
					if (isset($app->qty)){  $qty= $app->qty;}else{$qty="";}	
					if (isset($app->unitprice)){  $unitprice= $app->unitprice;	}else{$unitprice="";}
					if (isset($app->critical)) { $critical= $app->critical;	}else{$critical="";}
					if (isset($app->category)) { $category= $app->category;	}else{$category="";}
					if (isset($app->catname)) { $catname= $app->catname;	}else{$catname="";}
					if (isset($app->totalqty)) { $totalqty= $app->totalqty;	}else{$totalqty=0;}
					if (isset($app->datein)) { $datein= $app->datein;	}else{$datein="";}
					if (isset($app->upPrice)) { $upPrice= $app->upPrice;	}else{$upPrice="";}
					if (isset($app->totalcosting)) { $totalcosting= $app->totalcosting;	}else{$totalcosting="";}
					if (isset($app->photo)) { $photo= $app->photo;	}else{$photo="";}
				    if($photo==""){
				        $photo="item.png";
				    }
					
					if ($qty >$critical) {
							echo "<tr 	style='padding: 1 !important;
                          margin: 0 !important; border: 1px solid #000;
                            vertical-align: middle;'>";
					}else{
						echo "<tr bgcolor='#ffced4'
						style='padding: 1 !important;
                          margin: 0 !important; border: 1px solid #000;
                            vertical-align: middle;'
						> ";
					}
						echo '<td class="d-flex">
							<a href="'. URL .'Stocks/loadPicture?id='.$id.'&&name='.$pname.'&&photo='.$photo.'" class="btn  bg-gradient-primary btn-flat " 
							 title=" Update Photo">
								<i class="fas fa-images"></i> 
							</a>
						   
						
							

							<a href="#Addstock'.$id.'" class="btn btn-md  bg-gradient-info btn-flat " 
							data-toggle="modal" data-target="#Addstock'.$id.'"   title=" Add Qty">
								<i class="fas fa-plus"></i>  
							</a>
							
						
							
							<a href="'. URL .'Stocks/StockHistory?id='. $id .'&&name='. $pname .'&&barcode='. $barcode .'" class="btn btn-md  bg-gradient-primary btn-flat"
							title=" View">
								<i class="fas fa-eye"></i> 
							</a>
							<a href="#Add'.$id.'" class="btn btn-md  bg-gradient-success btn-flat" data-toggle="modal" data-target="#Add'.$id.'"
							title=" Edit Details">
								<i class="fas fa-edit"></i> 
							</a>
							<a href="#" class="btn btn-md  bg-gradient-danger btn-flat deleteGroup" id="del_'.$id.'" title="Delete">
								<i class="fas fa-trash"></i>  
							</a>
						 </td>';
					echo "<td><div style='width:70px'>".$c."</div></td>";
					
				
					echo "<td><a href='". URL ."public/img/stock/".$photo."' target='_blank'><img src='". URL ."public/img/stock/".$photo."' width='50px'/></a> </td>";
						echo "<td><div style='width:200px'>".$barcode ."</div> </td>";
					echo "<td><div style='width:550px'>".$pname."</div></td>";
					echo "<td><div style='width:250px'>".$catname."</div></td>";
					echo "<td>".$uom."</td>";
					echo "<td><div style='width:150px'>".number_format($totalqty)."</div></td>";
					echo "<td><div style='width:150px'>".number_format($upPrice)."</div></td>";
					echo "<td><div style='width:170px'>".number_format( $totalcosting)."</div></td>";
					echo "<td><div style='width:150px'>".($datein)."</div></td>";
					echo "<td><div style='width:150px'>".number_format($critical)."</div></td>";
				
					
					
					
				
					
					echo "</tr>";
						echo '
					<div class="modal fade" id="Photo'.$id.'">
					
							   <div class="modal-dialog modal-md">
								  <div class="modal-content">
									<div class="modal-header">
									  <h4 class="modal-title">Update Photo</h4>
									  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<div class="modal-body">
											<form  method="post" action="'. URL .'Stocks/loadPicture" id="Photomodal'.$id.'">
                        							<br>
                        							<img src="'. URL .'public/img/stock/item.png" class="img-fluid" id="uploadPreview'.$id.'" >
                        										<br>
                        									   <label for="FileInput'.$id.'">
                        										
                        										<i class="fas fa-edit" style="color:#c7c7c7;font-size:16px">click to photo</i>
                        										
                        									   </label>
                        									  <input id="FileInput'.$id.'" type="file" name="logo" required
                        									  onchange="PreviewImage'.$id.'()" style="cursor: pointer;  display: none" accept="image/x-png,image/gif,image/jpeg" />
                        					
                        										<script>
                        										   function PreviewImage'.$id.'() {
                        												var oFReader = new FileReader();
                        												oFReader.readAsDataURL(document.getElementById("FileInput'.$id.'").files[0]);
                        
                        												oFReader.onload = function (oFREvent) {
                        													document.getElementById("uploadPreview'.$id.'").src = oFREvent.target.result;
                        												};
                        											};
                        										</script>
										
										  <button type="submit" class="btn btn-primary " >Save Details</button>
										 </form>
									</div>
									<div class="modal-footer justify-content-between">
									  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									
									</div>
								  </div>
								  <!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							
						</div>';
					
					echo '
					<div class="modal fade" id="Addstock'.$id.'">
						<form  method="post">
							   <div class="modal-dialog modal-lg">
								  <div class="modal-content">
									<div class="modal-header">
									  <h4 class="modal-title">Add Stock/Qty</h4>
									  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<div class="modal-body">
										
										<div class="row">
												
												<div class="col-md-4">	
												
												<input type="hidden"  class="form-control"  
														value="'.$barcode.'"	 id="sbarcode'.$id.'"
														name="id" placeholder ="Enter Product ID /Barcode" required>
														<input type="hidden"  class="form-control"  
														value="'.$id.'"	 id="sid'.$id.'"
														name="id" placeholder ="Enter Product ID /Barcode" required>	
												<strong >Current Quantity</STRONG>
													<div class="input-group mb-3">
														<input type="text" disabled
														value="'.$qty.'" id="sqty'.$id.'"
														class="form-control" style="background:#fff" placeholder ="Enter Quantity" required>	
														
													</div>	
												</div>
												<div class="col-md-4">	
													<strong >Add Quantity</STRONG>
													<div class="input-group mb-3">
														<input type="number"
														id="newqty'.$id.'"
														class="form-control" name="newqty" min="1"  placeholder ="Enter qty" required>	
													</div>	
												</div>	
											<div class="col-md-4">	
											<strong >Unit Price</STRONG>
												<input type="number"  class="form-control"  
														value="'.$upPrice.'"	 id="upPrice'.$id.'"
														name="id" placeholder ="Enter unit price">
												</div>												
										</div>
										
										
										
									</div>
									<div class="modal-footer justify-content-between">
									  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									  <button type="submit" class="btn btn-primary " id="addStock_'.$id.'">Save Details</button>
									</div>
								  </div>
								  <!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							  </form>
						</div>';
						echo "<script>
							$(document).ready(function(){					
								//add
								$('#addStock_".$id."').click(function(){
									var id= $('#sid".$id."').val();
									var newqty= $('#newqty".$id."').val();
									var sbarcode= $('#sbarcode".$id."').val();
									var upPrice= $('#upPrice".$id."').val();
									
									if(id=='' || newqty==''  || newqty=='0'  ){
										alert('Invalid Input!');
										$('#newqty".$id."').focus();
									}else{
										$.ajax({
											url: '". URL ."' + 'Stocks/AddStockQty',
											type: 'GET',
											data: { id:id, newqty:newqty ,sbarcode:sbarcode , upPrice:upPrice},
											success: function(response){
												alert(response);
												$('.modal-backdrop').remove()	;
																				
												$.ajax({    
													type: 'GET',
													url: '". URL ."' + 'Stocks/LoadStock',             
													dataType: 'html',   //expect html to be returned                
													success: function(response){  
													//	alert(response);
														$('.modal-backdrop').remove()	;
														$('#Add".$id."').hide(); // closes all active pop ups.	
														$('#response').html(response); 
														
													}

													});
												
																	
											}
										});
										
									}
									
								});
							});
							</script>";
						
					echo '
					<div class="modal fade" id="Add'.$id.'">
						<form id ="submitins" method="post">
							   <div class="modal-dialog modal-lg">
								  <div class="modal-content">
									<div class="modal-header">
									  <h4 class="modal-title">UPDATE  RECORD</h4>
									  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<div class="modal-body">
										<div class="row">
												<div class="col-md-6">	
												<strong >Product ID /Barcode</STRONG>
													<div class="input-group mb-3">
														<input type="hidden"  class="form-control"  
														value="'.$id.'"	 id="id'.$id.'"
														name="id" placeholder ="Enter Product ID /Barcode" required>	
														<input type="text"  class="form-control" style="background:#fff"
															value="'.$barcode.'"	
															disabled name="barcode" placeholder ="Enter Product ID /Barcode" required>	
													</div>	
												</div>
												<div class="col-md-6">	
													<strong >Product Name</STRONG>
													<div class="input-group mb-3">
														<input type="text" 
														value="'.$pname.'"	id="name'.$id.'"
														class="form-control" name="pname" placeholder ="Enter Product Name" required>	
													</div>	
												</div>						
										</div>
										<div class="row">
												<div class="col-md-4">	
												<strong >Category</STRONG>
												<div class="input-group mb-3">
												<select   class="form-control laotext" name="cat"  required  id="cat'.$id.'">	';
													echo "
														<option value='".$category."'>".$catname."</option>
														";
													foreach ($listcat as $app) { 	
														if (isset($app->catid)){  $catid= $app->catid;}else{$catid="";}	
														if (isset($app->categoryname)){  $categoryname= $app->categoryname;}else{$categoryname="";}	
														echo "
														<option value='".$catid."'>".$categoryname."</option>
														";
													}
													echo '</select>
												</div>	
											</div>	
												<div class="col-md-4">	
												<strong >UOM</STRONG>
													<div class="input-group mb-3">
														<select   class="form-control laotext" name="uom" id="uom'.$id.'"  required>	
															<option value="'.$uom.'">'.$uom.'</option>
									<option value="PCS"><span class="laotext">ອັນ/PCS</span></option>
									<option value="PACK"><span class="laotext">ແພັກ</span></option>
									<option value="BOX"><span class="laotext">ກັບ/BOX</span></option>
									<option value="ຖົງ">				<span class="laotext">ຖົງ/Bags</span></option>
										<option value="ຕຸກ"				<span class="laotext">ຕຸກ/Bottle</span></option>
											<option value="ຊອງ/Envelope">				<span class="laotext">ຊອງ/Envelope</span></option>
												<option value="ລາມ">				<span class="laotext">ລ່າມ/Pack</span></option>
													<option value="ກໍ້">				<span class="laotext">ກໍ້/Roll</span></option>
														<option value="ກ່ອງ">				<span class="laotext">ກ່ອງ/Boxes</span></option>
															<option value="ຕັບ">				<span class="laotext">ຕັບ/Pack</span></option>
															
								<option value="ກ້ານ"><span class="laotext">ກ້ານ/PCS</span></option>
								<option value="ຫົວ"><span class="laotext">ຫົວ/Unit</span></option>
						
										<option value="ຫໍ່"><span class="laotext">ຫໍ່/Pack</span></option>
								<option value="ຄູ່/Pair">
								</select>
													</div>	
												</div>
												<div class="col-md-4">	
													<strong >Replenish</STRONG>
													<div class="input-group mb-3">
														<input type="number" 
														value="'.$critical.'" id="rep'.$id.'"
														class="form-control" name="rep" placeholder ="Enter Replenish " min="0" >	
													</div>	
												</div>		
												
										</div>
										<!--<div class="row">
												<div class="col-md-6">	
												<strong >Quantity</STRONG>
													<div class="input-group mb-3">
														<input type="text" disabled
														value="'.$qty.'" 
														class="form-control" style="background:#fff" placeholder ="Enter Quantity" required>	
														<input type="hidden" 
														value="'.$qty.'" id="qty'.$id.'"
														class="form-control" name="qty" min="1" placeholder ="Enter Quantity" required>	
													</div>	
												</div>
												<div class="col-md-6">	
													<strong >Unit Price Per PCS</STRONG>
													<div class="input-group mb-3">
														<input type="number"
														value="'.$unitprice.'" id="unit'.$id.'"
														class="form-control" name="unitprice" min="1"  placeholder ="Enter Unit Price " required>	
													</div>	
												</div>						
										</div>-->
										
										
										<div id="addres"></div>
									</div>
									<div class="modal-footer justify-content-between">
									  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									  <button type="submit" class="btn btn-primary " id="UpdateModel_'.$id.'">Save Details</button>
									</div>
								  </div>
								  <!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							  </form>
						</div>';
						echo "<script>
							$(document).ready(function(){
								
							
									
									
								//Update
								$('#UpdateModel_".$id."').click(function(){
									var id= $('#id".$id."').val();
									var name= $('#name".$id."').val();
									var uom= $('#uom".$id."').val();
									var qty= $('#qty".$id."').val();
									var unit= $('#unit".$id."').val();
									var rep= $('#rep".$id."').val();
									var cat= $('#cat".$id."').val();
									if(id=='' || name=='' || uom=='' || qty=='' || unit=='' || rep=='' ){
										alert('All fields are required');
									}else{
										$.ajax({
											url: '". URL ."' + 'Stocks/UpdateData',
											type: 'GET',
											data: { id:id, name:name, uom:uom, qty:qty, unit:unit, rep:rep, cat:cat },
											success: function(response){
												alert(response);
													
																				
												$.ajax({    
													type: 'GET',
													url: '". URL ."' + 'Stocks/LoadStock',             
													dataType: 'html',   //expect html to be returned                
													success: function(response){  
													//	alert(response);
														$('.modal-backdrop').remove()	;
														$('#Add".$id."').hide(); // closes all active pop ups.	
														$('#response').html(response); 
														
													}

													});
												
																	
											}
										});
										
									}
									
								});
							});
							</script>";
					
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
					url: <?php echo "'". URL . "'" ?> + "Stocks/deleteStock",
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
  