<?php

class Post_models extends CI_Model
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

    function getLastFivePosts()
    {
        $query = $this->db->get('post', 5);
        return $query->result_array();
    }
}


