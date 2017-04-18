<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * $this->load->helper('assets');
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url')) {
    function css_url($nom) {
            return base_url() . 'assets/css/' . $nom . '.css';
    }
}

if ( ! function_exists('js_url')) {
    function js_url($nom) {
            return base_url() . 'assets/javacript/' . $nom . '.js';
    }
}

if ( ! function_exists('img_url')) {
    function img_url($nom) {
            return base_url() . 'assets/images/' . $nom;
    }
}

if ( ! function_exists('img')) {
    function img($nom, $alt = '') {
            return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
    }
}
