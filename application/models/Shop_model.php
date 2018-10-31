<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_Model extends CI_Model {

  protected $table = 'boutique';

  public function selectShopById($id){
    $this->load->database();
    return $this->db->select('*')
                    ->from('boutique')
                    ->where('IdBoutique', $id)
                    ->get()
                    ->result();
  }

	public function insertShop($data){
    $this->load->database();
      return $this->db->set('IdBoutique', $data['IdBoutique'])
                      ->set('NumSIRET', $data['NumSIRET'])
                      ->set('NomBoutique', $data['NomBoutique'])
                      ->set('RueBoutique', $data['RueBoutique'])
                      ->set('VilleBoutique', $data['VilleBoutique'])
                      ->set('CPBoutique', $data['CPBoutique'])
                      ->set('TelBoutique', $data['TelBoutique'])
                      ->set('MailBoutique', $data['MailBoutique'])
                      ->set('HorairesBoutique', $data['HorairesBoutique'])
                      ->insert($this->table);
	}

  public function updateShop($id, $data){
    $this->load->database();
    return $this->db->set('NumSIRET', $data['NumSIRET'])
                    ->set('NomBoutique', $data['NomBoutique'])
                    ->set('RueBoutique', $data['RueBoutique'])
                    ->set('VilleBoutique', $data['VilleBoutique'])
                    ->set('CPBoutique', $data['CPBoutique'])
                    ->set('TelBoutique', $data['TelBoutique'])
                    ->set('MailBoutique', $data['MailBoutique'])
                    ->set('HorairesBoutique', $data['HorairesBoutique'])
                    ->where('IdBoutique', $id)
                    ->update($this->table);
  }

  public function deleteShop($id){
      $this->load->database();
      return $this->db->where('IdBoutique',$id)
                      ->delete($this->table);
    }

  public function getLastShopById() {
    $this->load->database();
    return $this->db->select('IdBoutique')
                    ->from($this->table)
                    ->order_by('idBoutique', 'desc')
                    ->limit(1)
                    ->get()
                    ->result();
  }

}
