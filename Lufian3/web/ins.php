<?php include "header.php"; ?>

<!-- Breadcrumb Section Start -->
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
            <i class="livicon icon3" data-name="user" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Connexion
        </div>
    </div>
</div>
<!-- //Breadcrumb Section End-->
<!-- Container Section Start -->
<div class="container">


                                <div class="row" style="margin-top:50px;">
                                    <div class="column col-md-6">
                                        <p>
                                            <img class="img-responsive"  src="images/ab_pic.jpg"></p>
                                    </div>

                                    <div class="column col-md-6">
                                        <h2>Connexion</h2>
                                        <div class="row">

    <div class="panel-body">
                                <form class="form-horizontal" action="loginController.php" method="post">
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name1">Identifiant (email)</label>
                                            <div class="col-md-9">
                                                <input id="name1" name="email" type="text" placeholder="Entrez votre Email" class="form-control"></div>
                                        </div>
                                        <!-- Email input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="password"> Mot de passe</label>
                                            <div class="col-md-9">
                                                <input id="password" name="password" type="password" placeholder="Entrez votre mot de passe" class="form-control">
                                                 <br>
                                         <a href="forget.php" class="small" style="color:blue" >Mot de passe oublié?</a>
                                                </div>

                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">Restez connecter</label>
                                        </div>
                                        <!-- Form actions -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <button type="submit" name="connexion" class="btn btn-responsive btn-info btn-sm">Connexion</button>
                                            </div>
                                        </div>
                                          <hr>
          <label for="input-text-1">Vous n'avez pas de compte?</label>
            <div class="form-group pd-right">
            <button class="" type="button" ><a href="register.php">Créer un compte</a></button>
        </div>
                                    </fieldset>
                                </form>
                                
                            </div>



</div>
                                    </div>
                                </div>





</div>
<!-- //Container Section End -->
<?php include "footer.php"; ?>
