<?php
class  MY_Controller  extends  CI_Controller  {

    function __construct()  {
        parent::__construct();
		//  Chargement des ressources pour tout les contrôleurs
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model('category_model');
		$this->load->model('sketch_type_model');	
		$this->load->model('sketch_model');		
    }

    /**
     * Function used to show a view loading by default the header with the dynamic menu and
     * the footer
     * @param  [type] $view_name The name of the view to load
     * @param  [type] $data The array containing lots of data (duh)
     */
	function show_view_with_hf($view_name, $data) {
		$data['categories'] = $this->category_model->listAll();
		$data['menu'] = $this->load->view('hf/menu', $data, TRUE); // load your menu data from the db
		$this->load->view('hf/header', $data); // display your header by giving it the menu
		$this->load->view($view_name, $data); // the actual view you wanna load
		$this->load->view('hf/footer'); // footer, if you have one
	}

}