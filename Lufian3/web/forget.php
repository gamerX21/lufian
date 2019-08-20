


<?php include "header.php"; ?>
<?php include 'mdp.php' ?>
<div class="breadcum">
    <div class="container">
        <ol class="breadcrumb">
            <li>
                <a href="index.html"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                </a>
            </li>
            <li class="hidden-xs">
                <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                <a href="#">Connexion</a>
            </li>
        </ol>
        <div class="pull-right">
            <i class="livicon icon3" data-name="user" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Récupération de mot de passe
        </div>
    </div>
</div>
<div class="container">

<h4 class="title-element">Récupération de mot de passe</h4>
<?php if($section == 'code') { ?>
Un code de vérification vous a été envoyé par mail: <?= $_SESSION['recup_mail'] ?>
<br/>
<form  class="form-horizontal" method="post"  >
  <label class="col-md-3 control-label" for="14">Code de vérification</label>
<div class="col-md-9">


                                                <input type="text" placeholder="Code de vérification" name="verif_code" class="form-control"></div>
                                                <div class="col-md-12 text-right">
    <button type="submit" value="Valider" name="verif_submit" class="btn btn-responsive btn-info btn-sm">Valider</button>
   </div>
   </div>
   <br>
     <br>
</form>
<?php } elseif($section == "changemdp") { ?>
Nouveau mot de passe pour <?= $_SESSION['recup_mail'] ?>
<form class="form-horizontal" method="post" >
<div class="col-md-9">
                                                <input type="password" placeholder="Nouveau mot de passe" name="change_mdp" class="form-control"></div>
                                                <br>
                                                <br>

                                                <div class="col-md-9">
                                                <input input type="password" placeholder="Confirmation du mot de passe" name="change_mdpc" class="form-control"></div>
                                                <br>    
                                                <br>
                                                <div class="col-md-9 text-left">
   <button type="submit" value="Valider" name="change_submit" class="btn btn-responsive btn-info btn-sm">Valider</button>
   </div>
   </div>
    <br>
     <br>
</form>
<?php } else { ?>
<form class="form-horizontal" method="post" >
    <div class="form-group">
                                            <label class="col-md-3 control-label" for="name1">Identifiant (email)</label>
                                            <div class="col-md-9">
                                                <input id="name1" name="recup_mail" type="text" placeholder="Entrez votre Email" class="form-control"></div>
                                        </div>
   
    <div class="col-md-12 text-right">
                                                <button type="submit" name="recup_submit" class="btn btn-responsive btn-info btn-sm">Valider</button>
                                                </div>
                                            <br>
     <br>
</form>
</div>
<?php } ?>
<?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else { echo ""; } ?>
<?php include "footer.php"; ?>











          



