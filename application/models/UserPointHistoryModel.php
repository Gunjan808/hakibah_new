<?php defined('BASEPATH') or exit('No direct script access allowed');

class UserPointHistoryModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
        $this->tableName = 'user_points_history';
    }
}

/* End of file UserPointHistoryModel.php */