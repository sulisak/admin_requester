<?php
Session_Start();

require './application/controller/EmailController.php';

class Request extends Controller
{
	/**
	 * PAGE: index
	 * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
	 */


	public function GetCarAvailable()
	{



		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {

				//  print_r($_GET);

				$depart = $_GET["depart"];
				$arrival = $_GET["redate"];

				$deptime = $_GET["deptime"];
				$retime = $_GET["retime"];

				$depart = $depart . " " . $deptime;
				$arrival = $arrival . " " . $retime;

				$depart = date("Y-m-d H:i:s", strtotime($depart));
				$arrival = date("Y-m-d H:i:s", strtotime($arrival));
				$departtime = date('H:i:s', strtotime($depart));
				$arrivaltime = date('H:i:s', strtotime($arrival));

				date_default_timezone_set('Asia/Bangkok');
				$current = date("Y-m-d H:i:s");
				// echo $depart;
				// echo $arrival;
				$RequestModel = $this->loadModel('RequestModel');
				$vehicleinfolist = $RequestModel->getVehicleinfo();

				// ===== check point for vehicle avalible =========== 13032023 ==============

				// print_r($vehicleinfolist);



				echo '
				         <p class="labelmodal"> Select Car (Available)</p>						 
								<select class="form-control text" name="car" id="car" style="width: 100%;" required="">';
				if ($current < $depart) {
					foreach ($vehicleinfolist as $app2) {
						if (isset($app2->vid))  $vid = $app2->vid;
						if (isset($app2->makername))  $makername = $app2->makername;
						if (isset($app2->modelname))  $modelname = $app2->modelname;
						if (isset($app2->plate))  $plate = $app2->plate;
						$vehiclecheck = $RequestModel->CheckCarData($arrival, $depart, $vid);
						$count = 0;
						// 			print_r($vehiclecheck);
						foreach ($vehiclecheck as $app3) {
							$count++;
						}
						if ($count == 0) {
							echo '<option  value="' . $vid . '">' . $makername . ' ' . $modelname . ' #' . $plate . '</option>';
						}
					}
				} else {
					foreach ($vehicleinfolist as $app2) {
						if (isset($app2->vid))  $vid = $app2->vid;
						if (isset($app2->makername))  $makername = $app2->makername;
						if (isset($app2->modelname))  $modelname = $app2->modelname;
						if (isset($app2->plate))  $plate = $app2->plate;
						$vehiclecheck = $RequestModel->CheckCarData($arrival, $current, $vid);
						$count = 0;
						foreach ($vehiclecheck as $app3) {
							$count++;
						}
						if ($count == 0) {
							echo '<option  value="' . $vid . '">' . $makername . ' ' . $modelname . ' #' . $plate . '</option>';
						}
					}
				}
				echo '</select>';
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}

	public function AddrequestProcess()
	{



		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {

				// print_r($_POST);

			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}



	//   public function getVehicleinfobyuserpendingtakecar($id)
	//   {
	// //print_r($_GET);
	//  $id=$_GET["id"]; // try to drop

	// $RequestModel = $this->loadModel('RequestModel');
	// // $list=$RequestModel->getVehicleinfobyuserpendingtakecar($id);
	// 	$list=$RequestModel->getVehicleinfobyuserpendingtakecar($id);
	// //print_r($list);
	// $listdriver=$RequestModel-> DriverList();
	// //print_r($listdriver);
	// require 'application/views/request/requestDetails.php';
	//   }	


	public function AddForm()
	{



		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {

				$id = $_SESSION['SESS_MEMBER_ID'];
				$RequestModel = $this->loadModel('RequestModel');
				$listrequester_info = $RequestModel->getDatainfo($id);
				// print_r($listrequester_info);
				$department = $RequestModel->getdepartment($id);
				// print_r($list_department);


				$vehicleinfolist = $RequestModel->getVehicleinfo();
				// print_r($vehicleinfolist);
				$listemail_approver = $RequestModel->getEmail($department);
				// $msg="New pending vehicle request:".$
				// print_r($listemail_approver);


				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';

				require 'application/views/request/addform.php';
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}


	public function Takecar()
	{

		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {

				if (isset($_GET['rid'])) {
					$rid = ($_GET['rid']);
				} else {
					$rid = "";
				}
				//echo $rid;	
				$RequestModel = $this->loadModel('RequestModel');
				$RequestModel->UpdateTakecar($rid); //Update the table request
				$un = $_SESSION['SESS_MEMBER_Username'];
				$date = date("Y-m-d h:i:s");
				$RequestModel->TakecarDetails($rid, $un, $date);
				echo "ok";
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}


	public function index()
	{


		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {
				$today = date("Y-m-d H:i:s");
				$RequestModel = $this->loadModel('RequestModel');
				//$RequestModel->Updatecartake($today);

				$today = date('Y-m-d 23:59:59', strtotime($today . ' -1 day'));
				//$RequestModel->Updatecartake($today);
				// $listDrivercancel = $RequestModel->getCancell($today);

				// foreach ($listDrivercancel as $app) {
				// 	if (isset($app->driverid))  $driverid = $app->driverid;
				// 	if (isset($app->rid))  $rid = $app->rid;
				// 	if (isset($app->vehicleid))  $vehicleid = $app->vehicleid;
				// 	$RequestModel->UpdatecartakeNOtTake($rid);
				// 	$RequestModel->UpdatecancelVehicle($vehicleid);
				// 	$RequestModel->Updatecanceldriver($driverid);
				// }

				$listrequest = $RequestModel->requestHistory();


				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';

				require 'application/views/request/index.php';
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}
	public function ApproveRequest()
	{



		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {


				$today = date("Y-m-d H:i:s");
				$RequestModel = $this->loadModel('RequestModel');
				//$RequestModel->Updatecartake($today);
				$today = date('Y-m-d 23:59:59', strtotime($today . ' -1 day'));
				// echo "<pre>";	
				// print_r($today);
				// echo "</pre>";



				//$RequestModel->Updatecartake($today);

				// $listDrivercancel = $RequestModel->getCancell($today);

				// foreach ($listDrivercancel as $app) {
				// 	if (isset($app->driverid))  $driverid = $app->driverid;
				// 	if (isset($app->rid))  $rid = $app->rid;
				// 	if (isset($app->vehicleid))  $vehicleid = $app->vehicleid;
				// 	$RequestModel->UpdatecartakeNOtTake($rid);
				// 	$RequestModel->UpdatecancelVehicle($vehicleid);
				// 	$RequestModel->Updatecanceldriver($driverid);
				// }

				$listrequest = $RequestModel->requestApprove();
				// echo "<pre>";
				// print_r($listrequest);
				// echo	"<pre>";
				foreach ($listrequest as $app) {

					$returnTimekey = '';
					if (isset($app->rid))  $rid = $app->rid;
					if (isset($app->userid))  $userid = $app->userid;
					if (isset($app->vrno))  $vrno = $app->vrno;
					if (isset($app->departdate))  $departdate = $app->departdate;
					if (isset($app->daparttime))  $daparttime = $app->daparttime;
					if (isset($app->datereturn))  $datereturn = $app->datereturn;
					if (isset($app->returntime))  $returntime = $app->returntime;
					if (isset($app->rstatus))  $rstatus = $app->rstatus;
					if (isset($app->location))  $location = $app->location;
					if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
					if (isset($app->purpose))  $purpose = $app->purpose;
					if (isset($app->modelname))  $modelname = $app->modelname;
					if (isset($app->cname))  $cname = $app->cname;
					if (isset($app->makername))  $makername = $app->makername;
					if (isset($app->department))  $department = $app->department;
					if (isset($app->Email))  $Email = $app->Email;
					if (isset($app->fullname))  $fullname = $app->fullname;
					if (isset($app->Dfname)) {
						$Dfname = $app->Dfname;
					} else {
						$Dfname = '';
					}
					if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
					if (isset($app->plate))  $plate = $app->plate;
					if (isset($app->drivertype))  $drivertype = $app->drivertype;

					if (isset($app->returnTimekey))  $returnTimekey = $app->returnTimekey;
					if (isset($app->logo)) {
						$logo = $app->logo;
					} else {
						$logo = "";
					}
					// $RequestModel->UpdatecartakeNOtTake($rid);
				}

				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/request/pending.php';
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}
	public function ApproveRequestList()
	{



		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {


				$today = date("Y-m-d H:i:s");
				$RequestModel = $this->loadModel('RequestModel');
				$today = date('Y-m-d 23:59:59', strtotime($today . ' -1 day'));
				//$RequestModel->Updatecartake($today);


				// $listDrivercancel = $RequestModel->getCancell($today);

				// foreach ($listDrivercancel as $app) {
				// 	if (isset($app->driverid))  $driverid = $app->driverid;
				// 	if (isset($app->rid))  $rid = $app->rid;
				// 	if (isset($app->vehicleid))  $vehicleid = $app->vehicleid;
				// 	$RequestModel->UpdatecartakeNOtTake($rid);
				// 	$RequestModel->UpdatecancelVehicle($vehicleid);
				// 	$RequestModel->Updatecanceldriver($driverid);
				// }
				$list = $RequestModel->requestApprove();

				// print_r($list);
				foreach ($list as $app) {
					$returnTimekey = '';
					if (isset($app->rid))  $rid = $app->rid;
					if (isset($app->userid))  $userid = $app->userid;
					if (isset($app->vrno))  $vrno = $app->vrno;
					if (isset($app->departdate))  $departdate = $app->departdate;
					if (isset($app->daparttime))  $daparttime = $app->daparttime;
					if (isset($app->datereturn))  $datereturn = $app->datereturn;
					if (isset($app->returntime))  $returntime = $app->returntime;
					if (isset($app->rstatus))  $rstatus = $app->rstatus;
					if (isset($app->location))  $location = $app->location;
					if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
					if (isset($app->purpose))  $purpose = $app->purpose;
					if (isset($app->modelname))  $modelname = $app->modelname;
					if (isset($app->cname))  $cname = $app->cname;
					if (isset($app->makername))  $makername = $app->makername;
					if (isset($app->department))  $department = $app->department;
					if (isset($app->Email))  $Email = $app->Email;
					if (isset($app->fullname))  $fullname = $app->fullname;
					if (isset($app->Dfname)) {
						$Dfname = $app->Dfname;
					} else {
						$Dfname = '';
					}
					if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
					if (isset($app->plate))  $plate = $app->plate;
					if (isset($app->drivertype))  $drivertype = $app->drivertype;

					if (isset($app->returnTimekey))  $returnTimekey = $app->returnTimekey;
					if (isset($app->logo)) {
						$logo = $app->logo;
					} else {
						$logo = "";
					}
				}
				require 'application/views/request/pendinglist.php';
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}
	public function UserList()
	{



		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {


				$RequestModel = $this->loadModel('RequestModel');
				$listuser = $RequestModel->loadUsers();
				//print_r($listuser);
				require 'application/views/request/user.php';
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}
	public function getUserinfo()
	{



		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {

				$id = $_GET["id"];
				$RequestModel = $this->loadModel('RequestModel');


				$listuserinfo = $RequestModel->getUserinfo($id);
				//print_r($listuserinfo);
				$userid = "";
				$username = "";
				$fullname = "";
				$contact = "";
				$email = "";
				$company = "";
				$department = "";
				$rstatus = "";
				$email = "";

				foreach ($listuserinfo as $app) {

					if (isset($app->userid))  $userid = $app->userid;
					if (isset($app->username))  $username = $app->username;
					if (isset($app->fullname))  $fullname = $app->fullname;
					if (isset($app->contact))  $contact = $app->contact;
					if (isset($app->email))  $email = $app->email;
					if (isset($app->company))  $company = $app->company;
					if (isset($app->department))  $department = $app->department;
					if (isset($app->rstatus))  $rstatus = $app->rstatus;
					if (isset($app->email))  $email = $app->email;
				}


				$driverinfolist = $RequestModel->getdriverinfo();
				$vehicleinfolist = $RequestModel->getVehicleinfo();
				//print_r($vehicleinfolist);

				echo "<script src='" . URL . "public/js/jquery.js'>	</script>
				<script>
						$(document).ready(function(){	
						var generateRandomNDigits = (n) => {
							return Math.floor(Math.random() * (9 * (Math.pow(10, n)))) + (Math.pow(10, n));
							}
							
							var vrr = generateRandomNDigits(7);
							$('#vr').val(vrr);
							$('#vr1').val(vrr);
						$('#car').change(function(){
							
							var id=$('#car').val();
							 $.ajax({
									url: '" . URL . "  + Request/getcarinfo?id=' + id,
									type: 'GET',
									data: { id:id },
									success: function(response){
									$('#loadcarinfo').fadeOut(500).html(response).fadeIn(300);
										
										
									}
								});
						});
					});
						</SCRIPT>
					";
				echo ' 
				<div class="row">
					<div class="col-md-2">
						<p class="labelmodal">User ID</p>
						 <input type="hidden" name="userid" id="cmodel"  value="' . $userid . '" >
						 <input type="text" name="fname"

						 disabled class="form-control text" style="background:#fff"  value="' . $username . '" >
					</div>
					<div class="col-md-2">
						<p class="labelmodal">Company</p>
						 <input type="text" name="cid"  disabled class="form-control text" style="background:#fff" value="' . $company . '" >
					</div>
					<div class="col-md-2">
						<p class="labelmodal">Fullname</p>
						<input type="text" name="fname"   disabled class="form-control text" style="background:#fff" value="' . $fullname . '" >
					</div>
					<div class="col-md-2">
						<p class="labelmodal">Department</p>
						 <input type="text" name="cid"  disabled class="form-control text" style="background:#fff"  value="' . $department . '" >
					</div>
					<div class="col-md-2">
						<p class="labelmodal">Contact</p>
					
						 <input type="text" name="fname"   disabled class="form-control text" style="background:#fff"  
						 value="' . $contact . '" >
					</div>
					<div class="col-md-2">
						<p class="labelmodal">VRNO.</p>';
				$vr = strtoupper(uniqid());
				echo '<input type="hidden" name="vr"   class="form-control text" id="vr">
						 <input type="text" disabled  class="form-control text"  id="vr1" style="background:#fff" >
					</div>
					
			</div>
			<hr>
			 <div class="row">
					<div class="col-md-3">
						<div class="form-group">
						  <p class="labelmodal"> Departure Date:</p>
							
								<input type="date" class="form-control datetimepicker-input text" required id="depdate" name="depdate" >
								
						</div>
					</div>
					<div class="col-md-3">
						<p class="labelmodal">Departure Time:</p>
							<input type="time" class="form-control datetimepicker-input text"  value="11:31:00"  required name="deptime" id="deptime" >
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <p class="labelmodal">Arrival Date:</p>							
								<input type="date" class="form-control datetimepicker-input text" required name="redate" id="redate" >
							</div>
					</div>
					<div class="col-md-3">
						<p class="labelmodal">Arrival Time:</p>
							<input type="time" class="form-control datetimepicker-input text" value="11:31:00" required name="retime" id="retime" >
					</div>
			 </div>
			
			 <div class="row">
					<div class="col-md-4">
						<div class="form-group">
						<p class="labelmodal">Location</p>
							 <input type="text" class="form-control datetimepicker-input text" required name="location" placeholder="Enter Location">
						</div>
					</div>
					<div class="col-md-4">
						<p class="labelmodal">Purpose</p>
							<input type="text" class="form-control datetimepicker-input text" required name="purpose" placeholder="Enter purpose">
					</div>
					<div class="col-md-4">
							
								<div class="form-group">
								  <p class="labelmodal"> Select Driver Type</p>	
								  
								  <select class="form-control select2bs4 text"  name ="driver" style="width: 100%;" required>
										<option value="0">Drive by self</option>
										<option value="1">Request Driver</option>
										</select>
									 
								</div>
					</div>
			 </div>
				
				
				<div class="row">
							<div class="col-md-4">
								<div class="form-group">
								  <p class="labelmodal"> Select Car (Available)</p>						 
									<select class="form-control text"  name ="car" id ="car" style="width: 100%;" required>
										<option disabled="disabled" selected="selected" value="">Select Car</option>';
				foreach ($vehicleinfolist as $app2) {
					if (isset($app2->vid))  $vid = $app2->vid;
					if (isset($app2->makername))  $makername = $app2->makername;
					if (isset($app2->modelname))  $modelname = $app2->modelname;
					if (isset($app2->plate))  $plate = $app2->plate;
					echo '<option  value="' . $vid . '">' . $makername . ' ' . $modelname . ' #' . $plate . '</option>';
				}
				echo '</select>
										</div>
							</div>
							<div class="col-md-8">
								<div id="loadcarinfo"></div>	
							</div>
						</div>
						
						';
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}
	//   ========= zone request ===============================
	public function AddRequest()
	{
		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {


			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];


			$dashboard_model = $this->loadModel('DashboardModel');
			// $hello = $this->loadModel('hello');

			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {

				$userid = $_POST["userid"];
				$depdate = $_POST["depdate"];
				$deptime = $_POST["deptime"];
				$redate = $_POST["redate"];
				$retime = $_POST["retime"];
				$location = $_POST["location"];
				$purpose = $_POST["purpose"];
				$car = $_POST["car"];
				$driver = $_POST["driver"];
				$vr = $_POST["vr"];
				// print_r($_POST);
				$RequestModel = $this->loadModel('RequestModel');
				$totalcar = 0;
				$totaldriver = 0;

				$id = $userid;
				//$totaluser = $RequestModel->CheckUserAvailavility($id);
				$today = $date;
				$totaluser = $RequestModel->CheckUserAvailavilityperday($id, $today);
				if ($totaluser < 3) {
					// $totaluser;
					//$totalcar = $RequestModel->CheckCarAvailavility($car);
					//if($totalcar<>0){
					//$totaldriver = $RequestModel->CheckdriverAvailavility($driver);
					//echo $totaldriver;
					//if($totalcar<>0){

					$totalvr = 0;
					$totalvr = $RequestModel->CheckVrAvailavility($vr);
					if ($totalvr == 0) {
						$av = 0;
						$date1 = date("Y-m-d H:i:s");
						$dateRequest = $date1;
						$depdate = $depdate . " " . $deptime;
						$redate = $redate . " " . $retime;

						//$redate=date($redate, strtotime("+30 minutes"));

						$date = $redate;
						$redate = date('Y-m-d H:i:s', strtotime($date . '+30 minutes'));


						$retime = $retime;
						$retime = date('H:i:s', strtotime($retime . '+30 minutes'));

						$av = 0;
						$av = $RequestModel->CheckDateRange($depdate, $redate, $car);
						if ($av == 0) {

							$list = $RequestModel->getVehicleODM($car);
							$mileage = 0;
							foreach ($list as $app) {
								if (isset($app->mileage))  $mileage = $app->mileage;
							}

							// === add new ==============
							$listrequester_info = $RequestModel->getDatainfo($id);
							// print_r($listrequester_info);
							$department = $RequestModel->getdepartment($id);
							$requester_name = $RequestModel->getrequester_name($id);
							// print_r($list_department);

							$vehicleinfolist = $RequestModel->getVehicleinfo();
							// print_r($vehicleinfolist);

							// === add new ==============


							$timer = abs(crc32(uniqid()));

							$RequestModel->InsertRequest($userid, $depdate, $deptime, $redate, $retime, $location, $purpose, $car, $driver, $vr, $dateRequest, $timer, $mileage);
							// add new to email noti to approval =======================
							$msg = "New Vehicle Request";
							$vr = $vr;
							$depdate = $depdate . $deptime;
							$redate = $redate . $retime;
							$requester =  $requester_name;
							$localtion =  $location;
							$daterequest = $dateRequest;
							$listemail_approver = $RequestModel->getEmail($department);
							$getapprover_name = $RequestModel->getApprover_name($department);

							$carname = $RequestModel->Get_request_carname($car);
							// $carname = $RequestModel->Get_request_carname($vr);

							// =========================================== email function new (close this function temporarity before migrate email aif done)=======================================
							// $UserData = new SendMail\RequestUser('' . URL . 'HistoryVehicle/ApproveVehicle', $msg, $carname, $requester_name, $location, $daterequest, $depdate, $redate, $getapprover_name);
							// $templete = $UserData->getUser();
							// $email =  new SendMail\ConfigMail($listemail_approver, 'New Vehicle Request');
							// $email->getSendEamil($email->ApproveEamil($templete));
							// add new to email noti to approval =======================

							$RequestModel->updateCarstatus($car);
							$RequestModel->updateDriverstatus($driver);



							echo ' 
											<script src="' . URL . 'public/js/jquery.js"></script>
											<script>
														alert("Create Successfully!");
														 window.location.href ="' . URL . 'HistoryVehicle";
													</script>	
										';
						} else {

							// ===check point =========

							// print_r($totaluser);





							echo ' 
											<script src="' . URL . 'public/js/jquery.js"></script>
											<script>
														alert("Depart time is not available!");
														window.history.back();
													</script>	
										';
						}
					} else {
						echo ' 
											<script src="' . URL . 'public/js/jquery.js"></script>
											<script>
														alert("Already Exist!");
														window.history.back();
												
									';
					}


					//}else{
					//	echo "
					//	<i style='color:red'>Driver is not available!</i>";
					//}
					//}else{
					//	echo "
					//	<i style='color:red'>Vehicle is not available!</i>";
					//}
				} else {
					echo "<i style='color:red'>Maximum  request per day already exceed!</i>";
				}
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}
	//   ========= zone request ===============================	
	public function getcarinfo()
	{
		//print_r($_GET);
		$id = $_GET["id"];
		$mileage = '';
		$vcolor = '';
		$RequestModel = $this->loadModel('RequestModel');
		$ml = $RequestModel->getVehicleODM($id);
		foreach ($ml as $app) {
			if (isset($app->mileage))  $mileage = $app->mileage;
			if (isset($app->vcolor))  $vcolor = $app->vcolor;
			if (isset($app->logo))  $logo = $app->logo;
		}
		echo ' <div class="row">
					<div class="col-md-6">
						<div class="form-group">
						  <p class="labelmodal"> ODM</p>							 
								<input type="text" class="form-control text" disabled id="odm" value="' . number_format($mileage) . '">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						    <p class="labelmodal"> Color</p>							 
								<input type="text" class="form-control text" disabled id="color" value="' . strtoupper($vcolor) . '">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
						  <p class="labelmodal"> </p>							 
								<img src="https://aifgrouplaos.la/public/img/car/' . ($logo) . '" class="img-fluid" >
						</div>
					</div>
					
				</div>

		 ';
	}



	public function getListRequestUser()
	{
		//print_r($_GET);
		$id = $_GET["id"];

		$RequestModel = $this->loadModel('RequestModel');
		$list = $RequestModel->getVehicleinfobyuser($id);
		//print_r($list);
		$listdriver = $RequestModel->DriverList();
		//print_r($listdriver);
		require 'application/views/_templates/header.php';
		require 'application/views/_templates/nav.php';
		require 'application/views/request/userDetails.php';
	}





	public function getUserinfobyid()
	{



		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {

				$id = $_GET["id"];


				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/request/requestDetails.php';
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}




	public function UpdateStatus()
	{
		//print_r($_GET);
		$rid = $_GET["id"];

		$RequestModel = $this->loadModel('RequestModel');
		$vid = 0;
		$list = $RequestModel->getVehicleid($rid);
		foreach ($list as $app) {
			if (isset($app->vehicleid))  $vehicleid = $app->vehicleid;
			$RequestModel->UpdateVid($vehicleid);
		}

		$RequestModel->updatestatus($rid);
		$type = $_GET["type"];
		$un = $_SESSION['SESS_MEMBER_Username'];
		date_default_timezone_set('Asia/Bangkok');
		$date = date("Y-m-d H:i:s");
		$RequestModel->insertRequestDetails($rid, $un, $type, $date);
		//$RequestModel->updatestatus($rid);

		$list = $RequestModel->Requestget($rid);
		foreach ($list as $app) {
			if (isset($app->userid))  $userid = $app->userid;
			if (isset($app->requester_name))  $requester_name = $app->requester_name;
			if (isset($app->plate))  $plate = $app->plate;
			if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
			if (isset($app->location))  $location = $app->location;
			if (isset($app->purpose))  $purpose = $app->purpose;
			if (isset($app->mail_requester))  $mail_requester = $app->mail_requester;
		}

		// $listemail = $RequestModel->loadUsersAdmin();
		// 	foreach ($listemail as $app) {
		// 		if (isset($app->Email))  $adminEmail = $app->Email;
		// 	}

		// $Email = $RequestModel->getEmail($userid);
		$carname = $plate;
		$edate = date("Y-m-d");
		$msg = ' Your request  (' . $carname . ') was been approved by The Line Manager!';
		// =========================================== email function new (close temporarity before email migrate done) =======================================
		// $UserData = new SendMail\RequestUser_by_linemanager('' . URL . 'HistoryVehicle', $msg, $requester_name, $carname, $location, $purpose, $dateRequest);
		// $templete = $UserData->getUser();
		// $email =  new SendMail\ConfigMail($mail_requester, 'Approved Vehicle Request by Line manager');
		// $email->getSendEamil($email->LineManager_Approvevehicle_Eamil_template($templete));
	}

	public function UpdateStatusDriverCarReq()
	{

		//print_r($_POST);
		$rid = $_POST["rid"];
		$driverId = $_POST["driverId"];
		$RequestModel = $this->loadModel('RequestModel');
		//$list=$RequestModel->getVehivleinfoRequest($rid);

		$drivertype = 0;
		if ($driverId == 0) {
			$drivertype = 0;
		} else {
			$drivertype = 1;
		}
		$RequestModel->DrivertyeUpdate($rid, $drivertype);
		$type = "adminapp";
		$un = $_SESSION['SESS_MEMBER_Username'];
		date_default_timezone_set('Asia/Bangkok');
		$date = date("Y-m-d H:i:s");
		$RequestModel->insertRequestDetails($rid, $un, $type, $date);


		$st = 'Booked';




		if ($driverId == 0) {
			$RequestModel->updateRequestAdmin($rid, $st, $driverId);

			$listDetail = $RequestModel->selectrequest($rid);
			foreach ($listDetail as $app) {
				if (isset($app->vehicleid))  $vid = $app->vehicleid;

				$RequestModel->updateVehicletatusAdmin($vid, 'Pending');
			}

			$list = $RequestModel->Requestget($rid);
			foreach ($list as $app) {
				if (isset($app->userid))  $userid = $app->userid;
				if (isset($app->vrno))  $vrno = $app->vrno;
				if (isset($app->departdate))  $departdate = $app->departdate;

				$Email = $RequestModel->getEmail($userid);
				$edate = date("Y-m-d");
				$message = ' Your request  (' . $vrno . ') was been  approved by The Line Manager!';
				$typeres = "Line Manager";
				$RequestModel->insertnotification($rid, $userid, $message, $edate, $typeres);
				$subject = "Approved Request Vehicle";
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
																						<h4>Approved Request Vehicle</h4>
																						============================================================================
																						
																						</td>
																					</tr>
																					
																					
																				   <tr>
																					<td>
																					<table style="padding: 0px 30px 0px 30px;">											
																						<tr class="service">
																						<td ><b>Request Code: </b> ' . ($vrno) . '</td>															
																						</tr>												
																						<tr class="service">
																						<td ><b>Approved by Admin: </b> ' . ($_SESSION["SESS_MEMBER_Fname"]) . '</td>															
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


				mail($Email, $subject, $message1, $header);
			}
		} else {
			$totaldriver = 0;
			$totaldriver = $RequestModel->CheckdriverAvailavility($driverId);
			if ($totaldriver == 1) {
				$RequestModel->updateRequestAdmin($rid, $st, $driverId);
				$RequestModel->updateDriverstatusAdmin($driverId, $st);


				$listDetail = $RequestModel->selectrequest($rid);
				// print_r($listDetail);
				foreach ($listDetail as $app) {
					if (isset($app->vehicleid))  $vid = $app->vehicleid;

					$RequestModel->updateVehicletatusAdmin($vid, 'Pending');
				}

				$list = $RequestModel->Requestget($rid);
				foreach ($list as $app) {
					if (isset($app->userid))  $userid = $app->userid;
					if (isset($app->vrno))  $vrno = $app->vrno;
					if (isset($app->departdate))  $departdate = $app->departdate;

					$Email = $RequestModel->getEmail($userid);
					$edate = date("Y-m-d");
					$message = ' Your request  (' . $vrno . ') was been  approved by The Line Manager!';
					$typeres = "Line Manager";
					$RequestModel->insertnotification($rid, $userid, $message, $edate, $typeres);
					$subject = "Approved Request Vehicle";
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
																						<h4>Approved Request Vehicle</h4>
																						============================================================================
																						
																						</td>
																					</tr>
																					
																					
																				   <tr>
																					<td>
																					<table style="padding: 0px 30px 0px 30px;">											
																						<tr class="service">
																						<td ><b>Request Code: </b> ' . ($vrno) . '</td>															
																						</tr>												
																						<tr class="service">
																						<td ><b>Approved by Admin: </b> ' . ($_SESSION["SESS_MEMBER_Fname"]) . '</td>															
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


					mail($Email, $subject, $message1, $header);
				}
			} else {
				echo 'The driver is not available!';
			}
		}

		//$rid=$_GET["id"];
		//$RequestModel = $this->loadModel('RequestModel');
		//$listDetail=$RequestModel->selectrequest($rid);
		//print_r($listDetail);
		// foreach ($listDetail as $app) { 
		//	if (isset($app->vehicleid))  $vid= $app->vehicleid;	
		//	if (isset($app->driverId))  $driverId= $app->driverId;	
		// }
		// $st='Booked';
		// $RequestModel->updateDriverstatusAdmin($driverId, $st);
		// $RequestModel->updateVehicletatusAdmin($vid, $st);		
		// $RequestModel->updateRequestAdmin($rid, $st);

	}

	public function CancelledRequest()
	{
		//print_r($_GET);
		$rid = $_GET["id"];

		$RequestModel = $this->loadModel('RequestModel');
		$totalcount = 0;
		$totalcount = $RequestModel->CheckStatustoDelete($rid);
		if ($totalcount == 0) {
			$rid = $_GET["id"];
			$listDetail = $RequestModel->selectrequest($rid);
			//print_r($listDetail);
			$type = $_GET["type"];
			$un = $_SESSION['SESS_MEMBER_Username'];
			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d H:i:s");
			$RequestModel->insertRequestDetails($rid, $un, $type, $date);


			$driverId = 0;
			$vid = 0;
			foreach ($listDetail as $app) {
				if (isset($app->vehicleid))  $vid = $app->vehicleid;
				if (isset($app->driverId))  $driverId = $app->driverId;
			}
			$st = 'Available';
			$RequestModel->updateVehicletatusAdmin($vid, $st);
			echo $driverId;


			if ($driverId <> 0) {
				$st = 'Available';
				$RequestModel->updateDriverstatusAdmin($driverId, $st);
				$st = 'Cancelled';
				$RequestModel->updateRequestAdminCancel($rid, $st, $driverId);
			} else {

				$st = 'Cancelled';
				$RequestModel->updateRequestAdminCancel1($rid, $st);
			}

			$list = $RequestModel->Requestget($rid);
			foreach ($list as $app) {
				if (isset($app->userid))  $userid = $app->userid;
				if (isset($app->requester_name))  $requester_name = $app->requester_name;
				if (isset($app->plate))  $plate = $app->plate;
				if (isset($app->location))  $location = $app->location;
				if (isset($app->purpose))  $purpose = $app->purpose;
				if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
				if (isset($app->mail_requester))  $mail_requester = $app->mail_requester;

				// $Email = $RequestModel->getEmail($userid);
				$msg = ' Your request  (' . $plate . ') was been  Rejected by Admin!';
				$carname = $plate;
				// $RequestModel->insertnotification($rid, $userid, $msg, $edate, $typeres);

				// =========================================== email function new (close temporarity before email migrate done) =====================
				// $UserData = new SendMail\RequestUser_wascancel_vehicle('' . URL . 'HistoryVehicle', $msg, $requester_name, $carname, $location, $purpose, $dateRequest);
				// $templete = $UserData->getUser_request();
				// $email =  new SendMail\ConfigMail($mail_requester, 'Rejected Vehicle Request');
				// $email->getSendEamil($email->Rejected_vehicle_Eamail_template($templete));
			}
		}
	}





	public function ReturnVehicle()
	{



		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {


				//$RequestModel = $this->loadModel('RequestModel');
				//$list=$RequestModel->getVehicleinfobyuser($id);

				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/request/return.php';
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}
	public function ReturnRequestList()
	{

		$RequestModel = $this->loadModel('RequestModel');
		$list = $RequestModel->RequestReturn();
		//print_r($list);
		require 'application/views/request/returnlist.php';
	}
	public function getinfoReturn()
	{
		$rid = $_GET["id"];
		$RequestModel = $this->loadModel('RequestModel');

		$listDetail = $RequestModel->RequestReturnListInfo($rid);
		//print_r($listDetail);
		foreach ($listDetail as $app) {
			if (isset($app->vehicleid))  $vehicleid = $app->vehicleid;
			if (isset($app->driverId))  $driverId = $app->driverId;
			if (isset($app->rid))  $rid = $app->rid;
			if (isset($app->mileage))  $mileage = $app->mileage;
			if (isset($app->plate))  $plate = $app->plate;
			if (isset($app->vcolor))  $vcolor = $app->vcolor;
			if (isset($app->modelname))  $modelname = $app->modelname;
			if (isset($app->makername))  $makername = $app->makername;
			if (isset($app->driverId))  $driverId = $app->driverId;
			if (isset($app->Dfname)) {
				$Dfname = $app->Dfname;
			} else {
				$Dfname = '';
			}
			if (isset($app->vrno))  $vrno = $app->vrno;
			if (isset($app->drivertype))  $drivertype = $app->drivertype;

			echo '
				<div class="row">
					 <input type="hidden"   disabled class="form-control" style="background:#fff"
						 value="' . $vrno . '" >
						 <input type="hidden"   name="rid" class="form-control"
						 value="' . $rid . '" >
					<div class="col-md-12">
						Driver';

			if ($Dfname == '') {
				echo ' <input type="text"   disabled class="form-control"  style="background:#fff"
										value="Drive by self" > ';
			} else {


				echo ' <input type="text"   disabled class="form-control"  style="background:#fff"		 value="' . $Dfname . '" >';
			}


			echo '
						 
						 <input type="hidden"   name="driverId" class="form-control"  style="background:#fff"
						 value="' . $driverId . '" >
					</div>
					<div class="col-md-12">
						VR Number
						
						 <input type="text" name=""  disabled class="form-control"  style="background:#fff"
						 value="' . $vrno . '" >
					</div>
					<div class="col-md-12">
						Vehicle
						
						 <input type="text" name=""  disabled class="form-control"  style="background:#fff"
						 value="' . $makername . ' ' . $modelname . ' #' . $plate . ' - ' . $vcolor . '  " >
						 <input type="hidden" name="vid"   class="form-control" value="' . $vehicleid . '"  >
					</div>
					<div class="col-md-12">
						ODM
						 <input type="hidden" name="odmold"   required class="form-control" value="' . $mileage . '" >
						 <input type="number" name="odm"  style="background:#fff"  required class="form-control" value="' . $mileage . '" >
					</div>
				 </div>
			
			';
		}





		//

	}
	public function AddReturn()
	{
		//print_r($_POST);
		$rid = $_POST["rid"];
		$driverId = $_POST["driverId"];
		$vid = $_POST["vid"];
		$odmold = $_POST["odmold"];
		$odm = $_POST["odm"];
		$RequestModel = $this->loadModel('RequestModel');
		if ($odmold < $odm) {


			$st = "Available";
			$RequestModel->updateDriverstatusAdmin($driverId, $st); //Driver
			$RequestModel->updateVehicleODM($vid, $st, $odm); //ODM



			date_default_timezone_set("Asia/Bangkok");
			$dateback = date("Y-m-d h:i:s");
			$st = "Completed";
			$RequestModel->updateRequestAdminTime($rid, $st, $dateback); //request	

			//updatedriver
			$RequestModel->Updatdriver($driverId); //request			




			echo "ok";
		} else {
			echo "The ODM value should be higher than before!";
		}
	}


	public function History()
	{



		if (isset($_SESSION['SESS_MEMBER_ID'])) {
			$Sid = $_SESSION['SESS_MEMBER_ID'];
		} else {
			$Sid = '';
		}
		if ($Sid == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			require 'application/views/login/index.php';
		} else {

			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$userId = $Sid;
			$token = $_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser == 1) {



				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/request/history.php';
			} else {
				session_unset();
				session_destroy();


				echo ' 
						<script src="' . URL . 'public/js/jquery.js"></script>
						<script>
									alert("logging off");
									 window.location.href ="' . URL . '";
								</script>	
					';
			}
		}
	}
	public function HistoryList()
	{
		$RequestModel = $this->loadModel('RequestModel');
		$list = $RequestModel->requestHistory();
		//print_r($list);

		require 'application/views/request/historylist.php';
	}


	public function ViewDetail()
	{
		$rid = $_GET["id"];
		$id = $_GET["id"];
		$RequestModel = $this->loadModel('RequestModel');
		// $list= $RequestModel->getVehicleODM($id);
		date_default_timezone_set('Asia/Bangkok');

		$listdriver = $RequestModel->DriverList();

		$listDetail = $RequestModel->RequestReturnListInfo($rid);
		// require 'application/views/_templates/header.php';
		// 		require 'application/views/_templates/nav.php';
		//require 'application/views/request/historylist.php';

		//	echo "<pre>";
		//	print_r($listDetail);
		//echo "</pre>";
		foreach ($listDetail as $app) {
			if (isset($app->rid))  $rid = $app->rid;
			if (isset($app->departdate))  $departdate = $app->departdate;
			if (isset($app->daparttime))  $daparttime = $app->daparttime;
			if (isset($app->datereturn))  $datereturn = $app->datereturn;
			if (isset($app->returntime))  $returntime = $app->returntime;
			if (isset($app->rstatus))  $rstatus = $app->rstatus;
			if (isset($app->location))  $location = $app->location;
			if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
			if (isset($app->purpose))  $purpose = $app->purpose;
			if (isset($app->makername))  $makername = $app->makername;
			if (isset($app->modelname))  $modelname = $app->modelname;
			if (isset($app->plate))  $plate = $app->plate;
			if (isset($app->vcolor))  $vcolor = $app->vcolor;
			if (isset($app->mileage))  $mileage = $app->mileage;
			if (isset($app->cname))  $cname = $app->cname;
			if (isset($app->department))  $department = $app->department;
			if (isset($app->Dfname)) {
				$Dfname = $app->Dfname;
			} else {
				$Dfname = '';
			}
			if (isset($app->Email))  $Email = $app->Email;
			if (isset($app->fullname))  $fullname = $app->fullname;
			if (isset($app->plate))  $plate = $app->plate;
			if (isset($app->vcolor))  $vcolor = $app->vcolor;
			if (isset($app->logo))  $logo = $app->logo;		// add new 			
			//	if (isset($app->mileage))  $mileage= $app->mileage;						
			if (isset($app->vrno))  $vrno = $app->vrno;
			if (isset($app->userid))  $userid = $app->userid;
			if (isset($app->username))  $username = $app->username;
			if (isset($app->contact))  $contact = $app->contact;
			if (isset($app->rstatus))  $rstatus = $app->rstatus;
			if (isset($app->lineManager))  $lineManager = $app->lineManager;
			if (isset($app->adminApp))  $adminApp = $app->adminApp;
			if (isset($app->takecar))  $takecar = $app->takecar;
			if (isset($app->returncar))  $returncar = $app->returncar;
			if (isset($app->drivertype))  $drivertype = $app->drivertype;

			if (isset($app->returnTimekey)) {
				$returncardate = $app->returnTimekey;
			} else {
				$returncardate = '';
			}
			if (isset($app->takecardate)) {
				$takecardate = $app->takecardate;
			} else {
				$takecardate = '';
			}
			if (isset($app->adminFn)) {
				$adminFn = $app->adminFn;
			} else {
				$adminFn = '';
			}
			if (isset($app->lineFn)) {
				$lineFn = $app->lineFn;
			} else {
				$lineFn = '';
			}
			if (isset($app->linemanagerappdate)) {
				$linemanagerappdate = $app->linemanagerappdate;
			} else {
				$linemanagerappdate = '';
			}
			if (isset($app->adminappdate)) {
				$adminappdate = $app->adminappdate;
			} else {
				$adminappdate = '';
			}
			if (isset($app->dateRequest)) {
				$dateRequest = $app->dateRequest;
			} else {
				$dateRequest = '';
			}
			if (isset($app->linemanagerpic)) {
				$linemanagerpic = $app->linemanagerpic;
			} else {
				$linemanagerpic = '';
			}
			if (isset($app->adminapppic)) {
				$adminapppic = $app->adminapppic;
			} else {
				$adminapppic = '';
			}
			if (isset($app->reqppic)) {
				$reqppic = $app->reqppic;
			} else {
				$reqppic = '';
			}

			$dateRequest1 =  $dateRequest;
			$dateRequest = date_create($dateRequest);
			$dateRequest = date_format($dateRequest, "D jS \of M Y");

			$departdate = date_create($departdate);
			$departdate = date_format($departdate, "D jS \of M Y");

			$datereturn = date_create($datereturn);
			$datereturn = date_format($datereturn, "D jS \of M Y");


			echo '
			
				
			
			
			

			<input type="hidden" id="rid"  
						  class="form-control  text" style="background:#fff"
						 value="' . $rid . '" >
			<div class="row">
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal"> User ID</p>
						 <input type="hidden" name="userid" id="cmodel" >
						 <input type="text" name="fname"  
						 disabled class="form-control  text" style="background:#fff"
						 value="' . $username . '" >
					</div>
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal">Business Unit</p>
						 <input type="text" name="cid"  disabled class="form-control  text"  style="background:#fff"value="' . $cname . '" >
					</div>
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal">Fullname</p>
					
						 <input type="text" name="fname"     disabled class="form-control  text" value="' . $fullname . '"  style="background:#fff">
					</div>
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal">Department</p>
						 <input type="text" name="cid"    disabled class="form-control  text" value="' . $department . '" style="background:#fff">
					</div>
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal">Contact</p>
					
						 <input type="text" name="fname"   
						   disabled class="form-control  text" value="' . $contact . '"  style="background:#fff">
					</div>
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal">VRNO.</p>
						
						 <input type="text" disabled    disabled class="form-control  text" value="' . $vrno . '" style="background:#fff">
					</div>
					
					
				 </div>
				
				
			 <div class="row">
					<div class="col-md-3" >
						<div class="form-group" >

<!-- <label class="labelmodal" style="margin: 15px 0px 15px 0px;"> Departure Date:</label> -->
	<p class="labelmodal" style="margin: 15px 0px 15px 0px;">Departure Date:</p>
							
								<input type="text" class="form-control  text datetimepicker-input" required disabled style="background:#fff"
								value="' . strtoupper($departdate) . '">
								
						</div>
					</div>
					<div class="col-md-3" >
						  <!-- <label class="labelmodal" style="margin: 15px 0px 15px 0px;"> Departure Time:</label> -->
	<p class="labelmodal" style="margin: 0px 0px 15px 0px;">Departure Time:</p>
							<input type="time" class="form-control  text datetimepicker-input"   style="background:#fff"
							disabled value="' . $daparttime . '">
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label class="labelmodal" style="margin: 15px 15px 15px 0px;"> Arrival Date:</label>							
								<input type="text" class="form-control  text datetimepicker-input" required disabled style="background:#fff"
								value="' . strtoupper($datereturn) . '">
							</div>
					</div>
					<div class="col-md-3">
						  <label class="labelmodal" style="margin: 0px 15px 15px 0px;"> Arrival Time:</label>
							<input type="time" class="form-control  text datetimepicker-input" required  style="background:#fff"
							disabled value="' . strtoupper($returntime) . '">
					</div>
					
					
			 </div>
			 <div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label class="labelmodal" style="margin: 15px 15px 15px 0px;"> Location</label>
							 <input type="text" class="form-control  text datetimepicker-input" required name="location" disabled	value="' . strtoupper($location) . '" style="background:#fff">
						</div>
					</div>
					<div class="col-md-4" >
						  <label class="labelmodal" style="margin: 0px 15px 15px 0px;">Purpose</label>
							<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="' . strtoupper($purpose) . '">
					</div>
					<div class="col-md-4">
						  <label class="labelmodal" style="margin: 15px 15px 15px 0px;"> Driver Type</label>';

			if ($drivertype == 0) {
				echo '<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="Drive by self">';
			} else {
				echo '<input type="text" class="form-control  text datetimepicker-input" required name="purpose" style="background:#fff" disabled value="Request Driver">';
			}
			echo '
					</div>
					
			 </div>
			 
		
			 <div class="row">
					
					<div class="col-md-4">
						  <label class="labelmodal" style="margin: 15px 15px 15px 0px;"> Vehicle</label>
							<input type="text" class="form-control  text datetimepicker-input" required style="background:#fff" name="purpose" disabled value="' . strtoupper($makername) . ' ' . strtoupper($modelname) . ' #' . strtoupper($plate) . '  ">
					</div>
					<div class="col-md-4">
						  <label class="labelmodal" style="margin: 15px 15px 15px 0px;"> ODM </label>
							<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="' . number_format($mileage) . '">
					</div>
					<div class="col-md-4">
						  <label class="labelmodal" style="margin: 15px 15px 15px 0px;"> Color</label>
							<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="' . strtoupper($vcolor) . '">
					</div>

					
			 </div>
			 
			  <!---APROVAL LINE--->
			  ';

			echo '
			  
			
			 <div class="row">
				<div class="col-md-12 text-center">
				<center>
				<br><hr>		
				<center><h4 style="opacity:0.8">APPROVAL LINE</h4></center>
				<br>
				<br>
				
				 <div class="hori-timeline" dir="ltr">
				 
				 

                    <ul class="list-inline events">
                        
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="https://aifgrouplaos.la/public/img/profile/' . $reqppic . '"  style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
												  
								</div>
								
								
                                ';
			$isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
			echo $isMob  ? "<br></br></br>" : "";


			if ($rstatus == 'Booked') {



				echo '<center><div class="circledivComplete">C</div></center>	';
			} elseif ($rstatus == 'Pending') {

				//  echo 'Pending';







				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($rstatus == 'Completed') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} elseif ($rstatus == 'Cancelled') {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}

			echo '
						
                                <h6 class="labelmodal">REQUESTOR</h6>
								<p style="font-size:10px">' . $dateRequest1 . '</p>
                               
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">';


			if ($linemanagerpic == '') {
				echo '<div class="event-date text-center">
									<img src="https://aifgrouplaos.la/public/img/linemanager.png"  width="50px">
								</div>';
				echo $isMob  ? "<br></br></br>" : "";
			} else {
				echo '	<div class="event-date text-center">
										<img src="https://aifgrouplaos.la/public/img/profile/' . $linemanagerpic . '"  width="50px"
										style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
									</div>';
				echo $isMob  ? "<br></br></br>" : "";
			}


			if ($lineManager == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($lineManager == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}


			echo '
								  <h6 class="labelmodal">LINE MANAGER</h6>';
			if ($linemanagerappdate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $linemanagerappdate . '</p>';
			}
			echo '	
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                
								';

			if ($adminapppic == '') {
				echo '<div class="event-date text-center">
									<img src="https://aifgrouplaos.la/public/img/linemanager.png"  width="50px">
								</div>';
				echo $isMob  ? "<br></br></br>" : "";
			} else {
				echo '	<div class="event-date text-center">
										<img src="' . URL . 'public/img/profile/' . $adminapppic . '"
										style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
									</div>';
				echo $isMob  ? "<br></br></br>" : "";
			}





			if ($adminApp == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($adminApp == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}



			echo '
                                  <h6 class="labelmodal">ADMIN HEAD</h6>';

			if ($adminappdate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $adminappdate . '</p>';
			}
			echo '
                            </div>
                        </li>

                       


                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="https://aifgrouplaos.la/public/img/profile/' . $reqppic . '"  width="50px" style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
								</div>';
			echo $isMob  ? "<br></br></br>" : "";


			if ($takecar == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($takecar == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}


			echo '
                                  <h6 class="labelmodal">TAKE CAR</h6>';

			if ($takecardate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $takecardate . '</p>';
			}
			echo '
								
                            </div>
                        </li>

                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="https://aifgrouplaos.la/public/img/profile/' . $reqppic . '"    style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
								</div>';
			echo $isMob  ? "<br></br></br>" : "";

			if ($returncar == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($returncar == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}


			echo '
                                  <h6 class="labelmodal">RETURN</h6>';

			if ($returncardate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $returncardate . '</p>';
			}
			echo '
                               
                            </div>
                        </li>
                        
                       
                    </ul>
              
			</div>
			</center>
			</div>
			</div>';
			if ($lineManager == 'C') {
				echo '<div class="row">
				<div class="col-md-6" style="margin-top: 15px;">
				<p class="labelmodal">LINE MANAGER FULLNAME</p>
				 <input type="text" name="fname"  
						 disabled class="form-control  text" style="background:#fff"
						 value="' . $lineFn . '" >
				</div>
				<div class="col-md-6" style="margin-top: 15px;">
				<p class="labelmodal">ADMIN FULLNAME</p>
				 <input type="text" name="fname"  
						 disabled class="form-control  text" style="background:#fff"
						 value="' . $adminFn . '" >
				</div>
			</div>';
			}

			echo '
			

		
    
  		 <input type="hidden" id="adminApp"  	 value="' . $adminApp . '" >
         <input type="hidden" id="takecarcc"  	value="' . $takecar . '" >
			 
			 
			 
			 
			 
			 <!---APROVAL LINE--->

			 </div>';
		}
		echo '
			<script src="' . URL . 'public/js/jquery.js">	</script>
			<script>
			$(document).ready(function(){
			$(".lineok").hide();
			$("#showDriver").hide();	
			
			
			 $(".appManager").click(function(){
		   
		     var r = confirm("Are you sure you want to approved?");
			if (r == true) {
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			
			 
			 
			  $.ajax({
					url:  "' . URL . 'Request/UpdateStatus?type=linemanager&&id=" + id,
					type: "GET",
					data: { id:id },
					success: function(response){
						//alert(response);
						alert("Approved!");
						 
						 $(".appManager").attr("disabled", true);
						 $(".appAdmin").attr("disabled", false);
							$.ajax({    //create an ajax request to display.php
								type: "GET",
								url: "' .  URL  . 'Request/getListRequestUser?id=' . $userid . '",             
								dataType: "html",   //expect html to be returned                
								success: function(response){                    
									$("#response").html(response); 
									
								}

							});


						
					}
				});
			 
			}
			 return false;
		});
	
	   $(".closemd").click(function(){		   
		   $("#showDriver").hide();
		   
		   return false;
		});
		
	   $(".appAdmin").click(function(){	
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			//alert(id);
		   $("#ridget").val(id);
		   $("#showDriver").show();
		   
		   return false;
		});
		
	   $("#sendDriver").submit(function(){   
		   var r = confirm("Are you sure you want to approved?");
			if (r == true) {
				$.ajax({
								type: "POST",
									url: "' .  URL  . 'Request/UpdateStatusDriverCarReq",         
								data: $(this).serialize()
								})
								.done(function(data){
								//alert(data);
								if(data=="The driver is not available!"){
									alert(data);
								}else{
									$("#showDriver").hide();
									$(".cancelBook").attr("disabled", true);
									$(".appManager").attr("disabled", true);
									$(".appAdmin").attr("disabled", true);
									$.ajax({    //create an ajax request to display.php
										type: "GET",
										url: "' .  URL  . 'Request/getListRequestUser?id=' . $userid . '",             
										dataType: "html",   //expect html to be returned                
										success: function(response){  
											
											$("#response").html(response); 
											
										}

									});
								}
								
								
								
								})
								.fail(function() {
								alert( "Posting failed." );
								});
						
			 
			 
			}
			 return false;
		});
		
	   $(".cancelBook").click(function(){
		    var r = confirm("Are you sure you want to cancel?");
			if (r == true) {
		    var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
						
			 
			  $.ajax({
					url: "' . URL . 'Request/CancelledRequest?type=cancelled&&id=" + id,
					type: "GET",
					data: { id:id },
					success: function(response){
						 alert("Cancelled!");
						 alert(response);
						
						 $(".cancelBook").attr("disabled", true);
						 $(".appManager").attr("disabled", true);
						 $(".appAdmin").attr("disabled", true);
						 $.ajax({    //create an ajax request to display.php
								type: "GET",
								url: "' .  URL  . 'Request/getListRequestUser?id=' . $userid . '",             
								dataType: "html",   //expect html to be returned                
								success: function(response){                    
									$("#response").html(response); 
									
								}

							});
					}
				});
			 
			}
			 return false;
		});
		});
</script>
	

<div class="modal " id="showDriver">
<form method="post" id="sendDriver">
       <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Select Driver </h4>
              <button type="button" class="close closemd" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body scroll" style="">	
				<input type="hidden" id="ridget" name="rid">
				<select class="form-control" name="driverId">
					<option value="0">Drive by self</option>';

		// print_r($listdriver);
		foreach ($listdriver as $app) {
			if (isset($app->driverId))  $driverId = $app->driverId;
			if (isset($app->Dfname))  $Dfname = $app->Dfname;
			echo '<option value="' . $driverId . '">' . $Dfname . '</option>';
		}
		echo '
				</select>
				<div id="driverres"></div>
            </div>
            
            
										
										
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger closemd" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success ">Approved</button>
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </form>
  
</div>	
	  				
	';
	}



	public function ViewDetailpro()
	{
		$rid = //$_GET["id"];
			$id = $_GET["id"];
		$RequestModel = $this->loadModel('RequestModel');


		$listdriver = $RequestModel->DriverList();

		$listDetail = $RequestModel->RequestReturnListInfo($rid);

		//echo "<pre>";
		//	print_r($listDetail);
		//echo "</pre>";
		foreach ($listDetail as $app) {
			if (isset($app->departdate))  $departdate = $app->departdate;
			if (isset($app->daparttime))  $daparttime = $app->daparttime;
			if (isset($app->datereturn))  $datereturn = $app->datereturn;
			if (isset($app->returntime))  $returntime = $app->returntime;
			if (isset($app->rstatus))  $rstatus = $app->rstatus;
			if (isset($app->location))  $location = $app->location;
			if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
			if (isset($app->purpose))  $purpose = $app->purpose;
			if (isset($app->makername))  $makername = $app->makername;
			if (isset($app->modelname))  $modelname = $app->modelname;
			if (isset($app->plate))  $plate = $app->plate;
			if (isset($app->vcolor))  $vcolor = $app->vcolor;
			if (isset($app->mileage))  $mileage = $app->mileage;
			if (isset($app->cname))  $cname = $app->cname;
			if (isset($app->department))  $department = $app->department;
			if (isset($app->Dfname)) {
				$Dfname = $app->Dfname;
			} else {
				$Dfname = '';
			}
			if (isset($app->Email))  $Email = $app->Email;
			if (isset($app->fullname))  $fullname = $app->fullname;
			if (isset($app->plate))  $plate = $app->plate;
			if (isset($app->vcolor))  $vcolor = $app->vcolor;
			if (isset($app->mileage))  $mileage = $app->mileage;
			if (isset($app->vrno))  $vrno = $app->vrno;
			if (isset($app->userid))  $userid = $app->userid;
			if (isset($app->username))  $username = $app->username;
			if (isset($app->contact))  $contact = $app->contact;
			if (isset($app->rstatus))  $rstatus = $app->rstatus;
			if (isset($app->lineManager))  $lineManager = $app->lineManager;
			if (isset($app->adminApp))  $adminApp = $app->adminApp;
			if (isset($app->takecar))  $takecar = $app->takecar;
			if (isset($app->returncar))  $returncar = $app->returncar;
			if (isset($app->drivertype))  $drivertype = $app->drivertype;

			if (isset($app->returnTimekey)) {
				$returncardate = $app->returnTimekey;
			} else {
				$returncardate = '';
			}
			if (isset($app->takecardate)) {
				$takecardate = $app->takecardate;
			} else {
				$takecardate = '';
			}
			if (isset($app->adminFn)) {
				$adminFn = $app->adminFn;
			} else {
				$adminFn = '';
			}
			if (isset($app->lineFn)) {
				$lineFn = $app->lineFn;
			} else {
				$lineFn = '';
			}
			if (isset($app->linemanagerappdate)) {
				$linemanagerappdate = $app->linemanagerappdate;
			} else {
				$linemanagerappdate = '';
			}
			if (isset($app->adminappdate)) {
				$adminappdate = $app->adminappdate;
			} else {
				$adminappdate = '';
			}
			if (isset($app->dateRequest)) {
				$dateRequest = $app->dateRequest;
			} else {
				$dateRequest = '';
			}
			if (isset($app->linemanagerpic)) {
				$linemanagerpic = $app->linemanagerpic;
			} else {
				$linemanagerpic = '';
			}
			if (isset($app->adminapppic)) {
				$adminapppic = $app->adminapppic;
			} else {
				$adminapppic = '';
			}
			if (isset($app->reqppic)) {
				$reqppic = $app->reqppic;
			} else {
				$reqppic = '';
			}

			$dateRequest1 =  $dateRequest;
			$dateRequest = date_create($dateRequest);
			$dateRequest = date_format($dateRequest, "D jS \of M Y");

			$departdate = date_create($departdate);
			$departdate = date_format($departdate, "D jS \of M Y");

			$datereturn = date_create($datereturn);
			$datereturn = date_format($datereturn, "D jS \of M Y");


			echo '
			
				
			
			
			<div class="row">
				<div class="col-md-12 text-center">
				<center>
				<br>
				 <div class="hori-timeline" dir="ltr">
				 
				 

                    <ul class="list-inline events">
                        
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="' . URL . 'public/img/profile/' . $reqppic . '"  style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
								</div>
								
                                ';
			if ($rstatus == 'Booked') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} elseif ($rstatus == 'Pending') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($rstatus == 'Completed') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} elseif ($rstatus == 'Cancelled') {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}

			echo '
                                <h6 class="labelmodal laotext">REQUESTOR</h6>
								<p style="font-size:10px">' . $dateRequest1 . '</p>
                               
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">';


			if ($linemanagerpic == '') {
				echo '<div class="event-date text-center">
									<img src="' . URL . 'public/img/linemanager.png"  width="50px">
								</div>';
			} else {
				echo '	<div class="event-date text-center">
										<img src="' . URL . 'public/img/profile/' . $linemanagerpic . '"  width="50px"
										style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
									</div>';
			}


			if ($lineManager == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($lineManager == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}


			echo '
								  <h6 class="labelmodal laotext">LINE MANAGER</h6>';
			if ($linemanagerappdate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $linemanagerappdate . '</p>';
			}
			echo '	
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                
								';

			if ($adminapppic == '') {
				echo '<div class="event-date text-center">
									<img src="' . URL . 'public/img/linemanager.png"  width="50px">
								</div>';
			} else {
				echo '	<div class="event-date text-center">
										<img src="' . URL . 'public/img/profile/' . $adminapppic . '"
										style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
									</div>';
			}


			if ($adminApp == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($adminApp == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}

			echo '
                                  <h6 class="labelmodal laotext">ADMIN HEAD</h6>';

			if ($adminappdate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $adminappdate . '</p>';
			}
			echo '
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="' . URL . 'public/img/profile/' . $reqppic . '"  width="50px" style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
								</div>
								';


			if ($takecar == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($takecar == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}


			echo '
                                  <h6 class="labelmodal laotext">TAKE CAR</h6>';

			if ($takecardate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $takecardate . '</p>';
			}
			echo '
								
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="' . URL . 'public/img/profile/' . $reqppic . '"    style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
								</div>
								';

			if ($returncar == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($returncar == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}


			echo '
                                  <h6 class="labelmodal">RETURN</h6>';

			if ($returncardate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $returncardate . '</p>';
			}
			echo '
                               
                            </div>
                        </li>
                        
                       
                    </ul>
              
			</div>
			</center>
			</div>
			</div>';
			if ($lineManager == 'C') {
				echo '<div class="row">
				<div class="col-md-6" style="margin-top: 15px;">
				<p class="labelmodal">LINE MANAGER FULLNAME</p>
				 <input type="text" name="fname"  
						 disabled class="form-control  text" style="background:#fff"
						 value="' . $lineFn . '" >
				</div>
				<div class="col-md-6" style="margin-top: 15px;">
				<p class="labelmodal">ADMIN FULLNAME</p>
				 <input type="text" name="fname"  
						 disabled class="form-control  text" style="background:#fff"
						 value="' . $adminFn . '" >
				</div>
			</div>';
			}

			echo '
			<hr>
			
			<div class="row">
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal"> User ID</p>
						 <input type="hidden" name="userid" id="cmodel" >
						 <input type="text" name="fname"  
						 disabled class="form-control  text" style="background:#fff"
						 value="' . $username . '" >
					</div>
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal">Business Unit</p>
						 <input type="text" name="cid"  disabled class="form-control  text"  style="background:#fff"value="' . $cname . '" >
					</div>
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal">Fullname</p>
					
						 <input type="text" name="fname"     disabled class="form-control  text" value="' . $fullname . '"  style="background:#fff">
					</div>
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal">Department</p>
						 <input type="text" name="cid"    disabled class="form-control  text" value="' . $department . '" style="background:#fff">
					</div>
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal">Contact</p>
					
						 <input type="text" name="fname"   
						   disabled class="form-control  text" value="' . $contact . '"  style="background:#fff">
					</div>
					<div class="col-md-2" style="margin-top: 15px;">
						<p class="labelmodal">VRNO.</p>
						
						 <input type="text" disabled    disabled class="form-control  text" value="' . $vrno . '" style="background:#fff">
					</div>
					
					
				 </div>
				
				<hr>
			 <div class="row">
					<div class="col-md-3" style="margin-top: 15px;">
						<div class="form-group">
						  <label class="labelmodal"> Departure Date:</label>
							
								<input type="text" class="form-control  text datetimepicker-input" required disabled style="background:#fff"
								value="' . strtoupper($departdate) . '">
								
						</div>
					</div>
					<div class="col-md-3" style="margin-top: 15px;">
						  <label class="labelmodal"> Departure Time:</label>
							<input type="time" class="form-control  text datetimepicker-input"   style="background:#fff"
							disabled value="' . $daparttime . '">
					</div>
					<div class="col-md-3" style="margin-top: 15px;">
						<div class="form-group">
						  <label class="labelmodal"> Arrival Date:</label>							
								<input type="text" class="form-control  text datetimepicker-input" required disabled style="background:#fff"
								value="' . strtoupper($datereturn) . '">
							</div>
					</div>
					<div class="col-md-3" style="margin-top: 15px;">
						  <label class="labelmodal"> Arrival Time:</label>
							<input type="time" class="form-control  text datetimepicker-input" required  style="background:#fff"
							disabled value="' . strtoupper($returntime) . '">
					</div>
					
					
			 </div>
			 <div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label class="labelmodal"> Location</label>
							 <input type="text" class="form-control  text datetimepicker-input" required name="location" disabled	value="' . strtoupper($location) . '" style="background:#fff">
						</div>
					</div>
					<div class="col-md-4" style="margin-top: 15px;">
						  <label class="labelmodal">Purpose</label>
							<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="' . strtoupper($purpose) . '">
					</div>
					<div class="col-md-4" style="margin-top: 15px;">
						  <label class="labelmodal"> Driver Type</label>';

			if ($drivertype == 0) {
				echo '<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="Drive by self">';
			} else {
				echo '<input type="text" class="form-control  text datetimepicker-input" required name="purpose" style="background:#fff" disabled value="Request Driver">';
			}
			echo '
					</div>
					
			 </div>
			 
		
			 <div class="row">
					
					<div class="col-md-4" style="margin-top: 15px;">
						  <label class="labelmodal"> Vehicle</label>
							<input type="text" class="form-control  text datetimepicker-input" required style="background:#fff" name="purpose" disabled value="' . strtoupper($makername) . ' ' . strtoupper($modelname) . ' #' . strtoupper($plate) . '  ">
					</div>
					<div class="col-md-4" style="margin-top: 15px;">
						  <label class="labelmodal"> ODM </label>
							<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="' . number_format($mileage) . '">
					</div>
					<div class="col-md-4" style="margin-top: 15px;">
						  <label class="labelmodal"> Color</label>
							<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="' . strtoupper($vcolor) . '">
					</div>
			 </div>
			 
		
			<hr>
			';
			if ($rstatus == 'Booked' || $rstatus == 'Cancelled' || $rstatus == 'Completed') {
				echo '<button  disabled class="btn btn-xs  bg-gradient-success btn-flat " disabled id="del_' . $rid . '" >
											<i class="fas fa-check"></i> Line Manager
										</button>
										<button class="btn btn-xs  bg-gradient-info btn-flat "  disabled id="del_' . $rid . '">
										<i class="fas fa-check"></i>  Admin
										</button>
										<button class="btn btn-xs   bg-gradient-danger btn-flat "    disabled id="del_' . $rid . '">
											<i class="fas fa-times"></i>  Cancel Request
										</button>
									
            
										';
			} else {
				if ($lineManager == 'C') {
					echo '
										<button  disabled class="btn btn-xs  bg-gradient-success btn-flat appManager" id="del_' . $rid . '">
											<i class="fas fa-check"></i> Line Manager
										</button>
										<button class="btn btn-xs  bg-gradient-info btn-flat appAdmin"  id="del_' . $rid . '">
										<i class="fas fa-check"></i> Admin 
										</button>
										<button class="btn btn-xs   bg-gradient-danger btn-flat cancelBook"    id="del_' . $rid . '">
											<i class="fas fa-times"></i>  Cancel Request
										</button>
										
            
										
										';
				} else {
					echo '
									<button class="btn btn-xs  bg-gradient-success btn-flat appManager" id="del_' . $rid . '">
										<i class="fas fa-check"></i> Line Manager
									</button>
									<button class="btn btn-xs   bg-gradient-primary btn-flat appAdmin"  disabled id="del_' . $rid . '">
										<i class="fas fa-check"></i> Admin
									</button>								
									<button class="btn btn-xs   bg-gradient-danger btn-flat cancelBook"    id="del_' . $rid . '">
											<i class="fas fa-times"></i> Cancel Request
									</button>
									
            
										
										
										';
				}
			}
		}
		echo '
			<script src="' . URL . 'public/js/jquery.js">	</script>
			<script>
			$(document).ready(function(){
			$(".lineok").hide();
			$("#showDriver").hide();	
			
			
			 $(".appManager").click(function(){
		   
		     var r = confirm("Are you sure you want to approved?");
			if (r == true) {
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			
			 
			 
			  $.ajax({
					url:  "' . URL . 'Request/UpdateStatus?type=linemanager&&id=" + id,
					type: "GET",
					data: { id:id },
					success: function(response){
						//alert(response);
						alert("Approved!");
						 
						 $(".appManager").attr("disabled", true);
						 $(".appAdmin").attr("disabled", false);
							$.ajax({    //create an ajax request to display.php
								type: "GET",
								url: "' .  URL  . 'Request/getListRequestUser?id=' . $userid . '",             
								dataType: "html",   //expect html to be returned                
								success: function(response){                    
									$("#response").html(response); 
									
								}

							});


						
					}
				});
			 
			}
			 return false;
		});
	
	   $(".closemd").click(function(){		   
		   $("#showDriver").hide();
		   
		   return false;
		});
		
	   $(".appAdmin").click(function(){	
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			//alert(id);
		   $("#ridget").val(id);
		   $("#showDriver").show();
		   
		   return false;
		});
		
	   $("#sendDriver").submit(function(){   
		   var r = confirm("Are you sure you want to approved?");
			if (r == true) {
				$.ajax({
								type: "POST",
									url: "' .  URL  . 'Request/UpdateStatusDriverCarReq",         
								data: $(this).serialize()
								})
								.done(function(data){
								//alert(data);
								if(data=="The driver is not available!"){
									alert(data);
								}else{
									$("#showDriver").hide();
									$(".cancelBook").attr("disabled", true);
									$(".appManager").attr("disabled", true);
									$(".appAdmin").attr("disabled", true);
									$.ajax({    //create an ajax request to display.php
										type: "GET",
										url: "' .  URL  . 'Request/getListRequestUser?id=' . $userid . '",             
										dataType: "html",   //expect html to be returned                
										success: function(response){  
											
											$("#response").html(response); 
											
										}

									});
								}
								
								
								
								})
								.fail(function() {
								alert( "Posting failed." );
								});
						
			 
			 
			}
			 return false;
		});
		
	   $(".cancelBook").click(function(){
		    var r = confirm("Are you sure you want to cancel?");
			if (r == true) {
		    var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
						
			 
			  $.ajax({
					url: "' . URL . 'Request/CancelledRequest?type=cancelled&&id=" + id,
					type: "GET",
					data: { id:id },
					success: function(response){
						 alert("Cancelled!");
						 //alert(response);
						
						 $(".cancelBook").attr("disabled", true);
						 $(".appManager").attr("disabled", true);
						 $(".appAdmin").attr("disabled", true);
						 $.ajax({    //create an ajax request to display.php
								type: "GET",
								url: "' .  URL  . 'Request/getListRequestUser?id=' . $userid . '",             
								dataType: "html",   //expect html to be returned                
								success: function(response){                    
									$("#response").html(response); 
									
								}

							});
					}
				});
			 
			}
			 return false;
		});
		});
</script>
	
<div class="modal " id="showDriver">
<form method="post" id="sendDriver">
       <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Select Driver </h4>
              <button type="button" class="close closemd" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body scroll" style="">	
				<input type="hidden" id="ridget" name="rid">
				<select class="form-control" name="driverId">
					<option value="0">Drive by self</option>';

		// print_r($listdriver);
		foreach ($listdriver as $app) {
			if (isset($app->driverId))  $driverId = $app->driverId;
			if (isset($app->Dfname))  $Dfname = $app->Dfname;
			echo '<option value="' . $driverId . '">' . $Dfname . '</option>';
		}
		echo '
				</select>
				<div id="driverres"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger closemd" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success ">Approved</button>
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </form>
  
</div>	
	  				
	';
	}


	public function ViewDetailpro_1()
	{
		$rid = $_GET["id"];
		$id = $_GET["id"];
		$RequestModel = $this->loadModel('RequestModel');


		$listdriver = $RequestModel->DriverList();

		$listDetail = $RequestModel->RequestReturnListInfo($rid);

		//echo "<pre>";
		//	print_r($listDetail);
		//echo "</pre>";
		foreach ($listDetail as $app) {
			if (isset($app->departdate))  $departdate = $app->departdate;
			if (isset($app->daparttime))  $daparttime = $app->daparttime;
			if (isset($app->datereturn))  $datereturn = $app->datereturn;
			if (isset($app->returntime))  $returntime = $app->returntime;
			if (isset($app->rstatus))  $rstatus = $app->rstatus;
			if (isset($app->location))  $location = $app->location;
			if (isset($app->dateRequest))  $dateRequest = $app->dateRequest;
			if (isset($app->purpose))  $purpose = $app->purpose;
			if (isset($app->makername))  $makername = $app->makername;
			if (isset($app->modelname))  $modelname = $app->modelname;
			if (isset($app->plate))  $plate = $app->plate;
			if (isset($app->vcolor))  $vcolor = $app->vcolor;
			if (isset($app->mileage))  $mileage = $app->mileage;
			if (isset($app->cname))  $cname = $app->cname;
			if (isset($app->department))  $department = $app->department;
			if (isset($app->Dfname)) {
				$Dfname = $app->Dfname;
			} else {
				$Dfname = '';
			}
			if (isset($app->Email))  $Email = $app->Email;
			if (isset($app->fullname))  $fullname = $app->fullname;
			if (isset($app->plate))  $plate = $app->plate;
			if (isset($app->vcolor))  $vcolor = $app->vcolor;
			if (isset($app->mileage))  $mileage = $app->mileage;
			if (isset($app->vrno))  $vrno = $app->vrno;
			if (isset($app->userid))  $userid = $app->userid;
			if (isset($app->username))  $username = $app->username;
			if (isset($app->contact))  $contact = $app->contact;
			if (isset($app->rstatus))  $rstatus = $app->rstatus;
			if (isset($app->lineManager))  $lineManager = $app->lineManager;
			if (isset($app->adminApp))  $adminApp = $app->adminApp;
			if (isset($app->takecar))  $takecar = $app->takecar;
			if (isset($app->returncar))  $returncar = $app->returncar;
			if (isset($app->drivertype))  $drivertype = $app->drivertype;

			if (isset($app->returnTimekey)) {
				$returncardate = $app->returnTimekey;
			} else {
				$returncardate = '';
			}
			if (isset($app->takecardate)) {
				$takecardate = $app->takecardate;
			} else {
				$takecardate = '';
			}
			if (isset($app->adminFn)) {
				$adminFn = $app->adminFn;
			} else {
				$adminFn = '';
			}
			if (isset($app->lineFn)) {
				$lineFn = $app->lineFn;
			} else {
				$lineFn = '';
			}
			if (isset($app->linemanagerappdate)) {
				$linemanagerappdate = $app->linemanagerappdate;
			} else {
				$linemanagerappdate = '';
			}
			if (isset($app->adminappdate)) {
				$adminappdate = $app->adminappdate;
			} else {
				$adminappdate = '';
			}
			if (isset($app->dateRequest)) {
				$dateRequest = $app->dateRequest;
			} else {
				$dateRequest = '';
			}
			if (isset($app->linemanagerpic)) {
				$linemanagerpic = $app->linemanagerpic;
			} else {
				$linemanagerpic = '';
			}
			if (isset($app->adminapppic)) {
				$adminapppic = $app->adminapppic;
			} else {
				$adminapppic = '';
			}
			if (isset($app->reqppic)) {
				$reqppic = $app->reqppic;
			} else {
				$reqppic = '';
			}

			$dateRequest1 =  $dateRequest;
			// $dateRequest=date_create($dateRequest);
			// $dateRequest=date_format($dateRequest,"D jS \of M Y");

			// $departdate=date_create($departdate);
			// $departdate=date_format($departdate,"D jS \of M Y");

			// $datereturn=date_create($datereturn);
			// $datereturn=date_format($datereturn,"D jS \of M Y");


			echo '
			
				
			
			
			<div class="row">
				<div class="col-md-12 text-center">
				<center>
				<br>
				 <div class="hori-timeline" dir="ltr">
				 
				 

                    <ul class="list-inline events">
                        
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="' . URL . 'public/img/profile/' . $reqppic . '"  style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
								</div>
								
                                ';
			if ($rstatus == 'Booked') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} elseif ($rstatus == 'Pending') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($rstatus == 'Completed') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} elseif ($rstatus == 'Cancelled') {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}

			echo '
                                <h6 class="labelmodal laotext">REQUESTOR</h6>
								<p style="font-size:10px">' . $dateRequest1 . '</p>
                               
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">';


			if ($linemanagerpic == '') {
				echo '<div class="event-date text-center laotext">
									<img src="' . URL . 'public/img/linemanager.png"  width="50px">
								</div>';
			} else {
				echo '	<div class="event-date text-center">
										<img src="' . URL . 'public/img/profile/' . $linemanagerpic . '"  width="50px"
										style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
									</div>';
			}


			if ($lineManager == 'P') {
				echo '<center><div class="circledivPending laotext">P</div></center>	';
			} elseif ($lineManager == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}


			echo '
								  <h6 class="labelmodal laotext">LINE MANAGER</h6>';
			if ($linemanagerappdate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $linemanagerappdate . '</p>';
			}
			echo '	
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                
								';

			if ($adminapppic == '') {
				echo '<div class="event-date text-center">
									<img src="' . URL . 'public/img/linemanager.png"  width="50px">
								</div>';
			} else {
				echo '	<div class="event-date text-center">
										<img src="' . URL . 'public/img/profile/' . $adminapppic . '"
										style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
									</div>';
			}


			if ($adminApp == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($adminApp == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}

			echo '
                                  <h6 class="labelmodal">ADMIN HEAD</h6>';

			if ($adminappdate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $adminappdate . '</p>';
			}
			echo '</div>
        </li>
        <li class="list-inline-item event-list">
        <div class="px-1">
         <div class="event-date text-center">
									<img src="' . URL . 'public/img/profile/' . $reqppic . '"  width="50px" style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
								</div>';
			echo $isMob  ? "<br></br></br>" : "";

			if ($takecar == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($takecar == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}


			echo '
                                  <h6 class="labelmodal">TAKE CAR</h6>';

			if ($takecardate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $takecardate . '</p>';
			}
			echo '
								
                            </div>
                        </li>
                        <li class="list-inline-item event-list">
                            <div class="px-1">
                                <div class="event-date text-center">
									<img src="' . URL . 'public/img/profile/' . $reqppic . '"    style="vertical-align: middle;
												  width: 50px;
												  height: 50px;
												  border-radius: 50%;">
								</div>';
			echo $isMob  ? "<br></br></br>" : "";

			if ($returncar == 'P') {
				echo '<center><div class="circledivPending">P</div></center>	';
			} elseif ($returncar == 'C') {
				echo '<center><div class="circledivComplete">C</div></center>	';
			} else {
				echo '<center><div class="circledivCancel">X</div></center>	';
			}


			echo '
                                  <h6 class="labelmodal">RETURN</h6>';

			if ($returncardate == '') {
				echo ' <p style="font-size:10px"><br></p>';
			} else {
				echo ' <p style="font-size:10px">' . $returncardate . '</p>';
			}
			echo '
                               
                            </div>
                        </li>
                        
                       
                    </ul>
              
			</div>
			</center>
			</div>
			</div>';
			if ($lineManager == 'C') {
				echo '<div class="row">
				<div class="col-md-6">
				<p class="labelmodal">LINE MANAGER FULLNAME</p>
				 <input type="text" name="fname"  
						 disabled class="form-control  text" style="background:#fff"
						 value="' . $lineFn . '" >
				</div>
				<div class="col-md-6">
				<p class="labelmodal">ADMIN FULLNAME</p>
				 <input type="text" name="fname"  
						 disabled class="form-control  text" style="background:#fff"
						 value="' . $adminFn . '" >
				</div>
			</div>';
			}

			echo '
			<hr>
			
			<div class="row">
					<div class="col-md-2">
						<p class="labelmodal"> User ID</p>
						 <input type="hidden" name="userid" id="cmodel" >
						 <input type="text" name="fname"  
						 disabled class="form-control  text" style="background:#fff"
						 value="' . $username . '" >
					</div>
					<div class="col-md-2">
						<p class="labelmodal">Business Unit</p>
						 <input type="text" name="cid"  disabled class="form-control  text"  style="background:#fff"value="' . $cname . '" >
					</div>
					<div class="col-md-2">
						<p class="labelmodal">Fullname</p>
					
						 <input type="text" name="fname"     disabled class="form-control  text" value="' . $fullname . '"  style="background:#fff">
					</div>
					<div class="col-md-2">
						<p class="labelmodal">Department</p>
						 <input type="text" name="cid"    disabled class="form-control  text" value="' . $department . '" style="background:#fff">
					</div>
					<div class="col-md-2">
						<p class="labelmodal">Contact</p>
					
						 <input type="text" name="fname"   
						   disabled class="form-control  text" value="' . $contact . '"  style="background:#fff">
					</div>
					<div class="col-md-2">
						<p class="labelmodal">VRNO.</p>
						
						 <input type="text" disabled    disabled class="form-control  text" value="' . $vrno . '" style="background:#fff">
					</div>
					
					
				 </div>
				
				<hr>
			 <div class="row">
					<div class="col-md-3">
						<div class="form-group">
						  <label class="labelmodal"> Departure Date:</label>
							
								<input type="text" class="form-control  text datetimepicker-input" required disabled style="background:#fff"
								value="' . strtoupper($departdate) . '">
								
						</div>
					</div>
					<div class="col-md-3">
						  <label class="labelmodal"> Departure Time:</label>
							<input type="time" class="form-control  text datetimepicker-input"   style="background:#fff"
							disabled value="' . $daparttime . '">
					</div>
					<div class="col-md-3">
						<div class="form-group">
						  <label class="labelmodal"> Arrival Date:</label>							
								<input type="text" class="form-control  text datetimepicker-input" required disabled style="background:#fff"
								value="' . strtoupper($datereturn) . '">
							</div>
					</div>
					<div class="col-md-3">
						  <label class="labelmodal"> Arrival Time:</label>
							<input type="time" class="form-control  text datetimepicker-input" required  style="background:#fff"
							disabled value="' . strtoupper($returntime) . '">
					</div>
					
					
			 </div>
			 <div class="row">
					<div class="col-md-4">
						<div class="form-group">
						  <label class="labelmodal"> Location</label>
							 <input type="text" class="form-control  text datetimepicker-input" required name="location" disabled	value="' . strtoupper($location) . '" style="background:#fff">
						</div>
					</div>
					<div class="col-md-4">
						  <label class="labelmodal">Purpose</label>
							<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="' . strtoupper($purpose) . '">
					</div>
					<div class="col-md-4">
						  <label class="labelmodal"> Driver Type</label>';

			if ($drivertype == 0) {
				echo '<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="Drive by self">';
			} else {
				echo '<input type="text" class="form-control  text datetimepicker-input" required name="purpose" style="background:#fff" disabled value="Request Driver">';
			}
			echo '
					</div>
					
			 </div>
			 
		
			 <div class="row">
					
					<div class="col-md-4">
						  <label class="labelmodal"> Vehicle</label>
							<input type="text" class="form-control  text datetimepicker-input" required style="background:#fff" name="purpose" disabled value="' . strtoupper($makername) . ' ' . strtoupper($modelname) . ' #' . strtoupper($plate) . '  ">
					</div>
					<div class="col-md-4">
						  <label class="labelmodal"> ODM </label>
							<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="' . number_format($mileage) . '">
					</div>
					<div class="col-md-4">
						  <label class="labelmodal"> Color</label>
							<input type="text" class="form-control  text datetimepicker-input" style="background:#fff" required name="purpose" disabled value="' . strtoupper($vcolor) . '">
					</div>
			 </div>
			 
		
			<hr>
			';
			if ($rstatus == 'Booked' || $rstatus == 'Cancelled' || $rstatus == 'Completed') {
				echo '<button  disabled class="btn btn-xs  bg-gradient-success btn-flat " disabled id="del_' . $rid . '" >
											<i class="fas fa-check"></i> Line Manager
										</button>
										<button class="btn btn-xs  bg-gradient-info btn-flat "  disabled id="del_' . $rid . '">
										<i class="fas fa-check"></i>  Admin
										</button>
										<button class="btn btn-xs   bg-gradient-danger btn-flat "    disabled id="del_' . $rid . '">
											<i class="fas fa-times"></i>  Cancel Request
										</button>
									
            
										';
			} else {
				if ($lineManager == 'C') {
					echo '
										<button  disabled class="btn btn-xs  bg-gradient-success btn-flat appManager" id="del_' . $rid . '">
											<i class="fas fa-check"></i> Line Manager
										</button>
										<button class="btn btn-xs  bg-gradient-info btn-flat appAdmin"  id="del_' . $rid . '">
										<i class="fas fa-check"></i> Admin 
										</button>
										<button class="btn btn-xs   bg-gradient-danger btn-flat cancelBook"    id="del_' . $rid . '">
											<i class="fas fa-times"></i>  Cancel Request
										</button>
										
            
										
										';
				} else {
					echo '
									<button class="btn btn-xs  bg-gradient-success btn-flat appManager" id="del_' . $rid . '">
										<i class="fas fa-check"></i> Line Manager
									</button>
									<button class="btn btn-xs   bg-gradient-primary btn-flat appAdmin"  disabled id="del_' . $rid . '">
										<i class="fas fa-check"></i> Admin
									</button>								
									<button class="btn btn-xs   bg-gradient-danger btn-flat cancelBook"    id="del_' . $rid . '">
											<i class="fas fa-times"></i> Cancel Request
									</button>
									
            
										
										
										';
				}
			}
		}
		echo '
			<script src="' . URL . 'public/js/jquery.js">	</script>
			<script>
			$(document).ready(function(){
				
				
				
			$(".lineok").hide();
			$("#showDriver").hide();	
			
			
			
			
			
			 $(".appManager").click(function(){
		   
		     var r = confirm("Are you sure you want to approved?");
			if (r == true) {
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			
			 
			 
			  $.ajax({
					url:  "' . URL . 'Request/UpdateStatus?type=linemanager&&id=" + id,
					type: "GET",
					data: { id:id },
					success: function(response){
						//alert(response);
						alert("Approved!");
						 
						 $(".appManager").attr("disabled", true);
						 $(".appAdmin").attr("disabled", false);
							$.ajax({    //create an ajax request to display.php
										type: "GET",
										url:  "' . URL . 'Request/ApproveRequestList",             
										dataType: "html",   //expect html to be returned                
										success: function(response){                    
											$("#response").html(response); 
											//alert(response);
										}

								});
								 return false;


						
					}
				});
			 
			}
			 return false;
		});
	
	   $(".closemd").click(function(){		   
		   $("#showDriver").hide();
		   
		   return false;
		});
		
	   $(".appAdmin").click(function(){	
			var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
			//alert(id);
		   $("#ridget").val(id);
		   $("#showDriver").show();
		   
		   return false;
		});
		
	   $("#sendDriver").submit(function(){   
		   var r = confirm("Are you sure you want to approved?");
			if (r == true) {
				$.ajax({
								type: "POST",
									url: "' .  URL  . 'Request/UpdateStatusDriverCarReq",         
								data: $(this).serialize()
								})
								.done(function(data){
								//alert(data);
								if(data=="The driver is not available!"){
									alert(data);
								}else{
									//	alert(data);
									$("#showDriver").hide();
									$(".cancelBook").attr("disabled", true);
									$(".appManager").attr("disabled", true);
									$(".appAdmin").attr("disabled", true);
									
									
								}
								
								$.ajax({    //create an ajax request to display.php
										type: "GET",
										url:  "' . URL . 'Request/ApproveRequestList",             
										dataType: "html",   //expect html to be returned                
										success: function(response){                    
											$("#response").html(response); 
											//alert(response);
										}

								});
								 return false;
								})
								.fail(function() {
								alert( "Posting failed." );
								});
						
			 
			 
			}
			 return false;
		});
		
	   $(".cancelBook").click(function(){
		    var r = confirm("Are you sure you want to cancel?");
			if (r == true) {
		    var el = this;
			var id = this.id;
			var splitid = id.split("_");

			// id
			var id = splitid[1];
						
			 
			  $.ajax({
					url: "' . URL . 'Request/CancelledRequest?type=cancelled&&id=" + id,
					type: "GET",
					data: { id:id },
					success: function(response){
						 alert("Cancelled!");
						 //alert(response);
						
						 $(".cancelBook").attr("disabled", true);
						 $(".appManager").attr("disabled", true);
						 $(".appAdmin").attr("disabled", true);
						 $.ajax({    //create an ajax request to display.php
										type: "GET",
										url:  "' . URL . 'Request/ApproveRequestList",             
										dataType: "html",   //expect html to be returned                
										success: function(response){                    
											$("#response").html(response); 
											//alert(response);
										}

								});
								 return false;
					}
				});
			 
			}
			 return false;
		});
		});
</script>
	
<div class="modal " id="showDriver">
<form method="post" id="sendDriver">
       <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Select Driver </h4>
              <button type="button" class="close closemd" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body scroll" style="">	
				<input type="hidden" id="ridget" name="rid">
				
				<select class="form-control" name="driverId">
					<option value="0">Drive by self</option>';

		// print_r($listdriver);
		foreach ($listdriver as $app) {
			if (isset($app->driverId))  $driverId = $app->driverId;
			if (isset($app->Dfname))  $Dfname = $app->Dfname;
			echo '<option value="' . $driverId . '">' . $Dfname . '</option>';
		}
		echo '
				</select>
				<div id="driverres"></div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger closemd" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success ">Approved</button>
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        </form>
  
</div>	
	  				
	';
	}
}
