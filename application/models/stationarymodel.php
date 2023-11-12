<?php

class StationaryModel
{
	/**
	 * Every model needs a database connection, passed to the model
	 * @param object $db A PDO database connection
	 */
	function __construct($db)
	{
		try {
			$this->db = $db;
		} catch (PDOException $e) {
			exit('Database connection could not be established.');
		}
	}



	public function checkstatusCancel($id)
	{

		$sql = "
			        SELECT Count(*) as totalcount FROM `stationary` where id=:id and lineManagerid=1

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
		));
		return $query->fetchAll();
	}



	public function getRequestEmail($id)
	{

		$sql = "
			        SELECT `id`, `reqCode`, `requestor`, (select Email from users as a where userid=requestor) as Email FROM `stationary` where id=:id

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
		));
		return $query->fetchAll();
	}

	//=========================================  update new for requestor request list ===========

	public function LoadRequestdep($dep)
	{

		$sql = "
				SELECT a.`id`, `reqCode`, `requestor`, a.`productid`, `reqqty`, `dateneeded`, `daterequest`, `remarks`,
				`lineManagerid`, `adminid`, `given`, `status`, `linemanagerdate`, `admindate`, `givendate`,
				(Select fullname from users where userid=given) as givenby,
				(Select fullname from users where userid=requestor) as requestorname,
				(Select fullname from users where userid=lineManagerid) as linemane,
				(Select fullname from users where userid=adminid) as adminname	,
				(Select cname from users as bb , company as cc  where userid=requestor and cc.cid =bb.cid) as company	,
				(Select department from users as bb , department as cc  where userid=requestor and cc.did =bb.depid) as department	,

				(Select profile from users where userid=given) as givenprofile,
				(Select profile from users where userid=requestor) as requestorprofile,
				(Select profile from users where userid=lineManagerid) as lineprofile,
				(Select profile from users where userid=adminid) as adminprofile	,


				(Select barcode from product as b where b.id=productid) as barcode	,
				(Select pname from product as b where b.id=productid) as pname,
				(Select uom from product as b where b.id=productid) as uom,
				(Select unitprice from product as b where b.id=productid) as unitprice,
				(Select categoryname from product as b , category as c where b.id=productid and c.catid=b.category ) as category,
				totalcost,linemanagerdate,admindate, givendate,canceldate,
				(
				select photo from  stockphoto as aa
				where aa.sid =a.`productid`) as logo
					FROM `stationary` as a , users as u where u.userid=a.requestor and u.depid=:dep  and status='Pending'
				 order by  a.id desc

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(':dep' => $dep,));
		return $query->fetchAll();
	}
	public function LoadRequest($userid)
	{

		$sql = "
				SELECT a.`id`, `reqCode`, `requestor`, a.`productid`, `reqqty`, `dateneeded`, `daterequest`, `remarks`,
				`lineManagerid`, `adminid`, `given`, `status`, `linemanagerdate`, `admindate`, `givendate`,
				(Select fullname from users where userid=given) as givenby,
				(Select fullname from users where userid=requestor) as requestorname,
				(Select fullname from users where userid=lineManagerid) as linemane,
				(Select fullname from users where userid=adminid) as adminname	,
				(Select cname from users as bb , company as cc  where userid=requestor and cc.cid =bb.cid) as company	,
				(Select department from users as bb , department as cc  where userid=requestor and cc.did =bb.depid) as department	,

				(Select profile from users where userid=given) as givenprofile,
				(Select profile from users where userid=requestor) as requestorprofile,
				(Select profile from users where userid=lineManagerid) as lineprofile,
				(Select profile from users where userid=adminid) as adminprofile	,


				(Select barcode from product as b where b.id=productid) as barcode	,
				(Select pname from product as b where b.id=productid) as pname,
				(Select uom from product as b where b.id=productid) as uom,
				(Select unitprice from product as b where b.id=productid) as unitprice,
				(Select categoryname from product as b , category as c where b.id=productid and c.catid=b.category ) as category,
				totalcost,linemanagerdate,admindate, givendate,canceldate,
				(
				select photo from  stockphoto as aa
				where aa.sid =a.`productid`) as logo
				FROM `stationary` as a where a.requestor = :userid
				 order by  a.id desc

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(':userid' => $userid,));
		return $query->fetchAll();
	}

	//=========================================  update new for requestor request list ===========


	public function loaduser($username)
	{

		$sql = "
				SELECT username from users where username=:username

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":username" => $username,
		));
		return $query->fetchAll();

		print_r($username);
		// $_SESSION['SESS_MEMBER_Username']=$username;

		// echo "<td><div style='min-width:200px'>".$username."</div></td>";
	}
	// ==============================================================================================


	public function AddData($id, $userid, $barcode, $qty, $dateneed, $date, $remark, $totalcost)
	{

		$sql = "
				INSERT INTO `stationary`(
				`reqCode`, `requestor`,`productid`, `reqqty`, `dateneeded`,
				`daterequest`, `remarks`,`status`,totalcost)
				VALUES (:id,
				:userid,
				:barcode,
				:qty,
				:dateneed,
				:date,
				:remark,
				'Pending',
				:totalcost
				);";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		// to start find begin transaction ----------
		$this->db->beginTransaction();
		// to start find begin transaction ----------
		$query->execute(array(
			":id" => $id,
			":userid" => $userid,
			":barcode" => $barcode,
			":qty" => $qty,
			":dateneed" => $dateneed,
			":date" => $date,
			":remark" => $remark,
			":totalcost" => $totalcost,
		));
		// find id auto increment --------------
		$id =  $this->db->lastInsertId();
		$this->db->commit();
		return $id;
		// find id auto increment --------------
	}
	public function ApproveLine($id, $date, $userid)
	{

		$sql = "
				update stationary set lineManagerid= :userid,
				linemanagerdate= :date
				where id=:id

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":date" => $date,
			":userid" => $userid,
		));
	}
	public function ApproveAdmin($id, $date, $userid)
	{

		$sql = "
				update stationary set adminid= :userid,
				admindate= :date
				where id=:id

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":date" => $date,
			":userid" => $userid,
		));
	}


	public function getRequest($id)
	{

		$sql = "
				SELECT lineManagerid,	adminid ,given,reqqty, productid
				FROM `stationary` as a where id=:id

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
		));
		return $query->fetchAll();
	}


	public function getRequest_stationary($id)
	{

		$sql = "SELECT
		s.`id`,
		s.`reqCode`,
		s.`requestor`,
		s.`productid`,
		s.`reqqty` as quantity,
		s.`dateneeded` as dateneed,
		u.`fullname` as requester_name,
		u.position as position,
		p.pname as product_name
	FROM
		`stationary` as s
		join users as u on s.requestor= u.userid
		join stocks as st on s.productid=st.productid
		join product as p on s.productid=p.id

	WHERE s.`id`=:id limit 1";

		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
		));
		return $query->fetchAll();
	}

	// finde Administrator
	public function getAdministrator($position)
	{
		$sql = "SELECT Email FROM users where position =:position";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":position" => $position,
		));
		return $query->fetchAll();
	}




	public function cancelline($id, $date)
	{

		$sql = "
				update stationary set canceldate= :date
				where id=:id

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":date" => $date
		));
	}

	public function gavebyStat($id, $date, $userid)
	{

		$sql = "
				update stationary set given= :userid,
				givendate= :date
				where id=:id

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":date" => $date,
			":userid" => $userid,
		));
	}
	public function updateStatus($id, $status)
	{

		$sql = "
				update stationary set status= :status
				where id=:id

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":status" => $status,
		));
	}

	public function Updateproduct($id, $qty)
	{

		$sql = "
				update product set qty = (qty - :qty) where id=:id

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":qty" => $qty,
		));
	}
	public function UpdateproductReturn($id, $qty)
	{

		$sql = "
				update product set qty = (qty + :qty) where id=:id

				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
			":qty" => $qty,
		));
	}


	public function CheckDuplicate($id)
	{

		$sql = "
				SELECT Count(*) as total FROM `stationary` WHERE 	reqCode =:id
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":id" => $id));
		return $query->fetch()->total;
	}


	public function getUnitBarcode($barcode)
	{

		$sql = "
				SELECT max(unitprice) as unitprice FROM `product` WHERE 	id =:barcode
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":barcode" => $barcode));
		return $query->fetch()->unitprice;
	}

	public function CheckBarcode($barcode)
	{

		$sql = "
				SELECT Sum(qty) as totalqty FROM `product` WHERE 	id =:barcode
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":barcode" => $barcode));
		return $query->fetch()->totalqty;
	}

	public function LoadData($cid)
	{

		$sql = "
				SELECT `userid`, `username`, `password`, `fullname`, `contact`, `Email`,
				`depid`,
				`cid`,
				`position`,
				`profile` ,
				(select cname from company as b where b.cid=a.cid)as company,
				(select department from department as b where b.did=a.depid)as department
				FROM `users` as a
				WHERE a.cid=:cid
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(':cid' => $cid));
		return $query->fetchAll();
	}
	public function Loadproduct()
	{

		$sql = "
				SELECT `id`, `barcode`, `pname`, `uom`, `qty`, `unitprice`, `critical` FROM `product`
				WHERE qty !=0
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function loadStock($catid)
	{

		$sql = "
				SELECT `id`, `barcode`, `pname`, `uom`, `qty`, `unitprice`, `critical`, `category` FROM `product`
				WHERE qty !=0 and category = :catid
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(':catid' => $catid));
		return $query->fetchAll();
	}
	public function Loadcategory()
	{

		$sql = "
				SELECT `catid`, `categoryname` FROM `category` order by categoryname asc
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
}
