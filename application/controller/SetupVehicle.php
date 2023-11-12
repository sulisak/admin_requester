<?php
Session_Start();
 if(isset($_SESSION['SESS_MEMBER_POS'] )){
 if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){


class SetupVehicle extends Controller
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
				require 'application/views/setup/index.php';
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

  
	public function UpdateMaker()
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
				
				$SetupModel = $this->loadModel('SetupModel');
				//$list1= $SetupModel->loadVehicleMaker();
				//print_r($_GET);
				$id=$_GET['id'];
				$maker=$_GET['name'];
				$SetupModel-> UpdateMaker($id,$maker);
				echo "Update Successfully!";
				
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
	public function DeleteteMaker()
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
				
				$SetupModel = $this->loadModel('SetupModel');
				$id=$_GET['id'];
				
				$SetupModel-> deleteMaker($id);
				echo "Delete Successfully!";
				
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
	public function VehicleMaker()
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
				
				$SetupModel = $this->loadModel('SetupModel');
				$list1= $SetupModel->loadVehicleMaker();
				//print_r($list1);
				require 'application/views/setup/maker.php';
				
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
	public function VehicleMakerAdd()
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
				$maker=strtoupper($_POST["maker"]);				
				$SetupModel = $this->loadModel('SetupModel');		
				$totalUser= $SetupModel->CheckMaker($maker);
						
				if($totalUser<>0){
					echo "Already exist!";
				}else{
						sleep(1);
						$totalUser= $SetupModel->CheckMaker($maker);
						if($totalUser<>0){
							echo "Already exist!";
						}else{
						$SetupModel->insertMaker($maker);
						echo "Created Successfully!";
						}
				}
				
				
				//require 'application/views/setup/maker.php';
				
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
	
	
	
	
	  public function VehicleModel()
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
							
				//require 'application/views/_templates/header.php';
			//	require 'application/views/_templates/nav.php';
				//require 'application/views/setup/indexmodel.php';
				// print_r($_GET);
					$SetupModel = $this->loadModel('SetupModel');		
					$id=$_GET["id"];
					$makername=$SetupModel->getMakerName($id);
					echo "<h2>". $makername ."</h2>";
					$list=$SetupModel->loadVehicleModelbyMakerId($id);	
					//print_r($list);
					 $c=0;
					 
					 echo '<script src="'. URL .'public/js/bootbox.min.js"></script>
						 <script src="'. URL .'public/js/jquery.js">	</script>';
						
						
					 echo "<table class='table table-bordered' >";
					 echo "<th  width='10px'>No.</th>";
					 echo "<th>Model</th>";
					 echo "<th width='20px'>Action</th>";
					  foreach ($list as $app) { 
					  $c++;
						if (isset($app->cmid))  $cmid= $app->cmid;	
						if (isset($app->modelname))  $modelname= $app->modelname;	
					
						echo "<tr>";
						echo "<td>".$c."</td>";
						echo "<td>".$modelname."</td>";
						echo '<td>
							<button class="btn btn-xs btn-block bg-gradient-danger btn-flat deleteGroup" id="del_'.$cmid.'">
								<i class="fas fa-trash"></i> 
							</button>
							</td>';
						echo "</tR>";
					}
					echo '</table>';
					
					echo '<script>
						$(document).ready(function(){

							// Delete 
							$(".deleteGroup").click(function(){
								
								var el = this;
								var id = this.id;
								var splitid = id.split("_");

								// Delete id
								var deleteid = splitid[1];
								
										$.ajax({
											url:  "'. URL .'" + "SetupVehicle/DeleteModel",
											type: "GET",
											data: { id:deleteid },
											success: function(response){
												//alert(response);
												$(el).closest("tr").css("background","tomato");
												$(el).closest("tr").fadeOut(800, function(){      
													$(this).remove();
												});
												
												
											}
										});
									
								
							});
						});
						</script>';
					
					
					
					
					
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
	
	public function DeleteModel()
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
					$SetupModel = $this->loadModel('SetupModel');		
					$id=$_GET["id"];
					$SetupModel->DeletevehicleModel($id)	;
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
	public function AddModel()
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
					$tcmodelname=0;
					$SetupModel = $this->loadModel('SetupModel');	
					 $maker=$_POST["cmodel"];
					 $cmodelname=strtoupper($_POST["cmodelname"]);
					 $tcmodelname=$SetupModel->checkModel($maker,$cmodelname)	;
					//echo $tcmodelname;
					
					if( $tcmodelname==0){
						$maker=$_POST["cmodel"];
						 $cmodelname=strtoupper($_POST["cmodelname"]);
						 echo '<i style="color:green">Created Successfully!</i>';
						 $SetupModel->addModelpro($maker,$cmodelname);
					}else{
						echo '<i style="color:red">Already Exits!</i>';
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
