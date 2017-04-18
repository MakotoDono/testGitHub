<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author jacquesm
 */
class Test extends CI_Controller {
    public function __construct() {
            parent::__construct();

            //	« Décommenter » cette ligne pour charger le helper url (sauf si le helper est déjà dans l'autoload)
            //$this->load->helper('url');
            
            //pour charger une bibliothèque : $this->load->library('alphabet');
    }

    public function index() {
        $this->output->enable_profiler(TRUE);
        //redirect(array('home', 'maintenance'));
        /*$this->load->model('postPgsql');
        $ligne = $this->postPgsql->getAll();
        var_dump($ligne);*/
    }
    
    public function testDataBase() {
        $this->load->model('user_model', 'userManager');
        $nb_membres = $this->userManager->count();
        
        $nb_messages = $this->userManager->count('pseudo', 'Arthur');
        
        $option = array();
        $option['titre']  = 'Mon Super Titre';
        $option['auteur'] = 'Arthur';
        $nb_messages_deux = $this->userManager->count($option);
        
        
        $data['nb_membres'] = $nb_membres;
        $data['nb_messages'] = $nb_messages;
        $data['nb_messages_deux'] = $nb_messages_deux;
        
        $this->load->view('test/userTest', $data);
    }
    
    public function accueil() {
            //	On inclut la vue ./application/views/test/accueil.php
            $this->load->view('test/accueil');
    }
}
