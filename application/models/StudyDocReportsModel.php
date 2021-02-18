<?php defined('BASEPATH') or exit('No direct script access allowed');

class StudyDocReportsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
        $this->tableName = 'study_doc_reports';
    }
}

/* End of file StudyDocReportsModel.php */