<?php
Session_Start();
 // if(isset($_SESSION['SESS_MEMBER_POS'])){
 // if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){


class BusinessUnit extends Controller
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

				
					
				
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/company/index.php';
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
	
    public function LoadCompany()
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
			
					
					 
					  
				
					 
	
					$CompanyModel = $this->loadModel('CompanyModel');
					$list1 = $CompanyModel->loadCompany();
					//print_r($list1);
					require 'application/views/company/company.php';

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
			
					
					//print_r($_GET);				
					if(isset($_GET["id"])){  $id = $_GET["id"];  }else{  $id = ''; }
					if(isset($_GET["dep"])){  $dep = $_GET["dep"];  }else{  $dep = ''; }
					$CompanyModel = $this->loadModel('CompanyModel');
					$totaldep = 0;
					 $dep=strtoupper($dep);
					$totaldep = $CompanyModel->CheckdepartmentandID($id,$dep);
					if($totaldep ==0){
						$totaldep1=0;
						$totaldep1 = $CompanyModel->CheckdepartmentandnotID($id,$dep);
						if($totaldep1==0){
							$CompanyModel->UpdateDep($dep,$id);
							echo "Update Successfully!";
						}else{
							//exist
							echo "Already Exit!";
						}
					}else{
						//exit
						echo "exit";
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
	
	
	
   
	
	public function deleteDep()
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
					  
					 
				
					 
					
					$CompanyModel = $this->loadModel('CompanyModel');
					$CompanyModel->DeleteDep($id);
				

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
    public function AddCompany()
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
					
					  if(isset($_POST["dep"])){
						    $dep = $_POST["dep"];
					  }else{
						    $dep = '';
					  }
					 $dep=strtoupper($dep);
					 $totaldep=0;
					 $CompanyModel = $this->loadModel('CompanyModel');
					 $totaldep=$CompanyModel->Checkcompany($dep);
					 if($totaldep==0){
						 $CompanyModel->Addcompany($dep);
						 echo "<i style='color:green'>Create Successfully!</i>";
					 }else{
						 echo "<i style='color:red'>Already Exit!</i>";
					 }
	
				//	$InspectionModel = $this->loadModel('InspectionModel');
				///	$list1 = $InspectionModel-> AddInspection($checker,$vehicle,$internal,$external,$engine,$break,$idate,$remarks,$tyre);
					
					
					
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
// }
// }else{
// 					session_unset();
// 					session_destroy();
					
					
// 						echo ' 
// 						<script src="'. URL .'public/js/jquery.js"></script>
// 						<script>
// 							 window.location.href ="'. URL .'";
// 								</script>	
// 					';
// 				}
?>
