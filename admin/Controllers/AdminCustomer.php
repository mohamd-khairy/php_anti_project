<?php

class AdminCustomer {

    private $template;
    private $grade;
    private $book;

    public function __construct() {
        $this->template = new AdminTemplate();
        $this->grade = new GradeModel();
        $this->book =new BookModel();
    }

    function indexAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render("Home");
        }
    }

    function checkbookAction(){
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if(strtolower($_SERVER['REQUEST_METHOD'])=='post'){
               $id=$this->book->book_id=$_POST['book_id'];
                $this->book->active=1;
                $this->book->book_last=$_POST['book_last'];
                $this->book->book_pay=$_POST['book_pay'];
                $this->book->cor_id=$_POST['cor_id'];
                $this->book->cus_address=$_POST['cus_address'];
                $this->book->cus_birth_date=$_POST['cus_birth_date'];
                $this->book->cus_job=$_POST['cus_job'];
                $this->book->cus_id=$_POST['cus_id'];
                if($this->book->update($id)>=1){
                    echo 'yes';
                }else{
                    echo 'no';
                }
            }
            $this->template->render('cu/checkbook');
        }     
    }
            function emailAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (empty($_POST['cus_id'])) {
                echo "no";
                die();
            } else {
                $email = "";
                if (empty(strpos(',', $_POST['cus_id']))) {
                    $info = CustomerModel::get_customer_by_id($_POST['cus_id']);
                    $email = $info[0]['cus_email'];
                } else {
                    $ids = explode(',', $_POST['cus_id']);
                    foreach ($ids as $cus_id) {
                        $info = CustomerModel::get_customer_by_id($cus_id);
                        $email.=$info[0]['cus_email'] . ",";
                    }
                }
                $_SESSION['emails'] = $email;
                $_SESSION['content'] = $_POST['cus_content'];
                header('location:email.php');
            }
        }
    }

    function addgradeAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->grade->grad_name = $_POST['g_name'];
                $this->grade->grad_job = $_POST['g_job'];
                $this->grade->grad_job_place = $_POST['g_job_place'];
                if (!empty($_FILES['g_image']['name'])) {
                    $image = time() . rand(0, 1000) . $_FILES['g_image']['name'];
                    move_uploaded_file($_FILES['g_image']['tmp_name'], Upload_FOLDER . DS . $image);
                    $this->grade->grad_image = $image;
                } else {
                    $this->grade->grad_image = "ABS.jpg";
                }
                if ($this->grade->insert() >= 1) {
                    echo 'yes';
                } else {
                    echo 'no';
                }
            }
            $this->template->render('cu/addgrade');
        }
    }

    function allAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render('cu/list');
        }
    }

    function exportAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $d = "";
            foreach ($_POST['customer_id'] as $i) {
                $d.=$i . ",";
            }
            $d = substr($d, 0, -1);
            if (empty($d)) {
                echo 'no';
                die();
            } else {
                echo 'yes';
            }
            $this->template->data = $d;
            $this->template->render('cu/export');
        }
    }

    function showbookAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render('cu/showbook');
        }
    }

    function AprofileAction() {
        $this->template->render('cu/Aprofile');
    }

}
