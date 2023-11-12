<?php

class DepartmentModel
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



		
		
		public function Checkdepartment($dep)
		{
				
				
				$sql = "SELECT  COUNT(*) AS totaldep from  department where  department=:dep ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':dep' => $dep));
				$query->execute();
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
				
				
				$sql = "Delete from department where did=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
				
		}
		public function AddDep($dep)
		{
				
				
				$sql = "INSERT INTO `department`(`department`) VALUES (:dep) ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':dep' => $dep));
				
				
		}
		public function loadDep()
		{
				
				
				$sql = "Select `did`, `department` from department order by department";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
				
		}
		
		public function CheckdepartmentandID($id,$dep)
		{
				$sql = "SELECT  COUNT(*) AS totaldep from  department where  department=:dep  and did=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':dep' => $dep,':id' => $id));
				return $query->fetch()->totaldep;
				
		}
		
		
		public function CheckdepartmentandnotID($id,$dep)
		{
				$sql = "SELECT  COUNT(*) AS totaldep1 from  department where  department=:dep  and not did=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':dep' => $dep,':id' => $id));
				return $query->fetch()->totaldep1;
				
		}
		
		
	
		
}
?>