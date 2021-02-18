<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Report Pages & Queries */
class Report extends CI_Controller
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
		$this->load->model(['ReportsModel', 'UsersModel', 'DocumentsModel']);
	}


	/** Load Default Index To Show 404 Error
	 *
	 * @return void */
	public function index()
	{
		return show_404();
	}


	/** Add Report */
	public function add_report()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		if ($this->input->post('addReport')) {

			flash_message(
				'add/report',
				$this->input->post('reason') and
					$this->input->post('document_id') and
					$this->input->post('user_id'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$report = $this->ReportsModel->save([
				'user_id'      => $this->input->post('user_id'),
				'study_doc_id' => $this->input->post('document_id'),
				'reason'       => $this->input->post('reason')
			]);

			flash_message(
				'add/report',
				$report,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/reports',
				$report,
				'success',
				"Report Added Successfully"
			);
		}

		$users = $this->UsersModel->all([
			'fields'     => ['id', 'first_name', 'last_name'],
			'conditions' => [
				'user_type' => 'SUBSCRIBER',
				'status'    => true
			],
			'order' => [
				'by'   => 'first_name',
				'type' => 'asc'
			],
			'datatype' => 'json'
		]);

		$documents = $this->DocumentsModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => [
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
		$this->load->view('report/add', compact('users', 'documents'));
		$this->load->view('template/footer');
	}


	/** Load Report List Page */
	public function list_report()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		$reportData = object([
			'type' => 'Reports'
		]);

		$report = $this->ReportsModel->all([
			'fields' => [
				'study_doc_reports.id',
				'study_doc_reports.reason',
				'study_doc_reports.created_date',
				'users.first_name as created_by',
				'study_docs.title as document'
			],
			'join'  => [
				['study_docs', 'study_docs.id = study_doc_reports.study_doc_id'],
				['users', 'users.id = study_doc_reports.user_id']
			],
			'order' => [
				'by'   => 'study_doc_reports.id',
				'type' => 'DESC'
			],
			'datatype' => 'json'
		]);

		empty($report) or is_array($report) and $reportData = object([
			'type' => 'Reports',
			'data' => $report
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('report/list', compact('reportData'));
		$this->load->view('template/footer');
	}


	/** Edit Report */
	public function edit_report($report_slug = null)
	{

		empty($report_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		if ($this->input->post('editReport')) {

			flash_message(
				'edit/report/' . $report_slug,
				$this->input->post('title'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$report_exists = $this->ReportsModel->first([
				'title' 	=> str_clean($this->input->post('title'), [' ', '-', '_']),
				'slug!=' 	=> $report_slug
			]);

			is_null($report_exists) or is_array($report_exists) and $report_exists = $report_exists['title'];

			flash_message(
				'edit/report/' . $report_slug,
				empty($report_exists),
				'unsuccess',
				'Something Went Wrong',
				"Oops, Report Already Exists,<br>Please Try With Another Report."
			);

			/* Slug */
			$slug = get_unique_slug('reports', $this->input->post('title'));

			/* Upload Images */
			$form_images = upload(['uploads/report' => 'catImg']);

			isset($form_images['catImg']) and $report_image = $form_images['catImg'][0] or $report_image = $this->input->post('oldcatImg');

			$report = $this->ReportsModel->updateTable([
				'slug'        => $slug,
				'title'       => $this->input->post('title'),
				'image'       => $report_image,
				'modified_by' => $_SESSION['USER_ID'],
				'status'      => true,
			], ['slug' => $report_slug]);

			flash_message(
				'edit/report/' . $report_slug,
				$report,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/reports',
				$report,
				'success',
				"Report Created Successfully"
			);
		}

		$reportData = '';
		$report = $this->ReportsModel->first([
			'conditions' => [
				'id' => $report_slug
			]
		]);
		is($report, 'array') or show_404();

		empty($report) or is_array($report) and $reportData = object($report);


		$users = $this->UsersModel->all([
			'fields'     => ['id', 'first_name', 'last_name'],
			'conditions' => [
				'user_type' => 'SUBSCRIBER',
				'status'    => true
			],
			'order' => [
				'by'   => 'first_name',
				'type' => 'asc'
			],
			'datatype' => 'json'
		]);

		$documents = $this->DocumentsModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => [
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
		$this->load->view('report/edit', compact('reportData', 'users', 'documents'));
		$this->load->view('template/footer');
	}


	/** Delete Report */
	public function delete_report($report_slug = null)
	{
		empty($report_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		$report = $this->ReportsModel->updateTable([
			'status' => '3',
		], ['slug' => $report_slug]);
		flash_message(
			'list/reports',
			$report,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/reports',
			$report,
			'success',
			"Report Deleted Successfully"
		);
	}
}

    /* End of file Report.php */
