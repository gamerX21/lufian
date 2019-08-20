<?php
include "client.php";
include_once ("config.php");


class crud{
	public $conn;
	function __construct()
	{
		$c=new config();
		$this->conn=$c->getConnexion();
	}
	
 				 function insertClient($client,$conn){

 				$req1="INSERT INTO client (email,mdp,civ,nom,prenom,pays,gouv,adresse,ville,code_postal,telephone,tel_port,fax,cle)
 				VALUES ('".$client->getemail()."','".$client->getmdp()."','".$client->getciv()."','".$client->getnom()."','".$client->getprenom()."','".$client->getpays()."','".$client->getgouv()."','".$client->getadresse()."','".$client->getville()."','".$client->getcode_postal()."','".$client->gettelephone()."','".$client->gettel_port()."','".$client->getfax()."','".$client->getcle()."')";
 				if($conn->query($req1)){

 				return true;
 				}
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



/******************************* */


						/*public function afficher(){
							$db = config::getConnexion();
							$sql = "SELECT * from client";
							$list = $db->query($sql);
							return $list;
						}
					
						/*public function ajouter( client $e){
							$db = config::getConnexion();
							$sql = "INSERT INTO client (nom,prenom,email,mdp,date_naiss) VALUES (:nom,:prenom,:email,:mdp,:date_naiss) ";
							$q = $db->prepare($sql);
							
							$q->bindValue(':nom',$e->getNom());
							$q->bindValue(':prenom',$e->getprenom());
							$q->bindValue(':email',$e->getemail());
							$q->bindValue(':mdp',$e->getmdp());
							$q->bindValue(':date_naiss',$e->getdate_naiss());
							$q->execute();
							return $q;
						}*/
/*
						public function supprrimer($id) {
							$db = config::getConnexion() ;
							$sql = "delete from client WHERE id=:id" ;
							$q = $db->prepare($sql) ;
							$q->bindValue(":id" , $id) ;
							$q->execute()  ;
							return $q ;
						}*/

		}

?>