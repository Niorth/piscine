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
  Retourne les reservations pour un client

  SELECT distinct(r.NumReservation),DateReservation,StatusRes,p.idBoutique,QteReserver,MontantRes,
  p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit,b.idBoutique,NomBoutique,RueBoutique,VilleBoutique,CPBoutique,TelBoutique,
    FROM reservation r
    inner join reserver rver on rver.NumReservation = r.NumReservation
    inner join produit p on rver.CodeProduit = p.CodeProduit
    inner join boutique b on b.IdBoutique = p.IdBoutique
    where r.NumClient = ?
    and StatusRes = "traite"
  */
  public function getReservationDetailClient($numClient,$status){
    $this->load->database();
    return $this->db->select('distinct(r.NumReservation),DateReservation,StatusRes,p.idBoutique,QteReserver,MontantRes,
                        p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit,b.idBoutique,NomBoutique,RueBoutique,VilleBoutique,CPBoutique,TelBoutique,')
                    ->from('reservation as r')
                    ->join('reserver as rver', 'rver.NumReservation = r.NumReservation')
                    ->join('produit as p', 'rver.CodeProduit = p.CodeProduit')
                    ->join('boutique b', 'b.IdBoutique = p.IdBoutique')
                    ->where('r.NumClient', $numClient)
                    ->where('StatusRes', $status)
                    ->get()
                    ->result();
  }
  /*
    Retourne les reservations non traitees et non expirees pour un client

    SELECT distinct(r.NumReservation),DateReservation,StatusRes,p.idBoutique,QteReserver,MontantRes, p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit,
    b.idBoutique,NomBoutique,RueBoutique,VilleBoutique,CPBoutique,TelBoutique,
    DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes
    FROM reservation r
    inner join reserver rver on rver.NumReservation = r.NumReservation
    inner join produit p on rver.CodeProduit = p.CodeProduit
    inner join boutique b on b.IdBoutique = p.IdBoutique
    where r.NumClient = 22 and StatusRes = "non traite"
    and DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) >= CURRENT_TIMESTAMP()
  */
  public function getReservationEncoursDetailClient($numClient){
    $this->load->database();
    return $this->db->select('distinct(r.NumReservation),DateReservation,StatusRes,p.idBoutique,QteReserver,MontantRes, p.LibelleProduit,p.ImgProd,p.PrixProd,p.CodeProduit,
                          b.idBoutique,NomBoutique,RueBoutique,VilleBoutique,CPBoutique,TelBoutique,
                          DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes')
                    ->from('reservation as r')
                    ->join('reserver as rver', 'rver.NumReservation = r.NumReservation')
                    ->join('produit as p', 'rver.CodeProduit = p.CodeProduit')
                    ->join('boutique b', 'b.IdBoutique = p.IdBoutique')
                    ->where('r.NumClient', $numClient)
                    ->where('StatusRes', "non traite")
                    ->where('DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) >=', date("Y-m-d H:i:s"))
                    ->get()
                    ->result();

  }
}

?>
