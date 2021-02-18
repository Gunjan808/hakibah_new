<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Language Pages & Queries */
class Language extends CI_Controller
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
			'LanguagesModel',
			'UsersModel'
		]);
	}


	/** Load Default Index To Show 404 Error
	 *
	 * @return void */
	public function index()
	{
		return show_404();
	}

	/** Add Language */
	public function add_language()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('language_add') or show_404();

		if ($this->input->post('addLanguage')) {

			flash_message(
				'add/language',
				$this->input->post('title'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$language_exists = $this->LanguagesModel->first([
				'title' => str_clean($this->input->post('title'), [' ', '-', '_'])
			]);

			is_null($language_exists) or is_array($language_exists) and $language_exists = $language_exists['title'];

			flash_message(
				'add/language',
				empty($language_exists),
				'unsuccess',
				'Something Went Wrong',
				"Oops, Language Already Exists,<br>Please Try With Another Language."
			);

			/* Slug */
			$slug = get_unique_slug('languages', $this->input->post('title'));


			/* Upload Images */
			$form_images = upload(['uploads/language' => 'langImg']);

			isset($form_images['langImg']) and $language_image = $form_images['langImg'][0] or $language_image = "";

			$language = $this->LanguagesModel->save([
				'slug'        => $slug,
				'title'       => str_clean($this->input->post('title'), [' ', '-', '_']),
				'image'       => $language_image,
				'created_by'  => $_SESSION['USER_ID'],
				'modified_by' => $_SESSION['USER_ID'],
				'status'      => true,
			]);

			flash_message(
				'add/language',
				$language,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/languages',
				$language,
				'success',
				"Language Added Successfully"
			);
		}

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('language/add');
		$this->load->view('template/footer');
	}


	/** Load Language List Page */
	public function list_language()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('language_list') or show_404();

		$languageData = object([
			'type' => 'Languages'
		]);

		$language = $this->LanguagesModel->all([
			'fields' => [
				'languages.id',
				'languages.slug',
				'languages.title',
				'languages.image',
				'languages.status',
				'languages.created_date',
				'users.first_name as created_by'
			],
			'conditions' => [
				'languages.status!=' => '3',
			],
			'join'  => [['users', 'users.id = languages.created_by']],
			'order' => [
				'by'   => 'languages.id',
				'type' => 'DESC'
			],
			'datatype' => 'json'
		]);

		empty($language) or is_array($language) and $languageData = object([
			'type' => 'Languages',
			'data' => $language
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('language/list', compact('languageData'));
		$this->load->view('template/footer');
	}


	/** Edit Language */
	public function edit_language($language_slug = null)
	{

		empty($language_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('language_edit') or show_404();

		if ($this->input->post('editLanguage')) {

			flash_message(
				'edit/language/' . $language_slug,
				$this->input->post('title'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$language_exists = $this->LanguagesModel->first([
				'title' 	=> str_clean($this->input->post('title'), [' ', '-', '_']),
				'slug!=' 	=> $language_slug
			]);

			is_null($language_exists) or is_array($language_exists) and $language_exists = $language_exists['title'];

			flash_message(
				'edit/language/' . $language_slug,
				empty($language_exists),
				'unsuccess',
				'Something Went Wrong',
				"Oops, Language Already Exists,<br>Please Try With Another Language."
			);

			/* Slug */
			$slug = get_unique_slug('languages', $this->input->post('title'));

			/* Upload Images */
			$form_images = upload(['uploads/language' => 'langImg']);

			isset($form_images['langImg']) and $language_image = $form_images['langImg'][0] or $language_image = $this->input->post('oldlangImg');

			$language = $this->LanguagesModel->updateTable([
				'slug'        => $slug,
				'title'       => $this->input->post('title'),
				'image'       => $language_image,
				'modified_by' => $_SESSION['USER_ID'],
				'status'      => true,
			], ['slug' => $language_slug]);

			flash_message(
				'edit/language/' . $language_slug,
				$language,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/languages',
				$language,
				'success',
				"Language Created Successfully"
			);
		}

		$languageData = '';
		$language = $this->LanguagesModel->first([
			'conditions' => [
				'slug'     => $language_slug,
				'status!=' => '3',
			]
		]);
		is($language, 'array') or show_404();

		empty($language) or is_array($language) and $languageData = object($language);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('language/edit', compact('languageData'));
		$this->load->view('template/footer');
	}


	/** Delete Language */
	public function delete_language($language_slug = null)
	{
		empty($language_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('language_delete') or show_404();

		$language = $this->LanguagesModel->updateTable([
			'status' => '3',
		], ['slug' => $language_slug]);
		flash_message(
			'list/languages',
			$language,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/languages',
			$language,
			'success',
			"Language Deleted Successfully"
		);
	}
}

    /* End of file Language.php */
