<?PHP
class Panier{
	private $idp;
	private $idclient;
	private $nbproduit;
    private $totale;
    
	function __construct($idclient,$nbproduit,$totale){	
		$this->idclient=$idclient;
		$this->nbproduit=$nbproduit;
		$this->totale=$totale;
	}
	
	function getidp(){
		return $this->idp;
	}
	function getidclient(){
		return $this->idclient;
	}
	function getnbproduit(){
		return $this->nbproduit;
	}
	function gettotale(){
		return $this->totale;
	}


	function setidp($idp){
		$this->idp=$idp;
	}
	function setidclient($idclient){
		$this->idclient=$idclient;
	}
	function setnbproduit($nbproduit){
		$this->nbproduit=$nbproduit;
	}
	function settotale($totale){
		$this->totale=$totale;
	}
    
}

?>