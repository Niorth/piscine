<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Model extends CI_Model{

  protected $table = 'commande';

  /*
    Supprime le produit lié a la commande dans la table commander
  */
  public function deleteLinkCommandeByCode($code){
    return $this->db->where('CodeProduit',$code)
                    ->delete('commander');
  }

  /*
    Retourne le detail d'une commande donne pour le commercant

    SELECT NumLigneCommande,c.NumCommande,DateCommande,StatusLigneCom,QteLigneCommande,lc.idBoutique
    p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit
    cl.NomClient,cl.PrenomClient,cl.RueClient,cl.VilleClient,cl.CPClient,cl.TelClient,
    FROM lignecommande lc
    inner join commande c on lc.NumCommande = c.NumCommande
    inner join produit p on lc.CodeProduit = p.CodeProduit
    inner join client cl on c.NumClient = cl.NumClient
    where lc.NumLigneCommande = ?
    and lc.NumCommande = ?
  */
  public function getOrderDetailSeller($numLigne,$numCom){
    $this->load->database();
    return $this->db->select('NumLigneCommande,c.NumCommande,DateCommande,StatusLigneCom,QteLigneCommande,lc.idBoutique,p.CodeProduit,p.LibelleProduit,p.ImgProd,cl.NomClient,cl.PrenomClient,cl.RueClient,cl.VilleClient,cl.CPClient,cl.TelClient,p.PrixProd')
                    ->from('lignecommande as lc')
                    ->join('commande as c', 'lc.NumCommande = c.NumCommande')
                    ->join('produit as p', 'lc.CodeProduit = p.CodeProduit')
                    ->join('client as cl', 'c.NumClient = cl.NumClient')
                    ->where('lc.NumLigneCommande', $numLigne)
                    ->where('lc.NumCommande', $numCom)
                    ->get()
                    ->result();

  }

  /*
    Retourne le detail des commandes d'un client donnee

    SELECT c.NumCommande,QteLigneCommande,DateCommande,StatusLigneCom,lc.idBoutique,MontantCom,
    p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit,c.NumClient,b.NomBoutique
    FROM lignecommande lc
    inner join commande c on lc.NumCommande = c.NumCommande
    inner join produit p on lc.CodeProduit = p.CodeProduit
    inner join boutique b on b.idBoutique = p.idBoutique
    where c.NumClient = ?
  */
  public function getOrderDetailClient($numClient){
    $this->load->database();
    return $this->db->select('c.NumCommande,QteLigneCommande,DateCommande,StatusLigneCom,lc.idBoutique,MontantCom,
                            p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit,NomBoutique')
                    ->from('lignecommande as lc')
                    ->join('commande as c', 'lc.NumCommande = c.NumCommande')
                    ->join('produit as p', 'lc.CodeProduit = p.CodeProduit')
                    ->join('boutique as b', 'b.idBoutique = p.idBoutique')
                    ->where('c.NumClient', $numClient)
                    ->get()
                    ->result();
  }

}

?>
