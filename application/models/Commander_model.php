<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Commander_Model extends CI_Model
{

    protected $table = 'commander';

    public function insertCommander($numCom, $qty, $numProd) {
        $this->load->database();
        $this->db->set('NumCommande', $numCom)
            ->set('CodeProduit', $numProd)
            ->set('QteCommander', $qty)
            ->insert($this->table);
    }
}