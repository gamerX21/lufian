<?php
class client{


	//attributs
	private $id;
	private $email;
	private $mdp;
	private $civ;
	private $nom;
	private $prenom;
	private $pays;
	private $gouv;
	private $adresse;
	private $ville;
    private $code_postal;
    private $telephone;
    private $tel_port;
    private $fax;
   	private $cle;
	
	   //constructeur

	function __construct($email,$mdp,$civ,$nom,$prenom,$pays,$gouv,$adresse,$ville,$code_postal,$telephone,$tel_port,$fax,$cle)
	{
		
		$this->email=$email;
		$this->mdp=$mdp;
		$this->civ=$civ;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->pays=$pays;
		$this->gouv=$gouv;
		$this->adresse=$adresse;
		$this->ville=$ville;
		$this->code_postal=$code_postal;
		$this->telephone=$telephone;
		$this->tel_port=$tel_port;
		$this->fax=$fax;
		$this->cle=$cle;
		
		
	}
	function getid(){
		return $this->id;
	}
	function getemail(){
		return $this->email;
	}
	function getmdp(){
		return $this->mdp;
	}
	
	function getciv(){
		return $this->civ;
	}
	
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getpays(){
		return $this->pays;
	}
	function getgouv(){
		return $this->gouv;
	}
	function getadresse(){
		return $this->adresse;
	}
	function getville(){
		return $this->ville;
	}
	function getcode_postal(){
		return $this->code_postal;
	}
	function gettelephone(){
		return $this->telephone;
	}
	function gettel_port(){
		return $this->tel_port;
	}
	function getfax(){
		return $this->fax;
	}
	function getdate_ins(){
		return $this->date_ins;
	}
	function getcle(){
		return $this->cle;
	}
	public function setid($id){
        $this->id = $id;
    }
}


?>