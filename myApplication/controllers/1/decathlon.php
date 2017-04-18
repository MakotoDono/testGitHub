<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of decathlon
 *
 * @author jacquesm
 */
class Decathlon extends CI_Controller {

    //put your code here
    //private $user;
    //private $metier;
    private $attrs;
    private $verifFR;
    
    private $data;
    private $errorType;

    public function __construct() {
        parent::__construct();
        $this->attrs['site'][0] = 'F001'; //'F1409'; //'F990';
        $this->attrs['uid'][0] = 'ALAGAC27';
        $this->attrs['sitename'][0] = 'FRANCE';
        $this->attrs['c'][0] = 'FR';
        $this->attrs['subsidiary'][0] = 'd1';
        $this->attrs['jobName'][0] = 'RSP.PAYS'; //'CTL.FIN.REG';//'CHF.PRO.SI';*/
        $this->verifFR = FALSE;
        $this->errorType = array();
    }

    public function index() {
        if (!$this->accessUser($this->attrs['uid'][0])) {
            if ($this->accessMetier()) {
                $this->load->view('1/dkt_index', $this->data);
            } else {
                $this->load->view('1/dkt_error', $this->errorType);
            }
        } else {
            $this->load->view('1/dkt_index', $this->data);
        }
    }

    private function accessUser() {
        $this->load->model('1/metier_accepte', 'user');
        $this->user->setData($this->attrs['uid'][0]);

        $this->data = array();
        if ($this->user->hasAResult()) {
            $this->data['id_client'] = $this->user->getId_client();
            $this->data['id_user'] = $this->user->getId_user();
            $this->data['pays2'] = $this->user->getCodePays2();
            $this->²data['id_dkt'] = $this->attrs['uid'][0];

            switch ($this->data['id_client']) {
                case 2 :
                    $this->verifFR = ($this->data['pays2'] == 'SUISSE' && $this->user->canMagasinAcces() && $this->user->canExpansionAccess());
                    break;
                case 3 :
                    $this->verifFR = ($this->data['pays2'] == 'Canada' && $this->user->canMagasinAcces() && $this->user->canExpansionAccess());
                    break;
                default :
                    $this->verifFR = FALSE;
                    break;
            }
            $this->data['id_client'] = 1;
            return $this->verifFR;
        } else {
            return FALSE;
        }
    }
    
    private function accessMetier() {
        $this->load->model('1/metier_accepte', 'metier');
        $this->metier->setData($this->attrs['jobName'][0]);

        $this->data = array();
        if ($this->metier->hasAResult()) {
            $this->data['id_client'] = $this->metier->getId_client();
            
            $this->data['pays2'] = $this->metier->getCodePays2();
            $this->²data['id_dkt'] = $this->attrs['uid'][0];

            if (!$this->metier->canExpansionAccess()) {
                if (!$this->metier->canMagasinAcces()) {
                    $this->verifFR = FALSE;
                    $this->errorType['error'] = 'Ton profil ne te donne pas accès à l\'application pour le moment.<BR /><BR />Pour l\'outil France:<BR /><BR />Tu peux contacter Jérémy en indiquant ton intitulé métier et ton besoin géomarketing.<BR />jeremy.gryszata@decathlon.com<BR /><BR />Pour l\'outil Suisse:<BR /><BR />Tu peux contacter Adrien en indiquant ton identifiant décathlon et ton besoin géomarketing.<BR />adrien.lagache@decathlon.com';
                } else {
                    $this->verifFR = TRUE;
                    $this->data['id_user'] = 0;
                }
            } else {
                $this->verifFR = TRUE;
                $this->data['id_user'] = $this->metier->getId_user();
            }
            return $this->verifFR;
        } else {
            $this->errorType['error'] = 'Vous n\'êtes pas autoriser à accéder à ce site.';
            return FALSE;
        }
    }

}
