<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Post Post Pages & Queries */
class Cpt extends CI_Controller
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

		$post_type = $this->uri->segment(3);
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
	public function add_post($cpt)
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('post_add') or show_404();

		if ($this->input->post('addPost')) {

			$config['upload_path']   = './uploads/free-downloads/';
			$config['allowed_types'] = '*';
			$config['max_size']      = 1024;
			$config['max_width']     = 1024;
			$config['max_height']    = 768;
			$config['file_name']     = $attachment_name = md5(time());

			if (isset($_FILES['attachment']) && !empty($_FILES['attachment'])) {

				$name = $_FILES['attachment']['name'];
				$larr = explode('.', $name);
				$ext  = end($larr);

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('attachment')) {
					$error = array('error' => $this->upload->display_errors());
				} else {
					$data = array('upload_data' => $this->upload->data());
				}

				if (isset($error) && !empty($error)) {
					flash_message(
						'add/cpt/' . $cpt,
						$this->input->post('title')
							and $this->input->post('cat'),
						'unsuccess',
						'Something Went Wrong',
						$error['error']
					);
				}

				$attachment = SITE_URL . 'uploads/free-downloads/' . $attachment_name . '.' . $ext;
			} else {
				$attachment = null;
			}

			flash_message(
				'add/cpt/' . $cpt,
				$this->input->post('title')
					and $this->input->post('cat'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$title             = $this->input->post('title');
			$short_description = $this->input->post('short_des');
			$description       = $this->input->post('description');
			$category          = $this->input->post('cat');
			$pin               = $this->input->post('postCheck');
			$r_price           = $this->input->post('r_price');
			$s_price           = $this->input->post('s_price');
			$post_type         = ($cpt) ? strtoupper($cpt) : 'BLOG';

			$a = rand(1, 10);

			$slug = str_clean($this->input->post('title'), [' ', '-', '_'], 'slug');
			$slug_exists = $this->PostsModel->first(['slug' => $slug]);
			is_null($slug_exists) or is_array($slug_exists) and $slug = increment_string($slug, '-', 1);

			$form_images = upload(['uploads/Post' => 'post_image']);

			isset($form_images['post_image']) and $post_image = $form_images['post_image'][0] or $post_image = "";

			$Post = $this->PostsModel->save([
				'category_id'       => $category,
				'slug'              => $slug,
				'title'             => $title,
				'short_description' => $short_description,
				'description'       => $description,
				'post_image'        => $post_image,
				'attachment'        => $attachment,
				'regular_price'     => $r_price,
				'sale_price'        => $s_price,
				'psm_regular_price' => $this->input->post('pr_price'),
				'psm_sale_price'    => $this->input->post('ps_price'),
				'status'            => true,
				'is_pinned'         => $pin,
				'created_by'        => $_SESSION['USER_ID'],
				'modified_by'       => $_SESSION['USER_ID'],
				'post_type'         => $post_type
			]);


			flash_message(
				'add/cpt/' . $cpt,
				$Post,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/cpt/' . $cpt,
				$Post,
				'success',
				"Post Successfully Created"
			);
		}


		$category = $this->CategoriesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => [
				'status!='  => '3'
			],
			'datatype' => 'json'
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('cpt/add', compact('category'));
		$this->load->view('template/footer');
	}

	/** Load Post Post List Page */
	public function list_post($cpt)
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
				'status!=' => '3',
				'post_type' => strtoupper($cpt),
			],
			'order' => [
				'by'   => 'id',
				'type' => 'DESC'
			]
		]);

		if (is($Post)) {
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
		}

		empty($Post) or is_array($Post) and $PostData = json_decode(json_encode([
			'type' => 'Posts',
			'data' => $Post
		]));


		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('cpt/list', compact('PostData'));
		$this->load->view('template/footer');
	}

	/** Add Post Post */
	public function edit_post($cpt, $id)
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		user_can('post_edit') or show_404();

		if ($this->input->post('editPost')) {
			$title             = $this->input->post('title');
			$short_description = $this->input->post('short_des');
			$description       = $this->input->post('description');
			$category          = $this->input->post('category');
			$pin               = $this->input->post('postCheck');
			$r_price           = $this->input->post('r_price');
			$s_price           = $this->input->post('s_price');
			$post_type         = ($cpt) ? strtoupper($cpt) : 'BLOG';

			$slug        = str_clean($this->input->post('title'), [' ', '-', '_'], 'slug');
			$slug_exists = $this->PostsModel->first(['slug' => $slug, 'id !=' => $this->input->post('product_id')]);
			is_null($slug_exists) or is_array($slug_exists) and $slug = increment_string($slug, '-', 1);

			$form_images = upload(['uploads/Post' => 'post_image']);

			isset($form_images['post_image']) and $post_image = $form_images['post_image'][0] or $post_image = $this->input->post('oldpost_image');

			$Post = $this->PostsModel->updateTable([
				'category_id'       => $category,
				'slug'              => $slug,
				'title'             => $title,
				'short_description' => $short_description,
				'description'       => $description,
				'post_image'        => $post_image,
				// 'attachment'        => $attachment,
				'regular_price'     => $r_price,
				'sale_price'        => $s_price,
				'psm_regular_price' => $this->input->post('pr_price'),
				'psm_sale_price'    => $this->input->post('ps_price'),
				'status'            => true,
				'is_pinned'         => $pin,
				'created_by'        => $_SESSION['USER_ID'],
				'modified_by'       => $_SESSION['USER_ID'],
				'post_type'         => $post_type
			], ['id' => $id]);

			flash_message(
				'edit/cpt/' . $id,
				$Post,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/cpt/' . $cpt,
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

		// die(var_dump($Post));
		empty($Post) or is_array($Post) and $PostData = json_decode(json_encode($Post));

		$category = json_decode(json_encode($this->CategoriesModel->all([
			'conditions' => ['status!=' => '3'],
			'fields' => ['id', 'title']
		])));
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('cpt/edit', compact('category', 'PostData'));
		$this->load->view('template/footer');
	}

	public function delete_post($cpt, $id)
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
			'list/cpt',
			$Post,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/cpt',
			$Post,
			'success',
			"Post Deleted Successfully"
		);
	}
}

    /* End of file Post.php */
