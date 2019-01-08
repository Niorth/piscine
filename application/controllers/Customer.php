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
				 header('location: ' . site_url('Accueil/home'));
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
				 header('location: ' . site_url('Accueil/home'));
			 }else{
				$mail = $this->session->userdata('login');
        $customerInfo = $this->customer_model->getCustomerByMail($mail);
        $customer = $customerInfo[0]['NumClient'];
				$data["commande"] = $this->order_model->getOrderDetailClient($customer,"traite");
				$data["commande_c"] = $this->order_model->getOrderDetailClient($customer,"non traite");

				$data["client"] = $this->customer_model->getCustomerByNum($customer);

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
				 header('location: ' . site_url('Accueil/home'));
			 }else{
				 $mail = $this->session->userdata('login');
         $customerInfo = $this->customer_model->getCustomerByMail($mail);
         $customer = $customerInfo[0]['NumClient'];
					$data["reservation"] = $this->reservation_model->getReservationDetailClient($customer,"traite");
					$data["reservation_c"] = $this->reservation_model->getReservationDetailClient($customer,"non traite");
					$data["client"] = $this->customer_model->getCustomerByNum($customer);

					$this->load->view('layout/header');
					$this->load->view('client/all_reservation',$data);
					$this->load->view('layout/footer');
				}
			}

	}

	public function usePoints() {
	    if(isset($_SESSION['login'])){
	        $mail = $_SESSION['login'];
	        $pts = $this->customer_model->getCustomerByMail($mail);
	        $pts = $pts[0]['PointClient'] - 100;
	        $this->customer_model->updatePointsCustomer($pts, $mail);
        }
    }

    public function earnPoints($nb){
        if(isset($_SESSION['login'])){
            $mail = $_SESSION['login'];
            $pts = $this->customer_model->getCustomerByMail($mail);
            $pts = $pts[0]['PointClient'] + $nb;
            $this->customer_model->updatePointsCustomer($pts, $mail);
        }
    }

}
