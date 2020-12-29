<?PHP
//include "../config.php";

class PanierC {
	/*function ajouterPanier ($Panier){
		$sql="insert into panier (idclient,nbproduit,totale) values (:idclient,:nbproduit,:totale)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		

        $idclient=$Panier->getidclient();
        $nbproduit=$Panier->getnbproduit();
        $totale=$Panier->gettotale();

		$req->bindValue(':idclient',$idclient);
		$req->bindValue(':nbproduit',$nbproduit);
		$req->bindValue(':totale',$totale);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}*/
	
	function afficherPanier(){
		//$sql="SElECT * From totale e inner join formationphp.totale a on e.idp= a.idp";
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    function afficherPanieridc($idclient){
		//$sql="SElECT * From totale e inner join formationphp.totale a on e.idp= a.idp";
		$sql="SELECT * From panier where idclient=$idclient";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    
	function supprimerPanier($idp){
		$sql="DELETE FROM panier where idp= :idp";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idp',$idp);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
/*	function modifierPanier($Panier,$idp){
		$sql="UPDATE panier SET idclient=:idclient,nbproduit=:nbproduit,totale=:totale WHERE idp=:idp";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $idclient=$Panier->getidclient();
        $nbproduit=$Panier->getnbproduit();
        $totale=$Panier->gettotale();

		$req->bindValue(':idp',$idp);
		$req->bindValue(':idclient',$idclient);
		$req->bindValue(':nbproduit',$nbproduit);
		$req->bindValue(':totale',$totale);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
    }*/
    
    function modifierPanier($idp,$nbproduit,$totale){
		$sql="UPDATE panier SET nbproduit=:nbproduit,totale=:totale WHERE idp=:idp";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$req->bindValue(':idp',$idp);
		$req->bindValue(':nbproduit',$nbproduit);
		$req->bindValue(':totale',$totale);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	
	function recupererPanier($idp){
		$sql="SELECT * from panier where idp=$idp";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListePanier($idp){
		$sql="SELECT * from panier where idp=$idp";
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