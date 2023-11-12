<?php
Session_Start();
 if(isset($_SESSION['SESS_MEMBER_POS'])){
 if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){


class Checklist extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {		 
		
		
		
		 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
			if($Sid=="" ){
					$LoginModel = $this->loadModel('LoginModel');
					$companylist = $LoginModel->getCompany();									
					require 'application/views/login/index.php';
			}else{
				
				date_default_timezone_set('Asia/Bangkok'); 
				$date =date("Y-m-d");			
				$userId=$Sid;
				$token=$_SESSION['SESS_MEMBER_unique'];
				$dashboard_model = $this->loadModel('DashboardModel');
				$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
				//echo $LogUser;
				if ($LogUser==1){	
				$CleaningModel = $this->loadModel('CleaningModel');
				$listbusiness= $CleaningModel->loadcompany();
				
				
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/checklist/index.php';
				
				}else{
					session_unset();
					session_destroy();
					
					
						echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="'. URL .'";
								</script>	
					';
				}	
			}	
		
	}

    public function loadfacility()
    {		 
		
		
		
		 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
			if($Sid=="" ){
					$LoginModel = $this->loadModel('LoginModel');
					$companylist = $LoginModel->getCompany();									
					require 'application/views/login/index.php';
			}else{
				
				date_default_timezone_set('Asia/Bangkok'); 
				$date =date("Y-m-d");			
				$userId=$Sid;
				$token=$_SESSION['SESS_MEMBER_unique'];
				$dashboard_model = $this->loadModel('DashboardModel');
				$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
				//echo $LogUser;
				if ($LogUser==1){	
				
					
				$id=$_GET["id"];
				$ChecklistModel = $this->loadModel('ChecklistModel');
				$list= $ChecklistModel->loadfacility($id);
				//print_r($list);
				
					echo'
					<script>
					$(document).ready(function(){
						$("#fid").change(function(){  
									var fid=$("#fid").val();
									
									$("#facility").val(fid);
									$("#divshow").hide();
									$.ajax({   //create an ajax request to display.php
										type: "GET",
										url:"'.  URL  .'Checklist/loadduties?id=" + fid ,             
										dataType: "html",   //expect html to be returned                
										success: function(response){   
											$("#loadduties").html(response); 
											$("#divshow").show();											
											return false;
					
										}

									});
								return false;
								
							});
						});
					</script>
					
					
					<div class="row">
					<div class="col-md-6">
							<b>Facility</b>
							<div class="input-group mb-3">
								  <select class="form-control" name="fid" id="fid" required>';
								  
										echo '<option value="0">--Select Facility--</option>';
										foreach ($list as $app) { 	
											if (isset($app->fid))  $fid= $app->fid;	
											if (isset($app->facilityname))  $facilityname= $app->facilityname;
											echo '<option value="'.$fid.'">'.$facilityname.'</option>';
										}
										
										
								 	echo' </select>						
							
									</div>
					</div>';	
			
					echo'
					<div class="col-md-6">
							<div id="loadduties"></div>
					</div>
					</div>';
				
				
				
				}else{
					session_unset();
					session_destroy();
					
					
						echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="'. URL .'";
								</script>	
					';
				}	
			}	
		
	}
   	
   	
    public function loadduties()
    {		 
		
		
		
		 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
			if($Sid=="" ){
					$LoginModel = $this->loadModel('LoginModel');
					$companylist = $LoginModel->getCompany();									
					require 'application/views/login/index.php';
			}else{
				
				date_default_timezone_set('Asia/Bangkok'); 
				$date =date("Y-m-d");			
				$userId=$Sid;
				$token=$_SESSION['SESS_MEMBER_unique'];
				$dashboard_model = $this->loadModel('DashboardModel');
				$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
				//echo $LogUser;
				if ($LogUser==1){	
				
					
				$id=$_GET["id"];
				$ChecklistModel = $this->loadModel('ChecklistModel');
				$list= $ChecklistModel-> loadDuties($id);
				//print_r($list);
						echo '
						<script>
						$(document).ready(function(){
							$("#dutiesSelect").change(function(){  
										var duties=$("#dutiesSelect").val();										
										$("#duties").val(duties);
										var fid=$("#fid").val();
										var cid=$("#cid").val();
										var date=$("#date").val();
										
									
									$.ajax({   //create an ajax request to display.php
										type: "GET",
										url:"'.  URL  .'Checklist/loaddata?fid=" + fid + "&&cid=" + cid + "&&date=" + date ,             
										dataType: "html",   //expect html to be returned                
										success: function(response){   
											$("#addres").html(response); 
											$("#divshow").show();											
											return false;
					
										}

									});
									
									return false;
									
							});
							$("#date").change(function(){  
										var duties=$("#dutiesSelect").val();										
										$("#duties").val(duties);
										var fid=$("#fid").val();
										var cid=$("#cid").val();
										var date=$("#date").val();
										//alert(date);
									
									$.ajax({   //create an ajax request to display.php
										type: "GET",
										url:"'.  URL  .'Checklist/loaddata?fid=" + fid + "&&cid=" + cid + "&&date=" + date ,             
										dataType: "html",   //expect html to be returned                
										success: function(response){   
											$("#addres").html(response); 
											$("#divshow").show();											
											return false;
					
										}

									});
									
									return false;
									
								});
							});
						</script>
						<b>Duties</b>
						<select class="form-control" name="duties" id="dutiesSelect" required>';
										echo '<option value="0">--Select Duties--</option>';
										foreach ($list as $app) { 	
											if (isset($app->did))  $did= $app->did;	
											if (isset($app->duties))  $duties= $app->duties;
											echo '<option value="'.$did.'">'.$duties.'</option>';
										}
										
										
					echo' </select>					
					';					
							
					
				
				
				}else{
					session_unset();
					session_destroy();
					
					
						echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="'. URL .'";
								</script>	
					';
				}	
			}	
		
	}
   	
   public function loaddata()
    {		 
		
		
		
		 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
			if($Sid=="" ){
					$LoginModel = $this->loadModel('LoginModel');
					$companylist = $LoginModel->getCompany();									
					require 'application/views/login/index.php';
			}else{
				
				date_default_timezone_set('Asia/Bangkok'); 
				$date =date("Y-m-d");			
				$userId=$Sid;
				$token=$_SESSION['SESS_MEMBER_unique'];
				$dashboard_model = $this->loadModel('DashboardModel');
				$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
				//echo $LogUser;
				if ($LogUser==1){	
				
					
				//print_r($_POST);
				
				$cid=$_GET["cid"];
				$fid=$_GET["fid"];
				$date=$_GET["date"];
				
				
					
				$ChecklistModel = $this->loadModel('ChecklistModel');
				$print=$ChecklistModel->loadData($cid,$fid,$date);
			//	print_r($print);
				
				require 'application/views/checklist/list.php';
				
				}else{
					session_unset();
					session_destroy();
					
					
						echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="'. URL .'";
								</script>	
					';
				}	
			}	
		
	}
   	public function addDuties()
    {		 
		
		
		
		 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
			if($Sid=="" ){
					$LoginModel = $this->loadModel('LoginModel');
					$companylist = $LoginModel->getCompany();									
					require 'application/views/login/index.php';
			}else{
				
				date_default_timezone_set('Asia/Bangkok'); 
				$date =date("Y-m-d");			
				$userId=$Sid;
				$token=$_SESSION['SESS_MEMBER_unique'];
				$dashboard_model = $this->loadModel('DashboardModel');
				$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
				//echo $LogUser;
				if ($LogUser==1){	
				
					
				//print_r($_POST);
				
				$cid=$_POST["cid"];
				$duties=$_POST["duties"];
				$fid=$_POST["fid"];
				$date=$_POST["date"];
				$cleaner=$_POST["cleaner"];
				$grade=$_POST["grade"];
				
				$ChecklistModel = $this->loadModel('ChecklistModel');
				
				$total=$ChecklistModel->CheckDuties($duties,$cid,$fid,$date);
				if($total==0){
					$ChecklistModel->insertcleaning($cleaner,$date,$duties, $grade, $cid, $fid );
					echo "<i style='color:green'>Save Successfully!</i>";	
				}else{
					echo "<i style='color:red'>Already Exist!</i>";	
				}
				
				$print=$ChecklistModel->loadData($cid,$fid,$date);
			//	print_r($print);
				
				require 'application/views/checklist/list.php';
				
				}else{
					session_unset();
					session_destroy();
					
					
						echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="'. URL .'";
								</script>	
					';
				}	
			}	
		
	}
   	
   public function DeleteChecklist()
    {		 
		
		
		
		 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
			if($Sid=="" ){
					$LoginModel = $this->loadModel('LoginModel');
					$companylist = $LoginModel->getCompany();									
					require 'application/views/login/index.php';
			}else{
				
				date_default_timezone_set('Asia/Bangkok'); 
				$date =date("Y-m-d");			
				$userId=$Sid;
				$token=$_SESSION['SESS_MEMBER_unique'];
				$dashboard_model = $this->loadModel('DashboardModel');
				$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
				//echo $LogUser;
				if ($LogUser==1){	
				
					
				//print_r($_POST);
				
				$id=$_GET["id"];			
				$ChecklistModel = $this->loadModel('ChecklistModel');				
				$ChecklistModel->DeleteChecklist($id);
				
				
				require 'application/views/checklist/list.php';
				
				}else{
					session_unset();
					session_destroy();
					
					
						echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="'. URL .'";
								</script>	
					';
				}	
			}	
		
	}
   	
   
	
	
}
}
}else{
					session_unset();
					session_destroy();
					
					
						echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
							 window.location.href ="'. URL .'";
								</script>	
					';
				}
?>
