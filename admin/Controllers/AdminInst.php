<?php

class AdminInst {

    private $template;
    private $inst;
    private $cor_inst;

    public function __construct() {
        $this->template = new AdminTemplate();
        $this->inst = new InstractorModel();
        $this->cor_inst=new Cor_instModel();
    }

    function indexAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render("Home");
        }
    }

    function addAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->inst->inst_name = $_POST['inst_name'];
                $this->inst->inst_address = $_POST['inst_address'];
                $this->inst->inst_skill = $_POST['inst_skill'];
                $this->inst->inst_details = $_POST['inst_details'];
                $this->inst->inst_mobile = $_POST['inst_mobile'];
                $this->inst->inst_gender = $_POST['inst_gender'];
                $this->inst->inst_job = $_POST['inst_job'];
                $this->inst->inst_facebook = $_POST['inst_facebook'];
                $this->inst->inst_twitter = $_POST['inst_twitter'];
                $this->inst->inst_google = $_POST['inst_google'];
                if (!empty($_FILES['inst_image']['name'])) {
                    $image = time() . rand(0, 1000) . $_FILES['inst_image']['name'];
                    move_uploaded_file($_FILES['inst_image']['tmp_name'], Upload_FOLDER . DS . $image);
                    $this->inst->inst_image = $image;
                } else {
                    $this->inst->inst_image = 'ABS.jpg';
                }
                if ($this->inst->insert() >= 1) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
            $this->template->render('i/add');
        }
    }

    function editAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
             if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                 $id=$this->inst->inst_id=$_POST['inst_id'];
                 $element=  InstractorModel::get_inst_by_id($id);
                $this->inst->inst_name = $_POST['inst_name'];
                $this->inst->inst_address = $_POST['inst_address'];
                $this->inst->inst_skill = $_POST['inst_skill'];
                $this->inst->inst_details = $_POST['inst_details'];
                $this->inst->inst_mobile = $_POST['inst_mobile'];
                $this->inst->inst_gender = $element[0]['inst_gender'];
                $this->inst->inst_job = $_POST['inst_job'];
                $this->inst->inst_facebook = $_POST['inst_facebook'];
                $this->inst->inst_twitter = $_POST['inst_twitter'];
                $this->inst->inst_google = $_POST['inst_google'];
                if (!empty($_FILES['inst_image']['name'])) {
                    $image = time() . rand(0, 1000) . $_FILES['inst_image']['name'];
                    move_uploaded_file($_FILES['inst_image']['tmp_name'], Upload_FOLDER . DS . $image);
                    $this->inst->inst_image = $image;
                } else {
                    $this->inst->inst_image = $element[0]['inst_image'];
                }
                if ($this->inst->update($id) >= 1) {
                    echo 'yes';
                } else {
                    echo 'no';
                }
            }
            $this->template->render('i/edit');
        }
    }

    function check_mobileAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $data = InstractorModel::get_inst_by_mobile($_POST['inst_mobile']);
            if (!empty($data)) {
                echo $data[0]['inst_id'];
            } else {
                echo "yes";
            }
        }
    }

    function showAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render('i/show');
        }
    }


    
      
    function deleteAction(){
         if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                if($this->inst->delete($_POST['inst_id'])){
                    if($this->cor_inst->delete_all_inst_by_catid('inst_id',$_POST['inst_id'])){
                    echo 1;}
                }  else {
                       echo 0;    
                }
            }
        }
    }
    
    
        }
