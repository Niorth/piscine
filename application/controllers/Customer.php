<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header');
        $this->load->view('layout/footer');
	}

	public function home_page(){
		$this->load->view('layout/header');
    $this->load->view('client/home_client');
    $this->load->view('layout/footer');
	}


	/*
		Affiche toute les commandes du client
	*/
	public function all_order_page(){
		// id du client à changer
		$data["commande"] = $this->order_model->getOrderDetailClient(21);
		$data["client"] = $this->customer_model->getCustomerByNum(21);

		$this->load->view('layout/header');
    $this->load->view('client/all_order',$data);
    $this->load->view('layout/footer');

	}

	/*
		Affiche toute les reservations du client
	*/
	public function all_reservation_page(){
		// id du client à changer
		$data["reservation"] = $this->reservation_model->getReservationDetailClient(22);
		$data["client"] = $this->customer_model->getCustomerByNum(22);

		$this->load->view('layout/header');
		$this->load->view('client/all_reservation',$data);
		$this->load->view('layout/footer');
	}

}
