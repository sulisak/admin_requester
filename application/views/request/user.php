

<script src="<?php echo URL ;?>public/js/jquery.js">	</script>

<link rel="stylesheet" href="<?php echo URL ;?>public/css1/bootstrap.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo URL ;?>public/css1/responsive.bootstrap4.min.css">



<div class="">


 

                <table class="table table-bordered table-hover table-responsive table-striped laotext" id="example" width="100%"  height="500px" cellspacing="0">
                 <thead>
                  <tr>
                    <th>No/<span class="laotext">ລຳດັບ</span></th>
                    <th>Username/<span class="laotext">ຊື່ຜູ້ໃຊ້</span></th>
                    <th>Fullname/<span class="laotext">ຊື່ເຕັມ</span></th>
                    <th>Contact/<span class="laotext">ເບີໂທ</span></th>
                    <th>Email/<span class="laotext">ອີເມວ</span></th>
                    <th>Business_Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></th>
                    <th>Department/<span class="laotext">ພະແນກ    </span>          </th>               
                    <th width="50px">Action/<span class="laotext">ຈັດການ</span></th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php 
				  $c=0;
					$rstatus="";
					$userid="";
					$username="";
					$fullname="";	
					$contact="";
					$company="";
					$department="";
					
				  foreach ($listuser as $app) { 
				  $c++;
					if (isset($app->userid))  $userid= $app->userid;	
					if (isset($app->username))  $username= $app->username;	
					if (isset($app->fullname))  $fullname= $app->fullname;	
					if (isset($app->contact))  $contact= $app->contact;	
					if (isset($app->email))  $email= $app->email;	
					if (isset($app->company))  $company= $app->company;	
					if (isset($app->department))  $department= $app->department;	
					
					if (isset($app->email))  $email= $app->email;		
					
					echo "<tr>";
					echo "<td>".$c."</td>";
					echo "<td>".$username."</td>";
					echo "<td>".$fullname."</td>";
					echo "<td>".$contact ."</td>";
					echo "<td>".$email ."</td>";
					echo "<td>".$company."</td>";
					echo "<td>".$department."</td>";
				
					
					echo '<td class="d-flex">
					
							<button class="btn btn-xs  bg-gradient-success btn-flat addModel" id="del_'.$userid.'">
								<i class="fas fa-plus"></i> 
							</button>
							
							<a class="btn btn-xs  bg-gradient-info btn-flat " href="' . URL .'Request/getUserinfobyid?id='.$userid.'">
								<i class="fas fa-eye"></i>  
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
	 $('.closemodal').click(function(){		 	
		 $('#viewModal').hide();	
		 $('#addModal').hide();	
		 $("#responseAdd").hide();
		 $("#cmodelname").val('');
	 });
	 
	
	   $('.addModel').click(function(){
		   
		    var generateRandomNDigits = (n) => {
			return Math.floor(Math.random() * (9 * (Math.pow(10, n)))) + (Math.pow(10, n));
			}
			
			var vrr = generateRandomNDigits(7);
			$("#vr").val(vrr);
			$("#vr1").val(vrr);
			
			
			
			$('#addModal').show();	
			
			$("#responseAdd").hide();
			$("#cmodelname").val('');
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			 $('#cmodel').val(id);
			 $.ajax({
					url: <?php echo "'". URL . "'" ?> + "Request/getUserinfo?id=" + id,
					type: 'GET',
					data: { id:id },
					success: function(response){
					//alert(response);
						$("#loadGetInfo").html(response); 
						//$('#ViewModal').show();	
						
					}
				});
			 
			 
			 
			//alert(id);
		});
	
	

	   
		
		$("#AddModel").submit(function(){
					
				$("#responseAdd").hide();
				
					var d1 = Date.parse($('#depdate').val());
					var d2 = Date.parse($('#redate').val());
					var t1 = Date.parse($('#deptime').val());
					var t2 = Date.parse($('#retime').val());
					var today = new Date();
					var dd = String(today.getDate()).padStart(2, '0');
					var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
					var yyyy = today.getFullYear();

					today =  yyyy +'-' + mm + '-' + dd;
										
					var todayparse = Date.parse(today);
					//alert(todayparse);
					
					if(todayparse <= d1 ){
					
						if(Date.parse($('#depdate').val() + ' ' + $('#deptime').val()  ) < Date.parse($('#redate').val() + ' ' + $('#retime').val() )) {
							$.ajax({
								type: "POST",
									url: <?php echo  "'".  URL  ."Request/AddRequest'";?>,         
								data: $(this).serialize()
								})
								.done(function(data){
								$("#responseAdd").fadeOut(500).html(data).fadeIn(300);
								//alert(data);
								if(data=='Create Successfully!'){
									alert(data);
									$("#addModal").hide();
								}								
								
								
								})
								.fail(function() {
								alert( "Posting failed." );
								});
												 
						 
						  }else{

						  alert('Invalid Dates!');
							$('#depdate').focus();
						  }
					  	
					}else{
					//  alert('It should be 1 day ahead from the current date to request a vehicle!');
					  alert('Invalid date and time!');
					}
					return false;	
					
				
				
											
				
				
		});	
});
</script>	
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
	  
<div class="modal " id="addModal"style=" background-color: rgba(0,0,0,.01) !important;
  width: 100%;
  height: 100%;
  overflow: auto;">
	<form id="AddModel" method="post">
        <div class="modal-dialog modal-lg" >
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title">DATE REQUEST( <?php	date_default_timezone_set('Asia/Bangkok'); 		$date =strtoupper(date('l jS \of F Y'));
						echo $date; ?>)</h6>
              <button type="button" class="close closemodal" data-dismiss="modal" aria-label="Close">
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
									<img src="<?php echo URL ;?>public/img/avatar31.png"  width="50px">
								</div>
								<center><div class="circledivPending">P</div></center>
                                <h6 class="labelmodal laotext">REQUESTOR/ຜູ້ຮ້ອງຂໍເບີກ</h6>
                               
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="<?php echo URL ;?>public/img/linemanager.png"  width="50px">
								</div>
								<center><div class="circledivPending">P</div></center>
                                  <h6 class="labelmodal laotext">LINE MANAGER/ຫົວໜ້າສາຍງານ</h6>
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="<?php echo URL ;?>public/img/admin.png"  width="50px">
								</div>
								<center><div class="circledivPending">P</div></center>
                                  <h6 class="labelmodal laotext">ADMIN HEAD/ຫົວໜ້າຜູ້ບໍຫານລະບົບ</h6>
                           
                            
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="<?php echo URL ;?>public/img/avatar31.png"  width="50px">
								</div>
								<center><div class="circledivPending">P</div></center>
                                  <h6 class="labelmodal laotext">TAKE CAR/ເອົາລົດ</h6>
                             
                               
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="<?php echo URL ;?>public/img/avatar31.png"  width="50px">
								</div>
								<center><div class="circledivPending">P</div></center>
                                  <h6 class="labelmodal laotext">RETURN/ສົ່ງລົດ</h6>
                              
                               
                            </div>
                        </li>
                        
                       
                    </ul>
              
			</div>
			</center>
			<hr>
			
			 
		
			
			 <div id="loadGetInfo"></div>					
			 <div id="responseAdd"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger closemodal" data-dismiss="modal">Close/ປິດ</button>
              <button type="submit" class="btn btn-primary laotext">Save Details/ບັນທຶກ</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </form>
        <!-- /.modal-dialog -->
      </div>			  
			  
			  
			  
			  
			  
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
  