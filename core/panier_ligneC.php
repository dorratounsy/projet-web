<?PHP
//include "../config.php";

class panier_ligneC {
	function ajouterpanier_ligne($panier_ligne){
        
        $idpanier=$panier_ligne->getidpanier();
        $idproduit=$panier_ligne->getidproduit();
        $quantite=$panier_ligne->getquantite();
        $prixunitaire=$panier_ligne->getprixunitaire();
        $db = config::getConnexion();
        $sql2="SELECT * FROM panier_ligne where idproduit = $idproduit and idpanier= $idpanier ";
        $liste=$db->query($sql2);
        $nb=$liste->rowCount();
        if($nb>0){
            foreach($liste as $row){
                $q=$row["quantite"];
            }
            $q=($q+1);
            $sql3="UPDATE panier_ligne SET quantite= $q where idproduit = $idproduit and idpanier= $idpanier ";
        $db->query($sql3);

        }
        else{
            $sql="insert into panier_ligne (idpanier,idproduit,quantite,prixunitaire) values (:idpanier,:idproduit,:quantite,:prixunitaire)";
            
            try{
            $req=$db->prepare($sql);
            
            $req->bindValue(':idpanier',$idpanier);
            $req->bindValue(':idproduit',$idproduit);
            $req->bindValue(':quantite',$quantite);
            $req->bindValue(':prixunitaire',$prixunitaire);

                $req->execute();
            
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }
		
    }
    
    function get_product_name($idproduit){
        $con=mysqli_connect("localhost","root","","dorra");
            $sql="SELECT pname
            FROM product
            INNER JOIN panier_ligne
            ON product.pid= panier_ligne.idproduit where product.pid = $idproduit";
            $db = config::getConnexion();
           
            try{
                //$produit=$db->query($sql);
                $produit=mysqli_query($con,$sql);
                
               return $produit;
               }
               catch (Exception $e){
                   die('Erreur: '.$e->getMessage());
               }
    }
    function get_produit($idpanier){
        $sql="SELECT * From panier_ligne where idpanier= $idpanier";
        $db = config::getConnexion();
        
		try{
         $liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }

	function afficherpanier_ligne(){
		//$sql="SElECT * From prixunitaire e inner join formationphp.prixunitaire a on e.idlp= a.idlp";
		$sql="SElECT * From panier_ligne";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    
	function supprimerpanier_ligne($idlp){
		$sql="DELETE FROM panier_ligne where idlp= :idlp";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idlp',$idlp);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierpanier_ligne($panier_ligne,$idlp){
		$sql="UPDATE panier_ligne SET idproduit=:idproduit,quantite=:quantite,prixunitaire=:prixunitaire WHERE idlp=:idlp";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    try{		
        $req=$db->prepare($sql);
        $idproduit=$panier_ligne->getidproduit();
        $quantite=$panier_ligne->getquantite();
        $prixunitaire=$panier_ligne->getprixunitaire();

		$req->bindValue(':idlp',$idlp);
		$req->bindValue(':idproduit',$idproduit);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':prixunitaire',$prixunitaire);

            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
    }
    
	function recupererpanier_ligne($idlp){
		$sql="SELECT * from panier_ligne where idlp=$idlp";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
    
	function rechercherListepanier_ligne($idlp){
		$sql="SELECT * from panier_ligne where idlp=$idlp";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}


?>