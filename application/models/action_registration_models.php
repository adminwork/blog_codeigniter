<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action_registration_models extends CI_Model
{
    public function insert($table, $arr)
    {
        $this->db->insert($table, $arr);
    }

    public function user_verify($login)
    {
        $query_check_user = $this->db->query("SELECT * FROM users WHERE username = ".$login."");
        $userdata = $query_check_user->row_array();
        var_dump($login);
        var_dump($userdata['username']);
        if ($userdata['username'] !== $login){
            return true; // Пользователя нет, проверка пройдена
        }else{
            return false; // Пользователь существует
        }
    }

    public function sess_verify()
    {
        $this->load->library('session');
        $check_auth = $this->session->userdata('logged_in');
        if ($check_auth != true) {
            header('Location: index.php?/сReg');
        }else return true;
    }
}


