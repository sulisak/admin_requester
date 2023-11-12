<?php
Session_Start();

class HistoryVehicle extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
	 
	  public function ApproveVehicle()
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

				
				$RequestModel = $this->loadModel('RequestModel');
				//if($_SESSION['SESS_MEMBER_POS']=="LineManager"){
					$depid=$_SESSION['SESS_MEMBER_depid'];
				    $list=$RequestModel-> requestApprovebyDep($depid);	
				//}else{
					//$list=$RequestModel-> requestApprove($userId);	
				//}
					// print_r($list);
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				// require 'application/views/request/historylist.php';
				require 'application/views/request/Approved.php';

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
	
	
	
// 	========== add new 18052023 ========================
 public function CancelledRequest()
{	
//print_r($_GET);
$rid=$_GET["id"];

$RequestModel = $this->loadModel('RequestModel');
// add new ======
// $list=$RequestModel-> requestApprove($userId);
// print_r($list);

$totalcount=0;
//$totalcount=$RequestModel->CheckStatustoDelete($rid);
//if($totalcount==0){		
$rid=$_GET["id"];
$listDetail=$RequestModel->selectrequest($rid);
// print_r($listDetail);

$type=$_GET["type"];		
$un=$_SESSION['SESS_MEMBER_Username'];
date_default_timezone_set('Asia/Bangkok'); 
$date =date("Y-m-d H:i:s");
$RequestModel->insertRequestDetails($rid, $un, $type, $date);


$driverId=0;
$vid=0;
foreach ($listDetail as $app) { 
if (isset($app->vehicleid))  $vid= $app->vehicleid;	
if (isset($app->driverId))  $driverId= $app->driverId;	
}
$st='Available';
$RequestModel->updateVehicletatusAdmin($vid, $st);
echo $driverId;


if ($driverId<>0){
$st='Available';
$RequestModel->updateDriverstatusAdmin($driverId, $st);		 
$st='Cancelled';
$RequestModel->updateRequestAdminCancel($rid, $st,$driverId);
}else{

$st='Cancelled';
$RequestModel->updateRequestAdminCancel1($rid, $st);
}

$list=$RequestModel->Requestget($rid);				
foreach ($list as $app) { 
	if (isset($app->userid ))  $userid = $app->userid ;	
	if (isset($app->vrno ))  $vrno = $app->vrno ;	
	if (isset($app->departdate ))  $departdate = $app->departdate ;	
	
	$Email=$RequestModel->getEmail($userid);
	$edate =date("Y-m-d");
	$message =' Your request  ('. $vrno.') was been  approved by The Line Manager!';
	$typeres="Line Manager";
	$RequestModel->insertnotification($rid, $userid,$message, $edate,$typeres);
	$subject = "Reject Request Vehicle";
												$header  = 'MIME-Version: 1.0' . "\r\n";
												$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
												$header .= "From:AIF GROUP EMAIL AUTOMATION";
												$message1 = '<html xmlns="http://www.w3.org/1999/xhtml">
													<head>
														<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
														<title>Reject Request Vehicle </title>
														<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
													</head>
													<body style="margin:0; padding:10px 0 0 0;" bgcolor="#F8F8F8">
													<table align="center" border="0" cellpadding="0" cellspacing="0" width="95%%">
														<tr>
															<td align="center">
																<table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
																	   style="border-collapse: separate; border-spacing: 2px 5px; box-shadow: 1px 0 1px 1px #B8B8B8;"
																	   bgcolor="#FFFFFF">
																	<tr>
																		<td align="center" style="padding: 0px 0px 0px 0x;">
																				<br><br>
																				<img src="https://aif-adminsystem.asia-erp.com/public/img/aif_favicon.png" alt="Logo"/>
																		<br>
																		<h4>Reject Request Vehicle</h4>
																		============================================================================
																		
																		</td>
																	</tr>
																	
																	
																   <tr>
																	<td>
																	<table style="padding: 0px 30px 0px 30px;">											
																		<tr class="service">
																		<td ><b>Request Code: </b> '.($vrno).'</td>															
																		</tr>												
																		<tr class="service">
																		<td ><b>Reject  by: </b> '.($_SESSION["SESS_MEMBER_Fname"]).'</td>															
																		</tr>	
																													
																		
																	
																	
																	</table>
																	
																	
																	</td>
																	</tr>
																	<tr>
																	<td style="padding: 10px 30px 40px 30px;">
																	=============================================================================
																	<br><br><br>
																	</td>
																	</tr>
																   
																</table>
															</td>
														</tr>
													</table>
													</body>
													</html>';
													
													
													mail($Email,$subject,$message1,$header);
	
	
	
}


//}


}
// 	========== add new 18052023 ========================


	 
	 
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

				
				$RequestModel = $this->loadModel('RequestModel');
				//if($_SESSION['SESS_MEMBER_POS']=="LineManager"){
				//	$depid=$_SESSION['SESS_MEMBER_depid'];
				//	$list=$RequestModel-> requestApprovebyDep($depid);	
				//}else{
					$list=$RequestModel-> requestApprove($userId);	
				//}
				// 	print_r($list);
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				// require 'application/views/request/historylist.php';
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


	   public function getVehicleinfobyuserpendingtakecar()
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

				
				$RequestModel = $this->loadModel('RequestModel');
				$list=$RequestModel-> requestApprove($userId);	


				


					// $id=$_GET["id"]; // try to drop
		
					$list=$RequestModel->getVehicleinfobyuserpendingtakecar($userId);
					//print_r($list);
					$listdriver=$RequestModel-> DriverList();
					//print_r($listdriver);
					
					
					require 'application/views/_templates/header.php';
					require 'application/views/_templates/nav.php';
					require 'application/views/request/takecar.php';
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
	
?>
