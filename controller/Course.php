<?php

class Course {

    private $template;
    private $comment;
   

    public function __construct() {
        $this->template = new Template();
       $this->comment = new CommentModel();
    }

    function indexAction() {

        $this->template->render("home");
    }


    function showAction() {
        $this->template->render('c/show');
    }
    function allAction() {
        if(!isset($_SESSION['user_id'])){
              header('location:index.php');
               }else{
        $this->template->render('c/All_courses');
         }
    }
    function categoryAction() {
        $this->template->render('c/category');
    }
    function commentAction(){
        if(!isset($_SESSION['user_id'])){
              header('location:index.php');
         }else{
            if(strtolower($_SERVER['REQUEST_METHOD'])=='post'){
             $comment=$this->comment->comment_details=$_POST['comment_details'];
             $dateTime=$this->comment->comment_datetime=date(DateTime::ATOM);
             $this->comment->blog_id=0;
             $this->comment->cor_id=$_POST['cor_id'];
             $cus_id=$this->comment->cus_id=$_POST['cus_id'];
             $id=$this->comment->insert();
             if ($id >=1) {
               $data=CustomerModel::get_customer_by_id($cus_id);
             echo '<div class="media comment_section">
                            <div class="pull-left post_comments">
                                <a href="#"><img src="'. HostName.DS.'img'.DS.$data[0]['cus_image'].'" class="img-circle" alt="" /></a>
                            </div>
                            <div class="media-body post_reply_comments">
                                <h3>'.$data[0]['cus_name'].'</h3>
                                <h4>'.date("M d  Y  - H:i A",  strtotime($dateTime)).'</h4>
                                <p>'.$comment.'</p>
                            </div>
                        </div>';
             }else{ 
                echo 0;
             }
             
            }
         } 
    }


function onlineAction(){
    $this->template->render("c/online");
}
function online_showoneAction(){
    $this->template->render("c/online_showone");
}

}