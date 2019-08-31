<?php

class Home {

    private $template;

    public function __construct() {
        $this->template = new AdminTemplate();
    }

    function indexAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            // unset($_SESSION['manager_id']);
            $this->template->render("Home");
        }
    }

    function loginAction() {
        if (isset($_SESSION['manager_id'])) {
            header("location:index.php");
        } else {
            $_SESSION['manager_id'] = 1;
             header('location:index.php');            
          //  echo 'yes';die();
        }
    }

    function logoutAction() {
        unset($_SESSION['manager_id']);
        header("location:index.php");
    }

}
