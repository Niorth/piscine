<?php
/**
 * Created by PhpStorm.
 * User: mamac
 * Date: 22/11/2018
 * Time: 12:33
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Trader extends CI_Controller {

    public function index(){
    }

    public function linkTraderShop(){

        $data = array(
            "IdBoutique" => htmlspecialchars($_POST['IdBoutique']),
            "NumCommercant" => htmlspecialchars($_POST['trader'])
        );

        $this->trader_model->insertGererBoutique($data);
    }

    public function home_page(){

      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Accueil/home'));
         }else{

          $data['idBoutique'] = $this->session->idBoutique;
          $this->load->view('layout/header_seller');
          $this->load->view('trader/home_trader',$data);
          $this->load->view('layout/footer');
        }
      }
    }

    public function other_option_page(){

      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Accueil/home'));
         }else{
          $idBoutique = $this->session->IdBoutique;
          $numCommercant = $this->session->NumCommercant;
          $data['boutique'] = $this->shop_model->getShopGestion($numCommercant);
          $data['idCourant'] = $idBoutique;
          $this->load->view('layout/header_seller');
          $this->load->view('trader/other_parameters',$data);
          $this->load->view('layout/footer');
        }
      }
    }

    public function change_shop(){
      $this->session->idBoutique = $_POST['boutique'];
      header('location:  ' . site_url('Trader/home_page'));
    }



}
