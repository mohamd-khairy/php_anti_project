<?php

class Blog {

    private $template;
    private $comment;



    public function __construct() {
        $this->template = new Template();
        $this->comment=new CommentModel();   
    }

    function indexAction() {

        $this->template->render("home");
    }

    
    function showAction(){
        $this->template->render('blog/show');
    }
    
    function blog_detailsAction(){
        $this->template->render('blog/details');
    }
    
    function commentAction() {
      
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
