<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Book Pages & Queries */
class Book extends CI_Controller
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
			'BooksModel',
			'UniversitiesModel',
		]);
	}


	/** Load Default Index To Show 404 Error
	 *
	 * @return void */
	public function index()
	{
		return show_404();
	}


	/** Add Book */
	public function add_book()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		if ($this->input->post('addBook')) {

			flash_message(
				'add/book',
				$this->input->post('title') and $this->input->post('isbn'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$book_exists = $this->BooksModel->first([
				'title' => str_clean($this->input->post('title'), [' ', '-', '_'])
			]);

			is_null($book_exists) or is_array($book_exists) and $book_exists = $book_exists['title'];

			flash_message(
				'add/book',
				empty($book_exists),
				'unsuccess',
				'Something Went Wrong',
				"Oops, Book Already Exists,<br>Please Try With Another Book."
			);

			/* Slug */
			$slug = get_unique_slug('books', $this->input->post('title'));


			$book = $this->BooksModel->save([
				'slug'        => $slug,
				'title'       => str_clean($this->input->post('title'), [' ', '-', '_']),
				'isbn'        => str_clean($this->input->post('isbn'), [' ', '-', '_']),
				'created_by'  => $_SESSION['USER_ID'],
				'modified_by' => $_SESSION['USER_ID'],
				'status'      => true,
			]);

			flash_message(
				'add/book',
				$book,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/books',
				$book,
				'success',
				"Book Added Successfully"
			);
		}

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('book/add');
		$this->load->view('template/footer');
	}


	/** Load Book List Page */
	public function list_book()
	{
		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		$bookData = object([
			'type' => 'Books'
		]);

		$book = $this->BooksModel->all([
			'fields' => [
				'books.id',
				'books.slug',
				'books.title',
				'books.isbn',
				'books.status',
				'books.created_date',
				'users.first_name as created_by',
			],
			'conditions' => [
				'books.status!=' => '3',
			],
			'join'  => [
				['users', 'users.id = books.created_by']
			],
			'order' => [
				'by'   => 'books.id',
				'type' => 'DESC'
			],
			'datatype' => 'json'
		]);

		empty($book) or is_array($book) and $bookData = object([
			'type' => 'Books',
			'data' => $book
		]);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('book/list', compact('bookData'));
		$this->load->view('template/footer');
	}


	/** Edit Book */
	public function edit_book($book_slug = null)
	{

		empty($book_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		if ($this->input->post('editBook')) {
			flash_message(
				'edit/book/' . $book_slug,
				$this->input->post('title') and $this->input->post('isbn'),
				'unsuccess',
				'Something Went Wrong',
				'Look like Form Not Fill Properly, Please Fill & Try Again.'
			);

			$book_exists = $this->BooksModel->first([
				'title' 	=> str_clean($this->input->post('title'), [' ', '-', '_']),
				'slug!=' 	=> $book_slug
			]);

			is_null($book_exists) or is_array($book_exists) and $book_exists = $book_exists['title'];

			flash_message(
				'edit/book/' . $book_slug,
				empty($book_exists),
				'unsuccess',
				'Something Went Wrong',
				"Oops, Book Already Exists,<br>Please Try With Another Book."
			);

			/* Slug */
			$slug = get_unique_slug('books', $this->input->post('title'));

			$book = $this->BooksModel->updateTable([
				'slug'        => $slug,
				'title'       => $this->input->post('title'),
				'isbn'        => $this->input->post('isbn'),
				'modified_by' => $_SESSION['USER_ID'],
			], ['slug' => $book_slug]);

			flash_message(
				'edit/book/' . $book_slug,
				$book,
				'unsuccess',
				"Something Went Wrong"
			);

			flash_message(
				'list/books',
				$book,
				'success',
				"Book Updated Successfully"
			);
		}

		$bookData = '';
		$book = $this->BooksModel->first([
			'conditions' => [
				'slug'     => $book_slug,
				'status!=' => '3',
			]
		]);
		is($book, 'array') or show_404();

		empty($book) or is_array($book) and $bookData = object($book);

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('book/edit', compact('bookData'));
		$this->load->view('template/footer');
	}


	/** Delete Book */
	public function delete_book($book_slug = null)
	{

		empty($book_slug) and show_404();

		flash_message(
			'dashboard/login',
			is_login(),
			'unsuccess',
			'Please Login Then Try Again'
		);

		$book = $this->BooksModel->updateTable([
			'status' => '3',
		], ['slug' => $book_slug]);
		flash_message(
			'list/books',
			$book,
			'unsuccess',
			"Something Went Wrong"
		);

		flash_message(
			'list/books',
			$book,
			'success',
			"Book Deleted Successfully"
		);
	}
}

    /* End of file Book.php */
