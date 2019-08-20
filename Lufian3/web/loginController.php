<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=lufian', 'root', '');

if(isset($_POST['connexion'])) { 
   $email = htmlspecialchars($_POST['email']);
   $password = ($_POST['password']);
   if(!empty($email) AND !empty($password)) 
   
{
      $requser = $bdd->prepare("SELECT * FROM client WHERE email = ? ");
      $requser->execute(array($email));
      $userexist = $requser->rowCount();
      if($userexist == 1) 
      
      {
         $userinfo = $requser->fetch();
         if ( $userinfo['confirm']==0) {
       header('Location: ins.php?type=warning&message=Veuillez confirmer votre adresse mail '); 
        }
        else if ($password===$userinfo['mdp']){

         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['email'] = $userinfo['email'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['prenom'] = $userinfo['prenom'];
         header("Location: index.php?id=".$_SESSION['id']);
          }
         else { 
       header('Location: ins.php?type=error&message=Mauvais mail ou mot de passe ');        
              }
      

      } 
       else {
        header('Location: ins.php?type=warning&message=Tous les champs doivent être complétés '); 
}
      
    
      
}
   else {
        header('Location: ins.php?type=warning&message=Tous les champs doivent être complétés '); 
}
}

?>





   