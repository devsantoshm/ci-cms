<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page_m extends MY_Model {

	protected $_table_name = 'pages';
	protected $_order_by = 'order'; //nombre de la columna en la tabla pages

	public $rules = array(
		'title' => array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'slug' => array(
			'field' => 'slug',
			'label' => 'Slug',
			'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
		),
		'body' => array(
			'field' => 'body',
			'label' => 'Body',
			'rules' => 'trim|required'
		),
	);

	public function get_new()
	{
		$page = new stdClass();
		$page->title = '';
		$page->slug = '';
		$page->order = '';
		$page->body = '';

		return $page;
	}
}

/* End of file page_m.php */
/* Location: ./application/models/page_m.php */