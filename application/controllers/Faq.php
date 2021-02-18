<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Faq Pages & Queries */
class Faq extends CI_Controller
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
		$this->load->model(['PostsModel', 'UsersModel', 'CategoriesModel']);
	}

	/** Load Default Index To Show 404 Error
	 *
	 * @return void */
	public function index()
	{
		return show_404();
	}

	/** Add Faq */
	public function add_faq()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		//user_can('post_add') or show_404();

		// print_r($_POST);
		// die;

		if ($this->input->post('addFaq')) {

			flash_message(
				'add/faq',
				$this->input->post('title')
					and $this->input->post('category_id')
					and $this->input->post('description'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$title       = $this->input->post('title');
			$description = $this->input->post('description');
			$category    = $this->input->post('category_id');
			$pin         = $this->input->post('postCheck');
			$faq         = "FAQ";

			$slug = get_unique_slug('posts', $this->input->post('title'));
			$form_images = upload(['uploads/Faq' => 'post_image']);

			/* Check Document Image Uploaded */
			// flash_message(
			// 	'add/faq',
			// 	isset($form_images['post_image']),
			// 	'unsuccess',
			// 	'Something Went Wrong',
			// 	"Please Upload Image & Try Again."
			// );

			isset($form_images['post_image']) and $post_image = $form_images['post_image'][0] or $post_image = "";

			$Faq = $this->PostsModel->save([
				'category_id' => $category,
				'slug'        => $slug,
				'title'       => $title,
				'description' => $description,
				'post_image'  => $post_image,
				'status'      => true,
				'is_pinned'   => $pin,
				'created_by'  => $_SESSION['USER_ID'],
				'modified_by' => $_SESSION['USER_ID'],
				'post_type'   => "FAQ"
			]);

			flash_message(
				'add/faq',
				$Faq,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/faqs',
				$Faq,
				'success',
				"Faq Successfully Created"
			);
		}

		$categories = $this->CategoriesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => [
				'post_type' => 'FAQ',
				'status'    => true
			],
			'order' => [
				'by'   => 'title',
				'type' => 'asc'
			],
			'datatype' => 'json'
		]);


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('faq/add', compact('categories'));
		$this->load->view('template/footer');
	}

	/** Load Faq List Page */
	public function list_faq()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);
		user_can('post_list') or show_404();

		$FaqData = json_decode(json_encode([
			'type' => 'Faq'
		]));
		$Faq = $this->PostsModel->all([
			'conditions' => [
				'post_type' => 'FAQ',
				'status!='  => '3',
			],
			'order' => [
				'by'   => 'id',
				'type' => 'DESC'
			]
		]);

		if (is($Faq))
			foreach ($Faq as $key => $val) {

				$user = $this->UsersModel->first($val['created_by']);

				empty($user) and $Faq[$key]['created_by'] = '' or $Faq[$key]['created_by'] =  ucwords($user['first_name'] . ' ' . $user['last_name']);


				if (is($val['category_id'])) {
					$user = $this->UsersModel->first($val['created_by']);
					$cats = $this->CategoriesModel->first($val['category_id']);

					empty($user) and $Faq[$key]['created_by'] = '' or $Faq[$key]['created_by'] =  ucwords($user['first_name'] . ' ' . $user['last_name']);
					empty($cats) and $Faq[$key]['category_id'] = 'Self' or $Faq[$key]['category_id'] = ucwords($cats['title']);
				} else {
					$user = $this->UsersModel->first($val['created_by']);

					empty($user) and $Faq[$key]['created_by'] = '' or $Faq[$key]['created_by'] =  ucwords($user['first_name'] . ' ' . $user['last_name']);
					$Faq[$key]['category_id'] = 'Self';
				}
			}

		empty($Faq) or is_array($Faq) and $FaqData = json_decode(json_encode([
			'type' => 'Faq',
			'data' => $Faq
		]));


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('faq/list', compact('FaqData'));
		$this->load->view('template/footer');
	}

	/** Add Faq */
	public function edit_faq($id)
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('post_edit') or show_404();


		if ($this->input->post('editFaq')) {

			$title       = $this->input->post('title');
			$description = $this->input->post('description');
			$category    = $this->input->post('category_id');
			$pin         = $this->input->post('postCheck');

			$slug = get_unique_slug('posts', $this->input->post('title'));

			/* Upload Images */
			$form_images = upload(['uploads/Faq' => 'postImg']);

			isset($form_images['postImg']) and $post_image = $form_images['postImg'][0] or $post_image = $this->input->post('oldpostImg');

			$Faq = $this->PostsModel->updateTable([
				'post_image'  => $post_image,
				'slug'        => $slug,
				'modified_by' => $_SESSION['USER_ID'],
				'status'      => true,
				'title'       => $title,
				'description' => $description,
				'is_pinned'   => $pin
			], ['id' => $id]);

			flash_message(
				'edit/faq/' . $id,
				$Faq,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/faqs',
				$Faq,
				'success',
				"Faq Updated Successfully"
			);
		}

		$FaqData = '';
		$Faq = $this->PostsModel->first([
			'conditions' => [
				'id'       => $id,
				'status!=' => '3',
			]
		]);

		empty($Faq) or is_array($Faq) and $FaqData = object($Faq);
		$categories = $this->CategoriesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => [
				'post_type' => 'FAQ',
				'status'    => true
			],
			'order' => [
				'by'   => 'title',
				'type' => 'asc'
			],
			'datatype' => 'json'
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('faq/edit', compact('categories', 'FaqData'));
		$this->load->view('template/footer');
	}

	public function delete_faq($id)
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('post_delete') or show_404();


		$Faq = $this->PostsModel->updateTable([
			'status' => '3',
		], ['id' => $id]);
		flash_message(
			'list/posts',
			$Faq,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/faqs',
			$Faq,
			'success',
			"Faq Deleted Successfully"
		);
	}
}

    /* End of file Faq.php */
