<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 31/10/2018
 * Time: 19:10
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Model extends CI_Model
{

    protected $table = 'compte';

    public function getAccountByMail($mail){
        $this->load->database();
        $query = $this->db->get_where($this->table, array('login' => $mail));

        $result = false;
        if ($query -> num_rows() > 0){
            $result = $query -> result_array();
        }
        return $result;
    }

    public function insertAccount($data)
    {
        $this->load->database();
        return $this->db->set('login', $data['MailClient'])
            ->set('password', $data['password'])
            ->set('privilege', $data['privilege'])
            ->insert($this->table);
    }
    /*
    select IdBoutique
    from commercant c
    inner join gererboutique gb on gb.NumCommercant=c.NumCommercant
    where c.MailCommercant = "test@gmail.com"
    order by gb.idBoutique DESC
    limit 1
    */
    public function getIdboutiqueByLogin($login){
      $this->load->database();
      return $this->db->select('gb.IdBoutique,gb.NumCommercant')
                    ->from('commercant c')
                    ->join('gererboutique gb', 'gb.NumCommercant=c.NumCommercant')
                    ->where('c.MailCommercant', $login)
                    ->order_by('gb.idBoutique', 'desc')
                    ->limit(1)
                    ->get()
                    ->result();
    }
}
