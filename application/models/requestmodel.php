<?php

class RequestModel
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


        public function CheckCarData($arrival,$depart,$vid)
		{
				
							
				$sql = "
				SELECT DISTINCT x.vehicleid
							   FROM request x 
							   LEFT 
							   JOIN request y 
								 ON y.vehicleid = x.vehicleid 
								AND y.departdate < :arrival 
								AND y.datereturn > :depart
							  WHERE y.vehicleid=:vid and not y.rstatus in ('Cancelled' ,'Completed')
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid,  ':arrival' => $arrival , ':depart' => $depart ));
				return $query->fetchAll();
				
		}
        
		public function TakecarDetails($rid, $un, $date)
		{
				
							
				$sql = "
				INSERT INTO `requestdetail`(`rid`, `username`, `typeUser`, `aprroved`) 
				VALUES(:rid, :un,  'takecar', :date)
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(
					':rid' => $rid ,
					':un' => $un ,
					':date' => $date ,
			));
				
		}
		
		public function UpdateTakecar($rid)
		{
				
							
				$sql = "
					update request set takecar='C' where rid=:id
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $rid ));
				
		}
		
	
		
		public function getDatainfo($id)
		{
				
							
				$sql = "
					SELECT userid, username, password, fullname, contact, email, b.depid, b.cid, position,
					(select cname from company as a where a.cid=b.cid ) as company,
					(select department from department as a where a.did=b.depid ) as department
					FROM users as b where userid=:id
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id ));
				return $query->fetchAll();
				
		}

		// get department ================
		public function getdepartment($id)
		{
				
							
				$sql = "
					SELECT userid, username, password, fullname, contact, email, b.depid, b.cid, position,
					(select cname from company as a where a.cid=b.cid ) as company,
					(select did from department as a where a.did=b.depid ) as department
					FROM users as b where userid=:id
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id ));
				return $query->fetch()->department;
				
		}

		public function getrequester_name($id)
		{
				
							
				$sql = "SELECT userid, fullname  FROM users  where userid=:id";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id ));
				return $query->fetch()->fullname;
				
		}

// ==== add new to get email approver ================
public function  getEmail($list_department)
{
	
		$sql = "SELECT u.Email, u.depid, u.cid, u.position,d.department as department,c.cname as company
		FROM users as u join department as d on u.depid=d.did
		join company as c on u.cid=c.cid
		where u.position='LineManager' and u.depid=:list_department";
		$query = $this->db->prepare($sql);
		$query->execute(array(':list_department' => $list_department));
		$query->execute();
		return $query->fetch()->Email;
		
}
public function  getApprover_name($list_department)
{
	
		$sql = "SELECT u.Email,u.fullname as approver_name , u.depid, u.cid, u.position,d.department as department,c.cname as company
		FROM users as u join department as d on u.depid=d.did
		join company as c on u.cid=c.cid
		where u.position='LineManager' and u.depid=:list_department";
		$query = $this->db->prepare($sql);
		$query->execute(array(':list_department' => $list_department));
		$query->execute();
		return $query->fetch()->approver_name;
		
}
	// ==== add new to get email approver ================	
		
		public function loadUsersAdmin()
		{
				
							
				$sql = "
					SELECT Email	
									
					FROM users as b  where position='Administration' 
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
				
		}
// === add new ========================
		
		
// === add new ========================		
		
		
		public function loadUsers()
		{
				
							
				$sql = "
					SELECT userid, username, password, fullname, contact, email, b.depid, b.cid, position , 
					(select cname from company as a where a.cid=b.cid ) as company,
					(select department from department as a where a.did=b.depid ) as department	
									
					FROM users as b 
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
				
		}
		
		
		public function getVehicleid($id)
		{
				
							
				$sql = "
					select vehicleid from request where rid=:id				
				";
              

				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				return $query->fetchAll();
				
		}
		
		public function UpdateVid($id)
		{
				
							
				$sql = "
					update vehicle set vehicleStat='Pending' where vid=:id				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
			
				
		}



// ========== take car ===============================

		public function takecar($id)
		{
				
							
				$sql = "
					update request set takecar='C' where rid=:id				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
			
				
		}
		

