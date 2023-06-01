<?php
include_once("config/database.php");
include_once("app/models/Member.php");
include_once("resources/views/MemberView.php");

class MemberController {
    private $member;

    function __construct() {
        $this->member = new Member(Database::$db_host, Database::$db_user, Database::$db_pass, Database::$db_name);
    }

    public function index() {
        $this->member->open();
        $this->member->getMember();
        
        $data = array(
            'member' => array()
        );

        while($row = $this->member->getResult()) {
            array_push($data['member'], $row);
        }

        $this->member->close();

        $view = new MemberView();
        $view->render($data);
    }


    function add($data) {
        $this->member->open();
        $this->member->add($data);
        $this->member->close();
        
        header("location:member.php");
    }

    function update($data, $id) {
        $this->member->open();
        $this->member->update($data, $id);
        $this->member->close();

        header("location:member.php");
    }

    function delete($id) {
        $this->member->open();
        $this->member->delete($id);
        $this->member->close();

        header("location:member.php");
    }

}