<?php defined('BASEPATH') or exit('No direct script access allowed');

class RecentUserDocsModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->database();
		$this->tableName = 'recent_user_docs';
	}
}

/* End of file RecentUserDocsModel.php */