// =============== take car ========================

		
		public function getUserinfo($id)
		{
				
							
				$sql = "
					SELECT userid, username, password, fullname, contact, email, b.depid, b.cid, position ,
					(select cname from company as a where a.cid=b.cid ) as company,
					(select department from department as a where a.did=b.depid ) as department					
					FROM users as b  where  userid=:id
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				return $query->fetchAll();
				
		}
		
		public function getdriverinfo()
		{
				
							
				$sql = "
					SELECT driverId, Dfname, contact, dstatus FROM driver 
				
				";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
				
		}
		public function getVehicleinfo()
		{
				
							
				$sql = "
				SELECT vid, vin, vyear, maker, model, vcolor, plate, maxpassenger, transmission, engine, tankcapacity, fueltype, mileage, vehicleStat, timmer
				,(select makername from  carmaker where makerid=maker) as makername
				,(select modelname from  carmodel where cmid=model) as modelname


				FROM vehicle where st='1' order by maker asc 
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
				//WHERE vehicleStat='Available
		}

		// === add new =========================
		public function Get_request_carname($id)
		{
				
							
				$sql = "SELECT  plate as carname
				FROM vehicle WHERE vid=:id";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				$query->execute();
				return $query->fetch()->carname;
				//WHERE vehicleStat='Available
		}
		// === add new =========================
		
		public function getVehicleRequestbyDateRange($start, $end)
		{
				
							
				$sql = "
				SELECT rid, vrno, departdate, daparttime, datereturn, returntime, r.userid, vehicleid, timer, rstatus, location, dateRequest, purpose, r.driverId ,makername, cmm.modelname , c.cname, d.department,
				(select dr.Dfname from 	driver as dr where  dr.driverId=r.driverId) as Dfname
				
				, u.Email, u.fullname, v.plate,lineManager,adminApp, r.drivertype, r.driverId, r.returnTimekey
				
				
				FROM request as r ,vehicle as v ,carmaker as cmk , carmodel as cmm, company as c, department as d, users as u


				WHERE v.vid=vehicleid and (u.userid=r.userid and d.did=u.depid and u.cid=c.cid) and 
				( v.maker=cmk.makerid and cmm.makerid=cmk.makerid and cmm.cmid=v.model ) and 
				r.departdate BETWEEN :start and :end


				group by vrno
				order by rid desc
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':start' => $start,':end' => $end));
				return $query->fetchAll();
				
		}
		
		public function insertRequestDetails($id, $un, $type, $date)
		{
				
							
				$sql = "
				INSERT INTO `requestdetail`(`rid`, `username`, `typeUser`, `aprroved`) 
				VALUES
				(:id,:un,:type,:date)
				";
				
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':id' => $id,
				':un' => $un,
				':type' => $type,
				':date' => $date,
				));
				
				
		}
		
		public function getVehicleinfobyuser($id)
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
 and ( v.maker=cmk.makerid and cmm.makerid=cmk.makerid and v.model=cmm.cmid) and u.username=:id  group by vrno order by rid desc";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				return $query->fetchAll();
				
		}

public function getVehicleinfobyuserpendingtakecar($userid)
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
 and ( v.maker=cmk.makerid and cmm.makerid=cmk.makerid and v.model=cmm.cmid) and u.userid=:userid and  r.rstatus='Booked' 
 and r.takecar='P' group by vrno order by rid desc ";

				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':userid' => $userid));
				return $query->fetchAll();
				
		}

		
