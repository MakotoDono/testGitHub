<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of news
 *
 * @author jacquesm
 */
class News extends CI_Controller {
    
    private $session_id;
    private $adresse_ip;
    private $user_agent_du_navigateur;
    private $derniere_visite;
    private $pseudo;
    
    public function __construct() {
        parent::__construct();
        $this->pseudo = 'News';
        
        $this->session_id = $this->session->userdata('session_id');
        $this->adresse_ip               = $this->session->userdata('ip_address');
        $this->user_agent_du_navigateur = $this->session->userdata('user_agent');
        $this->derniere_visite          = $this->session->userdata('last_activity');
        $this->session->set_userdata('pseudo', $this->pseudo);
    }

    public function index() {
        $this->accueil();
    }
    
    public function deconnexion() {
        $this->session->unset_userdata(array('pseudo' => ''));
        $this->session->sess_destroy();
        redirect('forum/bonjour/Jacques');
    }
    

    private function accueil() {
        
        $data = array();
        $data['pseudo'] = 'Arthur';
        $data['email'] = 'email@ndd.fr';
        $data['en_ligne'] = true;
        $data['session_id'] = $this->session_id;
        $data['adresse_ip'] = $this->adresse_ip;
        $data['user_agent_du_navigateur'] = $this->user_agent_du_navigateur;
        $data['derniere_visite'] = $this->derniere_visite;
        $data['pseudo'] = $this->session->userdata('pseudo');
        
        $this->load->view('news/vue', $data); /*$vue = $this->load->view('vue', $data, true); //retourne le contenu de la vue sans l'afficher.*/
    }
}
