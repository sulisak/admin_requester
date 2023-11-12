<?php

class StockModel
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






	public function insertphoto($id, $logo)
	{

		$sql = "
		          INSERT INTO `stockphoto`( `sid`, `photo`)	VALUES(:sid , :logo);		
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":sid" => $id, ":logo" => $logo));
	}


	public function updatephoto($id, $logo)
	{

		$sql = "
		    	update stockphoto set `photo` =:logo  WHERE  `sid` =:sid			
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":sid" => $id, ":logo" => $logo));
	}

	public function getunlink($id)
	{

		$sql = "
		    	SELECT `photo` FROM `stockphoto` WHERE  `sid` =:sid			
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":sid" => $id));
		return $query->fetchAll();
	}

	public function getPhoto($id)
	{

		$sql = "
		    	SELECT `id`, `sid`, `photo` FROM `stockphoto`  WHERE  `sid` =:sid			
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":sid" => $id));
		return $query->fetchAll();
	}





	public function CheckBarcode($barcode)
	{

		$sql = "
				SELECT Count(*) as total FROM `product` WHERE 
				barcode =:barcode
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(":barcode" => $barcode));
		return $query->fetch()->total;
	}

	public function LoadStock()
	{

		$sql = "
				SELECT `id`, b.`barcode`, `pname`, `uom`, `qty`, `unitprice`, `critical`, b.`category` ,
				(SELECT  `categoryname` FROM `category`  as a WHERE a.catid=b.category) as catname,
				(SELECT  Count(a.productid) FROM `stationary`  as a WHERE a.productid=b.id) as countReq,
				(SELECT sum(addqty) from stocks as aa where aa.productid=b.`id`) as totalqty,
				(SELECT sum(aa.totalcost) from stocks as aa where aa.productid=b.`id`) as totalcosting,
				(SELECT max(datein) from stocks as aa where aa.productid=b.`id`order by id desc limit 1) as datein,
				(SELECT max(unitprice) from stocks as aa where aa.productid=b.`id` order by id desc limit 1) as upPrice,
				(SELECT max(photo) from stockphoto as aa where aa.sid=b.`id` ) as photo
				FROM `product`	as b order by id desc			
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	public function getunitprice($id)
	{

		$sql = "
				SELECT  `unitprice` 
			
				FROM `stocks`	as b where productid=:id order by id desc			
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
		));
		return $query->fetch()->unitprice;
	}
	public function LoadStockHistory($id)
	{

		$sql = "
				SELECT `id`, `productid` as barcode, `datein`, `addqty`, `unitprice`, `totalcost` 
			
				FROM `stocks`	as b where productid=:id order by id desc			
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":id" => $id,
		));

		return $query->fetchAll();
	}
	public function LoadCategory()
	{

		$sql = "
				SELECT `catid`, `categoryname` FROM `category`	order by catid desc			
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}


	public function addStockQty($id, $newqty)
	{

		$sql = "
				update `product` set  `qty` = (qty + :newqty) 
				where id=:id
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":newqty" => $newqty,
			":id" => $id,

		));
	}

	public function AddStock($barcode, $qty, $unitprice, $totalcost, $datein)
	{

		$sql = "
				INSERT INTO `stocks`(`productid`, `datein`, `addqty`, `unitprice`, `totalcost`)
				VALUES (:barcode ,:datein ,:qty, :unitprice ,:totalcost)
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		
		$query->execute(array(
			":barcode" => $barcode,
			":totalcost" => $totalcost,
			":qty" => $qty,
			":unitprice" => $unitprice,
			":datein" => $datein,

		));
		
	}
	public function getid($barcode)
	{

		$sql = "
				SELECT  `id` 
			
				FROM `product`	as b where barcode=:barcode 		
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":barcode" => $barcode,
		));
		return $query->fetch()->id;
	}

	public function AddProduct($barcode, $pname, $uom, $rep, $qty, $unitprice, $cat)
	{

		$sql = "
				INSERT INTO `product`(`barcode`, `pname`, `uom`, `qty`, `unitprice`, `critical`, `category`)  
				VALUES(
				 :barcode, :pname, :uom, :qty, :unitprice, :rep	, :cat	)
				
				";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");

		$query = $this->db->prepare($sql);
		$query->execute(array(
			":barcode" => $barcode,
			":pname" => $pname,
			":uom" => $uom,
			":rep" => $rep,
			":qty" => $qty,
			":unitprice" => $unitprice,
			":cat" => $cat,
		));
	}

	public function UpdateStock($id, $name, $uom, $rep, $cat)
	{

		$sql = "
				UPDATE `product` SET `pname`=:name,
				`uom`=:uom,`critical`=:rep	, category= :cat
					
				where id=:id";
		$this->db->exec("SET collation_connection = utf8_bin; SET NAMES utf8;");
		$query = $this->db->prepare($sql);
		$query->execute(array(
			":name" => $name,
			":uom" => $uom,


			":rep" => $rep,
			":id" => $id,
			":cat" => $cat,
		));
	}

	public function deleteStock($id)
	{

		$sql = "
				delete from product where id=:id";
		$query = $this->db->prepare($sql);
		$query->execute(array(":id" => $id));
	}
}
