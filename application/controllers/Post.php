<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Post Post Pages & Queries */
class Post extends CI_Controller
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

	/** Add Post Post */
	public function add_post()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('post_add') or show_404();

		if ($this->input->post('addPost')) {

			flash_message(
				'add/post',
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
			$post        = 'BLOG';

			$slug = get_unique_slug('posts', $this->input->post('title'));
			$form_images = upload(['uploads/Post' => 'post_image']);

			/* Check Document Image Uploaded */
			flash_message(
				'add/post',
				isset($form_images['post_image']),
				'unsuccess',
				'Something Went Wrong',
				"Please Upload Image & Try Again."
			);

			isset($form_images['post_image']) and $post_image = $form_images['post_image'][0] or $post_image = "";

			$Post = $this->PostsModel->save([
				'category_id' => $category,
				'slug'        => $slug,
				'title'       => $title,
				'description' => $description,
				'post_image'  => $post_image,
				'status'      => true,
				'is_pinned'   => $pin,
				'created_by'  => $_SESSION['USER_ID'],
				'modified_by' => $_SESSION['USER_ID'],
				'post_type'   => $post
			]);

			flash_message(
				'add/post',
				$Post,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/posts',
				$Post,
				'success',
				"Post Successfully Created"
			);
		}

		$categories = $this->CategoriesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => [
				'post_type' => 'BLOG',
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
		$this->load->view('post/add', compact('categories'));
		$this->load->view('template/footer');
	}

	/** Load Post Post List Page */
	public function list_post()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('post_list') or show_404();

		$PostData = json_decode(json_encode([
			'type' => 'Posts'
		]));
		$Post = $this->PostsModel->all([
			'conditions' => [
				'status!='  => '3',
				'post_type' => 'BLOG',
			],
			'order' => [
				'by'   => 'id',
				'type' => 'DESC'
			]
		]);

		if (is($Post))
			foreach ($Post as $key => $val) {

				$user = $this->UsersModel->first($val['created_by']);

				empty($user) and $Post[$key]['created_by'] = '' or $Post[$key]['created_by'] =  ucwords($user['first_name'] . ' ' . $user['last_name']);


				if (is($val['category_id'])) {
					$user = $this->UsersModel->first($val['created_by']);
					$cats = $this->CategoriesModel->first($val['category_id']);

					empty($user) and $Post[$key]['created_by'] = '' or $Post[$key]['created_by'] =  ucwords($user['first_name'] . ' ' . $user['last_name']);
					empty($cats) and $Post[$key]['category_id'] = 'Self' or $Post[$key]['category_id'] = ucwords($cats['title']);
				} else {
					$user = $this->UsersModel->first($val['created_by']);

					empty($user) and $Post[$key]['created_by'] = '' or $Post[$key]['created_by'] =  ucwords($user['first_name'] . ' ' . $user['last_name']);
					$Post[$key]['category_id'] = 'Self';
				}
			}

		empty($Post) or is_array($Post) and $PostData = json_decode(json_encode([
			'type' => 'Posts',
			'data' => $Post
		]));


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('post/list', compact('PostData'));
		$this->load->view('template/footer');
	}

	/** Add Post Post */
	public function edit_post($id)
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('post_edit') or show_404();


		if ($this->input->post('editPost')) {

			$title       = $this->input->post('title');
			$description = $this->input->post('description');
			$category    = $this->input->post('category_id');
			$pin         = $this->input->post('postCheck');

			$slug = get_unique_slug('posts', $this->input->post('title'));

			/* Upload Images */
			$form_images = upload(['uploads/Post' => 'postImg']);

			isset($form_images['postImg']) and $post_image = $form_images['postImg'][0] or $post_image = $this->input->post('oldpostImg');

			$Post = $this->PostsModel->updateTable([
				'category_id'  => $category,
				'post_image'  => $post_image,
				'slug'        => $slug,
				'modified_by' => $_SESSION['USER_ID'],
				'title'       => $title,
				'description' => $description,
				'is_pinned'   => $pin
			], ['id' => $id]);

			flash_message(
				'edit/post/' . $id,
				$Post,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/posts',
				$Post,
				'success',
				"Post Updated Successfully"
			);
		}

		$PostData = '';
		$Post = $this->PostsModel->first([
			'conditions' => [
				'id'     => $id,
				'status!=' => '3',
			]
		]);

		empty($Post) or is_array($Post) and $PostData = json_decode(json_encode($Post));
		$categories = $this->CategoriesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => [
				'post_type' => 'BLOG',
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
		$this->load->view('post/edit', compact('PostData', 'categories'));
		$this->load->view('template/footer');
	}

	public function delete_post($id)
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('post_delete') or show_404();


		$Post = $this->PostsModel->updateTable([
			'status' => '3',
		], ['id' => $id]);
		flash_message(
			'list/posts',
			$Post,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/posts',
			$Post,
			'success',
			"Post Deleted Successfully"
		);
	}
}

    /* End of file Post.php */
