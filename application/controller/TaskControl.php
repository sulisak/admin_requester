<?php
Session_Start();
 if(isset($_SESSION['SESS_MEMBER_POS'] )){
 if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){


class TaskControl extends Controller
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
				require 'application/views/taskcontrol/index.php';
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
    public function loaddata()
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
				
				if ($LogUser==1){	

				
					$plus30 = date('Y-m-d', strtotime($date . ' +30 day'));
			    	$minus30 = date('Y-m-d', strtotime($date . ' -30 day'));
				
					if(isset($_POST["startdate"])){
						 $startdate=$_POST["startdate"];	
					}else{
						 $startdate=$minus30;	
					}
						
					if(isset($_POST["enddate"])){
							$enddate=$_POST["enddate"];		
					}else{
						 $enddate=$plus30;	
					}
					$TaskModel = $this->loadModel('TaskModel');
					//$checker=$InspectionModel-> loadChecker();
					$list=$TaskModel-> loadData( $startdate, $enddate);
					//print_r($list);
				
				
				require 'application/views/taskcontrol/list.php';
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
    public function DeleteTask()
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
				
				if ($LogUser==1){	

					$id=$_GET["id"];
					$TaskModel = $this->loadModel('TaskModel');
					//$checker=$InspectionModel-> loadChecker();
					$TaskModel->DeleteTask($id);
					
				
				
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
    public function UpdateForm()
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
				
				if ($LogUser==1){	

					 $id=$_GET["id"];
					$TaskModel = $this->loadModel('TaskModel');
					$list=$TaskModel-> getdata($id);
				//	print_r($list);
					 foreach ($list as $app) { 
					
					if (isset($app->id)){  $id= $app->id;}else{$id="";}	
					if (isset($app->tid)) { $tid= $app->tid;	}else{$tid="";}
					if (isset($app->code)){  $code= $app->code;	}else{$code="";}
					if (isset($app->topic)){  $topic= $app->topic;	}else{$topic="";}
					if (isset($app->details)){  $details= $app->details;}else{$details="";}	
					if (isset($app->taskstatus)){  $taskstatus= $app->taskstatus;	}else{$taskstatus="";}
					if (isset($app->incharge)) { $incharge= $app->incharge;	}else{$incharge="";}
					if (isset($app->priority)){  $priority= $app->priority;	}else{$priority="";}
					if (isset($app->workprogress)) { $workprogress= $app->workprogress;	}else{$workprogress="";}
					if (isset($app->startdate)) { $startdate= $app->startdate;	}else{$startdate="";}
					if (isset($app->deadline)) { $deadline= $app->deadline;	}else{$deadline="";}
					if (isset($app->deadline2)) { $deadline2= $app->deadline2;	}else{$deadline2="";}
					if (isset($app->duration)) { $duration= $app->duration;	}else{$duration="";}
					if (isset($app->completedDate))  {$completedDate= $app->completedDate;	}else{$completedDate="";}
					if (isset($app->completedmonth))  {$completedmonth= $app->completedmonth;	}else{$completedmonth="";}
					if (isset($app->percentage )) { $percentage = $app->percentage ;	}else{$percentage="";}
					if (isset($app->remarks )) { $remarks = $app->remarks ;	}else{$remarks="";}
					}
					require 'application/views/_templates/header.php';
					require 'application/views/_templates/nav.php';
					
					require 'application/views/taskcontrol/update.php';
				
				
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
	  
    public function AddData()
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

				
					$TaskModel = $this->loadModel('TaskModel');
					
					//print_r($_POST);
					$tid=$_POST["tid"];
					$code=$_POST["code"];
					$topic=$_POST["topic"];
					$priority=$_POST["priority"];
					$workprogress=$_POST["workprogress"];
					$startdate=$_POST["startdate"];
					$deadline=$_POST["deadline"];
					$deadline2=$_POST["deadline2"];
					$duration=$_POST["duration"];
					$completeddate=$_POST["completeddate"];
					$completedmonth=$_POST["completedmonth"];
					$percentage=$_POST["percentage"];
					$description=$_POST["description"];
					$remarks=$_POST["remarks"];
					$incharge=$_POST["incharge"];
					$taskstatus=$_POST["taskstatus"];
						$totalNew =0;
						$totalNew =$TaskModel-> Checkdata($tid);
						if($totalNew ==0){
							$TaskModel-> AddData(
								$tid,$code,$topic,$description,$taskstatus,$incharge
								,$priority,$workprogress, $startdate,  $deadline,  $deadline2, 
								$duration,$completeddate,$completedmonth,$percentage,$remarks
								);
								echo "<i style='color:green'>Create Successfully!<i>";
						}else{
							echo "<i style='color:red'>Already Exist!<i>";
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

				
					$TaskModel = $this->loadModel('TaskModel');
					
					//print_r($_POST);
					$id=$_POST["id"];
					$code=$_POST["code"];
					$topic=$_POST["topic"];
					$priority=$_POST["priority"];
					$workprogress=$_POST["workprogress"];
					$startdate=$_POST["startdate"];
					$deadline=$_POST["deadline"];
					$deadline2=$_POST["deadline2"];
					$duration=$_POST["duration"];
					$completeddate=$_POST["completeddate"];
					$completedmonth=$_POST["completedmonth"];
					$percentage=$_POST["percentage"];
					$description=$_POST["description"];
					$remarks=$_POST["remarks"];
					$incharge=$_POST["incharge"];
					$taskstatus=$_POST["taskstatus"];
					$TaskModel-> UpdateData(
								$id,$code,$topic,$description,$taskstatus,$incharge
								,$priority,$workprogress, $startdate,  $deadline,  $deadline2, 
								$duration,$completeddate,$completedmonth,$percentage,$remarks
								);
					echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("Update Successfully!");
									 window.location.href ="'. URL .'TaskControl";
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
	   public function Import()
    {	
		if($_FILES["select_excel"]["name"] != '')
		{
						
			include 'public/vendor/autoload.php';
			
			$allowed_extension = array('xls', 'csv', 'xlsx');
			$file_array = explode(".", $_FILES["select_excel"]["name"]);
			$file_extension = end($file_array);

			if(in_array($file_extension, $allowed_extension))
			{
				
				
				$file_name = time() . '.' . $file_extension;
				move_uploaded_file($_FILES['select_excel']['tmp_name'], $file_name);
				$file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
				$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

				$spreadsheet = $reader->load($file_name);

				unlink($file_name);

				$data = $spreadsheet->getActiveSheet()->toArray();
				
				$TaskModel = $this->loadModel('TaskModel');
				foreach($data as $row)
				{
					
					
					 if(isset($nocode)){ $nocode=$row[0];}else{$nocode="";}
					 $workcode=$row[1];
					 $topic=$row[2];
					 $taskdes=$row[3];
					 $taskstatus=$row[4];
					 $incharge=$row[5];
					 $proi=$row[6];
					 $workprogress=$row[7];
					 $start=$row[8];
					 $deadline=$row[9];
					 $deadline2=$row[10];
					 $duration=$row[11];
					 $completedate=$row[12];
					 $completeMonth=$row[13];
					 $percent=$row[14];
					 $remark=$row[15];
					 if($nocode != null || $nocode != "" || !empty($nocode)|| !is_null($nocode)){
						$totalNew =0;
						$totalNew =$TaskModel-> Checkdata($nocode);
						if($totalNew ==0){
							$TaskModel-> AddData(
								$nocode,$workcode,$topic,$taskdes,$taskstatus,$incharge
								,$proi,$workprogress, $start,  $deadline,  $deadline2, 
								$duration,$completedate,$completeMonth,$percent,$remark
								);
						}
					}
				}
				

			}
			else
			{
				$message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
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
