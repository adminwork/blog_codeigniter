<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_categories extends CI_Controller {

    public function index()
{
        $id = $this->uri->segment(2);
        $this->load->model('category_models');
        $data['categories'] =$this->category_models->getAllCategories();
        $data['arrayCategory'] =$this->category_models->getPostById($id);
        $this->load->view('head');
        $this->load->view('categories_view', $data);
        $this->load->view('footer');
    }
}