public function getVehicleODM($id)
		{
				
							
				$sql = "
				SELECT  mileage , vcolor, logo
				FROM vehicle WHERE vid=:id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				return $query->fetchAll();
				
		}
		
		public function  CheckdriverAvailavility($driver)
		{
				
				
				$sql = "SELECT  COUNT(*) AS totaldriver from driver where driverId=:driver  and  dstatus='Available'";
				$query = $this->db->prepare($sql);
				$query->execute(array(':driver' => $driver));
				$query->execute();
				return $query->fetch()->totaldriver;
				
		}
		
		
		
		public function  CheckUserAvailavilityperday($id, $today)
		{
				
				
				$sql = "SELECT COUNT(*) AS totaluser from request where userid=:id and dateRequest =:today   and rstatus in ('Booked' , 'Pending')";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id,':today' => $today));
				$query->execute();
				return $query->fetch()->totaluser;
				
		}
		
		
		public function  insertODMlogs($vr, $startodm)
		{
				
				
				$sql = "INSERT INTO odmlogs( startodm,endodm,rid)
				VALUES (:startodm,' ', :vr)";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vr' => $vr,':startodm' => $startodm));
		
				
				
		}
		
		public function  getVehivleinfoRequest($rid)
		{
				
				
				$sql = "
				SELECT mileage FROM `request` as a, vehicle as b WHERE a.vehicleid=b.vid and a.rid= :rid
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid));
				$query->execute();
				
				
		}
		public function  getCancell($today)
		{
				
				
				$sql = "select driverid, rid,vehicleid from `request`  WHERE departdate < :today and takecar='P'";
				$query = $this->db->prepare($sql);
				$query->execute(array(':today' => $today));				
				return $query->fetchAll();	
				
				
		}
		
		
		public function  UpdatecancelVehicle($vehicleid)
		{
				
				
				$sql = "update `vehicle` set vehicleStat='Available' WHERE vid= :vehicleid";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vehicleid' => $vehicleid));
				$query->execute();
				
				
		}
		public function  Updatecanceldriver($driverid)
		{
				
				
				$sql = "update `driver` set dstatus='Available' WHERE driverId= :driverid";
				$query = $this->db->prepare($sql);
				$query->execute(array(':driverid' => $driverid));
				$query->execute();
				
				
		}
		
		public function  UpdatecartakeNOtTake($rid)
		{
				
				
				$sql = "update `request` set rstatus='Cancelled' , takecar ='X' WHERE rid=:rid";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid));
				$query->execute();
				
				
		}
		
		public function  Updatecartake($today)
		{
				
				
				$sql = "update `request` set rstatus='Cancelled' , takecar ='X' WHERE departdate < :today and takecar='P'";
				$query = $this->db->prepare($sql);
				$query->execute(array(':today' => $today));
				$query->execute();
				
				
		}
		
		
		public function  Updatdriver($driverId)
		{
				
				
				$sql = "UPDATE `driver` SET `dstatus`='Available' WHERE `driverId`=:driverId";
				$query = $this->db->prepare($sql);
				$query->execute(array(':driverId' => $driverId));
				$query->execute();
				
				
		}
		
		
		
		public function  CheckUserAvailavility($id)
		{
				
				
				$sql = "SELECT COUNT(*) AS totaluser from request where userid=:id and rstatus in ('Booked' , 'Pending')";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				$query->execute();
				return $query->fetch()->totaluser;
				
		}
		
		
		public function CheckCarAvailavility($car)
		{
				
				
				$sql = "SELECT  COUNT(*) AS totalcar from vehicle where vid=:car  and  vehicleStat='Available' and st='0'";
				$query = $this->db->prepare($sql);
				$query->execute(array(':car' => $car));
				$query->execute();
				return $query->fetch()->totalcar;
				
		}
		
		
		public function CheckUserCount($userid, $date)
		{
				
				
				$sql = "
				SELECT  COUNT(*) as uu  FROM `request` WHERE 
				 userid=:userid and dateRequest=:date
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':depart' => $depart,
				':returndate' => $returndate,
				':vehicleid' => $vehicleid));
				$query->execute();
				return $query->fetch()->uu;
				
		}
		
		public function CheckDateRange($depart, $returndate,$vehicleid)
		{
				
				
				$sql = "
				
				
				SELECT COUNT(DISTINCT x.vehicleid) as av
							   FROM request x 
							   LEFT 
							   JOIN request y 
								 ON y.vehicleid = x.vehicleid 
								AND y.departdate < :returndate
								AND y.datereturn > :depart 
							  WHERE y.vehicleid=:vehicleid and not y.rstatus in ('Cancelled' ,'Completed')
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':depart' => $depart,
				':returndate' => $returndate,
				':vehicleid' => $vehicleid));
				$query->execute();
				return $query->fetch()->av;
				
		}
		public function CheckVrAvailavility($vr)
		{
				
				
				$sql = "SELECT  COUNT(*) AS totalvr from request where vrno=:vr";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vr' => $vr));
				$query->execute();
				return $query->fetch()->totalvr;
				
		}
		public function InsertRequest($userid,$depdate,$deptime,$redate,$retime,$location,$purpose,$car,$driver,$vr,$dateRequest,$timer,$mileage)
		{
				
				
				$sql = "
				INSERT INTO request( vrno, departdate, daparttime, datereturn, returntime, userid, vehicleid, timer, rstatus, location, dateRequest, purpose, driverId, `lineManager`, `returnTimekey`, `adminApp`, `takecar`, `returncar`, drivertype, mileage)
				VALUES (:vr ,:depdate ,:deptime ,:redate ,:retime ,:userid ,:car ,:timer , 'Pending', :location,:daterequest,:purpose,
				0,'P','P','P','P','P',:driver,:mileage)
				";
						$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(				
				':userid' => $userid,
				':depdate' => $depdate,
				':deptime' => $deptime,
				':redate' => $redate,
				':retime' => $retime,
				':location' => $location,
				':purpose' => $purpose,
				':driver' => $driver,
				':car' => $car,
				':vr' => $vr,				
				':daterequest' => $dateRequest,
				':timer' => $timer,
				':mileage' => $mileage,
				
				
				
				));
				
		}
		
		
		public function updateCarstatus($car)
		{
				
							
				$sql = "
					update vehicle set vehicleStat ='Pending'  where vid = :car
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':car' => $car));
				
		}
		public function updateDriverstatus($driver)
		{
				
							
				$sql = "
					update driver set dstatus ='Pending'  where driverId = :driver
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':driver' => $driver));
				
		}
		
		public function updatestatus($rid)
		{
				
							
				$sql = "
					update  request set lineManager ='C'  where rid = :rid
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid));
				
		}
		public function RequestReturn()
		{
				
							
				$sql = "
				SELECT rid, vrno, departdate, daparttime, datereturn, returntime, r.userid, vehicleid, timer, rstatus, location, dateRequest, purpose, r.driverId ,makername, cmm.modelname , c.cname, d.department,  u.Email, u.fullname, v.plate,v.vcolor, v.mileage
				,(select dr.Dfname from driver as dr where  dr.driverId=r.driverId) as Dfname,
				drivertype, r.driverId

				FROM request as r ,vehicle as v ,carmaker as cmk , carmodel as cmm, company as c, department as d, users as u WHERE v.vid=vehicleid and (u.userid=r.userid and d.did=u.depid and u.cid=c.cid) and ( v.maker=cmk.makerid and cmm.makerid=cmk.makerid and cmm.cmid=v.model ) and r.rstatus ='Booked' and r.`takecar`='C' and r.returncar='P'   group by vrno order by departdate desc, daparttime desc
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();		
		}
		
		public function Requestget($rid)
		{
				
							
				$sql = "
						SELECT
						r.userid,
						r.departdate,
						r.purpose,
						r.location,
						r.dateRequest,
						v.plate,
						u.fullname as requester_name,
						u.Email as mail_requester
					FROM
						request as r
						join users as u on u.userid=r.userid
						join vehicle as v on v.vid=r.vehicleid
					WHERE
						r.rid = :rid
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid));
				return $query->fetchAll();		
		}
		
		public function  insertnotification($rid, $userid,$message, $edate, $typeres)
		{
				
							
				$sql = "
				INSERT INTO `notification`(`userid`, `message`, `seen`, `recievedate`, `rid`, `typeres`) VALUES
				(:userid,:message,0 ,:edate,:rid,:typeres )
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid,':userid' => $userid,':message' => $message,':edate' => $edate,':typeres' => $typeres,));
					
		}
		public function selectrequest($rid)
		{
				
							
				$sql = "Select vehicleid from  request where rid = :rid";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid));
				return $query->fetchAll();		
		}
		
		public function updateDriverstatusAdmin($driver,$st)
		{
				
				$sql = "
					update driver set dstatus =:st  where driverId = :driver
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':driver' => $driver,':st' => $st));
				
		}
		
		
		
		
		public function updateVehicletatusAdmin($vid ,$st)
		{
				
				$sql = "
					update vehicle set vehicleStat =:st  where vid = :vid
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid,':st' => $st));
				
		}
		public function updateRequestAdminCancel1($rid ,$st)
		{
				
				$sql = "
					update request set rstatus = :st,  lineManager='X' where rid = :rid
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid ,':st' => $st));
				
		}
		
		public function updateRequestAdminCancel($rid ,$st, $driverId)
		{
				
				$sql = "
					update request set rstatus = :st,  lineManager='X', driverId=:driverId  where rid = :rid
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid ,':st' => $st,':driverId' => $driverId));
				
		}
		
		public function updateRequestAdmin($rid ,$st, $driverId)
		{
				
				$sql = "
					update request set rstatus = :st,  lineManager='C', driverId=:driverId  where rid = :rid
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid ,':st' => $st,':driverId' => $driverId));
				
		}
		
		public function updateRequestAdminTime($rid ,$st,$dateback)
		{
				
				$sql = "
					update request set rstatus = :st  , returnTimekey=:dateback, returncar='C' where rid = :rid
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid ,':st' => $st,':dateback' => $dateback));
				
		}
		
		public function RequestReturnListInfo($rid)
		{
				
							
				$sql = "
				SELECT rid, vrno, departdate, daparttime, datereturn, returntime, r.userid, vehicleid, timer, rstatus, location, dateRequest, purpose, r.driverId ,makername, cmm.modelname ,
				c.cname, d.department,  u.Email, u.fullname, v.plate,v.vcolor, v.mileage,  u.username, u.contact,r.lineManager,r.adminApp,takecar, returncar, returnTimekey
				, (select dr.Dfname from  driver as dr where dr.driverId=r.driverId  ) as Dfname , r.drivertype, r.driverId
				
			
			
				
				,(Select  max(aprroved) from requestdetail as a where a.rid=r.rid and typeUser ='linemanager') as linemanagerappdate
				,(Select  max(aprroved) from requestdetail as a where a.rid=r.rid  and typeUser ='adminapp') as adminappdate
				,(Select  max(aprroved) from requestdetail as a where a.rid=r.rid  and typeUser ='takecar') as takecardate
				
				
				,(Select  max(aprroved) from requestdetail as a where a.rid=r.rid and a.username=u.username and typeUser ='cancelled') as cancelldate
				
				,(Select  max(profile) from requestdetail as a, users as aa where (a.rid=r.rid and
				 a.username=aa.username)  and typeUser ='adminapp') as adminapppic				 
				,(Select  max(profile) from requestdetail as a, users as aa where (a.rid=r.rid and
				 a.username=aa.username) and typeUser ='linemanager') as linemanagerpic
				 
				 
				,(Select  max(fullname) from requestdetail as a, users as aa where (a.rid=r.rid and
				 a.username=aa.username)  and typeUser ='adminapp') as adminFn				 
				,(Select  max(fullname) from requestdetail as a, users as aa where (a.rid=r.rid and
				 a.username=aa.username) and typeUser ='linemanager') as lineFn


				,(Select  max(profile) from users as aa where aa.username=u.username) as reqppic
				 
				 
				 
				FROM request as r ,vehicle as v ,carmaker as cmk , carmodel as cmm, company as c, department as d, users as u WHERE v.vid=vehicleid and  (u.userid=r.userid and d.did=u.depid and u.cid=c.cid) and ( v.maker=cmk.makerid and cmm.makerid=cmk.makerid  and cmm.cmid=v.model) 
				and 
				r.rid= :rid
				group by vrno order by departdate desc, daparttime desc
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid ));
				return $query->fetchAll();		
		}
		
		public function updateVehicleODM($vid ,$st,$odm)
		{
				
				$sql = "
					update vehicle set vehicleStat =:st, mileage =:odm where vid = :vid
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid,':odm' => $odm,':st' => $st));
				
		}
		
		
