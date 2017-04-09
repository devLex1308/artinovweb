SELECT * FROM Customers;

CustomerID	CustomerName	ContactName	Address	City	PostalCode	Country


SELECT column1, column2, ...
FROM table_name;

SELECT * FROM table_name;

SELECT DISTINCT column1, column2, ...
FROM table_name;

SELECT DISTINCT Country FROM Customers;

SELECT column1, column2, ...
FROM table_name
WHERE condition;


Operator	Description
=	Equal
<>	Not equal. Note: In some versions of SQL this operator may be written as !=
>	Greater than
<	Less than
>=	Greater than or equal
<=	Less than or equal
BETWEEN	Between an inclusive range
LIKE	Search for a pattern
IN	To specify multiple possible values for a column

SELECT column1, column2, ...
FROM table_name
WHERE condition1 AND condition2 AND condition3 ...;

SELECT column1, column2, ...
FROM table_name
WHERE condition1 OR condition2 OR condition3 ...;


SELECT column1, column2, ...
FROM table_name
WHERE NOT condition;


SELECT column1, column2, ...
FROM table_name
ORDER BY column1, column2, ... ASC|DESC;


INSERT INTO table_name (column1, column2, column3, ...)
VALUES (value1, value2, value3, ...);


UPDATE table_name
SET column1 = value1, column2 = value2, ...
WHERE condition;

DELETE FROM table_name
WHERE condition;





SELECT MIN(column_name)
FROM table_name
WHERE condition;

SELECT MAX(column_name)
FROM table_name
WHERE condition;

SELECT COUNT(column_name)
FROM table_name
WHERE condition;

SELECT AVG(column_name)
FROM table_name
WHERE condition;

SELECT SUM(column_name)
FROM table_name
WHERE condition;

SELECT column1, column2, ...
FROM table_name
WHERE columnN LIKE pattern;

SELECT column_name(s)
FROM table_name
WHERE column_name IN (value1, value2, ...);

SELECT column_name(s)
FROM table_name
WHERE column_name BETWEEN value1 AND value2;

$orderusers=mysql_query("SELECT orders.id AS idorder,
											Userfio.fio AS name,
											orders.userid AS userid, 
											Userfio.vk AS sociallink,
											Userfioreg.fio AS namewhoreg, 
											Userfioreg.vk AS sociallinkwhoreg,
											Userfioreg.tel AS phonewhoreg,
											orders.datasa AS orderstime,
											Userfio.tel AS phone,
											Userfio.bday AS bday,
											Userfio.adr AS adr,
											Userfio.serial AS serial1,
											orders.addon AS adminquestions,
											hotels.name AS hotel,
											rooms.titleroom  AS roomnane,  
											buses.name AS bus,
											orders.t_p AS plasebus,
											orders.comment AS comment1,
											orders.status AS status,
											orders.summa AS price,
											orders.yak AS aspaid,
											orders.a_co AS admincoment,
											orders.fact AS fact,
											orders.hto AS htosetpaid,
											orders.admin_take_money AS who_take_money  	
									FROM orders
									LEFT JOIN users AS Userfio ON Userfio.id = orders.userid
									LEFT JOIN users AS Userfioreg ON Userfioreg.id = orders.whoreg
									LEFT JOIN hotels ON hotels.id = orders.hotel
									LEFT JOIN rooms ON rooms.id = orders.h_p
									LEFT JOIN buses ON buses.id = orders.trans
									WHERE orders.eventid='".$_GET['show']."'");


<?php
	try {  

	  
	  # MySQL через PDO_MYSQL  
	  $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
	  
	  $host = 'localhost';
		$dbname = 'test';
		$user = 'test';
		$pass = '123456';
	
		$login = $_POST['login'];
		$pass1 = $_POST['password'];
		
		# MySQL через PDO_MYSQL  
			
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);  
		
		/*Вставити
			
			$sql = '
				INSERT INTO users
					SET
					login = :login,
					pass = :pass

			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":login", 	$login, 	PDO::PARAM_STR);
			$query->bindParam(":pass", 		$pass1, 	PDO::PARAM_STR);
			
			$query->execute();
		
		*/
		
		/* Вибір
		
			$sql = '
				SELECT * 
				FROM users
				WHERE
					id = :id

			';
			
			$query = $DBH->prepare($sql);
			
			$id = 1;

			$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
			
			$query->execute();
			$result = $query->fetch();
			//$result = $query->fetchAll();
		
		*/
		
		/* Видалити
		
			$sql = '
				DELETE  
				FROM users
				WHERE
					id = :id

			';
			
			$query = $DBH->prepare($sql);
			
			$id = 1;

			$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
			
			$query->execute();

		
		*/
		
		/*
			Змінити
			
			 $sql = '
				UPDATE users
				SET
					login = :login,
					pass = :pass
				WHERE id = :id
			';
			
			$query = $DBH->prepare($sql);

			$query->bindParam(":login", 	$login, 	PDO::PARAM_STR);
			$query->bindParam(":pass", 		$pass1, 	PDO::PARAM_STR);
			$query->bindParam(":id", 	$id, 	PDO::PARAM_INT);
			
			$query->execute();
			
		
		*/
	   
	}  
	catch(PDOException $e) {  
		echo $e->getMessage();  
	}

?>