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
        return $this->db->set('LibelleProduit', $data['LibelleProduit'])
            ->set('DescriptionProd', $data['DescriptionProd'])
            ->set('DureeReservation', $data['DureeReservation'])
            ->set('PrixProd', $data['PrixProd'])
            ->set('StockReel', $data['StockDispo'])
            ->set('StockDispo', $data['StockDispo'])
            ->set('IdBoutique', $data['IdBoutique'])
            ->set('NumCategorieP', $data['NumCategorieP'])
            ->set('ImgProd', $data['ImgProd'])
            ->insert($this->table);
    }

    public function updateProduct($data){
        $this -> load -> database();
        return $this->db->set('LibelleProduit', $data['LibelleProduit'])
            ->set('DescriptionProd', $data['DescriptionProd'])
            ->set('PrixProd', $data['PrixProd'])
            ->set('StockReel', $data['stockDispo'])
            ->set('StockDispo', $data['stockDispo'])//stockDispo = stockReel
            ->set('DureeReservation', $data['DureeReservation'])
            ->set('IdBoutique', $data['IdBoutique'])
            ->set('NumCategorieP', $data['NumCategorieP'])
            ->where('CodeProduit', $data['CodeProduit'])
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

      SELECT `CodeProduit`,`LibelleProduit`,`PrixProd`,`StockDispo`,NomBoutique 
      FROM `boutique`,produit
      WHERE boutique.`IdBoutique` = produit.`IdBoutique`
    */
    public function getAllProductByCat(){
      $this->load->database();
      return $this->db->select('CodeProduit,LibelleProduit,PrixProd,StockDispo,NomBoutique,ImgProd')
                    ->from($this->table)
                    ->join('boutique', "boutique.IdBoutique = produit.IdBoutique")
                    ->get()
                    ->result();
    }

    public function getProductById($CodeProduit){
    $this->load->database();
    return $this->db->select('CodeProduit,LibelleProduit,PrixProd,StockDispo,NomBoutique,DescriptionProd,ImgProd')
                  ->from($this->table)
                  ->join('boutique', "boutique.IdBoutique = produit.IdBoutique")
                  ->where('CodeProduit', $CodeProduit)
                  ->get()
                  ->result();
    }

    /*
      Retourne le dernier CodeProduit de la table
    */
    public function getLastCodeProduit() {
      $this->load->database();
      return $this->db->select('CodeProduit')
                      ->from($this->table)
                      ->order_by('CodeProduit', 'desc')
                      ->limit(1)
                      ->get()
                      ->result();
    }

    /*
      Retourne les produits en rupture de stock

      SELECT CodeProduit, LibelleProduit, PrixProd, StockDispo, ImgProd, IdBoutique
      from produit
      where IdBoutique = $id
      and StockDispo = 0
    */
    public function getProductUnavailable($id){
      $this->load->database();
      return $this->db->select('CodeProduit,LibelleProduit,PrixProd,StockDispo,ImgProd,IdBoutique')
                    ->from($this->table)
                    ->where('IdBoutique', $id)
                    ->where('StockDispo', 0)
                    ->get()
                    ->result();
    }

    /*
    Retourne les produits disponible ( qte != 0)

    SELECT CodeProduit, LibelleProduit, PrixProd, StockDispo, ImgProd, IdBoutique
    from produit
    where IdBoutique = $id
    and StockDispo <> 0

    */
    public function getProductAvailable($id){
      $this->load->database();
      return $this->db->select('CodeProduit,LibelleProduit,PrixProd,StockDispo,ImgProd,IdBoutique')
                    ->from($this->table)
                    ->where('IdBoutique', $id)
                    ->where('StockDispo <>', 0)
                    ->get()
                    ->result();
    }

    /*
      Met à jour le stock d'un produit
    */
    public function updateProductStock($data,$code){
      $this -> load -> database();
      return $this->db->set('StockReel', $data['stockDispo'])
                      ->set('StockDispo', $data['stockDispo'])
                      ->where('CodeProduit', $code)
                      ->update($this->table);

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
