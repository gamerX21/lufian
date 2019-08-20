
<?php include 'header.php' ?> 


<div class="breadcum">
    <div class="container">
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                </a>
            </li>
            <li class="hidden-xs">
                <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                <a href="#">Connexion</a>
            </li>
        </ol>
        <div class="pull-right">
            <i class="livicon icon3" data-name="user" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Connexion
        </div>
    </div>
</div>
<br>
<?php

$cc = new PDO('mysql:host=127.0.0.1;dbname=lufian', 'root', '');


if(isset($_GET['email'], $_GET['cle']) AND !empty($_GET['email']) AND !empty($_GET['cle'])) {
   $email = htmlspecialchars(urldecode($_GET['email']));
   $cle = htmlspecialchars($_GET['cle']);
   $requser = $cc->prepare("SELECT * FROM client WHERE email = ? AND cle = ?");
   $requser->execute(array($email, $cle));
   $userexist = $requser->rowCount();
   if($userexist == 1) {
      $user = $requser->fetch();
      if($user['confirm'] == 0) {
         $updateuser = $cc->prepare("UPDATE client SET confirm = 1 WHERE email = ? AND cle = ?");
         $updateuser->execute(array($email,$cle));
         	
?>
         <div class="alert alert-Success">
  <strong>Votre compte a bien été confirmé !</strong>
</div>
<?php
         
      } else {
      	?>
         <div class="alert alert-Info">
  <strong>Votre compte a déjà été confirmé !</strong>
</div>
<?php
      }
   } else {
      ?>
         <div class="alert alert-Danger">
  <strong>L'utilisateur n'existe pas !</strong>
</div>
<?php
   }
}
?>



 <?php include 'footer.php' 

 ?>