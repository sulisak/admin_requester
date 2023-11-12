<?php

class DocumentModel
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



		
		
		public function getdata($userid)
		{
				
				
				$sql = "SELECT `userid`,
					 `depid`, `cid`, fullname,Email,
					 (select department from department where did=depid) as department,
					  (select cname from company as aa where aa.cid= a.cid) as company
					FROM `users` as a WHERE userid=:userid";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':userid' => $userid));
				$query->execute();
				return $query->fetchAll();
				
		}
		
		public function loadData($document)
		{
				
				
				$sql = "SELECT `id`, `refno`, `intentedrec`, `recEmail`, `businessunit`, `description`, `messenger`, `messengertel`, `receiver`, `sender`, `senderemail`, `datesend`, `doctype`, `type`, `status`, `companyid`, `userid`, `department`, document,
				 `documentNum`, `Remarks`, `workplace` FROM `documentin`
					where document =:document   order by id desc ";
					$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':document' => $document));
				return $query->fetchAll();
				
		}
		
		public function Insertdata($ref, $userid, $email, $bu, $dep, $des, $messenger, $messengertel,  $receiver,  $sender, 
				$senderemail,$date,$doctype, $type,  $cid, $fn ,$document, $dc,$workplace, $remarks )
		{
				
				
				$sql = "
				INSERT INTO `documentin`(`refno`, `intentedrec`, `recEmail`, `businessunit`, `description`, 
				`messenger`, `messengertel`, `receiver`, `sender`, `senderemail`, `datesend`, `doctype`, 
				`type`, `status`, `companyid`, userid, department, document, `documentNum`, `Remarks`, `workplace`
				) VALUES
				(:ref, :fn, :email, :bu, :des, :messenger, :messengertel, :receiver, 
				:sender, :senderemail,  :date,  :doctype,  :type, '0', :cid, :userid, :dep, :document
				,:dc, :workplace, :remarks
				);		
				";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(
				':ref' => $ref,
				':userid' => $userid,
				':email' => $email,
				':bu' => $bu,
				':dep' => $dep,
				':des' => $des,
				':messenger' => $messenger,
				':messengertel' => $messengertel,
				':receiver' => $receiver,
				':sender' => $sender,
				':senderemail' => $senderemail,
				':date' => $date,
				':doctype' => $doctype,
				':type' => $type,
				':cid' => $cid,
				':fn' => $fn,
				':document' => $document,
					':dc' => $dc,
						':workplace' => $workplace,
							':remarks' => $remarks,
				
				));		
				
		}
		
		public function CheckRef($ref)
		{
				
				
				$sql = "SELECT  COUNT(*) AS totalUser from documentin where refno=:ref";
				$query = $this->db->prepare($sql);
				$query->execute(array(':ref' => $ref));
				return $query->fetch()->totalUser;
				
		}
		public function DeleteData($id)
		{
				
				
				$sql = "update  documentin set status=2 where id=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
		}
		public function updateComplete($id)
		{
				
				
				$sql = "update  documentin set status=1 where id=:id";
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
		}
		
		public function loadDatafromdb($id)
		{
				
				
				$sql = "SELECT `id`, `refno`, `intentedrec`, `recEmail`, `businessunit`, `description`, `messenger`, `messengertel`, `receiver`, `sender`, `senderemail`, `datesend`, `doctype`, `type`, `status`, 
				`companyid`, `userid`, `department`, document, `documentNum`, `Remarks`, `workplace` FROM `documentin`
				where id =:id";
				$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
				$query = $this->db->prepare($sql);
				$query->execute(array(':id' => $id));
				
				return $query->fetchAll();
				
		}
	
		
}
?>