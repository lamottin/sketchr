<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketch extends MY_Controller {


	public function __construct() {

		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL :
	 * - base_url()/sketch/
	 */
	public function index() {

	}

	/**
	 * Maps to the following URL :
	 * - base_url()/sketch/access_sketch_by_id
	 *
	 * Since this function is set as the route for category/(:num) in
	 * config/routes.php, it maps to the following URL too :
	 * - base_url()/watch/(:num)
	 */
	public function access_sketch_by_id(){
		$data = array();

		// Get the sketch object from the model
		$data['sketch'] = $this->sketch_model->getById($this->uri->segment(2));
		// WHAT TO DO IF IT RETURNS NULL? HAVE TO IMPLEMENT THAT !!!!

		// Get the humorist object from the model
		$data['sketch_type'] = $this->sketch_type_model->getById($data['sketch']->sketch_type );
		print_r($data['sketch_type']);

		$this->show_view_with_hf('sketch_sheet', $data);
	}
}
/* End of file sketch.php */
/* Location: ./application/controllers/sketch.php */
?>