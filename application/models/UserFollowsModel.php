<?php defined('BASEPATH') or exit('No direct script access allowed');

class UserFollowsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
        $this->tableName = 'user_follows';
    }
}

/* End of file UserFollowsModel.php */