<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_registration extends CI_Controller
{

    public function index()
    {
        $data['title']='Registration form';
        $this->load->model('category_models');
        $data['categories'] = $this->category_models->getAllCategories();
        $this->load->view('head_view');
        $this->load->view('menu_view', $data);
        $this->load->view('content/registration_view', $data);
        $this->load->view('footer_view');
    }

    public function action_registration()
    {

        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');

                $first_name = $this->db->escape($this->input->post('first_name'));
                $last_name = $this->db->escape($this->input->post('last_name'));
                $login = $this->db->escape($this->input->post('username', TRUE));
                $pass = $this->db->escape($this->input->post('pass'));
                $pass_confirm = $this->db->escape($this->input->post('pass_confirm'));
                $age_user = $this->db->escape($this->input->post('age_user'));
                $email = $this->db->escape($this->input->post('email'));

                $create_at = date("y-m-d H:i:s");

            $this->form_validation->set_rules('first_name', 'First name', 'trim|required|min_length[1]|max_length[20]|xss_clean ');
            $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|min_length[1]|max_length[20]|xss_clean ');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean ');
            $this->form_validation->set_rules('pass', 'Пароль', 'required|matches[pass_confirm]|xss_clean ');
            $this->form_validation->set_rules('pass_confirm', 'Повтор пароля', 'required|xss_clean ');
            $this->form_validation->set_rules('age_user', 'age user', 'required|integer|min_length[1]|max_length[2]');
            $this->form_validation->set_rules('email', 'Почта', 'trim|required|valid_email|xss_clean ');

            if ($this->form_validation->run() == FALSE)
            {
                $data['title']='The data is not correct';
                $this->load->model('category_models');
                $data['categories'] = $this->category_models->getAllCategories();
                $this->load->view('head_view');
                $this->load->view('menu_view', $data);
                $this->load->view('content/registration_view', $data);
                $this->load->view('footer_view');
            }
            else
            {
                $this->load->model('action_registration_models','logic');

                if ($this->logic->user_verify($login)){
                    // Создаем массив с данными сессии и записываем нового пользователя в БД
                    $authdata = array(
                        'username' => $login,
                        'logged_in' => true
                    );

                    // Добавляем данные в сессию
                    $arr = array('id' => "",
                                'username' => $login,
                                'pass' => $pass,
                                'pass_confirm' => $pass_confirm,
                                'email' => $email,
                                'age_user' => $age_user,
                                'create_at' => $create_at,
                                'update_at' => "",
                                'first_name' => $first_name,
                                'last_name' => $last_name,
                                'avatar' => "");
                    $this->session->set_userdata($authdata);
                    $this->logic->insert('users',$arr);

//                    header('Location: http://localhost/blog_codeigniter/index.php');
                }

                else {
                    $data['title']='Username is busy';
                    $this->load->model('category_models');
                    $data['categories'] = $this->category_models->getAllCategories();
                    $this->load->view('head_view');
                    $this->load->view('menu_view', $data);
                    $this->load->view('content/registration_view', $data);
                    $this->load->view('footer_view');
                }
            }
        }


        public function ok()
    {
        $this->load->model('Action_registration_models','logic');
        if($this->logic->sess_verify()){
            $data['title']='Hello '.$this->session->userdata('username');
            $this->load->view('head_view');
            $this->load->view('menu_view', $data);
            $this->load->view('content/main_view', $data);
            $this->load->view('footer_view');
        }
    }

}