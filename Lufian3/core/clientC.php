<?php
class ClientC {
    /*
function afficherClient ($client){
		echo "Cin: ".$client->getCin()."<br>";
		echo "Nom: ".$client->getNom()."<br>";
		echo "Prénom: ".$client->getPrenom()."<br>";
		echo "tarif heure: ".$client->getTarifHoraire()."<br>";
		echo "nb heures: ".$client->getNbHeures()."<br>";
	}*/

	
	function afficherClients(){
		$sql="SElECT * From client";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerClient($id){
		$sql="DELETE FROM client where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierClient($client,$id){
		$sql="UPDATE client SET email=:email, nom=:nom,prenom=:prenom,adresse=:adresse WHERE id=".$id;
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
		$email=$client->getemail();
        $nom=$client->getNom();
        $prenom=$client->getPrenom();
        $adresse=$client->getadresse();
       
		$datas = array(':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':adresse'=>$adresse);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':email',$email);
		$req->bindValue(':adresse',$adresse);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererClient($id){
		$sql="SELECT * from client where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
/*	
	function rechercherListeClients($tarif){
		$sql="SELECT * from client where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
}

?>