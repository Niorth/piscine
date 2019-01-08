<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search_Model extends CI_Model{

  /*
    SELECT CodeProduit,LibelleProduit,PrixProd,StockDispo,NomBoutique,c.NomCategorieProduit,ImgProd
    FROM boutique b
    inner join produit p on p.IdBoutique = b.IdBoutique
    inner join categorieproduit c on p.NumCategorieP = c.NumCategorieP
    where c.NomCategorieProduit = ?
  */
  public function getProductByCat($categorie){
    $this->load->database();
    return $this->db->select('CodeProduit,LibelleProduit,PrixProd,StockDispo,NomBoutique,c.NomCategorieProduit,ImgProd')
                  ->from('boutique b')
                  ->join('produit p', 'p.IdBoutique = b.IdBoutique')
                  ->join('categorieproduit c', 'on p.NumCategorieP = c.NumCategorieP')
                  ->where('c.NomCategorieProduit', $categorie)
                  ->get()
                  ->result();
  }

  /*
    SELECT CodeProduit,LibelleProduit,PrixProd,StockDispo,NomBoutique,ImgProd
    FROM boutique b
    inner join produit p on p.IdBoutique = b.IdBoutique
    where p.LibelleProduit LIKE '%Sony%'
    OR p.DescriptionProd LIKE '%Sony%'
  */
  public function getProductByChamp($champ){

    $sql = "SELECT CodeProduit,LibelleProduit,PrixProd,StockDispo,NomBoutique,ImgProd
    FROM boutique b
    inner join produit p on p.IdBoutique = b.IdBoutique
    where p.LibelleProduit LIKE ?
    OR p.DescriptionProd LIKE ?";
    $this->load->database();
    $query = $this->db->query($sql,array('%'.$champ.'%','%'.$champ.'%'));
    return $query->result();
  }

  /*
  SELECT CodeProduit,LibelleProduit,PrixProd,StockDispo,NomBoutique,c.NomCategorieProduit,ImgProd
    FROM boutique b
    inner join produit p on p.IdBoutique = b.IdBoutique
    inner join categorieproduit c on p.NumCategorieP = c.NumCategorieP
    where c.NomCategorieProduit = "high-tech"
    and (p.LibelleProduit LIKE '%Sony%'
    OR p.DescriptionProd LIKE '%Sony%')
  */
  public function getProductByChampandCat($cat,$champ){
    $sql = "SELECT CodeProduit,LibelleProduit,PrixProd,StockDispo,NomBoutique,c.NomCategorieProduit,ImgProd
      FROM boutique b
      inner join produit p on p.IdBoutique = b.IdBoutique
      inner join categorieproduit c on p.NumCategorieP = c.NumCategorieP
      where c.NomCategorieProduit = ?
      and (p.LibelleProduit LIKE ?
      OR p.DescriptionProd LIKE ?)";
    $this->load->database();
    $query = $this->db->query($sql,array($cat,'%'.$champ.'%','%'.$champ.'%'));
    return $query->result();

  }



}
