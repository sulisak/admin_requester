
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


 
	<br>
                <table class="table table-bordered table-hover table-responsive  table-striped" id="example3" width="100%"  height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th width="30px">No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Business_Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></th>
                    <th>Facility/<span class="laotext">ສະຖານທີ່</span></th>
                    <th>Duties/<span class="laotext">ໜ້າທີ່</span></th>                    
                    <th>Date/<span class="laotext">ວັນທີ</span></th>                    
                    <th>Cleaner/<span class="laotext">ຜູ້ທຳຄວາມສະອາດ</span></th> 
                    <th>Grade/<span class="laotext">ຄວາມສະອາດ</span></th> 
                    
					             
                    <th width="80px">Action/<span class="laotext">ຈັດການ</span></th>                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($print as $app) { 
				  $c++;
				  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
				  if (isset($app->cleaner)){  $cleaner= $app->cleaner;}else{$cleaner="";}	
				  if (isset($app->cleandate)){  $cleandate= $app->cleandate;}else{$cleandate="";}	
				  if (isset($app->dutiesid)){  $dutiesid= $app->dutiesid;}else{$dutiesid="";}	
				  if (isset($app->grade)){  $grade= $app->grade;}else{$grade="";}	
				  if (isset($app->cid)){  $cid= $app->cid;}else{$cid="";}	
				  if (isset($app->fid)){  $fid= $app->fid;}else{$fid="";}	
				  if (isset($app->duties)){  $duties= $app->duties;}else{$duties="";}	
				  if (isset($app->facilityname)){  $facilityname= $app->facilityname;}else{$facilityname="";}	
				  if (isset($app->cname)){  $cname= $app->cname;}else{$cname="";}	
				  
				
					
					
					echo "<tr>";
					echo "<td>".$c."</td>";	
					echo "<td>".strtoupper($cname)."</td>";
					echo "<td>".strtoupper($facilityname)."</td>";
					echo "<td>".($duties)."</td>";
					echo "<td>".($cleandate)."</td>";
					echo "<td>".($cleaner)."</td>";
					echo "<td>".($grade)."</td>";
					
				
					
					
					echo '<td style="vertical-align:middle">
							
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
					url: <?php echo "'". URL . "'" ?> + "Checklist/DeleteChecklist",
					type: 'GET',
					data: { id:deleteid },
					success: function(response){
						alert(response);
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
	    var table = $('#example3').DataTable( {
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
        ],
			 
			paging:         true,	
				
					
			
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
  