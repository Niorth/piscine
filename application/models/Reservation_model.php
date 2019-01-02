<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation_Model extends CI_Model{

  protected $table = 'reservation';

  /*
    Retourne le detail d'une reservation donne pour le commercant

    SELECT NumLigneRes,r.NumReservation,DateReservation,StatusLigneRes,QteLigneRes,lr.idBoutique,
    p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit
    cl.NomClient,cl.PrenomClient,cl.RueClient,cl.VilleClient,cl.CPClient,cl.TelClient,
    DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes
    FROM lignereservation lr
    inner join reservation r on lr.NumReservation = r.NumReservation
    inner join produit p on lr.CodeProduit = p.CodeProduit
    inner join client cl on r.NumClient = cl.NumClient
    where lr.NumLigneRes = ?
    and lr.NumReservation = ?
  */
  public function getReservationDetailSeller($numLigne,$numRes){
    $this->load->database();
    return $this->db->select('NumLigneRes,r.NumReservation,DateReservation,StatusLigneRes,QteLigneRes,lr.idBoutique,
                              p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit,cl.NomClient,cl.PrenomClient,cl.RueClient,cl.VilleClient,cl.CPClient,cl.TelClient,
                              DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes')
                    ->from('lignereservation as lr')
                    ->join('reservation as r', 'lr.NumReservation = r.NumReservation')
                    ->join('produit as p', 'lr.CodeProduit = p.CodeProduit')
                    ->join('client as cl', 'r.NumClient = cl.NumClient')
                    ->where('lr.NumLigneRes', $numLigne)
                    ->where('lr.NumReservation', $numRes)
                    ->get()
                    ->result();
  }

  /*
  Retourne le detail des reservations d'un client donnee

  SELECT distinct(r.NumReservation),DateReservation,lr.idBoutique,QteReserver,MontantRes
    p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit,NomBoutique,
    DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes
    FROM lignereservation lr
    inner join reservation r on lr.NumReservation = r.NumReservation
    inner join produit p on lr.CodeProduit = p.CodeProduit
	  inner join reserver rver on rver.NumReservation = r.NumReservation
    inner join boutique b on b.IdBoutique = p.IdBoutique
    where r.NumClient = ?
  */
  public function getReservationDetailClient($numClient){
    $this->load->database();
    return $this->db->select('distinct(r.NumReservation),DateReservation,lr.idBoutique,QteReserver,MontantRes,
                              p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit,NomBoutique,
                              DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes')
                    ->from('lignereservation as lr')
                    ->join('reservation as r', 'lr.NumReservation = r.NumReservation')
                    ->join('produit as p', 'lr.CodeProduit = p.CodeProduit')
                    ->join('reserver as rver', 'rver.NumReservation = r.NumReservation')
                    ->join('boutique b', 'b.IdBoutique = p.IdBoutique')
                    ->where('r.NumClient', $numClient)
                    ->get()
                    ->result();
  }
}

?>
