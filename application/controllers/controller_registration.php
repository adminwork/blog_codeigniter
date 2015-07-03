<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_registration extends CI_Controller {

    public function index()
    {
        $this->load->model('category_models');
        $data['categories'] =$this->category_models->getAllCategories();
        $this->load->view('head_view');
        $this->load->view('menu_view', $data);
        $this->load->view('content/registration_view', $data);
        $this->load->view('footer_view');
    }
}