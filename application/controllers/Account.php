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

    public function connexion(){
        $this->load->library('session');
        $mail = htmlspecialchars($_POST['mail']);

        $account = $this->account_model->getAccountByMail($mail);

        if($account){
            if(password_verify($_POST['pw'], $account[0]['password'])){
                //Session
                $this->session->set_userdata('login', $account[0]['login']);
                $this->session->set_userdata('privilege', $account[0]['privilege']);


                //Redirection
                redirect('Index/index_page');
            }
            else{
                //TODO : Handle wrong password
                echo 'mauvais mdp';
            }
        }
        else{
            //TODO : Handle mail doesn't exist
            echo 'Mauvais mail';
        }
    }

    public function deconnexion(){
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect('Index/index_page');
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
        $customerInfo = $this->customer_model->getCustomerByMail($mail);
        $accountInfo = $this->account_model->getAccountByMail($mail);

        $name = $customerInfo[0]['NomClient'];
        $firstName = $customerInfo[0]['PrenomClient'];
        $street = $customerInfo[0]['RueClient'];
        $city = $customerInfo[0]['VilleClient'];
        $postalCode = $customerInfo[0]['CPClient'];
        $phone = $customerInfo[0]['TelClient'];
        $point = $customerInfo[0]['PointClient'];

        $pw = $accountInfo[0]['password'];

        $data = array(
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
}