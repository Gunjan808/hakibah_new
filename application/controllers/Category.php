<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Category Pages & Queries */
class Category extends CI_Controller
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
			'CategoriesModel',
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


	/** Add Category */
	public function add_category()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('category_add') or show_404();

		if ($this->input->post('addCategory')) {

			flash_message(
				'add/category',
				$this->input->post('title'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			/* $category_exists = $this->CategoriesModel->first([
				'title' => str_clean($this->input->post('title'), [' ', '-', '_'])
			]);

			is_null($category_exists) or is_array($category_exists) and $category_exists = $category_exists['title'];

			flash_message(
				'add/category',
				empty($category_exists),
				'unsuccess',
				'Something Went Wrong',
				"Oops, Category Already Exists,<br>Please Try With Another Category."
			); */

			/* Slug */
			$slug = get_unique_slug('categories', $this->input->post('title'));


			/* Upload Images */
			$form_images = upload(['uploads/category' => 'catImg']);

			isset($form_images['catImg']) and $category_image = $form_images['catImg'][0] or $category_image = "";

			$category = $this->CategoriesModel->save([
				'slug'        => $slug,
				'title'       => $this->input->post('title'),
				'post_type'   => $this->input->post('post_type'),
				'image'       => $category_image,
				'created_by'  => $_SESSION['USER_ID'],
				'modified_by' => $_SESSION['USER_ID'],
				'status'      => true,
			]);

			flash_message(
				'add/category',
				$category,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/categories',
				$category,
				'success',
				"Category Added Successfully"
			);
		}

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('category/add');
		$this->load->view('template/footer');
	}


	/** Load Category List Page */
	public function list_category()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('category_list') or show_404();

		$categoryData = object([
			'type' => 'Categories'
		]);

		$category = $this->CategoriesModel->all([
			'fields' => [
				'categories.id',
				'categories.slug',
				'categories.title',
				'categories.post_type',
				'categories.image',
				'categories.status',
				'categories.created_date',
				'users.first_name as created_by'
			],
			'conditions' => [
				'categories.status!=' => '3',
			],
			'join'  => [['users', 'users.id = categories.created_by']],
			'order' => [
				'by'   => 'categories.id',
				'type' => 'DESC'
			],
			'datatype' => 'json'
		]);

		empty($category) or is_array($category) and $categoryData = object([
			'type' => 'Categories',
			'data' => $category
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('category/list', compact('categoryData'));
		$this->load->view('template/footer');
	}


	/** Edit Category */
	public function edit_category($category_slug = null)
	{

		empty($category_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('category_edit') or show_404();

		if ($this->input->post('editCategory')) {

			flash_message(
				'edit/category/' . $category_slug,
				$this->input->post('title'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$category_exists = $this->CategoriesModel->first([
				'title' 	=> str_clean($this->input->post('title'), [' ', '-', '_']),
				'slug!=' 	=> $category_slug
			]);

			is_null($category_exists) or is_array($category_exists) and $category_exists = $category_exists['title'];

			flash_message(
				'edit/category/' . $category_slug,
				empty($category_exists),
				'unsuccess',
				'Something Went Wrong',
				"Oops, Category Already Exists,<br>Please Try With Another Category."
			);

			/* Slug */
			$slug = get_unique_slug('categories', $this->input->post('title'));

			/* Upload Images */
			$form_images = upload(['uploads/category' => 'catImg']);

			isset($form_images['catImg']) and $category_image = $form_images['catImg'][0] or $category_image = $this->input->post('oldcatImg');

			$category = $this->CategoriesModel->updateTable([
				'slug'        => $slug,
				'title'       => $this->input->post('title'),
				'image'       => $category_image,
				'modified_by' => $_SESSION['USER_ID'],
				'status'      => true,
			], ['slug' => $category_slug]);

			flash_message(
				'edit/category/' . $category_slug,
				$category,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/categories',
				$category,
				'success',
				"Category Created Successfully"
			);
		}

		$categoryData = '';
		$category = $this->CategoriesModel->first([
			'conditions' => [
				'slug'     => $category_slug,
				'status!=' => '3',
			]
		]);
		is($category, 'array') or show_404();

		empty($category) or is_array($category) and $categoryData = object($category);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('category/edit', compact('categoryData'));
		$this->load->view('template/footer');
	}


	/** Delete Category */
	public function delete_category($category_slug = null)
	{
		empty($category_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('category_delete') or show_404();

		$category = $this->CategoriesModel->updateTable([
			'status' => '3',
		], ['slug' => $category_slug]);
		flash_message(
			'list/categories',
			$category,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/categories',
			$category,
			'success',
			"Category Deleted Successfully"
		);
	}
}

    /* End of file Category.php */
