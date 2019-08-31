<?php

class Customer {

    private $template;
    private $cus;
    

    public function __construct() {
        $this->template = new Template();
       $this->cus=new CustomerModel();
    }

    function indexAction() {

        $this->template->render("home");
    }

    function addAction(){
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            $this->cus->cus_name=$_POST['cus_name'];
            $email=$_POST['cus_email'];
            $this->cus->cus_email=$email;
            $this->cus->cus_password=md5($_POST['cus_password']);
            $this->cus->cus_mobile=$_POST['cus_mobile'];
            $this->cus->cus_gender=$_POST['cus_gender'];
            if(!empty($_FILES['cus_image']['name'])){
            $image=time().rand(0,1000).$_FILES['cus_image']['name'];
            move_uploaded_file($_FILES['cus_image']['tmp_name'], Upload_FOLDER.DS.$image);
            $this->cus->cus_image=$image;
            }else{
            $this->cus->cus_image="ABS.jpg";
            }
            $id=$this->cus->insert();
            if( $id >= 1){
                $_SESSION['user_id']=$id;
                header('location:index.php');
            }else{
                echo "no";
            }
        }
    }
    
    function profileAction(){
        if(isset($_SESSION['user_id'])){
        $id=$_SESSION['user_id'];
        $this->template->render('cu/profile');  
        }else{
            $this->template->render('home');
        }
    }
        
    function check_mobileAction(){
        $data=CustomerModel::get_customer_by_mobile($_POST['cus_mobile']);
      if(!empty($data)){
             echo 0;
      }else{
        echo 1;
      }
    }
    function check_emailAction(){
        $data=CustomerModel::get_customer_by_email($_POST['cus_email']);
      if(!empty($data)){
             echo 0;
      }else{
        echo 1;
      }
    }

    function listAction() {
        $this->template->render("cu/list");
    }

}
