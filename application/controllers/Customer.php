<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header');
        $this->load->view('layout/footer');
	}

    public function addProductToCart($id, $name, $qte, $price){
        $cart = unserialize($_SESSION['cart']);
        $cart[$id] = array($name, $qte, $price);
        $_SESSION["cart"] = serialize($cart);
	}

    public static function removeProductFromCart($id){
        $cart = unserialize($_SESSION["cart"]);
        unset($cart[$id]);
        $_SESSION["cart"] = serialize($cart);
    }

    public function test() {
	    $this->createCart();
        if (isset($_SESSION['cart'])) {
            $this->addProductToCart(1, "Tshirt", 3, 100);
            $this->addProductToCart(4, "Tshirt", 3, 100);
            $this->addProductToCart(5, "Tshirt", 3, 100);
            $this->addProductToCart(6, "Tshirt", 3, 100);

            $this->addProductToCart(2, "Pull", 1, 50);
            $this->addProductToCart(3, "Pantalon", 3, 90);
            print_r(unserialize($_SESSION["cart"]));
        }
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

	public function all_reservation_page(){
		// id du client à changer
		$data["reservation"] = $this->reservation_model->getReservationDetailClient(22);
		$data["client"] = $this->customer_model->getCustomerByNum(22);

		$this->load->view('layout/header');
		$this->load->view('client/all_reservation',$data);
		$this->load->view('layout/footer');
	}
}
