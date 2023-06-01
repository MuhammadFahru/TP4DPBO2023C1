<?php
include_once("app/models/Template.php");
include_once("app/models/DB.php");
include_once("app/controllers/BookController.php");

$book = new BookController();

if (isset($_POST['add'])) {
    // memanggil function add
    $book->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    // memanggil function delete
    $id = $_GET['id_hapus'];
    $book->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // memanggil function edit
    $id = $_GET['id_edit'];
    $book->edit($id);
} else if (isset($_POST['update']) && !empty($_GET['id_update'])) {
    // memanggil function update
    $id = $_GET['id_update'];
    $book->update($_POST, $id);
} else{
    // memanggil function index
    $book->index();
}
