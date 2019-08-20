<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->


  <?php

  include "header.php";
  include "../core/clientc.php";
  ?>

<html class=" yes-js js_active js js no-touch" lang="en"><!--<![endif]--><head>

     
<p>
    <link href="js2/settings.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="js2/css.css">
    <link href="js2/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/owl.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/font-awesome.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/animate.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/flaticon.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/easyzoom.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/aos.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/magnific-popup.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/modal-compare.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/responsive.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/font-awesome.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/slick.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/style.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/custom.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/single-product.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/banner-style.css" rel="stylesheet" type="text/css" media="all">
    <link href="js2/portfolio.css" rel="stylesheet" type="text/css" media="all">
    <script src="js2/cookie.js" type="text/javascript"></script>
    <script src="js2/jquery-2.js" type="text/javascript"></script>
    <script src="js2/custommenu.js" type="text/javascript"></script>
    <script src="js2/jquery-ui-1.js" type="text/javascript"></script>
    <script src="js2/jquery-migrate.js" type="text/javascript"></script>
    <script src="js2/jquery_003.js" type="text/javascript"></script>
    <script src="js2/jquery_007.js" type="text/javascript"></script>
    <script src="js2/revolution_003.js" type="text/javascript"></script>
    <script src="js2/revolution.js" type="text/javascript"></script>
    <script src="js2/revolution_008.js" type="text/javascript"></script>
    <script src="js2/revolution_004.js" type="text/javascript"></script>
    <script src="js2/revolution_006.js" type="text/javascript"></script>
    <script src="js2/revolution_007.js" type="text/javascript"></script>
    <script src="js2/revolution_002.js" type="text/javascript"></script>
    <script src="js2/revolution_005.js" type="text/javascript"></script>
    <script src="js2/imagesloaded.js" type="text/javascript"></script>
    <script src="js2/isotope.js" type="text/javascript"></script>
    <!-- Price range -->
    <script src="js2/jquery-ui-slider-pips.js" type="text/javascript"></script>
    <link href="js2/jquery-ui-slider-pips.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="js2/jquery-ui.css">
    <link rel="stylesheet" href="js2/css_003.css" property="stylesheet">
    <link rel="stylesheet" href="js2/css_002.css" property="stylesheet">
</p>
</head>

<?php
              $ec = new clientc();
              $list = $clientc->displayClient($clientc->$id);
?>


</div>
        <div class="wapper">

            

<div class="header-bg page-heading" style="">
  <div class="overlay"></div>
  <div class="heading-content text-center">
    <div class="container">
      <h1 class="page-title color-white">Account</h1>
      <nav class="woocommerce-breadcrumb">
        <a href="../web/index.php">Home</a>
        My Account
      </nav>
    </div>
  </div>
</div>


<main class="site-main main-container account-container">



  <div class="container">
    <div id="content" role="main">
      <div class="row">
        <div class="col-sm-4">
          <div class="linda-verticalmenu">
    <h3 class="title">My account</h3>
    <ul class="clone-main-menu linda-nav vertical-menu-content">
        <li class="menu-item active"><a title="Dashboard" href="../web/profile.php">Dashboard</a></li>
        <li class="menu-item "><a title="Address" href="https://linda-shopy.myshopify.com/account/addresses">Account Settings</a></li>
        <li class="menu-item"><a title="Logout" href="https://linda-shopy.myshopify.com/account/logout">Logout</a></li>
    </ul>
  </div>
  
<!-- ***********************************************************GHALET********************************-->
        </div>
        <div class="col-sm-8">  
          <div class="account-content">
            <h3>Account info</h3>
            <div class="filed-info">
              <label>Your Name</label>

              <?php foreach ($list as $le );  ?>
              <p><?php echo $le[2] . ' ' . $le[3]; ?></p>
              
              
              <div class="address-action">
                <a href="https://linda-shopy.myshopify.com/account/addresses" class="right">Edit <i class="fa fa-pencil"></i></a>
              </div>
            </div>
            <div class="filed-info">
              <label>Your Email</label>
              <p>hamzahadjtaieb@hotmail.fr</p>
              <div class="address-action">
                <a href="https://linda-shopy.myshopify.com/account/addresses" class="right">Edit <i class="fa fa-pencil"></i></a>
              </div>
            </div>
              
            <div class="filed-info">
              <label>Total Orders</label>
              <p>0</p>
            </div>
          </div>
          <div class="clearfix">
            <div class="customer-all-orders">
              <h3>All order</h3>
                
                

                  <p>You haven't placed any orders yet.</p>
              
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>



</main>



<a href="#" class="scroll_top" title="Scroll to Top" style="display: none;"><i class="flaticon-up-arrow"></i></a>
<link href="js2/color.css" rel="stylesheet" type="text/css" media="all">
<script src="js2/bootstrap_002.js" type="text/javascript"></script>
<script src="js2/slick.js" type="text/javascript"></script>
<script src="js2/aos.js" type="text/javascript"></script>
<script src="js2/jquery_002.js" type="text/javascript"></script>
<script src="js2/owl.js" type="text/javascript"></script>
<script src="js2/modernizr.js" type="text/javascript"></script>
<script src="js2/jquery_005.js" type="text/javascript"></script>
<script src="js2/jquery_004.js" type="text/javascript"></script>
<script src="js2/functions.js" type="text/javascript"></script>
<script src="js2/slide.js" type="text/javascript"></script>
<script type="text/javascript">
    AOS.init({
        startEvent: 'load',
        easing: 'ease-in-sine',
        delay: 200,
        offset: 100,
        duration: 500
    });
</script>

   
  </body></html>
  



<?php include "footer.php" ?>

