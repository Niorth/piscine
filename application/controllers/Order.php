<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

  public function index(){
    $this->load->view('layout/header');
    $this->load->view('order/to_do');
    $this->load->view('layout/footer');
	}

  public function tableau_de_bord(){

    if (!($this->session->has_userdata('login'))) {
       header('location: ' . site_url('Account/connexion_page'));
     }else{
       if($this->session->privilege == 1){
         // accueil a mettre par la suite
         header('location: ' . site_url('Index'));
       }else{
         $idBoutique = $this->session->idBoutique;
         $data['totalLigneCommande'] =  $this->order_ligne_model->total($id);
         $data['totalLigneCommandeCours'] =  $this->order_ligne_model->totalStatus($id,"en cours de preparation");
         $data['totalLigneCommandeTraite'] =  $this->order_ligne_model->totalStatus($id,"traite");
         $data['totalLigneCommandeNonTraite'] =  $this->order_ligne_model->totalStatus($id,"non traite");

         $this->load->view('layout/header_seller');
         $this->load->view('order/stats_order_res', $data);
         $this->load->view('layout/footer');
       }
    }
  }

  /*
    Page de gestion des reservations pour le commercant
  */
  public function order_reservation_list(){
    // id boutique a mettre

    if (!($this->session->has_userdata('login'))) {
       header('location: ' . site_url('Account/connexion_page'));
     }else{
       if($this->session->privilege == 1){
         // accueil a mettre par la suite
         header('location: ' . site_url('Index'));
       }else{
        $idBoutique = $this->session->idBoutique;
        $data['c_nontraite'] = $this->order_ligne_model->getOrderLigne(11,"non traite");
        $data['c_traite'] = $this->order_ligne_model->getOrderLigne(11,"traite");

        $data['r_prepared'] = $this->reservation_ligne_model->getResPrepared(11);
        $data['r_notPrepared'] = $this->reservation_ligne_model->getResNotPrepared(11);
        $data['r_expire'] = $this->reservation_ligne_model->getResExpired(11);

        $this->load->view('layout/header_seller');
        $this->load->view('order/order_reservation',$data);
        $this->load->view('layout/footer');
      }
    }
  }

  public function order_detail_seller($numLigne,$numCom){

    if (!($this->session->has_userdata('login'))) {
       header('location: ' . site_url('Account/connexion_page'));
     }else{
       if($this->session->privilege == 1){
         // accueil a mettre par la suite
         header('location: ' . site_url('Index'));
       }else{
        $data['commande'] = $this->order_model->getOrderDetailSeller($numLigne,$numCom);
        $this->load->view('layout/header_seller');
        $this->load->view('order/order_detail_seller',$data);
        $this->load->view('layout/footer');
      }
    }
  }

  public function order_update_status(){

    $numLigne =  htmlspecialchars($_POST['NumLigneCommande']);
    $numCom =  htmlspecialchars($_POST['NumCommande']);

    if (!($this->session->has_userdata('login'))) {
       header('location: ' . site_url('Account/connexion_page'));
     }else{
       if($this->session->privilege == 1){
         // accueil a mettre par la suite
         header('location: ' . site_url('Index'));
       }else{

          $order = array(
            "StatusLigneCom" => htmlspecialchars($_POST['status']),
            "NumLigneCommande" => $numLigne,
            "NumCommande" => $numCom,
            // a modifier
            "idBoutique" => htmlspecialchars($_POST['idBoutique'])
          );

          $this->order_ligne_model->updateStatus($order);

          header('location:  ' . site_url("Order/order_reservation_list"));
      }
    }

  }


}
