<?php
include '../class/client.php';
include_once '../class/config.php';

class crudClient{
	public $conn;

	function __construct()
	{ 
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	function insertClient($client,$conn){

		$req1="INSERT INTO client (nom,prenom,email,mdp,adresse,ville,gouv,code_postal,telephone,tel_port,fax,pays,cle) 
		VALUES ('".$client->getnom()."','".$client->getprenom()."','".$client->getemail()."','".$client->getmdp()."','".$client->getadresse()."','".$client->getville()."','".$client->getgouv()."','".$client->getcode_postal()."','".$client->gettelephone()."','".$client->gettel_port()."','".$client->getfax()."','".$client->getpays()."','".$client->getcle()."')";
		if($conn->query($req1)){

			return true;}
	}

	function displayClient($conn,$id) // affichage des tickets non résolu state 0
		 {

			 $query = "SELECT * FROM client WHERE id=".$id;
				 $liste=$conn->query($query);
				 return $liste->fetchAll();

		 }

	function display_client_by_id($conn,$idc)
		  {

									$query= " select * from client where id =".$idc;

								$rat2=$conn->query($query);
								 return $rat2->fetchAll();
			}

	function afficherclient()
	{
		$db=config::getConnexion();
		$query="SELECT * FROM client ";
		$list=$db->query($query);
		return $list;

	}
	
}