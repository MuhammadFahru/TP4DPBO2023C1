<?php
include_once("app/models/Template.php");
include_once("app/models/DB.php");
include_once("app/controllers/CategoryController.php");

$category = new CategoryController();

if (isset($_POST['add'])) {
    // memanggil function add
    $category->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    // memanggil function delete
    $id = $_GET['id_hapus'];
    $category->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // memanggil function update
    $id = $_GET['id_edit'];
    $category->update($_POST, $id);
} else{
    // memanggil function index
    $category->index();
}
