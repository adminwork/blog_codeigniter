<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_main extends CI_Controller {

    public function index()
    {
        $this->load->model('category_models');
        $this->load->model('post_models');
        $data['categories'] =$this->category_models->getAllCategories();
        $data['posts'] =$this->post_models->getLastFivePosts();
        $this->load->view('head_view');
        $this->load->view('menu_view', $data);
        $this->load->view('content/main_view', $data);
        $this->load->view('footer_view');
    }
}