<?php include "header.php"; ?>

        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Login</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">
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
            <button class="btn btn-default" type="button" ><a href="register.php">Créer un compte</a></button>
        </div>
                                    </fieldset>
                                </form>


                                
						</div>
					</div>
					<div class="col-sm-7 social-login">
						<p>Or login with your Facebook or Twitter</p>
						<div class="social-login-buttons">
							<a href="#" class="btn-facebook-login">Login with Facebook</a>
							<a href="#" class="btn-twitter-login">Login with Twitter</a>
						</div>
						<div class="clearfix"></div>
						<div class="not-member">
							<p>Not a member? <a href="page-register.html">Register here</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

	    <?php include "footer.php"; ?>
