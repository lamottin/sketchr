<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {


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

		$this->load->view('category_add', $data);
	}
	
	public function add()
	{
		$data = array();
		$data[0] = $_POST['title'];
		$data[1] = $_POST['image'];
		
		//À l'avenir faudra faire le script pour l'upload d'image. Pour l'instant considéré comme juste du texte.
		//Vérifier les données...
		
		$this->category_model->addCategory($data);

		$data['categories'] = $this->category_model->listAll();
		$this->load->view('home', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>