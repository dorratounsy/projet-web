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
    <?php
      include "../core/produitC.php";
      $produits1C=new ProduitsC();
      $listeproduits=$produits1C->afficherproduits();

    ?>
    
    <section id="main-content">
      <section class="wrapper">
      <a href="ajouterproduit.php"><button type="button" class="btn btn-primary">Ajouter produit</button></a>
      
        <h3><i class="fa fa-angle-right"></i> Basic Table Examples</h3>
        <div class="row">
         
          <!-- /col-md-12 -->
        
          <!-- /col-md-12 -->
        </div>
        <!-- row -->
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Advanced Table</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Company</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Descrition</th>
                    <th><i class="fa fa-bookmark"></i> Profit</th>
                    <th><i class=" fa fa-edit"></i> Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                     foreach($listeproduits as $row)
                     {
                  ?>
                  <tr>
                    <td>
                      <a href="basic_table.html#"><?php echo $row['pid']; ?></a>
                    </td>
                    <td class="hidden-phone"><?php echo $row['pname']; ?></td>
                    <td><?php echo $row['pcategory']; ?></td>
                    <td><span class="label label-info label-mini"><?php echo $row['pprice']; ?></span></td>
                    <td>
                    <a href="modifierproduit.php?pid=<?php echo $row['pid']; ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                      <a href="delete.php?pid=<?php echo $row['pid']; ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button> </a>  
                    </td>
                  </tr>
                 <?php
                     }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <?php require_once('footer.php'); ?>
</html>
