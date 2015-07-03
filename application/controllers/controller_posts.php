<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller_posts extends CI_Controller {

    public function index()
{
        $id = $this->uri->segment(3);
        $this->load->model('category_models');
         $this->load->model('post_models');
        $data['categories'] =$this->category_models->getAllCategories();
        $data['post'] =$this->post_models->getPostByCategoryId($id);
        $this->load->view('head_view');
        $this->load->view('menu_view', $data);
        $this->load->view('content/posts_view', $data);
        $this->load->view('footer_view');
    }
}