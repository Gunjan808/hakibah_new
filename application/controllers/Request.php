<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Request Pages & Queries */
class Request extends CI_Controller
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
			'RequestsModel',
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


	/** Add Request */
	public function add_request()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		if ($this->input->post('addRequest')) {

			flash_message(
				'add/request',
				$this->input->post('subject') and
					$this->input->post('email') and
					$this->input->post('desc'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			/* Upload Images */
			$form_images = upload(['uploads/request' => 'catImg']);

			isset($form_images['catImg']) and $request_image = $form_images['catImg'][0] or $request_image = "";

			$request = $this->RequestsModel->save([
				'subject'     => str_clean($this->input->post('subject'), [' ', '-', '_']),
				'email'       => $this->input->post('email'),
				'description' => $this->input->post('desc'),
				'image'       => $request_image,
				'status'      => true,
			]);

			flash_message(
				'add/request',
				$request,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/requests',
				$request,
				'success',
				"Request Added Successfully"
			);
		}

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('request/add');
		$this->load->view('template/footer');
	}


	/** Load Request List Page */
	public function list_request()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		$requestData = object([
			'type' => 'Requests'
		]);

		$request = $this->RequestsModel->all([
			'fields' => [
				'requests.id',
				'requests.subject',
				'requests.email',
				'requests.image',
				'requests.status',
				'requests.created_date'
			],
			'conditions' => [
				'requests.status!=' => '3',
			],
			'order' => [
				'by'   => 'requests.id',
				'type' => 'DESC'
			],
			'datatype' => 'json'
		]);

		empty($request) or is_array($request) and $requestData = object([
			'type' => 'Requests',
			'data' => $request
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('request/list', compact('requestData'));
		$this->load->view('template/footer');
	}


	/** Edit Request */
	public function edit_request($request_slug = null)
	{

		empty($request_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		if ($this->input->post('editRequest')) {

			flash_message(
				'edit/request/' . $request_slug,
				$this->input->post('subject') and
					$this->input->post('email') and
					$this->input->post('desc'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			/* Upload Images */
			$form_images = upload(['uploads/request' => 'catImg']);

			isset($form_images['catImg']) and $request_image = $form_images['catImg'][0] or $request_image = $this->input->post('oldcatImg');

			$request = $this->RequestsModel->updateTable([
				'subject'     => str_clean($this->input->post('subject'), [' ', '-', '_']),
				'email'       => $this->input->post('email'),
				'description' => $this->input->post('desc'),
				'image'       => $request_image,
			], ['id' => $request_slug]);

			flash_message(
				'edit/request/' . $request_slug,
				$request,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/requests',
				$request,
				'success',
				"Request Updated Successfully"
			);
		}

		$requestData = '';
		$request = $this->RequestsModel->first([
			'conditions' => [
				'id'       => $request_slug,
				'status!=' => '3',
			]
		]);
		is($request, 'array') or show_404();

		empty($request) or is_array($request) and $requestData = object($request);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('request/edit', compact('requestData'));
		$this->load->view('template/footer');
	}


	/** Delete Request */
	public function delete_request($request_slug = null)
	{
		empty($request_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		$request = $this->RequestsModel->updateTable([
			'status' => '3',
		], ['id' => $request_slug]);
		flash_message(
			'list/requests',
			$request,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/requests',
			$request,
			'success',
			"Request Deleted Successfully"
		);
	}
}

    /* End of file Request.php */
