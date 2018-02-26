<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['errors'] = array();
		$this->data['site_name'] = config_item('site_name');
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */