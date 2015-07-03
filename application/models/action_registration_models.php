<?php
session_start();

class Action_login_models extends CI_Model
{
    function Blogmodel()
    {
        parent::Model();
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


