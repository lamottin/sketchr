<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {


	public function __construct() {
		parent::__construct();
	}


	public function index() {
		$data = array();
		$this->show_view_with_hf('home', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */