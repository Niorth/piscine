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
      $data['categorie'] = $this->categorie_model->getAllCategorie();
      $this->load->view('layout/header');
      $this->load->view('product/create_product', $data);
      $this->load->view('layout/footer');
    }

    public function product_page($CodeProduit){
        $data['product'] =  $this->product_model->getProductById($CodeProduit);
        $data['boutique'] =  $this->product_model->getBoutiqueProductById($CodeProduit);
        $data['review_stats'] = $this->review_model->getAvgByNum($CodeProduit);
        $data['all_review'] = $this->review_model->getAllReview($CodeProduit);

        $this->load->view('layout/header');
        $this->load->view('product/product_page', $data);
        $this->load->view('layout/footer');
    }


    public function product_list_page(){

      // l'id de la boutique à mettre par la suite
      $data['p_unavailable'] =  $this->product_model->getProductUnavailable(1);
      $data['p_available'] =  $this->product_model->getProductAvailable(1);
      $this->load->view('layout/header');
      $this->load->view('product/product_list',$data);
      $this->load->view('layout/footer');

    }

    public function all_product_page(){
      $data['product'] = $this->product_model->getAllProductByCat();
      $data['review_stats'] = array();

      // recupere l'evaluation du produit
      foreach ($data['product'] as $item) {
        array_push($data['review_stats'], $this->review_model->getAvgByNum($item->CodeProduit));
      }

      $this->load->view('layout/header');
      $this->load->view('product/all_product', $data);
      $this->load->view('layout/footer');
    }

    public function update_product_page($id)
    {
        $data['product'] =  $this->product_model->getProductBySelector('CodeProduit', $id);
        $data['categorie'] = $this->categorie_model->getAllCategorie();
        $this->load->view('layout/header');
        $this->load->view('product/modify_product', $data);
        $this->load->view('layout/footer');
    }

    public function create_product(){

      // -------------------- upload image --------------------

      $config['upload_path']          = './assets/img/';
      $config['allowed_types']        = 'jpeg|jpg|png';
      $config['max_size']             = 2048000; // 2MB
      $config['max_width']            = 1024;
      $config['max_height']           = 768;

      $this->load->library('upload', $config);

      $imgName = "not-available.png";

      // si chargement de l'image reussi
      if ( $this->upload->do_upload('img') ){
        $imgName = $this->upload->data('file_name');
      }else{
        // code d'erreur a insérer ici
      }

      // -------------------- fin upload image --------------------

      $productCode = $this->product_model->getLastCodeProduit();
			$code = ($productCode[0]->CodeProduit) + 1;

      $dataProduct = array(
          "LibelleProduit" => htmlspecialchars($_POST['libelle']),
          "DureeReservation" => htmlspecialchars($_POST['duree']),
          "StockDispo" => htmlspecialchars($_POST['stockDispo']),
          "PrixProd" => htmlspecialchars($_POST['prix']),
          "DescriptionProd" => htmlspecialchars($_POST['description']),
          "NumCategorieP" => htmlspecialchars($_POST['categorie']),
          "ImgProd" => $imgName,
          // à modifier
          "IdBoutique" => htmlspecialchars($_POST['id']),
      );

      $this->product_model->createProduct($dataProduct);

      header('location:  ' . site_url("Product/product_page/$code"));

    }

    /*
      Modifie un produit
    */
    public function update_product(){

        $code = htmlspecialchars($_POST['CodeProduit']);

        $dataProduct = array(
            "CodeProduit" => $code,
            "LibelleProduit" => htmlspecialchars($_POST['libelle']),
            "PrixProd" => htmlspecialchars($_POST['prix']),
            "stockDispo" => htmlspecialchars($_POST['stockDispo']),
            "stockReel" => htmlspecialchars($_POST['stockReel']),
            "DureeReservation" => htmlspecialchars($_POST['duree']),
            "DescriptionProd" => htmlspecialchars($_POST['description']),
            "NumCategorieP" => htmlspecialchars($_POST['categorie']),
            //TODO : à supprimer Idboutique
            "IdBoutique" => htmlspecialchars($_POST['id'])
        );

        $this->product_model->updateProduct($dataProduct);
        header('location:  ' . site_url("Product/product_page/$code"));

    }

    /*
      Met à jour le stock d'un produit
    */
    public function update_product_stock($code){

      $dataProduct = array(
        "stockDispo" => htmlspecialchars($_POST['stock']),
        "stockReel" => htmlspecialchars($_POST['stock'])
      );

      $this->product_model->updateProductStock($dataProduct,$code);
      header('location:  ' . site_url("Product/product_list_page"));
    }

    public function delete_product($code){
        $this->product_model->deleteProductByid($code);
        $this->order_model-> deleteLinkCommandeByCode($code);
        header('location:  ' . site_url("Product/all_product_page"));

        //  supprimer dans le reservations et commentaires par la suite
    }

    /*
      Ajoute un commentaire au produit
    */
    public function add_review(){
      // NumClient a changer et champ a verouiller dans la vue
      $code = htmlspecialchars($_POST['CodeProduit']);
      $review = array(
          "CodeProduit" => $code,
          "Commentaire" => htmlspecialchars($_POST['commentaire']),
          "NoteAvis" => htmlspecialchars($_POST['note']),
          "NumClient" => 22,
      );

       $this->review_model->addReview($review);
       header('location:  ' . site_url("Product/product_page/$code"));
    }

    public function getAll(){
        print_r($this->product_model->getAllProducts());
    }
}

?>
