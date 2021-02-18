<?php defined('BASEPATH') or exit('No direct script access allowed');

class CoursePostModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
        $this->tableName = 'course_posts';
    }
}

/* End of file CoursesModel.php */
