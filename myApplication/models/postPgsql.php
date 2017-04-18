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
class PostPgsql extends CI_Model {

    private $pgsql;
    
    public function __construct() {
        parent::__construct();
        $this->pgsql = $this->load->database('testingPgsql', TRUE);
    }
    
    public function getAll() {
        $query = $this->pgsql->get('posts');
        $posts = array();

        foreach ($query->result_array() as $row) {
                $posts[] = $row;
        }

        return $posts;
    }
}
