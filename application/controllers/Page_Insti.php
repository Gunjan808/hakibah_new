<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load FrontEnd Pages */
class Page_Insti extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->library('encryption');
		$this->load->library('pdf');

		//Do your magic here
		$this->load->model([
			'JobsModel',
			'CareerModel',
			'UsersModel',
			'ProductsModel',
			'SettingsModel',
			'Filter_ValuesModel',
			'FiltersModel',
			'Filter_Product_Category_RelationsModel',
			'PostsModel',
			'GalleryModel',
			'OrdersModel',
			'User_MetaModel'
		]);
	}


	/** Load Default Index To Show 404 Error
	 *
	 * @return void */
	public function index()
	{
		return show_404();
	}

	/** View FrontEnd Pages
	 *
	 * @param string $Pages
	 * @return void */
	public function view($Pages = 'home', $data)
	{
		$path = APPPATH . '../public' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . 'insti' . DIRECTORY_SEPARATOR . $Pages . '.php';

		$slider 	= [];
		$site   	= [];
		$city   	= [];
		$cat_courses = [];
		$cat_admissions = [];
		$cat_student_zone = [];

		file_exists($path)
			and $site = $this->SettingsModel->get_header_option() or show_404();
		file_exists($path)
			and $slider = get_data_from('sliders');

		if (file_exists($path)) {
			$courses = $this->PostsModel->all([
				'fields'     => [
					'posts.id',
					'posts.title as post_title',
					'posts.slug as post_slug',
					'posts.category_id',
					'categories.id as category_id',
					'categories.title as category_title'
				],
				'conditions' => [
					'posts.status'    => true,
					'posts.post_type' => 'COURSES'
				],
				'join'     => [['categories', 'categories.id = posts.category_id']],
				'datatype' => 'json'
			]);

			if (!empty($courses)) {
				$tmp_cate_id = '';
				foreach ($courses as $course) {
					if ($tmp_cate_id != $course->category_id) {
						$cat_courses[$course->category_title][] = $course;
					} else {
						$cat_courses[$course->category_title][] = $course;
					}
					$tmp_cate_id = $course->category_id;
				}
			}

			$admissions = $this->PostsModel->all([
				'fields'     => [
					'posts.id',
					'posts.title as post_title',
					'posts.slug as post_slug',
					'posts.category_id',
					'categories.id as category_id',
					'categories.title as category_title',
					'categories.slug as category_slug'
				],
				'conditions' => [
					'posts.status'    => true,
					'posts.post_type' => 'ADMISSION'
				],
				'join'     => [['categories', 'categories.id = posts.category_id']],
				'datatype' => 'json'
			]);
			if (!empty($admissions)) {
				$tmp_cate_id = '';
				foreach ($admissions as $admission) {
					// print_r($course);
					// die;
					if ($tmp_cate_id != $admission->category_id) {
						//echo 'm ->' . $course->category_id;
						$cat_admissions[$admission->category_title][] = $admission;
					} else {
						$cat_admissions[$admission->category_title][] = $admission;
					}
					//echo '<br>';
					$tmp_cate_id = $admission->category_id;
				}
			}

			$student_zone = $this->PostsModel->all([
				'fields'     => [
					'posts.id',
					'posts.title as post_title',
					'posts.slug as post_slug',
					'posts.category_id',
					'categories.id as category_id',
					'categories.title as category_title',
					'categories.slug as category_slug'
				],
				'conditions' => [
					'posts.status'    => true,
					'posts.post_type' => 'STUDENTZONE'
				],
				'join'     => [['categories', 'categories.id = posts.category_id']],
				'datatype' => 'json'
			]);
			if (!empty($student_zone)) {
				$tmp_cate_id = '';
				foreach ($student_zone as $single_student_zone) {
					// print_r($course);
					// die;
					if ($tmp_cate_id != $single_student_zone->category_id) {
						//echo 'm ->' . $course->category_id;
						$cat_student_zone[$single_student_zone->category_title][] = $single_student_zone;
					} else {
						$cat_student_zone[$single_student_zone->category_title][] = $single_student_zone;
					}
					//echo '<br>';
					$tmp_cate_id = $single_student_zone->category_id;
				}
			}
		}

		show_debug($site);

		file_exists($path) and $this->load->view('pages/insti/components/header', compact('site', 'slider', 'cat_courses', 'cat_admissions', 'cat_student_zone'));
		file_exists($path) and $this->load->view('pages/insti/' . $Pages, compact('data'));
		file_exists($path) and $this->load->view('pages/insti/components/footer');
	}

	public function applyOnline()
	{
		if ($this->input->post('user_add')) {
			// die(json_encode($_POST));

			flash_message(
				'apply-online',
				$this->input->post('apply_for_class') and
					$this->input->post('course') and
					$this->input->post('study_center') and
					$this->input->post('medium') and
					$this->input->post('name') and
					$this->input->post('email') and
					$this->input->post('mobile') and
					$this->input->post('dob') and
					$this->input->post('gender') and
					$this->input->post('father_name') and
					$this->input->post('mother_name') and
					$this->input->post('father_occ') and
					$this->input->post('designation') and
					$this->input->post('department') and
					$this->input->post('p_address') and
					$this->input->post('c_address') and
					$this->input->post('city') and
					$this->input->post('state') and
					$this->input->post('pincode') and
					$this->input->post('resi_tel') and
					$this->input->post('tel_office') and
					$this->input->post('school_name') and
					$this->input->post('school_city') and
					$this->input->post('c_class') and
					$this->input->post('qualified') and
					$this->input->post('cast'),
				'unsccuess',
				'Look\'s Like Form is Empty',
				'Oops, User\'s Basic Details is Empty. Please Fill & Try Again'
			);

			$email  = $this->input->post('email');
			$mobile = $this->input->post('mobile');

			$user_exists = $this->UsersModel->first([
				'conditions' => "`email` = '$email' OR `mobile` = '$mobile'"
			]);

			flash_message(
				'apply-online',
				is_null($user_exists),
				'unsuccess',
				'Details are Already Exist',
				'Email or Password Already exist.'
			);

			$password = rand(100000, 999999);

			$user_id  = $this->UsersModel->save([
				'first_name' => $this->input->post('name'),
				'email'      => $this->input->post('email'),
				'mobile'     => $this->input->post('mobile'),
				'dob'        => $this->input->post('dob'),
				'gender'     => $this->input->post('gender'),
				'pincode'    => $this->input->post('pincode'),
				'password'   => hash_hmac('sha1', $password, 'tws-tech'),
				'status'     => true
			]);

			flash_message(
				'apply-online',
				is($user_id),
				'unsuccess',
				'Something Went Wrong',
				'Try Sometime Later'
			);

			($this->input->post('qualified') and $this->input->post('qualified') === 'yes') and flash_message(
				'apply-online',
				$this->input->post('qualified_level'),
				'unsuccess',
				'Please Define Qualified Level'
			);

			($this->input->post('cast') and $this->input->post('cast') === 'reserved') and flash_message(
				'apply-online',
				$this->input->post('cast_name'),
				'unsuccess',
				'Please Define Cast Name'
			);

			is($_POST['qualified']) and is($_POST['qualified_level'])
				and $this->input->post('qualified') === 'yes'
				and $qualified = $this->input->post('qualified_level') . ' ' . $this->input->post('qualified')
				or  $qualified = $this->input->post('qualified');

			is($_POST['cast']) and is($_POST['cast_name'])
				and $this->input->post('cast') === 'reserved'
				and $cast = $this->input->post('cast_name') . ' ' . $this->input->post('cast') or  $cast = $this->input->post('cast');

			$user_meta_id  = $this->User_MetaModel->save([
				'user_id'         => $user_id,
				'apply_for_class' => $this->input->post('apply_for_class'),
				'course'          => $this->input->post('course'),
				'study_center'    => $this->input->post('study_center'),
				'medium'          => $this->input->post('medium'),
				'nick_name'       => $this->input->post('nick_name'),
				'p_address'       => $this->input->post('p_address'),
				'c_address'       => $this->input->post('c_address'),
				'city'            => $this->input->post('city'),
				'state'           => $this->input->post('state'),
				'blood_group'     => $this->input->post('blood_group'),
				'resi_tel'        => $this->input->post('resi_tel'),
				'father_name'     => $this->input->post('father_name'),
				'mother_name'     => $this->input->post('mother_name'),
				'father_occ'      => $this->input->post('father_occ'),
				'designation'     => $this->input->post('designation'),
				'department'      => $this->input->post('department'),
				'tel_office'      => $this->input->post('tel_office'),
				'school_name'     => $this->input->post('school_name'),
				'school_city'     => $this->input->post('school_city'),
				'c_class'         => $this->input->post('c_class'),
				'qualified_level' => $qualified,
				'cast'            => $cast,

				'class_1'       => $this->input->post('class_1'),
				'school_name_1' => $this->input->post('school_name_1'),
				'year_1'        => $this->input->post('year_1'),
				'board_1'       => $this->input->post('board_1'),
				'maths_1'       => $this->input->post('maths_1'),
				'science_1'     => $this->input->post('science_1'),
				'pcmb_1'        => $this->input->post('pcmb_1'),
				'aggr_1'        => $this->input->post('aggr_1'),

				'class_2'       => $this->input->post('class_2'),
				'school_name_2' => $this->input->post('school_name_2'),
				'year_2'        => $this->input->post('year_2'),
				'board_2'       => $this->input->post('board_2'),
				'maths_2'       => $this->input->post('maths_2'),
				'science_2'     => $this->input->post('science_2'),
				'pcmb_2'        => $this->input->post('pcmb_2'),
				'aggr_2'        => $this->input->post('aggr_2'),

				'competitive'   => $this->input->post('competitive'),
			]);

			flash_message(
				'apply-online',
				is($user_id) and is($user_meta_id),
				'unsuccess',
				'Something Went Wrong'
			);

			if (is($user_id) and is($user_meta_id)) {
				$msg = "Your are registered at " . SITE_NAME . ", login with username " . $this->input->post('mobile') . " and password  " . $password;

				shootMsg(
					$msg,
					$this->input->post('mobile')
				);

				sendMail($email, 'You Are Successfully Enrolled', $msg);
			}

			flash_message(
				'apply-online',
				is($user_id) and is($user_meta_id),
				'success',
				'Successful',
				'Your Response has been Submitted'
			);
		}

		$data['courses'] = $this->PostsModel->all([
			'conditions' => [
				'post_type' => 'COURSES',
				'status'    => '1'
			],
			'datatype' => 'json'
		]);
		return $this->view('applyonline', $data);
	}

	public function addFrancise()
	{
		if ($this->input->post('frAdd')) {

			is($_POST['currentUrl'])
				and $current_url = $this->input->post('currentUrl')
				or $current_url = '';

			flash_message(
				$current_url,
				$this->input->post('name') and
					$this->input->post('email') and
					$this->input->post('mobile') and
					$this->input->post('association') and
					$this->input->post('profession') and
					$this->input->post('state') and
					$this->input->post('city') and
					$this->input->post('pincode') and
					$this->input->post('address') and
					$this->input->post('message'),
				'unsccuess',
				'Look\'s Like Form is Empty',
				'Oops, User\'s Basic Details is Empty. Please Fill & Try Again'
			);

			$user = $this->UsersModel->save([
				'first_name'  => $this->input->post('name'),
				'email'       => $this->input->post('email'),
				'mobile'      => $this->input->post('mobile'),
				'user_type'   => 'SUBSCRIBER',
				'requirement' => $this->input->post('association'),
				'comment'     => $this->input->post('message'),
				'about'       => 'Profession: ' . $this->input->post('profession') . '<br>Address: ' . $this->input->post('address') . '<br>' . $this->input->post('city') . '<br>' . $this->input->post('state'),
				'pincode'     => $this->input->post('pincode'),
				'lead_from'   => 'ASSOCIATE PROGRAM',
				'status'      => '17',
			]);
			flash_message(
				$current_url,
				$user,
				'unsuccess',
				'Something Went Wrong'
			);

			flash_message(
				$current_url,
				$user,
				'success',
				'Your Request has been Submitted'
			);
		}
		flash_message(
			$current_url,
			$user,
			'unsuccess',
			'Something Went Wrong'
		);
	}

	/** Online Fauclty Agreement */
	public function facultyAgreement()
	{
		$this->pdf->agreement(1, [
			'name'             => 'krishna',
			'email'            => 'krishna@gmail.com',
			'mobile'           => '7014569040',
			'pan'              => 'EFDSE48145',
			'currentAddress'   => 'House 42, Kota (Rajasthan)',
			'permanentAddress' => 'House 50, Kota (Rajasthan)',
			'signature'        => $this->SettingsModel->get_option('site_signature_image')
		], $this->SettingsModel->get_option('site_signature_image'), '24-12-2020');
		die;
		$this->load->view('pages/insti/facultyAgreement');
	}

	public function offerLetter()
	{
		$this->pdf->offerLetter(1, [
			'name'             => 'krishna',
			'email'            => 'krishna@gmail.com',
			'mobile'           => '7014569040',
			'pan'              => 'EFDSE48145',
			'currentAddress'   => 'House 42, Kota (Rajasthan)',
			'permanentAddress' => 'House 50, Kota (Rajasthan)',
			'subject'          => 'Maths',
			'signature'        => $this->SettingsModel->get_option('site_signature_image')
		], $this->SettingsModel->get_option('site_signature_image'), '24-12-2020');
		die;
		$this->load->view('pages/insti/offerLetter');
	}

	public function offlineOfferLetter()
	{
		$this->pdf->offlineOfferLetter(1, 'krishna', 'sdfsd', 'sdfsd', '24-12-456');
		die;
		$this->load->view('pages/insti/offerLetter');
	}

	public function offlineFacultyAgreement()
	{
		$this->pdf->offlineAgreement(1, 'krishna', 'sdfsd', 'sdfsd', '24-12-456');
		die;
		$this->load->view('pages/insti/offlineFacultyAgreement');
	}

	public function welcomeEmployee()
	{
		$this->pdf->welcomeEmployee(1, 'Krishna', $this->SettingsModel->get_option('site_signature_image'), $this->SettingsModel->get_option('site_signature_image'),);
		die;
		$this->load->view('pages/insti/offlineFacultyAgreement');
	}

	public function f_add_user()
	{
		if ($this->input->post('user_add')) {
			flash_message(
				'',
				$this->input->post('name') and
					$this->input->post('email') and
					$this->input->post('mobile'),
				'unsccuess',
				'Look\'s Like Form is Empty',
				'Oops, User\'s Basic Details is Empty. Please Fill & Try Again'
			);
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$current_url = $this->input->post('current_url');
			$url = str_replace(SITE_URL, "", $current_url);

			$user_exists = $this->UsersModel->first(['conditions' => "`email` = '$email' OR `mobile` = '$mobile'"]);

			flash_message(
				'',
				is_null($user_exists),
				'unsuccess',
				'Details are Already Exist',
				'Email or Password Already exist.'
			);

			$password = rand(100000, 999999);
			$user_id  = $this->UsersModel->save([
				'email'      => $this->input->post('email'),
				'mobile'     => $this->input->post('mobile'),
				'first_name' => $this->input->post('name'),
				'password'   => hash_hmac('sha1', $password, 'tws-tech'),
				'status'     => true

			]);

			if (!empty($user_id)) {
				$msg = "Your are registered at " . SITE_NAME . ", login with username " . $this->input->post('mobile') . " and password  " . $password;

				shootMsg($msg, $this->input->post('mobile'));
			}

			flash_message(
				$url,
				!is_null($user_id),
				'success',
				'Successful',
				'Your Response has been Submitted'
			);
		}
	}

	public function f_login_user()
	{

		if ($this->input->post('user_login')) {

			flash_message(
				'',
				$this->input->post('email_login') and
					$this->input->post('password_login'),
				'unsccuess',
				'Look\'s Like Form is Empty',
				'Oops, User\'s Basic Details is Empty. Please Fill & Try Again'
			);

			$email       = $this->input->post('email_login');
			$password    = $this->input->post('password_login');
			$current_url = $this->input->post('current_url');
			$url = str_replace(SITE_URL, "", $current_url);

			$user_exists = $this->UsersModel->first(['conditions' => [
				'email'    => $email,
				'password' => hash_hmac('sha1', $password, PASSWORD_SALT)
			]]);

			flash_message(
				'',
				is($user_exists) and is($user_exists['id']),
				'unsccuess',
				'Invalid Login Details'
			);

			$this->session->set_userdata([
				'USER_ID'       => $user_exists['id'],
				'USER_NAME'     => ucwords($user_exists['first_name']),
				'USER_FULLNAME' => ucwords($user_exists['first_name'] . ' ' . $user_exists['last_name']),
				'USER_EMAIL'    => $user_exists['email'],
				'USER_MOBILE'   => $user_exists['mobile'],
				'LOGIN'         => 'login',
				'USER_TYPE'     => $user_exists['user_type']
			]);

			flash_message(
				$url,
				!is_null($user_exists) and is_array($user_exists),
				'success',
				'Welcome Back, ' . $_SESSION['USER_NAME'],
				'Nice To See You, Have A Nice Day.'
			);
		}
	}

	/** Load Home Page Data
	 *
	 * @return mixed */
	function home()
	{
		$data['courses'] = $this->PostsModel->all([
			'conditions' => [
				'post_type' => 'COURSES',
				'status'    => '1',
				'is_pinned' => '1'
			]
		]);

		$data['blogs'] = $this->PostsModel->all([
			'fields'     => ['posts.*', 'categories.title as category_title'],
			'conditions' => [
				'posts.post_type' => 'BLOG',
				'posts.status'    => '1',
				'posts.is_pinned' => '1'
			],
			'join'     => [['categories', 'categories.id = posts.category_id']],
			'datatype' => 'json'
		]);

		$data['testimonials'] = $this->PostsModel->all([
			'conditions' => [
				'post_type' => 'TESTIMONIALS',
				'status'    => '1'
			],
			'datatype' => 'json'
		]);

		$data['latestnews'] = $this->PostsModel->all([
			'conditions' => [
				'post_type' => 'LATESTNEWS',
				'status'    => '1'
			],
			'datatype' => 'json'
		]);
		$data['slider'] = get_data_from('sliders');

		show_debug($data['slider']);
		show_debug($data['blogs']);
		show_debug($data['testimonials']);
		// show_debug($data['courses']);

		return $this->view('home', $data);
	}

	public function single_blog(string $slug = null)
	{
		$data = [];
		if (is($slug)) {
			$data['blog'] = $this->PostsModel->first([
				'conditions' => [
					'slug'   => $slug,
					'status' => true
				],
				'datatype' => 'json'
			]);

			show_debug($data);
		}
		return $this->view('single-blog', $data);
	}

	// course function
	function course($slug)
	{
		if ($this->input->post('final_price')) {

			flash_message(
				'course/' . $slug,
				$this->input->post('product_id')
					and $this->input->post('type')
					and $this->input->post('transition_id')
					and $this->input->post('final_price'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$order_group_id = random_string('nozero', 8);
			$last = $this->OrdersModel->first(['order_group_id' => 'ODR' . $order_group_id]);
			is($last, 'array') and $order_group_id = random_string('nozero', 8);

			is($_POST['transition_id'])
				and $transaction = $this->input->post('transition_id')
				or $transaction = random_string('md5', 20);

			$this->agent->is_mobile()   and $device_type = 'mobile';
			$this->agent->is_browser()  and $device_type = 'web';
			!$this->agent->is_browser() and !$this->agent->is_mobile() and $device_type = 'rest';

			foreach ($this->input->post('type') as $type) {
				$order_id = $this->OrdersModel->save([
					'order_group_id'   => 'ODR' . $order_group_id,
					'user_id'          => $_SESSION['USER_ID'],
					'product_id'       => $this->input->post('product_id'),
					'product_quantity' => true,
					'total_amount'     => $this->input->post('final_price'),
					'total_paid'       => $this->input->post('final_price'),
					'remark'           => $type,
					'payment_mode'     => 'online',
					'payment_status'   => true,
					'delivery_status'  => true,
					'status'           => true,
					'transaction_id'   => $transaction,
					'transaction_msg'  => 'frontend',
					'user_ip'          => $this->input->ip_address(),
					'browser'          => $this->agent->browser(),
					'browser_version'  => $this->agent->version(),
					'device_type'      => $device_type,
					'os'               => $this->agent->platform(),
					'mobile_device'    => $this->agent->mobile(),
					'created_by'       => $_SESSION['USER_ID'],
					'modified_by'      => $_SESSION['USER_ID'],
				]);
			}

			flash_message(
				'course/' . $slug,
				$order_id,
				'unsuccess',
				'Something Went Wrong'
			);

			flash_message(
				'course/' . $slug,
				$order_id,
				'success',
				'Order Added Successfully'
			);
		}

		$data['post'] = $this->PostsModel->first([
			'conditions' => ['slug' => $slug],
			'datatype'   => 'json'
		]);

		return $this->view('course', $data);
	}

	function cpt_blog($slug)
	{
		$single_post  = $this->PostsModel->first(['conditions' => ['slug' => $slug]]);
		$data['post'] = $single_post;

		return $this->view('cpt-blog', $data);
	}


	// UserAccount function
	public function my_profile()
	{
		flash_message(
			'home',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		$check_user = $_SESSION['USER_EMAIL'];

		$user = $this->UsersModel->first(['conditions' => ['email' => $check_user]]);

		$data['user'] = $user;
		return $this->view('my-profile', $data);
	}

	public function free_download()
	{
		$data['freeDownlods'] = $this->PostsModel->all([
			'conditions' => [
				'post_type' => 'FREEDOWNLOADS',
				'status'    => true
			]
		]);

		return $this->view('free-downloads', $data);
	}

	public function courses()
	{
		$data['courses'] = $this->PostsModel->all([
			'conditions' => [
				'post_type' => 'COURSES',
				'status'    => true
			]
		]);

		return $this->view('courses', $data);
	}

	public function logout()
	{

		flash_message(
			'home',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);
		unset($_SESSION['USER_USERNAME'], $_SESSION['USER_NAME'], $_SESSION['USER_EMAIL'], $_SESSION['USER_MOBILE'], $_SESSION['USER_TYPE']);
		flash_message(
			'home',
			true,
			'success',
			'Your Account Logout Successfully',
			'See You Later.'
		);
	}

	// career function
	public function career()
	{
		if ($this->input->post('apply')) {
			flash_message(
				'career',
				$this->input->post('name')
					and $this->input->post('email')
					and $this->input->post('mobile')
					and $this->input->post('job_id	')
					and $this->input->post('experience')
					and $this->input->post('qualification')
					and $this->input->post('pancard')
					and $this->input->post('address'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$config['upload_path']   = './uploads/resume/';
			$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc';
			$config['max_size']      = 1024 * 5;
			$config['max_width']     = 1024;
			$config['max_height']    = 768;
			$config['file_name']     = $file_name = md5(time());

			if (is($_FILES['resume'])) {

				$name = $_FILES['resume']['name'];
				$larr = explode('.', $name);
				$ext = end($larr);

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('resume')) {
					$error = array('error' => $this->upload->display_errors());
				} else {
					$data = array('upload_data' => $this->upload->data());
				}
			}

			is($error)
				and flash_message(
					'career',
					false,
					'unsuccess',
					'Something Went Wrong',
					'Uploaded document not Supported.'
				);

			$application = $this->CareerModel->save([
				'name'          => $this->input->post('name'),
				'mobile'        => $this->input->post('mobile'),
				'email'         => $this->input->post('email'),
				'job_id'        => $this->input->post('job_id'),
				'pancard'       => $this->input->post('pancard'),
				'address'       => $this->input->post('address'),
				'subject'       => $this->input->post('subject'),
				'experience'    => $this->input->post('experience'),
				'qualification' => $this->input->post('qualification'),
				'category_name' => $this->input->post('category'),
				'message'       => $this->input->post('desc'),
				'resume'        => SITE_URL . 'uploads/resume/' . $file_name . '.' . $ext,
				'status'        => '0',
				'created_by'    => $_SESSION['USER_ID'],
				'modified_by'   => $_SESSION['USER_ID'],
			]);

			flash_message(
				'career',
				$application,
				'unsuccess',
				'Something Went Wrong',
				'Please Try Again After Some Time.'
			);

			flash_message(
				'career',
				$application,
				'success',
				'Thanks For Your Request',
				'We will catch up Soon.'
			);
		}

		$data = $this->JobsModel->all([
			'feilds'     => ['id', 'title'],
			'conditions' => [
				'status!='  => 3
			],
			'datatype' => 'json'
		]);

		return $this->view('career', $data);
	}


	public function change_status($status, $id)
	{
		$application = $this->CareerModel->first($id);

		$id      = $application['id'];
		$email   = $application['email'];
		$name    = $application['name'];
		$mobile  = $application['mobile'];
		$date    = date('M d, Y', strtotime($application['modified_date']));
		$pan     = $application['pancard'];
		$address = $application['address'];
		$file    = '';

		if ($status === 'approved') {
			$token = random_string('unique', 12);

			$this->pdf->agreement($id, [
				'name'             => $name,
				'email'            => $email,
				'mobile'           => $mobile,
				'pan'              => $pan,
				'currentAddress'   => $address,
				'permanentAddress' => '',
				'signature'        => ''
			], $this->SettingsModel->get_option('site_signature_image'), $date, 'F');

			$set   = [
				'status'       => 2,
				'token'        => $token,
				'offer-letter' => $file
			];

			$subject = $name . ', Job Application is Approved';
			$msg_mob = 'Dear ' . $name . ' Your resume is selected, please send us acceptance.';
			$msg     = 'Dear ' . $name . '<br>' . 'Your resume is selected, please send us acceptance by clicking this Link. <br/> <a style="display: inline-block;background: #7e00ec;color: #fff;text-decoration: none;padding: 3%;border-radius: 12px;margin: 2% auto;" href="' . SITE_URL . 'review-job-request/' . $id . '/' . $token . '">Accpet Request</a>';
		} elseif ($status === 'accepted') {

			$token = random_string('unique', 12);
			$file  = $this->pdf->offerLetter($id, $name, $email, $mobile, $date, 'F');
			$set   = [
				'status'       => 2,
				'token'        => $token,
				'offer-letter' => $file
			];

			$subject = $name . ', Job Application is Accepted';
			$msg_mob = 'Dear ' . $name . ' Your resume is selected, please send us acceptance.';
			$msg     = 'Dear ' . $name . '<br>' . 'Your resume is selected, please send us acceptance by clicking this Link. <br/> <a style="display: inline-block;background: #7e00ec;color: #fff;text-decoration: none;padding: 3%;border-radius: 12px;margin: 2% auto;" href="' . SITE_URL . 'review-job-request/' . $id . '/' . $token . '">Accpet Request</a>';
		} elseif ($status === 'reject') {

			$set     = ['status' => 5];
			$subject = $name . ', Job Application is Rejected';
			$msg_mob = 'Dear ' . $name . ' Your Offer Letter is rejected for Because Some Document are not correct.';
			$msg     = 'Dear ' . $name . '<br>' . 'Your Offer Letter is rejected for Because Some Document are not correct.';
		} elseif ($status === 'save-later') {

			$set     = ['status' => 3];
			$subject = $name . ', Job Application is Save for Later';
			$msg_mob = 'Dear ' . $name . ' Your resume is save for later.';
			$msg     = 'Dear ' . $name . '<br>' . 'Your resume is save for later.';
		}

		$where 	= ['id' => $id];

		if (is($set)) {
			$this->CareerModel->updateTable($set, $where);
		}

		if (is($email)) {
			if (is($file)) {
				sendMail($email, $subject, $msg, $file, 'html');
				die('Send Mail With File');
			} else {
				sendMail($email, $subject, $msg, '', 'html');
				die('Send Mail Without File');
			}
		}

		if (is($mobile)) {
			shootMsg($msg_mob, $mobile);
		}

		flash_message(
			'list/career',
			true,
			'success',
			'Updated Succesfully',
			'Application status update succesfully.'
		);
	}


	public function acceptJob($id = null, $token = null)
	{
		if (!is($id) and !is($token))
			return show_404();

		$application = $this->CareerModel->first(['id' => $id, 'token' => $token]);

		is($application, 'array') or show_404();

		$id       = $application['id'];
		$email    = $application['email'];
		$name     = $application['name'];
		$mobile   = $application['mobile'];
		$password = $name . rand(0000, 9999);
		$date     = date('M d, Y', strtotime($application['modified_date']));
		$pan      = $application['pancard'];
		$address  = $application['address'];
		$data     = [];

		$data['id'] = $id;

		if ($this->input->post('aagreeSubmit')) {
			flash_message(
				'',
				is($_FILES['signature']) and is($_FILES['signature_1']),
				'unsuccess',
				'Form not Field',
				'Please Upload Signature & ThumbPrint'
			);

			$form_images   = upload(['userSignature' => 'signature']);
			$form_images_1 = upload(['userSignature' => 'signature_1']);

			isset($form_images['signature']) and $signature_image = $form_images['signature'][0] or $signature_image = "";

			isset($form_images_1['signature_1']) and $signature_1_image = $form_images_1['signature_1'][0] or $signature_1_image = "";

			$this->pdf->agreement($id, [
				'name'             => $name,
				'email'            => $email,
				'mobile'           => $mobile,
				'pan'              => $pan,
				'currentAddress'   => $address,
				'permanentAddress' => '',
				'signature'        => $signature_image,
				'signature_1'      => $signature_1_image,
			], $this->SettingsModel->get_option('site_signature_image'), $date, 'F');

			$this->CareerModel->updateTable([
				'signature'   => $signature_image,
				'signature_1' => $signature_1_image,
				'status'      => 1,
				'token'       => ''
			], ['id' => $id]);

			$file = $this->pdf->welcomeEmployee(
				$id,
				$name,
				$signature_image,
				$this->SettingsModel->get_option('site_signature_image'),
				'F                                            '
			);

			// $this->UsersModel->save([
			// 	'first_name' => $name,
			// 	'email'      => $email,
			// 	'mobile'     => $mobile,
			// 	'password'   => hash_hmac('sha1', $password, PASSWORD_SALT),
			// 	'user_type'  => 'MANAGEMENT'
			// ]);

			sendMail($email, 'Thanks', 'Thanks For Accepting.', $file, 'html');

			sendMail('info@firstprize.in', 'Job Accepted', ucwords($name) . ' has accepted your job proposal on ' . $date . '.');

			flash_message(
				'',
				true,
				'success',
				'Thanks For Accepting',
				'We will Contact You Shortly.'
			);
		}

		$this->view('agreementSubmit', $data);
	}


	// syllabus function
	function syllabus()
	{
		$data['Property'] = $this->ProductsModel->get_featured_property();
		$data['Blogs']    = get_data_from('posts');
		return $this->view('syllabus', $data);
	}

	// syllabus function

	// addmission function
	function addmission()
	{
		$data['Property'] = $this->ProductsModel->get_featured_property();
		$data['Blogs']    = get_data_from('posts');

		return $this->view('addmission', $data);
	}

	// franchise function
	function franchise()
	{
		$data['Property'] = $this->ProductsModel->get_featured_property();
		$data['Blogs']    = get_data_from('posts');

		return $this->view('franchise', $data);
	}

	// franchise function


	/** Load Search & Filter Property Data
	 * @param string $search */
	function search(string $search = null)
	{
		is($_POST['cat']) or $_POST['cat']  = '2';
		is($_POST['city']) or $_POST['city'] = 'kota';

		if (is($search) and !is_null($search) and is($_POST['city']) and is($_POST['cat'])) {
			show_debug($_POST); // Show Post Request

			$title       = $this->input->post('title');
			$cat         = $this->input->post('cat');
			$city        = $this->input->post('city');
			$old_filters = $this->input->post('filter');

			// Manage Old Filters
			is($old_filters, 'array')
				and $filters = 'value_id IN(' . implode(',', $old_filters) . ') and'
				or $filters = '';

			/** Get Properties Ids
			 * @var array  Property's ID*/
			$properties = $this->Filter_Product_Category_RelationsModel->all([
				'fields'     => ['distinct(product_id)'],
				'conditions' => "$filters category_id = $cat",
				'datatype'   => 'json'
			]);
			if (is($properties, 'array'))
				foreach ($properties as $key => $value) {
					$properties[$key] = $value->product_id;
				}
			is($properties, 'array') and $product = implode(',', $properties);

			// Get Property Details
			is($properties, 'array') and $data['properties'] = $this->ProductsModel->all([
				'conditions' => "`id` IN($product) AND `extra_field_1` = '$city' AND `title` LIKE '%$title%' AND `status` = '1'",
				'datatype'   => 'json'
			]);

			// Add Addition Details of Property
			is($properties, 'array') and $data['properties'] = get_properties_details($data['properties']);

			/** Get Filters
			 * @var array */
			$filters = $this->FiltersModel->all([
				'fields'     => ['id', 'filter_title', 'slug'],
				'conditions' => [
					'status'    => true,
					'post_type' => 'property'
				],
				'datatype' => 'json'
			]);
			if (is($filters, 'array'))
				foreach ($filters as $key => $filter) {
					$filter_values = $this->Filter_ValuesModel->all([
						'fields'     => ['id', 'filter_value_title'],
						'conditions' => [
							'filter_key_id' => $filter->id,
							'status'        => true
						],
						'datatype' => 'json'
					]);

					if (is($filter_values, 'array'))
						foreach ($filter_values as $value) {
							$data['filters'][$filter->slug][] = $value;
						}
				}

			$data['selected_filters'] = $old_filters;

			show_debug($data['filters']);
			show_debug($data['selected_filters']);
			return $this->view('product-list', $data);
		}
		return redirect(SITE_URL);
	}


	/** Load About Us Data */
	function about_us()
	{

		$data['testimonial'] = get_data_from('testimonials');
		$this->view('about', $data);
	}


	/** Load Contact Us Data & Send Mail with Save Lead */
	function contact_us()
	{
		if ($this->input->post('submit')) {

			flash_message(
				'contact',
				$this->input->post('name')
					and $this->input->post('email')
					and $this->input->post('subject')
					and $this->input->post('msg'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			flash_message(
				'contact',
				filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL),
				'unsuccess',
				'Something Went Wrong',
				'Oops, You Misstyped Your E-mail Address, Please Type Valid E-mail Address.'
			);

			// $email_exists = $this->UsersModel->first([
			// 	'email' => str_clean(
			// 		$this->input->post('email'),
			// 		['@', '.', '-', '_']
			// 	)
			// ]);
			// is_null($email_exists) or is_array($email_exists) and $email_exists = $email_exists['email'];

			// flash_message(
			// 	'contact',
			// 	empty($email_exists),
			// 	'unsuccess',
			// 	'Something Went Wrong',
			// 	"Oops, E-mail Address Already Exists,<br>Please Login With `$email_exists` Or Try With Another E-mail Address."
			// );

			$username = explode('@', str_clean($this->input->post('email'), ['@', '.', '-', '_']))[0];
			$username_exists = $this->UsersModel->first(['username' => $username]);
			is_null($username_exists) or is_array($username_exists) and $username = increment_string($username, '_', 1);

			$this->agent->is_browser() and $device_type = 'web';
			$this->agent->is_mobile()  and $device_type = 'mobile';

			$user = $this->UsersModel->save([
				'username'      => $username,
				'slug'          => $username,
				'first_name'    => str_clean($this->input->post('name')),
				'email'         => str_clean($this->input->post('email'), ['@', '.', '-', '_']),
				'user_type'     => 'SUBSCRIBER',
				'requirement'   => str_clean($this->input->post('subject'), [' ', ',', '-', '_', '.']),
				'comment'       => str_clean($this->input->post('msg'), [' ', ',', '-', '_', '.']),
				'lead_from'     => 'contact',
				'status'        => '16',

				'user_ip'           => $this->input->ip_address(),
				'browser'           => $this->agent->browser(),
				'browser_version'   => $this->agent->version(),
				'device_type'       => $device_type,
				'os'                => $this->agent->platform(),
				'mobile_device'     => $this->agent->mobile(),
				'last_login_device' => $this->agent->agent_string()
			]);

			flash_message(
				'contact',
				$user,
				'unsuccess',
				"Something Went Wrong"
			);

			sendMail(
				$this->input->post('email'),
				'Thanks For Your Request',
				'Hey ' . ucwords($this->input->post('name')) . ', Thanks for Your Request, We will working it on asap. Team ' . ucwords($this->SettingsModel->get_option('site_name'))
				// TODO -  str_replace('{{username}}', ucwords($this->input->post('name')), $this->SettingsModel->get_option('contact_us_mail_response'))
			);

			sendMail(
				$this->SettingsModel->get_option('site_mail'),
				'Your Have New Enquiry',
				'Hey, You Have Inquiry, Please Check in Dashboard and working it on asap. Team ' . ucwords($this->SettingsModel->get_option('site_name'))
				// TODO -  str_replace('{{username}}', ucwords($this->input->post('name')), $this->SettingsModel->get_option('contact_us_mail_response'))
			);

			shootMsg('Hey, You Have Inquiry, Please Check in Dashboard and working it on asap. Team ' . ucwords($this->SettingsModel->get_option('site_name')), $this->SettingsModel->get_option('site_mobile'));

			flash_message(
				'contact',
				$user,
				'success',
				"We will Get Your Request",
				'We will working it on asap.'
			);
		}
		$this->view('contact', []);
	}


	/** Load Contact Us Data & Send Mail with Save Lead */
	function get_call()
	{
		if ($this->input->post('submit')) {

			flash_message(
				'contact',
				$this->input->post('name')
					and $this->input->post('email')
					and $this->input->post('mobile'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			flash_message(
				'contact',
				filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL),
				'unsuccess',
				'Something Went Wrong',
				'Oops, You Misstyped Your E-mail Address, Please Type Valid E-mail Address.'
			);

			// $email_exists = $this->UsersModel->first([
			// 	'email' => str_clean(
			// 		$this->input->post('email'),
			// 		['@', '.', '-', '_']
			// 	)
			// ]);
			// is_null($email_exists) or is_array($email_exists) and $email_exists = $email_exists['email'];

			// flash_message(
			// 	'contact',
			// 	empty($email_exists),
			// 	'unsuccess',
			// 	'Something Went Wrong',
			// 	"Oops, E-mail Address Already Exists,<br>Please Login With `$email_exists` Or Try With Another E-mail Address."
			// );

			$username = explode('@', str_clean($this->input->post('email'), ['@', '.', '-', '_']))[0];
			$username_exists = $this->UsersModel->first(['username' => $username]);
			is_null($username_exists) or is_array($username_exists) and $username = increment_string($username, '_', 1);

			$this->agent->is_browser() and $device_type = 'web';
			$this->agent->is_mobile()  and $device_type = 'mobile';

			$user = $this->UsersModel->save([
				'username'      => $username,
				'slug'          => $username,
				'first_name'    => str_clean($this->input->post('name')),
				'mobile'        => str_clean($this->input->post('mobile')),
				'email'         => str_clean($this->input->post('email'), ['@', '.', '-', '_']),
				'user_type'     => 'SUBSCRIBER',
				'requirement'   => 'Get Call Back',
				'lead_from'     => 'Get A CallBack Popup',
				'status'        => '16',

				'user_ip'           => $this->input->ip_address(),
				'browser'           => $this->agent->browser(),
				'browser_version'   => $this->agent->version(),
				'device_type'       => $device_type,
				'os'                => $this->agent->platform(),
				'mobile_device'     => $this->agent->mobile(),
				'last_login_device' => $this->agent->agent_string()
			]);

			flash_message(
				'contact',
				$user,
				'unsuccess',
				"Something Went Wrong"
			);

			sendMail(
				$this->input->post('email'),
				'Thanks For Your Request',
				'Hey ' . ucwords($this->input->post('name')) . ', Thanks for Your Request, We will working it on asap. Team ' . ucwords($this->SettingsModel->get_option('site_name'))
				// TODO -  str_replace('{{username}}', ucwords($this->input->post('name')), $this->SettingsModel->get_option('contact_us_mail_response'))
			);

			sendMail(
				$this->SettingsModel->get_option('site_mail'),
				'Your Have New Enquiry',
				'Hey, You Have Inquiry, Please Check in Dashboard and working it on asap. Team ' . ucwords($this->SettingsModel->get_option('site_name'))
				// TODO -  str_replace('{{username}}', ucwords($this->input->post('name')), $this->SettingsModel->get_option('contact_us_mail_response'))
			);

			shootMsg('Hey ' . ucwords($this->input->post('name')) . ', Thanks for Your Request, We will working it on asap. Team ' . ucwords($this->SettingsModel->get_option('site_name')), $this->input->post('mobile'));

			shootMsg('Hey, You Have Inquiry, Please Check in Dashboard and working it on asap. Team ' . ucwords($this->SettingsModel->get_option('site_name')), $this->SettingsModel->get_option('site_mobile'));

			flash_message(
				'contact',
				$user,
				'success',
				"We will Get Your Request",
				'We will working it on asap.'
			);
		}
		redirect(SITE_URL);
	}


	function gallery()
	{
		$data['gallery'] = $this->GalleryModel->all([
			'fields'     => ['DISTINCT(img_group)'],
			'conditions' => ['status' => true],
			'datatype'   => 'json'
		]);

		foreach ($data['gallery'] as $key => $value) {
			$data['gallery'][$key]->count = $this->GalleryModel->count([
				'conditions' => [
					'img_group' => $value->img_group
				],
				'status' => true
			]);
		}
		show_debug($data['gallery']);
		$this->view('gallery', $data);
	}

	function galleryView($imgGroup = null)
	{
		$data['gallery'] = $this->GalleryModel->all([
			'conditions' => [
				'img_group' => str_replace('-', ' ', $imgGroup),
				'status'    => true
			],
			'datatype' => 'json'
		]);
		$this->view('galleryview', $data);
	}

	function blogs()
	{
		$data['blogs'] = $this->PostsModel->all([
			'fields'     => ['posts.*', 'categories.title as category_title'],
			'conditions' => [
				'posts.post_type' => 'BLOG',
				'posts.status'    => '1',
				'posts.is_pinned' => '1'
			],
			'join'     => [['categories', 'categories.id = posts.category_id']],
			'datatype' => 'json'
		]);
		$this->view('blogs', $data);
	}

	function director_message()
	{

		$this->view('directors', '');
	}

	function blog(string $slug = null)
	{
		$data['value'] = json_decode(json_encode($this->PostsModel->first(['slug' => $slug])));
		$this->view('single-blog', $data['value']);
	}

	function privacy()
	{
		$this->view('privacy', '');
	}


	function franchiseschool()
	{
		$this->view('franchicseschool', '');
	}

	function schoolIntegrated()
	{
		$this->view('schoolintegrate', '');
	}

	function amsupport()
	{
		$this->view('amsupport', '');
	}

	function ftplacement()
	{
		$this->view('ftplacement', '');
	}

	function fpaprogram()
	{
		$this->view('fpaprogram', '');
	}

	function disclaimer()
	{
		$this->view('disclaimer', '');
	}

	function thirdparty()
	{
		$this->view('thirdparty', '');
	}

	public function signup_users()
	{
		$data = [];
		return $this->view('sign-login', $data);
	}
}

/* End of file  Pages.php */
