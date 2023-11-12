<?php
Session_Start();


class BookRoom extends Controller
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

				
					$BookroomModel = $this->loadModel('BookroomModel');
					
					$list=$BookroomModel-> getUser();
					
				// 	print_r($list);
					$listroom=$BookroomModel-> getroom();
					
					
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
					require 'application/views/bookroom/index.php';
					
					
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
	   public function addRoom()
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
					$requestor=$_POST["requestor"];
					$room=$_POST["room"];
					$purpose=$_POST["purpose"];
					$participant=$_POST["participant"];
					$sd=$_POST["sd"]." ".$_POST["st"];
					$ed=$_POST["ed"]." ".$_POST["et"];
					$remarks=$_POST["remarks"];
					$inclusions=$_POST["inclusions"];
					
					$BookroomModel = $this->loadModel('BookroomModel');
					$createuser=$userId;
					$av=0;
					$av = $BookroomModel-> CheckDateRange($sd, $ed,$room);
					if($av==0){
						$BookroomModel->insertData($sd, $ed, $room, $purpose, $participant, $remarks, $createuser, 
						$requestor, $inclusions );

						
						echo "<i style='color:green;font-size:16px'>Create Successfully!</i>";
					}else{
						echo "
								<i style='color:red;font-size:16px'>This Date and Time is not available! other staff booked already</i>
							";
					}
					$today =date("Y-m-d H:i:s");	
					$today = date("Y-m-d H:i:s", strtotime($today . ' -15 minutes'));
				    $list=	$BookroomModel->selectCancell($today);
					  foreach ($list as $app) { 
				              if (isset($app->startdate)){  $startdate= $app->startdate;}else{$startdate="";}	
				            	$BookroomModel->getCancell($startdate);				
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
   
	   public function LoadReserveRoom()
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
						$BookroomModel = $this->loadModel('BookroomModel');
					$today =date("Y-m-d H:i:s ");
					$today = date("Y-m-d H:i:s ", strtotime($today . ' -15 minutes'));			
					$BookroomModel->getCancell($today);	
					
					
				
					$list = $BookroomModel-> getReserveRoom_byuser($userId);
				// 	print_r($list);
					
					require 'application/views/bookroom/room.php';
					
					
		
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
	
	public function DeleteBooked()
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
					$BookroomModel = $this->loadModel('BookroomModel');
					$BookroomModel-> deleteRoom($id);
						$roomName="";
						$roomName=$BookroomModel->getroomName($id);
					                                        	
					                                        	
					                                        	$subject = "Reject Requested Room";
																$header  = 'MIME-Version: 1.0' . "\r\n";
																$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
																$header .= "From:AIF GROUP EMAIL AUTOMATION";
																$message1 = '<html xmlns="http://www.w3.org/1999/xhtml">
																	<head>
																		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
																		<title>Approved Request Vehicle </title>
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
																								<img src="https://aifgrouplaos.la/public/img/aif_favicon.png" alt="Logo"/>
																						<br>
																						<h4>"Reject Requested Room</h4>
																						============================================================================
																						
																						</td>
																					</tr>
																					
																					
																				   <tr>
																					<td>
																					<table style="padding: 0px 30px 0px 30px;">											
																						<tr class="service">
																						<td ><b>Room: </b> '.($roomName).'</td>															
																						</tr>												
																						<tr class="service">
																						<td ><b>Rejected: </b> '.($_SESSION["SESS_MEMBER_Fname"]).'</td>															
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
																	$RequestModel = $this->loadModel('RequestModel');
																	$Email="";
																	$Email=$RequestModel->getEmail($userid);
																	mail($Email,$subject,$message1,$header);
																	
                                        					        $listemail=$RequestModel->loadUsersAdmin();		
        			                                            	foreach ($listemail as $app) { 
        				                                            	if (isset($app->Email ))  $adminEmail = $app->Email ;	
        			                                            	    	mail($adminEmail,$subject,$message1,$header);
        			                                            	}
					
					
					
					
					
					//echo $endtime ;
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
   
	
	

 public function getInclusion()
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
					$list= $MeetingModel->getInclusion($id);
					//print_r($list);
					 foreach ($list as $app) { 
					  if (isset($app->INCLUSIONS)) { echo  $INCLUSIONS= $app->INCLUSIONS;	}else{$INCLUSIONS="";}
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
	
	// <!-- add new 03-06-21 ---------------------------------------------------------- -->
	public function viewbookroomselect()
    {		 
		
		
		
		 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
			if($Sid=="" ){
					$LoginModel = $this->loadModel('LoginModel');
					// $companylist = $LoginModel->getCompany();									
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
					// $list= $MeetingModel->getbookroombyuser($id);
					$list= $MeetingModel->viewbookroomselect($id);
					//print_r($list);
					 foreach ($list as $app) { 
					  if (isset($app->INCLUSIONS)) { echo  $INCLUSIONS= $app->INCLUSIONS;	}else{$INCLUSIONS="";}
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
	
	// <!-- add new 03-06-21 ------------------------------------------------------------>
	
	
	
}







