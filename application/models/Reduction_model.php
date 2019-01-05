<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reduction_model extends CI_Model {

  protected $table = 'reduction';

  /*
  Créer une reduction
  */
  public function addReduction($data){
    $this -> load -> database();
    return $this->db->set('CodeReduction', $data['CodeReduction'])
        ->set('LibelleReduction', $data['LibelleReduction'])
        ->set('MontantReduction', $data['MontantReduction'])
        ->set('DateDReduction', $data['DateDReduction'])
        ->set('DateFReduction', $data['DateFReduction'])
        ->set('IdBoutique', $data['IdBoutique'])
        ->insert($this->table);
  }

  /*
    Met à jour la réduction
  */
  public function updateReduction($data){
    $this -> load -> database();
    return $this->db->set('CodeReduction', $data['CodeReduction'])
        ->set('LibelleReduction', $data['LibelleReduction'])
        ->set('MontantReduction', $data['MontantReduction'])
        ->set('DateDReduction', $data['DateDReduction'])
        ->set('DateFReduction', $data['DateFReduction'])
        ->where('NumReduction', $data['NumReduction'])
        ->update($this->table);
  }

  /*
    Renvoie les champs de la reduction pour un numero de reduction donnee
  */
  public function selectByNum($num){
    $this->load->database();
    return $this->db->select('*')
                  ->from($this->table)
                  ->where('NumReduction', $num)
                  ->get()
                  ->result();
  }

  public function selectById($id){
    $this->load->database();
    return $this->db->select('*')
                  ->from($this->table)
                  ->where('idBoutique', $id)
                  ->get()
                  ->result();
  }

  /*
    Retourne les réductions en cours

    SELECT NumReduction,CodeReduction,LibelleReduction,MontantReduction,DateDReduction,DateFReduction,NomBoutique
    FROM reduction r
    inner join boutique b on r.IdBoutique = b.IdBoutique
    where CURRENT_TIMESTAMP() BETWEEN DateDReduction and DateFReduction
  */
  public function getEnableReduction(){
    return $this->db->select('NumReduction,CodeReduction,LibelleReduction,MontantReduction,DateDReduction,DateFReduction,NomBoutique')
                    ->from('reduction r')
                    ->join('boutique b', 'r.IdBoutique = b.IdBoutique')
                    ->where("CURRENT_TIMESTAMP() BETWEEN DateDReduction and DateFReduction")
                    ->get()
                    ->result();
  }

  public function deleteReduction($num,$id){
    $this->load->database();
    return $this->db->where('NumReduction',$num)
                    ->where('idBoutique',$id)
                    ->delete($this->table);
  }

}
