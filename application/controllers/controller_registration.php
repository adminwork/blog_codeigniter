<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_registration extends CI_Controller {

    private $error;

    public function index()
    {
        $this->load->model('category_models');
        $data['categories'] =$this->category_models->getAllCategories();
        $this->load->view('head_view');
        $this->load->view('menu_view', $data);
        $this->load->view('content/registration_view', $data);
        $this->load->view('footer_view');
    }
    public function action_registration()
    {
        $success = true;
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $login = $this->input->post('username', true);
        $password = $this->input->post('pass');
        $pass_confirm = $this->input->post('pass_confirm');
        $age_user = $this->input->post('age_user');
        $email = $this->input->post('email');


        if($this -> $this->db->escape($password) != $this->db->escape($pass_confirm) {
            $this -> error .= "Passwords do not match.<a href='registracia.php''>Registrahion</a><br/> \n\r";
            $success = false;
        }

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
            header('Location: http://localhost/blog_codeigniter/index.php');
//                exit;
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

        $check_auth = $this->session->userdata('logged_in');
        if ($check_auth == true) {
            // Если авторизован
            echo 'You are log in';
        }
        else {
            // Если нет
            echo 'You are not log in';
        }
    }
}