<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_variant_Model extends CI_Model{

  protected $table = 'varianteproduit';

  public function createProductVariant($data){
      $this -> load -> database();
      return $this->db->set('LibelleVarianteP', $data['LibelleVarianteP'])
          ->set('DescriptionVarianteP', $data['DescriptionVarianteP'])
          ->set('StockReel', $data['StockReel'])
          ->set('StockDispo', $data['StockDispo'])
          ->set('PrixProd', $data['PrixProd'])
          ->set('CodeProduit', $data['CodeProduit'])
          ->insert($this->table);
  }



}
