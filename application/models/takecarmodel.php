<?php

class TakecarModel
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



		
		
		
	
		public function selectDatacar($id)
		{
				
				$sql = "
				SELECT rid, vrno, departdate, daparttime, datereturn, returntime, r.userid, vehicleid,  r.rstatus, location, dateRequest, purpose, r.driverId ,makername, cmm.modelname , c.cname, d.department, (select dr.Dfname from driver as dr where dr.driverId=r.driverId) as Dfname , v.plate,lineManager,adminApp, r.drivertype, r.driverId,
r.mileage, v.vcolor, takecar, returncar, u.fullname

,(Select  max(aprroved) from requestdetail as a where a.rid=r.rid and typeUser ='linemanager'  ) as linemanagerappdate
,(Select  max(aprroved) from requestdetail as a where a.rid=r.rid  and typeUser ='adminapp') as adminappdate

,(Select  max(profile) from requestdetail as a, users as aa where (a.rid=r.rid and a.username=aa.username)  and typeUser ='adminapp') as adminapppic				 
,(Select  max(profile) from requestdetail as a, users as aa where (a.rid=r.rid and a.username=aa.username) and typeUser ='linemanager') as linemanagerpic
,(Select  max(fullname) from requestdetail as a, users as aa where (a.rid=r.rid and	 a.username=aa.username)  and typeUser ='adminapp') as adminFn				 
,(Select  max(fullname) from requestdetail as a, users as aa where (a.rid=r.rid and	 a.username=aa.username) and typeUser ='linemanager') as lineFn

,v.logo
	



 FROM request as r ,vehicle as v ,carmaker as cmk , carmodel as cmm, company as c, department as d, users as u WHERE v.vid=vehicleid and (u.userid=r.userid and d.did=u.depid and u.cid=c.cid)
 and ( v.maker=cmk.makerid and cmm.makerid=cmk.makerid and v.model=cmm.cmid) and u.username='$un'  group by vrno order by rid desc
				
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id));
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
	
		// public function LoadInspection()
		// {
				
		// 		$sql = "
		// 		SELECT a.id,  a.checkerid,  a.vid,  a.tyre,  a.internal,  a.external,  a.engineoillight,  a.brakeLight,  a.dateInspect, 
		// 		 a.remarks,  a.status
		// 		,(SELECT  max(v.vyear) FROM vehicle as v where v.vid= a.vid  ) as vyear
		// 		,(SELECT  max(v.vcolor) FROM vehicle as v where v.vid= a.vid ) as color
		// 		,(SELECT  max(v.plate) FROM vehicle as v where v.vid= a.vid ) as plate
		// 		,(SELECT  max(v.mileage) FROM vehicle as v where v.vid= a.vid ) as mileage
		// 		,(SELECT cc.makername FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid)as  maker
		// 		 ,(SELECT cm.modelname FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid) as model
				 
		// 		  ,( select fullname from users where userid=a.checkerid) as checker
		// 		  ,deactivate
		// 		  , a.logo
		// 		  ,	(SELECT  max(v.logo) FROM vehicle as v where v.vid= a.vid  ) as vehicleimage
		// 		FROM inspection as a
		// 		order by id desc 
				
				
		// 		";
		// 		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາວ
		// 		$query = $this->db->prepare($sql);
		// 	//	$query->execute(array(":start" => $start,":end" => $end,));
		// 		$query->execute();
		// 		return $query->fetchAll();
			
				
		// }




		// public function AddInspection(
		// 					$checker,$vehicle,$internal,$external,$engine,$break,$idate,$remarks,$tyre
		// 					)
		// {
				
		// 		$sql = "
		// 		INSERT INTO `inspection`( `checkerid`, `vid`, `tyre`, `internal`, `external`, `engineoillight`, `brakeLight`, `dateInspect`, `remarks`, `status`, `deactivate`) 
		// 		VALUES
		// 		(
		// 		:checker, :vehicle, :tyre, :internal, :external, :engine
		// 		, :break, :idate, :remarks, 'Pending','1'
				
		// 		)
				
		// 		";
		// 		$query = $this->db->prepare($sql);
		// 		$query->execute(array(":checker" => $checker,
		// 		":internal" => $internal,
		// 		":external" => $external,
		// 		":engine" => $engine,
		// 		":break" => $break,
		// 		":idate" => $idate,
		// 		":remarks" => $remarks,
		// 		":vehicle" => $vehicle,
		// 		":tyre" => $tyre,
		// 		));
				
			
				
		// }
		
		// public function UpdateTakecar(
		// 					$checker,$vehicle,$internal,$external,$engine,$break,$idate,$remarks,$tyre,$id
		// 					)
		// {
				
		// 		$sql = "
		// 		update `inspection` set  `checkerid`=:checker
		// 		, `vid`=:vehicle
		// 		, `tyre`=:tyre
		// 		, `internal`=:internal
		// 		, `external`= :external
		// 		, `engineoillight` =:engine
		// 		, `brakeLight` =:break
		// 		, `dateInspect` =:idate
		// 		, `remarks` =:remarks
		// 		where id= :id
				
		// 		";
		// 		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
		// 		$query = $this->db->prepare($sql);
		// 		$query->execute(array(":checker" => $checker,
		// 		":internal" => $internal,
		// 		":external" => $external,
		// 		":engine" => $engine,
		// 		":break" => $break,
		// 		":idate" => $idate,
		// 		":remarks" => $remarks,
		// 		":vehicle" => $vehicle,
		// 		":tyre" => $tyre,
		// 		":id" => $id,
		// 		));
				
			
				
		// }
		
		// public function deleteInspection($id)
		// {
				
		// 		$sql = "
		// 		delete from inspection where id=:id";
		// 		$query = $this->db->prepare($sql);
		// 		$query->execute(array(":id" => $id));
				
			
				
		// }
		
		public function UpdateTakecar($rid)
		{
				
				$sql = "
				update request set rstatus='Pending' where rid=:rid";
				$query = $this->db->prepare($sql);
				$query->execute(array(":rid" => $rid));
				
			
				
		}
		
	
		// public function loadChecker()
		// {
				
		// 		$sql = "
		// 		SELECT userid, fullname from users where position ='Inspector' order by fullname asc			
		// 		";
		// 		$query = $this->db->prepare($sql);
		// 		$query->execute();
		// 		return $query->fetchAll();
		// }
		
		// public function loadVehicle()
		// {
				
		// 		$sql = "
		// 		SELECT `vid`, `vyear`, 
		// 		(select makername from carmaker where makerid=a.maker) as maker,
		// 		(select modelname from carmodel where cmid=a.model) as modelcar, 
		// 		 `vcolor`, `plate`,  `mileage`, `vehicleStat` FROM `vehicle` as a  order by  maker asc			
		// 		";
		// 		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
		// 		$query = $this->db->prepare($sql);
		// 		$query->execute();
		// 		return $query->fetchAll();
		// }
		
		// public function RejectRequest($sdate,$edate ,$vid)
		// {
				
		// 		$sql = "
		// 		SELECT rid, vehicleid FROM `request` where (departdate	between :sdate and :edate) and vehicleid=:vid and not rstatus ='Completed'
		// 		";
		// 		$query = $this->db->prepare($sql);
		// 		$query->execute(array(":sdate" => $sdate,":edate" => $edate,":vid" => $vid,));
		// 		return $query->fetchAll();
		// }
		
		// public function UpdateRejectRequest($rid)
		// {
				
		// 		$sql = "
		// 		Update `request` set rstatus='Cancelled' ,adminApp='X'  where rid=:rid
		// 		";
		// 		$query = $this->db->prepare($sql);
		// 		$query->execute(array(":rid" => $rid));
				
		// }
		// public function UpdateRejectVehicle($vid)
		// {
				
		// 		$sql = "
		// 		Update `vehicle` set vehicleStat='Disabled'  where vid=:vid
		// 		";
		// 		$query = $this->db->prepare($sql);
		// 		$query->execute(array(":vid" => $vid));
				
		// }
		
}
?>