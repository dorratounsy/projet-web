<?PHP
include "../entities/produit.php";
include "../core/produitC.php";

if (isset($_POST['pname']) and isset($_POST['pcategory']) and isset($_POST['pprice']) ){
$produits1=new produits($_POST['pname'],$_POST['pcategory'],$_POST['pprice']);
$produits1C=new produitsC();
$produits1C->ajouterproduits($produits1);
header('Location: product.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>