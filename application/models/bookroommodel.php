<?php

class BookroomModel
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



		
		
		
	
		public function getUser()
		{
				
				$sql = "
					Select a.userid,
					(Select department from department where did= a.depid ) as department,
					(Select cname from company as c where c.cid= a.cid ) as company,
					a.fullname
					from users as a order by a.fullname		
				";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
		public function getroom()
		{
				
				$sql = "
					SELECT `roomid`, `roomname` FROM `room` order by roomname asc	
				";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
			
		public function getroomName($id)
		{
				
				$sql = "
					SELECT  `roomname` as roomName FROM `room` as a ,  reqbook as b  where  a.roomid=b.rid and b.rbid =:id	
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
					$query->execute(array(':id' => $id));
				return $query->fetch()->roomName;
			
				
		}
		


// ================ add new for booking room by user login only ======================

public function getbookroombyuser($userid)
		{
		
        	$sql = "
        	SELECT a.`rbid`, a.`rid`, a.`purposed`, a.`participant`, a.`startdate`, a.`enddate`, 
        	a.`remarks`, a.`createuser`,a.`userid`,a.status,r.roomname as roomName,
        	u.fullname as requestor,u.fullname as creator
        	
        	FROM `reqbook` as a 
            join room as r on r.roomid=a.rid
            join users as u on u.userid=a.userid
            where a.createuser=:userid and a.status='Booked' 
        	ORDER BY `a`.`status` ASC
        	";
	        $this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
    		$query = $this->db->prepare($sql);
    		$query->execute( array(':userid' => $userid));
    		return $query->fetchAll();
			
				
		}


//===================================================================================
		public function viewbookroomselect($userid)
		{
				

			

		$sql = "
	SELECT `rbid`, `rid`, `purposed`, `participant`, `startdate`, `enddate`, `remarks`, a.`createuser` ,a.`userid` ,
	(select `roomname` FROM `room`  as b WHERE b.roomid=a.rid) as roomName,
	(select `fullname` FROM `users`  as b WHERE b.userid=:userid) as requestor,
	(select `fullname` FROM `users`  as b WHERE b.userid=:userid) as creator, a.status
	FROM `reqbook` as a where a.createuser=:userid
	order by rbid desc
	";
	$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				$query->execute( array(':userid' => $userid, ));
				return $query->fetchAll();
			
				
		}


// ================ add new for booking room by user login only ======================


public function getReserveRoom()
		{
				
				$sql = "
				SELECT `rbid`, `rid`, `purposed`, `participant`, `startdate`, `enddate`, `remarks`, `createuser`,a.`userid` ,
				(select `roomname` FROM `room`  as b WHERE b.roomid=a.rid) as roomName,
				(select `fullname` FROM `users`  as b WHERE b.userid=a.userid) as requestor,
				(select `fullname` FROM `users`  as b WHERE b.userid=a.createuser) as creator, a.status
				FROM `reqbook` as a where a.status ='Booked' and a.enddate >= (SELECT CURRENT_TIMESTAMP)
				order by a.rbid desc
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
//  add new separate by user request ==========================
public function getReserveRoom_byuser($userId)
		{
				
				$sql = "
				SELECT a.`rbid`, a.`rid`, a.`purposed`, a.`participant`, a.`startdate`, a.`enddate`, 
                a.`remarks`, a.`createuser`,a.`userid`,a.status,r.roomname as roomName,
                u.fullname as requestor,u.fullname as creator
                
                FROM `reqbook` as a 
                join room as r on r.roomid=a.rid
                join users as u on u.userid=a.userid
                where a.createuser=:userId  
                ORDER BY `a`.`status` ASC
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				// $query->execute();
				$query->execute(array(':userId' => $userId));	
				return $query->fetchAll();
			
				
		}

//  add new separate by user request ==========================



		public function CheckDateRange($start, $end,$rid)
		{
				
				
				$sql = "
				
				
				SELECT COUNT(DISTINCT x.rid) as av
							   FROM reqbook x 
							   LEFT 
							   JOIN reqbook y 
								 ON y.rid = x.rid 
								AND y.startdate < :end
								AND y.enddate > :start 
							  WHERE y.rid=:rid and not  y.status in ('Cancelled' , 'Completed')
				
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':start' => $start,
				':end' => $end,
				':rid' => $rid));
				$query->execute();
				return $query->fetch()->av;
				
		}

		public function  getCancell($today)
		{
				
				
				$sql = "update `reqbook` set status='Cancelled'  WHERE startdate <= :today and status='Booked'";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				$query->execute(array(':today' => $today));				
				
				
				
		}
	
		public function  selectCancell($today)
		{
				
				
				$sql = "select  startdate from  `reqbook`   WHERE startdate < :today and status='Booked'";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				$query->execute(array(':today' => $today));				
				return $query->fetchAll();
				
				
		}
	
		public function insertData($start, $end, $rid, $purpose, $participant, $remarks, $createuser, $userid , $inclusions)
		{
				
				
				$sql = "
				
				INSERT INTO `reqbook`
				(`rid`, `purposed`, `participant`, `startdate`, `enddate`, `remarks`, `createuser`,userid,status, inclusion)
				VALUES (
				:rid, :purpose,:participant,:start,:end,:remarks,:createuser,:userid, 'Booked', :inclusions
				)
				
				";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				$query->execute(array(':start' => $start,
				':end' => $end,
				':rid' => $rid,
				':purpose' => $purpose,
				':participant' => $participant,
				':remarks' => $remarks,
				':createuser' => $createuser,
				':userid' => $userid,
				':inclusions' => $inclusions,
				
				
				));
				
				
		}
		public function deleteRoom($id)
		{
				
				
				$sql = "
				update reqbook set status ='Cancelled' where rbid=:id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
		}
		public function UpdateComplete($endate)
		{
				
				
				$sql = "
				update reqbook set status ='Completed' where  enddate < :endate and status ='Checked-In'
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':endate' => $endate));
				
				
		}


// --------------------------------------------------------------


public function getbookroombyid($id)
		{
				

			

		$sql = "
	SELECT `rbid`, `rid`, `purposed`, `participant`, `startdate`, `enddate`, `remarks`, a.`createuser` ,a.`userid` ,
	(select `roomname` FROM `room`  as b WHERE b.roomid=a.rid) as roomName,
	(select `fullname` FROM `users`  as b WHERE b.userid=:id) as requestor,
	(select `fullname` FROM `users`  as b WHERE b.userid=:id) as creator, a.status
	FROM `reqbook` as a where a.createuser=:id
	order by rbid desc
	";
	$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;"); // ຕັ້ງຄ່າໃຫ້ສະແດງພາສາລາ
				$query = $this->db->prepare($sql);
				$query->execute( array(':id' => $id, ));
				return $query->fetchAll();
			
				
		}

// --------------------------------------------------------------

		
}
