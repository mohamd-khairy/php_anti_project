<?php

class Book {

    private $template;
    private $book;

    public function __construct() {
        $this->template = new Template();
        $this->book = new BookModel();
    }

    function indexAction() {
        if (!isset($_SESSION['user_id'])) {
            $this->template->render("home");
        } else {
            $this->template->render("home");
        }
    }

    function checkAction() {
        if (!isset($_SESSION['user_id'])) {
            $this->template->render("home");
        } else {
            $cor_id = $_POST['cor_id'];
            $cus_id = $_POST['cus_id'];
            $data = BookModel::check_user_book($cus_id, $cor_id);
            if (empty($data)) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    function addAction() {
        if (!isset($_SESSION['user_id'])) {
            $this->template->render("home");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $data = CourseModel::getAllDatabyid($_POST['cor_id']);
                if (empty($data)) {
                    die();
                }
                $this->book->cor_id = $_POST['cor_id'];
                $this->book->cus_id = $_POST['cus_id'];
                $this->book->cus_address = $_POST['cus_address'];
                $this->book->cus_job = $_POST['cus_job'];
                $this->book->cus_birth_date = $_POST['cus_birth_date'];
                $pay=$this->book->book_pay = 0;
                $this->book->book_last =($data[0]['cor_cost'] - $pay);
                $this->book->active = FALSE;
                $cor_id = $_POST['cor_id'];
                $cus_id = $_POST['cus_id'];
                $data = BookModel::check_user_book($cus_id, $cor_id);
                 if (empty($data)) {
                if ($this->book->insert() >= 1) {
                    echo 1;
                    die();
                } else {
                    echo 0;
                    die();
                }
               }else{
                   echo 0;
               }
            }
        }
    }

}
