<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connect
 *
 * @author jacquesm
 */
class Connect extends CI_Controller {
    //put your code here
    
    private $pseudo;
    private $mdp;
    
    
    public function index() {
        $this->connexion();
        $this->output->enable_profiler(true);
    }
    
    private function connexion() {
        
        $this->load->helper('form');
        
        
	//	Chargement de la bibliothèque
	$this->load->library('form_validation');
        
        $this->form_validation->set_rules('pseudo', '"Nom d\'utilisateur"', 'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags'); //|xss_clean
	$this->form_validation->set_rules('mdp',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags'); //|xss_clean
	
        $this->pseudo = $this->input->post('pseudo');
        $this->mdp    = $this->input->post('mdp');
        
        
	if($this->form_validation->run()) {
            //	Le formulaire est valide
            $this->load->view('formulaire/connexion_reussi');
	}
	else
	{
            
            $data['pseudo'] = $this->pseudo;
            $data['mdp']    = $this->mdp;
            //	Le formulaire est invalide ou vide
            $this->load->view('formulaire/connexion', $data);
	}
    }
}
