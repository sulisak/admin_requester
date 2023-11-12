<?php

class TaskModel
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


					 
		
		
		public function UpdateData(
							$id,$workcode,$topic,$taskdes,$taskstatus,$incharge
							,$proi,$workprogress, $start,  $deadline,  $deadline2, 
							$duration,$completedate,$completeMonth,$percent,$remark
							)
		{
				
				$sql = "
				update `taskcontrol` set 
				 `code` =:workcode,
				 `topic` = :topic, 
				 `details` =:taskdes,
				 `taskstatus` =:taskstatus,
				 `incharge`=:incharge, 
				 `priority`=:proi,
				 `workprogress`=:workprogress,
				 `startdate`= :start,
				 `deadline`=:deadline, 
				 `deadline2`=:deadline2,
				 `duration`=:duration,
				 `completedDate`=:completedDate, 
				 `completedmonth`=:completedmonth ,
				 `percentage`=:percentage, 
				 `remarks`=:remarks
				where id=:id
								
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id,
				":workcode" => $workcode,
				":topic" => $topic,
				":taskdes" => $taskdes,
				":taskstatus" => $taskstatus,
				":incharge" => $incharge,
				":proi" => $proi,
				":workprogress" => $workprogress,
				":start" => $start,
				":deadline" => $deadline,
				":duration" => $duration,
				":deadline2" => $deadline2,
				":completedDate" => $completedate,
				":completedmonth" => $completeMonth,
				":percentage" => $percent,
				":remarks" => $remark,
				
				));
				
			
				
		}	 
		
		
		public function AddData(
							$nocode,$workcode,$topic,$taskdes,$taskstatus,$incharge
							,$proi,$workprogress, $start,  $deadline,  $deadline2, 
							$duration,$completedate,$completeMonth,$percent,$remark
							)
		{
				
				$sql = "
				INSERT INTO `taskcontrol`(`tid`, `code`, `topic`, `details`, `taskstatus`, `incharge`, `priority`, `workprogress`, `startdate`, `deadline`, `deadline2`, `duration`, `completedDate`, `completedmonth`, `percentage`, `remarks`) 				
				VALUES(
				 :nocode, :workcode, :topic, :taskdes, :taskstatus, :incharge, :proi, :workprogress, 
				 :start, :deadline, :deadline2 ,:duration ,:completedDate ,:completedmonth 
				 ,:percentage,:remarks

				)				
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(":nocode" => $nocode,
				":workcode" => $workcode,
				":topic" => $topic,
				":taskdes" => $taskdes,
				":taskstatus" => $taskstatus,
				":incharge" => $incharge,
				":proi" => $proi,
				":workprogress" => $workprogress,
				":start" => $start,
				":deadline" => $deadline,
				":duration" => $duration,
				":deadline2" => $deadline2,
				":completedDate" => $completedate,
				":completedmonth" => $completeMonth,
				":percentage" => $percent,
				":remarks" => $remark,
				
				));
				
			
				
		}
		
		public function DeleteTask($id)
		{
				
				
				$sql = "Delete from taskcontrol where id=:id ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
				
		}
		
		public function Checkdata($nocode)
		{
				
				
				$sql = "SELECT  COUNT(*) AS totalNew from taskcontrol where tid=:nocode ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':nocode' => $nocode));
				
				return $query->fetch()->totalNew;
				
		}
			public function loadData($start, $end)
		{
				
				
				$sql = "SELECT `tid`, `code`, `topic`, `details`, `taskstatus`, `incharge`, `priority`, `workprogress`, `startdate`, `deadline`, `deadline2`, `duration`, `completedDate`, `completedmonth`, `percentage`, `remarks`, id FROM `taskcontrol` 
				where startdate BETWEEN :start and :end
				order by id desc";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':start' => $start,':end' => $end));
				return $query->fetchAll();
				
		}
		public function getdata($id)
		{
				
				
				$sql = "SELECT `tid`, `code`, `topic`, `details`, `taskstatus`, `incharge`, `priority`, `workprogress`, `startdate`, `deadline`, `deadline2`, `duration`, `completedDate`, `completedmonth`, `percentage`, `remarks`, id FROM `taskcontrol` where id=:id";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				return $query->fetchAll();
				
		}
		
		
		
		
}
?>