<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author jacquesm
 */
class Home extends CI_Controller
{
	public function accueil()
	{
		echo 'Bonjour';
	}
	
	public function maintenance()
	{
		echo "Désolé, c'est la maintenance.";
	}
	
	public function _remap($method)
	{
		$this->maintenance();
	}
}
