<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_categories extends CI_Controller {

    public function index()
{
        $id = $this->uri->segment(2);
        $this->load->model('category_models');
          $this->load->model('post_models');
        $data['categories'] =$this->category_models->getAllCategories();
        $data['arrayCategory'] =$this->post_models->getPostById($id);
        $this->load->view('head_view');
        $this->load->view('menu_view', $data);
        $this->load->view('content/categories_view', $data);
        $this->load->view('footer_view');
    }
}