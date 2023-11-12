<?php

class SetupModel
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


public function UpdateMaker($id,$maker)
		{
							
				$sql = "
				Update carmaker set makername=:maker
				where makerid = :id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':maker' => $maker,':id' => $id));
				
				
				
		}
		public function deleteMaker($id)
		{
							
				$sql = "
					delete from  carmaker where makerid = :id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
				
				
		}
		
		
	
	public function loadVehicleMaker()		{
				
				
				$sql = "SELECT a.makerid, a.makername,
				(Select Count(*) from carmodel as b where b.makerid= a.makerid) as modelcount
				FROM carmaker as a";
				$query = $this->db->prepare($sql);
			
				$query->execute();
				return $query->fetchAll();
				
		}
		
		
		
		public function CheckMaker($maker)
		{
							
				$sql = "SELECT  COUNT(makername) AS totalUser from carmaker where makername=:maker ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':maker' => $maker));
				$query->execute();
				return $query->fetch()->totalUser;
				
		}
		public function insertMaker($maker)
		{
							
				$sql = "
				INSERT INTO carmaker(makername) 
				VALUES (:maker)
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':maker' => $maker));
				
				
				
		}
		
		
		public function loadVehicleModel()		{
				
				
				$sql = "SELECT cmid, modelname, a.makerid,
					(select makername from carmaker as b where b.makerid=a.makerid) as modelname
					FROM carmodel as a
					";
				$query = $this->db->prepare($sql);
			
				$query->execute();
				return $query->fetchAll();
				
		}
		
		public function getMakerName($id)
		{
							
				$sql = "SELECT  (makername) AS makername from carmaker where makerid=:id ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				$query->execute();
				return $query->fetch()->makername;
				
		}
		
		public function loadVehicleModelbyMakerId($id)	
		{			
				
				$sql = "SELECT cmid, modelname, a.makerid
					FROM carmodel as a where a.makerid=:id
					";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				return $query->fetchAll();
				
		}
		public function DeletevehicleModel($id)	
		{			
				
				$sql = "delete  FROM carmodel where cmid=:id
					";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
		
				
		}
		
		public function checkModel($maker,$cmodelname)
		{
							
				$sql = "SELECT  COUNT(modelname) AS tcmodelname from carmodel where makerid=:maker and modelname=:cmodelname ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':maker' => $maker,':cmodelname' => $cmodelname));
				$query->execute();
				return $query->fetch()->tcmodelname;
				
		}
		public function addModelpro($maker,$cmodelname)
		{
							
				$sql = "INSERT INTO `carmodel`( `modelname`, `makerid`)
				values(:cmodelname,:maker)";
				$query = $this->db->prepare($sql);
				$query->execute(array(':maker' => $maker,':cmodelname' => $cmodelname));
			
				
		}
    
}
?>