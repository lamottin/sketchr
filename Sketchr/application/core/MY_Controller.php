<?php
class  MY_Controller  extends  CI_Controller  {

	private $user_session;

    function __construct()  {
        parent::__construct();
		//  Chargement des ressources pour tout les contrôleurs
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->library('session');
		$this->load->model('category_model');
		$this->load->model('sketch_type_model');	
		$this->load->model('sketch_model');		
		$this->load->model('humorist_model');	

		$this->user_session = $this->session->all_userdata();
    }

    /**
     * Function used to show a view loading by default the header with the dynamic menu and
     * the footer
     * @param  [type] $view_name The name of the view to load
     * @param  [type] $data The array containing lots of data (duh)
     */
	function show_view_with_hf($view_name, $data) {
		$data['user_session'] = $this->get_user_session();
		$data['categories'] = $this->category_model->listAll();
		$data['menu'] = $this->load->view('hf/menu', $data, TRUE); // load your menu data from the db
		$this->load->view('hf/header', $data); // display your header by giving it the menu
		$this->load->view($view_name, $data); // the actual view you wanna load
		$this->load->view('hf/footer'); // footer, if you have one
	}

	protected function get_user_session() {
		return (isset($this->user_session)) ? $this->user_session : "null";
	}

}