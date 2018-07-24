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

		// Fetch the page data
		$method = '_' . $this->data['page']->template;
		if (method_exists($this, $method)) {
			$this->$method();
		} else {
			log_message('error', 'Could not load template ' . $method . ' in file ' . __FILE__ . ' at line ' . __LINE__);
			show_error('Could not load template ' . $method);
		} 

		$this->data['subview'] = $this->data['page']->template;
		$this->load->view('_main_layout', $this->data);
	}

	private function _page()
	{
		dump('Welcom template page');
	}

	private function _homepage()
	{
		// fetch load articles
		$this->load->model('article_m');
		$this->db->limit(6);
		$this->data['articles'] = $this->article_m->get();
	}

	private function _news_archive()
	{
		dump('Welcom template news_archive');
	}
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */