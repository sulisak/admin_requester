<?php

class LoginModel
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



		
		public function CheckAccountLogin($email,$pass)
		{
				$email = strip_tags($email);
				$pass = strip_tags($pass);
				
				$sql = "SELECT  COUNT(Username) AS totalUser from users where username=:email and password=:pass  ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':email' => $email,':pass' => $pass));
				$query->execute();
				return $query->fetch()->totalUser;
				
		}
		
		public function getData($email,$pass)
		{
				$email = strip_tags($email);
				$pass = strip_tags($pass);
				
				$sql = "SELECT 
				 a.userid, a.username, a.password, a.fullname, a.contact, a.email, a.depid, a.cid, a.position,
				 (select d.department from department as d where d.did=a.depid) as  department,
				 (select c.cname from company as c where c.cid=a.cid) as company
				, profile
				
				from users as a where a.username=:email and a.password=:pass ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':email' => $email,':pass' => $pass));
				$query->execute();
				return $query->fetchAll();
				
		}
		public function getCompany()
		{
				
				
				$sql = "SELECT * FROM company order by cname asc   ";
				$query = $this->db->prepare($sql);
			
				$query->execute();
				return $query->fetchAll();
				
		}
		
		public function DeleteSession($userid)
		{
				$userid = strip_tags($userid);				
				
				$sql = "delete from sessions where session_userid=:userid";
				$query = $this->db->prepare($sql);
				$query->execute(array(':userid' => $userid));
				$query->execute();
			
				
		}
		public function InsertSession($userid,$unique, $date )
		{
				$userid = strip_tags($userid);				
				$unique = strip_tags($unique);				
				$date = strip_tags($date);				
				
				$sql = "INSERT INTO sessions(session_userid, session_token, session_date)
				VALUES (:userid,:unique, :date )";
				$query = $this->db->prepare($sql);
				$query->execute(array(':userid' => $userid,':unique' => $unique,':date' => $date));
			
			
				
		}
		
		
		
	
		
    
}
?>