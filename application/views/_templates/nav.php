<style>
*{
    font-size: 13px;
}
    .sidebar-mini .nav-sidebar, .sidebar-mini .nav-sidebar > .nav-header, .sidebar-mini .nav-sidebar .nav-link {
    
    font-size: 13px;
    }
    
.user-panel .image {
    display: inline-block ! important;
    padding-left: 30px  ! important;
}


</style>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">
		<?php date_default_timezone_set("Asia/Bangkok");
						echo   date('l jS \of F Y ');
						
			?>
		</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link"><div id="MyClockDisplay" class="clock" onload="showTime()"></div></a>
      </li>
   
    </ul>
</nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary " style="background-color: #333092;">
   
    <a href="#" class="brand-link" style="border-bottom: 0px ;background-color: #333092;border-bottom: 1px solid #4f5962;">
     <!--  <img src="<?php echo URL ;?>public/img/AIFLogo.png" alt="AIF Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
      <span class="brand-text font-weight-bold " >AIF GROUP ADMIN SYS/REQUESTOR</span>
      

    </a>
   <!--  Sidebar -->
    <div class="sidebar" >
        
        <div class="user-panel mt-3 pb-3 pl-1 mb-3 d-flex" style="margin-left: -30px ! important;">
        <div class="image">
          <img src="https://aifgrouplaos.la/AIFv2/public/img/profile/<?php echo $_SESSION['SESS_MEMBER_pic'];?>"   class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
           <a href="#" class="d-block"><?php echo $_SESSION['SESS_MEMBER_Fname'];?></a>
			<a href="#" class="d-block" style="font-size:12px"><?php echo $_SESSION['SESS_MEMBER_company'];?></a>
			<a href="#" class="d-block" style="font-size:12px"><?php echo $_SESSION['SESS_MEMBER_department'];?></a>
        </div>
      </div>
        <?php
			$ractive=""; $rhactive=""; $tcactive="";$acactive="";$stactive="";$staactive="";
			$actual_link=$_SERVER["REQUEST_URI"];
			if($actual_link=="/aif-adminsys-webview/Request/AddForm"){
				$ractive="active";	
				$rhactive="";	
				 $tcactive="";
				 $acactive="";
				 $stactive="";
				 $staactive="";
				 $mtactive="";
			}elseif($actual_link=="/aif-adminsys-webview/HistoryVehicle"){
				$ractive="";	
				$rhactive="active";	
				 $tcactive="";
				 $acactive="";
				 $stactive="";
				 $staactive="";
				 $mtactive="";
			}elseif($actual_link=="/aif-adminsys-webview/HistoryVehicle/getVehicleinfobyuserpendingtakecar"){
				$ractive="";	
				$rhactive="";	
				$tcactive="active";
				$acactive="";
				$stactive="";
				$staactive="";
				$mtactive="";
			}elseif($actual_link=="/aif-adminsys-webview/HistoryVehicle/ApproveVehicle"){
				$ractive="";	
				$rhactive="";	
				$tcactive="";
				$acactive="active";
				$stactive="";
				$staactive="";
				$mtactive="";
			}elseif($actual_link=="/aif-adminsys-webview/Stationary/index"){
				$ractive="";	
				$rhactive="";	
				$tcactive="";
				$acactive="";
				$stactive="active";
				$staactive="";
				$mtactive="";
			}elseif($actual_link=="/aif-adminsys-webview/Stationary/ApproveStationary"){
				$ractive="";	
				$rhactive="";	
				$tcactive="";
				$acactive="";
				$stactive="";
				$staactive="active";
				$mtactive="";
			}elseif($actual_link=="/aif-adminsys-webview/MeetingRoom/index"){
				$ractive="";	
				$rhactive="";	
				$tcactive="";
				$acactive="";
				$stactive="";
				$staactive="";
				$mtactive="active";
				
			}
			
			
			
			
		?>
        
        

      <!-- Sidebar Menu -->
      <nav class="mt-2 mb-3">
	     <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			
			  <li class="nav-item ">
				<a 
				href="<?php echo URL ;?>Request/AddForm"  class="nav-link <?php echo $ractive;?>">
				
				  <i class="nav-icon fas fa-plus"></i>
				  <p> REQUEST VEHICLE</p>
				</a>


		    </li>

		    <li class="nav-item">
				<a 
				href="<?php echo URL ;?>HistoryVehicle"  class="nav-link <?php echo $rhactive;?>">
				
				  <i class="nav-icon fas fa-car"></i>
				  <p>VEHICLE REQUEST HISTORY</p>
				</a>
		    </li>

		     <li class="nav-item">
				<a 
				href="<?php echo URL ;?>HistoryVehicle/getVehicleinfobyuserpendingtakecar"  class="nav-link <?php echo $tcactive;?>">
				
				  <i class="nav-icon fas fa-car"></i>
				  <p>TAKE CAR</p>
				</a>
		    </li>
			<?php
			if($_SESSION['SESS_MEMBER_POS']=="LineManager"){
				?>
		     <li class="nav-item">
				<a 
				href="<?php echo URL ;?>HistoryVehicle/ApproveVehicle"  class="nav-link <?php echo $acactive;?>">
				
				  <i class="nav-icon fas fa-check-double"></i>
				  <p>APPROVE VEHICLE</p>
				</a>
		    </li>
			<?php 
			}
			?>
		   <li class="nav-item">
				<a 
				href="<?php echo URL ;?>Stationary/index"  class="nav-link  <?php echo $stactive;?>">
				
				  <i class="nav-icon fas fa-shopping-cart"></i></i>
				  <p>REQUEST STATIONARY </p>
				</a>
		    </li>
			<?php
			if($_SESSION['SESS_MEMBER_POS']=="LineManager"){
				?>
			<li class="nav-item">
				<a 
				href="<?php echo URL ;?>Stationary/ApproveStationary"  class="nav-link <?php echo $staactive;?>">
				
				  <i class="nav-icon fas fa-spell-check"></i>
				  <p>APPROVE STATIONARY</p>
				</a>
		    </li>
			<?php 
			}
			?>

