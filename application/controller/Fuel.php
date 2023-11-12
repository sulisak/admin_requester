<?php
Session_Start();
 if(isset($_SESSION['SESS_MEMBER_POS'] )){
 if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){


class Fuel extends Controller
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
					//$checker=$InspectionModel-> loadChecker();
					$vehicle=$InspectionModel-> loadVehicle();
					
				
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/fuel/index.php';
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
	
    public function LoadFuel()
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
			
					
					 
	
					$FuelModel = $this->loadModel('FuelModel');
					$list1 = $FuelModel->LoadFuel();
					//print_r($list1);
					require 'application/views/fuel/fuel.php';

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
    public function loadmileage()
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
					  
					$FuelModel = $this->loadModel('FuelModel');
					
					 
					 $totalfuel=0;
					 $totalfuel= $mileagelist= $FuelModel->checkIfHave($id);
					 
					 if($totalfuel==0){
						  $mileagelist= $FuelModel->loadmileage($id);
						  foreach ($mileagelist as $app) { 
							if (isset($app->mileage)){  $mileage= $app->mileage;}else{$mileage="";}									
						  }
					 }else{
						 $mileagelist= $FuelModel->loadlastfuel($id);
						 foreach ($mileagelist as $app) { 
							if (isset($app->newMileage)){  $mileage= $app->newMileage;}else{$mileage="";}	
						  }
					 }
					 
				    echo 	$mileage;
					
					
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
	
    public function loaddistance()
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
					  
					$FuelModel = $this->loadModel('FuelModel');				
					 
					 $totalfuel=0;
					 $totalfuel= $mileagelist= $FuelModel->checkIfHave($id);
					 
					 if($totalfuel==0){
						  $mileage=0;
					 }else{
						 $mileagelist= $FuelModel->loadlastfuel($id);
						   foreach ($mileagelist as $app) { 
							if (isset($app->mileage)){  $mileage= $app->mileage;}else{$mileage="";}	
						}
					 }
					 
				    
					
					 
						
						
					  
				
					  
					  
					  
					echo 	$mileage;
					
					
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
					  if(isset($_POST["driver"])){
						    $driver = $_POST["driver"];
					  }else{
						    $driver = '';
					  }
					  
					  if(isset($_POST["ddate"])){
						    $ddate = $_POST["ddate"];
					  }else{
						    $ddate = '';
					  }
					  if(isset($_POST["gas"])){
						    $gas = $_POST["gas"];
					  }else{
						    $gas = '';
					  }
					  if(isset($_POST["amount"])){
						    $amount = $_POST["amount"];
					  }else{
						    $amount = '';
					  }
					  if(isset($_POST["oil"])){
						    $oil = $_POST["oil"];
					  }else{
						    $oil = '';
					  }
					  if(isset($_POST["liter"])){
						    $liter = $_POST["liter"];
					  }else{
						    $liter = '';
					  }
					  if(isset($_POST["mileage"])){
						    $mileage = $_POST["mileage"];
					  }else{
						    $mileage = '';
					  }
					  
					 
	
						$FuelModel = $this->loadModel('FuelModel');
					$FuelModel-> UpdateFuel($vehicle,$driver,$ddate,$gas,$amount,$oil,$liter,$mileage,$id);
					
					 echo '
					 <script>
							alert("Update Successfully!");
							window.location.href ="'. URL .'Fuel";
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
	
	
	
    public function UpdateFuel()
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
					$vehicle=$InspectionModel-> loadVehicle();
					$FuelModel = $this->loadModel('FuelModel');
					$list=$FuelModel->LoadFuelbyid($id);
					
				///	print_r($list);
					
					foreach ($list as $app) { 
						if (isset($app->id)){  $id= $app->id;}else{$id="";}	
						  if (isset($app->vid)) { $vid= $app->vid;	}else{$vid="";}
							if (isset($app->driver)){  $driver= $app->driver;	}else{$driver="";}
							if (isset($app->fdate)){  $fdate= $app->fdate;	}else{$fdate="";}
							if (isset($app->GasStation)){  $GasStation= $app->GasStation;}else{$GasStation="";}	
							if (isset($app->Amount)){  $Amount= $app->Amount;	}else{$Amount="";}
							if (isset($app->oilprice)) { $oilprice= $app->oilprice;	}else{$oilprice="";}
							if (isset($app->liter)){  $liter= $app->liter;	}else{$liter="";}
							if (isset($app->mileage)) { $mileage= $app->mileage;	}else{$mileage="";}
							if (isset($app->color)) { $color= $app->color;	}else{$color="";}
							if (isset($app->plate)) { $plate= $app->plate;	}else{$plate="";}
							if (isset($app->maker)) { $maker= $app->maker;	}else{$maker="";}
							if (isset($app->model))  {$model= $app->model;	}else{$model="";}
							if (isset($app->mileage))  {$mileage= $app->mileage;	}else{$mileage="";}
							if (isset($app->vyear )) { $vyear = $app->vyear ;	}else{$vyear="";}
					
				
							
					}
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/fuel/update.php';
					

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
	
	public function deleteFuel()
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
					  
					 
				
					 
					
						$FuelModel = $this->loadModel('FuelModel');
					$FuelModel->deleteFuel($id);
				

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
    public function AddFuel()
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
					  if(isset($_POST["driver"])){
						    $driver = $_POST["driver"];
					  }else{
						    $driver = '';
					  }
					  
					  if(isset($_POST["ddate"])){
						    $ddate = $_POST["ddate"];
					  }else{
						    $ddate = '';
					  }
					  if(isset($_POST["gas"])){
						    $gas = $_POST["gas"];
					  }else{
						    $gas = '';
					  }
					  if(isset($_POST["amount"])){
						    $amount = $_POST["amount"];
					  }else{
						    $amount = '';
					  }
					  if(isset($_POST["oil"])){
						    $oil = $_POST["oil"];
					  }else{
						    $oil = '';
					  }
					  if(isset($_POST["liter"])){
						    $liter = $_POST["liter"];
					  }else{
						    $liter = '';
					  }
					  if(isset($_POST["mileage"])){
						    $mileage = $_POST["mileage"];
					  }else{
						    $mileage = '';
					  }
					  if(isset($_POST["newMil"])){
						    $newMil = $_POST["newMil"];
					  }else{
						    $newMil = '';
					  }
					  
					  $distance=  $newMil - $mileage ;
					  
					   $fueldis=$distance/$liter;
					 
	
					$FuelModel = $this->loadModel('FuelModel');
					$FuelModel-> AddFuel($vehicle,$driver,$ddate,$gas,$amount,$oil,$liter,$mileage, $distance,  $newMil,  $fueldis);
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
