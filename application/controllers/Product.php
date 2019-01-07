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
    public function create_product_page(){

      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Index'));
         }else{
            $data['categorie'] = $this->categorie_model->getAllCategorie();
            $this->load->view('layout/header_seller');
            $this->load->view('product/create_product', $data);
            $this->load->view('layout/footer');
          }
       }
    }

    public function product_page($CodeProduit){
        if(!isset($_SESSION['cartBooking'])){
            $cart = array();
            $_SESSION["cartBooking"] = serialize($cart);
            $_SESSION["cartDelivery"] = serialize($cart);
        }
        $data['product'] =  $this->product_model->getProductById($CodeProduit);
        $data['boutique'] =  $this->product_model->getBoutiqueProductById($CodeProduit);
        $data['review_stats'] = $this->review_model->getAvgByNum($CodeProduit);
        $data['all_review'] = $this->review_model->getAllReview($CodeProduit);

        $header = "layout/header";

        if ($this->session->has_userdata('login')) {
          if($this->session->privilege == 2){
            $header = "layout/header_seller";
          }
        }
        $this->load->view($header);
        $this->load->view('product/product_page', $data);
        $this->load->view('layout/footer');
    }

    /*
      Page de gestion des stock
    */
    public function product_list_page(){

      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Index'));
         }else{
            $idBoutique = $this->session->idBoutique;
            $data['p_unavailable'] =  $this->product_model->getProductUnavailable($idBoutique);
            $data['p_available'] =  $this->product_model->getProductAvailable($idBoutique);
            $this->load->view('layout/header_seller');
            $this->load->view('product/product_list',$data);
            $this->load->view('layout/footer');
          }
       }
    }

    public function all_product_page(){
      // categorie a mettre
      $data['product'] = $this->product_model->getAllProductByCat();
      $data['review_stats'] = array();

      // recupere l'evaluation du produit
      foreach ($data['product'] as $item) {
        array_push($data['review_stats'], $this->review_model->getAvgByNum($item->CodeProduit));
      }

      $header = "layout/header";

      if ($this->session->has_userdata('login')) {
        if($this->session->privilege == 2){
          $header = "layout/header_seller";
        }
      }
      $this->load->view($header);
      $this->load->view('product/all_product', $data);
      $this->load->view('layout/footer');
    }

    public function update_product_page($id)
    {
      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Index'));
         }else{
          $data['product'] =  $this->product_model->getProductBySelector('CodeProduit', $id);
          $data['categorie'] = $this->categorie_model->getAllCategorie();
          $this->load->view('layout/header_seller');
          $this->load->view('product/modify_product', $data);
          $this->load->view('layout/footer');
        }
      }
    }

    public function create_product(){

      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Index'));
         }else{

            // -------------------- upload image --------------------

            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2048000000; // 2MB
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
            $idBoutique = $this->session->idBoutique;

            $dataProduct = array(
                "LibelleProduit" => htmlspecialchars($_POST['libelle']),
                "DureeReservation" => htmlspecialchars($_POST['duree']),
                "StockDispo" => htmlspecialchars($_POST['stockDispo']),
                "PrixProd" => htmlspecialchars($_POST['prix']),
                "DescriptionProd" => htmlspecialchars($_POST['description']),
                "NumCategorieP" => htmlspecialchars($_POST['categorie']),
                "ImgProd" => $imgName,
                // à modifier
                "IdBoutique" => $idBoutique,
            );

            $this->product_model->createProduct($dataProduct);
            header('location:  ' . site_url("Product/product_page/$code"));

          }
        }
    }

    /*
      Modifie un produit
    */
    public function update_product(){

      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Index'));
         }else{

            $code = htmlspecialchars($_POST['CodeProduit']);
            $idBoutique = $this->session->idBoutique;

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
                "IdBoutique" => $idBoutique
            );

            $this->product_model->updateProduct($dataProduct);
            header('location:  ' . site_url("Product/product_page/$code"));
          }
        }
    }

    /*
      Met à jour le stock d'un produit
    */
    public function update_product_stock($code){

      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Index'));
         }else{

          $dataProduct = array(
            "stockDispo" => htmlspecialchars($_POST['stock']),
            "stockReel" => htmlspecialchars($_POST['stock'])
          );

          $this->product_model->updateProductStock($dataProduct,$code);
          header('location:  ' . site_url("Product/product_list_page"));
        }
      }
    }

    public function updateStock($id, $qty){
        $product = $this->product_model->getProductBySelector('CodeProduit', $id);
        $dispo = $product[0]['StockDispo'];
        $reel = $product[0]['StockReel'];

        $dispo = $dispo - $qty;
        $data = Array('stockDispo' => $dispo, 'stockReel' => $reel);
        $this->product_model->updateProductStock($data,$id);
    }

    public function delete_product($code){

      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Index'));
         }else{
            $this->product_model->deleteProductByid($code);
            $this->order_model-> deleteLinkCommandeByCode($code);
            header('location:  ' . site_url("Product/all_product_page"));
        }
      }
        //  supprimer dans le reservations et commentaires par la suite
    }

    /*
      Ajoute un commentaire au produit
    */
    public function add_review(){
      // NumClient a changer et champ a verouiller dans la vue / modification a faire
      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 2){
           // accueil a mettre par la suite
           header('location: ' . site_url('Account/connexion_page'));
         }else{

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
      }
    }

    public function getAll(){
        print_r($this->product_model->getAllProducts());
    }
}

?>
