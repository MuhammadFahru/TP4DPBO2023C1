<?php
include_once("app/models/Template.php");
include_once("app/models/DB.php");
include_once("app/controllers/MemberController.php");

$member = new MemberController();

if (isset($_POST['add'])) {
    // memanggil function add
    $member->add($_POST);
} else if (!empty($_GET['id_hapus'])) {
    // memanggil function delete
    $id = $_GET['id_hapus'];
    $member->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // memanggil function update
    $id = $_GET['id_edit'];
    $member->update($_POST, $id);
} else{
    // memanggil function index
    $member->index();
}
