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
		
		if(!isset($_POST['create']))
		{
			$data['humorists'] = $this->humorist_model->listAllByLastName();
			$this->show_view_with_hf('sketch_type_add', $data);
		}
		else
		{
			$skecth_type_values['title'] = $_POST['title'];
			$skecth_type_values['start_date'] = $_POST['start_date'];
			$skecth_type_values['image'] = $_POST['image'];
			$skecth_type_values['synopsis'] = $_POST['synopsis'];
			$skecth_type_values['category'] = $_POST['category'];
			
			$this->sketch_type_model->add($skecth_type_values);
			
			$st = $this->sketch_type_model->lastAdded();
			
			$data['st'] = $st[0];
			$h['sketch_type'] = $st[0]->id;
			
			$this->load->model('sketch_type_humorist_model');
			if(is_array($_POST['humorist']))
			{
				foreach($_POST['humorist'] as $ahumorist)
				{
					$h['humorist'] = $ahumorist;
					$this->sketch_type_humorist_model->add($h);
				}
			}
			else
			{
				$h['humorist'] = $_POST['humorist'];
				$this->sketch_type_humorist_model->add($h);
			}
			
			$data['message'] = "This sketch has been added. In few seconds you will be redirect in its descriptive page";
			
			$this->show_view_with_hf('sketch_type_processed', $data);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */