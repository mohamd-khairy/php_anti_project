<?php

class HomePage {

    private $template;
    private $ask;
    private $cus;

    public function __construct() {
        $this->template = new Template();
        $this->valid = new Validation();
        $this->ask = new SuggestModel();
        $this->cus = new CustomerModel();
    }

    function indexAction() {
        $this->template->render("home");
    }

    function con_msgAction(){
        $_SESSION['phone']=$_POST['phone'];
        $_SESSION['name']=$_POST['name'];
        $_SESSION['content']=$_POST['message'];
        $_SESSION['emails']=$_POST['email'];
        header("location:email.php");
    }
            function private_Action() {
        $this->template->render('private');
    }
     function service_Action() {
        $this->template->render('service');
    }

    
     function twitterAction() {
        if (!isset($_SESSION['user_id'])) {
            if (isset($_SESSION['data'])) {
                $dataaccount = CustomerModel::get_cus_by_name($_SESSION['data']->screen_name);
                if (count($dataaccount) > 0) {
                    $_SESSION['user_id'] = (int) $dataaccount[0]['cus_id'];
                    header('location:index.php');
                } else {
                    $this->cus->cus_name = $_SESSION['data']->screen_name;
                    $email = $_SESSION['data']->expanded_url;
                    $this->cus->cus_email = $email;
                    $this->cus->cus_password = md5('twitter');
                    $this->cus->cus_mobile = '01234567890';
                    $this->cus->cus_gender ='male';
                    $this->cus->cus_image = "ABS.jpg";
                    $id = $this->cus->insert();
                    unset($_SESSION['data']);
                    if ($id > 0) {
                        $_SESSION['user_id'] = $id;
                        header('location:index.php');
                    } else {
                        header('location:?rt=HomePage/logout');
                    }
                }
            }
        } else {
            header('location:index.php');
        }
    }
    
    
    function facebookAction() {
        if (!isset($_SESSION['user_id'])) {
            if (isset($_SESSION['facebook'])) {
                $dataaccount = CustomerModel::get_customer_by_email($_SESSION['facebook']['email']);
                if (count($dataaccount) > 0) {
                    $_SESSION['user_id'] = (int) $dataaccount[0]['cus_id'];
                    header('location:index.php');
                } else {
                    //     print_r($_SESSION['facebook']['fname']);
                    $this->cus->cus_name = $_SESSION['facebook']['fname'] . " " . $_SESSION['facebook']['lname'];
                    $email = $_SESSION['facebook']['email'];
                    $this->cus->cus_email = $email;
                    $this->cus->cus_password = md5('facebook');
                    $this->cus->cus_mobile = '01234567890';
                    $this->cus->cus_gender = $_SESSION['facebook']['gender'];
                    $this->cus->cus_image = "ABS.jpg";
                    $id = $this->cus->insert();
                    if ($id > 0) {
                        $_SESSION['user_id'] = $id;
                        header('location:index.php');
                    } else {
                        header('location:logout3.php?logout');
                    }
                }
            }
        } else {
            header('location:index.php');
        }
    }

    function googleAction() {
        if (!isset($_SESSION['user_id'])) {
            if (isset($_SESSION['google_data'])) {
                $dataaccount = CustomerModel::get_customer_by_email($_SESSION['google_data']['email']);
                if (count($dataaccount) > 0) {
                    $_SESSION['user_id'] = $dataaccount[0]['cus_id'];
                    header('location:index.php');
                } else {
                    $this->cus->cus_name = $_SESSION['google_data']['name'];
                    $email = $_SESSION['google_data']['email'];
                    $this->cus->cus_email = $email;
                    $this->cus->cus_password = md5('google');
                    $this->cus->cus_mobile = '01234567891';
                    $this->cus->cus_gender = $_SESSION['google_data']['gender'];
                    $this->cus->cus_image = "ABS.jpg";
                    $id = $this->cus->insert();
                    if ($id > 0) {
                        $_SESSION['user_id'] = $id;
                        header('location:index.php');
                    } else {
                        header('location:logout.php?logout');
                    }
                }
            }
        } else {
            header('location:index.php');
        }
    }

    function loginAction() {
        if (isset($_SESSION['user_id'])) {
            header("location:index.php");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $email = $_POST['username'];
                $pass = md5($_POST['password']);
                $check = CustomerModel::get_customer_by_email_and_pass($email, $pass);
                if (!empty($check)) {
                    $_SESSION['user_id'] = $check[0]['cus_id'];
                    if (isset($_POST['checkbox'])) {
                        $cooki_value = $email;
                        $cooki_time = time() + 60 * 60 * 5;
                        setcookie('cookie_cus_email', $cooki_value, $cooki_time);
                    }
                    echo 1;
                } else {
                    echo 0;
                }
            }
        }
    }

    function logoutAction() {
        unset($_SESSION['user_id']);

        if (isset($_SESSION['facebook'])) {
            header('location:logout3.php?logout');
        }
        if (isset($_SESSION['google_data'])) {
            header('location:logout.php?logout');
        }
        if (isset($_COOKIE['cookie_cus_email'])) {
            $cooki_time = time() - 60 * 5;
            setcookie('cookie_cus_email', "yarb", $cooki_time);
        }
        session_destroy();
        header("location:index.php");
    }

    function aboutAction() {
        $this->template->render('about');
    }

    function contactAction() {
        $this->template->render('contact');
    }

    function suggestAction() {
        $this->ask->ask_answer = $_POST['opinion'];
        $this->ask->insert();
        $this->template->render("home");
    }

}
