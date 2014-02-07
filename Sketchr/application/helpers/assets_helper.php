<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');


//retourne l'url d'un asset

if ( ! function_exists('css_url')){
	function css_url($nom){
		return base_url() . 'assets/css/' . $nom . '.css';
	}
}

if ( ! function_exists('js_url')){
	function js_url($nom){
		return base_url() . 'assets/javascript/' . $nom . '.js';
	}
}

if ( ! function_exists('img_url')){
	function img_url($nom){
		return base_url() . 'assets/img/' . $nom;
	}
}

if ( ! function_exists('gallery_url')){
	function gallery_url($nom){
		return base_url() . 'assets/img/gallery/' . $nom;
	}
}




// écrit directement en html dans un document

if ( ! function_exists('include_css')){
	function include_css($my_css){
		echo '<link rel="stylesheet" href="'. base_url() . 'assets/css/' . $my_css . '.css" />';
	}
}
if ( ! function_exists('include_js')){
	function include_js($my_script){
		echo '<script src="' . base_url() . 'assets/javascript/' . $my_script . '.js" type="text/javascript"></script>';
	}
}
if ( ! function_exists('include_img')){
	function include_img($my_img, $alt_text){
		echo '<img src="' . base_url() . 'assets/img/' . $my_img . '" alt="' . $alt_text .'" />';
	}
}
	
	
?>