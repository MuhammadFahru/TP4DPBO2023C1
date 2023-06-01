<?php
include_once("app/models/Template.php");
include_once("app/models/DB.php");
include_once("app/controllers/BorrowingController.php");

$borrowing = new BorrowingController();

if (isset($_POST['add'])) {
    // memanggil function add
    $borrowing->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    // memanggil function delete
    $id = $_GET['id_hapus'];
    $borrowing->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // memanggil function edit
    $id = $_GET['id_edit'];
    $borrowing->edit($id);
} else if (isset($_POST['update']) && !empty($_GET['id_update'])) {
    // memanggil function update
    $id = $_GET['id_update'];
    $borrowing->update($_POST, $id);
} else{
    // memanggil function index
    $borrowing->index();
}
