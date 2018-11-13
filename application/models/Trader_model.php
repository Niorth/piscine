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
}