<!DOCTYPE html>
<?php 

if(!isset($_SESSION)) 
    { 
        session_start(); 

    } 
 ?>

<html>
<head>
<title>Lufian - SITE OFFICIEL </title>
<!--/tags -->
<!-- -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/vnd.microsoft.icon" href="logo/favicon.ico" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//tags -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>

<!-- //for bootstrap working -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>



<link href="notif/css/jquery_notification.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="notif/js/jquery_notification_v.1.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
            });
        </script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>

</head>
<body>

<?php
                if (isset($_GET["type"])) {
                    $message = $_GET["message"];
                    $type = $_GET["type"];
                    ?>
                     <script type="text/javascript">
                        showNotification({
                            message: "<?php echo $message; ?>",
                            type: "<?php echo $type; ?>",
                            autoClose: true,
                            duration: 8                                        
                        });
                    </script>
                    <?php
                }
                ?>



<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
		    <li> <a href="../web/login.php"<i class="fa fa-unlock-alt" aria-hidden="true"></i> Identifez-vous</a></li>
			<li> <a href="../web/register.php" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Créez votre compte</a></li>
			<li> <a href="../web/user_profile.php" ><i class="fa fa-phone" aria-hidden="true"></i>Mon Profil</li>
			<li> <a href="../web/deconnexion.php" ><i aria-hidden="true"></i> <!--<a href="mailto:info@example.com">-->Deconnexion</a></li>
			
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
			<img src="logo/logo.png" width="300">
			</div>
       
        <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
						<ul class="social-nav model-3d-0 footer-social w3_agile_social">
						                                   <li class="share">Partager sur : </li>
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter">
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
		</div>
         <div class="col-md-4 header-middle">
			<form action="#" method="post">
					<input type="search" name="search" placeholder="Search here..." required="">
					<input type="submit" value=" ">
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="index.html">Acceuil <span class="sr-only">(current)</span></a></li>
					<li class=" menu__item"><a class="menu__link" href="about.html">A propos</a></li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vêtements <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="mens.html"><img src="images/vetements.jpg" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="mens.html">Chemise</a></li>
											<li><a href="mens.html">Sweat Shirts</a></li>
											<li><a href="mens.html">Veste</a></li>
											<li><a href="mens.html">Pantalon</a></li>
										</ul>
									</div>

									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Chaussures <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											<li><a href="womens.html">Chaussures classique</a></li>
											<li><a href="womens.html">Chaussures sport</a></li>

										</ul>
									</div>

									<div class="col-sm-6 multi-gd-img multi-gd-text ">
										<a href="womens.html"><img src="images/chaussures.png" alt=" "/></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="menu__item dropdown">
					   <a class="menu__link" href="#" class="dropdown-toggle" data-toggle="dropdown">Accessoires <b class="caret"></b></a>
								<ul class="dropdown-menu agile_short_dropdown">
									<li><a href="icons.html">Web Icons</a></li>
									<li><a href="typography.html">Typography</a></li>
								</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="contact.html">Contact</a></li>
					<li class=" menu__item"><a class="menu__link" href="../admin/login.php">Admin</a></li>
					
				  </ul>
				</div>
			  </div>
			</nav>
		</div>
		<div class="top_nav_right">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1">
						<form action="#" method="post" class="last">
						<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down"style="color:#00bfff;" aria-hidden="true"></i></button>
					</form>

						</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->
<!-- Modal1 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">IDENTIFIEZ-VOUS <span>MAINTENANT</span></h3>

						<form action="logincontroller.php" method="post">
						
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="email" required="">
								<label>Email</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="mdp" required="">
								<label>Mot de Passe :</label>
								<span></span>
							</div>
							<input type="submit" value="IDENTIFIEZ-VOUS">
						
						</form>
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter">
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
														<div class="clearfix"></div>
														<p><a href="#" data-toggle="modal" data-target="#myModal2" > Vous n'avez pas de compte?</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal1 -->













































<!-- Modal2 -->
		<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
                        <h3 class="agileinfo_sign">INSCRIVEZ-VOUS <span>MAINTENANT</span></h3>
                        

						 <!-- <form action="../views/ajoutclient.php" method="post">

							<div class="styled-input agile-styled-input-top">
								<input type="text" name="nom" >
								<label>NOM</label>
								<span></span>
							</div>

							<div class="styled-input agile-styled-input-top">
								<input type="text" name="prenom" >
								<label>Prenom</label>
								<span></span>
							</div>

							<div class="styled-input">
								<input type="email" name="email" >
								<label>Email</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="mdp" >
								<label>MOT DE PASSE</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="date" name="date_naiss" >
								<label>Date de naissance</label>
								<span></span>
							</div>
							<input type="submit" value="S'inscire'">
						</form> -->
						
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
						 </ul>
														
														
														</div>
						
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div> 
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal2 -->

</body>
</html>