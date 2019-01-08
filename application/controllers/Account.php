<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 31/10/2018
 * Time: 18:49
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('index');
        $this->load->view('layout/footer');
    }

    public function create_account_page(){
        $this->load->library('session');
        $data['action'] = "create_account";
        $this->load->view('layout/header');
        $this->load->view('account/create_account',$data);
        $this->load->view('layout/footer');
    }

    public function connexion_page(){
        $data['action'] = "connexion";
        $this->load->view('layout/header');
        $this->load->view('account/connexion',$data);
        $this->load->view('layout/footer');
    }

    public function myAccount_page(){
        $data['info'] = $this->getMyAccountInfo();
        $this->load->view('layout/header');
        $this->load->view('account/myAccount', $data);
        $this->load->view('layout/footer');
    }

    public function parameters_page(){
      $data['info'] = $this->getMyAccountInfo();
  		$this->load->view('layout/header');
  		$this->load->view('account/parameters',$data);
  		$this->load->view('layout/footer');
  	}

    public function modify_informations_page(){
      // email a recuperer dans la session et en fonction du type d'utilisateur
      $data['info'] = $this->getMyAccountInfo();
  		$this->load->view('layout/header');
  		$this->load->view('account/modify_informations',$data);
  		$this->load->view('layout/footer');
  	}

    public function modify_password_page(){
      $this->load->view('layout/header');
  		$this->load->view('account/modify_password');
  		$this->load->view('layout/footer');
    }

    public function connexion(){
        $this->load->library('session');
        $mail = htmlspecialchars($_POST['mail']);

        $account = $this->account_model->getAccountByMail($mail);

        if($account){
            if(password_verify($_POST['pw'], $account[0]['password'])){
                //Session
                $this->session->set_userdata('login', $account[0]['login']);
                $this->session->set_userdata('privilege', $account[0]['privilege']);

                if(!isset($_SESSION['cartBooking'])) {
                    $cart = array();
                    $_SESSION["cartBooking"] = serialize($cart);
                    $_SESSION["cartDelivery"] = serialize($cart);
                }

                if( $account[0]['privilege'] == 2){
                  $id = $this->account_model->getIdboutiqueByLogin($account[0]['login']);
                  $this->session->set_userdata('idBoutique', $id[0]->IdBoutique);
                  $this->session->set_userdata('NumCommercant', $id[0]->NumCommercant);
                }else{

                }

                //Redirection
                redirect('Order');
            }
            else{
                $this->connexion_page();
            }
        }
        else{
            $this->connexion_page();
        }
    }

    public function deconnexion(){
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect('Order');
    }

    public function create_account(){
        $dataProfil = array(
            "nom" => htmlspecialchars($_POST['nom']),
            "prenom" => htmlspecialchars($_POST['prenom']),
            "rue" => htmlspecialchars($_POST['rue']),
            "ville" => htmlspecialchars($_POST['ville']),
            "cp" => htmlspecialchars($_POST['cp']),
            "tel" => htmlspecialchars($_POST['tel']),
            "mail" => htmlspecialchars($_POST['mail']),
        );

        $privilege = ($_POST['type'] == 'client') ? 1 : 2; #if client : 1 else : 2
        $dataAccount = array(
            "MailClient" => htmlspecialchars($_POST['mail']),
            "password" => password_hash($_POST['pw'], PASSWORD_DEFAULT),
            "privilege" => htmlspecialchars($privilege),
        );

        $this->account_model->insertAccount($dataAccount);

        if($privilege == 1){
            $this->customer_model->insertCustomer($dataProfil);
        }
        else{
            $this->trader_model->insertTrader($dataProfil);
        }
    }

    public function getMyAccountInfo(){

        $mail = $this->session->userdata('login');

        if($this->session->privilege == 1){
            $customerInfo = $this->customer_model->getCustomerByMail($mail);

            $name = $customerInfo[0]['NomClient'];
            $num = $customerInfo[0]['NumClient'];
            $firstName = $customerInfo[0]['PrenomClient'];
            $street = $customerInfo[0]['RueClient'];
            $city = $customerInfo[0]['VilleClient'];
            $postalCode = $customerInfo[0]['CPClient'];
            $phone = $customerInfo[0]['TelClient'];
            $point = $customerInfo[0]['PointClient'];
        }
        else{
          $traderInfo = $this->trader_model->getTraderByMail($mail);
          $name = $traderInfo[0]['NomCommercant'];
          $num = $traderInfo[0]['NumCommercant'];
          $firstName = $traderInfo[0]['PrenomCommercant'];
          $street = $traderInfo[0]['RueCommercant'];
          $city = $traderInfo[0]['VilleCommercant'];
          $postalCode = $traderInfo[0]['CPCommercant'];
          $phone = $traderInfo[0]['TelCommercant'];
          $point = 0;

        }

        $accountInfo = $this->account_model->getAccountByMail($mail);
        $pw = $accountInfo[0]['password'];

        $data = array(
            'num' => $num,
            'name' => $name,
            'firstName' => $firstName,
            'street' => $street,
            'city' => $city,
            'postalCode' => $postalCode,
            'phone' => $phone,
            'mail' => $mail,
            'point' => $point,
            'pw' => $pw,
        );

        return $data;
    }

    /*
      Met a jour les infos de l'utilisateur
    */
    public function update_info(){
      $mail = $this->session->userdata('login');

      $dataInfo = array(
        "nom" => htmlspecialchars($_POST['Nom']),
        "prenom" => htmlspecialchars($_POST['Prenom']),
        "rue" => htmlspecialchars($_POST['Rue']),
        "ville" => htmlspecialchars($_POST['Ville']),
        "cp" => htmlspecialchars($_POST['CP']),
        "tel" => htmlspecialchars($_POST['Tel']),
        "mail" => $mail,
      );

      if($this->session->privilege == 1){
          $this->customer_model->updateCustomer($dataInfo);
      }
      else{
          $this->trader_model->updateTrader($dataInfo);
      }

      header('location:  ' . site_url("Account/parameters_page"));

    }
}
