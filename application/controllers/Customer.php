<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function index()
	{
		$this->load->view('layout/header');
    $this->load->view('layout/footer');
	}

	public function createCart(){
        $cart = array();
        setcookie("cart", serialize($cart));
    }

    public function addProductToCart($id, $qte){
        $cart = unserialize($_COOKIE["cart"]);
        $cart[$id] = $qte;
        setcookie("cart", serialize($cart));
    }

    public function removeProductFromCart($id){
        $cart = unserialize($_COOKIE["cart"]);
        unset($cart[$id]);
        setcookie("cart", serialize($cart));
    }
}
