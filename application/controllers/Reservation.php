<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {

  public function index(){
    $this->load->view('layout/header');
    $this->load->view('order/to_do');
    $this->load->view('layout/footer');
	}

  public function delete_reservation_expired(){
    // a modifier l'id
    // suppresion dans la table reservation et reserver a effectuer.
    $expired = $this->reservation_ligne_model->getResForDelete(11);

    foreach ($expired as $ligne) {
      $this->reservation_ligne_model->deleteForNum(11,$ligne->NumLigneRes);
    }

      header('location:  ' . site_url("Order/order_reservation_list"));

  }

  public function reservation_detail_seller($numLigne,$numRes){

    $data['reservation'] = $this->reservation_model->getReservationDetailSeller($numLigne,$numRes);

    $this->load->view('layout/header');
    $this->load->view('reservation/reservation_detail_seller',$data);
    $this->load->view('layout/footer');

  }

  public function reservation_update_status(){
    // idBoutique a modifier
    $numLigne =  htmlspecialchars($_POST['NumLigneRes']);
    $numRes =  htmlspecialchars($_POST['NumReservation']);

    $reservation = array(
      "StatusLigneRes" => htmlspecialchars($_POST['status']),
      "NumLigneRes" => $numLigne,
      "NumReservation" => $numRes,
      // a modifier
      "idBoutique" => htmlspecialchars($_POST['idBoutique'])
    );

    $this->reservation_ligne_model->updateStatus($reservation);

    header('location:  ' . site_url("Order/order_reservation_list"));
  }


}
