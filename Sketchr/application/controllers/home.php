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

		$data['popular'] = $this->like_dislike_model->list_best_ratio();

		$this->show_view_with_hf('home', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */