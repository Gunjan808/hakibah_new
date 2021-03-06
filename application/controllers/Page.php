<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load FrontEnd Pages */
class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model([
			'BooksModel',
			'CategoriesModel',
			'CoursesModel',
			'CountryModel',
			'DocumentsModel',
			'LanguagesModel',
			'RecentUserDocsModel',
			'SavedUserDocsModel',
			'SettingsModel',
			'StudyDocCommentsModel',
			'StudyDocUpvotesModel',
			'UniversitiesModel',
			'UserCoursesModel',
			'UserFollowsModel',
			'UsersModel',
			'NotificationsModel',
			'PostsModel',
			'StudyDocReportsModel',
			'DocumentsModel',
			'CoursePostModel',
			'CoursePostLikeModel',
			'UserBooksModel',
			'UserPointHistoryModel'
		]);

		$this->load->library('encryption');
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
	public function view($Pages = 'home', $data = '')
	{
		$path = APPPATH . '../public' . DIRECTORY_SEPARATOR . 'pages' . DIRECTORY_SEPARATOR . $Pages . '.php';

		$my_courses    = [];
		$notifications = [];
		$rec_docs      = [];
		$recent_docs   = [];
		$site          = [];
		$slider        = [];
		$studyLists    = [];
		$my_book       = [];
		$welcome_notification = [];

		file_exists($path)
			and $site = $this->SettingsModel->get_header_option() or show_404();
		file_exists($path)
			and $slider = get_data_from('sliders');
		show_debug($slider);
		$nav_post = get_data_from('posts');

		if (is_user_login()) {
			$notifications = $this->NotificationsModel->all([
				'fields'     => ['notifications.action', 'study_docs.*'],
				'conditions' => ['notifications.user_id' => $_SESSION['USER_ID']],
				'join'       => [['study_docs', 'study_docs.id = notifications.study_doc_id']],
				'datatype'   => 'json'
			]);


			if (is($notifications, 'array')) {
				foreach ($notifications as $key => $value) {
					if (is($value->study_doc_id)) {
						$notifications[$key] = $this->DocumentsModel->first([
							'conditions' => ['id' => $value->study_doc_id],
							'datatype'   => 'json'
						]);
					}
				}
			}

			//echo '<pre>';
			//print_r($notifications);
			//echo '</pre>';
			//die;
		}
		if (is_user_login()) {
			$welcome_notification = $this->NotificationsModel->first(['conditions' => ['notifications.user_id' => $_SESSION['USER_ID'], 'study_doc_id =' => "0", 'action' => 'welcome'], 'order'    => ['by' => 'id', 'type' => 'desc']]);
		}

		is_user_login() and $rec_docs = $this->DocumentsModel->all([
			'conditions' => [
				'university_id' => $_SESSION['USER_UNIVERSITY_ID'],
				'status'        => true
			],
			'paging'   => ['limit' => 6, 'page' => 1],
			'datatype' => 'json'
		]);

		is_user_login() and $my_courses = $this->UserCoursesModel->all([
			'fields'     => ['courses.*', 'universities.slug as university_slug'],
			'conditions' => [
				'user_courses.user_id' => $_SESSION['USER_ID']
			],
			'join'     => [
				['courses', 'courses.id = user_courses.course_id AND courses.status = 1'],
				['universities', 'universities.id = courses.university_id'],
			],
			'datatype' => 'json'
		]);

		// echo $this->db->last_query();
		// die;

		is_user_login() and $my_book = $this->UserBooksModel->all([
			'conditions' => [
				'user_books.user_id' => $_SESSION['USER_ID']
			],
			'join'     => [
				['books', 'books.id = user_books.book_id AND books.status = 1']
			],
			'datatype' => 'json'
		]);

		is_user_login() and $recent_docs = $this->RecentUserDocsModel->all([
			'fields'     => ['study_docs.*'],
			'conditions' => [
				'recent_user_docs.user_id' => $_SESSION['USER_ID']
			],
			'join' => [
				['study_docs', 'study_docs.id = recent_user_docs.study_doc_id']
			],
			'order'    => ['by' => 'id', 'type' => 'desc'],
			'paging'   => ['limit' => 6, 'page' => 1],
			'datatype' => 'json'
		]);

		is_user_login() and $studyLists = $this->SavedUserDocsModel->all([
			'conditions' => 'user_id = "' . $_SESSION['USER_ID'] . '" GROUP BY `title`',
			'order'    => ['by' => 'title', 'type' => 'asc'],
			'datatype' => 'json'
		]);
		$likedLists = $this->StudyDocUpvotesModel->all([
			'conditions' => 'user_id = "' . $_SESSION['USER_ID'] . '" GROUP BY `id`',
			'order'    => ['by' => 'id', 'type' => 'asc'],
			'datatype' => 'json'
		]);

		file_exists($path) and $this->load->view('pages/components/header', compact(
			'site',
			'slider',
			'nav_post',
			'notifications',
			'rec_docs',
			'my_courses',
			'recent_docs',
			'studyLists',
			'likedLists',
			'my_book',
			'welcome_notification'
		));
		file_exists($path) and $this->load->view('pages/' . $Pages, compact('data'));
		file_exists($path) and $this->load->view('pages/components/footer');
	}


	/** Load Home Page Data
	 *
	 * @return mixed */
	public function home()
	{
		is_user_login() and redirect(SITE_URL . 'panel');

		$total_book       = $this->BooksModel->count(['conditions' => ['status' => true]]);
		$total_exam       = (string)$this->DocumentsModel->count(['conditions' => ['status' => true, 'exam_year!=' => '']]);
		$total_university = $this->UniversitiesModel->count(['conditions' => ['status' => true]]);

		$books       = $this->BooksModel->all([
			'conditions' => ['status' => true],
			'paging'     => ['page' => 1, 'limit' => 12],
			'datatype'   => 'json'
		]);

		$documents = $this->DocumentsModel->all([
			'fields'     => ['study_docs.id', 'study_docs.title', 'study_docs.slug', 'universities.title as university',],
			'conditions' => ['study_docs.status' => true],
			'join'       => [['universities', 'universities.id = study_docs.university_id']],
			'paging'     => ['page' => 1, 'limit' => 12],
			'datatype'   => 'json'
		]);
		show_debug($books);
		show_debug($documents);
		return $this->view('home', compact(['total_university', 'total_book', 'total_exam', 'books', 'documents']));
	}


	/** Search
	 *
	 * @return object */
	public function search()
	{
		$condition = ' study_docs.status = 1 ';

		if ($this->input->get_post('query')) {
			$condition  .= ' AND `study_docs`.`title` LIKE "%' . $this->input->get_post('query') . '%"';
		}

		$documents = $this->DocumentsModel->all([
			'fields' => [
				'study_docs.id',
				'study_docs.book_id',
				'study_docs.category_id',
				'study_docs.course_id',
				'study_docs.university_id',
				'study_docs.slug',
				'study_docs.title',
				'study_docs.image',
				'study_docs.doc_pages',
				'study_docs.created_date',
				'universities.slug as university_slug',
				'universities.title as university_title',
				'courses.title as course_title',
				'courses.slug as course_slug',
				'categories.title as category_title',
				'categories.slug as category_slug',
			],
			'conditions' => $condition,
			'join'       => [
				['categories', 'categories.id = study_docs.category_id'],
				['courses', 'courses.id = study_docs.course_id'],
				['universities', 'universities.id = study_docs.university_id'],
			],
			'order'    => ['by' => 'id', 'type' => 'desc'],
			'pagging'  => ['limit' => 10, 'page' => 1],
			'datatype' => 'json'
		]);

		$books = $this->BooksModel->all([
			'search'   => ['title' => $this->input->get_post('query')],
			'order'    => ['by' => 'id', 'type' => 'desc'],
			'paging'   => ['limit' => 3, 'page' => 1],
			'datatype' => 'json'
		]);

		$courses = $this->CoursesModel->all([
			'fields'   => [
				'courses.*',
				'universities.title as university',
				'universities.slug as university_slug'
			],
			'search'   => ['courses.title' => $this->input->get_post('query')],
			'join'     => [['universities', 'universities.id = courses.university_id']],
			'order'    => ['by' => 'courses.id', 'type' => 'desc'],
			'paging'   => ['limit' => 3, 'page' => 1],
			'datatype' => 'json'
		]);

		if (is($documents, 'array')) foreach ($documents as $key => $document) {

			if (is($document->book_id))
				$book = $this->BooksModel->first([
					'fields'     => ['id', 'title', 'slug'],
					'conditions' => [
						'status' => true,
						'id'     => $document->book_id
					],
					'datatype' => 'json'
				]);

			if (is($book)) {
				$documents[$key]->book_title = $book->title;
				$documents[$key]->book_slug  = $book->slug;
			}
		}

		$categories = $this->CategoriesModel->all([
			'conditions' => ['status' => true, 'post_type' => 'DOCUMENT'],
			'order'      => ['by' => 'title', 'type' => 'asc'],
			'datatype'   => 'json'
		]);

		$languages = $this->LanguagesModel->all([
			'conditions' => ['status' => true],
			'order'      => ['by' => 'title', 'type' => 'asc'],
			'datatype'   => 'json'
		]);
		return $this->view('search', compact('documents', 'categories', 'languages', 'books', 'courses'));
	}

	/** Univesities
	 *
	 * @return object */
	public function universities()
	{
		$universities = $this->UniversitiesModel->all([
			'fields'     => ['id', 'slug', 'title'],
			'conditions' => ['status' => true],
			'order'      => ['by' => 'title', 'type' => 'asc'],
			'datatype'   => 'json'
		]);

		return $this->view('universities', compact('universities'));
	}


	/** Single University
	 *
	 * @param string $universitySlug
	 * @return object */
	public function university($universitySlug = null)
	{
		is($universitySlug) or show_404();

		$university = $this->UniversitiesModel->first([
			'conditions' => [
				'slug'   => $universitySlug,
				'status' => true,
			],
			'datatype' => 'json'
		]);

		$courses = $this->CoursesModel->all([
			'fields'     => ['id', 'slug', 'title'],
			'conditions' => ['status' => true, 'university_id' => $university->id],
			'order'      => ['by' => 'title', 'type' => 'asc'],
			'datatype'   => 'json'
		]);

		$documents = $this->DocumentsModel->all([
			'fields'     => ['id', 'slug', 'title'],
			'conditions' => ['status' => true, 'university_id' => $university->id],
			'order'      => ['by' => 'title', 'type' => 'asc'],
			'datatype'   => 'json'
		]);

		$recent_docs = $this->DocumentsModel->all([
			'fields'     => ['id', 'slug', 'title', 'image'],
			'conditions' => ['status' => true, 'university_id' => $university->id],
			'order'      => ['by' => 'id', 'type' => 'desc'],
			'paging'     => ['limit' => 4, 'page' => 1],
			'datatype'   => 'json'
		]);

		$cats = [];
		$cats = $this->CategoriesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => ['status' => true, 'post_type' => 'DOCUMENT'],
			'order'      => ['by' => 'title', 'type' => 'asc'],
			'datatype'   => 'json'
		]);

		$totalDocs = 0;
		if (is($cats, 'array')) foreach ($cats as $key => $cat) {
			$doc_count = $this->DocumentsModel->count([
				'conditions' => [
					'status'        => true,
					'category_id'   => $cat->id,
					'university_id' => $university->id
				]
			]);
			if ($doc_count > 0) {
				$totalDocs += $doc_count;
				$cats[$key]->total = $doc_count;
			} else {
				unset($cats[$key]);
			}
		}

		if (count($cats) > 6) {
			unset($cats[5]);
			unset($cats[6]);
			unset($cats[7]);
		}
		$cats = [json_decode(json_encode(['title' => 'document', 'total' => $totalDocs])), ...$cats];

		is($university) or show_404();
		return $this->view('university', compact('university', 'courses', 'documents', 'recent_docs', 'cats'));
	}


	/** Single Course
	 *
	 * @param string $universitySlug
	 * @param string $courseSlug
	 * @return object */
	public function course($universitySlug = null, $courseSlug = null)
	{
		(is($universitySlug) and is($universitySlug)) or show_404();

		if (isset($_POST['course_post_submit'])) {
			$course_post_title 	= $_POST['course_post_title'];
			$course_id 			= $_POST['course_id'];
			$radio = $_POST['tag_type'];
			//$slug = get_unique_slug('post', $_POST['course_post_title']);

			$arr = [
				'title' => $course_post_title,
				'course_id' => $course_id,
				'tags' => $radio,
				'status' => 1,
				'user_id' => $_SESSION['USER_ID']
			];

			$coursePost = $this->CoursePostModel->save($arr);
		}

		$university = $this->UniversitiesModel->first([
			'conditions' => ['slug' => $universitySlug],
			'datatype'   => 'json'
		]);

		$course     = [];
		$docs       = [];
		$total_docs = 0;

		if (is($university, 'object'))
			$course = $this->CoursesModel->first([
				'conditions' => ['slug' => $courseSlug],
				'datatype'   => 'json'
			]);

		/*echo '<pre>';
		print_r($course);
		echo '</pre>';*/

		if (is($course, 'object')) {
			$cats = $this->CategoriesModel->all([
				'conditions' => ['status' => true, 'post_type' => 'DOCUMENT'],
				'datatype'   => 'json'
			]);

			$my_course = $this->UserCoursesModel->first([
				'conditions' => [
					'course_id' => $course->id,
					'user_id'   => $_SESSION['USER_ID']
				],
				'datatype' => 'json'
			]);

			$total_docs = $this->DocumentsModel->count(['conditions' => ['course_id' => $course->id]]);

			if (is($cats, 'array'))
				foreach ($cats as $cat) {
					$doc = $this->DocumentsModel->all([
						'conditions' => [
							'course_id'   => $course->id,
							'category_id' => $cat->id,
							'status'      => true
						],
						'datatype' => 'json'
					]);

					if (is($doc, 'array')) $docs[$cat->title] = $doc;
				}
		}

		$coursePosts = $this->CoursePostModel->all([
			'conditions' => [
				'course_posts.parent_id' => '0',
				'course_posts.course_id' => $course->id
			],
			'fields'   => [
				'course_posts.*',
				'users.first_name'
			],
			'join'       => [['users', 'users.id = course_posts.user_id']],
		]);

		foreach ($coursePosts as $key => $coursePost) {
			$replies = $this->CoursePostModel->all([
				'conditions' => ['course_posts.parent_id' => $coursePost['id']],
				'fields'   => [
					'course_posts.*',
					'users.first_name'
				],
				'join'       => [['users', 'users.id = course_posts.user_id']],
			]);
			$coursePosts[$key]['replies'] = $replies;

			$course_post_like = $this->CoursePostLikeModel->first(
				['user_id' => $_SESSION['USER_ID'], 'course_posts_id' => $coursePost['id']]
			);

			$course_post_like_count = $this->CoursePostLikeModel->count(['conditions' => ['course_posts_id' => $coursePost['id']]]);
			$coursePosts[$key]['course_post_like_count'] = $course_post_like_count;

			if (!empty($course_post_like)) {
				$coursePosts[$key]['is_like'] = 1;
			} else {
				$coursePosts[$key]['is_like'] = 0;
			}
		}

		$user_follow_course = $this->UserCoursesModel->all([
			'conditions' => ['user_courses.course_id' => $course->id],
			'fields'   => [
				'user_courses.*',
				'users.first_name'
			],
			'join'       => [['users', 'users.id = user_courses.user_id'], ['courses', 'courses.id = user_courses.course_id']],
		]);
		$total_users_following_course = $this->UserCoursesModel->count(['conditions' => ['course_id' => $course->id]]);

		is($university) or show_404();
		return $this->view('course', compact('university', 'course', 'docs', 'total_docs', 'my_course', 'coursePosts', 'user_follow_course', 'total_users_following_course'));
	}


	/** Books
	 *
	 * @return object */
	public function books()
	{
		$books = $this->BooksModel->all([
			'fields'     => ['id', 'slug', 'title', 'author', 'isbn'],
			'conditions' => ['status' => true],
			'order'      => ['by' => 'title', 'type' => 'asc'],
			'datatype'   => 'json'
		]);

		return $this->view('books', compact('books'));
	}


	/** Single Book
	 *
	 * @param string $bookSlug
	 * @return object */
	public function book($bookSlug = null)
	{
		is($bookSlug) or show_404();

		$book = $this->BooksModel->first([
			'conditions' => [
				'slug'   => $bookSlug,
				'status' => true,
			],
			'datatype' => 'json'
		]);

		$docs = [];
		$my_book_dd = [];
		$cats = $this->CategoriesModel->all([
			'conditions' => ['status' => true, 'post_type' => 'DOCUMENT'],
			'datatype' => 'json'
		]);

		if (is($cats, 'array'))
			foreach ($cats as $cat) {
				$doc = $this->DocumentsModel->all([
					'conditions' => [
						'book_id'     => $book->id,
						'category_id' => $cat->id,
						'status'      => true
					],
					'datatype' => 'json'
				]);

				if (is($doc, 'array')) $docs[$cat->title] = $doc;
			}

		$doc_count = $this->DocumentsModel->count(['conditions' => ['status' => true, 'book_id' => $book->id]]);

		is_user_login() and $my_book_dd = $this->UserBooksModel->all([
			'conditions' => [
				'user_books.user_id' => $_SESSION['USER_ID']
			],
			'join'     => [
				['books', 'books.id = user_books.book_id AND books.status = 1']
			],
			'datatype' => 'json'
		]);
		$user_follow_book = $this->UserBooksModel->all([
			'conditions' => ['user_books.book_id' => $book->id],
			'fields'   => [
				'user_books.*',
				'users.first_name'
			],
			'join'       => [['users', 'users.id = user_books.user_id'], ['books', 'books.id = user_books.book_id']],
		]);
		$total_users_following_book = $this->UserBooksModel->count(['conditions' => ['book_id' => $book->id]]);

		is($book) or show_404();
		return $this->view('book', compact('book', 'docs', 'doc_count', 'my_book_dd', 'user_follow_book', 'total_users_following_book'));
	}


	/** Single Studylist
	 *
	 * @param string $studylistSlug
	 * @return object */
	public function studylist($studylistId = null)
	{
		is($studylistId) or show_404();

		$studylist = $this->SavedUserDocsModel->first([
			'fields'     => ['saved_user_docs.*', 'users.first_name', 'users.last_name', 'users.username', 'users.university_id'],
			'conditions' => ['saved_user_docs.id' => $studylistId],
			'join'       => [['users', 'users.id = saved_user_docs.user_id']],
			'datatype'   => 'json'
		]);

		$docs = [];
		$cats = $this->CategoriesModel->all([
			'conditions' => ['status' => true, 'post_type' => 'DOCUMENT'],
			'datatype'   => 'json'
		]);

		$studylists = $this->SavedUserDocsModel->all([
			'conditions' => ['title' => $studylist->title],
			'datatype'   => 'json'
		]);

		if (is($cats, 'array'))
			foreach ($cats as $cat) {
				if (is($studylists, 'array'))
					foreach ($studylists as $study) {
						$doc = $this->DocumentsModel->all([
							'conditions' => [
								'id'          => $study->study_doc_id,
								'category_id' => $cat->id,
								'status'      => true
							],
							'datatype' => 'json'
						]);

						if (is($doc, 'array'))
							$docs[$cat->title] = $doc;
					}
			}

		is($studylist) or show_404();
		return $this->view('studylist', compact('studylist', 'docs'));
	}

	public function likedlist($userId = null)
	{

		is($_SESSION['USER_ID'])  or redirect(SITE_URL . 'login');

		is($userId) or show_404();

		is_user_login() and $abc = $this->StudyDocUpvotesModel->all([
			'conditions' => 'user_id = "' . $userId . '" GROUP BY `id`',
			'order'    => ['by' => 'id', 'type' => 'asc']
		]);



		if (!empty($abc)) {

			foreach ($abc as $key => $val) {

				$doc = $this->DocumentsModel->first([
					'conditions' => ['id' => $val['study_doc_id']],
					'order'    => ['by' => 'id', 'type' => 'asc']
				]);
				$abc[$key]['doc'] = $doc;
			}
		}

		// echo '<pre>';
		// print_r($abc);
		// die;

		return $this->view('likedlist', compact('abc'));
	}


	/** Single Course
	 *
	 * @param string $documentSlug
	 * @param string $documentId
	 * @return object */
	public function document_bk07012020($documentSlug = null, $documentId = null)
	{
		(is($documentSlug) and is($documentId)) or show_404();

		$saved = '';
		$studyLists = [];

		if (is_user_login()) {
			$studyLists = $this->SavedUserDocsModel->all([
				'conditions' => 'user_id = "' . $_SESSION['USER_ID'] . '" GROUP BY `title`',
				'order'    => ['by' => 'title', 'type' => 'asc'],
				'datatype' => 'json'
			]);

			$saved = $this->SavedUserDocsModel->first([
				'conditions' => [
					'user_id'      => $_SESSION['USER_ID'],
					'study_doc_id' => $documentId
				],
				'datatype' => 'json'
			]);

			$recent = $this->RecentUserDocsModel->first([
				'conditions' => [
					'user_id'      => $_SESSION['USER_ID'],
					'study_doc_id' => $documentId
				]
			]);

			// 			if (!is($recent, 'array'))
			// 				$this->RecentUserDocsModel->save([
			// 					'user_id'      => $_SESSION['USER_ID'],
			// 					'study_doc_id' => $documentId
			// 				]);
			$user_doc = $this->DocumentsModel->first(['user_id' => $_SESSION['USER_ID'], 'id' => $documentId]);

			if (empty($recent) && empty($user_doc)) {

				$this->RecentUserDocsModel->save([
					'user_id'      => $_SESSION['USER_ID'],
					'study_doc_id' => $documentId
				]);

				$debit = $this->SettingsModel->first(['option_key' => 'site_view_doc_point']);

				$arr = [
					'user_id'       =>  $_SESSION['USER_ID'],
					'points' 		=>  $debit['option_value'],
					'credit_debit'  => 'debit',
					'reason'        => 'doc view'
				];

				$add_to_recent = $this->UserPointHistoryModel->save($arr);

				$view = "0";
			} elseif (!empty($recent)) {
				$view = "1";
			}
		}

		if ($this->input->post('saveStudylist') or $this->input->post('title')) {
			is_user_login() or redirect(SITE_URL . 'login');
			$save = $this->SavedUserDocsModel->save([
				'title'        => $this->input->post('title'),
				'user_id'      => $_SESSION['USER_ID'],
				'study_doc_id' => $documentId
			]);

			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				$save,
				'unsuccess',
				'Something went wrong'
			);

			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				$save,
				'success',
				'Save to your studylist'
			);
		}

		if ($this->input->post('reportSubmit')) {
			is_user_login() or redirect($_SERVER['HTTP_REFERER']);

			$this->input->post('reasonText') and $reason = $this->input->post('reasonText');
			$this->input->post('reasonText') or $reason  = $this->input->post('reason');

			$report = $this->StudyDocReportsModel->save([
				'user_id'      => $_SESSION['USER_ID'],
				'study_doc_id' => $this->input->post('document_id'),
				'reason'       => $reason
			]);

			redirect($_SERVER['HTTP_REFERER']);
		}

		if (isset($_POST['title']) and empty($_POST['title'])) {
			is_user_login() or redirect(SITE_URL . 'login');
			$update = $this->SavedUserDocsModel->updateTable(
				['study_doc_id' => '0'],
				[
					'user_id'      => $_SESSION['USER_ID'],
					'study_doc_id' => $documentId
				]
			);

			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				$save,
				'unsuccess',
				'Something went wrong'
			);

			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				$save,
				'success',
				'Remove to your studylist'
			);
		}


		$site = [];
		$view = '';
		$related_docs = [];
		$site = $this->SettingsModel->get_header_option() or show_404();

		$document = $this->DocumentsModel->first([
			'fields' => [
				'study_docs.*',
				'universities.slug as university_slug',
				'universities.title as university_title',
				'courses.slug as course_slug',
				'courses.title as course_title',
				'users.first_name',
				'users.last_name',
			],
			'conditions' => [
				'study_docs.status' => true,
				'study_docs.id'     => $documentId,
				'study_docs.slug'   => $documentSlug
			],
			'join' => [
				['universities', 'universities.id = study_docs.university_id'],
				['courses', 'courses.id = study_docs.course_id'],
				['users', 'users.id = study_docs.created_by'],
			],
			'datatype' => 'json'
		]);

		if (is($document, 'object')) {
			$document->helpful = $this->StudyDocUpvotesModel->count([
				'conditions' => [
					'study_doc_id' => $document->id,
					'vote'         => 1
				]
			]);



			$document->not_helpful = $this->StudyDocUpvotesModel->count([
				'conditions' => [
					'study_doc_id' => $document->id,
					'vote'         => 0
				]
			]);

			$document->is_login_user_helpful = '';

			if (is($_SESSION['USER_ID'])) {

				$document->is_login_user_helpful = $this->StudyDocUpvotesModel->first([
					'conditions' => [
						'study_doc_id' => $document->id,
						'user_id'      => $_SESSION['USER_ID']
					],
					'fields' => ['vote']
				]);


				$document->followed = $this->UserFollowsModel->first([
					'conditions' => [
						'user_id'     => $document->created_by,
						'follower_id' => $_SESSION['USER_ID']
					],
					'datatype' => 'json'
				]);
			}

			$related_docs = $this->DocumentsModel->all([
				'conditions' => [
					'course_id' => $document->course_id,
					'status'    => true
				],
				'order'    => ['by' => 'id', 'type' => 'desc'],
				'paging'   => ['limit' => 6, 'page' => 1],
				'datatype' => 'json'
			]);
		}

		if ($this->input->post('postComment')) {
			$redirect_url = $_REQUEST['postComment'];

			is_user_login() or redirect(SITE_URL . 'login/?' . $redirect_url);
			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				$this->input->post('study_doc_id') and
					$this->input->post('comment'),
				'unsuccess',
				'seems like its empty'
			);

			$comment = $this->StudyDocCommentsModel->save([
				'user_id'      => $_SESSION['USER_ID'],
				'study_doc_id' => $this->input->post('study_doc_id'),
				'comment'      => $this->input->post('comment'),
			]);
			$notification = $this->NotificationsModel->save([
				'user_id'      		=> $_SESSION['USER_ID'],
				'study_doc_id'		=> $documentId,
				'action'       		=> 'liked'
			]);


			/**
			 * comment by kaushal
			 * done by ajax no need here
			 * /
			/*$arr = [
				'user_id'      => $_SESSION['USER_ID'],
				'study_doc_id' => $this->input->post('study_doc_id'),
				'vote' => '1'
			];

			$like = $this->StudyDocUpvotesModel->save($arr);*/


			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				is($comment),
				'unsuccess',
				'Something went wrong'
			);

			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				is($comment),
				'success',
				'Thanks for comment'
			);
		}

		$comments = $this->StudyDocCommentsModel->all([
			'fields'     => ['study_doc_comments.*', 'users.first_name', 'users.last_name', 'users.profile_pic'],
			'conditions' => ['study_doc_comments.study_doc_id' => $documentId],
			'join'       => [['users', 'users.id = study_doc_comments.user_id']],
			'datatype'   => 'json'
		]);

		$this->load->view('pages/components/header', compact('site'));
		$this->load->view('pages/document', compact('document', 'comments', 'related_docs', 'studyLists', 'saved', 'view'));
	}

	public function document($documentSlug = null, $documentId = null)
	{
		(is($documentSlug) and is($documentId)) or show_404();

		$saved = '';
		$studyLists = [];
		$view = '';

		if (is_user_login()) {
			$studyLists = $this->SavedUserDocsModel->all([
				'conditions' => 'user_id = "' . $_SESSION['USER_ID'] . '" GROUP BY `title`',
				'order'    => ['by' => 'title', 'type' => 'asc'],
				'datatype' => 'json'
			]);

			$saved = $this->SavedUserDocsModel->first([
				'conditions' => [
					'user_id'      => $_SESSION['USER_ID'],
					'study_doc_id' => $documentId
				],
				'datatype' => 'json'
			]);

			$recent = $this->RecentUserDocsModel->first([
				'conditions' => [
					'user_id'      => $_SESSION['USER_ID'],
					'study_doc_id' => $documentId
				]
			]);

			$total_positive_point = $this->UserPointHistoryModel->first([
				'fields' => ['SUM(points) as user_points'],
				'conditions' => [
					'user_id' => $_SESSION['USER_ID'],
					'credit_debit' => 'credit'
				]
			]);

			$total_nagetive_point = $this->UserPointHistoryModel->first([
				'fields' => ['SUM(points) as user_points'],
				'conditions' => [
					'user_id' => $_SESSION['USER_ID'],
					'credit_debit' => 'debit'
				]
			]);

			$user_total_points = ($total_positive_point['user_points'] - $total_nagetive_point['user_points']);
			//echo $this->db->last_query();

			$user_doc = $this->DocumentsModel->first(['user_id' => $_SESSION['USER_ID'], 'id' => $documentId]);
			//echo $this->db->last_query();
			//die;

			if (empty($recent) && empty($user_doc)) {
				$debit = $this->SettingsModel->first(['option_key' => 'site_view_doc_point']);

				if ($user_total_points >= $debit['option_value']) {
					$this->RecentUserDocsModel->save([
						'user_id'      => $_SESSION['USER_ID'],
						'study_doc_id' => $documentId
					]);

					$arr = [
						'user_id'      =>  $_SESSION['USER_ID'],
						'points' 		=>  $debit['option_value'],
						'credit_debit' => 'debit',
						'reason'  => 'doc upload'
					];

					$add_to_recent = $this->UserPointHistoryModel->save($arr);

					$view = "1";
				} else {
					$view = "0";
				}
			} else {
				$view = "1";
			}
		}

		if ($this->input->post('saveStudylist') or $this->input->post('title')) {
			is_user_login() or redirect(SITE_URL . 'login');
			$save = $this->SavedUserDocsModel->save([
				'title'        => $this->input->post('title'),
				'user_id'      => $_SESSION['USER_ID'],
				'study_doc_id' => $documentId
			]);

			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				$save,
				'unsuccess',
				'Something went wrong'
			);

			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				$save,
				'success',
				'Save to your studylist'
			);
		}

		if ($this->input->post('reportSubmit')) {
			is_user_login() or redirect($_SERVER['HTTP_REFERER']);

			$this->input->post('reasonText') and $reason = $this->input->post('reasonText');
			$this->input->post('reasonText') or $reason  = $this->input->post('reason');

			$report = $this->StudyDocReportsModel->save([
				'user_id'      => $_SESSION['USER_ID'],
				'study_doc_id' => $this->input->post('document_id'),
				'reason'       => $reason
			]);

			redirect($_SERVER['HTTP_REFERER']);
		}

		if (isset($_POST['title']) and empty($_POST['title'])) {
			is_user_login() or redirect(SITE_URL . 'login');
			$update = $this->SavedUserDocsModel->updateTable(
				['study_doc_id' => '0'],
				[
					'user_id'      => $_SESSION['USER_ID'],
					'study_doc_id' => $documentId
				]
			);

			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				$save,
				'unsuccess',
				'Something went wrong'
			);

			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				$save,
				'success',
				'Remove to your studylist'
			);
		}


		$site = [];
		$related_docs = [];
		$site = $this->SettingsModel->get_header_option() or show_404();

		$document = $this->DocumentsModel->first([
			'fields' => [
				'study_docs.*',
				'universities.slug as university_slug',
				'universities.title as university_title',
				'courses.slug as course_slug',
				'courses.title as course_title',
				'users.first_name',
				'users.last_name',
			],
			'conditions' => [
				'study_docs.status' => true,
				'study_docs.id'     => $documentId,
				'study_docs.slug'   => $documentSlug
			],
			'join' => [
				['universities', 'universities.id = study_docs.university_id'],
				['courses', 'courses.id = study_docs.course_id'],
				['users', 'users.id = study_docs.created_by'],
			],
			'datatype' => 'json'
		]);

		if (is($document, 'object')) {
			$document->helpful = $this->StudyDocUpvotesModel->count([
				'conditions' => [
					'study_doc_id' => $document->id,
					'vote'         => 1
				]
			]);



			$document->not_helpful = $this->StudyDocUpvotesModel->count([
				'conditions' => [
					'study_doc_id' => $document->id,
					'vote'         => 0
				]
			]);

			$document->is_login_user_helpful = '';

			if (is($_SESSION['USER_ID'])) {

				$document->is_login_user_helpful = $this->StudyDocUpvotesModel->first([
					'conditions' => [
						'study_doc_id' => $document->id,
						'user_id'      => $_SESSION['USER_ID']
					],
					'fields' => ['vote']
				]);


				$document->followed = $this->UserFollowsModel->first([
					'conditions' => [
						'user_id'     => $document->created_by,
						'follower_id' => $_SESSION['USER_ID']
					],
					'datatype' => 'json'
				]);
			}

			$related_docs = $this->DocumentsModel->all([
				'conditions' => [
					'course_id' => $document->course_id,
					'status'    => true
				],
				'order'    => ['by' => 'id', 'type' => 'desc'],
				'paging'   => ['limit' => 6, 'page' => 1],
				'datatype' => 'json'
			]);
		}

		if ($this->input->post('postComment')) {
			$redirect_url = $_REQUEST['postComment'];

			is_user_login() or redirect(SITE_URL . 'login/?' . $redirect_url);
			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				$this->input->post('study_doc_id') and
					$this->input->post('comment'),
				'unsuccess',
				'seems like its empty'
			);

			$comment = $this->StudyDocCommentsModel->save([
				'user_id'      => $_SESSION['USER_ID'],
				'study_doc_id' => $this->input->post('study_doc_id'),
				'comment'      => $this->input->post('comment'),
			]);
			$notification = $this->NotificationsModel->save([
				'user_id'      		=> $_SESSION['USER_ID'],
				'study_doc_id'		=> $documentId,
				'action'       		=> 'liked'
			]);


			/**
			 * comment by kaushal
			 * done by ajax no need here
			 * /
			/*$arr = [
				'user_id'      => $_SESSION['USER_ID'],
				'study_doc_id' => $this->input->post('study_doc_id'),
				'vote' => '1'
			];

			$like = $this->StudyDocUpvotesModel->save($arr);*/


			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				is($comment),
				'unsuccess',
				'Something went wrong'
			);

			flash_message(
				'document/' . $documentSlug . '/' . $documentId,
				is($comment),
				'success',
				'Thanks for comment'
			);
		}

		$comments = $this->StudyDocCommentsModel->all([
			'fields'     => ['study_doc_comments.*', 'users.first_name', 'users.last_name', 'users.profile_pic'],
			'conditions' => ['study_doc_comments.study_doc_id' => $documentId],
			'join'       => [['users', 'users.id = study_doc_comments.user_id']],
			'datatype'   => 'json'
		]);


		$this->load->view('pages/components/header', compact('site'));
		$this->load->view('pages/document', compact('document', 'comments', 'related_docs', 'studyLists', 'saved', 'view'));
	}


	public function createCourse()
	{
		if ($this->input->post('addCourse')) {
			flash_message(
				str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']),
				$this->input->post('title') and
					$this->input->post('university_id') and
					$this->input->post('course_code'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			/* Slug */
			$slug = get_unique_slug('courses', $this->input->post('title'));

			$course = $this->CoursesModel->save([
				'slug'          => $slug,
				'university_id' => $this->input->post('university_id'),
				'title'         => str_clean($this->input->post('title'), [' ', '-', '_']),
				'course_code'   => $this->input->post('course_code'),
				'created_by'    => $_SESSION['USER_ID'] ?: '1',
				'modified_by'   => $_SESSION['USER_ID'] ?: '1',
				'status'        => true,
			]);

			$userCourse = $this->UserCoursesModel->save([
				'user_id' => $_SESSION['USER_ID'],
				'course_id' => $course
			]);

			flash_message(
				str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']),
				$course,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']),
				$course,
				'success',
				"Course Added Successfully"
			);
		}
	}


	/** Handle Upload Docunent */
	public function uploadDoc()
	{
		if (is($_FILES, 'array') and $this->input->post('uploadDocument')) {
			$path = 'uploads/documents/';
			file_exists($path) or mkdir($path, 0777, true);

			$this->load->library('upload', [
				'allowed_types'    => ['jpg', 'jpeg', 'png', 'doc', 'pdf', 'docx'],
				'encrypt_name'     => true,
				'file_ext_tolower' => true,
				'max_size'         => 10000,
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


	public function upload()
	{
		is_user_login() or redirect(SITE_URL . 'login');

		$categories = $this->CategoriesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => ['status!=' => 3, 'post_type' => 'DOCUMENT'],
			'order'      => ['by' => 'title', 'type' => 'ASC'],
			'datatype'   => 'json'
		]);

		if ($this->input->post('uploadDoc')) {

			// print_r($_FILES);
			// die;

			flash_message(
				'upload',
				$this->input->post('university_id') and
					$this->input->post('course_id'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			flash_message(
				'upload',
				is($_POST['docs'], 'array'),
				'unsuccess',
				'Something Went Wrong',
				'Please Upload Document & Try Again.'
			);

			$docs_id = [];
			foreach ($this->input->post('docs') as $key => $doc) {
				$array = explode('.', $doc);
				$ext   = end($array);
				$path  = '';
				if (is($ext) and strtolower($ext) === 'doc') {
					if (file_exists(APPPATH . '../uploads/documents/' . $doc))
						$path = convert(APPPATH . '../uploads/documents/' . $doc);
				}

				is($path) or $path = 'uploads/documents/' . $doc;

				$config['upload_path']   = './uploads/image/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['encrypt_name']  = TRUE;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('profileImg')) {

					$data = array('upload_data' => $this->upload->data());

					$image 		= SITE_URL . "uploads/image/" . $data['upload_data']['file_name'];
				}


				$docs_id[$key]['id'] = $this->DocumentsModel->save([
					'university_id' => $this->input->post('university_id'),
					'course_id'     => $this->input->post('course_id'),
					'file'          => $path,
					'image'       	=> (isset($image)) ? $image : '',
					'user_id'       => $_SESSION['USER_ID'],
					'created_by'    => $_SESSION['USER_ID'],
					'modified_by'   => $_SESSION['USER_ID'],
					'status'        => 0,
				]);


				$docs_id[$key]['file'] = $this->input->post('docsName')[$key];
			}

			is($docs_id, 'array') and $this->session->set_userdata(['uploadedDocs' => $docs_id]);

			flash_message(
				'upload',
				is($docs_id, 'array'),
				'unsuccess',
				"Something Went Wrong",
				'Please Try After Sometime.'
			);

			flash_message(
				'upload/',
				is($docs_id, 'array'),
				'success',
				"Document Uploaded Successfully"
			);
		}

		if ($this->input->post('addDocument')) {

			// echo '<pre>';
			// print_r($_REQUEST['form']);
			// die;

			$document = false;

			if (is($_POST['form'], 'array'))
				foreach ($this->input->post('form') as $key => $form) {
					if (is($form, 'array')) $form = object($form);

					flash_message(
						'upload',
						is($form->title) and
							is($form->category_id) and
							is($form->catName),
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
						//'summary_content'  => $form->summary_content,
						'summary_content'  => (isset($form->summary_content)) ? $form->summary_content : '',
						//'book_id'          => $form->book_id,
						'book_id'          => (isset($form->book_id)) ? $form->book_id : '',
						'exam_content'     => (isset($form->exam_content)) ? $form->exam_content : '',
						'exam_day'         => $form->day,
						'exam_month'       => $form->month,
						'exam_semester'    => $form->semester,
						'exam_year'        => $form->year,
						//'status'           => '1',
					], ['id' => $key]) && $document = true;
				}

			flash_message(
				'upload',
				$document,
				'unsuccess',
				"Something Went Wrong"
			);

			unset($_SESSION['uploadedDocs']);

			$msg = 'Dear ' . $_SESSION['USER_NAME']  . '<br>' . 'Thanks for Sharing with us your document.';
			sendMail($_SESSION['USER_EMAIL'], 'Document Uploaded', $msg, '', 'html');

			flash_message(
				'upload-successfull',
				$document,
				'success',
				"Document Added Successfully"
			);
		}

		$universities = $this->UniversitiesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => ['status!=' => 3],
			'order'      => ['by' => 'title', 'type' => 'ASC'],
			'datatype'   => 'json'
		]);

		$courses = $this->CoursesModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => ['status!=' => 3],
			'order'      => ['by' => 'title', 'type' => 'ASC'],
			'datatype'   => 'json'
		]);

		$books = $this->BooksModel->all([
			'fields'     => ['id', 'title'],
			'conditions' => ['status!=' => 3],
			'order'      => ['by' => 'title', 'type' => 'ASC'],
			'datatype'   => 'json'
		]);


		show_debug($categories);
		show_debug($courses);
		show_debug($universities);

		$this->view('upload', compact('universities', 'courses', 'books', 'categories'));
	}


	/** User Register */
	public function register()
	{
		is_user_login() and redirect(SITE_URL);

		if ($this->input->post('academic_year')) {

			flash_message(
				'register',
				$this->input->post('first_name') and
					$this->input->post('last_name') and
					$this->input->post('email') and
					$this->input->post('password') and
					$this->input->post('university_id') and
					$this->input->post('academic_year'),
				'unsuccess',
				'Form Empty',
				"Oops, Look Like Form is empty"
			);

			/* username */
			$username = get_unique_slug('users', $this->input->post('first_name') . $this->input->post('last_name'));

			$user = $this->UsersModel->save([
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'email'         => $this->input->post('email'),
				'password'      => hash_hmac('sha1', $this->input->post('password'), PASSWORD_SALT),
				'username'      => $username,
				'university_id' => $this->input->post('university_id'),
				'academic_year' => $this->input->post('academic_year'),
			]);

			flash_message(
				'register',
				is($user),
				'unsuccess',
				'Something went wrong'
			);

			$token = random_string('unique', 12);

			$msg = 'Dear ' . $this->input->post('first_name')  . '<br>' . 'Thanks for be with us, please verify email by clicking this Link. <br/> <a style="display: inline-block;background: #7e00ec;color: #fff;text-decoration: none;padding: 3%;border-radius: 12px;margin: 2% auto;" href="' . SITE_URL . 'verify-email/' . $user . '/' . $token . '">Veriy</a><br><br>';
			sendMail($this->input->post('email'), 'Verification Mail', $msg, '', 'html');

			$this->UsersModel->updateTable(['web_token_id' => $token], ['id' => $user]);

			$this->NotificationsModel->save([
				'user_id'      => $user,
				'study_doc_id' => 0,
				'action'       => 'approved'
			]);

			$this->session->set_userdata([
				'LOGIN'               => bin2hex($this->encryption->create_key(16)),
				'USER_ID'             => $user,
				'USER_USERNAME'       => $username,
				'USER_NAME'           => ucwords($this->input->post('first_name')),
				'USER_FULLNAME'       => ucwords($this->input->post('first_name') . ' ' . $this->input->post('last_name')),
				'USER_EMAIL'          => $this->input->post('email'),
				'USER_MOBILE'         => $this->input->post('mobile'),
				'USER_PIC'            => '',
				'USER_TYPE'           => 'SUBSCRIBER',
				'USER_UNIVERSITY_ID'  => $this->input->post('university_id'),
				'USER_ACADEMIC_YEAR'  => $this->input->post('academic_year'),
				'USER_EMAIL_VERIFIED' => '',
			]);

			flash_message(
				'panel',
				is($user),
				'success',
				'You Are Register Successfully'
			);
		}

		$universities = $this->UniversitiesModel->all([
			'conditions' => ['status' => true],
			'order'      => ['by' => 'title', 'type' => 'asc'],
			'datatype'   => 'json'
		]);

		return $this->view('register', compact('universities'));
	}


	/** User Login */
	public function login()
	{
		is_user_login() and redirect(SITE_URL);

		if ($this->input->post('userLogin')) {

			flash_message(
				'login',
				$this->input->post('email') and
					$this->input->post('password'),
				'unsuccess',
				'Form Empty',
				"Oops, Look Like Form is empty"
			);

			$user = $this->UsersModel->first([
				'conditions' => [
					'email'    => $this->input->post('email'),
					'password' => hash_hmac('sha1', $this->input->post('password'), PASSWORD_SALT)
				]
			]);

			flash_message(
				'login',
				is($user, 'array'),
				'unsuccess',
				'Something went wrong'
			);

			$this->session->set_userdata([
				'LOGIN'                => bin2hex($this->encryption->create_key(16)),
				'USER_ID'              => $user['id'],
				'USER_USERNAME'        => $user['username'],
				'USER_NAME'            => ucwords($user['first_name']),
				'USER_FULLNAME'        => ucwords($user['first_name'] . ' ' . $user['last_name']),
				'USER_EMAIL'           => $user['email'],
				'USER_MOBILE'          => $user['mobile'],
				'USER_PIC'             => is_null($user['profile_pic']) ? '' : $user['profile_pic'],
				'USER_TYPE'            => $user['user_type'],
				'USER_UNIVERSITY_ID'   => $user['university_id'],
				'USER_ACADEMIC_YEAR'   => $user['academic_year'],
				'USER_EMAIL_VERIFIED' => $user['email_verified'],
			]);
			$notification = $this->NotificationsModel->save([
				'user_id'      => $_SESSION['USER_ID'],
				'action'       => 'welcome'
			]);

			// $refer = str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']);
			// var_dump($refer);
			// die;
			// redirect($_SERVER['HTTP_REFERER']);
			if (!empty($_REQUEST['redirect'])) {

				$url = $_REQUEST['redirect'];

				redirect($url);
			} else {

				flash_message(
					'panel',
					is($user, 'array'),
					'success',
					'Welcome Back'
				);
			}
		}

		return $this->view('login');
	}


	public function verification()
	{
		is_user_login() or show_404();
		$user = $this->UsersModel->first([
			'conditions' => [
				'email_verified' => NULL,
				'id'             => $_SESSION['USER_ID']
			],
			'datatype' => 'json'
		]);

		if (is($user, 'json')) {
			$token = random_string('unique', 12);

			$msg = 'Dear ' . $user->first_name  . '<br>' . 'Thanks for be with us, please verify email by clicking this Link. <br/> <a style="display: inline-block;background: #7e00ec;color: #fff;text-decoration: none;padding: 3%;border-radius: 12px;margin: 2% auto;" href="' . SITE_URL . 'verify-email/' . $user->id . '/' . $token . '">Veriy</a><br><br>';
			sendMail($user->email, 'Verification Mail', $msg, '', 'html');

			$this->UsersModel->updateTable(['web_token_id' => $token], ['id' => $_SESSION['USER_ID']]);

			flash_message(
				'',
				is($user, 'json'),
				'unsuccess',
				'You already verified'
			);

			flash_message(
				'',
				is($user, 'json'),
				'success',
				'Password Update Link Send on Your Mail'
			);
		}
	}


	public function verifyEmail($id = null, $token = null)
	{
		if (!is($id) and !is($token))
			return show_404();

		$application = $this->UsersModel->first(['id' => $id, 'web_token_id' => $token]);

		is($application, 'array') or show_404();

		$this->UsersModel->updateTable([
			'email_verified' => 1,
			'web_token_id'   => '',
		], ['id' => $id]);

		$this->session->set_userdata(['USER_EMAIL_VERIFIED' => 1]);

		flash_message(
			'',
			true,
			'success',
			'Your Email Verified Successfully'
		);
	}


	public function forgotPassword()
	{
		if ($this->input->post('userForgotPassword')) {
			flash_message(
				'login',
				$this->input->post('email'),
				'unsuccess',
				'Form Empty',
				"Oops, Look Like Form is empty"
			);

			$user = $this->UsersModel->first([
				'conditions' => [
					'email'    => $this->input->post('email')
				]
			]);

			flash_message(
				'forgot-password',
				is($user, 'array'),
				'unsuccess',
				'Something went wrong'
			);
			$token = random_string('unique', 12);

			$this->UsersModel->updateTable(['web_token_id' => $token], ['id' => $user['id']]);

			$msg = 'Your Password update request recive by clicking this Link to update password. <br/> <a style="display: inline-block;background: #7e00ec;color: #fff;text-decoration: none;padding: 3%;border-radius: 12px;margin: 2% auto;" href="' . SITE_URL . 'password-update/' . $user['id'] . '/' . $token . '">Veriy</a><br><br>';
			sendMail($this->input->post('email'), 'update password', $msg, '', 'html');

			flash_message(
				'forgot-password',
				is($user, 'array'),
				'success',
				'Link send your mail'
			);
		}
		$this->view('forgotPassword', '');
	}


	public function passwordUpdate($id = null, $token = null)
	{
		if (!is($id) and !is($token))
			return show_404();
		$application = $this->UsersModel->first(['id' => $id, 'web_token_id' => $token]);

		is($application, 'array') or show_404();

		if ($this->input->post('updatePass')) {
			flash_message(
				'password-update/' . $id . '/' . $token,
				$this->input->post('password') and
					$this->input->post('id') and
					$this->input->post('token'),
				'unsuccess',
				'Form Empty',
				"Oops, Look Like Form is empty"
			);

			$this->UsersModel->updateTable([
				'password'     => hash_hmac('sha1', $this->input->post('password'), PASSWORD_SALT),
				'web_token_id' => '',
			], ['id' => $id]);

			flash_message(
				'',
				true,
				'success',
				'Your Password Upadated Successfully'
			);
		}
		$this->view('password', ['token' => $token, 'id' => $id]);
	}


	public function logout()
	{
		flash_message(
			'',
			is_user_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);
		unset($_SESSION['LOGIN'], $_SESSION['USER_ID'], $_SESSION['USER_USERNAME'], $_SESSION['USER_NAME'], $_SESSION['USER_EMAIL'], $_SESSION['USER_MOBILE'], $_SESSION['USER_PIC'], $_SESSION['USER_TYPE'], $_SESSION['USER_UNIVERSITY_ID'], $_SESSION['USER_ACADEMIC_YEAR']);
		session_destroy();
		flash_message(
			'',
			true,
			'success',
			'Your Account Logout Successfully',
			'See You Later.'
		);
	}


	public function panel()
	{
		is_user_login() or show_404();

		$rec_docs = $this->DocumentsModel->all([
			'conditions' => [
				'university_id' => $_SESSION['USER_UNIVERSITY_ID'],
				'status'        => true
			],
			'paging'   => ['limit' => 6, 'page' => 1],
			'datatype' => 'json'
		]);

		$my_courses = $this->UserCoursesModel->all([
			'fields'     => ['courses.*', 'universities.slug as university_slug'],
			'conditions' => [
				'user_courses.user_id' => $_SESSION['USER_ID']
			],
			'join'     => [
				['courses', 'courses.id = user_courses.course_id AND courses.status = 1'],
				['universities', 'universities.id = courses.university_id'],
			],
			'datatype' => 'json'
		]);
		$my_books = $this->UserBooksModel->all([
			'conditions' => [
				'user_books.user_id' => $_SESSION['USER_ID']
			],
			'join'     => [
				['books', 'books.id = user_books.book_id AND books.status = 1']
			],
			'datatype' => 'json'
		]);

		$recent_docs = $this->RecentUserDocsModel->all([
			'fields'     => ['study_docs.*'],
			'conditions' => [
				'recent_user_docs.user_id' => $_SESSION['USER_ID']
			],
			'join' => [
				['study_docs', 'study_docs.id = recent_user_docs.study_doc_id']
			],
			'order'    => ['by' => 'id', 'type' => 'desc'],
			'paging'   => ['limit' => 6, 'page' => 1],
			'datatype' => 'json'
		]);

		$studyLists = $this->SavedUserDocsModel->all([
			'conditions' => 'user_id = "' . $_SESSION['USER_ID'] . '" GROUP BY `title`',
			'order'    => ['by' => 'title', 'type' => 'asc'],
			'datatype' => 'json'
		]);

		$this->view('panel', compact('rec_docs', 'my_courses', 'recent_docs', 'studyLists', 'my_books'));
	}

	public function profile()
	{
		is_user_login() or show_404();


		$user_total_points = 0;
		$user_this_month_total_points = 0;
		$user_last_month_total_points = 0;


		$id = $_SESSION['USER_ID'];

		$user = $this->UsersModel->first($id);

		$university = $this->UniversitiesModel->first([
			'conditions' => [
				'id' => $_SESSION['USER_UNIVERSITY_ID']
			],
			'datatype' => 'json'
		]);

		$upload_docs = $this->DocumentsModel->all([
			'conditions' => ['created_by' => $_SESSION['USER_ID'], 'status' => true],
			'order'      => ['by' => 'id', 'type' => 'desc'],
			'datatype'   => 'json'
		]);

		$my_courses = $this->UserCoursesModel->all([
			'fields'     => ['courses.*', 'universities.slug as university_slug'],
			'conditions' => [
				'user_courses.user_id' => $_SESSION['USER_ID']
			],
			'join'     => [
				['courses', 'courses.id = user_courses.course_id AND courses.status = 1'],
				['universities', 'universities.id = courses.university_id'],
			],
			'datatype' => 'json'
		]);
		$my_books = $this->UserBooksModel->all([
			'conditions' => [
				'user_books.user_id' => $_SESSION['USER_ID']
			],
			'join'     => [
				['books', 'books.id = user_books.book_id AND books.status = 1']
			],
			'datatype' => 'json'
		]);

		$total = json_decode(json_encode([
			'total_upload' => $this->DocumentsModel->count([
				'conditions' => ['created_by' => $_SESSION['USER_ID']]
			]),
		]));

		// point calculation
		$point_calc_par = [
			'fields' => ['SUM(points) as user_points'],
			'conditions' => [
				'user_id' => $_SESSION['USER_ID'],
				'credit_debit' => 'credit'
			]
		];

		// total point calculation	

		$total_positive_point = $this->UserPointHistoryModel->first([
			'fields' => ['SUM(points) as user_points'],
			'conditions' => [
				'user_id' => $_SESSION['USER_ID'],
				'credit_debit' => 'credit'
			]
		]);

		//	echo $this->db->last_query();

		$total_nagetive_point = $this->UserPointHistoryModel->first([
			'fields' => ['SUM(points) as user_points'],
			'conditions' => [
				'user_id' => $_SESSION['USER_ID'],
				'credit_debit' => 'debit'
			]
		]);

		//	echo $this->db->last_query();

		$user_total_points = ($total_positive_point['user_points'] - $total_nagetive_point['user_points']);


		// this month point calculation	
		$this_month_total_positive_point = $this->UserPointHistoryModel->first([
			'fields' => ['SUM(points) as user_points'],
			'conditions' => [
				'user_id' => $_SESSION['USER_ID'],
				'credit_debit' => 'credit',
				'created_date >' =>  date('Y-m-01 00:00:00'),
				'created_date <' =>  date('Y-m-t 23:59:59')
			]
		]);

		//	echo $this->db->last_query();

		$this_month_total_nagetive_point = $this->UserPointHistoryModel->first([
			'fields' => ['SUM(points) as user_points'],
			'conditions' => [
				'user_id' => $_SESSION['USER_ID'],
				'credit_debit' => 'debit',
				'created_date >' =>  date('Y-m-01 00:00:00'),
				'created_date <' =>  date('Y-m-t 23:59:59')
			]
		]);

		//	echo $this->db->last_query();

		$this_month_user_total_points = ($this_month_total_positive_point['user_points'] - $this_month_total_nagetive_point['user_points']);

		// this month point calculation	
		$pre_month_total_positive_point = $this->UserPointHistoryModel->first([
			'fields' => ['SUM(points) as user_points'],
			'conditions' => [
				'user_id' => $_SESSION['USER_ID'],
				'credit_debit' => 'credit',
				'created_date >' =>  date('Y-m-01 00:00:00'),
				'created_date <' =>  date('Y-m-d 23:59:59', strtotime('last day of previous month'))
			]
		]);

		//	echo $this->db->last_query();

		$pre_month_total_nagetive_point = $this->UserPointHistoryModel->first([
			'fields' => ['SUM(points) as user_points'],
			'conditions' => [
				'user_id' => $_SESSION['USER_ID'],
				'credit_debit' => 'debit',
				'created_date >' => date('Y-m-01 00:00:00'),
				'created_date<' => date('Y-m-t 23:59:59')
			]
		]);

		//	echo $this->db->last_query();

		$pre_month_user_total_points = ($pre_month_total_positive_point['user_points'] - $pre_month_total_nagetive_point['user_points']);

		//die;
		if (is($upload_docs, 'array')) {
			foreach ($upload_docs as $key => $doc) {
				$upload_docs[$key]->views = $this->RecentUserDocsModel->count([
					'conditions' => ['study_doc_id' => $doc->id]
				]);
			}
		}

		// start calculate total imapct of login user
		if (!empty($upload_docs)) {
			$upload_doc_id_arr = [];
			foreach ($upload_docs as $upload_doc) {
				$upload_doc_id_arr[] = $upload_doc->id;
			}

			$upload_doc_id_arr = implode(',', $upload_doc_id_arr);

			$total_viewed_doc = $this->RecentUserDocsModel->all([
				'conditions' => "study_doc_id in (" . $upload_doc_id_arr . ") "
			]);

			$total_viewed_doc = sizeof($total_viewed_doc);
		} else {
			$total_viewed_doc = '0';
		}
		// end calculate total imapct of login user


		// calculate total_user_uploaded_doc of login user
		if (!empty($upload_docs)) {
			$total_user_uploaded_doc = sizeof($upload_docs);
		} else {
			$total_user_uploaded_doc = '0';
		}

		// calculate total upvote of login user
		if (!empty($upload_docs)) {
			$upload_doc_id_arr = [];
			foreach ($upload_docs as $upload_doc) {
				$upload_doc_id_arr[] = $upload_doc->id;
			}

			$upload_doc_id_arr = implode(',', $upload_doc_id_arr);

			$total_likes_user_get = $this->StudyDocUpvotesModel->all([
				'conditions' => "study_doc_id in (" . $upload_doc_id_arr . ") and vote = 1 "
			]);

			$total_likes_user_get = count($total_likes_user_get);

			$total_comments_count_user_get = $this->StudyDocCommentsModel->all([
				'conditions' => "study_doc_id in (" . $upload_doc_id_arr . ") "
			]);

			$total_comments_count_user_get = count($total_comments_count_user_get);
			//echo $this->db->last_query();
			//die;
		} else {
			$total_likes_user_get = '0';
			$total_comments_count_user_get = '0';
		}


		$studyLists = $this->SavedUserDocsModel->all([
			'conditions' => 'user_id = "' . $_SESSION['USER_ID'] . '" GROUP BY `title`',
			'order'    => ['by' => 'title', 'type' => 'asc'],
			'datatype' => 'json'
		]);

		$this->view('profile', compact('university', 'upload_docs', 'my_courses', 'my_books', 'total', 'user', 'studyLists', 'total_viewed_doc', 'total_user_uploaded_doc', 'total_likes_user_get', 'user_total_points', 'total_comments_count_user_get'));
	}

	public function setting()
	{
		is_user_login() or show_404();

		if ($this->input->post('updateAccount')) {
			flash_message(
				'setting',
				$this->input->post('first_name') and
					$this->input->post('last_name') and
					$this->input->post('email') and
					$this->input->post('country_id'),
				'unsuccess',
				'Form Empty'
			);

			$update = $this->UsersModel->updateTable([
				'first_name'  => $this->input->post('first_name'),
				'last_name'   => $this->input->post('last_name'),
				'country_id'  => $this->input->post('country_id'),
				'email'       => $this->input->post('email'),
				'extra_email' => $this->input->post('extra_email'),
			], ['id' => $_SESSION['USER_ID']]);

			flash_message(
				'setting',
				$update,
				'unsuccess',
				'Something Went Wrong'
			);

			flash_message(
				'setting',
				$update,
				'success',
				'Success'
			);
		}

		if ($this->input->post('updateStudy')) {
			flash_message(
				'setting',
				$this->input->post('academic_year') and
					$this->input->post('university_id'),
				'unsuccess',
				'Form Empty'
			);

			$update = $this->UsersModel->updateTable([
				'academic_year' => $this->input->post('academic_year'),
				'university_id' => $this->input->post('university_id'),
			], ['id' => $_SESSION['USER_ID']]);

			flash_message(
				'setting',
				$update,
				'unsuccess',
				'Something Went Wrong'
			);

			flash_message(
				'setting',
				$update,
				'success',
				'Success'
			);
		}

		if ($this->input->post('updatePassword')) {
			flash_message(
				'setting',
				$this->input->post('c_pass') and
					$this->input->post('n_pass') and
					$this->input->post('cn_pass') and
					$this->input->post('n_pass') == $this->input->post('cn_pass'),
				'unsuccess',
				'Form Empty'
			);

			$lastPass = $this->UsersModel->first([
				'conditions' => ['id' => $_SESSION['USER_ID']],
				'datatype'   => 'json'
			]);

			flash_message(
				'setting',
				is($lastPass, 'json') and
					hash_hmac('sha1', $this->input->post('c_pass'), PASSWORD_SALT) == $lastPass->password,
				'unsuccess',
				'Form Empty'
			);

			$update = $this->UsersModel->updateTable([
				'password' => hash_hmac('sha1', $this->input->post('n_pass'), PASSWORD_SALT),
			], ['id' => $_SESSION['USER_ID']]);

			flash_message(
				'setting',
				$update,
				'unsuccess',
				'Something Went Wrong'
			);

			$msg = 'Dear ' . $lastPass->first_name  . '<br>' . 'Your Password upadate successfully.';
			sendMail($this->input->post('email'), 'Password Update', $msg, '', 'html');

			flash_message(
				'setting',
				$update,
				'success',
				'Success'
			);
		}


		$user = $this->UsersModel->first([
			'conditions' => ['id' => $_SESSION['USER_ID']],
			'datatype'   => 'json'
		]);

		$countries = $this->CountryModel->all(['datatype' => 'json']);

		$universities = $this->UniversitiesModel->all([
			'conditions' => ['status' => true],
			'order'      => ['by' => 'title', 'type' => 'asc'],
			'datatype'   => 'json'
		]);

		$this->view('setting', compact('user', 'countries', 'universities'));
	}

	public function subscription()
	{
		is_user_login() or show_404();
		$this->view('subscription');
	}

	public function uploads()
	{
		is_user_login() or show_404();

		$university = $this->UniversitiesModel->first([
			'conditions' => [
				'id' => $_SESSION['USER_UNIVERSITY_ID']
			],
			'datatype' => 'json'
		]);

		$upload_docs = $this->DocumentsModel->all([
			'conditions' => ['created_by' => $_SESSION['USER_ID'], 'status' => true],
			'order'      => ['by' => 'id', 'type' => 'desc'],
			'datatype'   => 'json'
		]);

		$total = json_decode(json_encode([
			'total_upload' => $this->DocumentsModel->count([
				'conditions' => ['created_by' => $_SESSION['USER_ID'], 'status' => true]
			]),
		]));

		if (is($upload_docs, 'array')) {
			foreach ($upload_docs as $key => $doc) {
				$upload_docs[$key]->views = $this->RecentUserDocsModel->count([
					'conditions' => ['study_doc_id' => $doc->id]
				]);
			}
		}

		$this->view('uploads', compact('university', 'upload_docs', 'total'));
	}

	public function payment()
	{
		is_user_login() or show_404();

		return $this->view('payment');
	}


	public function addtomycourse($universitySlug = null, $courseSlug = null, $id = null)
	{
		flash_message(
			'',
			is($id) and is($universitySlug) and is($courseSlug) and is($_SESSION['USER_ID']),
			'unsuccess',
			'Something went wrong'
		);

		$course = $this->UserCoursesModel->save([
			'user_id'   => $_SESSION['USER_ID'],
			'course_id' => $id
		]);

		flash_message(
			'course/' . $universitySlug . '/' . $courseSlug,
			is($id) and is($universitySlug) and is($courseSlug) and is($_SESSION['USER_ID']) and is($course),
			'unsuccess',
			'Something went wrong'
		);

		flash_message(
			'course/' . $universitySlug . '/' . $courseSlug,
			is($id) and is($universitySlug) and is($courseSlug) and is($_SESSION['USER_ID']) and is($course),
			'success',
			'Course Added Successfully'
		);
	}

	public function removetomycourse($universitySlug = null, $courseSlug = null, $id = null)
	{
		$url = $_SERVER['HTTP_REFERER'];
		// echo $url;
		// die;
		flash_message(
			'',
			is($id) and is($universitySlug) and is($courseSlug) and is($_SESSION['USER_ID']),
			'unsuccess',
			'Something went wrong'
		);

		$course = $this->UserCoursesModel->destroy(['user_id' => $_SESSION['USER_ID'], 'course_id' => $id]);

		// 		flash_message(
		// 			'course/' . $universitySlug . '/' . $courseSlug,
		// 			is($id) and is($universitySlug) and is($courseSlug) and is($_SESSION['USER_ID']) and is($course),
		// 			'unsuccess',
		// 			'Something went wrong'
		// 		);

		// 		flash_message(
		// 			'course/' . $universitySlug . '/' . $courseSlug,
		// 			is($id) and is($universitySlug) and is($courseSlug) and is($_SESSION['USER_ID']) and is($course),
		// 			'success',
		// 			'Course Added Successfully'
		// 		);
		redirect($url);
	}

	public function addtomybook($bookSlug = null, $id = null)
	{
		//die('dsfds');
		flash_message(
			'',
			is($id) and is($bookSlug) and is($_SESSION['USER_ID']),
			'unsuccess',
			'Something went wrong'
		);

		$book = $this->UserBooksModel->save([
			'user_id'   => $_SESSION['USER_ID'],
			'book_id' => $id
		]);

		flash_message(
			'book/' . $bookSlug,
			is($id) and is($bookSlug) and is($_SESSION['USER_ID']) and is($book),
			'unsuccess',
			'Something went wrong'
		);

		flash_message(
			'book/' . $bookSlug,
			is($id) and is($bookSlug) and is($_SESSION['USER_ID']) and is($book),
			'success',
			'Course Added Successfully'
		);
	}

	public function removetomybook($bookSlug = null, $id = null)
	{
		$url = $_SERVER['HTTP_REFERER'];

		//die('dsfds');
		flash_message(
			'',
			is($id) and is($bookSlug) and is($_SESSION['USER_ID']),
			'unsuccess',
			'Something went wrong'
		);

		$book = $this->UserBooksModel->destroy(['user_id' => $_SESSION['USER_ID'], 'book_id' => $id]);

		// 		flash_message(
		// 			'book/' . $bookSlug,
		// 			is($id) and is($bookSlug) and is($_SESSION['USER_ID']) and is($book),
		// 			'unsuccess',
		// 			'Something went wrong'
		// 		);

		// 		flash_message(
		// 			'book/' . $bookSlug,
		// 			is($id) and is($bookSlug) and is($_SESSION['USER_ID']) and is($book),
		// 			'success',
		// 			'Course Added Successfully'
		// 		);
		redirect($url);
	}


	public function follow($followId = null)
	{
		is($_SESSION['USER_ID']) and is($followId) or redirect(SITE_URL . 'login');

		$follow = $this->UserFollowsModel->save([
			'user_id'     => $followId,
			'follower_id' => $_SESSION['USER_ID']
		]);

		flash_message(
			str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']),
			is($follow),
			'unsuccess',
			'Something went wrong'
		);

		flash_message(
			str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']),
			is($follow),
			'success',
			'Successfully Followed'
		);
	}


	public function unfollow($followId = null)
	{
		is($_SESSION['USER_ID']) and is($followId) or redirect(SITE_URL . 'login');

		$follow = $this->UserFollowsModel->destroy([
			'user_id'     => $followId,
			'follower_id' => $_SESSION['USER_ID']
		]);

		flash_message(
			str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']),
			!is($follow),
			'success',
			'Successfully Unfollowed'
		);
	}


	public function helpful($docid = null, $vote = null)
	{
		// die('asd');
		is($_SESSION['USER_ID']) and is($docid) and isset($vote) and !is_null($vote) or redirect(SITE_URL . 'login');

		$last = $this->StudyDocUpvotesModel->all([
			'conditions' => [
				'user_id'      => $_SESSION['USER_ID'],
				'study_doc_id' => $docid
			],
			'datatype' => 'json'
		]);

		if (is($last, 'array')) foreach ($last as $l) {
			$this->StudyDocUpvotesModel->destroy([
				'id' => $l->id
			]);
		}

		$helpful = $this->StudyDocUpvotesModel->save([
			'user_id'      => $_SESSION['USER_ID'],
			'study_doc_id' => $docid,
			'vote'         => $vote
		]);

		// if ($vote == 1) $this->SavedUserDocsModel->save([
		// 	'title'        => 'Saved Documents',
		// 	'user_id'      => $_SESSION['USER_ID'],
		// 	'study_doc_id' => $docid
		// ]);

		flash_message(
			str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']),
			is($helpful),
			'unsuccess',
			'Something went wrong'
		);

		flash_message(
			str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']),
			is($helpful),
			'success',
			'Thanks for Your Feedback'
		);
	}

	public function deleteComment($id)
	{

		is($_SESSION['USER_ID'])  or redirect(SITE_URL . 'login');

		$comment = $this->StudyDocCommentsModel->destroy([
			'id' => $id
		]);

		flash_message(
			str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']),
			is($comment),
			'unsuccess',
			'Something went wrong'
		);

		flash_message(
			str_replace(SITE_URL, '', $_SERVER['HTTP_REFERER']),
			is($comment),
			'success',
			'Thanks for Your Feedback'
		);
	}

	public function user($universtyId = null, $id = null)
	{

		if ($id == null) {
			$id = $_SESSION['USER_ID'];
		}

		$user = $this->UsersModel->first($id);

		$university = $this->UniversitiesModel->first([
			'conditions' => ['id' => $universtyId],
			'datatype'   => 'json'
		]);

		$upload_docs = $this->DocumentsModel->all([
			'conditions' => ['created_by' => $id, 'status' => true],
			'order'      => ['by' => 'id', 'type' => 'desc'],
			'datatype'   => 'json'
		]);

		$my_courses = $this->UserCoursesModel->all([
			'fields'     => ['courses.*', 'universities.slug as university_slug'],
			'conditions' => [
				'user_courses.user_id' => $id
			],
			'join'     => [
				['courses', 'courses.id = user_courses.course_id AND courses.status = 1'],
				['universities', 'universities.id = courses.university_id'],
			],
			'datatype' => 'json'
		]);

		$total = json_decode(json_encode([
			'total_upload' => $this->DocumentsModel->count([
				'conditions' => ['created_by' => $id, 'status' => true]
			]),
		]));

		if (is($upload_docs, 'array')) {
			foreach ($upload_docs as $key => $doc) {
				$upload_docs[$key]->views = $this->RecentUserDocsModel->count([
					'conditions' => ['study_doc_id' => $doc->id]
				]);
			}
		}

		$this->view('profile', compact('university', 'upload_docs', 'my_courses', 'total', 'user'));
	}

	public function faqs()
	{
		$cats = $this->CategoriesModel->all([
			'conditions' => ['post_type' => 'FAQ'],
			'datatype'   => 'json'
		]);
		return $this->view('faqs', compact('cats'));
	}

	public function faq($slug = null, $id = null)
	{
		$category = $this->CategoriesModel->first([
			'conditions' => ['id' => $id],
			'datatype'   => 'json'
		]);
		$faqs = $this->PostsModel->all([
			'conditions' => ['post_type' => 'FAQ', 'category_id' => $id],
			'datatype'   => 'json'
		]);
		return $this->view('faq', compact('faqs', 'category'));
	}

	public function faqSingle($slug = null)
	{
		$faq = $this->PostsModel->first([
			'conditions' => ['post_type' => 'FAQ', 'slug' => $slug],
			'datatype'   => 'json'
		]);
		$category = $this->CategoriesModel->first([
			'conditions' => ['id' => $faq->category_id],
			'datatype'   => 'json'
		]);
		$faqs = $this->PostsModel->all([
			'conditions' => ['post_type' => 'FAQ', 'category_id' => $faq->category_id],
			'datatype'   => 'json'
		]);
		return $this->view('faqSingle', compact('faq', 'category', 'faqs'));
	}

	public function faqSearch()
	{
		$search   = $this->input->post('search');

		$faqs = $this->PostsModel->all([
			'fields' => ['posts.title', 'posts.slug', 'posts.id', 'posts.created_date', 'posts.description', 'posts.category_id', 'categories.title as category_title', 'categories.slug as category_slug'],
			'conditions' => "`posts`.`post_type` = 'FAQ' AND `posts`.`title` Like '%" . $search . "%'",
			'join' => [
				['categories', 'posts.category_id = categories.id']
			],
			'datatype'   => 'json'
		]);


		return $this->view('faqSearch', compact('faqs', 'search'));
	}

	public function uploadSuccessPage()
	{

		$points = $this->SettingsModel->first(['conditions' => ['option_key' => 'site_upload_doc_point']]);
		return $this->view('profile-new', compact('points'));
	}

	public function notifications()
	{
		is_user_login() or show_404();
		$notifications = $this->NotificationsModel->all([
			'fields'     => ['notifications.action'],
			'conditions' => ['notifications.user_id' => $_SESSION['USER_ID']],
			// 'join'       => [['study_docs', 'study_docs.id = notifications.study_doc_id']],
			'datatype'   => 'json'
		]);

		if (is($notifications, 'array')) {
			foreach ($notifications as $key => $value) {
				if (is($value->study_doc_id)) {
					$notifications[$key] = $this->DocumentsModel->first([
						'conditions' => ['id' => $value->study_doc_id],
						'datatype'   => 'json'
					]);
				}
			}
		}

		return $this->view('notifications', compact('notifications'));
	}

	public function post_course_comment()
	{

		if (isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])) {

			$comment_id = $_POST['comment_id'];
			$comment 	= $_POST['comment'];

			$arr = [
				'title' => $comment,
				'parent_id' => $comment_id,
				'user_id' => $_SESSION['USER_ID']
			];

			//print_r($arr);



			$id = $this->CoursePostModel->save($arr);

			$check = $this->CoursePostModel->first($id);
			//echo $this->db->last_query();
			//die('asdasd');
?>
			<div class="col-md-12 mt-5 px-5">
				<div class="row">
					<div class="col-md-2">
						<img src="<?php echo SITE_URL; ?>assets/img/delete-user-17.jpeg" alt="" class="w-100 rounded-circle">
					</div>
					<div class="col-md-10">
						<span class="font-weight-bold mb-0"><?= $_SESSION['USER_NAME'] ?></span>
						<small class="ml-1">now</small>
					</div>
				</div>
				<h5 class="mt-2"> <?= $comment ?></h5>
			</div>
<?php
		}
	}
}

/* End of file  Pages.php */
