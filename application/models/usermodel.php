<?php

class UserModel
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



		
		
		
		
		public function Loaddepartment()
		{
				
				$sql = "SELECT * FROM department  order by department asc ";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
		
		public function Loaddcompany()
		{
				
				$sql = "SELECT * FROM company  order by cname asc ";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
		
		public function LoadUser()
		{
				
				$sql = "Select
					b.userid, 
					b.username,
					b.password,
					b.fullname,
					b.contact,
					b.Email,
					b.depid, 
					b.cid, 
					b.position, 
					b.profile,
					(Select department from department where did=b.depid) as department,
					(Select cname from company as a where a.cid=b.cid) as company,
					b.position1 
				FROM users as b WHERE  b.userid <> '1' order by b.userid desc ";
				$query = $this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
			
				
		}
		
		
		public function getUser($id)
		{
				
				$sql = "Select
					b.userid, 
					b.username,
					b.password,
					b.fullname,
					b.contact,
					b.Email,
					b.depid, 
					b.cid, 
					b.position, 
					b.profile,
					b.position1,
					b.signatories,
					(Select department from department where did=b.depid) as department,
					(Select cname from company as a where a.cid=b.cid) as company
				FROM users as b WHERE  b.userid <> '1'  and userid =:id order by b.username asc ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id,));
				return $query->fetchAll();
			
				
		}
		
		

		
		public function AddUser($un, $pw, $fn, $cn,$dep,$cid,$pos,$pro, $email, $position,$sig)
		{
				
				
				
				$sql = "INSERT INTO users( `username`, `password`, `fullname`, `contact`, `Email`, `depid`, `cid`, `position`, `profile`, `position1`,signatories) 
				VALUES (:un, :pw, :fn,:cn,:email,:dep,:cid,:pos,:pro,:position, :sig) ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':un' => $un,':pw' => $pw,':fn' => $fn,
				':cn' => $cn,
				':dep' => $dep,
				':cid' => $cid,
				':pro' => $pro,
				':pos' => $pos,
				':email' => $email,
				':position' => $position,
				':sig' => $sig,
				
				));
				
		}
		
		
		public function CheckUser($un)
		{
				$un = strip_tags($un);
				
				$sql = "Select COUNT(*) as Totalun from users where username =:un ";
				$query = $this->db->prepare($sql);
				$query->execute(array(':un' => $un));
				return $query->fetch()->Totalun;
				
		}
		
		public function UpdateUser2($id, $fn, $cn, $dep, $bu, $ut, $logo , $email, $position,$sig)
		{
								
				$sql = "
				UPDATE `users` SET `fullname`=:fn,`contact`=:cn,`Email`=:email,
				`depid`=:dep, `cid`=:bu,`position`=:ut,`profile`=:logo, `position1`=:position, `signatories`= :sig
				WHERE `userid`=:id";
				
				
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':id' => $id,
				':fn' => $fn,
				':cn' => $cn,
				':dep' => $dep,
				':bu' => $bu,
				':email' => $email,
				':ut' => $ut,
				':position' => $position,
				':sig' => $sig,
				':logo' => $logo,
				
				));
			
				
		}
		
		public function UpdateUserwithoutProfile($id, $fn, $cn, $dep, $bu, $ut,  $email,$position,$sig)
		{
								
				$sql = "update users set  
				fullname=:fn,
				contact=:cn,
				depid=:dep,
				cid=:bu,
				position=:ut,
				Email=:email, 
				position1=:position,
				signatories=:sig
				where userid= :id";
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':id' => $id,
				':fn' => $fn,
				':cn' => $cn,
				':dep' => $dep,
				':bu' => $bu,
				':email' => $email,
				':ut' => $ut,
				':position' => $position,
				':sig' => $sig,
				));
			
				
		}
		public function DeleteGroup($id)
		{
				$id = strip_tags($id);		
							
				$sql = "delete from  tblgroup where groupid= :id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
			
				
		}
		public function ResetPassword($id)
		{
				$pw = md5('12345');					
				$sql = "update users set password= :pw  where userid= :id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id,':pw' => $pw));
			
				
		}
		
		public function DeleteUserAcc($id)
		{
				
				$id = strip_tags($id);
				$sql = "
				delete from users where userid=:id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id'=> $id));
				$query->execute();
				
		}
    
		public function DeleteUserPer($id)
		{
				
				$id = strip_tags($id);
				$sql = "
				delete from permission where userid=:id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id'=> $id));
				$query->execute();
				
		}
		public function UpdateUserPer($id, $per)
		{
				
				$id = strip_tags($id);
				$per = strip_tags($per);
				$sql = "
				update permission set permit=:per where pid=:id
				";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id'=> $id,':per'=> $per));
				$query->execute();
				
		}
    
}
?>