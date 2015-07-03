<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_models extends CI_Model
{
    function Blogmodel()
    {
        parent::Model();
    }

    function getAllCategories()
    {
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    function getPostById($id)
    {
        $query = $this->db->get_where('post', array('category_id' => $id));
        return $query->result_array();
    }

    function getPostByCategoryId($id)
    {
        $query = $this->db->get_where('post', array('id' => $id));
        return $query->result_array();
    }

    function getLastFivePosts()
    {
        $query = $this->db->get('post', 5);
        return $query->result_array();
    }
}