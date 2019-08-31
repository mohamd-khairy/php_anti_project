<?php

class Cert {

    private $template;
    private $cert;

    public function __construct() {
        $this->template = new Template();
        $this->cert = new cert_printModel();
    }

    function indexAction() {
        if (!isset($_SESSION['user_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render("home");
        }
    }

    function searchAction() {
        if(isset($_POST['search'])) {
            $data = cert_printModel::search("code", $_POST['search']);
            if (!empty($data)) {
                $cert = $data[0];
                $this->template->data_cert = $cert;
                $this->template->render('cert_view/active_print_code');
            } else {
                $this->template->msg = -1;
                $this->template->render('cert_view/active_print_code');
            }
        } else {
            header('location:index.php');
        }
    }

}
