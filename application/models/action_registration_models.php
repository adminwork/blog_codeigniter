<?php
//session_start();

class Action_registration_models extends CI_Model
{
    public function insert($table, $arr)
    {
        $this->db->insert($table, $arr);
    }
    /**
     * Проверка на существование пользователя в БД
     */
    public function user_verify($login)
    {
        $this->db->where('username', $login);
        $query_check_user = $this->db->get('users');
        $userdata = $query_check_user->result_array();
        // Если пользователь с таким логином не найден
        if ($userdata[0]['username'] != $login){
            return true; // Пользователя нет, проверка пройдена
        }else{
            return false; // Пользователь существует
        }
    }
    /**
     * Функция верификации сессии (залогинен ли юзер?)
     */
    public function sess_verify()
    {
        $this->load->library('session');
        $check_auth = $this->session->userdata('logged_in');
        if ($check_auth != true) {
            header('Location: index.php?/сReg');
        }else return true;
    }
}


