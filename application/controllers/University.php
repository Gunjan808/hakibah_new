<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load University Pages & Queries */
class University extends CI_Controller
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
			'UniversitiesModel',
			'UsersModel',
			'CountryModel'
		]);
	}


	/** Load Default Index To Show 404 Error
	 *
	 * @return void */
	public function index()
	{
		return show_404();
	}


	/** Add University */
	public function add_university()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('university_add') or show_404();

		$countries = $this->CountryModel->all();

		if ($this->input->post('addUniversity')) {

			flash_message(
				'add/university',
				$this->input->post('title'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$university_exists = $this->UniversitiesModel->first([
				'title' => str_clean($this->input->post('title'), [' ', '-', '_'])
			]);

			is_null($university_exists) or is_array($university_exists) and $university_exists = $university_exists['title'];

			flash_message(
				'add/university',
				empty($university_exists),
				'unsuccess',
				'Something Went Wrong',
				"Oops, University Already Exists,<br>Please Try With Another University."
			);

			/* Slug */
			$slug = get_unique_slug('universities', $this->input->post('title'));

			$university = $this->UniversitiesModel->save([
				'slug'        => $slug,
				'title'       => str_clean($this->input->post('title'), [' ', '-', '_']),
				'created_by'  => $_SESSION['USER_ID'],
				'modified_by' => $_SESSION['USER_ID'],
				'status'      => true,
			]);

			flash_message(
				'add/university',
				$university,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/universities',
				$university,
				'success',
				"University Added Successfully"
			);
		}

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('university/add', compact('countries'));
		$this->load->view('template/footer');
	}


	/** Load University List Page */
	public function list_university()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('university_list') or show_404();

		$universityData = object([
			'type' => 'Universities'
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('university/list', compact('universityData'));
		$this->load->view('template/footer');
	}


	/** Edit University */
	public function edit_university($id = null)
	{

		empty($id) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('university_edit') or show_404();

		if ($this->input->post('editUniversity')) {

			flash_message(
				'edit/university/' . $id,
				$this->input->post('title'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			// $university_exists = $this->UniversitiesModel->first([
			// 	'title' 	=> str_clean($this->input->post('title'), [' ', '-', '_']),
			// 	'slug!=' 	=> $university_slug
			// ]);

			// is_null($university_exists) or is_array($university_exists) and $university_exists = $university_exists['title'];

			// flash_message(
			// 	'edit/university/' . $university_slug,
			// 	empty($university_exists),
			// 	'unsuccess',
			// 	'Something Went Wrong',
			// 	"Oops, University Already Exists,<br>Please Try With Another University."
			// );

			/* Slug */
			// $slug = get_unique_slug('universities', $this->input->post('title'));

			$university = $this->UniversitiesModel->updateTable([
				'title'       => $this->input->post('title'),
				'modified_by' => $_SESSION['USER_ID'],
				'status'      => true,
			], ['id' => $id]);

			flash_message(
				'edit/university/' . $id,
				$university,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/universities',
				$university,
				'success',
				"University Created Successfully"
			);
		}

		$universityData = '';
		$university = $this->UniversitiesModel->first([
			'conditions' => [
				'id'     => $id,
				'status!=' => '3',
			]
		]);
		is($university, 'array') or show_404();

		empty($university) or is_array($university) and $universityData = object($university);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('university/edit', compact('universityData'));
		$this->load->view('template/footer');
	}


	/** Delete University */
	public function delete_university($id)
	{
		empty($id) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('university_delete') or show_404();

		$university = $this->UniversitiesModel->updateTable([
			'status' => '3',
		], ['id' => $id]);
		flash_message(
			'list/universities',
			$university,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/universities',
			$university,
			'success',
			"University Deleted Successfully"
		);
	}
}

    /* End of file University.php */