// 		public function requestApprove($id)
// 		{
				
							
// 				$sql = "
// 				SELECT rid, vrno, departdate, daparttime, datereturn, returntime, r.userid, vehicleid, timer, rstatus, location, dateRequest, purpose, r.driverId ,makername, cmm.modelname , c.cname, d.department,
// 				(select dr.Dfname from 	driver as dr where  dr.driverId=r.driverId) as Dfname
				
// 				, u.Email, u.fullname, v.plate,lineManager,adminApp, r.drivertype, r.driverId, r.returnTimekey, v.logo
				
// 				FROM request as r ,vehicle as v ,carmaker as cmk , carmodel as cmm, company as c, department as d, users as u WHERE v.vid=vehicleid and  (u.userid=r.userid and d.did=u.depid and u.cid=c.cid) and ( v.maker=cmk.makerid and cmm.makerid=cmk.makerid  and cmm.cmid=v.model) 
// 			 and r.userid= :id
// 				group by vrno order by departdate desc, daparttime desc
// 				";
// 				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
// 				$query = $this->db->prepare($sql);
// 				$query->execute(array(':id'=>$id));
// 				return $query->fetchAll();
				
// 		}

public function requestApprovebyDep($depid)
		{
				
							
				$sql = "
				SELECT rid, vrno, departdate, daparttime, datereturn, returntime, r.userid, vehicleid, timer, rstatus, location, dateRequest, purpose, r.driverId ,makername, cmm.modelname , c.cname, d.department,
				(select dr.Dfname from 	driver as dr where  dr.driverId=r.driverId) as Dfname
				
				, u.Email, u.fullname, v.plate,lineManager,adminApp, r.drivertype, r.driverId, r.returnTimekey, v.logo
				
				FROM request as r ,vehicle as v ,carmaker as cmk , carmodel as cmm, company as c, department as d, users as u
				WHERE v.vid=vehicleid and  (u.userid=r.userid and d.did=u.depid and u.cid=c.cid) and ( v.maker=cmk.makerid and cmm.makerid=cmk.makerid  and cmm.cmid=v.model) 
					and u.depid= :depid and lineManager='P' and r.rstatus='Pending'
				group by vrno order by rid desc
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':depid'=>$depid));
				return $query->fetchAll();
				
		}
