<?php

class FuelModel
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



		
		
		
	
		public function selectDatainspect($id)
		{
				
				$sql = "
				SELECT `id`, `checkerid`, c.vid, `tyre`, `internal`, `external`, `engineoillight`, `brakeLight`, `dateInspect`, `remarks`, `status` , (select fullname from users where users.userid=checkerid) as fcheck, (SELECT CONCAT( (select makername from carmaker where makerid=a.maker) , ' ' , 
				(select modelname from carmodel where cmid=a.model), ' ', `vyear`, ' #', `plate`, ' ',`vcolor`)  
				FROM `vehicle` as a where a.vid = c.vid ) as vehiclename ,
				(select fuelcons	FROM `vehicle` as a where a.vid = c.vid ) as fuelcons 
				FROM `inspection` as c WHERE id=:id
				
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id));
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
	
		public function LoadFuel()
		{
				
				$sql = "
				SELECT `id`, a.vid, `driver`, `fdate`, `GasStation`, `Amount`, `oilprice`, `liter`, `mileage`
					,(SELECT  max(v.vyear) FROM vehicle as v where v.vid= a.vid  ) as vyear
									,(SELECT  max(v.vcolor) FROM vehicle as v where v.vid= a.vid ) as color
									,(SELECT  max(v.plate) FROM vehicle as v where v.vid= a.vid ) as plate
									,(SELECT  max(v.mileage) FROM vehicle as v where v.vid= a.vid ) as mileage
									,(SELECT cc.makername FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid)as  maker
									 ,(SELECT cm.modelname FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid) as model
									 ,
				(select fuelcons	FROM `vehicle` as aa where aa.vid = a.vid ) as fuelcons 

			  FROM `fuel`  as a order  by fdate desc
				
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
			//	$query->execute(array(":start" => $start,":end" => $end,));
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
		public function LoadFuelbyid($id)
		{
				
				$sql = "
				SELECT `id`, a.vid, `driver`, `fdate`, `GasStation`, `Amount`, `oilprice`, `liter`, `mileage`
					,(SELECT  max(v.vyear) FROM vehicle as v where v.vid= a.vid  ) as vyear
									,(SELECT  max(v.vcolor) FROM vehicle as v where v.vid= a.vid ) as color
									,(SELECT  max(v.plate) FROM vehicle as v where v.vid= a.vid ) as plate
									,(SELECT  max(v.mileage) FROM vehicle as v where v.vid= a.vid ) as mileage
									,(SELECT cc.makername FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid)as  maker
									 ,(SELECT cm.modelname FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid) as model

			  FROM `fuel`  as a  where id =:id order  by fdate desc
				
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
			$query->execute(array(":id" => $id));
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
		
		public function AddFuel(
							$vehicle,$driver,$ddate,$gas,$amount,$oil,$liter,$mileage, $distance,  $newMil,  $fueldis
							)
		{
				
				$sql = "
				INSERT INTO `fuel`( `vid`, `driver`, `fdate`, `GasStation`, `Amount`, `oilprice`, `liter`, `mileage`,`distance`, `newMileage`, `fuelcons`)
				VALUES(
				 :vehicle, :driver, :ddate, :gas, :amount, :oil, :liter, :mileage, :distance, :newMil ,:fueldis
				)
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":ddate" => $ddate,
				":driver" => $driver,
				":gas" => $gas,
				":amount" => $amount,
				":oil" => $oil,
				":liter" => $liter,
				":mileage" => $mileage,
				":vehicle" => $vehicle,
				":distance" => $distance,
				":newMil" => $newMil,
				":fueldis" => $fueldis,
				
				));
				
			
				
		}
		
		public function UpdateFuel(
							$vehicle,$driver,$ddate,$gas,$amount,$oil,$liter,$mileage,$id
							)
		{
				
					$sql = "
				Update `fuel` set  `vid`=:vehicle, `driver` =:driver, `fdate`=:ddate, 
				`GasStation`=:gas, `Amount`=:amount,  `oilprice` =:oil, `liter` =:liter, `mileage` = :mileage
				where id=:id";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":ddate" => $ddate,
				":driver" => $driver,
				":gas" => $gas,
				":amount" => $amount,
				":oil" => $oil,
				":liter" => $liter,
				":mileage" => $mileage,
				":vehicle" => $vehicle,
				":id" => $id,
				
				));
			
				
		}
		
		public function deleteFuel($id)
		{
				
				$sql = "
				delete from fuel where id=:id";
				
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id));
				
			
				
		}
		
		public function UpdateStatus($id)
		{
				
				$sql = "
				update inspection set status=1 where id=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id));
				
			
				
		}
		
	
		public function loadChecker()
		{
				
				$sql = "
				SELECT userid, fullname from users where position ='Inspector' order by fullname asc			
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
		}
		
		public function loadVehicle()
		{
				
				$sql = "
				SELECT `vid`, `vyear`, 
				(select makername from carmaker where makerid=a.maker) as maker,
				(select modelname from carmodel where cmid=a.model) as modelcar, 
				 `vcolor`, `plate`,  `mileage`, `vehicleStat` FROM `vehicle` as a  order by  maker asc			
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
		}
		
		
		public function loadmileage($id)
		{
				
				$sql = "
				SELECT mileage from vehicle where vid= :id			
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":id"=>$id));
				return $query->fetchAll();
		}
		public function loadlastfuel($id)
		{
				
				$sql = "
				SELECT mileage,newMileage from fuel where vid= :id order by fdate DESC	
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":id"=>$id));
				return $query->fetchAll();
		}
		
		public function checkIfHave($id)
		{
				
				$sql = "
				SELECT COUNT(*) as totalfuel from fuel where vid= :id 	
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":id"=>$id));
				return $query->fetch()->totalfuel;
		}
		
}
?>