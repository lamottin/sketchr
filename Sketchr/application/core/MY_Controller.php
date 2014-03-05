<?php
class  MY_Controller  extends  CI_Controller  {

    function __construct()  {
        parent::__construct();
		//  Chargement des ressources pour tout le contrôleur
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model('category_model');			
    }

	function show_view_with_hf($view_name, $data) {
		$data['categories'] = $this->category_model->listAll();
		$data['menu'] = $this->load->view('hf/menu', $data, TRUE); // load your menu data from the db
		$this->load->view('hf/header', $data); // display your header by giving it the menu
		$this->load->view($view_name, $data); // the actual view you wanna load
		$this->load->view('hf/footer'); // footer, if you have one
	}

}