<?php

class MeetingModel
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



		
		
		
	public function CancelRoom($rbid)
		{
				
				$sql = "
				update reqbook set status ='Cancelled' where rbid=:rbid
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":rbid" => $rbid));
				
			
				
	}

	// public function Checkout($rbid)
	// 	{
				
	// 			$sql = "
	// 			update reqbook set status ='Cancelled' where rbid=:rbid
	// 			";
	// 			$query = $this->db->prepare($sql);
	// 			$query->execute(array(":rbid" => $rbid));
				
			
				
	// }


	// public function CompletedRoom($rbid)
	// 	{
				
	// 			$sql = "
	// 			update reqbook set status ='Completed' where rbid=:rbid
	// 			";
	// 			$query = $this->db->prepare($sql);
	// 			$query->execute(array(":rbid" => $rbid));
				
			
				
	// }

	public function CheckinRoom($rbid)
		{
				
				$sql = "
				update reqbook set status ='Checked-In' where rbid=:rbid
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":rbid" => $rbid));
				
			
				
	}


	public function CheckoutRoom($rbid)
		{
				
				$sql = "
				update reqbook set status ='Completed' where rbid=:rbid
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":rbid" => $rbid));
				
			
				
	}
   


		public function checkroom($room)
		{
				
				$sql = "
				SELECT COUNT(roomname) as totalroom from room where roomname=:room
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":room" => $room));
				return $query->fetch()->totalroom;
			
				
		}
		
		
	
		public function checkroomidnot($room, $id)
		{
				
				$sql = "
				SELECT COUNT(roomname) as totalroom1 from room where roomname=:room and not roomid=:id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":room" => $room,":id" => $id));
				return $query->fetch()->totalroom1;
			
				
		}
		public function deleteroom($id)
		{
				
				$sql = "
				delete from room where roomid=:id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id));
				
			
				
		}
	
		public function updateroom($room, $id, $inc)
		{
				
				$sql = "
				update room set roomname =:room, INCLUSIONS=:inc where roomid=:id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":room" => $room,":id" => $id,":inc" => $inc));
				
			
				
		}
	
		public function checkroomid($room, $id)
		{
				
				$sql = "
				SELECT COUNT(roomname) as totalroom from room where roomname=:room and roomid=:id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":room" => $room,":id" => $id));
				return $query->fetch()->totalroom;
			
				
		}
		
		public function insertroom($room, $inc)
		{
				
				$sql = "
				INSERT INTO `room`(`roomname`,`INCLUSIONS`) VALUES (:room, :inc)
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(":room" => $room,":inc" => $inc));
		}
		
		public function getData()
		{
			
				
				$sql = "SELECT `roomid`, `roomname`, INCLUSIONS FROM `room` order by  roomid desc
				";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
				
		}
		
	public function getInclusion($id)
		{
			
				
				$sql = "SELECT  INCLUSIONS FROM `room` where roomid=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(":id" => $id));
				return $query->fetchAll();
				
		}
		
			
}
?>