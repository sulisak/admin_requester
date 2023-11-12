<?php
Session_Start();

class Document extends Controller
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

				$UserModel = $this->loadModel('UserModel');
				$list=$UserModel->LoadUser();
				
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/document/index.php';
				
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
	
    public function In()
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

				
				$UserModel = $this->loadModel('UserModel');
				$list=$UserModel->LoadUser();
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/document/index.php';
				
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
    public function Out()
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

				
				$UserModel = $this->loadModel('UserModel');
				$list=$UserModel->LoadUser();
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/document/documentout.php';
				
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
    public function deleteData()
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

				$id=$_GET["id"];
				$DocumentModel = $this->loadModel('DocumentModel');
				$DocumentModel-> DeleteData($id);
				//print_r($listDoc);
				//require 'application/views/document/documentin.php';
				
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
    public function updateComplete()
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

				$id=$_GET["id"];
				$DocumentModel = $this->loadModel('DocumentModel');
				$DocumentModel-> updateComplete($id);
				$listsend=$DocumentModel->  loadDatafromdb($id);
				 foreach ($listsend as $app) { 
				 
				  if (isset($app->id)){  $id= $app->id;}else{$id="";}	
				  if (isset($app->refno)) { $refno= $app->refno;	}else{$refno="";}
				  if (isset($app->intentedrec)) { $intentedrec= $app->intentedrec;	}else{$intentedrec="";}
				  if (isset($app->recEmail )) { $recEmail = $app->recEmail ;	}else{$recEmail ="";}
				  if (isset($app->businessunit )) { $businessunit = $app->businessunit ;	}else{$businessunit ="";}
				  if (isset($app->description )) { $description = $app->description ;	}else{$description ="";}
				  if (isset($app->messenger )) { $messenger = $app->messenger ;	}else{$messenger ="";}
				  if (isset($app->messengertel )) { $messengertel = $app->messengertel ;	}else{$messengertel ="";}
				  if (isset($app->receiver )) { $receiver = $app->receiver ;	}else{$receiver ="";}
				  if (isset($app->sender )) { $sender = $app->sender ;	}else{$sender ="";}
				  if (isset($app->senderemail )) { $senderemail = $app->senderemail ;	}else{$senderemail ="";}
				  if (isset($app->datesend )) { $datesend = $app->datesend ;	}else{$datesend ="";}
				  if (isset($app->doctype )) { $doctype = $app->doctype ;	}else{$doctype ="";}
				  if (isset($app->type )) { $type = $app->type ;	}else{$type ="";}
				  if (isset($app->status )) { $status = $app->status ;	}else{$status ="";}
				  if (isset($app->companyid )) { $companyid = $app->companyid ;	}else{$companyid ="";}
				  if (isset($app->userid )) { $userid = $app->userid ;	}else{$userid ="";}
				  if (isset($app->department )) { $department = $app->department ;	}else{$department ="";}
				  if (isset($app->document )) { $document = $app->document ;	}else{$document ="";}
				      if (isset($app->documentNum )) { $documentNum = $app->documentNum ;	}else{$documentNum ="";}
				      if (isset($app->Remarks )) { $Remarks = $app->Remarks ;	}else{$Remarks ="";}
				        if (isset($app->workplace )) { $workplace = $app->workplace ;	}else{$workplace ="";}
				 
					  if($document==0){
						   $headerUnderpic='<h4>DOCUMENT IN</h4>';
						  }else{
							   $headerUnderpic='<h4>DOCUMENT OUT</h4>';
						 }
				
							
							
							
							 
							 
							 ///email
																$datesend=date('D d, F Y', strtotime($datesend));
																
																$title = "AIF Group Automated Email";
																

																//adds project to MYSQL database
																//The function returns uniqid generated
																//$id = addProject($title,$desc,$name);

																$subject = $title;
																$header  = 'MIME-Version: 1.0' . "\r\n";
																$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
																$header .= "From:info@aifslaos.com";
																$message1 = '<html xmlns="http://www.w3.org/1999/xhtml">
																	<head>
																		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
																		<title>Thai Visa </title>
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
																								<img src="https://aifios.asia-erp.com/public/img/aif_favicon.png" alt="Logo"/>
																						'. $headerUnderpic.' ============================================================================
																						
																						</td>
																					</tr>
																					
																					<tr>
																						<td bgcolor="#ffffff" style="padding: 10px 30px 10px 30px;">
																						<table>
																								<tr>
																								<td><b>Address</b> : Nongbone Rd, Ban Naxay, Saysettha Dist Vientiane Capital 01000, Laos</td>
																								</tr>
																								<tr>
																								<td><b>Email </b>  : info@aifslaos.com </br></td>
																								</tr>
																								<tr>
																								<td><b>Phone </b>  : (856) 21 264 917, 021 264 423 </br></td>
																								</tr>
																							</table>
																						============================================================================
																						</td>
																					</tr>
																				   <tr>
																				   
																					<td>
																					<table style="padding: 0px 30px 0px 30px;">											
																						<tr class="service">
																						<td ><b>REFERENCE NO: </b> '.strtoupper($documentNum).'</td>															
																						</tr>												
																						<tr class="service">
																						<td ><b>INTENDED RECEIVER: </b> '.strtoupper($intentedrec).'</td>															
																						</tr>												
																						<tr class="service">
																						<td ><b>BUSINESS UNIT: </b> '.strtoupper($businessunit).'</td>															
																						</tr>											
																						<tr class="service">
																						<td ><b>DEPARTMENT: </b> '.strtoupper($department).'</td>															
																						</tr>											
																						<tr class="service">
																						<td ><b>DESCRIPTION: </b> '.strtoupper($description).'</td>															
																						</tr>										
																						<tr class="service">
																						<td ><b>MESSENGER: </b> '.strtoupper($messenger).'</td>															
																						</tr>										
																						<tr class="service">
																						<td ><b>MESSENGER TELEPONE: </b> '.strtoupper($messengertel).'</td>															
																						</tr>										
																						<tr class="service">
																						<td ><b>RECEIVER: </b> '.strtoupper($receiver).'</td>															
																						</tr>										
																						<tr class="service">
																						<td ><b>SENDER: </b> '.strtoupper($sender).'</td>															
																						</tr>									
																						<tr class="service">
																						<td ><b>SENDER EMAIL: </b> '.strtoupper($senderemail).'</td>															
																						</tr>									
																						<tr class="service">
																						<td ><b>DATE SEND: </b> '.strtoupper($datesend).'</td>															
																						</tr>								
																						<tr class="service">
																						<td ><b>DOC TYPE: </b> '.strtoupper($doctype).'</td>															
																						</tr>							
																						<tr class="service">
																						<td ><b> TYPE: </b> '.strtoupper($type).'</td>															
																						</tr>
																							
																						</tr>							
																						<tr class="service">
																						<td ><b> Workplace: </b> '.strtoupper($workplace).'</td>															
																						</tr>
																							
																						</tr>							
																						<tr class="service">
																						<td ><b> Remarks: </b> '.strtoupper($Remarks).'</td>															
																						</tr>
																						
																					
																					</table>
																					
																					
																					</td>
																					</tr>
																					<tr>
																					<td style="padding: 10px 30px 40px 30px;">
																					=============================================================================
																					<br><br><br>
																					<p><i style="color:#080;">Thank you for your hard working</i> 
																					</td>
																					</tr>
																				   
																				</table>
																			</td>
																		</tr>
																	</table>
																	</body>
																	</html>';
																	mail($recEmail,$subject,$message1,$header);
																	mail($senderemail,$subject,$message1,$header);
							 
							 
							 
							 
							 
							 
							 
							 
							 
							 
						
							echo "Send Confirmation Complete!";

				 }
				
				//print_r($listDoc);
				//require 'application/views/document/documentin.php';
				
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
    public function LoadData()
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

				
				$DocumentModel = $this->loadModel('DocumentModel');
				$document=0;
				$listDoc=$DocumentModel->loadData($document);
				//print_r($listDoc);
				require 'application/views/document/documentin.php';
				
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
	public function LoadData1()
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

				
				$DocumentModel = $this->loadModel('DocumentModel');
				$document=1;
				$listDoc=$DocumentModel->loadData($document);
				//print_r($listDoc);
				require 'application/views/document/documentoutlist.php';
				
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
	
	public function AddDocument()
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

				
				//$UserModel = $this->loadModel('UserModel');
				//print_r($_POST);
				
				$ref=$_POST["ref"];
				$userid=$_POST["userid"];
				$email=$_POST["email"];
				$bu=$_POST["bu"];
				$dep=$_POST["dep"];
				$des=$_POST["des"];
				$messenger=$_POST["messenger"];
				$messengertel=$_POST["messengertel"];
				$receiver=$_POST["receiver"];
				$sender=$_POST["sender"];
				$senderemail=$_POST["senderemail"];
				$date=$_POST["date"];
				$doctype=$_POST["doctype"];
				$type=$_POST["type"];
				$cid=$_POST["cid"];
				$fn=$_POST["fn"];
				$dc=$_POST["dc"];
				$workplace=$_POST["workplace"];
				$remarks=$_POST["remarks"];
				$document=$_POST["document"];
				$DocumentModel = $this->loadModel('DocumentModel');
				
				$totalUser=0;
				 $totalUser=$DocumentModel->CheckRef($ref);
				if($totalUser==0){
					$DocumentModel->Insertdata($ref, $userid, $email, $bu, $dep, $des, $messenger, $messengertel,  $receiver,  $sender, 
					$senderemail,$date,$doctype, $type,  $cid ,$fn,$document,$dc,$workplace, $remarks );
					Echo "<i style='color:green'>Create Successfully!</i>";
				}else{
					Echo "<i style='color:red'>Already Exist!</i>";
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
    public function getuserdata()
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

				
				$DocumentModel = $this->loadModel('DocumentModel');
			//	print_r($_GET);
				$userid=($_GET["id"]);
				$listdata=$DocumentModel->getdata($userid);
				foreach ($listdata as $app) { 
					if (isset($app->department))  { $department= $app->department;	}else{  $department="";}
					if (isset($app->company )) { $company = $app->company ;	}else{  $company="";}
					if (isset($app->Email )) { $Email = $app->Email ;	}else{  $Email="";}
					if (isset($app->cid )) { $cid = $app->cid ;	}else{  $cid="";}
					if (isset($app->fullname )) { $fullname = $app->fullname ;	}else{  $fullname="";}
					echo '
					<div class="row">
					<div class="col-md-6">
					<b>Business Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></b>
						<div class="input-group mb-3">
						  <input type="hidden" class="form-control" name="fn" required  value ="'.$fullname.'" placeholder="Enter Description">
						  <input type="hidden" class="form-control" name="cid" required  value ="'.$cid.'" placeholder="Enter Description">
						  <input type="hidden" class="form-control" name="email" required  value ="'.$Email.'" placeholder="Enter Description">
						  <input type="hidden" class="form-control" name="bu" required  value ="'.$company.'" placeholder="Enter Description">
						  <input type="text" class="form-control" disabled="disabled"  value ="'.$company.'" required placeholder="Enter Description">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-building"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6">
					<b>Department/<span class="laotext">ພະແນກ</span></b>
						<div class="input-group mb-3">
						  <input type="hidden" class="form-control" name="dep"  value ="'.$department.'" required >
						  <input type="text" class="form-control" disabled="disabled" required value ="'.$department.'">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-code-branch"></i></span>
						  </div>
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-4">
					<b>Description/<span class="laotext">ອະທິບາຍ</span></b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="des" required placeholder="Enter Description">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-code-branch"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-4">
					<b>Messenger Name/<span class="laotext">ຊື່ຜູ້ຈັດສົ່ງເອກະສານ</span></b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="messenger" required placeholder="Enter Messenger Name">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-4">
					<b>Messenger Tel/<span class="laotext">ເບີໂທຜູ້ຈັດສົ່ງເອກະສານ</span></b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="messengertel" required placeholder="Enter Messenger Telepone">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-phone"></i></span>
						  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
				<b>(Receptionist /EA) / <span class="laotext">  ຜູ້ຮັບເອກະສານ  </span></b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="receiver" required placeholder="Enter Receiver">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6">
					<b>Sender Name/<span class="laotext">ຊື່ຜູ້ສົ່ງເອກະສານ</span></b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="sender" required placeholder="Enter Sender">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						  </div>
						</div>
					</div>
				
					
				</div>
				<div class="row">
				    <div class="col-md-6">
					<b>Sender Email/<span class="laotext">ອີເມວຜູ້ສົ່ງ</b>
						<div class="input-group mb-3">
						  <input type="email" class="form-control" name="senderemail" required placeholder="Enter Sender">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6">
					<b>Sender Workplace/<span class="laotext">ສະຖານທີ່ເຮັດວຽກ</b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="workplace" required placeholder="Enter Workplace">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
					<b>Date/<span class="laotext">ວັນທີ</span></b>
						<div class="input-group mb-3">
						  <input type="date" class="form-control" name="date" required placeholder="Enter Receiver">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-calendar"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-4">
					<b>Doc Type/<span class="laotext">ປະເພດເອກະສານ</span></b>
						<div class="input-group mb-3">
						  <select class="form-control" name="doctype" required >
								<option value="Internal">Internal</option>
								<option value="External">External</option>
						  </select>
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-paperclip"></i></span>
						  </div>
						</div>
						</div>
						<div class="col-md-4">
					<b>Type/<span class="laotext">ປະເພດບັນຈຸພັນ</span></b>
						<div class="input-group mb-3">
						  
						    <select class="form-control" name="type" required >
								<option value="Paper">Paper</option>
								<option value="Seal paper">Seal paper</option>
								<option value="Package">Package</option>
								<option value="Others">Others</option>
						  </select>
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-copy"></i></span>
						  </div>
						</div>
					</div>
					
				</div>
					<div class="row">
					        <div class="col-md-12">
					        	<b>Remarks/<span class="laotext">ໝາຍເຫດ</span></b>
					            <Textarea class="form-control" name="remarks" placeholder="Enter remarks" rows="7"></textarea>
					        </div>
					</div>
					';	
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
	
  
    public function getuserdataout()
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

				
				$DocumentModel = $this->loadModel('DocumentModel');
			//	print_r($_GET);
				$userid=($_GET["id"]);
				$listdata=$DocumentModel->getdata($userid);
				foreach ($listdata as $app) { 
					if (isset($app->department))  { $department= $app->department;	}else{  $department="";}
					if (isset($app->company )) { $company = $app->company ;	}else{  $company="";}
					if (isset($app->Email )) { $Email = $app->Email ;	}else{  $Email="";}
					if (isset($app->cid )) { $cid = $app->cid ;	}else{  $cid="";}
					if (isset($app->fullname )) { $fullname = $app->fullname ;	}else{  $fullname="";}
					echo '
					<div class="row">
					<div class="col-md-6">
					<b>Business Unit/<span class="laotext">ຫົວໜ່ວຍທຸລະກິດ</span></b>
						<div class="input-group mb-3">
						 <input type="hidden" class="form-control" name="sender" required  value ="'.$fullname.'" placeholder="Enter Description">
						 
						 
						  <input type="hidden" class="form-control" name="cid" required  value ="'.$cid.'" placeholder="Enter Description">
						  <input type="hidden" class="form-control" name="senderemail" required  value ="'.$Email.'" placeholder="Enter Description">
						  <input type="hidden" class="form-control" name="bu" required  value ="'.$company.'" placeholder="Enter Description">
						  <input type="text" class="form-control" disabled="disabled"  value ="'.$company.'" required placeholder="Enter Description">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-building"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6">
					<b>Department/<span class="laotext">ພະແນກ</span></b>
						<div class="input-group mb-3">
						  <input type="hidden" class="form-control" name="dep"  value ="'.$department.'" required >
						  <input type="text" class="form-control" disabled="disabled" required value ="'.$department.'">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-code-branch"></i></span>
						  </div>
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-md-4">
					<b>Description/<span class="laotext">ອະທິບາຍ</span></b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="des" required placeholder="Enter Description">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-code-branch"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-4">
					<b>Messenger Name/<span class="laotext">ຜູ້ສົ່ງເອກະສານ</span></b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="messenger" required placeholder="Enter Messenger Name">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-4">
					<b>Messenger Tel/<span class="laotext">ຜູ້ສົ່ງເອກະສານ</span></b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="messengertel" required placeholder="Enter Messenger Telepone">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-phone"></i></span>
						  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
			<b>(Receptionist /EA) / <span class="laotext">  ຜູ້ຮັບເອກະສານ  </span></b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="receiver" required placeholder="Enter Receiver">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6">
					<b>Intended Receiver/<span class="laotext">ຜູ້ຮັບເອກະສານປາຍທາງ</span></b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="fn" required placeholder="Enter Intended Receiver">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						  </div>
						</div>
					</div>
					
					
				</div>
					<div class="row">
				    <div class="col-md-6">
			<b>Receivers Email/<span class="laotext">ອີເມວຜູ້ຮັບເອກະສານປາຍທາງ</span></b>
						<div class="input-group mb-3">
						  <input type="email" class="form-control" name="email" required placeholder="Enter Receiver Email">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-6">
					<b>Workplace/<span class="laotext">ສະຖານທີ່ເຮັດວຽກ</b>
						<div class="input-group mb-3">
						  <input type="text" class="form-control" name="workplace" required placeholder="Enter Workplace">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-envelope"></i></span>
						  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
					<b>Date/<span class="laotext">ວັນທີ</span></b>
						<div class="input-group mb-3">
						  <input type="date" class="form-control" name="date" required placeholder="Enter Receiver">
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-calendar"></i></span>
						  </div>
						</div>
					</div>
					<div class="col-md-4">
					<b>Doc Type/<span class="laotext">ປະເພດເອກະສານ</span></b>
						<div class="input-group mb-3">
						  <select class="form-control" name="doctype" required >
								<option value="Internal">Internal</option>
								<option value="External">External</option>
						  </select>
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-paperclip"></i></span>
						  </div>
						</div>
						</div>
						<div class="col-md-4">
					<b>Type/<span class="laotext">ປະເພດບັນຈຸພັນ</span></b>
						<div class="input-group mb-3">
						  
						    <select class="form-control" name="type" required >
								<option value="Paper">Paper/<span class="laotext">ເຈ້ຍ</span></option>
								<option value="Seal paper">Seal paper/<span class="laotext">ເຈ້ຍທີ່ຈ້ຳກາ</span></option>
								<option value="Package">Package/<span class="laotext">ຊຸດຫໍ່</span></option>
								<option value="Others">Others/<span class="laotext">ອື່ນໆ</span></option>
						  </select>
						  <div class="input-group-append">
							<span class="input-group-text"><i class="fas fa-copy"></i></span>
						  </div>
						</div>
					</div>
					
				</div>
				<div class="row">
					        <div class="col-md-12">
					        	<b>Remarks/<span class="laotext">ໝາຍເຫດ</span></b>
					            <Textarea class="form-control" name="remarks" placeholder="Enter remarks" rows="7"></textarea>
					        </div>
					</div>
					';	
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

?>
