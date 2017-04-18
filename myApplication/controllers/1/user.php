<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author jacquesm
 */
class User  extends CI_Controller {
    //put your code here
    
    public function accueil() {
        //	Chargement du modèle de gestion des news
        //$this->load->model('news_model');
        //	Nous l'appellerons newsManager
	$this->load->model('news_model', 'newsManager');
        
        
        $resultat = $this->newsManager->ajouter_news('Arthur',
						     'Un super titre',
						     'Un super contenu !');
        
        
        $data = array();

        //	On lance une requête
        //$data['user_info'] = $this->news_model->get_info();
        $data['user_info'] = $this->newsManager->get_info();
        $data['var_dump'] = $resultat;
        
        $data['nb_news'] = $this->newsManager->count();
	$data['nb_news_de_bob'] = $this->newsManager->count(array('auteur' => 'Bob'));
        
        $data['resultat'] = $this->newsManager->liste_news(15, 0);

        //	On inclut une vue
        //$this->layout->view('test/ma_vue', $data);
        $this->load->view('test/ma_vue', $data);
    }
}
