
<script src="<?php echo URL ;?>public/js/bootbox.min.js"></script>
<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">

<style>
.scroll {
   width: 100%;
 
   overflow-y: scroll;
}
.scroll::-webkit-scrollbar {
    width: 2px;
}

.scroll::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}

.scroll::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}	  
.circledivPending {
  height: 35px;
  width: 35px;
  display: table-cell;
  text-align: center;
  vertical-align: middle;
  border-radius: 50%;

  background: #ffd24b;
}
.hori-timeline .events {
    border-top: 3px solid #e9ecef;
}
.hori-timeline .events .event-list {
    display: block;
    position: relative;
    text-align: center;
    padding-top: 70px;
    margin-right: 0;
}
.hori-timeline .events .event-list:before {
    content: "";
    position: absolute;
    height: 36px;
    border-right: 2px dashed #dee2e6;
    top: 0;
}
.hori-timeline .events .event-list .event-date {
    position: absolute;
  
    left: 0;
    right: 0;
   
    margin: 0 auto;
    
}
@media (min-width: 1140px) {
    .hori-timeline .events .event-list {
        display: inline-block;
        width: 150px;
        padding-top: 45px;
    }
    .hori-timeline .events .event-list .event-date {
        top: -30px;
    }
}
@media (min-width: 992px){
.modal-lg {
    max-width: 1000px;
}
}
.text{font-size:12px;}

