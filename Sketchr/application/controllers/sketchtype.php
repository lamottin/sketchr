<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketchtype extends MY_Controller {


	public function __construct() {
		
		parent::__construct();		
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL :
	 * - base_url()/sketchtype/
	 */
	public function index()
	{
		$data = array();
		$this->show_view_with_hf('sketch_type_add', $data);
	}

	/**
	 * Maps to the following URL :
	 * - base_url()/sketchtype/access_sketchtype_by_id
	 *
	 * Since this function is set as the route for serie/(:num) in
	 * config/routes.php, it maps to the following URL too :
	 * - base_url()/serie/(:num)
	 */
	public function access_sketchtype_by_id(){
		$data = array();

		// Get the category object which we are trying to access from the model
		$data['sketch_type'] = $this->sketch_type_model->getById($this->uri->segment(2));
		// WHAT TO DO IF IT RETURNS NULL? HAVE TO IMPLEMENT THAT !!!!

		// Get the list of sketch_types for this category
		$data['sketchs'] = $this->sketch_model->listBySketchTypeId($data['sketch_type']->id);

		$this->show_view_with_hf('sketch_type_sheet', $data);
	}
	
	/**
	 * Get the data sent by _POST from the form used to add a new sketch_type
	 * and passes it to sketch_type_model for insertion in the database
	 */
	public function add()
	{
		$data = array();
		
		// C'EST TRES MOCHE CA...
		$this->sketch_type_model->add();

		$data['categories'] = $this->category_model->listAll();
		
		$st = $this->sketch_type_model->lastAdded();
		
		$id = $st[0]->id;
		
		$data['sketch_type_category'] = $this->category_model->getById($id);
		
		$data['posted'] = $st[0];
		
		$this->show_view_with_hf('sketch_type_modify', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */