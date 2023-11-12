<?php
Session_Start();
 if(isset($_SESSION['SESS_MEMBER_POS'] )){
if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){


class SetupCleaning extends Controller
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
				require 'application/views/setupcleaning/index.php';
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

  
	
	public function FacilityList()
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
				$list1= $CleaningModel->loadfacility();
				
				//print_r($list1);
				require 'application/views/setupcleaning/facility.php';
				
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
				
				$CleaningModel = $this->loadModel('CleaningModel');
				//$list1= $SetupModel->loadVehicleMaker();
				//print_r($_GET);
				$id=$_GET['id'];
				$maker=$_GET['name'];
				$CleaningModel-> UpdateMaker($id,$maker);
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
				
				$CleaningModel = $this->loadModel('CleaningModel');
				$id=$_GET['id'];
				
				$CleaningModel-> deleteMaker($id);
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
	
	public function AddFacilities()
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
				$cid=($_POST["cid"]);				
				$CleaningModel = $this->loadModel('CleaningModel');		
				$totalUser= $CleaningModel->CheckMaker($maker);
						
				if($totalUser<>0){
					echo "Already exist!";
				}else{
						sleep(1);
						$totalUser= $CleaningModel->CheckMaker($maker);
						if($totalUser<>0){
							echo "Already exist!";
						}else{
						$CleaningModel->insertFacility($maker, $cid);
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
							
				
					$CleaningModel = $this->loadModel('CleaningModel');		
					$id=$_GET["id"];
					$makername="";
					$makername=$CleaningModel->getMakerName($id);
					echo "<h4>". $makername ."</h4>
					<hr>";
					$list=$CleaningModel->loadVehicleModelbyMakerId($id);	
					//print_r($list);
					 $c=0;
					 
					 echo '<script src="'. URL .'public/js/bootbox.min.js"></script>
						 <script src="'. URL .'public/js/jquery.js">	</script>';
						
						
					 echo "<table class='table table-bordered' >";
					 echo "<th  width='10px'>No.</th>";
					 echo "<th>Duties</th>";
					 echo "<th width='20px'>Action</th>";
					  foreach ($list as $app) { 
					  $c++;
						if (isset($app->did))  $cmid= $app->did;	
						if (isset($app->duties))  $modelname= $app->duties;	
					
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
											url:  "'. URL .'" + "SetupCleaning/DeleteDuties",
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
	
	public function DeleteDuties()
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
					$CleaningModel = $this->loadModel('CleaningModel');		
					$id=$_GET["id"];
					$CleaningModel->DeleteDuties($id)	;
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
	public function AddDuties()
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
					$CleaningModel = $this->loadModel('CleaningModel');	
					
					
					 $fid=$_POST["cmodel"];
					 $duties=strtoupper($_POST["cmodelname"]);
					 $tcmodelname=$CleaningModel-> checkFacility($fid,$duties)	;
					//echo $tcmodelname;
					
					if( $tcmodelname==0){
						$fid=$_POST["cmodel"];
						 $duties=strtoupper($_POST["cmodelname"]);
						 echo '<i style="color:green">Created Successfully!</i>';
						 $CleaningModel-> addDutiespro($fid,$duties);
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
