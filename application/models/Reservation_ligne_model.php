<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation_ligne_Model extends CI_Model{

  protected $table = 'lignereservation';

  /*

  SELECT NumLigneRes,DateReservation,StatusLigneRes,QteLigneRes,LibelleProduit,lr.IdBoutique, DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes
  FROM lignereservation lr inner join reservation r on lr.NumReservation = r.NumReservation
  inner join produit p on lr.CodeProduit = p.CodeProduit
  where lr.IdBoutique = ?
  and lr.StatusLigneRes = "traite"
  order by DateReservation asc
  */
  public function getResPrepared($id){
    return $this->db->select('NumLigneRes,DateReservation,StatusLigneRes,QteLigneRes,LibelleProduit,DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes')
                    ->from('lignereservation as lr')
                    ->join('reservation as r', 'lr.NumReservation = r.NumReservation')
                    ->join('produit as p', 'lr.CodeProduit = p.CodeProduit')
                    ->where('lr.IdBoutique', $id)
                    ->where('lr.StatusLigneRes', 'traite')
                    ->order_by('DateReservation', 'ASC')
                    ->get()
                    ->result();
  }

  /*
    Retourne les reservations non traitees et non expirees pour une boutique donnee

    SELECT NumLigneRes,DateReservation,StatusLigneRes,QteLigneRes,LibelleProduit,DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes
      FROM lignereservation lr
      inner join reservation r on lr.NumReservation = r.NumReservation
      inner join produit p on lr.CodeProduit = p.CodeProduit
      where lr.IdBoutique = ?
      and lr.StatusLigneRes = "non traite"
      and DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) >= CURRENT_TIMESTAMP()
      order by DateReservation asc
  */
  public function getResNotPrepared($id){
    return $this->db->select('NumLigneRes,DateReservation,StatusLigneRes,QteLigneRes,LibelleProduit,DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes')
                    ->from('lignereservation as lr')
                    ->join('reservation as r', 'lr.NumReservation = r.NumReservation')
                    ->join('produit as p', 'lr.CodeProduit = p.CodeProduit')
                    ->where('lr.IdBoutique', $id)
                    ->where('lr.StatusLigneRes', 'non traite')
                    ->where('DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) >=', date("Y-m-d H:i:s"))
                    ->order_by('DateReservation', 'ASC')
                    ->get()
                    ->result();
  }

  /*
  Retourne les reservations expirees pour une boutique donnee ( pre-condition : status = non traite)

  SELECT NumLigneRes,DateReservation,StatusLigneRes,QteLigneRes,LibelleProduit, DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes
    FROM lignereservation lr
    inner join reservation r on lr.NumReservation = r.NumReservation
    inner join produit p on lr.CodeProduit = p.CodeProduit
    where lr.IdBoutique = ?
    and lr.StatusLigneRes = "non traite"
    and DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) < CURRENT_TIMESTAMP()
    order by DateReservation asc
  */

  public function getResExpired($id){
    $this->load->database();
    return $this->db->select('NumLigneRes,DateReservation,StatusLigneRes,QteLigneRes,LibelleProduit,DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) as DateFinRes')
                    ->from('lignereservation as lr')
                    ->join('reservation as r', 'lr.NumReservation = r.NumReservation')
                    ->join('produit as p', 'lr.CodeProduit = p.CodeProduit')
                    ->where('lr.IdBoutique', $id)
                    ->where('lr.StatusLigneRes', 'non traite')
                    ->where('DATE_ADD(DateReservation, INTERVAL p.DureeReservation DAY) <', date("Y-m-d H:i:s"))
                    ->order_by('DateReservation', 'ASC')
                    ->get()
                    ->result();
  }
}

?>
