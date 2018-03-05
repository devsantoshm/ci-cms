<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public $rules = array();
	protected $_timestamps = FALSE;

	public function __construct()
	{
		parent::__construct();
	}

	public function get($id = NULL, $single = FALSE)
	{	
		if ($id != NULL) {
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			$method = 'row';
		} else if($single == TRUE){
			$method = 'row';
		} else {
			$method = 'result';
		}
		//When checking to see if a db->order_by has been set
	
		$this->db->order_by($this->_order_by);

		return $this->db->get($this->_table_name)->$method();	
	}

	public function get_by($where, $single = FALSE)
	{
		$this->db->where($where);
		return $this->get(NULL, $single);
	}		

	public function save($data, $id = NULL)
	{
		// Set _timestamps
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$id || $data['created'] = $now;
			$data['modified'] = $now;
		}
		//insert
		if ($id === NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		} else { // update
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}

		return $id;
		
	}

	public function delete($id)
	{
		$filter = $this->_primary_filter;
		$id = $filter($id);

		if(!$id)
			return FALSE;

		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */