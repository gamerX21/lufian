
<meta charset="utf8">
<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 

    } 
 ?>

<?php

include '../crud/crud_client.php';


include '../web/mailConfirm.php';
$ccc= new crudClient(); 
$cc= new crudClient(); 

  
 
$mdp=$_POST['mdp'];
///$mdp=password_hash($_POST['mdp'],PASSWORD_DEFAULT,['cost'=>12]);

$email=$_POST['email'];



$emailText=NULL;	


$reqqq="select email from client where email like '$email' ";
$liste=$ccc->conn->query($reqqq);
$var=$liste->fetchAll();
var_dump($emailText);	
foreach ($var as $v ) {

$emailText=$v[0];	

}
var_dump($emailText);	
//var_dump($email);

if($email==$emailText){
	header('Location: ../web/register.php?type=error&message=Cet e-mail est déjà enregistré '); 
}

else{



	
//$_SESSION['cle']=$cle;
$_SESSION['email']=$email;
//var_dump($_POST['civ']);
//var_dump($cle);	

	
$longeurcle= 12 ;
$cle=0;

for ($i=1; $i <$longeurcle ; $i++) { 
	

	$cle.= mt_rand(0,9);
}
$cle=$cle;

$c1=new client($email,$mdp,$_POST['civ'],$_POST['nom'],$_POST['prenom'],$_POST['pays'],$_POST['gouv'],$_POST['adresse'],$_POST['ville'],$_POST['code_postal'],$_POST['telephone'],$_POST['tel_port'],$_POST['fax'],$cle);	

$message='
<html>
    <body>
        <div align="center">
            <a href="http://localhost/lufian/web/confirmation.php?email='.urlencode($email).'&cle='.$cle.'"   > Confirm your account    </a>
        </div>
    </body>
</html>
';
var_dump($c1);
//var_dump($ccc->insertClient($c1,$cc->conn));
if ($ccc->insertClient($c1,$cc->conn))
	
{
//var_dump($cle);	

sendmail( "Confirmation de compte",$email, $message);


//header('Location: ../web/index.php'); 
  
}
}

	# code...


//header('location:interfaceAjout.html');

?>

