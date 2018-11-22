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

    /*
      requete pour avoir la boutique d'un produit

      SELECT `NomBoutique` FROM `boutique`,produit
      WHERE boutique.`IdBoutique` = produit.`IdBoutique`
      and CodeProduit = 1
     */
    public function getBoutiqueProductById($CodeProduit){
      $this->load->database();
      return $this->db->select('NomBoutique')
                    ->from('boutique')
                    ->join($this->table, "boutique.IdBoutique = produit.IdBoutique")
                    ->where('CodeProduit', $CodeProduit)
                    ->get()
                    ->result();
    }

    /*
      requete pour avoir toutes les infos sur la page de tous les produits ( par categorie par la suite)

      SELECT `CodeProduit`,`LibelleProduit`,`PrixProd`,`StockDispo`,NomBoutique FROM `boutique`,produit
      WHERE boutique.`IdBoutique` = produit.`IdBoutique`
    */
    public function getAllProductByCat(){
      $this->load->database();
      return $this->db->select('CodeProduit,LibelleProduit,PrixProd,StockDispo,NomBoutique')
                    ->from($this->table)
                    ->join('boutique', "boutique.IdBoutique = produit.IdBoutique")
                    ->get()
                    ->result();
    }

    public function getProductById($CodeProduit){
    $this->load->database();
    return $this->db->select('CodeProduit,LibelleProduit,PrixProd,StockDispo,NomBoutique,DescriptionProd')
                  ->from($this->table)
                  ->join('boutique', "boutique.IdBoutique = produit.IdBoutique")
                  ->where('CodeProduit', $CodeProduit)
                  ->get()
                  ->result();
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
