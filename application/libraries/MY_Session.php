<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Session extends CI_Session {

	public function sess_update()
	{
		// Listen to HTTP_X_REQUESTED_WITH fix login out
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
			parent::sess_update();
		}
	}

}

/* End of file MY_Session.php */
/* Location: ./application/libraries/MY_Session.php */