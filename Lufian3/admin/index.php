<!DOCTYPE html>
<?php
ob_start();
include "header.php";
include "../core/clientC.php";
include "../class/config.php";
$clientC=new clientC();
$listeClients=$clientC->afficherClients();
?>




<!--header start-->

<!--header end-->


<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-users"></i>
                        <span>Gestion de clients</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-cubes"></i>
                        <span>Gestion de produits</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-credit-card"></i>
                        <span>Gestion de commandes</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-clipboard"></i>
                        <span>Gestion de SAV/Réclamations</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-ambulance"></i>
                        <span>Gestion de la livraison</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-percent"></i>
                        <span>Gestion de promotions</span>
                    </a>
                </li>





            </ul>
       </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>

					 <div class="col-md-8 market-update-left">
				<?php	 if (isset($_SESSION['l']) && isset($_SESSION['p'])) ?> <?php { ?>

					 <h4> Login : </h4>
					<h3> <?php echo $_SESSION['l']; ?>	 </h3>
					

<?php } ?>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<?php	 if (isset($_SESSION['l']) && isset($_SESSION['p'])) ?> <?php { ?>

<h4> Password : </h4>
<h3> <?php echo $_SESSION['p']; ?>	 </h3>


<?php } ?>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
					<?php	 if (isset($_SESSION['l']) && isset($_SESSION['p'])) ?> <?php { ?>

<h4> Role : </h4>
<h3> <?php $_SESSION['r']; ?>	 </h3>


<?php } ?>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
					<?php	 if (isset($_SESSION['l']) && isset($_SESSION['p'])) ?> <?php { ?>

<h4> Id Session : </h4>
<h3> <?php echo session_id(); ?>	 </h3>


<?php } ?>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
		<!-- //market-->
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>infos utilisateurs</h3>
										<div class="toolbar">


										</div>
								</header>
								<div class="agileits-box-body clearfix">
									<div id="hero-area"></div>
								</div>
							</div>
						</div>
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
	
		<!-- //info -->
		<div class="col-md-12 w3agile-notifications">
		

<div class="container">
	<p style="color:white">Rechercher:</p>
<input type="text" id="search" class="form-control" placeholder="Type to search"/>
<br>
<table id="table" class="table table-agile-info table-striped">
<tr>

<th>Nom et prénom</th>
<th>Email</th>
<th>Adresse</th>

<th colspan="2"></th>

</tr>

<?PHP
foreach($listeClients as $row){
	?>
	<tr>
	
	<td><?PHP echo $row['nom'].' '.$row['prenom']; ?></td>
	<td><?PHP echo $row['email']; ?></td>
	<td><?PHP echo $row['adresse']; ?></td>
	
	<td><form method="POST">
	<input class="btn btn-danger" type="submit" name="supprimer" value="supprimer">
	<input type="hidden" name="num" value="<?PHP echo $row['id'];  ?>">
	</form>
	</td>
	<td><a class="btn btn-info" href="views/modifierClient.php?num=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}

if (isset($_POST["supprimer"])){
	$clientC->supprimerClient($_POST["num"]);
	header('Location:listeclients.php');
}
?>
</table>



</div>

			<div class="clearfix"> </div>
		</div>
			<!-- tasks -->
			<script src="../js/table.min.js"></script>

    <link href="../css/table.css" rel="stylesheet"/>

        <script>
        $(document).ready(function(){
			var $rows = $('#table tr td');
			$('#search').keyup(function() {
    	    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
   			 $rows.show().filter(function() {
        	 var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        	 return !~text.indexOf(val);
    }).hide();
});
});
</script>
	</tbody>
						</table>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
</section>
</section>
<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });

	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}

		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});


	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<!-- //calendar -->
</body>
</html>


