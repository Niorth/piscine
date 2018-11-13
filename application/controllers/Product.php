<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 13/11/2018
 * Time: 08:07
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function create_product_page()
    {
        $data['action'] = "create_product";
        $this->load->view('layout/header');
        $this->load->view('product/create_product', $data);
        $this->load->view('layout/footer');
    }

    public function update_product_page($id)
    {
        $data['product'] =  $this->product_model->getProductBySelector('CodeProduit', $id);
        $data['action'] = "update_product";
        $data['key'] = $id;
        $this->load->view('layout/header');
        $this->load->view('product/create_product', $data);
        $this->load->view('layout/footer');
    }

    public function create_product(){
        $dataProduct = array(
            "libelle" => htmlspecialchars($_POST['libelle']),
            "prix" => htmlspecialchars($_POST['prix']),
            "stockDispo" => htmlspecialchars($_POST['stockDispo']),
            "duree" => htmlspecialchars($_POST['duree']),
            "id" => htmlspecialchars($_POST['id']),
            "description" => htmlspecialchars($_POST['description']),

        );

        $this->product_model->createProduct($dataProduct);
    }

    public function update_product(){
        $dataProduct = array(
            "libelle" => htmlspecialchars($_POST['libelle']),
            "prix" => htmlspecialchars($_POST['prix']),
            "stockDispo" => htmlspecialchars($_POST['stockDispo']),
            "duree" => htmlspecialchars($_POST['duree']),
            "id" => htmlspecialchars($_POST['id']),
            "description" => htmlspecialchars($_POST['description']),
            //TODO : supprimer key
            "key" => htmlspecialchars($_POST['key']),

        );

        $this->product_model->updateProduct($dataProduct);
    }

    public function delete_product($id){
        $this->product_model->deleteProductByid($id);
    }

    public function getAll(){
        print_r($this->product_model->getAllProducts());

    }
}

?>