<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reduction extends CI_Controller {

    public function index(){

    }

    public function create_reduction_page(){
      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Accueil/home'));
         }else{
          $data['action'] = "create_reduction";
          $this->load->view('layout/header_seller');
          $this->load->view('reduction/create_reduction',$data);
          $this->load->view('layout/footer');
        }
      }

    }

    public function create_reduction(){
      // id bouique a modifier
      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Accueil/home'));
         }else{
            $idBoutique = $this->session->idBoutique;
            $data = array(
      							"CodeReduction" => htmlspecialchars($_POST['CodeReduction']),
      							"LibelleReduction" => htmlspecialchars($_POST['LibelleReduction']),
      							"MontantReduction" => htmlspecialchars($_POST['MontantReduction']),
      							"DateDReduction" => htmlspecialchars($_POST['DateDReduction']),
      							"DateFReduction" => htmlspecialchars($_POST['DateFReduction']),
      							"IdBoutique" => $idBoutique,
			                );

                      $this->reduction_model->addReduction($data);
                      header('location:  ' . site_url("Reduction/list_reduction_seller"));

          }
        }
    }

    public function list_reduction_seller(){
      // id boutique a changer
      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Accueil/home'));
         }else{
            $idBoutique = $this->session->idBoutique;
            $data['reduction'] = $this->reduction_model->selectById($idBoutique);
            $this->load->view('layout/header_seller');
            $this->load->view('reduction/list_reduction_seller',$data);
            $this->load->view('layout/footer');
          }
        }
    }

    // valable pour le client (et l'admin)
    public function list_reduction_client(){
      $data['reduction'] = $this->reduction_model->getEnableReduction();
      $this->load->view('layout/header');
      $this->load->view('reduction/list_reduction_client',$data);
      $this->load->view('layout/footer');

      $header = "layout/header";

      if ($this->session->has_userdata('login')) {
        if($this->session->privilege == 2){
          $header = "layout/header_seller";
        }
      }
      $this->load->view($header);
      $this->load->view('reduction/list_reduction_client',$data);
      $this->load->view('layout/footer');
    }


    public function update_reduction_page($num){
      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Accueil/home'));
         }else{
            $data['action'] = "edit_reduction";
            $data['reduction'] = $this->reduction_model->selectByNum($num);
            $this->load->view('layout/header_seller');
            $this->load->view('reduction/create_reduction',$data);
            $this->load->view('layout/footer');
          }
        }
    }

    public function edit_reduction(){

      // id boutique a modifier
      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Accueil/home'));
         }else{
            $idBoutique = $this->session->idBoutique;
            $data = array(
                    "NumReduction" => htmlspecialchars($_POST['NumReduction']),
                    "CodeReduction" => htmlspecialchars($_POST['CodeReduction']),
      							"LibelleReduction" => htmlspecialchars($_POST['LibelleReduction']),
      							"MontantReduction" => htmlspecialchars($_POST['MontantReduction']),
      							"DateDReduction" => htmlspecialchars($_POST['DateDReduction']),
      							"DateFReduction" => htmlspecialchars($_POST['DateFReduction']),
      							"IdBoutique" => $idBoutique,
      			);

            $this->reduction_model->updateReduction($data);

            header('location:  ' . site_url("Reduction/list_reduction_seller"));

        }
      }

    }

    // a verouiller
    public function delete_reduction($num){
      if (!($this->session->has_userdata('login'))) {
         header('location: ' . site_url('Account/connexion_page'));
       }else{
         if($this->session->privilege == 1){
           // accueil a mettre par la suite
           header('location: ' . site_url('Accueil/home'));
         }else{
            $idBoutique = $this->session->idBoutique;
            $this->reduction_model->deleteReduction($num,$idBoutique);
            header('location:  ' . site_url("Reduction/list_reduction_seller"));
          }
        }
    }

}
