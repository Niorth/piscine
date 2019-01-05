<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index(){
	}

	public function home_page(){
		if (!($this->session->has_userdata('login'))) {
			 header('location: ' . site_url('Account/connexion_page'));
		 }else{
			 if($this->session->privilege == 2){
				 // accueil a mettre par la suite
				 header('location: ' . site_url('Trader/home_page'));
			 }else{
				$this->load->view('layout/header');
		    $this->load->view('client/home_client');
		    $this->load->view('layout/footer');
			}
		}
	}


	/*
		Affiche toute les commandes du client
	*/
	public function all_order_page(){
		// id du client à changer
		if (!($this->session->has_userdata('login'))) {
			 header('location: ' . site_url('Account/connexion_page'));
		 }else{
			 if($this->session->privilege == 2){
				 // accueil a mettre par la suite
				 header('location: ' . site_url('Trader/home_page'));
			 }else{
				$data["commande"] = $this->order_model->getOrderDetailClient(21);
				$data["client"] = $this->customer_model->getCustomerByNum(21);
				
				$this->load->view('layout/header');
		    $this->load->view('client/all_order',$data);
		    $this->load->view('layout/footer');
			}
		}

	}

	/*
		Affiche toute les reservations du client
	*/
	public function all_reservation_page(){
		// id du client à changer
		if (!($this->session->has_userdata('login'))) {
			 header('location: ' . site_url('Account/connexion_page'));
		 }else{
			 if($this->session->privilege == 2){
				 // accueil a mettre par la suite
				 header('location: ' . site_url('Trader/home_page'));
			 }else{
					$data["reservation"] = $this->reservation_model->getReservationDetailClient(22);
					$data["client"] = $this->customer_model->getCustomerByNum(22);

					$this->load->view('layout/header');
					$this->load->view('client/all_reservation',$data);
					$this->load->view('layout/footer');
				}
			}

	}

}
