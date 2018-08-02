<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Frontend_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('article_m');
	}

	public function index($id, $slug)
	{
		// Fetch the article
		$this->db->where('pubdate <=', date('Y-m-d'));
		$this->data['article'] = $this->article_m->get($id);

		// Return 404 if not found uri_string() return blog/comments/123
		count($this->data['article']) || show_404(uri_string());

		// Redirect if slug was incorrect
		$request_slug = $this->uri->segment(3);
		$set_slug = $this->data['article']->slug;
		if ($request_slug != $set_slug) {
			// with 301 redirect
			redirect('article/' . $this->data['article']->id . '/' . $this->data['article']->slug, 'location', 301);
		}
		// Load view
		$this->data['subview'] = 'article';
		$this->load->view('_main_layout', $this->data);
	}
}

/* End of file page.php */
/* Location: ./application/controllers/page.php */