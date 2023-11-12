<?php
Session_Start();
 if(isset($_SESSION['SESS_MEMBER_POS'] )){
 if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){


class Inspection extends Controller
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

				
					$InspectionModel = $this->loadModel('InspectionModel');
					$checker=$InspectionModel-> loadChecker();
					$vehicle=$InspectionModel-> loadVehicle();
					
				
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/inspection/index.php';
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
	
    public function Loadinspection()
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
			
					
					  if(isset($_POST["start"])){
						    $start = $_POST["start"];
					  }else{
						    $start = '';
					  }
					  
					  if(isset($_POST["end"])){
						    $end = $_POST["end"];
					  }else{
						    $end = '';
					  }
					  
					  
				
					 
	
					$InspectionModel = $this->loadModel('InspectionModel');
					$list1 = $InspectionModel->LoadInspection($start, $end);
					//print_r($list1);
					require 'application/views/inspection/Inspection.php';

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
    public function UpdateStatus()
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
			
					
					  if(isset($_GET["id"])){
						    $id = $_GET["id"];
					  }else{
						    $id = '';
					  }
					  
					 
				
					 
					
					$InspectionModel = $this->loadModel('InspectionModel');
					$InspectionModel->UpdateStatus($id);
					
					
					
				

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
	
	
    public function Updatepro()
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
					 if(isset($_POST["id"])){
						    $id = $_POST["id"];
					  }else{
						    $id = '';
					  }
					if(isset($_POST["vehicle"])){
						    $vehicle = $_POST["vehicle"];
					  }else{
						    $vehicle = '';
					  }
					  if(isset($_POST["checker"])){
						    $checker = $_POST["checker"];
					  }else{
						    $checker = '';
					  }
					  
					  if(isset($_POST["internal"])){
						    $internal = $_POST["internal"];
					  }else{
						    $internal = '';
					  }
					  if(isset($_POST["external"])){
						    $external = $_POST["external"];
					  }else{
						    $external = '';
					  }
					  if(isset($_POST["engine"])){
						    $engine = $_POST["engine"];
					  }else{
						    $engine = '';
					  }
					  if(isset($_POST["break"])){
						    $break = $_POST["break"];
					  }else{
						    $break = '';
					  }
					  
					  if(isset($_POST["idate"])){
						    $idate = $_POST["idate"];
					  }else{
						    $idate = '';
					  }
					  
					  if(isset($_POST["tyre"])){
						    $tyre = $_POST["tyre"];
					  }else{
						    $tyre = '';
					  }
					  
					  if(isset($_POST["remarks"])){
						    $remarks = $_POST["remarks"];
					  }else{
						    $remarks = '';
					  }
					  
					$InspectionModel = $this->loadModel('InspectionModel');
					$InspectionModel->UpdateInspection(
							$checker,$vehicle,$internal,$external,$engine,$break,$idate,$remarks,$tyre,$id
							);
							
					 echo '
					 <script>
							alert("Update Successfully!");
							window.location.href ="'. URL .'Inspection";
					</script>	
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
	
	
	
    public function UpdateInspection()
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
			
					
					  if(isset($_GET["id"])){
						    $id = $_GET["id"];
					  }else{
						    $id = '';
					  }
					  
					 
				
					 $InspectionModel = $this->loadModel('InspectionModel');
					$checker=$InspectionModel-> loadChecker();
					$vehicle=$InspectionModel-> loadVehicle();
					$list=$InspectionModel-> selectDatainspect($id);
					
					//print_r($list);
					
					foreach ($list as $app) { 
							if (isset($app->checkerid))  $checkerid= $app->checkerid;	
							if (isset($app->vid))  $vid= $app->vid;
							if (isset($app->tyre))  $tyre= $app->tyre;
							if (isset($app->internal))  $internal= $app->internal;
							if (isset($app->external))  $external= $app->external;
							if (isset($app->engineoillight))  $engineoillight= $app->engineoillight;
							if (isset($app->brakeLight))  $brakeLight= $app->brakeLight;
							if (isset($app->dateInspect))  $dateInspect= $app->dateInspect;
							if (isset($app->remarks))  $remarks= $app->remarks;
							if (isset($app->vehiclename))  $vehiclename= $app->vehiclename;
							
							
					}
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/inspection/update.php';
					

					//$InspectionModel->deleteInspection($id);
				

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
	
	public function deleteInspection()
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
			
					
					  if(isset($_GET["id"])){
						    $id = $_GET["id"];
					  }else{
						    $id = '';
					  }
					  
					 
				
					 
					
					$InspectionModel = $this->loadModel('InspectionModel');
					$InspectionModel->deleteInspection($id);
				

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
    public function AddInspection()
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
					  if(isset($_POST["vehicle"])){
						    $vehicle = $_POST["vehicle"];
					  }else{
						    $vehicle = '';
					  }
					  if(isset($_POST["checker"])){
						    $checker = $_POST["checker"];
					  }else{
						    $checker = '';
					  }
					  
					  if(isset($_POST["internal"])){
						    $internal = $_POST["internal"];
					  }else{
						    $internal = '';
					  }
					  if(isset($_POST["external"])){
						    $external = $_POST["external"];
					  }else{
						    $external = '';
					  }
					  if(isset($_POST["engine"])){
						    $engine = $_POST["engine"];
					  }else{
						    $engine = '';
					  }
					  if(isset($_POST["break"])){
						    $break = $_POST["break"];
					  }else{
						    $break = '';
					  }
					  
					  if(isset($_POST["idate"])){
						    $idate = $_POST["idate"];
					  }else{
						    $idate = '';
					  }
					  
					  if(isset($_POST["tyre"])){
						    $tyre = $_POST["tyre"];
					  }else{
						    $tyre = '';
					  }
					  
					  if(isset($_POST["remarks"])){
						    $remarks = $_POST["remarks"];
					  }else{
						    $remarks = '';
					  }
					  
					  
				
					 
	
					$InspectionModel = $this->loadModel('InspectionModel');
					$list1 = $InspectionModel-> AddInspection($checker,$vehicle,$internal,$external,$engine,$break,$idate,$remarks,$tyre);
					echo "Create Successfully!";
					
					
					//print_r($list1);
					//		require 'application/views/inspection/Inspection.php';

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
	 public function SaveRemark()
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

				
				 print_r($_POST);
				 if(isset($_POST['ed'])){$ed=$_POST['ed'];}else{$ed='';}		
				 if(isset($_POST['sd'])){$sd=$_POST['sd'];}else{$sd='';}
				 if(isset($_POST['stime'])){$stime=$_POST['stime'];}else{$stime='';}		
				 if(isset($_POST['etime'])){$etime=$_POST['etime'];}else{$etime='';}	
				 if(isset($_POST['id'])){$id=$_POST['id'];}else{$id='';}	
				 if(isset($_POST['vid'])){$vid=$_POST['vid'];}else{$vid='';}	

					$start =$sd ." ".$stime.":00";
				  	$end =$ed ." ".$etime.":00";
				 
					if(isset($_POST['vid'])){$vid=$_POST['vid'];}else{$vid='';}		
					if(isset($_POST['remarks'])){$remarks=$_POST['remarks'];}else{$remarks='';}	
					//$start=$date;
					//$remarks=preg_replace('/[^A-Za-z0-9\-]/', '', $remarks);	
					$ReportModel = $this->loadModel('ReportModel');
					$ReportModel->insertdata($start , $end, $vid,$remarks);
					
					
					$st=0;					
					$dashboard_model->updatestatus($st,$vid);
					
					$InspectionModel = $this->loadModel('InspectionModel');
					$InspectionModel->UpdateStatus($id);
					
				$list1=$InspectionModel->RejectRequest($start,$end , $vid);
					//print_r($list1);
					foreach ($list1 as $app) { 					
						if (isset($app->rid))  $rid= $app->rid;							
						if (isset($app->vehicleid))  $vid= $app->vehicleid;							
						$InspectionModel->UpdateRejectRequest($rid);
					
					}
						$InspectionModel->UpdateRejectVehicle($vid);
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
	
	 public function SaveApproved()
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

				
				
				 
					$id=$_POST["id"];
					$InspectionModel = $this->loadModel('InspectionModel');
					$InspectionModel->UpdateStatus($id);
					
					
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
