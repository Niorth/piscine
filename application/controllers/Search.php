<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller{

  public function index(){

  }

  public function recherche(){
    $recherche = $_POST['recherche'];
    $cat = $_POST['cat'];
    $data['product'] = array();
    $data['review_stats'] = array();

    if(strcmp($cat, '0') == 0){
      $data['product'] = $this->search_model->getProductByChamp($recherche);

    }else{
      $data['product'] = $this->search_model->getProductByChampandCat($cat,$recherche);
    }

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

  


}

?>
