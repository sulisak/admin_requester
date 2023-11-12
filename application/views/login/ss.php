<?php 
include('config.php');
if(isset($_GET["playerid"])){$playerid=$_GET["playerid"];}else{$playerid='2';}

$sql="
SELECT SUM(a.d2), SUM(a.d3), SUM(a.d4), SUM(a.d5), MAX(a.drawdate),SUM(a.d1) FROM ticketdetails as a, ticket as b
 where (a.ticketno=b.ticketno) and a.tdstatus=0 and b.playerid='$playerid' GROUP by a.drawdate
order by a.drawdate desc
"; 
$result=mysqli_query($con,$sql);					
$return_arr = array();
$amount=0;
$commission=0;
while ($row = mysqli_fetch_array($result)) {
$amount=$row[0] + $row[1] + $row[2] + $row[3] + $row[5];
$commission= $amount * 0.30;	



$return_arr[] = array(
		 "drawdate" => $row[4],
		 "commission" =>   number_format($amount-$commission) ." ₭ -". number_format($commission) ." ₭",
		 "totalAmount" =>   number_format($amount) ." ₭"   ,		 
		 		 
		 
		 );
}


			//print_r($return_arr);
		//json_encode($return_arr);
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
		header('Access-Control-Allow-Methods:GET, POST');
		header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
		$_POST = json_decode(file_get_contents("php://input"),true);
		
		
		 echo json_encode($return_arr);

?>