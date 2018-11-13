<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 08/11/2018
 * Time: 08:57
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{

    public function index_page()
    {
        $this->load->view('layout/header');
        $this->load->view('index');
        $this->load->view('layout/footer');
    }
}