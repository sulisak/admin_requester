<?php

class CleaningModel
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

		public function deleteMaker($id)
		{
							
				$sql = "
					delete from  facility where fid = :id
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
				
				
		}

		public function insertFacility($maker, $cid)
		{
							
				$sql = "
				INSERT INTO facility(facilityname,cid) 
				VALUES (:maker, :cid)
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':maker' => $maker,':cid' => $cid));
				
				
				
		}
		
		public function CheckMaker($maker)
		{
							
				$sql = "SELECT  COUNT(*) AS totalUser from facility where facilityname=:maker ";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':maker' => $maker));
				$query->execute();
				return $query->fetch()->totalUser;
				
		}

		public function DeleteDuties($id)	
		{			
				
				$sql = "delete  FROM duties where did=:id
					";
						$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
				
		}
		
	
		public function loadcompany()		{
				
				
				$sql = "SELECT `cid`, `cname` FROM `company` order by cid desc";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
			
				$query->execute();
				return $query->fetchAll();
				
		}
	
		public function loadfacility()		{
				
				
				$sql = "SELECT a.fid, `facilityname`, a.cid ,
				(Select Count(*) from duties as b where b.fid= a.fid) as dutiesCount,
				(select cname  from company as b where b.cid=a.cid) as company
				FROM `facility` as a order by a.fid desc";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
			
				$query->execute();
				return $query->fetchAll();
				
		}
		public function checkFacility($fid,$duties)
		{
							
				$sql = "SELECT  COUNT(*) AS tcmodelname from duties where fid=:fid and duties=:duties ";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':fid' => $fid,':duties' => $duties));
				$query->execute();
				return $query->fetch()->tcmodelname;
				
		}
		
		public function addDutiespro($fid,$duties)
		{
							
				$sql = "INSERT INTO `duties`( `duties`, `fid`)
				values(:duties,:fid)";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':fid' => $fid,':duties' => $duties));
			
				
		}
		public function getMakerName($id)
		{
							
				$sql = "SELECT  (facilityname) AS makername from facility where fid=:id ";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				$query->execute();
				return $query->fetch()->makername;
				
		}
		
		public function loadVehicleModelbyMakerId($id)	
		{			
				
				$sql = "SELECT did, duties, a.fid
					FROM duties as a where a.fid=:id
					";
						$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				return $query->fetchAll();
				
		}
		
		public function UpdateMaker($id,$maker)
		{
							
				$sql = "
				Update facility set facilityname=:maker
				where fid = :id
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':maker' => $maker,':id' => $id));
				
				
				
		}
		
		
}
?>