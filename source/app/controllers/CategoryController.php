<?php
include_once("config/database.php");
include_once("app/models/Category.php");
include_once("resources/views/CategoryView.php");

class CategoryController {
    private $category;

    function __construct() {
        $this->category = new Category(Database::$db_host, Database::$db_user, Database::$db_pass, Database::$db_name);
    }

    public function index() {
        $this->category->open();
        $this->category->getCategory();
        
        $data = array(
            'category' => array()
        );

        while($row = $this->category->getResult()) {
            array_push($data['category'], $row);
        }

        $this->category->close();

        $view = new CategoryView();
        $view->render($data);
    }


    function add($data) {
        $this->category->open();
        $this->category->add($data);
        $this->category->close();
        
        header("location:category.php");
    }

    function update($data, $id) {
        $this->category->open();
        $this->category->update($data, $id);
        $this->category->close();

        header("location:category.php");
    }

    function delete($id) {
        $this->category->open();
        $this->category->delete($id);
        $this->category->close();

        header("location:category.php");
    }

}