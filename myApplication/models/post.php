<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of post
 *
 * @author jacquesm
 */
// application/models/post.php
class Post extends CI_Model {

    /*public function getAll() {
        return array(
                array('title'=>'post 1','content'=>'...'),
                array('title'=>'post 2','content'=>'...'),
                array('title'=>'post 3','content'=>'...'),
                array('title'=>'post 4','content'=>'...'),
                array('title'=>'post 5','content'=>'...'),
        );
    }*/
    public function getAll() {
        $query = $this->db->get('posts');
        $posts = array();

        foreach ($query->result_array() as $row) {
                $posts[] = $row;
        }

        return $posts;
    }
}
