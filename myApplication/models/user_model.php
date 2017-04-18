<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user_model
 *
 * @author jacquesm
 */
class User_model extends MY_Model {
    //put your code here
    protected $table = 'users';
    private $datab;
    
    public function __construct() {
        parent::__construct();
        //$this->db->db_select('codeigniter_testing');
        $this->datab = $this->load->database('testing', TRUE);
    }
    
    public function count($champ = array(), $valeur = null) { // Si $champ est un array, la variable $valeur sera ignorée par la méthode where()
   
        return (int) $this->datab->where($champ, $valeur)
                              ->from($this->table)
                              ->count_all_results();
    }
    
    public function create($options_echappees = array(), $options_non_echappees = array()) {
        //	Vérification des données à insérer
        if(empty($options_echappees) AND empty($options_non_echappees)) {
                return false;
        }

        return (bool) $this->datab->set($options_echappees)
                               ->set($options_non_echappees, null, false)
                               ->insert($this->table);
    }
    
    public function update($where = 0, $options_echappees = array(), $options_non_echappees = array()) {		
	//	Vérification des données à mettre à jour
	if(empty($options_echappees) AND empty($options_non_echappees)) {
		return false;
	}
	
	//	Raccourci dans le cas où on sélectionne l'id
	if(is_integer($where)) {
		$where = array('id' => $where);
	}

	return (bool) $this->datab->set($options_echappees)
                               ->set($options_non_echappees, null, false)
                               ->where($where)
                               ->update($this->table);

    }
    
    public function delete($where = 0) {
	if(is_integer($where)) {
		$where = array('id' => $where);
	}
	
	return (bool) $this->datab->where($where)
                               ->delete($this->table);
    }
    
    public function read($select = '*', $where = array(), $nb = null, $debut = null) {
	return $this->datab->select($select)
                        ->from($this->table)
                        ->where($where)
                        ->limit($nb, $debut)
                        ->get()
                        ->result();
    }
}
