<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->data['meta_title'] = 'My awesome CMS';
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');

		//login check
		/*uri_string() Returns the URI segments of any page that contains this function, http://some-site.com/blog/comments/123 The function would return: blog/comments/123*/
		$exception_uris = array(
			'admin/user/login',
			'admin/user/logout'
		);

		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin() == FALSE) {
				redirect('admin/user/login');	
			}
		}
	}

}

/* End of file Admin_Controller.php */
/* Location: ./application/libraries/Admin_Controller.php */