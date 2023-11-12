<?php

class MaintainanceModel
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

        public function deletePhoto($id)
		{
				
				$sql = "delete FROM `maintenancephoto` WHERE id =:id";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id,));
				//return $query->fetchAll();
		}

    	public function getPic($id)
		{
				
				$sql = "SELECT  `photo` FROM `maintenancephoto` WHERE id =:id";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id,));
				return $query->fetchAll();
			
				
		}

        public function loaddatapic($nid)
		{
				
				$sql = "SELECT `id`, `mid`, `photo` FROM `maintenancephoto` WHERE mid =:nid";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':nid' => $nid,));
				return $query->fetchAll();
			
				
		}

		public function insertphoto($id,$name)
		{
				
				
				$sql = "
				INSERT INTO `maintenancephoto`( `photo` ,`mid`) 
				VALUES ( :name ,:id)
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id,':name' => $name	
				));
				
				
		}
		
		
	
		public function CheckVR($vid, $date)
		{
				
				
				
				$sql = "SELECT  COUNT(*) AS totalUser from maintenance where vid =:vid and rdate=:date";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vid' => $vid,':date' => $date));
				$query->execute();
				return $query->fetch()->totalUser;
			
				
		}
	
		public function InserVr($vr, $date, $vehicle, $location, $amount, $purpose, $user)
		{
				
				
				
				$sql = "
				INSERT INTO `maintenance`( `reqnum`, `rid`, `rdate`, `location`, `cost`, `purpose`, `approved`, `vid`, `status`) 
				VALUES (
				:vr,
				:user,
				:date,
				:location,
				:amount,
				:purpose,
				0
				,:vehicle
				,'0'
				)
				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':vr' => $vr,':date' => $date,
				':vehicle' => $vehicle,
				':location' => $location,
				':amount' => $amount,
				':purpose' => $purpose,
				':user' => $user,
				
				));
				
			
				
		}
		
		/*public function UpdateVr( $date, $vehicle, $location, $amount, $purpose, $user, $id)
		{
				
				
				
				$sql = "
				update `maintenance` set  `rdate`, `location`, `cost`, `purpose`, `vid`, `status`) 
				VALUES (
				:vr,
				:user,
				:date,
				:location,
				:amount,
				:purpose,
				0
				,:vehicle
				,'0'
				)
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':vr' => $vr,':date' => $date,
				':vehicle' => $vehicle,
				':location' => $location,
				':amount' => $amount,
				':purpose' => $purpose,
				':user' => $user,
				':id' => $id,
				
				));
				
			
				
		}
		*/
		
		public function LoadMaintainance()
		{
				
				$sql = "
				SELECT `id`, `reqnum`, `rid`, `rdate`, `location`, `cost`, `purpose`, `approved`, `vid` 
			,( select fullname from users where userid=a.rid) as requestor
			,( select fullname from users where userid=a.approved) as approval
			, status
			,(SELECT  max(v.vyear) FROM vehicle as v where v.vid= a.vid  ) as vyear
				,(SELECT  max(v.vcolor) FROM vehicle as v where v.vid= a.vid ) as color
				,(SELECT  max(v.plate) FROM vehicle as v where v.vid= a.vid ) as plate
				,(SELECT  max(v.mileage) FROM vehicle as v where v.vid= a.vid ) as mileage
				,(SELECT cc.makername FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid)as  maker
				 ,(SELECT cm.modelname FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid) as model
			
			FROM `maintenance`  as a order by rdate desc
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
			//	$query->execute(array(":start" => $start,":end" => $end,));
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
		public function selectData($id)
		{
				
				$sql = "
				SELECT `id`, `reqnum`, `rid`, `rdate`, `location`, `cost`, `purpose`, `approved`, `vid` 
			,( select fullname from users where userid=a.rid) as requestor
			,( select fullname from users where userid=a.approved) as approval
			, status
			,(SELECT  max(v.vyear) FROM vehicle as v where v.vid= a.vid  ) as vyear
				,(SELECT  max(v.vcolor) FROM vehicle as v where v.vid= a.vid ) as color
				,(SELECT  max(v.plate) FROM vehicle as v where v.vid= a.vid ) as plate
				,(SELECT  max(v.mileage) FROM vehicle as v where v.vid= a.vid ) as mileage
				,(SELECT cc.makername FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid)as  maker
				 ,(SELECT cm.modelname FROM vehicle as v, carmodel as cm, carmaker as cc WHERE v.maker=cc.makerid and cm.cmid=v.model and cm.makerid=cc.makerid and v.vid=a.vid) as model
			
			FROM `maintenance`  as a  where id=:id   order by rdate desc
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id));
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
			
		public function deleteMaintainance($id)
		{
				
				$sql = "
				delete from maintenance where id=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id));
				
			
				
		}
	
	
		public function UpdateStatus($id,$user)
		{
				
				$sql = "
				update  maintenance set approved =:user, status=1 where id=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id,":user" => $user));
				
			
				
		}
		
	
		
}
?>