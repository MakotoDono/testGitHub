<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of metier_accepte
 *
 * @author jacquesm
 */
class Metier_accepte extends CI_Model {
    //put your code here
    private $magasins_acess;
    private $expansion_access;
    
    private $id_user;
    private $id_client;
    private $codePays;
    private $codePays2;
    private $id;
    
    private $hasAResult;
    
    public function __construct() {
        parent::__construct();
        //$this->setData($idToCheck);
    }
    
    public function setData($idToCheck) {
        $tmpData = $this->db->select('id_user, id_client, codePays, codePays2, id, magasins, expansion')
                            ->from('metier_accepte')
                            ->where('id', $idToCheck)
                            ->get()
                            ->result();
        
        if (empty($tmpData)) {
            $this->hasAResult = FALSE;
        } else {
        
            $this->hasAResult = TRUE;
            
            foreach ($tmpData as $resul) {
                $this->id_user = $resul->id_user;
                $this->id_client = $resul->id_client;
                $this->codePays = $resul->codePays;
                $this->codePays2 = $resul->codePays2;
                $this->id = $resul->id;
                $this->magasins_acess = $resul->magasins;
                $this->expansion_access = $resul->expansion;
            }
        }
    }
    
    public function getId_client() {
        return $this->id_client;
    }

    public function getCodePays() {
        return $this->codePays;
    }
    
    public function getCodePays2() {
        return $this->codePays2;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function getId_User() {
        return $this->id_user;
    }
    
    public function canMagasinAcces() {
        return ($this->magasins_acess == 1);
    }
    
    public function canExpansionAccess() {
        return ($this->expansion_access == 1);
    }
    
    public function hasAResult() {
        return $this->hasAResult;
    }
}
