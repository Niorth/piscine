<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_model extends CI_Model {

  protected $table = 'avis';

  public function addReview($data){
    $this -> load -> database();
    return $this->db->set('Commentaire', $data['Commentaire'])
        ->set('NoteAvis', $data['NoteAvis'])
        ->set('NumClient', $data['NumClient'])
        ->set('CodeProduit', $data['CodeProduit'])
        ->set('DateAvis', date("Y-m-d H:i:s"))
        ->insert($this->table);
  }

  /*
    Retourne la note moyenne et le nombre d'avis pour un produit donnee

    SELECT aVG(NoteAvis)as moyenne,COUNT(NumAvis) as nbAvis
    FROM avis
    WHERE CodeProduit = 25
  */
  public function getAvgByNum($code){
      $this->load->database();
      return $this->db->select('AVG(NoteAvis) as moyenne,COUNT(NumAvis) as nbAvis')
                    ->from($this->table)
                    ->where('CodeProduit', $code)
                    ->get()
                    ->result();
  }

  /*
    Retourne tous les avis d'un produit donnee

    select NumAvis,DateAvis,NoteAvis,Commentaire,CodeProduit,a.NumClient,c.NomClient,c.PrenomClient
    from avis a
    inner join client c on c.NumClient = a.NumClient
    where CodeProduit = 25
  */
  public function getAllReview($code){
      $this->load->database();
      return $this->db->select('NumAvis,DateAvis,NoteAvis,Commentaire,CodeProduit,a.NumClient,c.NomClient,c.PrenomClient')
                    ->from('avis a')
                    ->join('client c', 'c.NumClient = a.NumClient')
                    ->where('CodeProduit', $code)
                    ->get()
                    ->result();
  }



}
