<?php
include_once("config/database.php");
include_once("app/models/Author.php");
include_once("resources/views/AuthorView.php");

class AuthorController {
    private $author;

    function __construct() {
        $this->author = new Author(Database::$db_host, Database::$db_user, Database::$db_pass, Database::$db_name);
    }

    public function index() {
        $this->author->open();
        $this->author->getAuthor();
        
        $data = array(
            'author' => array()
        );

        while($row = $this->author->getResult()) {
            array_push($data['author'], $row);
        }

        $this->author->close();

        $view = new AuthorView();
        $view->render($data);
    }


    function add($data) {
        $this->author->open();
        $this->author->add($data);
        $this->author->close();
        
        header("location:author.php");
    }

    function update($data, $id) {
        $this->author->open();
        $this->author->update($data, $id);
        $this->author->close();

        header("location:author.php");
    }

    function delete($id) {
        $this->author->open();
        $this->author->delete($id);
        $this->author->close();

        header("location:author.php");
    }

}