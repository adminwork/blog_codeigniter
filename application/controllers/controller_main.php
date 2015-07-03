<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_main extends CI_Controller {

    public function index()
    {
        $this->load->model('category_models');
        $data['categories'] =$this->category_models->getAllCategories();
        $data['posts'] =$this->category_models->getLastFivePosts();
        $this->load->view('head');
        $this->load->view('main_view', $data);
        $this->load->view('footer');
    }
}