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

}

?>
