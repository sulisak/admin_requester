<?php

class AccidentModel
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



			public function LoadAccidentget($start, $end)		{
				
				$sql = "
				SELECT a.`id`, a.`vid`, `driver`, `datetime`, `cause`
            	,(SELECT  max(v.vyear) FROM vehicle as v where v.vid= a.vid  ) as vyear
            	,(SELECT  max(v.vcolor) FROM vehicle as v where v.vid= a.vid ) as color
            	,(SELECT  max(v.plate) FROM vehicle as v where v.vid= a.vid ) as plate
            	,(SELECT  max(v.mileage) FROM vehicle as v where v.vid= a.vid ) as mileage
            	,(SELECT cc.makername FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid)as  maker
            	,(SELECT cm.modelname FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid) as model
            				 
                 FROM `accidentreport` as a 
                 where datetime between :start and :end
                 order by a.id desc
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
					$query->execute(array(":start" => $start,":end" => $end));
				return $query->fetchAll();
			
				
		}
		
		
	
		public function selectDatainspect($id)
		{
				
				$sql = "
				SELECT `id`, `checkerid`, c.vid, `tyre`, `internal`, `external`, `engineoillight`, `brakeLight`, `dateInspect`, `remarks`, `status` , (select fullname from users where users.userid=checkerid) as fcheck, (SELECT CONCAT( (select makername from carmaker where makerid=a.maker) , ' ' , (select modelname from carmodel where cmid=a.model), ' ', `vyear`, ' #', `plate`, ' ',`vcolor`)  
				FROM `vehicle` as a where a.vid = c.vid ) as vehiclename FROM `inspection` as c WHERE id=:id
				
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id));
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
	
		public function LoadAccident()
		{
				
				$sql = "
				SELECT a.`id`, a.`vid`, `driver`, `datetime`, `cause`
            	,(SELECT  max(v.vyear) FROM vehicle as v where v.vid= a.vid  ) as vyear
            	,(SELECT  max(v.vcolor) FROM vehicle as v where v.vid= a.vid ) as color
            	,(SELECT  max(v.plate) FROM vehicle as v where v.vid= a.vid ) as plate
            	,(SELECT  max(v.mileage) FROM vehicle as v where v.vid= a.vid ) as mileage
            	,(SELECT cc.makername FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid)as  maker
            	,(SELECT cm.modelname FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid) as model
            				 
                 FROM `accidentreport` as a order by a.id desc
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		public function AddAccident($vehicle,$name,$remarks,$date)
		{
				
				$sql = "
				INSERT INTO `accidentreport`( `vid`, `driver`, `datetime`, `cause`) VALUES
				(:vehicle , :name, :date , :remarks )
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":name" => $name,
				":remarks" => $remarks,
				":vehicle" => $vehicle,
				":date" => $date,
				));
				
			
				
		}
		
		public function UpdateInspection(
							$checker,$vehicle,$internal,$external,$engine,$break,$idate,$remarks,$tyre,$id
							)
		{
				
				$sql = "
				update `inspection` set  `checkerid`=:checker
				, `vid`=:vehicle
				, `tyre`=:tyre
				, `internal`=:internal
				, `external`= :external
				, `engineoillight` =:engine
				, `brakeLight` =:break
				, `dateInspect` =:idate
				, `remarks` =:remarks
				where id= :id
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":checker" => $checker,
				":internal" => $internal,
				":external" => $external,
				":engine" => $engine,
				":break" => $break,
				":idate" => $idate,
				":remarks" => $remarks,
				":vehicle" => $vehicle,
				":tyre" => $tyre,
				":id" => $id,
				));
				
			
				
		}
		
		public function deleteAccident($id)
		{
				
				$sql = "delete from accidentreport where id=:id";
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
		
		public function RejectRequest($sdate,$edate ,$vid)
		{
				
				$sql = "
				SELECT rid, vehicleid FROM `request` where (departdate	between :sdate and :edate) and vehicleid=:vid and not rstatus ='Completed'
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":sdate" => $sdate,":edate" => $edate,":vid" => $vid,));
				return $query->fetchAll();
		}
		
		public function UpdateRejectRequest($rid)
		{
				
				$sql = "
				Update `request` set rstatus='Cancelled' ,adminApp='X'  where rid=:rid
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":rid" => $rid));
				
		}
		public function UpdateRejectVehicle($vid)
		{
				
				$sql = "
				Update `vehicle` set vehicleStat='Disabled'  where vid=:vid
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":vid" => $vid));
				
		}
		
}
?>