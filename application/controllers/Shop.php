<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function index(){
		header('location:  ' . site_url("Shop/create_shop_page"));
	}

	public function create_shop_page(){
		$data['action'] = "create_shop";
		$this->load->view('layout/header');
		$this->load->view('shop/create_shop',$data);
		$this->load->view('layout/footer');
	}

	public function create_shop(){

		$shopId = $this->shop_model->getLastShopById();
		$id = ($shopId[0]->IdBoutique) + 1;

		$data = array(
							"IdBoutique" => $id,
							"NumSIRET" => htmlspecialchars($_POST['siret']),
							"NomBoutique" => htmlspecialchars($_POST['nom']),
							"RueBoutique" => htmlspecialchars($_POST['rue']),
							"VilleBoutique" => htmlspecialchars($_POST['ville']),
							"CPBoutique" => htmlspecialchars($_POST['cp']),
							"TelBoutique" => htmlspecialchars($_POST['tel']),
							"MailBoutique" => htmlspecialchars($_POST['mail']),
							"HorairesBoutique" => htmlspecialchars($_POST['horaire']),
			);

			$this->shop_model->insertShop($data);
			header('location:  ' . site_url("Shop/shop_card/$id"));
	}

	public function shop_card($id){
		$data['boutique'] =  $this->shop_model->selectShopById($id);
		$this->load->view('layout/header');
		$this->load->view('shop/shop_card', $data);
		$this->load->view('layout/footer');
	}

	public function modify_shop_page($id){
		$data['boutique'] =  $this->shop_model->selectShopById($id);
		$data['action'] = "edit_shop";
		$this->load->view('layout/header');
		$this->load->view('shop/create_shop',$data);
		$this->load->view('layout/footer');
	}

	public function edit_shop(){
		$data = array(
							"NumSIRET" => htmlspecialchars($_POST['siret']),
							"NomBoutique" => htmlspecialchars($_POST['nom']),
							"RueBoutique" => htmlspecialchars($_POST['rue']),
							"VilleBoutique" => htmlspecialchars($_POST['ville']),
							"CPBoutique" => htmlspecialchars($_POST['cp']),
							"TelBoutique" => htmlspecialchars($_POST['tel']),
							"MailBoutique" => htmlspecialchars($_POST['mail']),
							"HorairesBoutique" => htmlspecialchars($_POST['horaire']),
			);
		$id = htmlspecialchars($_POST['id']);
		$this->shop_model->updateShop($id, $data);
		header('location:  ' . site_url("Shop/shop_card/$id"));
	}
}
