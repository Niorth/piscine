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
}