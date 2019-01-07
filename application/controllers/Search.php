<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{

  public function index(){

  }

  public function searchByCat($nomCategorie){
    $data['product'] = $this->search_model->getProductByCat($nomCategorie);
    $data['review_stats'] = array();

    // recupere l'evaluation du produit
    foreach ($data['product'] as $item) {
      array_push($data['review_stats'], $this->review_model->getAvgByNum($item->CodeProduit));
    }

    $header = "layout/header";

    if ($this->session->has_userdata('login')) {
      if($this->session->privilege == 2){
        $header = "layout/header_seller";
      }
    }
    $this->load->view($header);
    $this->load->view('product/all_product', $data);
    $this->load->view('layout/footer');
  }

  public function searchAll($champ){

    $data['product'] = $this->search_model->getProductByChamp($champ);
    $data['review_stats'] = array();
    var_dump($data);

    // recupere l'evaluation du produit
    foreach ($data['product'] as $item) {
      array_push($data['review_stats'], $this->review_model->getAvgByNum($item->CodeProduit));
    }

    $header = "layout/header";

    if ($this->session->has_userdata('login')) {
      if($this->session->privilege == 2){
        $header = "layout/header_seller";
      }
    }
    $this->load->view($header);
    $this->load->view('product/all_product', $data);
    $this->load->view('layout/footer');
  }


}

?>
