<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('page_m');
		$this->data['menu'] = $this->page_m->get_nested();
	}
}

/* End of file Frontend_Controller.php */
/* Location: ./application/libraries/Frontend_Controller.php */