<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 29/12/2018
 * Time: 21:45
 */

class Cart extends CI_Controller {

    function cart_page() {
        $pts = 0;
        if (isset($_SESSION['login'])) {
            $pts = $this->customer_model->getCustomerByMail($_SESSION['login']);
            $pts = $pts[0]['PointClient'];
        }
        if(isset($_SESSION['cartBooking'])){
            $linkBooking = Array();
            foreach(unserialize($_SESSION['cartBooking']) as $id => $value) {
                $product = $this->product_model->getProductById($id);
                $productImg = $product[0]->ImgProd;
                array_push($linkBooking, $productImg);
            }

            $linkDelivery= Array();
            foreach(unserialize($_SESSION['cartDelivery']) as $id => $value) {
                $product = $this->product_model->getProductById($id);
                $productImg = $product[0]->ImgProd;
                array_push($linkDelivery, $productImg);
            }

            $data["linkBooking"] = $linkBooking;
            $data["linkDelivery"] = $linkDelivery;
        }


        $data["pts"] = $pts;

        $this->load->view('layout/header');
        $this->load->view('cart/order-summary', $data);
        $this->load->view('layout/footer');
    }

    public function createCart() {
        $cart = array();
        $_SESSION["cartBooking"] = serialize($cart);
        $_SESSION["cartDelivery"] = serialize($cart);
    }


    public function addProductToCart($id, $name, $qte, $price, $type){
        $name = str_replace('%28', '(', $name);
        $name = str_replace('%29', ')', $name);

        $cartBooking = unserialize($_SESSION['cartBooking']);
        $cartDelivery = unserialize($_SESSION['cartDelivery']);

        if($type == 1) { //booking
            if(!isset($cartBooking[$id])) {
                if(isset($cartDelivery[$id])){
                    //if already in deliveries remove it
                   self::removeProductFromCart($id, 2);
                }
                $cartBooking[$id] = array(urldecode($name), $qte, $price);
                $_SESSION["cartBooking"] = serialize($cartBooking);
            }
            else {
                self::changeQty($id, $qte, $type);
            }
        }
        else { //Delivery
            if(!isset($cartDelivery[$id])) {
                if(isset($cartBooking[$id])){
                    // if already in booking remove it
                    self::removeProductFromCart($id, 1);
                }
                $cartDelivery[$id] = array(urldecode($name), $qte, $price);
                $_SESSION["cartDelivery"] = serialize($cartDelivery);
            }
            else {
                self::changeQty($id, $qte, $type);
            }
        }
    }

    public static function removeProductFromCart($id){
        $cartBooking = unserialize($_SESSION["cartBooking"]);
        $cartDelivery = unserialize($_SESSION["cartDelivery"]);

        if(isset($cartBooking[$id])){ //booking
            unset($cartBooking[$id]);
            $_SESSION["cartBooking"] = serialize($cartBooking);
        }
        else { //Delivery
            unset($cartDelivery[$id]);
            $_SESSION["cartDelivery"] = serialize($cartDelivery);
        }
    }

    public static function changeQty($id, $qty) {
        $cartBooking = unserialize($_SESSION["cartBooking"]);
        $cartDelivery = unserialize($_SESSION["cartDelivery"]);

        if(isset($cartBooking[$id])){ //booking
            $cartBooking[$id][1] = $qty;
            $_SESSION["cartBooking"] = serialize($cartBooking);
        }
        else { //Delivery
            $cartDelivery[$id][1] = $qty;
            $_SESSION["cartDelivery"] = serialize($cartDelivery);
        }
    }

    public function test() {
        $this->createCart();
        if (isset($_SESSION['cartDelivery'])) {
            $this->addProductToCart(1, "Chat", 3, 100, 1);
            $this->addProductToCart(4, "Basquette", 3, 100, 1);
            $this->addProductToCart(5, "Short", 3, 100, 1);
            $this->addProductToCart(6, "Casquette", 3, 100, 1);

            $this->addProductToCart(2, "Pull", 1, 50, 1);
            $this->addProductToCart(3, "Pantalon", 3, 90, 1);
            print_r(unserialize($_SESSION["cartBooking"]));
        }
        if (isset($_SESSION['cartBooking'])) {
            $this->addProductToCart(7, "Enfant", 3, 100, 2);
            $this->addProductToCart(8, "chien", 3, 100, 2);
            $this->addProductToCart(9, "Cahier", 3, 100, 2);
            $this->addProductToCart(10, "ardoise", 3, 100, 2);
            print_r(unserialize($_SESSION["cartDelivery"]));


        }
    }
}