<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <?php require_once('header.php'); ?>
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <?php require_once('sidebar.php'); ?>
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->

    <?PHP
include "../entities/produit.php";
include "../core/produitC.php";
if (isset($_GET['pid'])){
	$produitsC=new produitsC();
    $result=$produitsC->recupererproduits($_GET['pid']);
	foreach($result as $row){
		$pid=$row['pid'];
		$pname=$row['pname'];
		$pcategory=$row['pcategory'];
		$pprice=$row['pprice'];
?>
    <section id="main-content">
      <section class="wrapper">
      <a href="product.php"><button type="button" class="btn btn-primary">afficher produits</button></a>
        <h3><i class="fa fa-angle-right"></i> modifier produit</h3>
        <!-- BASIC FORM VALIDATION -->
        <div class="row mt">
          <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> modifier produit</h4>
            <div class="form-panel">
              <form method="POST" role="form" class="form-horizontal style-form">
                <div class="form-group">
                  <label class="col-lg-2 control-label">product name</label>
                  <div class="col-lg-10">
                    <input type="text" id="pname" name="pname" value="<?PHP echo $pname ?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">category</label>
                  <div class="col-lg-10">
                    <input type="text" id="pcategory" name="pcategory" value="<?PHP echo $pcategory ?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">price</label>
                  <div class="col-lg-10">
                    <input type="text"  id="pprice" name="pprice" value="<?PHP echo $pprice ?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit" name="modifier">Submit</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
        <!-- FORM VALIDATION -->
       
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <?php require_once('footer.php'); ?>
</html>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$produits=new produits($_POST['pname'],$_POST['pcategory'],$_POST['pprice']);
	$produitsC->modifierproduits($produits,$pid);
    ?>
    <script>
    window.location.replace("product.php");
</script>
    <?php
}

?>
