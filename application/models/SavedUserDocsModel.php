<?php defined('BASEPATH') or exit('No direct script access allowed');

class SavedUserDocsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
        $this->tableName = 'saved_user_docs';
    }
}

/* End of file SavedUserDocsModel.php */