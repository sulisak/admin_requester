<?php

class CompanyModel
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



		
		
		public function Checkcompany($dep)
		{
				
				
				$sql = "SELECT  COUNT(*) AS totaldep from  company where  cname=:dep ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':dep' => $dep));
				
				return $query->fetch()->totaldep;
				
		}
		public function UpdateDep($dep,$id)
		{
				
				
				$sql = "update `department` set  `department`=:dep where did=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':dep' => $dep,':id' => $id));
				
				
		}
		public function DeleteDep($id)
		{
				
				
				$sql = "Delete from company where cid=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
				
		}
		public function Addcompany($dep)
		{
				
				
				$sql = "INSERT INTO `company`(`cname`) VALUES (:dep) ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':dep' => $dep));
				
				
		}
		public function loadCompany()
		{
				
				
				$sql = "Select  `cid`, `cname` FROM `company` order by cname asc";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
				
		}
		
		public function CheckdepartmentandID($id,$dep)
		{
				$sql = "SELECT  COUNT(*) AS totaldep from  company where  cname=:dep  and cid=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':dep' => $dep,':id' => $id));
				return $query->fetch()->totaldep;
				
		}
		
		
		public function CheckdepartmentandnotID($id,$dep)
		{
				$sql = "SELECT  COUNT(*) AS totaldep1 from  company where  cname=:dep  and not cid=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':dep' => $dep,':id' => $id));
				return $query->fetch()->totaldep1;
				
		}
		
		
	
		
}
?>