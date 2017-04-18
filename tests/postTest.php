<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of postTest
 *
 * @author jacquesm
 *
 * @backupGlobals disabled
 * @backupStaticAttributes disabled
 */
class PostTest extends PHPUnit_Framework_TestCase { //testingPgsql
    private $CI;
    
    public function setUp() {
        //global $active_group;
        //$active_group = 'testing';
        $this->CI = &get_instance();
        $this->CI->db->db_select('codeigniter_testing');
        //$this->CI->load->database('testing', TRUE);
    }

    public function testGetAllPosts() {
        $this->CI->load->model('post');
        $posts = $this->CI->post->getAll();
        $this->assertEquals(3, count($posts));
        
        $this->CI->load->model('postPgsql');
        $postsPgsql = $this->CI->postPgsql->getAll();
        $this->assertEquals(3, count($postsPgsql));
        
    }
}
