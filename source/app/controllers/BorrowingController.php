<?php
include_once("config/database.php");
include_once("app/models/Borrowing.php");
include_once("app/models/Member.php");
include_once("app/models/Book.php");
include_once("resources/views/BorrowingView.php");

class BorrowingController {
    private $borrowing;
    private $borrowingId;
    private $member;
    private $book;

    function __construct() {
        $this->borrowing = new Borrowing(Database::$db_host, Database::$db_user, Database::$db_pass, Database::$db_name);
        $this->borrowingId = new Borrowing(Database::$db_host, Database::$db_user, Database::$db_pass, Database::$db_name);
        $this->member = new Member(Database::$db_host, Database::$db_user, Database::$db_pass, Database::$db_name);
        $this->book = new Book(Database::$db_host, Database::$db_user, Database::$db_pass, Database::$db_name);
    }

    public function index() {
        $this->borrowing->open();
        $this->borrowing->getBorrowing();

        $this->member->open();
        $this->member->getMember();

        $this->book->open();
        $this->book->getBook();
        
        $data = array(
            'borrowing' => array(),
            'member' => array(),
            'book' => array()
        );

        while($row = $this->borrowing->getResult()) {
            array_push($data['borrowing'], $row);
        }

        while($row = $this->member->getResult()) {
            array_push($data['member'], $row);
        }

        while($row = $this->book->getResult()) {
            array_push($data['book'], $row);
        }

        $this->borrowing->close();
        $this->member->close();
        $this->book->close();

        $view = new BorrowingView();
        $view->render($data);
    }

    public function edit($id) {
        $this->borrowingId->open();
        $this->borrowingId->getBorrowingById($id);

        $this->borrowing->open();
        $this->borrowing->getBorrowing();

        $this->member->open();
        $this->member->getMember();

        $this->book->open();
        $this->book->getBook();

        $data_borrowing = null;
        
        $data = array(
            'borrowing' => array(),
            'member' => array(),
            'book' => array()
        );

        while($row = $this->borrowingId->getResult()) {
            $data_borrowing = $row;
        }

        while($row = $this->borrowing->getResult()) {
            array_push($data['borrowing'], $row);
        }

        while($row = $this->member->getResult()) {
            array_push($data['member'], $row);
        }

        while($row = $this->book->getResult()) {
            array_push($data['book'], $row);
        }

        $this->borrowingId->close();
        $this->borrowing->close();
        $this->member->close();
        $this->book->close();

        $view = new BorrowingView();
        $view->renderEdit($data, $data_borrowing);
    }

    function add($data) {
        $this->borrowing->open();
        $this->borrowing->add($data);
        $this->borrowing->close();
        
        header("location:index.php");
    }

    function update($data, $id) {
        $this->borrowing->open();
        $this->borrowing->update($data, $id);
        $this->borrowing->close();

        header("location:index.php");
    }

    function delete($id) {
        $this->borrowing->open();
        $this->borrowing->delete($id);
        $this->borrowing->close();

        header("location:index.php");
    }

}