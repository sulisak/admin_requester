<?php

class DashboardModel
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



		public function LoadTopthreeMostItem($start, $end)
		{
				
				
				$sql = "
					select r.productid,
					(select barcode from product as a where  a.id=r.productid)  as  barcode,
					(select pname from product as a where  a.id=r.productid)  as  pname,
					(select uom from product as a where  a.id=r.productid)  as  uom
					from stationary as r 				
									
					where 
					daterequest between :start and :end
					group	
					by	r.productid order by count(r.productid) desc limit 3							
				";
				$query = $this->db->prepare($sql);			
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetchAll();
				
		}

		public function totalStationaryCancelledReq($start, $end)
		{
				
							
				$sql = "SELECT  Count(*) as totalStationCancelled  from stationary where  daterequest between :start and :end 
				and status='Cancelled'";
			
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalStationCancelled;
				
		}
		
		public function totalStationaryCompletedReq($start, $end)
		{
				
							
				$sql = "SELECT  Count(*) as totalStationCompleted  from stationary where  daterequest between :start and :end 
				and status='Completed'";
			
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalStationCompleted;
				
		}
		
		public function totalStationaryPendingReq($start, $end)
		{
				
							
				$sql = "SELECT  Count(*) as totalStationPending  from stationary where  daterequest between :start and :end 
				and status='Pending'";
			
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalStationPending;
				
		}
		
		public function LoadTopthreeMostRoom($start, $end)
		{
				
				
				$sql = "
				select r.rid,
					(select roomname from room as a where  a.roomid=r.rid)  as  roomName			
					from reqbook as r 				
									
					where 
					startdate between :start and :end
					group	
					by	r.rid order by count(r.rid) desc limit 3							
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);			
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetchAll();
				
		}

		public function totalbookCancelReq($start, $end)
		{
				
							
				$sql = "SELECT  Count(*) as totalBookcancel  from reqbook where  startdate between :start and :end 
				and status='Cancelled'";
			
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalBookcancel;
				
		}
		public function totalbookCompleteReq($start, $end)
		{
				
							
				$sql = "SELECT  Count(*) as totalBookcomplete  from reqbook where  startdate between :start and :end 
				and status='Complete'";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalBookcomplete;
				
		}
		public function totalbookPendingReq($start, $end)
		{
				
							
				$sql = "SELECT  Count(*) as totalBookPending  from reqbook where  startdate between :start and :end 
				and status='Pending'";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalBookPending;
				
		}


		public function LoadTopthreeVehicleFuelCost($start, $end)
		{
				
				
				$sql = "
				select r.vid,
					(select makername from carmaker as a, vehicle as v where a.makerid=v.maker and v.vid=r.vid)  as  vmaker,
					(select modelname from carmodel as a, vehicle as v where a.cmid=v.model and v.vid=r.vid) as vmodel ,
					(select plate from vehicle as vv where vv.vid=r.vid)  as platenum,
					(select vyear from vehicle as vv where vv.vid=r.vid)  as vyear,
					(select vcolor from vehicle as vv where vv.vid=r.vid)  as vcolor
					from fuel as r 
					where 
					fdate between :start and :end
					group	
					by	r.vid order by count(r.vid) desc limit 3							
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);			
			$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetchAll();
				
		}


		public function totalFuelCostlast($start, $end)
		{
				
							
				$sql = "SELECT  Sum(Amount) as totalFuellast  from fuel where  fdate between :start and :end";
			
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalFuellast;
				
		}

		public function totalFuelCost($start, $end)
		{
				
							
				$sql = "SELECT  Sum(Amount) as totalFuel  from fuel where  fdate between :start and :end";
			
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalFuel;
				
		}

		public function LoadToptreeVehicleCost($start, $end)
		{
				
				
				$sql = "
				select r.vid,
					(select makername from carmaker as a, vehicle as v where a.makerid=v.maker and v.vid=r.vid)  as  vmaker,
					(select modelname from carmodel as a, vehicle as v where a.cmid=v.model and v.vid=r.vid) as vmodel ,
					(select plate from vehicle as vv where vv.vid=r.vid)  as platenum,
					(select vyear from vehicle as vv where vv.vid=r.vid)  as vyear,
					(select vcolor from vehicle as vv where vv.vid=r.vid)  as vcolor
					from maintenance as r 
					where 
					rdate between :start and :end
					group	
					by	r.vid order by count(r.vid) desc limit 3							
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);			
			$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetchAll();
				
		}
	
		public function totalPendingMaintainance($start, $end)
		{
				
							
				$sql = "SELECT  Count(*) as totalMPending  from maintenance where  rdate between :start and :end and status='0'";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalMPending;
				
		}	
		
	
		public function totalCostMaintainance($start, $end)
		{
				
							
				$sql = "SELECT  sum(cost) as totalCost  from maintenance where  rdate between :start and :end and status='1'";
			
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalCost;
				
		}	
		
		
		public function LoadToptreeVehiclerequest($start, $end)
		{
				
				
				$sql = "
				select r.vehicleid,
					(select makername from carmaker as a, vehicle as v where a.makerid=v.maker and v.vid=r.vehicleid)  as  vmaker,
					(select modelname from carmodel as a, vehicle as v where a.cmid=v.model and v.vid=r.vehicleid) as vmodel ,
					(select plate from vehicle as vv where vv.vid=r.vehicleid)  as platenum,
					(select vyear from vehicle as vv where vv.vid=r.vehicleid)  as vyear,
					(select vcolor from vehicle as vv where vv.vid=r.vehicleid)  as vcolor
					from request as r 
					where 
					dateRequest between :start and :end
					group	
					by	r.vehicleid order by count(r.vehicleid) desc limit 3							
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);			
			$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetchAll();
				
		}
			
		
		public function CancelRequest($start, $end)
		{
				
							
				$sql = "SELECT  COUNT(*) as totalCancel from request where  dateRequest between :start and :end	and rstatus='Cancelled'";
			
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalCancel;
				
		}		
		
		
		public function CompleteRequest($start, $end)
		{
				
							
				$sql = "SELECT  COUNT(*) as totalComplete from request where  dateRequest between :start and :end	and rstatus='Completed'";
			
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalComplete;
				
		}		
		
		public function PendingRequest($start, $end)
		{
				
							
				$sql = "SELECT  COUNT(*) as totalPending from request where  dateRequest between :start and :end	and rstatus in ('Pending', 'Booked')";
			
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalPending;
				
		}
		
		public function ActiveUsers($start, $end)
		{
				
							
				$sql = "SELECT  max(a.username) AS totalUserActive,
				(select fullname from users as aa where aa.username=Max(a.username)) as Uname,
				(select profile from users as aa where aa.username=Max(a.username)) as profile,
				(select username from users as aa where aa.username=Max(a.username)) as username
				
				from mobilelogs as a where logsdate between   :start and :end
				group by a.username
			
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
					$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetchAll();
				
		}
		
		public function getTotalActiveUsers($date)
		{
				
							
				$sql = "SELECT  COUNT(session_userid) AS totalUserActive from sessions where 
				session_date = :date group by session_date
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':date' => $date ));
				return $query->fetch()->totalUserActive;
				
		}
		
		public function getTotalRequestStationary($start, $end)
		{
				
							
				$sql = "SELECT  COUNT(*) AS totalRequestStationary from stationary where 
				daterequest between :start and :end
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalRequestStationary;
				
		}
		
		public function getTotalRequest($start, $end)
		{
				
							
				$sql = "SELECT  COUNT(*) AS totalRequest from request where 
				dateRequest between :start and :end
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalRequest;
				
		}
		
		public function getTotalRequestBook($start, $end)
		{
				
							
				$sql = "SELECT  COUNT(*) AS totalRequestBook from reqbook where 
				startdate between :start and :end
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':end' => $end ,':start' => $start ));
				return $query->fetch()->totalRequestBook;
				
		}
		
		
		
		
		public function CheckAccount($userId, $token, $date)
		{
				$userId = strip_tags($userId);
				$token = strip_tags($token);
				$date = strip_tags($date);
							
				$sql = "SELECT  COUNT(*) AS LogUser from sessions where 
				session_userid=:userId and 
				session_token=:token and 
				session_date=:date
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':userId' => $userId ,':token' => $token ,':date' => $date));
				return $query->fetch()->LogUser;
				
		}
		
			public function checkCurrentPassword($un,$pw)
		{
				$un = strip_tags($un);				
				$pw = strip_tags($pw);				
				$sql = "SELECT COUNT(*) as totalUser FROM  users  WHERE  userid=:un and password=:pw";
				$query = $this->db->prepare($sql);
				$query->execute(array(':un' => $un,':pw' => $pw));
				return $query->fetch()->totalUser;
				
		}
		public function UpdateCurrentPassword($un,$cp,$np)
		{
				$un = strip_tags($un);
				
				$np = md5($np);
				$sql = "Update users set Password =:np    WHERE  userid=:un ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':un' => $un,':np' => $np));
			
				
		}
		public function updatestatus($st,$vid)
		{
				
				
				$sql = "update  vehicle set st=:st where vid=:vid ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid,':st' => $st, ));
				
				
		}
		public function loadVehicle()
		{
				
				
				$sql = "SELECT vid, vin, vyear, maker, model, vcolor,
				plate, maxpassenger, transmission, engine, tankcapacity, 
				fueltype, mileage , vehicleStat, changeoil
					,(select makername from carmaker as a where a.makerid=maker ) as makercar
					,(select modelname from carmodel as a where a.cmid=model ) as modelcar	,
					changeoil, startingMileage		, st	
					,  `LaoType`,`LaoInsureExpired`, `LaoRenew`, `ThaiType`, `ThaiRenew`,  `ThaiExpired`,`CarInsExpired`, `RoadTaxExpire`, `BusinessUnit`, `fuelcons`,
					lastchange, needchangeoil, logo
										FROM vehicle  ";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
			
				$query->execute();
				return $query->fetchAll();
				
		}
		
		public function loadVehicleAv()
		{
				
				
				$sql = "SELECT b.vid, vin, vyear, maker, model, vcolor, plate, maxpassenger, transmission, engine, tankcapacity, fueltype, mileage , vehicleStat, changeoil ,
				(select makername from carmaker as a where a.makerid=maker ) as makercar ,(select modelname from carmodel as a where a.cmid=model ) as modelcar ,
				(select (sdate) from datemaintainance as a where a.vid=b.vid order by (a.id) desc limit 1 ) as sdate ,
				(select (enddate) from datemaintainance as a where a.vid=b.vid order by (a.id) desc limit 1) as edate ,
				(select (remarks) from datemaintainance as a where a.vid=b.vid  order by (a.id) desc limit 1) as remarks, 
				changeoil, startingMileage , st
				,  `LaoType`,`LaoInsureExpired`, `LaoRenew`, `ThaiType`, `ThaiRenew`,  `ThaiExpired`,`CarInsExpired`, `RoadTaxExpire`, `BusinessUnit`, `fuelcons`,	lastchange, needchangeoil

				FROM vehicle as b ";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
			
				$query->execute();
				return $query->fetchAll();
				
		}
		
		public function getUpdateVehicle($vid)
		{
				
							
				$sql = "
					SELECT vid, vin, vyear,
				maker
					
					, model, vcolor, plate, maxpassenger, transmission, engine, tankcapacity, fueltype, mileage 

					,(select makername from carmaker as a where a.makerid=maker ) as makercar
					,(select modelname from carmodel as a where a.cmid=model ) as modelcar
					, changeoil	,  `LaoType`,`LaoInsureExpired`, `LaoRenew`, `ThaiType`, `ThaiRenew`,  `ThaiExpired`,`CarInsExpired`,
					`RoadTaxExpire`, `BusinessUnit`, `fuelcons`,	lastchange, needchangeoil, logo
					FROM vehicle  where vid=:vid
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid ));
				return $query->fetchAll();
				
		}
		
		
		public function getUpdateVehiclePhoto($vid)
		{
				
							
				$sql = "
					SELECT logo
					FROM vehicle  where vid=:vid
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid ));
				return $query->fetchAll();
				
		}
		
		public function updateMarkedChangeoil($vid, $changeoil)
		{
				
							
				$sql = "
					update vehicle set  needchangeoil= :changeoil
					   where vid=:vid
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid ,':changeoil' => $changeoil ));
				
				
		}
		
		public function UpdateVehiclePro($vid,$color,$year,$plate,$engine,$tank,$mileage,$maxpassenger, $coil,$laotype,$laoInsren,$laoInsexp,$thaitype,$thaiInsrenew,$thaiInsexp,
						$Insdate,$roadDate,$fuelcons,$location)
		{
				
							
				$sql = "
					update vehicle set vyear = :year, 
					vcolor = :color, 
					plate = :plate, 
					maxpassenger =:maxpassenger, 
					engine =:engine,
					tankcapacity =:tank, 
					mileage = :mileage ,				
					changeoil=:coil,
					startingMileage = :mileage ,
					`LaoType` = :laotype ,
					`LaoInsureExpired`= :laoInsexp ,
					`LaoRenew`= :laoInsren ,
					`ThaiType`= :thaitype ,
					`ThaiRenew`= :thaiInsrenew , 
					`ThaiExpired`= :thaiInsexp ,
					`CarInsExpired`= :Insdate ,
					`RoadTaxExpire`= :roadDate ,
					`BusinessUnit`= :location ,
					`fuelcons`= :fuelcons 
					
					 where vid=:vid
					 
				
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':vid' => $vid, 
				':color' => $color, 
				':year' => $year, 
				':plate' => $plate, 
				':engine' => $engine, 
				':tank' => $tank, 
				':mileage' => $mileage, 
				':maxpassenger' => $maxpassenger ,
				':coil' => $coil ,
				':laotype' => $laotype,
				':laoInsren' => $laoInsren,
				':laoInsexp' => $laoInsexp,
				':thaitype' => $thaitype,
				':thaiInsrenew' => $thaiInsrenew,
				':thaiInsexp' => $thaiInsexp,
				':Insdate' => $Insdate,
				':roadDate' => $roadDate,
				':fuelcons' => $fuelcons,
				':location' => $location,
				
				));
				
				
		}
				
		public function UpdateVehicleProPhoto($vid,$color,$year,$plate,$engine,$tank,$mileage,$maxpassenger, $coil,$laotype,$laoInsren,$laoInsexp,$thaitype,$thaiInsrenew,$thaiInsexp,
						$Insdate,$roadDate,$fuelcons,$location, $logo)
		{
				
							
				$sql = "
					update vehicle set vyear = :year, 
					vcolor = :color, 
					plate = :plate, 
					maxpassenger =:maxpassenger, 
					engine =:engine,
					tankcapacity =:tank, 
					mileage = :mileage ,				
					changeoil=:coil,
					startingMileage = :mileage ,
					`LaoType` = :laotype ,
					`LaoInsureExpired`= :laoInsexp ,
					`LaoRenew`= :laoInsren ,
					`ThaiType`= :thaitype ,
					`ThaiRenew`= :thaiInsrenew , 
					`ThaiExpired`= :thaiInsexp ,
					`CarInsExpired`= :Insdate ,
					`RoadTaxExpire`= :roadDate ,
					`BusinessUnit`= :location ,
					`fuelcons`= :fuelcons ,
					logo=:logo
					
					 where vid=:vid
					 
				
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':vid' => $vid, 
				':color' => $color, 
				':year' => $year, 
				':plate' => $plate, 
				':engine' => $engine, 
				':tank' => $tank, 
				':mileage' => $mileage, 
				':maxpassenger' => $maxpassenger ,
				':coil' => $coil ,
				':laotype' => $laotype,
				':laoInsren' => $laoInsren,
				':laoInsexp' => $laoInsexp,
				':thaitype' => $thaitype,
				':thaiInsrenew' => $thaiInsrenew,
				':thaiInsexp' => $thaiInsexp,
				':Insdate' => $Insdate,
				':roadDate' => $roadDate,
				':fuelcons' => $fuelcons,
				':location' => $location,
				':logo' => $logo
				
				));
				
				
		}

		public function UpdateVehicleProTrans($vid,$transmission)
		{
				
							
				$sql = "
					update vehicle set transmission = :transmission
					 where vid=:vid
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':vid' => $vid, 
				':transmission' => $transmission, 
				 
				));
				
				
		}
		
		public function UpdateVehicleProFuel($vid,$fuel)
		{
				
							
				$sql = "
					update vehicle set fueltype = :fuel
					 where vid=:vid
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':vid' => $vid, 
				':fuel' => $fuel, 
				 
				));
				
				
		}
		
		public function CheckCar($vin)
		{
				
							
				$sql = "SELECT  COUNT(*) AS totalvehicle from vehicle where  vin = :vin		
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vin' => $vin ));
				return $query->fetch()->totalvehicle;
				
		}
		

		public function deleteVehicle($vid)
		{
				
							
				$sql = "delete  from vehicle where  vid = :vid		
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid ));
			
				
		}
		
		public function insertVehicle($vin,$maker,$model,$year,$color,$plate,$transmission,$engine,$tank,$fuel,$mileage,$maxpassenger,$TIME,$coil
		,$laotype,$laoInsren,$laoInsexp,$thaitype,$thaiInsrenew,$thaiInsexp,
		$Insdate,$roadDate,$fuelcons,$location, $logo)
		{
				
							
				$sql = "
				INSERT INTO vehicle(vin, vyear, maker, model, vcolor, plate, maxpassenger, 
				transmission, engine, tankcapacity, fueltype, mileage, vehicleStat, timmer, changeoil, startingMileage,st
				,  `LaoType`,`LaoInsureExpired`, `LaoRenew`, `ThaiType`, `ThaiRenew`,  `ThaiExpired`,`CarInsExpired`, `RoadTaxExpire`, `BusinessUnit`, `fuelcons`,lastchange,needchangeoil,logo
				) 
				VALUES (:vin,:year, :maker, :model ,:color,:plate,:maxpassenger,:transmission,:engine,
				:tank,:fuel,:mileage,'Available',:TIME,:coil,:mileage,'1',
				:laotype,  :laoInsexp, :laoInsren,:thaitype, :thaiInsrenew, :thaiInsexp, :Insdate, :roadDate, :location, :fuelcons 
				,:mileage, (:mileage + :coil) , :logo)		
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':vin' => $vin,
				':year' => $year,
				':maker' => $maker,
				':model' => $model,
				':color' => $color,
				':plate' => $plate,
				':maxpassenger' => $maxpassenger,
				':transmission' => $transmission,
				':engine' => $engine,
				':tank' => $tank,
				':fuel' => $fuel,
				':mileage' => $mileage,
				':TIME' => $TIME,
				':coil' => $coil,
				':laotype' => $laotype,
				':laoInsren' => $laoInsren,
				':laoInsexp' => $laoInsexp,
				':thaitype' => $thaitype,
				':thaiInsrenew' => $thaiInsrenew,
				':thaiInsexp' => $thaiInsexp,
				':Insdate' => $Insdate,
				':roadDate' => $roadDate,
				':fuelcons' => $fuelcons,
				':location' => $location,
				':logo' => $logo,
				));
			
				
		}
    
}
?>