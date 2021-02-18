<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Document Pages & Queries */
class Document extends CI_Controller
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
			'DocumentsModel',
			'UniversitiesModel',
			'CoursesModel',
			'BooksModel',
			'CategoriesModel',
			'NotificationsModel',
			'UserPointHistoryModel',
			'UsersModel',
			'SettingsModel'
		]);
	}


	/** Load Default Index To Show 404 Error
	 *
	 * @return void */
	public function index()
	{
		return show_404();
	}

	/** Handle Upload Docunent */
	public function uploadDoc()
	{
		if (is($_FILES, 'array') and $this->input->post('uploadDocument')) {
			$path = 'uploads/documents/';
			file_exists($path) or mkdir($path, 0777, true);

			$this->load->library('upload', [
				'allowed_types'    => ['doc', 'pdf', 'docx'],
				'encrypt_name'     => true,
				'file_ext_tolower' => true,
				'max_size'         => 2048,
				'upload_path'      => $path
			]);

			$data = [];
			if (!$this->upload->do_upload('file')) {
				$data['error'] = $this->upload->display_errors();
			} else {
				$data['upload_data'] = $this->upload->data();
			}

			return print(json_encode([$data]));
		}
		return;
	}


	/** Add Document */
	public function add_document()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('document_add') or show_404();

		$categories = $this->CategoriesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => ['status!=' => 3, 'post_type' => 'DOCUMENT'],
			'order'      => ['by' => 'title', 'type' => 'ASC'],
			'datatype'   => 'json'
		]);

		if ($this->input->post('uploadDoc')) {

			flash_message(
				'add/document',
				$this->input->post('university_id') and
					$this->input->post('course_id'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			flash_message(
				'add/document',
				is($_POST['docs'], 'array'),
				'unsuccess',
				'Something Went Wrong',
				'Please Upload Document & Try Again.'
			);

			$form_images = upload(['uploads/image' => 'profileImg']);

			isset($form_images['profileImg']) and $image = $form_images['profileImg'][0] or $image = "";

			$docs_id = [];
			foreach ($this->input->post('docs') as $key => $doc) {
				$docs_id[$key]['id'] = $this->DocumentsModel->save([
					'university_id' => $this->input->post('university_id'),
					'course_id'     => $this->input->post('course_id'),
					'file'          => 'uploads/documents/' . $doc,
					'image'       	=> $image,
					'user_id'       => $_SESSION['USER_ID'],
					'created_by'    => $_SESSION['USER_ID'],
					'modified_by'   => $_SESSION['USER_ID'],
					'status'        => 1,
				]);

				$docs_id[$key]['file'] = $this->input->post('docsName')[$key];
			}

			is($docs_id, 'array') and $this->session->set_userdata(['uploadedDocs' => $docs_id]);

			flash_message(
				'add/document',
				is($docs_id, 'array'),
				'unsuccess',
				"Something Went Wrong",
				'Please Try After Sometime.'
			);

			flash_message(
				'add/document/',
				is($docs_id, 'array'),
				'success',
				"Document Uploaded Successfully"
			);
		}

		if ($this->input->post('addDocument')) {

			$document = false;
			// die(json_encode($_POST));
			if (is($_POST['form'], 'array'))
				foreach ($this->input->post('form') as $key => $form) {
					if (is($form, 'array'))
						$form = object($form);

					flash_message(
						'add/document',
						is($form->title) and
							is($form->category_id) and
							is($form->catName) and
							is($form->desc),
						'unsuccess',
						'Something Went Wrong',
						'Look like Form Not Fill Properly, Please Fill & Try Again.'
					);

					/* Slug */
					$slug = get_unique_slug('study_docs', $form->title);

					if (strpos(strtolower($form->catName), 'past exams') !== false)
						$form->addition_field = $form->exam_type;

					$document = $this->DocumentsModel->updateTable([
						'category_id'      => $form->category_id,
						'slug'             => $slug,
						'title'            => str_clean($form->title, [' ', '-', '_']),
						'description'      => $form->desc,
						'academic_year'    => $form->academic_year,
						'additional_field' => $form->addition_field,
						'summary_content'  => (isset($form->summary_content)) ? $form->summary_content : '',
						'book_id'          => (isset($form->book_id)) ? $form->book_id : '',
						'exam_content'     => (isset($form->exam_content)) ? $form->exam_content : '',
						'exam_day'         => $form->day,
						'exam_month'       => $form->month,
						'exam_semester'    => $form->semester,
						'exam_year'        => $form->year,
						'status'           => true,
					], ['id' => $key]) && $document = true;
				}

			flash_message(
				'add/document',
				$document,
				'unsuccess',
				"Something Went Wrong"
			);

			unset($_SESSION['uploadedDocs']);
			flash_message(
				'list/documents',
				$document,
				'success',
				"Document Added Successfully"
			);
		}

		$universities = $this->UniversitiesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => ['status!=' => 3],
			'order'      => ['by' => 'title', 'type' => 'DESC'],
			'datatype'   => 'json'
		]);

		$courses = $this->CoursesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => ['status!=' => 3],
			'order'      => ['by' => 'title', 'type' => 'DESC'],
			'datatype'   => 'json'
		]);

		$books = $this->BooksModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => ['status!=' => 3],
			'order'      => ['by' => 'title', 'type' => 'DESC'],
			'datatype'   => 'json'
		]);


		show_debug($categories);
		show_debug($courses);
		show_debug($universities);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('document/add', compact('universities', 'courses', 'books', 'categories'));
		$this->load->view('template/footer');
	}


	/** Load Document List Page */
	public function list_document($university_id = null, $course_id = null)
	{

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);
		user_can('document_list') or show_404();

		$documentData = object([
			'type' => 'Documents'
		]);

		$document_param = [
			'fields' => [
				'study_docs.id',
				'study_docs.slug',
				'study_docs.title',
				'study_docs.status',
				'study_docs.academic_year',
				'study_docs.created_date',
				'users.first_name as created_by',
				'universities.title as university',
				'courses.title as course',
				'categories.title as category',
				'languages.title as language'
			],
			'conditions' => [
				'study_docs.status!=' => '3',
			],
			'join'  => [
				['users', 'users.id = study_docs.created_by'],
				['universities', 'universities.id = study_docs.university_id'],
				['courses', 'courses.id = study_docs.course_id'],
				['categories', 'categories.id = study_docs.category_id'],
				['languages', 'languages.id = study_docs.language_id']
			],
			'order' => [
				'by'   => 'study_docs.id',
				'type' => 'DESC'
			],
			'datatype' => 'json'
		];

		$document = $this->DocumentsModel->all($document_param);

		//echo $this->db->last_query();

		empty($document) or is_array($document) and $documentData = object([
			'type' => 'Documents',
			'data' => $document
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('document/list', compact('documentData'));
		$this->load->view('template/footer');
	}


	public function update_status($doc_id = null)
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);
		is($doc_id) or show_404();
		$docs = $this->DocumentsModel->first([
			'conditions' => ['id' => $doc_id],
			'datatype'   => 'json'
		]);
		is($docs, 'json') or show_404();

		$user = $this->UsersModel->first([
			'conditions' => ['id' => $docs->user_id],
			'datatype'   => 'json'
		]);
		is($user, 'json') or show_404();

		$update = $this->DocumentsModel->updateTable(
			['status' => true],
			['id' => $doc_id]
		);

		$notification = $this->NotificationsModel->save([
			'user_id'      => $docs->user_id,
			'study_doc_id' => $doc_id,
			'action'       => 'approved'
		]);

		$site_upload_doc_point = $this->SettingsModel->first([
			'option_key'      => 'site_upload_doc_point'
		]);

		$point = $this->UserPointHistoryModel->save([
			'user_id'      => $docs->user_id,
			'points'       => $site_upload_doc_point['option_value'],
			'credit_debit' => 'credit',
			'reason'       => 'doc upload'
		]);

		flash_message(
			'list/documents',
			$update and $point and $notification,
			'unsuccess',
			'Something went wrong'
		);

		sendMail($user->email, 'Dear ' . $user->first_name . '<br> Document Approved', 'Your Document is Approved now.');

		flash_message(
			'list/documents',
			$update and $point and $notification,
			'success',
			'Document Approved successfully'
		);
	}


	/** Delete Document */
	public function delete_document($document_slug = null)
	{
		empty($document_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('document_delete') or show_404();

		$document = $this->DocumentsModel->updateTable([
			'status' => '3',
		], ['slug' => $document_slug]);
		flash_message(
			'list/documents',
			$document,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/documents',
			$document,
			'success',
			"Document Deleted Successfully"
		);
	}
}

    /* End of file Document.php */
