<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_login extends CI_Controller {

    public function index()
    {
        $this->load->model('category_models');
        $data['categories'] =$this->category_models->getAllCategories();
        $this->load->view('head_view');
        $this->load->view('menu_view', $data);
        $this->load->view('content/login_view', $data);
        $this->load->view('footer_view');
    }

        public function action_login()
    {
        $this->load->library('session');
//        $this->load->library('database');
        $login = $this->input->post('username', true);
        $password = $this->input->post('pass');

        $query_check_user = $this->db->query("SELECT * FROM users WHERE username = ".$this->db->escape($login)."and pass = ".$this->db->escape($password)."");
        $userdata = $query_check_user->row_array();

    // Если пользователь найден
            if (@$userdata['username'] == $login and @$userdata['pass'] == $password) {

    // Создаем массим с данными сессии
                $authdata = array(
                    'username' => $login,
                    'logged_in' => true
                );

    // Добавляем данные в сессию
                $this->session->set_userdata($authdata);

    // Редиректим на нужную нам страницу
                header('http://localhost/blog_codeigniter/index.php');
            }

    // Если нет то выводим форму авторизации
            else {
                $this->load->model('category_models');
                $data['categories'] =$this->category_models->getAllCategories();
                $this->load->view('head_view');
                $this->load->view('menu_view', $data);
                $this->load->view('content/login_view', $data);
                $this->load->view('footer_view');
            }
    }
}

