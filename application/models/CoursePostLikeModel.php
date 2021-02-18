<?php defined('BASEPATH') or exit('No direct script access allowed');

class CoursePostLikeModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
        $this->tableName = 'course_post_like';
    }
}

/* End of file CoursesModel.php */
