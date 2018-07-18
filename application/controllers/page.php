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
		// Fetch the page data get_by return con true, es decir con el metodo row()
		$this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(1)), TRUE);
		//echo '<pre>'.$this->db->last_query().'</pre>';
		//dump($this->data['page']);
		// current_url() Returns the full URL (including segments) of the page being currently viewed.
		count($this->data['page']) || show_404(current_url()); 

		$this->load->view('_main_layout', $this->data);
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