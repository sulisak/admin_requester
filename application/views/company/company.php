
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>


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
		
<div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none" id="messageres">
  <p><b>Message/ຂໍ້ຄວາມ : </b> <span  id="msg" class="laotext">You should check in on some of those fields below/ເຈົ້າຄວນກວດເບິ່ງຫ້ອງໃສ່ຂໍ້ມູນລຸ່ມນີ້.</span></p>
  <button type="button" id="closebt" class="close">
    <span aria-hidden="true">&times;</span>
  </button>
  
 </div>		
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none" id="messageres2">
  <p><b>Message/<span class="laotext">ຂໍ້ຄວາມ </span></b> <span  >Already Exist/<span class="laotext">ມີຂໍ້ມູນນີ້ແລ້ວ</span></span></p>
  <button type="button" id="closebt2" class="close">
    <span aria-hidden="true">&times;</span>
  </button>
 </div>

                <table class="table table-bordered table-hover table-responsive table-striped" id="example" width="100%" height="500px"  cellspacing="0">
                 <thead>
                  <tr>
                    <th width="30px">No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Business_Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></th>
                   
					             
                    <th width="60px">Action/<span class="laotext">ຈັດການ</span>  </th>                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($list1 as $app) { 
				  $c++;
				  if (isset($app->cid)){  $id= $app->cid;}else{$id="";}	
				  if (isset($app->cname)) { $cname= $app->cname;	}else{$cname="";}
					
				
					
					
					echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td><input type='text' id='dep_".$id."' value='".$cname ."' class='form-control'></td>";
					echo '<td class="d-flex">
							
							<a href="#" id="edit_'.$id.'" class="btn btn-sm  bg-gradient-success btn-flat" onClick="return confirm(\'Are you sure you want to edit?\');">
								<i class="fas fa-edit"></i> EDIT
							</a>
							<a href="#" class="btn btn-sm btn-block bg-gradient-danger btn-flat DeteleDepart" id="del_'.$id.'">
						
								<i class="fas fa-trash"></i> DELETE
							</a>
							
						 </td>';
					
					echo "</tr>";
					
					echo "<script>
							$(document).ready(function(){
								$('#messageres').hide();
								$('#closebt').click(function(){
										$('#messageres').hide();
								});
								
								$('#closebt2').click(function(){
										$('#messageres2').hide();
								});
								
								//update
								$('#edit_".$id."').click(function(){
									
									var dep =$('#dep_".$id."').val();
								
									var el = this;
									var id = this.id;
									var splitid = id.split('_');
	
									var deleteid = splitid[1];
									$('#messageres').hide();
									$('#messageres2').hide();
									
										$.ajax({
											url: '". URL ."' + 'BusinessUnit/Updatepro',
											type: 'GET',
											data: { id:deleteid,dep:dep },
											success: function(response){
											
										
											if(response=='exit'){
												$('#messageres').show();
												$('#msg').html('Update Successfully!');
												$('#messageres').fadeIn();
												$('#messageres').fadeIn('slow');
												$('#messageres').fadeIn(3000);
											}else if(response=='Update Successfully!'){
												$('#messageres').show();
												$('#msg').html('Update Successfully!');
												$('#messageres').fadeIn();
												$('#messageres').fadeIn('slow');
												$('#messageres').fadeIn(3000);
											}else{
												
												$('#messageres2').show();												
												$('#messageres2').fadeIn();
												$('#messageres2').fadeIn('slow');
												$('#messageres2').fadeIn(3000);
											}
											
												
												
											}
										});
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
    $('.DeteleDepart').click(function(){
			var r = confirm("Are you sure you want to delete?");
	  if (r == true) {
		
	  var el = this;
        var id = this.id;
        var splitid = id.split("_");

        // Delete id
        var deleteid = splitid[1];
		//alert(deleteid);
		
		$.ajax({
					url: <?php echo "'". URL . "'" ?> + "BusinessUnit/deleteDep",
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
	  }
		return false;
		
		
    });
});
</script>			  
						  
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
  