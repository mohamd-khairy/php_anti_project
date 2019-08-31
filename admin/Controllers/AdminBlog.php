<?php

class AdminBlog {

    private $template;
    private $blog;
    private $comment;

    public function __construct() {
        $this->template = new AdminTemplate();
        $this->blog = new BlogModel();
        $this->comment = new CommentModel();
    }

    function indexAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render("Home");
        }
    }
    
    function blog_detailsAction(){
         if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
        $this->template->render('b/details');
    }
    }
    

    function showAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render('b/show');
        }
    }

    function uploadimageAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (!empty($_FILES['blog_image']['name'])) {
                $img = time() . rand(0, 1000) . $_FILES['blog_image']['name'];
                move_uploaded_file($_FILES['blog_image']['tmp_name'], Upload_FOLDER . DS . $img);
                echo $img;
                die();
            }
        }
    }

    function addAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->blog->blog_title = $_POST['blog_title'];
                $this->blog->blog_content = $_POST['editor1'];
                $this->blog->blog_image = $_POST['blog_image']; //$img;
                $this->blog->blog_datetime = date(DateTime::ATOM);
                if ($this->blog->insert() >= 1) {
                    echo 'yes';
                    die();
                } else {
                    echo 'no';
                    die();
                }
            }
            $this->template->render('b/add');
        }
    }

    function commentAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->comment->cus_id = $_POST['cus_id'];
                $com = $this->comment->comment_details = $_POST['comment_details'];
                $this->comment->cor_id = 0;
                $this->comment->blog_id = $_POST['blog_id'];
                $this->comment->comment_datetime = date(DateTime::ATOM);
                if ($this->comment->insert() >= 1) {
                    echo $com;
                } else {
                    echo 'no';
                }
            }
        }
    }

    function editAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->blog->delete($_POST['blog_id']);
                $this->blog->blog_title = $_POST['blog_title'];
                $this->blog->blog_content = $_POST['editor1'];
                $this->blog->blog_image = $_POST['blog_image']; //$img;
                $this->blog->blog_datetime = date(DateTime::ATOM);
                if ($this->blog->insert() >= 1) {
                    echo 'yes';
                    die();
                } else {
                    echo 'no';
                    die();
                }
            }
            $this->template->render('b/edit');
        }
    }

    function getnewsAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

                $news = " ";
                $data = BlogModel::getAllDatabyid($_POST['blog_id']);
                foreach ($data as $d) {
                    $news = implode($d, ',');
                }
                echo $news;
                die();
            }
        }
    }

    function deleteallAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                if ($this->blog->deleteAll()) {
                    $this->comment->deleteAll_by_id('blog_id');

                    echo 'yes';
                    die();
                } else {
                    echo 'no';
                    die();
                }
            }
        }
    }

    function deleteAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                if ($this->blog->delete($_POST['blog_id'])) {
                    $this->comment->delete_by_blog_id($_POST['blog_id']);
                    echo 'yes';
                    die();
                } else {
                    echo 'no';
                    die();
                }
            }
            $this->template->render('b/delete');
        }
    }

}
