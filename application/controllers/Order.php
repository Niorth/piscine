<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

  public function index(){
    $this->load->view('layout/header');
    $this->load->view('order/order_reservation');
    $this->load->view('layout/footer');
	}

  public function tableau_de_bord(){
    // à modifier l'id
    $data['totalLigneCommande'] =  $this->order_ligne_model->total(2);
    $data['totalLigneCommandeCours'] =  $this->order_ligne_model->totalStatus(2,"en cours de preparation");
    $data['totalLigneCommandeTraite'] =  $this->order_ligne_model->totalStatus(2,"traite");
    $data['totalLigneCommandeNonTraite'] =  $this->order_ligne_model->totalStatus(2,"non traite");

    $this->load->view('layout/header');
    $this->load->view('order/stats_order_res', $data);
    $this->load->view('layout/footer');
  }

}
