<?php
Session_Start();
require './application/controller/EmailController.php';

class Stationary extends Controller
{
	/**
	 * PAGE: index
	 * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
	 */



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


				$CleaningModel = $this->loadModel('CleaningModel'); // calling a model
				$listbusiness = $CleaningModel->loadcompany(); // this call function in the model
				$StationaryModel = $this->loadModel('StationaryModel'); // calling a model
				$cat = $StationaryModel->Loadcategory();
				//$username= $StationaryModel-> loaduser();	// this call function in the model // add 01/06/2021



				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/stationary/index.php';
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




	public function ApproveStationary()
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


				$CleaningModel = $this->loadModel('CleaningModel'); // calling a model
				$listbusiness = $CleaningModel->loadcompany(); // this call function in the model
				$StationaryModel = $this->loadModel('StationaryModel'); // calling a model
				$cat = $StationaryModel->Loadcategory();

				//$username= $StationaryModel-> loaduser();	// this call function in the model // add 01/06/2021



				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/stationary/approve.php';
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


	public function LoadData()
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




				$StationaryModel = $this->loadModel('StationaryModel');

				$position = $_SESSION['SESS_MEMBER_POS'];

				if ($position == "LineManager") {
					$dep = $_SESSION['SESS_MEMBER_depid'];
					$list1 = $StationaryModel->LoadRequestdep($dep);
				} else {
					$list1 = $StationaryModel->LoadRequest($userId);
				}

				if (count($list1) > 0) {
					require 'application/views/stationary/request.php';
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











	public function LoadProduct()
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




				$catid = $_GET["catid"];
				$StationaryModel = $this->loadModel('StationaryModel');
				$list1 = $StationaryModel->loadStock($catid);

				echo
				'<b>Product /<span class="laotext">ຊື່ອຸປະກອນ</span></b>
						<div class="input-group mb-3">
						  <select class="form-control" name="barcode" id="barcode" required>';
				echo '<option value="0">--Select Product/<span class="laotext">ເລືອກອຸປະກອນ</span>--</option>';
				foreach ($list1 as $app) {
					if (isset($app->barcode)) {
						$barcode = $app->barcode;
					} else {
						$barcode = "";
					}
					if (isset($app->pname)) {
						$pname = $app->pname;
					} else {
						$pname = "";
					}
					if (isset($app->qty)) {
						$qty  = $app->qty;
					} else {
						$qty  = "";
					}
					if (isset($app->id)) {
						$id = $app->id;
					} else {
						$id = "";
					}
					// $pname = strlen($pname) > 50 ? substr($pname,0,50)."..." : $pname;


					echo '<option value="' . $id . '">' . $barcode . ' - Name: ' . $pname . '</option>';
				}

				echo '
						  </select>
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-id-card"></i></span>
						  </div>
						</div>





						<script type="text/javascript">
							$(document).ready(function() {
							$("#barcode").change(function(){
							var barcode=$("#barcode").val();
							if(barcode==0){
								$("#save").hide();
								$("#addreq").hide();
							}else{
								$.ajax({
												type: "GET",
												url: "' .  URL  . '" + "Stationary/ImageLoad?barcode=" + barcode,
												dataType: "html",   //expect html to be returned
												success: function(response){
														$("#imgdata").html(response);
														//alert(response);
														$("#save").show();
														$("#addreq").show();
												}

											});

							}
							return false;





						});



					});

					</script>


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

	public function ImageLoad()
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


				$StockModel = $this->loadModel('StockModel');
				$barcode = $_GET["barcode"];
				$list = $StockModel->getPhoto($barcode);
				foreach ($list as $app) {
					if (isset($app->photo)) {
						$photo = $app->photo;
					} else {
						$photo = '';
					}
					echo "<img src='https://aifgrouplaos.la/public/img/stock/" . $photo . "' class='img-fluid'/>";
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




	public function LoadStock()
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




				$cid = $_GET["cid"];
				$StationaryModel = $this->loadModel('StationaryModel');
				$list1 = $StationaryModel->LoadData($cid);
				$name =	$_SESSION['SESS_MEMBER_Fname'];
				echo
				'<b>User/<span class="laotext">ຜູ້ໃຊ້</b>
						<div class="input-group mb-3">

							 <input class="form-control" name="userid" id="userid"
							 value="' . $userId . '" type="hidden" required>
			<input class="form-control"
							 value="' . $name . '" type="text" required>';


				/* <select class="form-control" name="userid" id="userid" required>';
						  echo '';
								foreach ($list1 as $app) {
																if (isset($app->userid)){  $id= $app->userid;}else{$id="";}
																  if (isset($app->userid )) { $userid = $app->userid ;	}else{$userid ="";}
																  if (isset($app->username  )) { $username  = $app->username  ;	}else{$username  ="";}
																  if (isset($app->fullname)) { $fullname= $app->fullname;	}else{$fullname="";}
																	if (isset($app->pname)){  $pname= $app->pname;	}else{$pname="";}
																	if (isset($app->contact)){  $contact= $app->contact;	}else{$contact="";}
																	if (isset($app->Email)){  $Email= $app->Email;}else{$Email="";}
																	if (isset($app->profile)){  $profile= $app->profile;	}else{$profile="";}
																	if (isset($app->company)) { $company= $app->company;	}else{$company="";}
																	if (isset($app->department)) { $department= $app->department;	}else{$department="";}
																echo '<option value="'.$userid.'">'.$fullname.' - ('.$department.')</option>';
															}

						echo '
						  </select>
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-id-card"></i></span>
						  </div>*/

				echo '
						</div>';
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




	// stationary request ==================

	public function AddData()
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
				$id = $_POST["id"];
				$cid = $_POST["cid"];
				$userid = $_POST["userid"];
				$adminid = '1';
				$catid = $_POST["catid"];
				$qty = $_POST["qty"];
				$dateneed = $_POST["dateneed"];
				$barcode = $_POST["barcode"];
				// $productid = $_POST["productid"];
				$remark = $_POST["remark"];



				$StationaryModel = $this->loadModel('StationaryModel');
				$totalqty = 0;
				$totalqty = $StationaryModel->CheckBarcode($barcode);


				if ($totalqty >= $qty) {
					$total = 0;
					$total = $StationaryModel->CheckDuplicate($id);
					if ($total == 0) {
						$unitprice = 0;
						$unitprice = $StationaryModel->getUnitBarcode($barcode);

						$totalcost = $qty * $unitprice;
						$StationaryModel->Updateproduct($barcode, $qty);
						$date1 = date("Y-m-d H:i:s");
						$id = $StationaryModel->AddData($id, $userid, $barcode, $qty, $dateneed, $date1, $remark, $totalcost);



						$StockModel = $this->loadModel('StockModel');
						$productid = $barcode;
						$unitprice = 0;
						$unitprice = $StockModel->getunitprice($productid);
						$datein = date("Y-m-d H:i:s");
						$newqty = $qty * -1;
						$Totalcost = ($newqty *  $unitprice);
						$StockModel->AddStock($productid, $newqty, $unitprice, $Totalcost, $datein);
						// add new =====================

						$loadstationary_request = $StationaryModel->getRequest_stationary($id);

						// print_r($loadstationary_request);

						foreach ($loadstationary_request as $app) {

							if (isset($app->requester_name))  $requester_name = $app->requester_name;
							if (isset($app->position))  $position = $app->position;
							if (isset($app->product_name))  $product_name = $app->product_name;
							if (isset($app->dateneed))  $dateneed = $app->dateneed;
							if (isset($app->quantity))  $quantity = $app->quantity;
						}

						$msg = ' New Request stationary(' . $product_name . ')';
						$product_name = $product_name;
						$requester_name = $requester_name;
						$dateneed = $dateneed;
						$quantity = $quantity;

						// find email Super Administrator
						$admin_email = $StationaryModel->getAdministrator('Administration');

						foreach ($admin_email as $value) {
							$email_send = isset($value->Email) ? $value->Email : '';
							// send email notification to Administrator

							// email finction close temporary and reopen when email migrate done ============
							// $UserData = new SendMail\RequestUser_stationary('' . URL_APPROVER . 'Stationary/index', $msg, $product_name, $requester_name, $dateneed, $quantity);
							// $templete = $UserData->getUser_stationary();
							// $email =  new SendMail\ConfigMail($email_send, 'New stationary request from staff');
							// $ch = $email->getSendEamil($email->RequestEamil_stationary($templete));
							// if ($ch == 'Not Found') {
							// 	continue;
							// }

							// email finction close temporary and reopen when email migrate done ============
						}
					} else {
						echo "<i style='color:red'>Already Exist!</i>";
					}
				} else {
					echo "<i style='color:red'>Insufficient stock. Available stock is/ເຄື່ອງທີ່ທ່ານເບີກບໍ່ພຽງພໍ.ຍັງເຫຼືອແມ່ນ: " . $totalqty . "</i>";
				}
				echo "Create Successfully!";
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


	public function AppLine()
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

				//print_r($_POST);
				$id = $_GET["id"];



				$date1 = date("Y-m-d H:i:s");
				$StationaryModel = $this->loadModel('StationaryModel');
				$StationaryModel->ApproveLine($id, $date1, $userId);
				$StationaryModel->updateStatus($id, 'Approved by Line Manager');
				$listEmail = $StationaryModel->getRequestEmail($id);

				echo "Approved Successfully!";
				foreach ($listEmail as $app) {
					if (isset($app->id)) {
						$id = $app->id;
					} else {
						$id = "";
					}
					if (isset($app->reqCode)) {
						$reqCode = $app->reqCode;
					} else {
						$reqCode = "";
					}
					if (isset($app->Email)) {
						$Email = $app->Email;
					} else {
						$Email = "";
					}

					$subject = "Approved Request Stationary";
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
																						<h4>Approved Request Stationary</h4>
																						============================================================================

																						</td>
																					</tr>


																				   <tr>
																					<td>
																					<table style="padding: 0px 30px 0px 30px;">
																						<tr class="service">
																						<td ><b>Request Code: </b> ' . ($reqCode) . '</td>
																						</tr>
																						<tr class="service">
																						<td ><b>Approved by Line Manager: </b> ' . ($_SESSION["SESS_MEMBER_Fname"]) . '</td>
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
					$RequestModel = $this->loadModel('RequestModel');

					$listemail = $RequestModel->loadUsersAdmin();
					foreach ($listemail as $app) {
						if (isset($app->Email))  $adminEmail = $app->Email;
						mail($adminEmail, $subject, $message1, $header);
					}
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
	public function AdminLine()
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

				//print_r($_POST);
				$id = $_GET["id"];



				$date1 = date("Y-m-d H:i:s");
				$StationaryModel = $this->loadModel('StationaryModel');
				$StationaryModel->ApproveAdmin($id, $date1, $userId);
				$StationaryModel->updateStatus($id, 'Approved by Admin');
				echo "Approved Successfully!";
				$listEmail = $StationaryModel->getRequestEmail($id);

				//echo "Approved Successfully!";
				foreach ($listEmail as $app) {
					if (isset($app->id)) {
						$id = $app->id;
					} else {
						$id = "";
					}
					if (isset($app->reqCode)) {
						$reqCode = $app->reqCode;
					} else {
						$reqCode = "";
					}
					if (isset($app->Email)) {
						$Email = $app->Email;
					} else {
						$Email = "";
					}

					$subject = "Approved Request Stationary";
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
																						<h4>Approved Request Stationary</h4>
																						============================================================================

																						</td>
																					</tr>


																				   <tr>
																					<td>
																					<table style="padding: 0px 30px 0px 30px;">
																						<tr class="service">
																						<td ><b>Request Code: </b> ' . ($reqCode) . '</td>
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

	public function gavebyStat()
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

				//print_r($_POST);
				$id = $_GET["id"];



				$date1 = date("Y-m-d H:i:s");
				$StationaryModel = $this->loadModel('StationaryModel');
				$StationaryModel->gavebyStat($id, $date1, $userId);
				$StationaryModel->updateStatus($id, 'Completed');
				echo "Update Successfully!";
				$listEmail = $StationaryModel->getRequestEmail($id);
				foreach ($listEmail as $app) {
					if (isset($app->id)) {
						$id = $app->id;
					} else {
						$id = "";
					}
					if (isset($app->reqCode)) {
						$reqCode = $app->reqCode;
					} else {
						$reqCode = "";
					}
					if (isset($app->Email)) {
						$Email = $app->Email;
					} else {
						$Email = "";
					}

					$subject = "Receipt Request Stationary";
					$header  = 'MIME-Version: 1.0' . "\r\n";
					$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					$header .= "From:AIF GROUP EMAIL AUTOMATION";
					$message1 = '<html xmlns="http://www.w3.org/1999/xhtml">
																	<head>
																		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
																		<title>Receipt Request Vehicle </title>
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
																						<h4>Receipt Request Stationary</h4>
																						============================================================================

																						</td>
																					</tr>


																				   <tr>
																					<td>
																					<table style="padding: 0px 30px 0px 30px;">
																						<tr class="service">
																						<td ><b>Request Code: </b> ' . ($reqCode) . '</td>
																						</tr>
																						<tr class="service">
																						<td ><b>Gave By: </b> ' . ($_SESSION["SESS_MEMBER_Fname"]) . '</td>
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

	public function cancelRequest()
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

				//print_r($_POST);
				$id = $_GET["id"];



				$date1 = date("Y-m-d H:i:s");
				$StationaryModel = $this->loadModel('StationaryModel');
				$totalcount = 0;
				$check = $StationaryModel->checkstatusCancel($id);
				foreach ($check	 as $app) {
					if (isset($app->totalcount)) {
						$totalcount = $app->totalcount;
					} else {
						$totalcount = 0;
					}
				}

				if ($totalcount == 0) {

					$StationaryModel->updateStatus($id, 'Cancelled');
					$StationaryModel->cancelline($id, $date1);


					$list = $StationaryModel->getRequest($id);
					foreach ($list	 as $app) {
						if (isset($app->given)) {
							$given = $app->given;
						} else {
							$given = "";
						}
						if (isset($app->adminid)) {
							$adminid = $app->adminid;
						} else {
							$adminid = "";
						}
						if (isset($app->lineManagerid)) {
							$lineManagerid = $app->lineManagerid;
						} else {
							$lineManagerid = "";
						}
						if (isset($app->reqqty)) {
							$reqqty = $app->reqqty;
						} else {
							$reqqty = "";
						}
						if (isset($app->productid)) {
							$productid = $app->productid;
						} else {
							$productid = "";
						}
						//if($given==0){
						$StationaryModel->UpdateproductReturn($productid, $reqqty);

						$StockModel = $this->loadModel('StockModel');
						$unitprice = 0;
						$unitprice = $StockModel->getunitprice($productid);

						$datein = date("Y-m-d H:i:s");

						$newqty = $reqqty;
						$Totalcost = $newqty *  $unitprice;
						$StockModel->AddStock($productid, $newqty, $unitprice, $Totalcost, $datein);


						$listEmail = $StationaryModel->getRequestEmail($id);
						foreach ($listEmail as $app) {
							if (isset($app->id)) {
								$id = $app->id;
							} else {
								$id = "";
							}
							if (isset($app->reqCode)) {
								$reqCode = $app->reqCode;
							} else {
								$reqCode = "";
							}
							if (isset($app->Email)) {
								$Email = $app->Email;
							} else {
								$Email = "";
							}

							$subject = "Cancelled Request Stationary";
							$header  = 'MIME-Version: 1.0' . "\r\n";
							$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$header .= "From:AIF GROUP EMAIL AUTOMATION";
							$message1 = '<html xmlns="http://www.w3.org/1999/xhtml">
																	<head>
																		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
																		<title>Cancelled Request Vehicle </title>
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
																						<h4>Cancelled Request Stationary</h4>
																						============================================================================

																						</td>
																					</tr>


																				   <tr>
																					<td>
																					<table style="padding: 0px 30px 0px 30px;">
																						<tr class="service">
																						<td ><b>Request Code: </b> ' . ($reqCode) . '</td>
																						</tr>
																						<tr class="service">
																						<td ><b>Cancelled By: </b> ' . ($_SESSION["SESS_MEMBER_Fname"]) . '</td>
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
					}
					echo "Cancelled Successfully!";
				} else {
					echo "The request cannot be cancel because approve already!";
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
}
