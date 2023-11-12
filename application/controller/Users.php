<?php
Session_Start();
 if(isset($_SESSION['SESS_MEMBER_POS'] )){
 if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){

class Users extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
		
		 if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}		
		
				date_default_timezone_set('Asia/Bangkok'); 
				$date =date("Y-m-d");			
				$userId=$Sid;
				$token=$_SESSION['SESS_MEMBER_unique'];
				$dashboard_model = $this->loadModel('DashboardModel');
				$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
				//echo $LogUser;
				if ($LogUser==1){	
				
				$UserModel = $this->loadModel('UserModel');	
				$listcompany=$UserModel->Loaddcompany();
				$listdepartment=$UserModel->Loaddepartment();
				
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/users/index.php';
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

  
	public function CheckAccountAuth()
	{
			if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}
			if(isset($_SESSION['SESS_MEMBER_unique'])){$unq=$_SESSION['SESS_MEMBER_unique'];}else{$unq='';}
			if($Sid==""  && $unq==""){
					
					session_unset();
					session_destroy();
					 echo '
					 <script>
							window.location.href ="'. URL .'";
					</script>	
					';
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
				require 'application/views/users/index.php';
				
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
	
	
	public function ListUsers()
	{	
	
		if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}
		 date_default_timezone_set('Asia/Bangkok'); 
			$date =date("Y-m-d");			
			$userId=$Sid;
			$token=$_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser==1){						 
				 $UserModel = $this->loadModel('UserModel');
					$list1=$UserModel->LoadUser();
					
					//$DepartmentModel = $this->loadModel('DepartmentModel');			
					//$listdep=$DepartmentModel->LoadDeparment();
				 require 'application/views/users/userlist.php';
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
	public function AddUser()
	{	
		
		if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}
		 date_default_timezone_set('Asia/Bangkok'); 
			$date =date("Y-m-d");			
			$userId=$Sid;
			$token=$_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser==1){			
				
				//print_r($_POST);
				if(isset($_POST['un'])){$un=$_POST['un'];}else{$un='';}
				if(isset($_POST['fn'])){$fn=$_POST['fn'];}else{$fn='';}
				if(isset($_POST['cn'])){$cn=$_POST['cn'];}else{$cn='';}
				if(isset($_POST['pw'])){$pw=$_POST['pw'];}else{$pw='';}
				if(isset($_POST['bu'])){$bu=$_POST['bu'];}else{$bu='';}
				if(isset($_POST['dep'])){$dep=$_POST['dep'];}else{$dep='';}
				if(isset($_POST['ut'])){$ut=$_POST['ut'];}else{$ut='';}
				if(isset($_POST['position'])){$position=$_POST['position'];}else{$position='';}
				if(isset($_POST['email'])){$email=$_POST['email'];}else{$email='';}
				if(isset($_POST['sig'])){$sig=$_POST['sig'];}else{$sig='';}
				$UserModel = $this->loadModel('UserModel');
				//check Username			
				$un=strtolower($un);		
				$Totalun = $UserModel->CheckUser($un);
				if($Totalun!=0){
					
						echo '
					 <script>
							alert("Username Already Exist!"); 
						   	window.location.href ="'. URL .'Users";
					</script>	
					';
				}else{
					if($_FILES["logo"]["error"] == 4) {
						$logo='default.png';
						}else{
				
							$logo=$_FILES['logo']['tmp_name'];
							$file = $_FILES['logo']['tmp_name']; 
							$sourceProperties = getimagesize($file);
							$fileNewName = time();
							$folderPath = "public/img/profile/";
							$ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
							$imageType = $sourceProperties[2];
							function imageResize($imageResourceId,$width,$height, $quality) {


									$targetWidth =377;
									$targetHeight =377;


									$targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
									imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


									return $targetLayer;
							}
							function compress_image($source_url, $destination_url, $quality) {

								if($source_url<>""){
									$info = getimagesize($source_url);

										if ($info['mime'] == 'image/jpeg')
												$image = imagecreatefromjpeg($source_url);

										elseif ($info['mime'] == 'image/gif')
												$image = imagecreatefromgif($source_url);

									elseif ($info['mime'] == 'image/png')
												$image = imagecreatefrompng($source_url);

										imagejpeg($image, $destination_url, $quality);
										return $destination_url;
								}
									
							}
						
						
							 switch ($imageType) {


								case IMAGETYPE_PNG:
									$imageResourceId = imagecreatefrompng($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],40);
									imagepng($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
									
							
									break;


								case IMAGETYPE_GIF:
									$imageResourceId = imagecreatefromgif($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],40);
									imagegif($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
									break;


								case IMAGETYPE_JPEG:
									$imageResourceId = imagecreatefromjpeg($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],40);
									imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
									break;


								default:
									echo "Invalid Image type.";
									exit;
									break;
						}
				
						$logo=$fileNewName. "_thump.". $ext;
					
					}
					
					 $position=strtoupper($position);
					$UserModel->AddUser($un, md5($pw), $fn, $cn,$dep,$bu,$ut,$logo,$email, $position,$sig);
					echo '
					 <script>
							alert("Create Successfully!"); 
						  window.location.href ="'. URL .'Users";
					</script>	
					';
					}
				
					
				/*$UserModel = $this->loadModel('UserModel');
				 $Totalun=$UserModel->CheckUser($un);
				$pw=md5($pw);
				
				 if($Totalun==0){
					$UserModel->AddUser($un, $pw, $fn, $pos);
					 echo "<i style='color:green'>Create Successfully!</i>";
				 }else{
					 echo "<i style='color:red'>Already Exit!</i>";
				 }
				*/
				
				
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
	
	public function UpdateForm()
	{	
		
		if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}
		 date_default_timezone_set('Asia/Bangkok'); 
			$date =date("Y-m-d");			
			$userId=$Sid;
			$token=$_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser==1){						 
				if(isset($_GET['id'])){$id=$_GET['id'];}else{$id='';}
				
				//print_r($_GET);
				$UserModel = $this->loadModel('UserModel');
				$listcompany=$UserModel->Loaddcompany();
				$listdepartment=$UserModel->Loaddepartment();
				$list=$UserModel->getUser($id); 
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/users/updateform.php';
				
				 
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
	
	
	public function UpdateUser()
	{	
		
		if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}
		 date_default_timezone_set('Asia/Bangkok'); 
			$date =date("Y-m-d");			
			$userId=$Sid;
			$token=$_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser==1){						 
				
				//print_r($_POST);
				if(isset($_POST['un'])){$un=$_POST['un'];}else{$un='';}
				if(isset($_POST['fn'])){$fn=$_POST['fn'];}else{$fn='';}
				if(isset($_POST['cn'])){$cn=$_POST['cn'];}else{$cn='';}
				if(isset($_POST['id'])){$id=$_POST['id'];}else{$id='';}
				if(isset($_POST['bu'])){$bu=$_POST['bu'];}else{$bu='';}
				if(isset($_POST['dep'])){$dep=$_POST['dep'];}else{$dep='';}
				if(isset($_POST['ut'])){$ut=$_POST['ut'];}else{$ut='';}
				if(isset($_POST['email'])){$email=$_POST['email'];}else{$email='';}
				if(isset($_POST['position'])){$position=$_POST['position'];}else{$position='';}
				if(isset($_POST['sig'])){$sig=$_POST['sig'];}else{$sig=0;}
				
			
				$position=strtoupper($position);
			
				if($_FILES["logo"]["error"] == 4) {
					$logo='';
				}else{
				
							$logo=$_FILES['logo']['tmp_name'];
							$file = $_FILES['logo']['tmp_name']; 
							$sourceProperties = getimagesize($file);
							$fileNewName = time();
							$folderPath = "public/img/profile/";
							$ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
							$imageType = $sourceProperties[2];
							function imageResize($imageResourceId,$width,$height, $quality) {


									$targetWidth =377;
									$targetHeight =377;


									$targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
									imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


									return $targetLayer;
							}
							function compress_image($source_url, $destination_url, $quality) {

								if($source_url<>""){
									$info = getimagesize($source_url);

										if ($info['mime'] == 'image/jpeg')
												$image = imagecreatefromjpeg($source_url);

										elseif ($info['mime'] == 'image/gif')
												$image = imagecreatefromgif($source_url);

									elseif ($info['mime'] == 'image/png')
												$image = imagecreatefrompng($source_url);

										imagejpeg($image, $destination_url, $quality);
										return $destination_url;
								}
									
							}
						
						
							 switch ($imageType) {


								case IMAGETYPE_PNG:
									$imageResourceId = imagecreatefrompng($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],40);
									imagepng($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
									
							
									break;


								case IMAGETYPE_GIF:
									$imageResourceId = imagecreatefromgif($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],40);
									imagegif($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
									break;


								case IMAGETYPE_JPEG:
									$imageResourceId = imagecreatefromjpeg($file); 
									$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],40);
									imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
									break;


								default:
									echo "Invalid Image type.";
									exit;
									break;
						}
				
						$logo=$fileNewName. "_thump.". $ext;
					
					}
					//echo $position;
					$UserModel = $this->loadModel('UserModel');
						if(isset($_POST['sig'])){$sig=$_POST['sig'];}else{$sig=0;}
					if($logo==''){
						//wala logo update
						$UserModel->UpdateUserwithoutProfile($id, $fn, $cn, $dep, $bu, $ut,$email,$position,$sig);
					}else{
						//meron
					    
						$list=$UserModel->getUser($id); 
							foreach ($list as $app) { 						
						if (isset($app->profile))  $profile= $app->profile;	
								Unlink("public/img/profile/".$profile);
							}
			            
						$UserModel->UpdateUser2($id, $fn, $cn, $dep, $bu, $ut, $logo,$email,$position,$sig);
					   
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
	
	public function DeleteUser()
	{	
		
		if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}
		 date_default_timezone_set('Asia/Bangkok'); 
			$date =date("Y-m-d");			
			$userId=$Sid;
			$token=$_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser==1){						 
				if(isset($_GET['id'])){$id=$_GET['id'];}else{$id='';}
				
			//	echo $id;
				$UserModel = $this->loadModel('UserModel');
				$listprofile =$UserModel->getUser($id);
					
				foreach ($listprofile as $app) { 
					if (isset($app->profile)) echo  $profile= $app->profile;	
					unlink("public/img/profile/" .$profile);	
					$UserModel->DeleteUserAcc($id);
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
	
	public function DeleteGroup()
	{	
		
		if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}
		 date_default_timezone_set('Asia/Bangkok'); 
			$date =date("Y-m-d");			
			$userId=$Sid;
			$token=$_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser==1){						 
				if(isset($_GET['id'])){$id=$_GET['id'];}else{$id='';}
				$TotalGroup=$dashboard_model->DeleteGroup($id);
							
				
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
	
	
	public function ResetPassword()
	{	
	
		if(isset($_SESSION['SESS_MEMBER_ID'])){$Sid=$_SESSION['SESS_MEMBER_ID'];}else{$Sid='';}
		 date_default_timezone_set('Asia/Bangkok'); 
			$date =date("Y-m-d");			
			$userId=$Sid;
			$token=$_SESSION['SESS_MEMBER_unique'];
			$dashboard_model = $this->loadModel('DashboardModel');
			$LogUser = $dashboard_model->CheckAccount($userId, $token, $date);
			//echo $LogUser;
			if ($LogUser==1){						 
					$UserModel = $this->loadModel('UserModel');
					if(isset($_GET['id'])){$id=$_GET['id'];}else{$id='';}
					$list=$UserModel->ResetPassword($id);
					echo 'Password was been reset!';
				
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
