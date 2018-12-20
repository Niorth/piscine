<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie_model extends CI_Model {

  protected $table = 'categorieproduit';

  /*
    Retourne toute les catégories

    Select * from categorieproduit
  */
  public function getAllCategorie(){
      $this->load->database();
      return $this->db->select('*')
                    ->from($this->table)
                    ->get()
                    ->result();
  }

}