<!-- ----------- ori ----------------------------------------->
		    <li class="nav-item">
				<a 
				href="<?php echo URL ;?>MeetingRoom/index"  class="nav-link">
			
				
				  <i class="nav-icon fas fa-address-book"></i></i>
				  <p>BOOKING MEETING ROOM</p>
				</a>
		    </li> 

<!-- ---------------------------------------------------------------------- -->
		  <!--  <li class="nav-item">-->
				<!--<a -->
				<!--href="<?php echo URL ;?>MeetingRoom/index"  class="nav-link <?php echo $mtactive;?> ">-->
			
				
				<!--  <i class="nav-icon fas fa-address-book"></i></i>-->
				<!--  <p>BOOKING MEETING ROOM</p>-->
				<!--</a>-->
		  <!--  </li>-->
<!-- ---------------------------------------------------------------------- -->

           
			<!-- 
			<li class="nav-header">ACCOUNT SETTINGS</li> -->
				<li class="nav-item" >
				<a href="#PasswordModal" data-toggle="modal" data-target="#PasswordModal"  class="nav-link">
				  <i class="nav-icon fas fa-user-lock"></i>
				  <p>CHANGE PASSWORD</p>
				</a>
		    </li>
		    <li class="nav-item">
				<a 
				href="#logoutModal" data-toggle="modal" data-target="#logoutModal"  class="nav-link">
				
				  <i class="nav-icon fas fa-sign-out-alt"></i>
				  <p>LOGOUT</p>
				</a>
		    </li>
		    
			
			
			
			
			
			
			
			</ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
     <!-- Logout Modal-->

			<div class="modal fade in" id="logoutModal" tabindex="-1" role="dialog" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content " style="border-radius:5px; ">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Exit Account?</h4>
                        </div>
                        <div class="modal-body">
                           Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
						
                          <a href="<?php echo URL ;?>Dashboard/logout_user" data-color="pink" 
						    class="btn bg-pink  waves-effect">Logout</a>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
 <!-- Logout Modal-->
 
 
   <div class="modal fade" id="PasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
	  <form method="post" id="changepw">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
			
			<div class="text-xs font-weight-bold text-primary text-uppercase mt-3" >Current Password</div>
				<input type="password"class="form-control" name="cPass" id="cPass" required Placeholder="Please Enter Current Password">
			<div class="text-xs font-weight-bold text-primary text-uppercase mt-3" >New Password</div>
				<input type="password"class="form-control" name="nPass" required Placeholder="Please Enter New Password">
		
			<div id="chresponse"></div>
		</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" >Save New Password</button>
        </div>
        </form>
      </div>
    </div>
  </div>	
   <script src="<?php echo URL ;?>public/js/jquery.js"></script>
<script>
$(document).ready(function() {	
	
	$("#chresponse").html("");			
	$("#changepw").submit(function(){
				$("#chresponse").html("<b>Loading response...</b>");
					$.ajax({
							type: "POST",
								url: <?php echo "'". URL . "'" ?> + "Dashboard/ChangePassword", 
							data: $(this).serialize()
							})
							.done(function(data){
							  //  alert(data);
							$("#chresponse").fadeOut(500).html(data).fadeIn(300);
							
							})
							.fail(function() {
							alert( "Posting failed." );
							});
							
							return false;
																
																
			});	
								
							
							
	
});
</script>	
	
 