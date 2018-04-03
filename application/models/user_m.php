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
	public $rules_admin = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'trim|required|xss_clean'
		),
		'order' => array(
			'field' => 'order',
			'label' => 'Order',
			'rules' => 'trim|is_natural'
		),
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|matches[password_confirm]'
		),
		'password_condirm' => array(
			'field' => 'password_condirm',
			'label' => 'Confirm password',
			'rules' => 'trim|matches[password]'
		),
	);

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'password' => $this->hash($this->input->post('password'))
		), TRUE);
		
		if (null !== $user) {
			// log in user
			$data = array(
				'name' => $user->name,
				'email' => $user->email,
				'id' => $user->id,
				'loggedin' => TRUE,
			);

			$this->session->set_userdata($data);	
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function hash($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */