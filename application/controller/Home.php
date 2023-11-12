<?php

session_start();
class Home extends Controller
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
		if (isset($_SESSION['SESS_MEMBER_unique'])) {
			$unq = $_SESSION['SESS_MEMBER_unique'];
		} else {
			$unq = '';
		}
		if ($Sid == ""  && $unq == "") {
			$LoginModel = $this->loadModel('LoginModel');
			$companylist = $LoginModel->getCompany();
			//print_r($companylist);					
			require 'application/views/login/index.php';
		} else {

			header("location:" . URL . "Request/HistoyVehicle");
		}
	}


	public function LoginAccount()
	{
		// print_r($_POST);

		$un = $_POST["un"];
		$pw = md5($_POST["pw"]);
		$LoginModel = $this->loadModel('LoginModel');
		$data = $LoginModel->getData($un, $pw);
		foreach ($data as $app) {
			if (isset($app->userid))  $userid = $app->userid;
			if (isset($app->username))  $username = $app->username;
			if (isset($app->fullname))  $fullname = $app->fullname;
			if (isset($app->contact))  $contact = $app->contact;
			if (isset($app->position))  $Position = $app->position;
			if (isset($app->company))  $company = $app->company;
			if (isset($app->department))  $department = $app->department;
			if (isset($app->profile))  $profile = $app->profile;
			if (isset($app->cid))  $cid = $app->cid;
			if (isset($app->depid))  $depid = $app->depid;
			$_SESSION['SESS_MEMBER_depid'] = $depid;
			$_SESSION['SESS_MEMBER_POS'] = $Position;
			$_SESSION['SESS_MEMBER_ID'] = $userid;
			$_SESSION['SESS_MEMBER_Fname'] = $fullname;
			$_SESSION['SESS_MEMBER_contact'] = $contact;
			$_SESSION['SESS_MEMBER_Username'] = $username;
			$_SESSION['SESS_MEMBER_department'] = $department;
			$_SESSION['SESS_MEMBER_company'] = $company;
			$_SESSION['SESS_MEMBER_pic'] = $profile;
			$_SESSION['SESS_MEMBER_cid'] = $cid;
		}

		$totalUser = $LoginModel->CheckAccountLogin($un, $pw);
		if ($totalUser == 1) {

			$LoginModel->DeleteSession($_SESSION['SESS_MEMBER_ID']);
			date_default_timezone_set('Asia/Bangkok');
			$date = date("Y-m-d");
			$unique = substr(uniqid(rand(), true), 0, 25);
			$_SESSION['SESS_MEMBER_unique'] = $unique;
			$LoginModel->InsertSession($_SESSION['SESS_MEMBER_ID'], $unique, $date);
			if ($_SESSION['SESS_MEMBER_POS'] == "Requestor" || $_SESSION['SESS_MEMBER_POS'] == "LineManager" || $_SESSION['SESS_MEMBER_POS'] == "DocumentController") {
				echo "ok";
			} else {
				echo "login failed";
			}
		} else {
			echo "Invalid username and password!";
		}
	}
}
