<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Course Pages & Queries */
class Course extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);
		$this->load->model([
			'CoursesModel',
			'UniversitiesModel',
			'DocumentsModel',
			'UserCoursesModel'
		]);
	}


	/** Load Default Index To Show 404 Error
	 *
	 * @return void */
	public function index()
	{
		return show_404();
	}


	/** Add Course */
	public function add_course()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('course_add') or show_404();
		// print_r($_POST);
		// die;

		if ($this->input->post('addCourse')) {

			flash_message(
				'add/course',
				$this->input->post('title') and $this->input->post('university_id'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$course_exists = $this->CoursesModel->first([
				'title' => str_clean($this->input->post('title'), [' ', '-', '_'])
			]);

			is_null($course_exists) or is_array($course_exists) and $course_exists = $course_exists['title'];

			flash_message(
				'add/course',
				empty($course_exists),
				'unsuccess',
				'Something Went Wrong',
				"Oops, Course Already Exists,<br>Please Try With Another Course."
			);

			/* Slug */
			$slug = get_unique_slug('courses', $this->input->post('title'));


			$course = $this->CoursesModel->save([
				'slug'          => $slug,
				'university_id' => $this->input->post('university_id'),
				'title'         => str_clean($this->input->post('title'), [' ', '-', '_']),
				'created_by'    => $_SESSION['USER_ID'],
				'modified_by'   => $_SESSION['USER_ID'],
				'status'        => true,
			]);

			flash_message(
				'add/course',
				$course,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/courses',
				$course,
				'success',
				"Course Added Successfully"
			);
		}

		$universities = $this->UniversitiesModel->all([
			'fields' => ['universities.id', 'universities.title'],
			'conditions' => [
				'universities.status!=' => '3',
			],
			'order' => [
				'by'   => 'universities.title',
				'type' => 'DESC'
			],
			'datatype' => 'json'
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('course/add', compact('universities'));
		$this->load->view('template/footer');
	}


	/** Load Course List Page */
	public function list_course($university_id = null)
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('course_list') or show_404();

		$courseData = object([
			'type' => 'Courses'
		]);


		$course_param = [
			'fields' => [
				'courses.id',
				'courses.slug',
				'courses.title',
				'courses.status',
				'courses.university_id',
				'courses.created_date',
				'users.first_name as created_by',
				'universities.title as university'
			],
			'conditions' => [
				'courses.status!=' => '3',
			],
			'join'  => [
				['users', 'users.id = courses.created_by'],
				['universities', 'universities.id = courses.university_id']
			],
			'order' => [
				'by'   => 'courses.id',
				'type' => 'DESC'
			]
		];

		if (isset($university_id) && $university_id != null) {
			$course_param['conditions']['courses.university_id'] = $university_id;
		}

		$course = $this->CoursesModel->all($course_param);

		if (!empty($course)) {
			foreach ($course as $key => $val) {
			

				$course_doc  = $this->DocumentsModel->count(['conditions' => ['course_id' => $val['id']]]);
				$course_follower  = $this->UserCoursesModel->count(['conditions' => ['course_id' => $val['id']]]);
				$course[$key]['course_doc'] = $course_doc;
				$course[$key]['course_followers'] = $course_follower;
			}
		}

		empty($course) or is_array($course) and $courseData = object([
			'type' => 'Courses',
			'data' => $course
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('course/list', compact('courseData'));
		$this->load->view('template/footer');
	}


	/** Edit Course */
	public function edit_course($course_slug = null)
	{

		empty($course_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('course_edit') or show_404();

		if ($this->input->post('editCourse')) {
			flash_message(
				'edit/course/' . $course_slug,
				$this->input->post('title') and $this->input->post('university_id'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$course_exists = $this->CoursesModel->first([
				'title' 	=> str_clean($this->input->post('title'), [' ', '-', '_']),
				'slug!=' 	=> $course_slug
			]);

			is_null($course_exists) or is_array($course_exists) and $course_exists = $course_exists['title'];

			flash_message(
				'edit/course/' . $course_slug,
				empty($course_exists),
				'unsuccess',
				'Something Went Wrong',
				"Oops, Course Already Exists,<br>Please Try With Another Course."
			);

			/* Slug */
			$slug = get_unique_slug('courses', $this->input->post('title'));

			$course = $this->CoursesModel->updateTable([
				'slug'          => $slug,
				'university_id' => $this->input->post('university_id'),
				'title'         => $this->input->post('title'),
				'modified_by'   => $_SESSION['USER_ID'],
			], ['slug' => $course_slug]);

			flash_message(
				'edit/course/' . $course_slug,
				$course,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/courses',
				$course,
				'success',
				"Course Updated Successfully"
			);
		}

		$courseData = '';
		$course = $this->CoursesModel->first([
			'conditions' => [
				'slug'     => $course_slug,
				'status!=' => '3',
			]
		]);
		is($course, 'array') or show_404();

		empty($course) or is_array($course) and $courseData = object($course);

		$universities = $this->UniversitiesModel->all([
			'fields' => ['universities.id', 'universities.title'],
			'conditions' => [
				'universities.status!=' => '3',
			],
			'order' => [
				'by'   => 'universities.title',
				'type' => 'DESC'
			],
			'datatype' => 'json'
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('course/edit', compact('courseData', 'universities'));
		$this->load->view('template/footer');
	}


	/** Delete Course */
	public function delete_course($course_slug = null)
	{
		empty($course_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('course_delete') or show_404();

		$course = $this->CoursesModel->updateTable([
			'status' => '3',
		], ['slug' => $course_slug]);
		flash_message(
			'list/courses',
			$course,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/courses',
			$course,
			'success',
			"Course Deleted Successfully"
		);
	}
}

    /* End of file Course.php */
