<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('like_dislike_model');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at base_url root
	 */
	public function index() {
		$data = array();
		$data['popular'] = array();

		$popularld = $this->like_dislike_model->list_best_ratio();
		
		foreach($popularld as $popularsketch)
		{
			array_push($data['popular'], $this->sketch_model->getById($popularsketch->sketch));
		}
		
		$this->show_view_with_hf('home', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */