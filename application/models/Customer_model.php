<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 01/11/2018
 * Time: 15:55
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Model extends CI_Model
{

    protected $table = 'client';

    public function insertCustomer($data)
    {
        $this->load->database();
        return $this->db->set('NomClient', $data['nom'])
            ->set('PrenomClient', $data['prenom'])
            ->set('RueClient', $data['rue'])
            ->set('VilleClient', $data['ville'])
            ->set('CPClient', $data['cp'])
            ->set('TelClient', $data['tel'])
            ->set('MailClient', $data['mail'])
            ->set('PointClient', 0)
            ->insert($this->table);
    }

    public function getCustomerByMail($mail){
        $this->load->database();
        $query = $this->db->get_where($this->table, array('MailClient' => $mail));

        $result = false;
        if ($query -> num_rows() > 0){
            $result = $query -> result_array();
        }
        return $result;
    }

  /*
  Retourne les infos d'un client donnee en fonction de son num de client
  */
  public function getCustomerByNum($num){
      $this->load->database();
      return $this->db->select('NomClient,PrenomClient,RueClient,VilleClient,CPClient,TelClient')
                      ->from($this->table)
                      ->where('NumClient', $num)
                      ->get()
                      ->result();
  }

  /*
    Met a jour les infos du client identife par son mail/login
  */
  public function updateCustomer($data){
    $this -> load -> database();
    return $this->db->set('NomClient', $data['nom'])
        ->set('PrenomClient', $data['prenom'])
        ->set('RueClient', $data['rue'])
        ->set('VilleClient', $data['ville'])
        ->set('CPClient', $data['cp'])
        ->set('TelClient', $data['tel'])
        ->where('MailClient', $data['mail'])
        ->update($this->table);
  }



}
