<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reduction extends CI_Controller {

    public function index(){

    }

    public function create_reduction_page(){
      $data['action'] = "create_reduction";
      $this->load->view('layout/header');
      $this->load->view('reduction/create_reduction',$data);
      $this->load->view('layout/footer');
    }

    public function create_reduction(){
      // id bouique a modifier
      $data = array(
							"CodeReduction" => htmlspecialchars($_POST['CodeReduction']),
							"LibelleReduction" => htmlspecialchars($_POST['LibelleReduction']),
							"MontantReduction" => htmlspecialchars($_POST['MontantReduction']),
							"DateDReduction" => htmlspecialchars($_POST['DateDReduction']),
							"DateFReduction" => htmlspecialchars($_POST['DateFReduction']),
							"IdBoutique" => 11,
			);

      $this->reduction_model->addReduction($data);
    }

    public function list_reduction_seller(){
      // id boutique a changer
      $data['reduction'] = $this->reduction_model->selectById(11);
      $this->load->view('layout/header');
      $this->load->view('reduction/list_reduction_seller',$data);
      $this->load->view('layout/footer');
    }

    // valable pour le client (et l'admin)
    public function list_reduction_client(){
      $data['reduction'] = $this->reduction_model->getEnableReduction();
      $this->load->view('layout/header');
      $this->load->view('reduction/list_reduction_client',$data);
      $this->load->view('layout/footer');
    }


    public function update_reduction_page($num){
      $data['action'] = "edit_reduction";
      $data['reduction'] = $this->reduction_model->selectByNum($num);
      $this->load->view('layout/header');
      $this->load->view('reduction/create_reduction',$data);
      $this->load->view('layout/footer');
    }

    public function edit_reduction(){
      // id boutique a modifier
      $data = array(
              "NumReduction" => htmlspecialchars($_POST['NumReduction']),
              "CodeReduction" => htmlspecialchars($_POST['CodeReduction']),
							"LibelleReduction" => htmlspecialchars($_POST['LibelleReduction']),
							"MontantReduction" => htmlspecialchars($_POST['MontantReduction']),
							"DateDReduction" => htmlspecialchars($_POST['DateDReduction']),
							"DateFReduction" => htmlspecialchars($_POST['DateFReduction']),
							"IdBoutique" => 11,
			);

      $this->reduction_model->updateReduction($data);

    }

    // a verouiller
    public function delete_reduction($num){
      // idBoutique a changer
      $id = 11;
      $this->reduction_model->deleteReduction($num,$id);
      header('location:  ' . site_url("Reduction/list_reduction_seller"));
    }

}
