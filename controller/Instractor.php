<?php

class Instractor {

    private $template;

    public function __construct() {
        $this->template = new Template();
    }

    function indexAction() {

        $this->template->render("home");
    }

    function showAction() {
     
        $this->template->render('i/show');
    }

    function deleteAction() {
        $this->degree->delete($_GET['d_id']);
        $this->template->render('D/list');
    }

}
