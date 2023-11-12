<?php
Session_Start();
 if(isset($_SESSION['SESS_MEMBER_POS'] )){
 if($_SESSION['SESS_MEMBER_POS'] =="Administration"){


class Maintainance extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
     
     
     	
    public function AddPhotopro()
    {		 
		
		
		
		 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
			if($Sid=="" ){
														
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
			//	$name=$_POST["name"];
				$img = $_FILES['img'];
				function reArrayFiles($file)
				{
					$file_ary = array();
					$file_count = count($file['name']);
					$file_key = array_keys($file);
				   
					for($i=0;$i<$file_count;$i++)
					{
						foreach($file_key as $val)
						{
							$file_ary[$i][$val] = $file[$val][$i];
						}
					}
					return $file_ary;
				}
				

				if(!empty($img))
				{
				$img_desc = reArrayFiles($img);
			//print_r($img_desc);
			   	$MaintainanceModel= $this->loadModel('MaintainanceModel');
				foreach($img_desc as $val)
				{
					$newname = date('YmdHis',time()).mt_rand().'.jpg';
					move_uploaded_file($val['tmp_name'],'public/img/maintainance/'.$newname);
					 $id=$_POST["id"];
					 $MaintainanceModel->insertphoto($id,$newname);
				}
				}
					
				echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("Upload Successfully!!");
									 window.location.href ="'. URL .'Maintainance/LoadPicture?id='.$id.'";
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
					//$checker=$InspectionModel-> loadChecker();
					$vehicle=$InspectionModel-> loadVehicle();
					
				
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/maintainance/index.php';
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
	
	
	public function LoadPicture()
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
			        
				    print_r($_GET);	
				     if(isset($_GET["id"])){
						    $id = $_GET["id"];
					  }else{
						    $id = '';
					  }
				$id=$_GET["id"];	
				$MaintainanceModel = $this->loadModel('MaintainanceModel');
				$list =$MaintainanceModel ->loaddatapic($id);	  
				
                require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/maintainance/upload.php';
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
	
	
    public function LoadMaintainance()
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
					  
					  
				
					 
	
					$MaintainanceModel = $this->loadModel('MaintainanceModel');
					$list1 = $MaintainanceModel->LoadMaintainance();
					//print_r($list1);
					require 'application/views/maintainance/maintain.php';

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
					  
					 
				
					 $user=$_SESSION['SESS_MEMBER_ID'];
					
					$MaintainanceModel = $this->loadModel('MaintainanceModel');
					$MaintainanceModel->UpdateStatus($id,$user);
				

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
					  if(isset($_POST["date"])){
						    $date = $_POST["date"];
					  }else{
						    $date = '';
					  }
					  if(isset($_POST["vehicle"])){
						    $vehicle = $_POST["vehicle"];
					  }else{
						    $vehicle = '';
					  }
					  
					  if(isset($_POST["location"])){
						    $location = $_POST["location"];
					  }else{
						    $location = '';
					  }
					  if(isset($_POST["amount"])){
						    $amount = $_POST["amount"];
					  }else{
						    $amount = '';
					  }
					  if(isset($_POST["purpose"])){
						    $purpose = $_POST["purpose"];
					  }else{
						    $purpose = '';
					  }
					  
					  
				
					 
				
					$MaintainanceModel = $this->loadModel('MaintainanceModel');
					$user=$_SESSION['SESS_MEMBER_ID'];
					//$MaintainanceModel->InserVr($vr, $date, $vehicle, $location, $amount, $purpose, $user);
						
					
					
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
	
	
	
    public function UpdateMaintainance()
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
					//$checker=$InspectionModel-> loadChecker();
					$vehicle=$InspectionModel-> loadVehicle();
					
					$MaintainanceModel = $this->loadModel('MaintainanceModel');
					$list=$MaintainanceModel-> selectData($id);
					
				//	print_r($list);
					
					foreach ($list as $app) { 
							  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
							  if (isset($app->reqnum)) { $reqnum= $app->reqnum;	}else{$reqnum="";}
								if (isset($app->rid)){  $rid= $app->rid;	}else{$rid="";}
								if (isset($app->rdate)){  $rdate= $app->rdate;	}else{$rdate="";}
								if (isset($app->location)){  $location= $app->location;}else{$location="";}	
								if (isset($app->cost)){  $cost= $app->cost;	}else{$cost="";}
								if (isset($app->purpose)) { $purpose= $app->purpose;	}else{$purpose="";}
								if (isset($app->approved)){  $approved= $app->approved;	}else{$approved="";}
								if (isset($app->vid)) { $vid= $app->vid;	}else{$vid="";}
								if (isset($app->requestor)) { $requestor= $app->requestor;	}else{$requestor="";}
								if (isset($app->approval)) { $approval= $app->approval;	}else{$approval="";}
								if (isset($app->status)) { $status= $app->status;	}else{$status="";}
								if (isset($app->vyear)) { $vyear= $app->vyear;	}else{$vyear="";}
								if (isset($app->color)) { $color= $app->color;	}else{$color="";}
								if (isset($app->plate)) { $plate= $app->plate;	}else{$plate="";}
								if (isset($app->maker)) { $maker= $app->maker;	}else{$maker="";}
								if (isset($app->model)) { $model= $app->model;	}else{$model="";}
							
							
					}
					require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/maintainance/update.php';
					

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
	 public function  DeletePhoto()
    {		 
		
		
		
		 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
			if($Sid=="" ){
														
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
				$id=$_GET["id"];
				$MaintainanceModel = $this->loadModel('MaintainanceModel');
				$list =$MaintainanceModel ->getPic($id);
				foreach ($list as $app) { 						  
				 if (isset($app->photo))  {$photo= $app->photo;	}else{$photo= "";	}
					unlink("public/img/maintainance/".$photo."");
					$MaintainanceModel ->deletePhoto($id);
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
	

	public function deleteMaintainance()
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
					  
					 
				
					 
					
					$MaintainanceModel = $this->loadModel('MaintainanceModel');
					$MaintainanceModel->deleteMaintainance($id);
				

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
    public function AddMaintainance()
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
					$digits = 5;
					$rr=rand(pow(10, $digits-1), pow(10, $digits)-1);					
					$vr="VR".$rr;
					//print_r($_POST);
					  if(isset($_POST["date"])){
						    $date = $_POST["date"];
					  }else{
						    $date = '';
					  }
					  if(isset($_POST["vehicle"])){
						    $vehicle = $_POST["vehicle"];
					  }else{
						    $vehicle = '';
					  }
					  
					  if(isset($_POST["location"])){
						    $location = $_POST["location"];
					  }else{
						    $location = '';
					  }
					  if(isset($_POST["amount"])){
						    $amount = $_POST["amount"];
					  }else{
						    $amount = '';
					  }
					  if(isset($_POST["purpose"])){
						    $purpose = $_POST["purpose"];
					  }else{
						    $purpose = '';
					  }
					  
					  
				
					 
					$totalUser=0;
					$MaintainanceModel = $this->loadModel('MaintainanceModel');
					$totalUser=$MaintainanceModel->CheckVR($vehicle, $date);
					
					if($totalUser==0){
						$user=$_SESSION['SESS_MEMBER_ID'];
						$MaintainanceModel->InserVr($vr, $date, $vehicle, $location, $amount, $purpose, $user);
						
					    echo "<i style='color:green'>Create Successfully!</i>";
					}else{
						echo "<i style='color:red'>Already Exist!</i>";
					}
					
					
					//$list1 = $InspectionModel-> AddInspection($checker,$vehicle,$internal,$external,$engine,$break,$idate,$remarks,$tyre);
					//echo "Create Successfully!";
					
					
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
