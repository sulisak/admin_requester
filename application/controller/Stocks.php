<?php
Session_Start();
 if(isset($_SESSION['SESS_MEMBER_POS'] )){
 if(	$_SESSION['SESS_MEMBER_POS'] =="Administration"){


class Stocks extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
     
     
   
   
       public function loadPicturepro()
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

			                 $id=$_POST["id"];
			
			    
							$logo=$_FILES['logo']['tmp_name'];
							$file = $_FILES['logo']['tmp_name']; 
							$sourceProperties = getimagesize($file);
							$fileNewName = time();
							$folderPath = "public/img/stock/";
							$ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
							$imageType = $sourceProperties[2];
							function imageResize($imageResourceId,$width,$height, $quality) {


									$targetWidth =512;
									$targetHeight =512;


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
						$StockModel = $this->loadModel('StockModel');
						$list=$StockModel->getunlink($id);
						$photocount= 0;
		                foreach ($list as $app) { 	
		                    $photocount++;
            				 if (isset($app->photo))  {$photo= $app->photo;	}else{$photo= "";	}
            				 
            					unlink("public/img/stock/".$photo."");
            				}
						if($photocount != 0){
						    $StockModel->updatephoto($id,$logo);
						}else{
						      $StockModel->insertphoto($id,$logo);
						}
						
							echo ' 
						<script src="'. URL .'public/js/jquery.js"></script>
						<script>
									alert("Update Successfully!");
									 window.location.href ="'. URL .'Stocks";
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
	
       public function loadPicture()
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
				$name=$_GET["name"];
				$photo=$_GET["photo"];
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/stocks/uploadphoto.php';
				
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

				
					//$InspectionModel = $this->loadModel('InspectionModel');
					
					//$checker=$InspectionModel-> loadChecker();
					//$vehicle=$InspectionModel-> loadVehicle();
					
					$StockModel = $this->loadModel('StockModel');
					$listcat=$StockModel-> LoadCategory();
					
				
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/stocks/index.php';
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
	
    public function StockHistory()
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
				 $name=$_GET["name"];
				 $barcode=$_GET["barcode"];
				$StockModel = $this->loadModel('StockModel');
				$list=$StockModel->LoadStockHistory($id);
				require 'application/views/_templates/header.php';
				require 'application/views/_templates/nav.php';
				require 'application/views/stocks/productdetails.php';
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
	
    public function AddStockQty()
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
			
					
							
					if(isset($_GET["id"])){ $id = $_GET["id"]; }else{ $id = ''; }
					if(isset($_GET["newqty"])){ $newqty = $_GET["newqty"]; }else{ $newqty = ''; }
					if(isset($_GET["upPrice"])){ $upPrice = $_GET["upPrice"]; }else{ $upPrice = ''; }
					if(isset($_GET["sbarcode"])){ $sbarcode = $_GET["sbarcode"]; }else{ $sbarcode = ''; }
					$StockModel = $this->loadModel('StockModel');
					$StockModel->addStockQty($id ,$newqty );
					$datein =date("Y-m-d H:i:s");
					$totalcost=$newqty * $upPrice;
					$StockModel-> AddStock($id,$newqty,$upPrice,$totalcost, $datein);
						
					echo "Add Successfully!";

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
    
	public function LoadStock()
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
			
					
					 
	
					$StockModel = $this->loadModel('StockModel');
					$list1 = $StockModel->LoadStock();
					
					$listcat=$StockModel-> LoadCategory();
				//	print_r($list1);
					require 'application/views/stocks/product.php';

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
    
	
   
	
    public function UpdateData()
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
			
					
					  if(isset($_GET["id"])){ $id = $_GET["id"]; }else{ $id = ''; }
					  if(isset($_GET["name"])){ $name = $_GET["name"]; }else{ $name = ''; }
					  if(isset($_GET["uom"])){ $uom = $_GET["uom"]; }else{ $uom = ''; }
					  if(isset($_GET["qty"])){ $qty = $_GET["qty"]; }else{ $qty = ''; }
					  if(isset($_GET["unit"])){ $unit = $_GET["unit"]; }else{ $unit = ''; }
					  if(isset($_GET["rep"])){ $rep = $_GET["rep"]; }else{ $rep = ''; }
					  if(isset($_GET["cat"])){ $cat = $_GET["cat"]; }else{ $cat = ''; }
					  
					 
				//	print_r($_GET);
					$StockModel = $this->loadModel('StockModel');
				//	$StockModel->UpdateStock($id ,$name ,$uom ,$qty ,$unit ,$rep, $cat);
					$StockModel->UpdateStock($id ,$name ,$uom  ,$rep, $cat);
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
	
	
    
	public function deleteStock()
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
					  
					$Stocks = $this->loadModel('StockModel');
					$Stocks->deleteStock($id);
				

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
    public function AddStocks()
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
					$barcode = $_POST["barcode"];
					$pname = $_POST["pname"];
					$uom = $_POST["uom"];
					$rep = $_POST["rep"];
					$qty = $_POST["qty"];
					$unitprice = $_POST["unitprice"];
					$cat = $_POST["cat"];
					  
					 
	
					$StockModel = $this->loadModel('StockModel');
					$total=0;
					$total=$StockModel->CheckBarcode($barcode);
					//echo $total;
					if($total==0){
						$StockModel->  AddProduct($barcode,$pname,$uom,$rep,$qty,$unitprice, $cat);
						$datein =date("Y-m-d H:i:s");
						$id=0;
						$id=$StockModel->getid($barcode);
						$totalcost=$qty * $unitprice;
						$StockModel-> AddStock($id,$qty,$unitprice,$totalcost, $datein);
						
						
						
											
						echo " Create Successfully!!";
					}else{
						echo " Already Exits!";
					}
					
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
