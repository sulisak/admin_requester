<?php
Session_Start();
 
 


class MeetingRoom extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */

 		public function CancelRoom()
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

				
				if(isset($_GET['rbid'])){
					$rbid=$_GET['rbid'];
				}else{
					$rbid=0;
				}
				
				//echo $rid;
				$MeetingModel = $this->loadModel('MeetingModel');
				$MeetingModel->CancelRoom($rbid);
					echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("Cancelled Successfully!");
									 window.location.href ="'. URL .'MeetingRoom/index";
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



	public function Checkout()
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

				
				if(isset($_GET['rbid'])){
					$rbid=$_GET['rbid'];
				}else{
					$rbid=0;
				}
				
				//echo $rid;
				$MeetingModel = $this->loadModel('MeetingModel');
				$MeetingModel->Checkout($rbid);
					echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("Checkout Successfully!");
									 window.location.href ="'. URL .'MeetingRoom/index";
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



public function CompletedRoom()
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

				
				if(isset($_GET['rbid'])){
					$rbid=$_GET['rbid'];
				}else{
					$rbid=0;
				}
				
				//echo $rid;
				$MeetingModel = $this->loadModel('MeetingModel');
				$MeetingModel->CompletedRoom($rbid);
					echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("Cancelled Successfully!");
									 window.location.href ="'. URL .'MeetingRoom/index";
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


public function CheckinRoom()
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

				
				if(isset($_GET['rbid'])){
					$rbid=$_GET['rbid'];
				}else{
					$rbid=0;
				}
				
				//echo $rid;
				$MeetingModel = $this->loadModel('MeetingModel');
				$MeetingModel->CheckinRoom($rbid);
					echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("Checkin Room Successfully!");
									 window.location.href ="'. URL .'MeetingRoom/index";
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

public function CheckoutRoom()
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

				
				if(isset($_GET['rbid'])){
					$rbid=$_GET['rbid'];
				}else{
					$rbid=0;
				}
				
				//echo $rid;
				$MeetingModel = $this->loadModel('MeetingModel');
				$MeetingModel->CheckoutRoom($rbid);
					echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("Checkout Room Successfully!");
									 window.location.href ="'. URL .'MeetingRoom/index";
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




      public function LoadRoombyuser()
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

				
						$BookroomModel = $this->loadModel('BookroomModel');
						
						$listuserrequest=$BookroomModel->getbookroombyuser($userId);
						
					//$checker=$InspectionModel-> loadChecker();
					
					// print_r($listuserrequest);  // check data in array
				
				
				require 'application/views/meetingroom/list.php';

				
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

						$BookroomModel = $this->loadModel('BookroomModel');
						$listroom=$BookroomModel-> getroom();
						// $listuserrequest=$BookroomModel->getbookroombyuser($userId);
						$listallrequestroom=$BookroomModel->getReserveRoom();

						// print_r($listallrequestroom);
						// add new =============
						// $listallusers_request=$BookroomModel->getReserveRoom();
						// print_r($listallusers_request);
					
					
						 $today =date("Y-m-d H:i:s");
							
					
					$today =date("Y-m-d H:i:s");	
				$today = date("Y-m-d H:i:s", strtotime($today . ' -15 minutes'));
				    $list=	$BookroomModel->selectCancell($today);
					  foreach ($list as $app) { 
				              if (isset($app->startdate)){  $startdate= $app->startdate;}else{$startdate="";}	
				            	$BookroomModel->getCancell($startdate);				
					  }
					
					
			    	$todaycomplete =date("Y-m-d H:i:s");					
					$BookroomModel-> UpdateComplete($todaycomplete);	
					
				
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				
				// require 'application/views/meetingroom/index.php';
				require 'application/views/meetingroom/index.php';

				
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
    public function loadRoom()
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

				
						$MeetingModel = $this->loadModel('MeetingModel');
						$list = $MeetingModel->getData();
						//print_r($list);
						require 'application/views/meetingroom/room.php';
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
	
    public function AddRoom()
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
					$room =$_POST["room"];
					$inc =$_POST["inc"];
					$room =strtoupper($room);
					$MeetingModel = $this->loadModel('MeetingModel');
					$totalroom=0;
					$totalroom =$MeetingModel->checkroom($room);
					//echo $totalroom.$room;
					if($totalroom ==0){
						$MeetingModel->insertroom($room,$inc);
						echo "<i style='color:green'>Create Successfully</i>";
					}else{
						echo "<i style='color:red'>Already Exits!</i>";
					}
					
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
	
    
    public function UpdateRoom()
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

					//print_r($_GET);
					$room =$_GET["name"];
					$id =$_GET["id"];
					$inc =$_GET["inc"];
					$room =strtoupper($room);
					
					
					
					$MeetingModel = $this->loadModel('MeetingModel');
					//$totalroom=0;
					///$totalroom =$MeetingModel->checkroomid($room, $id);
					
					//echo $totalroom.$room;
					///if($totalroom ==0){
						// $MeetingModel->insertroom($room);
						//$totalroom1=0;
						 //$totalroom1 =$MeetingModel->checkroomidnot($room, $id);
					//	if($totalroom1 ==0){
							$MeetingModel->updateroom($room, $id, $inc);
							echo "Update Successfully!";
					//}else{
					///		echo "Already Exits!";
					//}
						
					//}else{
						
					//		echo "Update Successfully!";
						
					//}
					
					
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
    public function DeleteRoom()
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

					
					$id =$_GET["id"];			
					$MeetingModel = $this->loadModel('MeetingModel');					
					$MeetingModel->deleteroom( $id);
					
					
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
