<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_ligne_Model extends CI_Model{

  protected $table = 'lignecommande';

  /*
    Retourne le nombre total de lignes de commandes pour une boutique donnée.

    select count (NumLigneCommande) as total
    from lignecommande
    where IdBoutique = id

  */
  public function total($id){
    $this->load->database();
    return $this->db->select('count(NumLigneCommande) as total')
                  ->from($this->table)
                  ->where('IdBoutique', $id)
                  ->get()
                  ->result();
  }

  /*
    Retourne le nombre total de lignes de commandes pour une boutique donnée en
    fonction de son status.

    select count (NumLigneCommande) as total
    from lignecommande
    where IdBoutique = id
    and StatusLigneCom = status

  */
  public function totalStatus($id,$status){
    $this->load->database();
    return $this->db->select('count(NumLigneCommande) as total')
                  ->from($this->table)
                  ->where('IdBoutique', $id)
                  ->where('StatusLigneCom', $status)
                  ->get()
                  ->result();
  }

  /*
  Retourne les champs des commandes pour une boutique et un status donné

  SELECT NumLigneCommande,DateCommande,StatusLigneCom,QteLigneCommande,LibelleProduit,lc.NumCommande,lc.idBoutique
  FROM lignecommande lc
  inner join commande c on lc.NumCommande = c.NumCommande
  inner join produit p on lc.CodeProduit = p.CodeProduit
  where lc.IdBoutique = ?
  and lc.StatusLigneCom = ?

  */
  public function getOrderLigne($id,$status){
    $this->load->database();
    return $this->db->select('NumLigneCommande,DateCommande,StatusLigneCom,QteLigneCommande,LibelleProduit,lc.NumCommande')
                    ->from('lignecommande as lc')
                    ->join('commande as c', 'lc.NumCommande = c.NumCommande')
                    ->join('produit as p', 'lc.CodeProduit = p.CodeProduit')
                    ->where('lc.IdBoutique', $id)
                    ->where('lc.StatusLigneCom', $status)
                    ->get()
                    ->result();
  }

  /*
  Met a jour le status d'une commande pour une boutique donnee
  */
  public function updateStatus($data){
    $this->load->database();
    return $this->db->set('StatusLigneCom', $data['StatusLigneCom'])
                    ->where('NumLigneCommande', $data['NumLigneCommande'])
                    ->where('NumCommande', $data['NumCommande'])
                    ->where('idBoutique', $data['idBoutique'])
                    ->update($this->table);
  }

}

?>
