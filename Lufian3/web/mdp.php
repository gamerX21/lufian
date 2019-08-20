<?php 
 
if(!isset($_SESSION)) 
    { 
        session_start(); 

    } 
    

 

$bdd= new PDO("mysql:host=127.0.0.1;dbname=lufian","root","");

include("mailMdp.php");


if (isset($_GET['section'])) {
	$section=htmlspecialchars($_GET['section']);

}
else {
	$section="";
}

if(isset($_POST['recup_submit'],$_POST['recup_mail'])) {
   if(!empty($_POST['recup_mail'])) {
      $recup_mail = htmlspecialchars($_POST['recup_mail']);
      if(filter_var($recup_mail,FILTER_VALIDATE_EMAIL)) {
         $mailexist = $bdd->prepare('SELECT id,nom FROM client WHERE email = ?');
         $mailexist->execute(array($recup_mail));
         $mailexist_count = $mailexist->rowCount();
         if( $mailexist_count == 1) {
            $nom = $mailexist->fetch();
            $nom = $nom['nom'];
$_SESSION['nom'] = $nom;
            
            $_SESSION['recup_mail'] = $recup_mail;
            $recup_code = "";
            for($i=0; $i < 8; $i++) { 
               $recup_code .= mt_rand(0,9);
            }
               $_SESSION['recup_code'] = $recup_code;
                     $mail_recup_exist = $bdd->prepare('SELECT id FROM recup WHERE mail = ?');
            $mail_recup_exist->execute(array($recup_mail));
            $mail_recup_exist = $mail_recup_exist->rowCount();
            if($mail_recup_exist == 1) {
               $recup_insert = $bdd->prepare('UPDATE recup SET code = ? WHERE mail = ?');
               $recup_insert->execute(array($recup_code,$recup_mail));
            } else {

                $recup_insert = $bdd->prepare('INSERT INTO recup(mail,code) VALUES (?, ?)');
               $recup_insert->execute(array($recup_mail,$recup_code));

}
sendmail( "Confirmation de compte",$recup_mail, @$message);
echo '<script language="Javascript">
         
                document.location.replace("forget.php?section=code");
                
            </script>'; 


 } else {
   ?>
         <div class="alert alert-danger">
  <strong>Cette adresse mail n'est pas enregistrée</strong>
</div>
<?php
           
         }
      } else {
          ?>
         <div class="alert alert-danger">
  <strong>Adresse mail invalide</strong>
</div>
<?php
        
      }
   } else {
      ?>
         <div class="alert alert-info">
  <strong>Veuillez entrer votre adresse mail</strong>
</div>
<?php
     
   }
}
if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
   if(!empty($_POST['verif_code'])) {
      $verif_code = htmlspecialchars($_POST['verif_code']);
      $verif_req = $bdd->prepare('SELECT id FROM recup WHERE mail = ? AND code = ?');
      $verif_req->execute(array($_SESSION['recup_mail'],$verif_code));
      $verif_req = $verif_req->rowCount();
      if($verif_req == 1) {
         $up_req = $bdd->prepare('UPDATE recup SET confirme = 1 WHERE mail = ?');
         $up_req->execute(array($_SESSION['recup_mail']));
         
         echo '<script language="Javascript">
         
                document.location.replace("forget.php?section=changemdp");
                
            </script>'; 
      } else {
           ?>
         <div class="alert alert-danger">
  <strong>Code invalide</strong>
</div>
<?php
         
      }
   } else {
      ?>
         <div class="alert alert-info">
  <strong>Veuillez entrer votre code de confirmation</strong>
</div>
<?php
     
   }
}
if(isset($_POST['change_submit'])) {
   if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
      $verif_confirme = $bdd->prepare('SELECT confirme FROM recup WHERE mail = ?');
      $verif_confirme->execute(array($_SESSION['recup_mail']));
      $verif_confirme = $verif_confirme->fetch();
      $verif_confirme = $verif_confirme['confirme'];
      if($verif_confirme == 1) {
         $mdp = htmlspecialchars($_POST['change_mdp']);
         $mdpc = htmlspecialchars($_POST['change_mdpc']);
         if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
              // $mdp = password_hash($mdp,PASSWORD_DEFAULT,['cost'=>12]);
               $ins_mdp = $bdd->prepare('UPDATE client SET mdp = ? WHERE email = ?');
               $ins_mdp->execute(array($mdp,$_SESSION['recup_mail']));
              $del_req = $bdd->prepare('DELETE FROM recup WHERE mail = ?');
              $del_req->execute(array($_SESSION['recup_mail']));

                 echo '<script language="Javascript">
         
                document.location.replace("ins.php");
                
            </script>'; 
            } else {
?>
         <div class="alert alert-warning">
  <strong>Vos mots de passes ne correspondent pas</strong>
</div>
<?php


               
            }
         } else {
            ?>
         <div class="alert alert-info">
  <strong>Veuillez remplir tous les champs</strong>
</div>
<?php
           
         }
      } else {
          ?>
         <div class="alert alert-warning">
  <strong>Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail</strong>
</div>
<?php

         
      }
   } else {
       ?>
         <div class="alert alert-info">
  <strong>Veuillez remplir tous les champs</strong>
</div>
<?php
      
   }
}
?>



 