<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 13/11/2018
 * Time: 07:40
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model
{

    protected $table = 'produit';

    public function createProduct($data){
        $this -> load -> database();
        return $this->db->set('LibelleProduit', $data['libelle'])
            ->set('DescriptionProd', $data['description'])
            ->set('PrixProd', $data['prix'])
            ->set('StockReel', $data['stockDispo'])
            ->set('StockDispo', $data['stockDispo'])//stockDispo = stockReel
            ->set('DureeReservation', $data['duree'])
            ->set('IdBoutique', $data['id'])
            //TODO
            ->set('NumCategorieP', 1)
            ->insert($this->table);
    }

    public function updateProduct($data){
        $this -> load -> database();
        return $this->db->set('LibelleProduit', $data['libelle'])
            ->set('DescriptionProd', $data['description'])
            ->set('PrixProd', $data['prix'])
            ->set('StockReel', $data['stockDispo'])
            ->set('StockDispo', $data['stockDispo'])//stockDispo = stockReel
            ->set('DureeReservation', $data['duree'])
            ->set('IdBoutique', $data['id'])
            //TODO
            ->set('NumCategorieP', 1)
            ->where('CodeProduit', $data['key'])
            ->update($this->table);
    }

    public function getAllProducts(){
        $this->load->database();
        $query = $this->db->get($this->table);

        $result = false;
        if ($query -> num_rows() > 0){
            $result = $query -> result_array();
        }
        return $result;
    }

    public function getProductBySelector($selectorName, $selector){
        $this->load->database();
        $query = $this->db->get_where($this->table, array($selectorName => $selector));

        $result = false;
        if ($query -> num_rows() > 0){
            $result = $query -> result_array();
        }
        return $result;
    }

    public function deleteProductById($id){
        $this->load->database();
        $this->db->delete($this -> table, array('CodeProduit' => $id));
    }
}

?>