<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('page_m');
	}

	public function index()
	{
		$this->load->view('_layout_main');
	}

	public function save()
	{
		/*$data = array(
			'title' => 'My page',
			'slug' => 'my-page',
			'order' => '2',
			'body' => 'this is my body',
		);

		$id = $this->page_m->save($data);*/

		$data = array(
			'order' => '3',
		);

		$id = $this->page_m->save($data, 3);
		var_dump($id);
	}

	public function delete()
	{
		$this->page_m->delete(3);
	}

}

/* End of file page.php */
/* Location: ./application/controllers/page.php */