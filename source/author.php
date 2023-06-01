<?php
include_once("app/models/Template.php");
include_once("app/models/DB.php");
include_once("app/controllers/AuthorController.php");

$author = new AuthorController();

if (isset($_POST['add'])) {
    // memanggil function add
    $author->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    // memanggil function delete
    $id = $_GET['id_hapus'];
    $author->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // memanggil function update
    $id = $_GET['id_edit'];
    $author->update($_POST, $id);
} else{
    // memanggil function index
    $author->index();
}
