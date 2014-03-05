<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct() {
		
		parent::__construct();

		//  Chargement des ressources pour tout le contrôleur
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model('category_model');
	}


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array();

		$data['categories'] = $this->category_model->listAll();

		$this->load->view('home', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */