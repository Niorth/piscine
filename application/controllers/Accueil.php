<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 08/11/2018
 * Time: 08:57
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller
{

    public function index(){
      $this->home();
    }

    public function home()
    {
        $header = "layout/header";

        if ($this->session->has_userdata('login')) {
          if($this->session->privilege == 2){
            $header = "layout/header_seller";
          }
        }
        $this->load->view($header);
        $this->load->view('index/index');
        $this->load->view('layout/footer');
    }
}
