<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 01/11/2018
 * Time: 16:31
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Trader_Model extends CI_Model
{

    protected $table = 'commercant';

    public function insertTrader($data)
    {
        $this->load->database();
        return $this->db->set('NomCommercant', $data['nom'])
            ->set('PrenomCommercant', $data['prenom'])
            ->set('RueCommercant', $data['rue'])
            ->set('VilleCommercant', $data['ville'])
            ->set('CPCommercant', $data['cp'])
            ->set('TelCommercant', $data['tel'])
            ->set('MailCommercant', $data['mail'])
            ->insert($this->table);
    }

    /*
     *  SELECT `NumCommercant`,`NomCommercant`,`PrenomCommercant`
     *  FROM `commercant`
     *
     */
    public function getAllTrader(){
        $this->load->database();
        return $this->db->select('NumCommercant,NomCommercant,PrenomCommercant')
            ->from($this->table)
            ->get()
            ->result();
    }


    public function insertGererBoutique($data){
        $this->load->database();
        return $this->db->set('IdBoutique', $data['IdBoutique'])
            ->set('NumCommercant', $data['NumCommercant'])
            ->insert("gererboutique");

    }

    /*
      Retourne les infos du commercant en fonction de son mail
    */
    public function getTraderByMail($mail){
        $this->load->database();
        $query = $this->db->get_where($this->table, array('MailCommercant' => $mail));

        $result = false;
        if ($query -> num_rows() > 0){
            $result = $query -> result_array();
        }
        return $result;
    }

    /*
      Met a jour les infos du commercant identife par son mail/login
    */
    public function updateTrader($data){
      $this -> load -> database();
      return $this->db->set('NomCommercant', $data['nom'])
          ->set('PrenomCommercant', $data['prenom'])
          ->set('RueCommercant', $data['rue'])
          ->set('VilleCommercant', $data['ville'])
          ->set('CPCommercant', $data['cp'])
          ->set('TelCommercant', $data['tel'])
          ->where('MailCommercant', $data['mail'])
          ->update($this->table);
    }


}
