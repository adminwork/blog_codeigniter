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
}