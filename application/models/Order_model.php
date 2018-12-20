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



}

?>
