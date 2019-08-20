<?php
class config{
 static	function getConnexion(){
		$servername="localhost";
		$dbname="lufian";
		$username="root";
		$password="";
		$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
		return $conn;
	}
}

?>
