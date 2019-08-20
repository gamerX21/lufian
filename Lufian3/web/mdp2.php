

<?php 
 
if(!isset($_SESSION)) 
    { 
        session_start(); 

    } 
 

$bdd= new PDO("mysql:host=127.0.0.1;dbname=lufian","root","");



if(isset($_POST['change_submit'])) {
   if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
      
      
         $mdp = htmlspecialchars($_POST['change_mdp']);
         $mdpc = htmlspecialchars($_POST['change_mdpc']);
         if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
              // $mdp = password_hash($mdp,PASSWORD_DEFAULT,['cost'=>12]);
               $ins_mdp = $bdd->prepare('UPDATE client SET  mdp = ? WHERE email = ?');
               $ins_mdp->execute(array($mdp,$_SESSION['email']));
               header('Location:deconnexion.php?type=information&message= Password updated');
            } else {
               $error = "Your passwords do not match";
            }
         } else {
            $error = "Please fill in all fields";
         }
      
   } else {
      $error = "Please fill in all fields";
   }
}







 ?>