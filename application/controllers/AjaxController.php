<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Admin Dashboard Pages */
class AjaxController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model([
			'UsersModel',
			'User_Group_PowersModel',
			'User_GroupsModel',
			'DocumentsModel',
			'UniversitiesModel',
			'BooksModel',
			'CoursesModel',
			'StudyDocUpvotesModel',
			'StudyDocCommentsModel',
			'CoursePostModel',
			'NotificationsModel'
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

	public function search()
	{
		$condition       = ' study_docs.status = 1 ';
		$bookCondition   = ' books.status = 1 ';
		$courseCondition = ' courses.status = 1 ';

		if ($this->input->post('university_id')) {
			$condition .= ' AND `study_docs`.`university_id` = "' . $this->input->post('university_id')[0] . '"';
			$courseCondition .= ' AND `courses`.`university_id` = "' . $this->input->post('university_id')[0] . '"';
		}

		if ($this->input->post('course_id')) {
			$condition .= ' AND `study_docs`.`course_id` = "' . $this->input->post('course_id')[0] . '"';
			$courseCondition .= ' AND `courses`.`id` = "' . $this->input->post('course_id')[0] . '"';
		}

		if ($this->input->post('category_id'))
			$condition .= ' AND `study_docs`.`category_id` = "' . $this->input->post('category_id') . '"';

		if ($this->input->post('language_id'))
			$condition .= ' AND `study_docs`.`language_id` = "' . $this->input->post('language_id') . '"';

		if ($this->input->get_post('query'))
			$condition .= ' AND `study_docs`.`title` LIKE "%' . $this->input->get_post('query') . '%"';


		$books = $this->BooksModel->all([
			'conditions' => $bookCondition,
			'search'     => ['title' => $this->input->get_post('query')],
			'order'      => ['by' => 'id', 'type' => 'desc'],
			'paging'     => ['limit' => 3, 'page' => 1],
			'datatype'   => 'json'
		]);

		$courses = $this->CoursesModel->all([
			'fields'   => [
				'courses.*',
				'universities.title as university',
				'universities.slug as university_slug'
			],
			'conditions' => $courseCondition,
			'search'     => ['courses.title' => $this->input->get_post('query')],
			'join'       => [['universities', 'universities.id = courses.university_id']],
			'order'      => ['by' => 'courses.id', 'type' => 'desc'],
			'paging'     => ['limit' => 3, 'page' => 1],
			'datatype'   => 'json'
		]);

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
			'paging'   => ['limit' => 10, 'page' => 1],
			'datatype' => 'json'
		]); ?>


		<div class="col-md-12">
			<div class="row">
				<?php if (is($books, 'array')) foreach ($books as $book) : ?>
					<div class="col-md-4 mb-4">
						<a href="<?php echo SITE_URL; ?>book/<?php is($book->slug, 'show'); ?>">
							<div class="card">
								<div class="card-body">
									<div class="">
										<div class="d-flex" style="flex-direction: row;">
											<svg class="ic ic-book card-type ic ic-book--small" height="24" viewBox="0 0 66 84">
												<g fill="none" fill-rule="evenodd">
													<path fill="#9C5BC2" d="M1.75328636,1.77389063 C2.82636093,0.701973678 4.24437907,0.110676799 6.00734077,0 L60.0030119,0 C61.9041469,0.230989222 63.3190178,0.811097243 64.2476247,1.74032406 C65.1762315,2.66955088 65.7603566,4.08977347 66,6.00099182 L66,77.9809672 C65.9295984,79.7064607 65.3646198,81.1037241 64.3050642,82.1727573 C63.2455086,83.2417906 61.8219305,83.8508715 60.0343298,84 L6.00764276,84 C4.12887902,83.7796163 2.7242229,83.203659 1.79367439,82.272128 C0.863125894,81.3405971 0.265234429,79.9118925 0,77.9860143 L0,6.00086016 C0.0957830009,4.25479743 0.680211787,2.84580759 1.75328636,1.77389063 Z"></path>
													<polygon fill="#FFF" points="10 0 25 0 25 22 17.5 15.6 10 22"></polygon>
													<g fill="#FFF" transform="translate(10 39)">
														<rect width="24" height="3" rx="1.5"></rect>
														<rect width="44" height="3" y="13" rx="1.5"></rect>
													</g>
												</g>
											</svg>
											<span class="ml-2 text-secondary">Book</span>
										</div>
										<div class="h5 mt-2 mb-5">
											<span class="text-primary">
												<?php is($book->title, 'showCapital') ?>
											</span>
										</div>
										<span class="text-secondary"><?php is($book->author, 'showCapital'); ?></span>
									</div>
								</div>
							</div>
						</a>

					</div>
				<?php endforeach; ?>
			</div>

			<div class="row">
				<?php if (is($courses, 'array')) foreach ($courses as $course) : ?>
					<div class="col-md-4 mb-4">
						<a href="<?php echo SITE_URL; ?>course/<?php is($course->university_slug, 'show') ?>/<?php is($course->slug, 'show'); ?>">
							<div class="card">
								<div class="card-body">
									<div class="">
										<div class="d-flex" style="flex-direction: row;">
											<svg class="ic ic-course card-type ic-course--small" height="20" viewBox="0 0 16 12">
												<g fill="none" fill-rule="evenodd">
													<path fill="#91D7B3" d="M1,2.55996637e-15 L3.74493372,9.54791801e-15 C4.10809886,1.0448872e-14 4.44271796,0.196889745 4.6190883,0.514352211 L6,2.99996073 L0,2.99996073 L-2.55351296e-15,1 C-2.62114833e-15,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
													<rect width="16" height="11" y="1" fill="#91D7B3" rx="2"></rect>
													<rect width="16" height="10" y="2" fill="#56BA89" rx="1"></rect>
													<rect width="3" height="1" x="11" y="7" fill="#FFF" rx=".5"></rect>
													<rect width="6" height="1" x="8" y="9" fill="#FFF" rx=".5"></rect>
												</g>
											</svg>
											<span class="ml-2 text-secondary">Course</span>
										</div>
										<div class="h5 mt-2 mb-5">
											<span class="text-primary">
												<?php is($course->title, 'showCapital') ?>
											</span>
										</div>
										<span class="text-secondary"><?php is($course->university, 'showCapital'); ?></span>
									</div>
								</div>
							</div>
						</a>

					</div>
				<?php endforeach; ?>
			</div>

			<div class="row">
				<?php if (is($documents, 'array')) : ?>
					<?php foreach ($documents as $document) : ?>
						<div class="col-md-12 p-0 border-bottom myHover">
							<div class="d-flex p-3">
								<div class="mr-3 pt-3 px-2" style="width: 10%; background:#aaa; height: 80px; overflow:hidden;">
									<img class="w-100" src="<?php is($document->image, 'show'); ?>" alt="<?php is($document->title, 'show') ?>">
								</div>
								<div style="flex-grow: 1;">
									<div class="">
										<div class="d-flex align-items-center">
											<a href="<?php echo SITE_URL; ?>document/<?php is($document->slug, 'show') ?>/<?php is($document->id, 'show') ?>" class=" font-weight-bold">
												<?php is($document->title, 'showCapital'); ?>
											</a>
											<button class="btn btn-sm btn-white rounded-pill ml-3" style="border-color: #dbdddf; color: #9ea9b5">
												<?php is($document->category_title, 'showCapital'); ?>
											</button>
										</div>

										<div class="d-block">
											<a href="<?php echo SITE_URL; ?>course/<?php is($document->university_slug, 'show'); ?>/<?php is($document->course_slug, 'show'); ?>" class="text-dark font-weight-bold">
												<?php is($document->course_title, 'showCapital'); ?>
											</a>
											<span class="mx-2">
												<svg width="6" height="6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
													<path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
												</svg>
											</span>
											<span class="text-secondary">
												<?php is($document->university_title, 'showCapital'); ?>
											</span>
										</div>

										<div class="mb-3">
											<a href="<?php echo SITE_URL; ?>book/<?php is($document->book_slug, 'show'); ?>" class="text-secondary" style="font-size: 14px;">
												<?php is($document->book_title, 'showCapital'); ?>
											</a>
										</div>



										<div class="text-secondary d-inline mr-2">
											<svg width="9" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
												<path fill="currentColor" d="M288 248v28c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-28c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm-12 72H108c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12zm108-188.1V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h204.1C264.8 0 277 5.1 286 14.1L369.9 98c9 8.9 14.1 21.2 14.1 33.9zm-128-80V128h76.1L256 51.9zM336 464V176H232c-13.3 0-24-10.7-24-24V48H48v416h288z"></path>
											</svg>
											<span style="font-size: 12px;" class="ml-1">
												<?php is($document->doc_pages, 'show'); ?> pages
											</span>
										</div>
										<div class="text-secondary d-inline mr-2">
											<svg width="9" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
												<path fill="currentColor" d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path>
											</svg>
											<span style="font-size: 12px;" class="ml-1">
												<?php if (is($document->created_date)) : ?>
													<?php echo date('M Y', strtotime($document->created_date)); ?>
												<?php endif; ?>
											</span>
										</div>

									</div>
								</div>
								<div class="">
									<div class="text-success d-inline mr-2">
										<svg width="20" height="20" style="margin-bottom: 7px;" class="svg-inline--fa fa-thumbs-up fa-w-16 thumb--neBaI" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
											<path fill="currentColor" d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
										</svg>
									</div> 100%
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				<?php else : ?>
					<div class="col-md-12 py-3 border-bottom mb-3"></div>
				<?php endif; ?>
			</div>
	<?php }

	public function searchCourse()
	{
		$searchQuery = $this->input->post('search');
		$slug        = $this->input->post('university_slug');
		$university  = $this->input->post('university_id');

		$this->db->select('*');
		$this->db->from('courses');
		$this->db->like('title', $searchQuery);
		$this->db->where('university_id', $university);
		$query = $this->db->get();
		$results = $query->result();

		$data = '';
		foreach ($results as $result) :
			$url = SITE_URL . 'course/' . $slug . '/' . $result->slug;
			$data .= '<li class="list-group-item"><a href="' . $url . '">' . $result->title . '</a></li>';
		endforeach;

		return print($data);
	}
	
	public function change_follow_status()
	{
		$follow_status      = $this->input->post('follow_status');
		$user_id            = $this->input->post('user_id');
		$doc_owner_id       = $this->input->post('doc_owner_id');

		$this->db->select('*');
		$this->db->from('user_follows');
		$this->db->where(['user_id' => $doc_owner_id, 'follower_id' => $user_id ]);
		$query = $this->db->get();
		$results = $query->result();
		
		//echo $this->db->last_query();
		
		//print_r($results);
		
		if(!empty($results)) {
		    
		    $this->db->delete('user_follows', array('id' => $results[0]->id));
		    //echo $this->db->last_query();
		    
		    $return = '0';
		} else {
		    $data = array(
                'user_id' => $doc_owner_id,
                'follower_id' => $user_id
            );

            $this->db->insert('user_follows', $data);
            //echo $this->db->last_query();
            
            $return = '1';
		}

		echo $return;
	}
	
	public function like_unlike_doc()
	{
	    $docid      = $this->input->post('doc_id');
	    $vote      = $this->input->post('vote');
	    
	    $last = $this->StudyDocUpvotesModel->all([
			'conditions' => [
				'user_id'      => $_SESSION['USER_ID'],
				'study_doc_id' => $docid
			],
			'datatype' => 'json'
		]);
		
		//echo $this->db->last_query();
		//die;

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
		$notification = $this->NotificationsModel->save([
				'user_id'      		=> $_SESSION['USER_ID'],
				'study_doc_id'		=> $docid,
				'action'       		=> 'liked'
			]);
		
	}
	
	public function delete_comment()
	{
		$comment_id = $this->input->post('comment_id');
		$comment = $this->StudyDocCommentsModel->destroy([
			'id' => $comment_id
		]);

        echo '1';
	}

	public function searchBook()
	{
		$searchQuery = $this->input->post('search');

		$this->db->select('*');
		$this->db->from('books');
		$this->db->like('title', $searchQuery);
		$query = $this->db->get();
		$results = $query->result();

		$data = '';
		foreach ($results as $result) :
			$url = SITE_URL . 'book/' . $result->slug;
			$data .= '<li class="list-group-item"><a href="' . $url . '">' . $result->title . '</a></li>';
		endforeach;

		return print($data);
	}

	public function searchUniversity()
	{
		$searchQuery = $_POST['search'];

		$this->db->select('id, slug, title');
		$this->db->from('universities');
		$this->db->like('title', $searchQuery);
		$this->db->limit(10);
		$query = $this->db->get();
		$results = $query->result();

		$data = '';
		foreach ($results as $result) :
			$data .= '<li class="list-group-item"><a href="' . SITE_URL . 'institution/' . $result->slug . '">' . $result->title . '</a></li>';
		endforeach;
		echo $data;
	}

	public function get_country_name()
	{
		$q =  $_REQUEST['q'];

		$this->db->select('id, title');
		$this->db->from('countries');
		$this->db->like('title', $q);
		$query = $this->db->get();
		$results = $query->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach ($results as $result) {
			$data[] = array("id" => $result['id'], "text" => $result['title']);
		}
		echo json_encode($data);
	}

	public function get_university_name()
	{
		$q =  $_REQUEST['q'];

		$this->db->select('id, title');
		$this->db->from('universities');
		$this->db->like('title', $q, 'after');
		$query = $this->db->get();
		$results = $query->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach ($results as $result) {
			$data[] = array("id" => $result['id'], "text" => $result['title']);
		}
		return print(json_encode($data));
	}

	public function uniName()
	{
		$q =  $_REQUEST['q'];

		$this->db->select('id, title');
		$this->db->from('universities');
		$this->db->like('title', $q);
		$this->db->limit(10);
		$query = $this->db->get();
		$results = $query->result_array();

		// Initialize Array with fetched data
		$data = '';
		foreach ($results as $result) {
			$data .= '<option value="' . $result['title'] . '"/>';
		}
		return print($data);
	}

	public function get_course_name()
	{
		$q =  $_REQUEST['q'];

		$this->db->select('id, title');
		$this->db->from('courses');
		$this->db->like('title', $q);
		$query = $this->db->get();
		$results = $query->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach ($results as $result) {
			$data[] = array("id" => $result['id'], "text" => $result['title']);
		}
		echo json_encode($data);
	}

	public function searchGetCourse()
	{
		$q             = $_POST['q'];
		$university_id = $_POST['university_id'];

		$this->db->select('id, title');
		$this->db->from('courses');
		$this->db->like('title', $q);
		$this->db->where('university_id', $university_id);

		$query   = $this->db->get();
		$results = $query->result_array();
		$data    = [];

		if (is($results, 'array')) foreach ($results as $result) {
			$data[] = ["id" => $result['id'], "text" => $result['title']];
		}
		return print(json_encode($data));
	}

	public function get_course_name_acc_university()
	{
		$q = $this->input->post('q');
		$university_id = $this->input->post('university_id')[0];

		$this->db->select('id, title');
		$this->db->from('courses');
		$this->db->like('title', $q, 'after');
		$this->db->where('university_id', $university_id);
		$query = $this->db->get();
		$results = $query->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach ($results as $result) {
			$data[] = array("id" => $result['id'], "text" => $result['title']);
		}
		echo json_encode($data);
	}

	public function universityList()
	{
		$draw   = $this->input->post('draw');
		$start  = $this->input->post('start');
		$length = $this->input->post('length');
		$search = $this->input->post('search')['value'];

		$page = $start + $length;

		$col = [
			0 => '',
			1 => 'universities.title',
			2 => 'countries.title',
			3 => 'users.first_name',
			4 => '',
			5 => 'universities.created_date'
		];

		$orderBy   = $col[$_POST['order'][0]['column']];
		$orderType = strtoupper($_POST['order'][0]['dir']);

		if (is($orderBy)) {
			$order = [
				'by'   => $orderBy,
				'type' => $orderType
			];
		} else {
			$order = [
				'by'   => 'universities.id',
				'type' => 'DESC'
			];
		}

		$count = $this->UniversitiesModel->count(['conditions' => ['universities.status!=' => '3']]);

		$university = $this->UniversitiesModel->all([
			'fields' => [
				'universities.id',
				'universities.slug',
				'universities.title',
				'universities.country_id',
				'universities.status',
				'universities.created_date',
				'users.first_name as created_by',
				'countries.title as country_title',
			],
			'conditions' => [
				'universities.status!=' => '3',
			],
			'search' => ['universities.title' => $search, 'countries.title' => $search],
			'join'   => [
				['users', 'users.id = universities.created_by'],
				['countries', 'countries.id = universities.country_id'],
			],
			'order'    => $order,
			'paging'   => ['page' => ($page / $length), 'limit' => $length],
			'datatype' => 'json'
		]);

		$universityData = [];
		$i = $start + 1;
		foreach ($university as $value) {
			$universityData[] = [
				$i++,
				'<p class=" mb-0 admin-name"><a href="' . SITE_URL . 'list/courses/' . $value->id . '">' . $value->title . '</a></p><p class="mb-0">' . $value->slug . '</p>',
				'<p class=" mb-0 admin-name text-center">' . $value->country_title . '</p>',
				'<p class=" mb-0 admin-name text-center">' . $value->created_by . '</p>',
				'<span class="badge px-2 py-1 badge-' . get_status($value->status)->class . '">' . get_status($value->status)->title . '</span>',
				$value->created_date,
				'<ul class="table-controls"><li><a href="' . SITE_URL . 'edit/university/' . $value->id . '" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
					<li><a href="' . SITE_URL . 'delete/university/' . $value->id . '" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li></ul>'
			];
		}

		return print(json_encode([
			'draw'            => $draw,
			'postData' => $_POST,
			'recordsFiltered' => $count,
			'recordsTotal'    => $count,
			'data'            => $universityData,
		]));
	}

	public function documentList()
	{
		$draw   = $this->input->post('draw');
		$start  = $this->input->post('start');
		$length = $this->input->post('length');
		$search = $this->input->post('search')['value'];

		$documentTitle   = $this->input->post('columns')[1]['search']['value'];
		$universityTitle = $this->input->post('columns')[2]['search']['value'];

		$page = $start + $length;

		$col = [
			0 => '',
			1 => 'study_docs.title',
			2 => 'universities.title',
			3 => 'users.first_name',
			4 => '',
			5 => 'universities.created_date'
		];

		$orderBy   = $col[$_POST['order'][0]['column']];
		$orderType = strtoupper($_POST['order'][0]['dir']);

		if (is($orderBy)) {
			$order = [
				'by'   => $orderBy,
				'type' => $orderType
			];
		} else {
			$order = [
				'by'   => 'study_docs.id',
				'type' => 'DESC'
			];
		}

		$count = $this->DocumentsModel->count(['conditions' => ['status!=' => '3']]);

		$document = $this->DocumentsModel->all([
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
			'conditions' => ['study_docs.status!=' => '3'],
			'join'       => [
				['users', 'users.id = study_docs.created_by'],
				['universities', 'universities.id = study_docs.university_id'],
				['courses', 'courses.id = study_docs.course_id'],
				['categories', 'categories.id = study_docs.category_id'],
				['languages', 'languages.id = study_docs.language_id']
			],
			'or_search'   => [
				'universities.title'       => $search,
				'study_docs.title'         => $search,
				'study_docs.academic_year' => $search,
				'courses.title'            => $search,
				'categories.title'         => $search,
				'categories.title'         => $documentTitle,
				'study_docs.title'         => $documentTitle,
				'study_docs.academic_year' => $universityTitle,
				'universities.title'       => $universityTitle,
				'courses.title'            => $universityTitle,
			],
			'order'    => $order,
			'paging'   => ['page' => ($page / $length), 'limit' => $length],
			'datatype' => 'json'
		]);

		$documentData = [];
		$i = $start + 1;

		foreach ($document as $value) {
			$documentData[] = [
				$i++,
				'<p class=" mb-0 admin-name">' . $value->title . '</p><p class=" mb-0  text-dark-50">' . $value->category . ',' . $value->language . '</p>',
				'<p class=" mb-0 admin-name">' . $value->university . '</p><p class="mb-0">' . $value->course . '</p><p class="mb-0">' . $value->academic_year . '</p>',
				'<p class=" mb-0 admin-name">' . $value->created_by . '</p>',
				'<span class="badge px-2 py-1 badge-' . get_status($value->status)->class . '">' . get_status($value->status)->title . '</span>',
				$value->created_date,

				'<ul class="table-controls"><li><a href="' . SITE_URL . 'delete/document/' . $value->slug . '" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li></ul>'
			];
		}

		return print(json_encode([
			'draw'            => $draw,
			'postData'        => $_POST,
			'lastQuery'       => $this->db->last_query(),
			'recordsFiltered' => $count,
			'recordsTotal'    => $count,
			'data'            => $documentData,
		]));
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
		
	public function post_course_like()
	{

		if (isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])) {

			// echo 'gunjan';
			// die;

			
			$course_post_id 	= $_POST['course_post_id'];
			$arr = [
				'course_posts_id' => $course_post_id,
				'user_id' => $_SESSION['USER_ID'],
				'vote'    => "1"
			];
			//print_r($arr);
			//die;

			$id = $this->CoursePostLikeModel->save($arr);
			echo $this->db->last_query();
			


		}
	}
	public function check_email()
		{
			
			$email = $_REQUEST['email'];

			$user_exists = $this->UsersModel->first(['conditions' => ['email' => $email]]);
			// echo $this->db->last_query();

			// print_r($user_exists);

			if (!empty($user_exists)) {
				// die('gunab');
				echo json_encode($user_exists);
			} else {
				echo false;
			}
		}
		
		public function check_password()
		{
			$email 		= $_REQUEST['email'];
			$password 	= $_REQUEST['password'];
			$hash_hmac = hash_hmac('sha1', $password, PASSWORD_SALT);

			$user_exists = $this->UsersModel->first([
				'conditions' => "`email` = '$email' AND `password` = '$hash_hmac'"
			]);
			// echo $this->db->last_query();

			// print_r($user_exists);

			if (!empty($user_exists)) {
				// die('gunab');
				echo json_encode($user_exists);
			} else {
				echo false;
			}
		}
}
