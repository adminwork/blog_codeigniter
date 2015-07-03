<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_posts extends CI_Controller {

    public function index()
{
        $id = $this->uri->segment(3);
        $this->load->model('category_models');
        $data['categories'] =$this->category_models->getAllCategories();
        $data['post'] =$this->category_models->getPostByCategoryId($id);
        $this->load->view('head');
        $this->load->view('posts_view', $data);
        $this->load->view('footer');
    }
}