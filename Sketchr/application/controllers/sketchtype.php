<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sketchtype extends MY_Controller {


	public function __construct() {
		
		parent::__construct();		
	}

	public function index()
	{
		$data = array();
		$this->show_view_with_hf('sketch_type_add', $data);
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
		
		$this->show_view_with_hf('sketch_type_modify', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */