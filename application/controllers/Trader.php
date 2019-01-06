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
      $data['idBoutique'] = $idBoutique = $this->session->idBoutique;
      $this->load->view('layout/header_seller');
      $this->load->view('trader/home_trader',$data);
      $this->load->view('layout/footer');
    }



}
