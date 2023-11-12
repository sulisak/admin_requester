<?php

class ChecklistModel
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



		public function loadDatabetweenAll($cid,$date,$enddate){
				
				
				$sql = "
				SELECT `id`, `cleaner`, `cleandate`, `dutiesid`, `grade`, bb.cid, bb.fid ,
					(select duties from duties as a where a.did=bb.dutiesid) as duties,
					(select facilityname from facility as a where a.fid=bb.fid) as facilityname,
					(select cname from company as a where a.cid=bb.cid) as cname
					FROM `cleaning` as bb  WHERE 					
					cid =:cid and 
					
					cleandate between :date and  :enddate
					
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(
				
				':cid' => $cid,				
				':date' => $date,
				':enddate' => $enddate,
				));
				return $query->fetchAll();
				
		}
		public function loadDatabetween($cid,$fid,$date,$enddate){
				
				
				$sql = "
				SELECT `id`, `cleaner`, `cleandate`, `dutiesid`, `grade`, bb.cid, bb.fid ,
					(select duties from duties as a where a.did=bb.dutiesid) as duties,
					(select facilityname from facility as a where a.fid=bb.fid) as facilityname,
					(select cname from company as a where a.cid=bb.cid) as cname
					FROM `cleaning` as bb  WHERE 					
					cid =:cid and 
					fid =:fid and 
					cleandate between :date and  :enddate
					
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(
				
				':cid' => $cid,
				':fid' => $fid,
				':date' => $date,
				':enddate' => $enddate,
				));
				return $query->fetchAll();
				
		}
		
	
		public function loadfacility($id){
				
				
				$sql = "SELECT `fid`, `facilityname`, `cid` FROM `facility` WHERE cid=:id";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				return $query->fetchAll();
				
		}
		public function loadData($cid,$fid,$date){
				
				
				$sql = "
				SELECT `id`, `cleaner`, `cleandate`, `dutiesid`, `grade`, bb.cid, bb.fid ,
					(select duties from duties as a where a.did=bb.dutiesid) as duties,
					(select facilityname from facility as a where a.fid=bb.fid) as facilityname,
					(select cname from company as a where a.cid=bb.cid) as cname
					FROM `cleaning` as bb  WHERE 					
					cid =:cid and 
					fid =:fid and 
					cleandate =:date
					
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(
				
				':cid' => $cid,
				':fid' => $fid,
				':date' => $date,
				));
				return $query->fetchAll();
				
		}
		
		public function DeleteChecklist($id){
				
				
				$sql = "Delete FROM `cleaning`  WHERE id=:id";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
				
		}
		
		
		public function loadDuties($id){
				
				
				$sql = "SELECT `did`, `duties`, `fid` FROM `duties`  WHERE fid=:id";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				return $query->fetchAll();
				
		}
		
		public function insertcleaning($cleaner,$date,$duties, $grade, $cid, $fid ){
				
				
				$sql = "
				INSERT INTO `cleaning`(`cleaner`, `cleandate`, `dutiesid`, `grade`, `cid`, `fid`) VALUES
				(:cleaner, :date, :duties, :grade,  :cid,  :fid )
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':cleaner' => $cleaner,
				':date' => $date,
				':duties' => $duties,
				':grade' => $grade,
				':cid' => $cid,
				':fid' => $fid,
				));
			
				
		}
		
		public function CheckDuties($duties,$cid,$fid,$date )
		{
							
				$sql = "SELECT  COUNT(*) AS total from cleaning where 
				dutiesid= :duties and
				cid =:cid and 
				fid =:fid and 
				cleandate =:date
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':duties' => $duties,
				':cid' => $cid,
				':fid' => $fid,
				':date' => $date,
				
				));
				$query->execute();
				return $query->fetch()->total;
				
		}
		
		
}
?>