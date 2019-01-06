<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reserver_Model extends CI_Model
{

    protected $table = 'reserver';

    public function insertReserver($numResa, $qty, $numProd) {
        $this->load->database();
        $this->db->set('NumReservation', $numResa)
            ->set('CodeProduit', $numProd)
            ->set('QteReserver', $qty)
            ->insert($this->table);
    }
}