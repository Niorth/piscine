<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 29/12/2018
 * Time: 21:45
 */

class Cart extends CI_Controller {

    function cart_page() {
        $this->load->view('layout/header');
        $this->load->view('cart/order-summary');
        $this->load->view('layout/footer');
    }

    public function createCart() {
        $cart = array();
        $_SESSION["cart"] = serialize($cart);
    }


    public function addProductToCart($id, $name, $qte, $price){
        $name = str_replace('%28', '(', $name);
        $name = str_replace('%29', ')', $name);
        $cart = unserialize($_SESSION['cart']);
        if(!isset($cart[$id])) {
            $cart[$id] = array(urldecode($name), $qte, $price);
            $_SESSION["cart"] = serialize($cart);
        }
        else {
            self::changeQty($id, $qte);
        }
    }

    public static function removeProductFromCart($id){
        $cart = unserialize($_SESSION["cart"]);
        unset($cart[$id]);
        $_SESSION["cart"] = serialize($cart);
    }

    public static function changeQty($id, $qty) {
        $cart = unserialize($_SESSION["cart"]);
        $cart[$id][1] = $qty;
        echo($cart);
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
}