// ==== update new order by rid ===============================
public function requestApprove($id)
		{
				
							
				$sql = "
				SELECT rid, vrno, departdate, daparttime, datereturn, returntime, r.userid, vehicleid, timer, rstatus, location, dateRequest, purpose, r.driverId ,makername, cmm.modelname , c.cname, d.department,
				(select dr.Dfname from 	driver as dr where  dr.driverId=r.driverId) as Dfname
				
				, u.Email, u.fullname, v.plate,lineManager,adminApp, r.drivertype, r.driverId, r.returnTimekey, v.logo
				
				FROM request as r ,vehicle as v ,carmaker as cmk , carmodel as cmm, company as c, department as d, users as u WHERE v.vid=vehicleid and  (u.userid=r.userid and d.did=u.depid and u.cid=c.cid) and ( v.maker=cmk.makerid and cmm.makerid=cmk.makerid  and cmm.cmid=v.model) 
			 and r.userid= :id
				group by vrno order by rid desc
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id'=>$id));
				return $query->fetchAll();
				
		}

// ==== update new order by rid ===============================
		public function requestHistory()
		{
		    
				
							
				$sql = "
				SELECT rid, vrno, departdate, daparttime, datereturn, returntime, r.userid, vehicleid, timer, rstatus, location, dateRequest, purpose, r.driverId ,makername, cmm.modelname , c.cname, d.department
				, u.Email, u.fullname, v.plate,lineManager,r.returnTimekey
				,(select dr.Dfname from  driver as dr where dr.driverId=r.driverId) as Dfname,
				drivertype, r.driverId , v.logo
				
				
				FROM request as r ,vehicle as v ,carmaker as cmk , carmodel as cmm, company as c, department as d, users as u WHERE v.vid=vehicleid and  (u.userid=r.userid and d.did=u.depid and u.cid=c.cid) and ( v.maker=cmk.makerid and cmm.makerid=cmk.makerid  and cmm.cmid=v.model) 
				group by vrno order by rid desc
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
				
		}
		public function CheckStatustoDelete($rid)
		{
				
							
				$sql = "SELECT Count(*) as totalcount from request where lineManager='C' and adminApp='C' and  rid=:rid";
				$query = $this->db->prepare($sql);
				$query->execute(array(':rid' => $rid));
				return $query->fetch()->totalcount;	
		}
		public function DriverList()
		{
				
							
				$sql = "Select * from  driver  ";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();		
		}
		
		public function DrivertyeUpdate($rid,$drivertype)
		{
				
							
				$sql = "update  request set drivertype=:drivertype where rid=:rid  ";
				$query = $this->db->prepare($sql);
			  $query->execute(array(':rid' => $rid,':drivertype' => $drivertype));	
		}
		
}
?>