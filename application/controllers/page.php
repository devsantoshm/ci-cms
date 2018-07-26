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
		$this->db->where('pubdate <=', date('Y-m-d'));
		$this->db->limit(6);
		$this->data['articles'] = $this->article_m->get();
	}

	private function _news_archive()
	{
		$this->load->model('article_m');

		//Count all articles
		$this->db->where('pubdate <=', date('Y-m-d'));
		$count = $this->db->count_all_results('articles'); // Produces an integer, like 25

		//Set up pagination
		$perpage = 4;
		if ($count > $perpage) {
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->uri->segment(1) . '/');
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 2; //determines which segment of your URI contains the page number. 
			
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = FALSE;
			$config['last_link'] = FALSE;
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links(); //method returns an empty string when there is no pagination to show.
			$offset = $this->uri->segment(2);
		} else {
			$this->data['pagination'] = '';
			$offset = 0;
		}

		//dump($this->data['pagination']);
		
		//Fetch articles
		$this->db->where('pubdate <=', date('Y-m-d'));
		/*LIMIT 5,30. Seleccionará los resultados a partir del 5 registro hasta los siguientes 30*/
		$this->db->limit($perpage, $offset); //LIMIT 2, 4 offset=2 y perpage=4

		$this->data['articles'] = $this->article_m->get();
		//dump(count($this->data['articles']));
		//echo '<pre>' . $this->db->last_query() . '</pre>';

	}
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */