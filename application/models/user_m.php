<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends MY_Model {

	protected $_table_name = 'users';
	protected $_order_by = 'name'; //nombre de la columna en la tabla pages
	public $rules = array(
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|xss_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required'
		)
	);

	public function __construct()
	{
		parent::__construct();
	}

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */