<?php

class panier_ligne{

  private $idlp;
  public  $idpanier;
  private $idproduit;
  private $quantite;
  private $prixunitaire;


  public function __construct($idpanier,$idproduit,$quantite,$prixunitaire)
  {
    $this->idpanier=$idpanier;
    $this->idproduit=$idproduit;
    $this->quantite=$quantite;
    $this->prixunitaire=$prixunitaire;
  }


  public function getidlp()
  {
    return $this->idlp;
  }

  public function getidpanier()
  {
    return $this->idpanier;
  }
  public function getidproduit()
  {
    return $this->idproduit;
  }
  public function getquantite()
  {
    return $this->quantite;
  }
  public function getprixunitaire()
  {
    return $this->prixunitaire;
  }

}
?>