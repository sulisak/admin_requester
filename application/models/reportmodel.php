<?php

class ReportModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


		public function LoadStockHistory($start, $end)
		{
				
				$sql = "
				SELECT `id`, b.`productid` , `datein`, `addqty`, `unitprice`, `totalcost`,
				(select barcode from product as aa where  aa.id=b.productid) as barcode,
				(select pname from product as aa where aa.id=b.productid) as pname,
				(select uom from product as aa where aa.id=b.productid) as uom
			
				FROM `stocks`	as b where 
				datein  between :start and :end		order by datein desc			
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":start"=>$start ,":end"=>$end ));
				
				return $query->fetchAll();
			
				
		}
		
public function LoadRequest($start, $end)
		{
				
				$sql = "
				SELECT a.`id`, `reqCode`, `requestor`, `productid`, `reqqty`, `dateneeded`, `daterequest`, `remarks`, 
				`lineManagerid`, `adminid`, `given`, `status`, `linemanagerdate`, `admindate`, `givendate`,
				(Select fullname from users where userid=given) as givenby,		
				(Select fullname from users where userid=requestor) as requestorname,		
				(Select fullname from users where userid=lineManagerid) as linemane,		
				(Select fullname from users where userid=adminid) as adminname	,
				(Select cname from users as bb , company as cc  where userid=requestor and cc.cid =bb.cid) as company	,
				(Select department from users as bb , department as cc  where userid=requestor and cc.did =bb.depid) as department	,
				
				(Select profile from users where userid=given) as givenprofile,		
				(Select profile from users where userid=requestor) as requestorprofile,		
				(Select profile from users where userid=lineManagerid) as lineprofile,		
				(Select profile from users where userid=adminid) as adminprofile	,
				
				
				(Select barcode from product as b where b.id=productid) as barcode	,
				(Select pname from product as b where b.id=productid) as pname,
				(Select uom from product as b where b.id=productid) as uom,
				(Select unitprice from product as b where b.id=productid) as unitprice,
				(Select categoryname from product as b , category as c where b.id=productid and c.catid=b.category ) as category,
				totalcost,linemanagerdate,admindate, givendate,canceldate

				FROM `stationary` as a  where 
				daterequest between :start and :end
				order by  a.id desc
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":start"=>$start ,":end"=>$end ));
				return $query->fetchAll();
			
				
		}
		
		
		
			public function getReserveRoom($start, $end)
		{
				
				$sql = "
				SELECT `rbid`, `rid`, `purposed`, `participant`, `startdate`, `enddate`, `remarks`, `createuser`,a.`userid` ,
				(select `roomname` FROM `room`  as b WHERE b.roomid=a.rid) as roomName,
				(select `fullname` FROM `users`  as b WHERE b.userid=a.userid) as requestor,
				(select `fullname` FROM `users`  as b WHERE b.userid=a.createuser) as creator,a.status
				FROM `reqbook` as a 
				where startdate between :start and :end
				order by rbid desc
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":start"=>$start ,":end"=>$end ));
				return $query->fetchAll();
			
				
		}
	
		
		public function loadVehicle($start , $end)
		{
				
				$sql = "
				SELECT v.vid, `vin`, `vyear`, `maker`, `model`, `vcolor`, `plate`, `maxpassenger`, `transmission`, `engine`, `tankcapacity`, `fueltype`, `mileage`, `vehicleStat`, `timmer`, `changeoil`, `startingMileage` ,
				(SELECT SUM( `Amount`) FROM `fuel` as a WHERE a.vid=v.vid and fdate between :start and :end) as totalFuelCost,
				(SELECT SUM( `liter`) FROM `fuel` as a WHERE a.vid=v.vid  and fdate between :start and :end) as totalLiter,
				(SELECT SUM( `cost`) FROM `maintenance` as a WHERE a.vid=v.vid  and rdate between :start and :end) as totalCost
				,(SELECT CONCAT( (select makername from carmaker where makerid=a.maker) , ' ' , 
				(select modelname from carmodel where cmid=a.model), ' ', `vyear`, ' #', `plate`, ' ',`vcolor`)  
				FROM `vehicle` as a where a.vid = v.vid ) as car
				FROM `vehicle` as v order by v.vid asc
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":start"=>$start ,":end"=>$end ));
				return $query->fetchAll();
		}
	
		
		public function insertdata($start , $end,$vid,$remarks)
		{
				
				$sql = "				
				INSERT INTO `datemaintainance`( `sdate`, `remarks`, `vid`, `enddate`) 
				VALUES (:start,:remarks,:vid,:end)
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":start"=>$start ,":end"=>$end,":vid"=>$vid,":remarks"=>$remarks ));
				
		}
		
		public function LoadFuel($start, $edate, $car)
		{
				
				$sql = "
				SELECT `id`, a.vid, `driver`, `fdate`, `GasStation`, `Amount`, `oilprice`, `liter`, `mileage`
					,(SELECT  max(v.vyear) FROM vehicle as v where v.vid= a.vid  ) as vyear
									,(SELECT  max(v.vcolor) FROM vehicle as v where v.vid= a.vid ) as color
									,(SELECT  max(v.plate) FROM vehicle as v where v.vid= a.vid ) as plate
									,(SELECT  max(v.mileage) FROM vehicle as v where v.vid= a.vid ) as mileage
									,(SELECT cc.makername FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid)as  maker
									 ,(SELECT cm.modelname FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid) as model
									 
				, `distance`, `newMileage`, `fuelcons`

			  FROM `fuel`  as a  where fdate between :start and :edate and  a.vid = :car order  by fdate desc
				
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":start" => $start,":edate" => $edate,":car" => $car,));
				$query->execute();
				return $query->fetchAll();
			
				
		}
		public function LoadFuelAll($start, $edate)
		{
				
				$sql = "
				SELECT `id`, a.vid, `driver`, `fdate`, `GasStation`, `Amount`, `oilprice`, `liter`, `mileage`
					,(SELECT  max(v.vyear) FROM vehicle as v where v.vid= a.vid  ) as vyear
									,(SELECT  max(v.vcolor) FROM vehicle as v where v.vid= a.vid ) as color
									,(SELECT  max(v.plate) FROM vehicle as v where v.vid= a.vid ) as plate
									,(SELECT  max(v.mileage) FROM vehicle as v where v.vid= a.vid ) as mileage
									,(SELECT cc.makername FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid)as  maker
									 ,(SELECT cm.modelname FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid) as model
									 
				
				, `distance`, `newMileage`, `fuelcons`

			  FROM `fuel`  as a  where fdate between :start and :edate  order  by fdate desc
				
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":start" => $start,":edate" => $edate));
				$query->execute();
				return $query->fetchAll();
			
				
		}
			public function updatestatusOn($st,$vid,$stat)
		{
				
				
				$sql = "update  vehicle set st=:st, vehicleStat=:stat where vid=:vid ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid,':st' => $st,':stat' => $stat, ));
				
				
		}
		public function selectDisabled()
		{
				
				$sql = "SELECT   a.vid	 FROM `vehicle`  as a   where vehicleStat='Disabled'";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		public function getDateEnable($vid)
		{
				
				$sql = "select (enddate) from datemaintainance as a where a.vid=:vid order by (a.id) desc limit 1";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid,));
				return $query->fetchAll();
			
				
		}


	

		
		
}
?>