.labelmodal{
	font-size:10px;
	font-weight:990;
</style>		  
	  

<div class="table-responsive">



 

                <table class="table table-bordered table-hover  table-striped" id="example" width="100%" cellspacing="0">
                 <thead>
                  <tr>
                    <th width="50px">No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Photo/<span class="laotext">ຮູບ</span></th>
                    <th>Name/<span class="laotext">ຊື່</span></th>
                    <th>Business_Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></th>                    
                    <th>Department/<span class="laotext">ພະແນກ</span></th> 
                    <th>Contact/<span class="laotext">ເບີຕິດຕໍ່</span></th> 
                    <th>Email/<span class="laotext">ອີເມວ</span></th>                                    
					<th width="150px">Action/<span class="laotext">ຈັດການ</span></th>                   
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
				  foreach ($list1 as $app) { 
				  $c++;
				  if (isset($app->userid)){  $id= $app->userid;}else{$id="";}	
				  if (isset($app->userid )) { $userid = $app->userid ;	}else{$userid ="";}
				  if (isset($app->username  )) { $username  = $app->username  ;	}else{$username  ="";}
				  if (isset($app->fullname)) { $fullname= $app->fullname;	}else{$fullname="";}
					if (isset($app->pname)){  $pname= $app->pname;	}else{$pname="";}
					if (isset($app->contact)){  $contact= $app->contact;	}else{$contact="";}
					if (isset($app->Email)){  $Email= $app->Email;}else{$Email="";}	
					if (isset($app->profile)){  $profile= $app->profile;	}else{$profile="";}
					if (isset($app->company)) { $company= $app->company;	}else{$company="";}
					if (isset($app->department)) { $department= $app->department;	}else{$department="";}
					
				
					echo "<tr>";
					echo "<td style='vertical-align: middle;'>".$c."</td>";
						echo "<td style='vertical-align: middle;'><img src='". URL ."public/img/profile/".$profile."' class='img-circle'
							width='40px' height='40px' >
							</td>";
					echo "<td style='vertical-align: middle;'>".$fullname."</td>";
					echo "<td style='vertical-align: middle;'>".$company."</td>";
						echo "<td style='vertical-align: middle;'>".$department."</td>";
					echo "<td style='vertical-align: middle;'>".$contact ."</td>";
					echo "<td style='vertical-align: middle;'>".$Email ."</td>";
				
				
					
					
					
					echo '<td align="center" class="d-flex" style="vertical-align: middle;">
							
								<a href="#Add'.$id.'" class="btn btn-xs  bg-gradient-success btn-flat addModel" 
								data-toggle="modal" data-target="#Add'.$id.'">
								<i class="fas fa-plus"></i> 
								</a>							
								<a class="btn btn-xs  bg-gradient-info btn-flat " href="' . URL .'Request/getUserinfobyid?id='.$id.'">
									<i class="fas fa-eye"></i>  
								</a>
						 </td>';
					
					echo "</tr>";
					
					echo '
					<div class="modal fade" id="Add'.$id.'" >
						<form id ="submitins" method="post">
							   <div class="modal-dialog modal-lg" style="max-width:80%">
								  <div class="modal-content">
									<div class="modal-header">
									  <h4 class="modal-title">UPDATE  RECORD</h4>
									  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									  </button>
									</div>
									<div class="modal-body">
											<center>
												<br>
												 <div class="hori-timeline" dir="ltr">
												 
												 

													<ul class="list-inline events">
														
														<li class="list-inline-item event-list">
															<div class="px-1">
																<div class="event-date text-center">
																	<img src="'.URL .'public/img/avatar31.png"  width="50px">
																</div>
																<center><div class="circledivPending">P</div></center>
																<h6 class="labelmodal">REQUESTOR</h6>
															   
															</div>
														</li>
														<li class="list-inline-item event-list">
															<div class="px-1">
																<div class="event-date text-center">
																	<img src="'.URL .'public/img/linemanager.png"  width="50px">
																</div>
																<center><div class="circledivPending">P</div></center>
																  <h6 class="labelmodal">LINE MANAGER</h6>
															</div>
														</li>
														<li class="list-inline-item event-list">
															<div class="px-1">
																<div class="event-date text-center">
																	<img src="'.URL .'public/img/admin.png"  width="50px">
																</div>
																<center><div class="circledivPending">P</div></center>
																  <h6 class="labelmodal">ADMIN HEAD</h6>
														   
															
															</div>
														</li>
														<li class="list-inline-item event-list">
															<div class="px-1">
																<div class="event-date text-center">
																	<img src="'.URL .'public/img/avatar31.png"  width="50px">
																</div>
																<center><div class="circledivPending">P</div></center>
																  <h6 class="labelmodal">TAKE CAR</h6>
															 
															   
															</div>
														</li>
														<li class="list-inline-item event-list">
															<div class="px-1">
																<div class="event-date text-center">
																	<img src="'.URL .'public/img/avatar31.png"  width="50px">
																</div>
																<center><div class="circledivPending">P</div></center>
																  <h6 class="labelmodal">RETURN</h6>
															  
															   
															</div>
														</li>
														
													   
													</ul>
											  
											</div>
											</center>
									
									
											<div class="row">
												<div class="col-md-2">
													<p class="labelmodal">User ID</p>
													 <input type="hidden" name="userid" id="cmodel"  value="'.$userid.'" >
													 <input type="text" name="fname"

													 disabled class="form-control text" style="background:#fff"  value="'.$username.'" >
												</div>
												<div class="col-md-2">
													<p class="labelmodal">Company</p>
													 <input type="text" name="cid"  disabled class="form-control text" style="background:#fff" value="'.$company.'" >
												</div>
												<div class="col-md-2">
													<p class="labelmodal">Fullname</p>
													<input type="text" name="fname"   disabled class="form-control text" style="background:#fff" value="'. $fullname.'" >
												</div>
												<div class="col-md-2">
													<p class="labelmodal">Department</p>
													 <input type="text" name="cid"  disabled class="form-control text" style="background:#fff"  value="'. $department.'" >
												</div>
												<div class="col-md-2">
													<p class="labelmodal">Contact</p>
												
													 <input type="text" name="fname"   disabled class="form-control text" style="background:#fff"  
													 value="'.$contact.'" >
												</div>
												<div class="col-md-2">
													<p class="labelmodal">VRNO.</p>';
													$vr= strtoupper(uniqid());
													 echo '<input type="hidden" name="vr"   class="form-control text" id="vr">
													 <input type="text" disabled  class="form-control text"  id="vr1" style="background:#fff" >
												</div>
												
										</div>
										<hr>
										
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
				  }
				  ?>
                 
                
                
					
                  </tbody>
                </table>
				
              </div>
			  
		  
						  
<script>
$(document).ready(function(){
	
		$('.addModel').click(function(){		   
		    var generateRandomNDigits = (n) => {
			return Math.floor(Math.random() * (9 * (Math.pow(10, n)))) + (Math.pow(10, n));
			}
			var vrr = generateRandomNDigits(7);
			$("#vr").val(vrr);
			$("#vr1").val(vrr);
			
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
	        lengthChange: false,
	        buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
	    } );
	 
	    table.buttons().container()
	        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
	} );
     </script>
  