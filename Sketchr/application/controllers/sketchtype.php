<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketchtype extends CI_Controller {


	public function __construct() {
		
		parent::__construct();

		//  Chargement des ressources pour tout le contrôleur
		$this->load->database();
		$this->load->helper(array('url'));
		$this->load->model('sketch_type_model');
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

		$this->load->view('sketch_type_add', $data);
	}
	
	public function add()
	{
		$data = array();
		
		$this->sketch_type_model->add();

		$data['categories'] = $this->category_model->listAll();
		
		$st = $this->sketch_type_model->lastAdded();
		
		$id = $st[0]->id;
		
		$data['sketch_type_category'] = $this->category_model->getById($id);
		
		$data['posted'] = $st[0];
		
		$this->load->view('sketch_type_modify', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */