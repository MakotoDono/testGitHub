<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of forum
 *
 * @author jacquesm
 */
class Forum extends CI_Controller {
    //put your code here
    
    private $titre_defaut;
    
    
    public function __construct() {
        //Obligatoire
        parent::__construct();
        $this->titre_defaut = 'Mon super site';
        echo 'Bonjour !';
    }
    
    public function index() {
        $this->accueil();
    }
    
    public function accueil() {
        //var_dump($this->titre_defaut);
        echo $this->titre_defaut;
    }
    
    public function bonjour($pseudo = '') {
        echo 'Salut à toi : ' . $pseudo;
    }

    public function manger($plat = '', $boisson = '') {
        echo 'Voici votre menu : <br />';
        echo $plat . '<br />';
        echo $boisson . '<br />';
        echo 'Bon appétit !';
    }
    
    //	L'affichage de la variable $output est le comportement par défaut.
    public function _output($output){
	var_dump($output);
    }
    
}
