<?php

class Cat {

    private $template;
    private $cat;

    public function __construct() {
        $this->template = new Template();
        $this->cat = new CategoryModel();
    }

    function indexAction() {

        $this->template->render("home");
    }

    function showAction() {
        $this->template->render('cat/cor_cat');
    }

}
