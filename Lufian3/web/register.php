<?php 

include "header.php";

 ?>
 <script type= "text/javascript" src = "js/countries.js"></script>

        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Register</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
<form class="form-horizontal" id="ins" method="POST" action="../controller/ajout_client.php">
<div class="row">
<div class="col-md-6">

<fieldset>

<!-- Form Name -->
<legend> Adresse & Coordonnées</legend>

<!-- Text input-->



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Adresse">Adresse</label>  
  <div class="col-md-8">
  <input id="Adresse" name="adresse" type="text" placeholder="Adresse" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="Ville">Ville</label>  
  <div class="col-md-4">
  <input id="Ville" name="ville" type="text" placeholder="Ville" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="Code postal">Code postal</label>  
  <div class="col-md-2">
  <input id="Code postal" name="code_postal" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="Pays">Pays</label> 

<div class="col-md-4">
<select id="country" name ="pays" class="form-control">
<option>Tunisie</option>

</select>
 </div>
</div>
<div class="form-group">
<label class="col-md-4 control-label" for="Gouvernorat">Gouvernorat</label>  

<div class="col-md-4">
<select name ="gouv" id ="state" class="form-control">

<option>Ariana</option>
<option>Manouba</option>
<option>Tunis</option>
<option>Tataouine</option>
<option>Sbitla</option>

</select> 
<input type="text" value="1" hidden name="confirm">
 </div>
</div>

    <script language="javascript">
    populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
    populateCountries("country2");
    populateCountries("country2");
</script>
</fieldset>

</div>
<div class="col-md-6">

<fieldset>

<!-- Form Name -->
<legend>Information utilisateurs</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="civ">Civilité</label>
  <div class="col-md-4">
    <select id="civ" name="civ" class="form-control">
      <option value="Monsieur">Monsieur</option>
      <option value="Madame">Madame</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Prénom" required="">Prénom</label>  
  <div class="col-md-4">
  <input id="Prenom" name="prenom" type="text" placeholder="Prénom" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Nom" required="">Nom</label>  
  <div class="col-md-4">
  <input id="nom" name="nom" type="text" placeholder="Nom" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Téléphone fixe" required="">Téléphone fixe</label>  
  <div class="col-md-4">
  <input id="telephone" name="telephone" type="text" placeholder="Téléphone fixe" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Téléphone portable">Téléphone portable</label>  
  <div class="col-md-4">
  <input id="tel_port" name="tel_port" type="text" placeholder="Téléphone portable" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Fax">Fax</label>  
  <div class="col-md-4">
  <input id="fax" name="fax" type="text" placeholder="Fax" class="form-control input-md">
    
  </div>
</div>

</fieldset>


</div>
</div>
<div class="row">
<div class="col-md-6">

</div>
<div class="col-md-6">

<fieldset>


<legend> Configuration compte </legend>
<div class="form-group">
    <label for="inputEmail" class="control-label">Identifiant (email)</label>   
    <input type="email" class="form-control" name="email"  id="email" placeholIdentifiant (email)der="Email" data-error="Bruh, that email address is invalid" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="control-label">Mot de Passe</label>
    <div class="row">
      <div class="col-md-6">
        <input type="password" data-minlength="6" class="form-control" name="mdp" id="mdp" placeholder="Mot de Passe" required>
        <div class="help-block">Minimum  6 characters</div>
      </div>
      <div class="col-md-6">
        <input type="password" class="form-control" id="inputPasswordConfirm" name="mdpC" id='mdpC'  placeholder="Confirmer" required>
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>
  
  <div class="form-group" >
    <button type="submit" class="btn btn-blue" name="submit" style="margin-left:450px; width:150px; height:50px; " >Valider</button>
  </div>
 </fieldset>
</form>


</div>
</div>
</div>

<?php include "footer.php"; ?>