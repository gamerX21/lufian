<?php 

include ("../crud/crud_client.php") ;
include ("photo.php");

?>

<?php

if(!isset($_SESSION))
    {
        session_start();

    } 
 if(!isset($_SESSION["id"]))
        {
          header('Location: ins.php?type=error&message=Accès Interdit.');

        }


if(isset($_SESSION['id']))
{
  $userid=$_SESSION['id'];
}

$cc=new crudClient();

$liste=$cc->displayClient($cc->conn,$userid);

?>
<!--end of page level css-->
<?php
require_once 'header.php';
?>
<div class="breadcum">
    <div class="container">
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                </a>
            </li>
            <li class="hidden-xs">
                <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                <a href="#">Profile </a>
            </li>
        </ol>
        <div class="pull-right">
            <i class="livicon icon3" data-name="user" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Profile
        </div>
    </div>
</div>
           




<div id="taswira">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img style='max-width:600px' src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="photo.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="60" 
      	rows="2" 
      	name="image_text" 
      	placeholder="Description..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">Upload</button>
  	</div>
  </form>
</div>





<div class="container" style="margin-top:50px;">
    <div  class="row ">
        <div class="col-md-12">
            <div class="row ">
              <div class="col-md-4">

                  <div class="table-responsive">	<?php foreach ($liste as $le){?>
                      <table class="table  table-striped" id="users">
                        <tr>
                        
                        <td>Photo </td>


                        </tr>

                          <tr>
                              <td>Utilisateur</td>
                              <td>
                                  <a href="#" data-pk="1" class="editable" data-title="Edit User Name"><?php echo $le[5].' '.$le[4] ;?></a>
                              </td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td>
                                  <a href="#" data-pk="1" class="editable" data-title="Edit E-mail">
                                      <?php echo $le[1];?>
                                  </a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Téléphone Mobile
                              </td>
                              <td>
                                  <a href="#" data-pk="1" class="editable" data-title="Edit Phone Number">
                                      (+216) <?php echo $le[12];?>
                                  </a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Téléphone Fix
                              </td>
                              <td>
                                  <a href="#" data-pk="1" class="editable" data-title="Edit Phone Number">
                                       <?php echo $le[11];?>
                                  </a>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  Fax
                              </td>
                              <td>
                                  <a href="#" data-pk="1" class="editable" data-title="Edit Phone Number">
                                      <?php echo $le[13];?>
                                  </a>
                              </td>
                          </tr>
                          <tr>
                              <td>Address</td>
                              <td>
                                  <a href="#" data-pk="1" class="editable" data-title="Edit Address">
                                      <?php echo $le[8];?>,	<?php echo $le[9];?>	.
                                  </a>
                              </td>
                          </tr>
                          <tr>
                              <td>Status</td>
                              <td>
                                  <p style="color:green;"><strong>Actif--</strong></p>
                              </td>
                          </tr>
                          <tr>
                              <td>Created At</td>
                              <td>
                              <?php echo $le[14];?>
                              </td>
                          </tr>
                          <tr>
                              <td>City </td>
                              <td>
                                  <a href="#" data-pk="1"  class="editable" data-title="Edit City">	  <?php echo $le[9];?>,	<?php echo $le[8];?></a>
                              </td>
                          </tr>
                      </table> <?php } ?>
                  </div>


              </div>

            <div class="col-md-8">
                  <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#tab-activity">Mes réclamations</a></li>
      <li><a data-toggle="tab" href="#tab-messages">Mes achats</a></li>
      <li><a data-toggle="tab" href="#tab-change-pwd">Changer password</a></li>
    </ul>


                    <div class="tab-content">
                      <div id="tab-activity" class="tab-pane fade in active">
                        <table class="table table-striped table-advance table-hover web-mail" id="inbox-check" >
                          <thead>
                            <tr ><p><span class="label label-info">Notez Bien</span>-
                                   <i class="livicon"  data-s="15" data-c="green" data-n="check"></i> Lù-
                                   <i class="livicon"  data-s="15" data-c="orange" data-n="question"></i> Non Lù-
                                    <i class="livicon"  data-s="15" data-c="red" data-n="ban"></i>Refusé
                          </tr>

                          </thead>
                            <tbody>


                                <tr data-messageid="1" class="unread">

                                    <td style="width:4%;" class="inbox-small-cells">
                                        <div class="checker">
                                                                                </div>
                                    </td>
                                    <td  class="inbox-small-cells">
                                        <i class="livicon"  data-s="15"  ></i>
                                    </td>
                                    <td  class="view-message hidden-xs">
                                      Product name
                                    </td>
                                    <td  class="view-message ">
                                      xxx
                                    </td>
                                    <td class="view-message inbox-small-cells">
                                        xx
                                    </td>
                                    <td  class="view-message text-right">
                                      xx
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                      </div>
                      <div id="tab-change-pwd" class="tab-pane fade">
                      <form id="modif2" action="mdp2.php"  method="post" >
                          <div class="row">
                              <div class="col-md-12 pd-top">
                                  <form action="#" class="form-horizontal">
                                      <div class="form-body">
                                          <div class="form-group">

                                              <label for="inputpassword" class="col-md-3 control-label">
                                                  Password
                                                  <span class='require'>*</span>
                                              </label>
                                              <div class="col-md-9">
                                                  <div class="input-group">
                                                      <span class="input-group-addon">
                                                          <i class="livicon" data-name="cle" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                      </span>
                                                      <input type="password" placeholder="Password" name="change_mdp" class="form-control"/>
                                                  </div>
                                              </div>
                                          </div>
                                          <br>
                                          <div class="form-group">
                                              <label for="inputnumber"  class="col-md-3 control-label">
                                                  Confirm Password
                                                  <span class='require'>*</span>
                                              </label>
                                              <div class="col-md-9">
                                                  <div class="input-group">
                                                      <span class="input-group-addon">
                                                          <i class="livicon" data-name="cle" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                      </span>
                                                      <input type="password" name="change_mdpc" placeholder="Password" class="form-control"/>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                        <hr>
                                      <div class="form-actions">
                                          <div class="col-md-offset-3 col-md-9">
                                              <button type="submit" name="change_submit" class="btn btn-primary">Submit</button>
                                              &nbsp;
                                              <button type="button" class="btn btn-danger">Cancel</button>
                                              &nbsp;
                                              <input type="reset" class="btn btn-default hidden-xs" value="Reset"></div>
                                      </div>

                              </div>
                          </div>
                        </form>
                      </div>


                        <div id="tab-messages" class="tab-pane fade in " style="margin-top:12px;">
                          <div class="col-sm-4">
                						<!-- Product -->
                						<div class="shop-item">
                							<!-- Product Image -->
                							<div class="image">
                								<a href="page-product-details.html"><img src="images/m1.jpg" alt="Item Name"></a>
                							</div>
                							<!-- Product Title -->
                							<div class="title">
                								<h3><a href="page-product-details.html">Chemise Bleu nuit</a></h3>
                							</div>
                							<!-- Product Available Colors-->
                							<div class="colors">
                								<span class="color-white"></span>
                								<span class="color-black"></span>
                								<span class="color-blue"></span>
                								<span class="color-orange"></span>
                								<span class="color-green"></span>
                							</div>
                							<!-- Product Price-->
                							<div class="price">
                								<span class="price-was"><b>$59.99</b></span>
                							</div>
                							<!-- Product Description-->

                							<!-- Add to Cart Button -->
                							<div class="actions">
                								<a href="page-product-details.html" class="btn"><i class="icon-shopping-cart icon-white"></i> View </a>
                							</div>
                						</div>
                						<!-- End Product -->
                					</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
<?php
require_once('footer.php');
?>
<script src="../back/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../back/js/bootstrap.min.js" type="text/javascript"></script>

<script  src="../back/vendors/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript"></script>
<script src="../back/vendors/x-editable/jquery.mockjax.js" type="text/javascript"></script>
<script src=".../back/vendors/x-editable/bootstrap-editable.js" type="text/javascript"></script>
<script type="text/javascript" src="../back/vendors/magnifier/imgmagnify.js"></script>
<script src="../back/vendors/iCheck/icheck.js"></script>
<script src="../back/js/pages/user_profile.js" type="text/javascript"></script>

<script src="../back/vendors/livicons/minified/raphael-min.js" type="text/javascript"></script>
<script src="../back/vendors/livicons/minified/livicons-1.4.min.js" type="text/javascript"></script>
<script src="../back/js/josh.js" type="text/javascript"></script>
<script src="../back/js/metisMenu.js" type="text/javascript"></script>
<script src="../back/vendors/holder-master/holder.js" type="text/javascript"></script>
