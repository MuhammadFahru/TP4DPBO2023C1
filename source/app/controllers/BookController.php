<?php
include_once("config/database.php");
include_once("app/models/Book.php");
include_once("app/models/Author.php");
include_once("app/models/Category.php");
include_once("resources/views/BookView.php");

class BookController {
    private $book;
    private $author;
    private $category;

    function __construct() {
        $this->book = new Book(Database::$db_host, Database::$db_user, Database::$db_pass, Database::$db_name);
        $this->author = new Author(Database::$db_host, Database::$db_user, Database::$db_pass, Database::$db_name);
        $this->category = new Category(Database::$db_host, Database::$db_user, Database::$db_pass, Database::$db_name);
    }

    public function index() {
        $this->book->open();
        $this->book->getBook();

        $this->author->open();
        $this->author->getAuthor();

        $this->category->open();
        $this->category->getCategory();
        
        $data = array(
            'book' => array(),
            'author' => array(),
            'category' => array()
        );

        while($row = $this->book->getResult()) {
            array_push($data['book'], $row);
        }

        while($row = $this->author->getResult()) {
            array_push($data['author'], $row);
        }

        while($row = $this->category->getResult()) {
            array_push($data['category'], $row);
        }

        $this->book->close();
        $this->author->close();
        $this->category->close();

        $view = new BookView();
        $view->render($data);
    }


    function add($data) {
        $this->book->open();
        $this->book->add($data);
        $this->book->close();
        
        header("location:book.php");
    }

    function update($data, $id) {
        $this->book->open();
        $this->book->update($data, $id);
        $this->book->close();

        header("location:book.php");
    }

    function delete($id) {
        $this->book->open();
        $this->book->delete($id);
        $this->book->close();

        header("location:book.php");
    }

}