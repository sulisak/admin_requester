<?php
Session_Start();
 if(isset($_SESSION['SESS_MEMBER_POS'] )){
 if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){


class Takecar extends Controller
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

				
					$TakecarModel = $this->loadModel('TakecarModel');
					$checker=$TakecarModel-> loadChecker();
					$vehicle=$TakecarModel-> loadVehicle();
					
				
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/request/historylist.php';
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

    public function Loadcar()
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
				$dashboard_model = $this->loadModel('TakecarModel');
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
					  
					  
				
					 
	
					$TakecarModel = $this->loadModel('TakecarModel');
					$list1 = $TakecarModel->selectDatacar($start, $end);
					//print_r($list1);
					require 'application/views/takecar/Takecar.php';

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
					  
					 
				
					 
					
					$TakecarModel = $this->loadModel('TakecarModel');
					$TakecarModel->UpdateStatus($id);
					
					
					
				

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
	
	
	
    public function Updatecar()
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
					  
					 
				
					 $TakecarModel = $this->loadModel('TakecarModel');
					// $checker=$TakecarModel-> loadChecker();
					$vehicle=$TakecarModel-> loadVehicle();
					$list=$TakecarModel-> selectDatacar($id);
					
					//print_r($list);
					
					foreach ($list as $app) { 
							
							if (isset($app->vid))  $vid= $app->vid;
							
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
				require 'application/views/takecar/update.php';
					

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
					  
					 
				
					 
					
					$TakecarModel = $this->loadModel('TakecarModel');
					$TakecarModel->deleteInspection($id);
				

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


//==================================================










 //    public function AddInspection()
 //    {		 
		
		
		
	// 	 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
	// 		if($Sid=="" ){
	// 				$LoginModel = $this->loadModel('LoginModel');
	// 				$companylist = $LoginModel->getCompany();									
	// 				require 'application/views/login/index.php';
	// 		}else{
				
	// 			date_default_timezone_set('Asia/Bangkok'); 
	// 			$date =date("Y-m-d");			
	// 			$userId=$Sid;
	// 			$token=$_SESSION['SESS_MEMBER_unique'];
	// 			$dashboard_model = $this->loadModel('DashboardModel');
	// 			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
	// 			//echo $LogUser;
	// 			if ($LogUser==1){	
			
	// 				//print_r($_POST);
	// 				  if(isset($_POST["vehicle"])){
	// 					    $vehicle = $_POST["vehicle"];
	// 				  }else{
	// 					    $vehicle = '';
	// 				  }
	// 				  if(isset($_POST["checker"])){
	// 					    $checker = $_POST["checker"];
	// 				  }else{
	// 					    $checker = '';
	// 				  }
					  
	// 				  if(isset($_POST["internal"])){
	// 					    $internal = $_POST["internal"];
	// 				  }else{
	// 					    $internal = '';
	// 				  }
	// 				  if(isset($_POST["external"])){
	// 					    $external = $_POST["external"];
	// 				  }else{
	// 					    $external = '';
	// 				  }
	// 				  if(isset($_POST["engine"])){
	// 					    $engine = $_POST["engine"];
	// 				  }else{
	// 					    $engine = '';
	// 				  }
	// 				  if(isset($_POST["break"])){
	// 					    $break = $_POST["break"];
	// 				  }else{
	// 					    $break = '';
	// 				  }
					  
	// 				  if(isset($_POST["idate"])){
	// 					    $idate = $_POST["idate"];
	// 				  }else{
	// 					    $idate = '';
	// 				  }
					  
	// 				  if(isset($_POST["tyre"])){
	// 					    $tyre = $_POST["tyre"];
	// 				  }else{
	// 					    $tyre = '';
	// 				  }
					  
	// 				  if(isset($_POST["remarks"])){
	// 					    $remarks = $_POST["remarks"];
	// 				  }else{
	// 					    $remarks = '';
	// 				  }
					  
					  
				
					 
	
	// 				$TakecarModel = $this->loadModel('TakecarModel');
	// 				$list1 = $TakecarModel-> AddInspection($checker,$vehicle,$internal,$external,$engine,$break,$idate,$remarks,$tyre);
	// 				echo "Create Successfully!";
					
					
	// 				//print_r($list1);
	// 				//		require 'application/views/inspection/Inspection.php';

	// 			}else{
	// 				session_unset();
	// 				session_destroy();
					
					
	// 					echo ' 
	// 					<script src="'. URL .'public/js/jquery.js"></script>
	// 					<script>
	// 								alert("logging off");
	// 								 window.location.href ="'. URL .'";
	// 							</script>	
	// 				';
	// 			}	
	// 		}	
		
	// }
	//  public function SaveRemark()
 //    {		 
		
		
		
	// 	 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
	// 		if($Sid=="" ){
	// 				$LoginModel = $this->loadModel('LoginModel');
	// 				$companylist = $LoginModel->getCompany();									
	// 				require 'application/views/login/index.php';
	// 		}else{
				
	// 			date_default_timezone_set('Asia/Bangkok'); 
	// 			$date =date("Y-m-d");			
	// 			$userId=$Sid;
	// 			$token=$_SESSION['SESS_MEMBER_unique'];
	// 			$dashboard_model = $this->loadModel('DashboardModel');
	// 			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
	// 			//echo $LogUser;
	// 			if ($LogUser==1){	

				
	// 			 print_r($_POST);
	// 			 if(isset($_POST['ed'])){$ed=$_POST['ed'];}else{$ed='';}		
	// 			 if(isset($_POST['sd'])){$sd=$_POST['sd'];}else{$sd='';}
	// 			 if(isset($_POST['stime'])){$stime=$_POST['stime'];}else{$stime='';}		
	// 			 if(isset($_POST['etime'])){$etime=$_POST['etime'];}else{$etime='';}	
	// 			 if(isset($_POST['id'])){$id=$_POST['id'];}else{$id='';}	
	// 			 if(isset($_POST['vid'])){$vid=$_POST['vid'];}else{$vid='';}	

	// 				$start =$sd ." ".$stime.":00";
	// 			  	$end =$ed ." ".$etime.":00";
				 
	// 				if(isset($_POST['vid'])){$vid=$_POST['vid'];}else{$vid='';}		
	// 				if(isset($_POST['remarks'])){$remarks=$_POST['remarks'];}else{$remarks='';}	
	// 				//$start=$date;
	// 				//$remarks=preg_replace('/[^A-Za-z0-9\-]/', '', $remarks);	
	// 				$ReportModel = $this->loadModel('ReportModel');
	// 				$ReportModel->insertdata($start , $end, $vid,$remarks);
					
					
	// 				$st=0;					
	// 				$dashboard_model->updatestatus($st,$vid);
					
	// 				$TakecarModel = $this->loadModel('TakecarModel');
	// 				$TakecarModel->UpdateStatus($id);
					
	// 			$list1=$TakecarModel->RejectRequest($start,$end , $vid);
	// 				//print_r($list1);
	// 				foreach ($list1 as $app) { 					
	// 					if (isset($app->rid))  $rid= $app->rid;							
	// 					if (isset($app->vehicleid))  $vid= $app->vehicleid;							
	// 					$TakecarModel->UpdateRejectRequest($rid);
					
	// 				}
	// 					$TakecarModel->UpdateRejectVehicle($vid);
	// 			}else{
	// 				session_unset();
	// 				session_destroy();
					
					
	// 					echo ' 
	// 					<script src="'. URL .'public/js/jquery.js"></script>
	// 					<script>
	// 								alert("logging off");
	// 								 window.location.href ="'. URL .'";
	// 							</script>	
	// 				';
	// 			}	
	// 		}	
		
	// }
	
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
					$TakecarModel = $this->loadModel('TakecarModel');
					$TakecarModel->UpdateStatus($id);
					
					
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

		
				
				//===============================================================
?>
