<?PHP
include "../core/produitC.php";
$produitC=new produitsC();
if (isset($_GET["pid"])){
	$produitC->supprimerproduits($_GET["pid"]);
	header('Location: product.php');
}

?>