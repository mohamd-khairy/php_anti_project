<?php

class Category {

    private $template;
    private $cat;
    private $cor;

    public function __construct() {
        $this->template = new AdminTemplate();
        $this->cat = new CategoryModel();
        $this->cor=new CourseModel();
    }

    function indexAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render("Home");
        }
    }

    function showallAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render("category/show");
        }
    }
    
  
    
    function show_cor_catAction(){
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render("category/show_cor_cat");
        }
    }

    function addAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->cat->cat_name = strtoupper($_POST['cat_name']);
                $this->cat->cat_type = $_POST['cat_type'];
                if ($this->cat->insert() >= 1) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
            $this->template->render("category/add");
        }
    }

    function editAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $data = CategoryModel::getAllDatabyid($_POST['cat_id']);
                if (!empty($data)) {

                    $type = '';
                    if ($data[0]['cat_type'] == 'out') {
                        $type = ' <option selected  value="out">أون لاين</option>
                               <option  value="in">داخل الشركه</option>';
                    } else {
                        $type = ' <option selected  value="in">داخل الشركه</option>
                               <option  value="out">أون لاين</option>';
                    }
                    echo '<div class="input-group">
           <input type="hidden" value="' . $data[0]['cat_id'] . ' id="cat_id" name="cat_id" >
            <input type="text"  name="cat_name" value="' . $data[0]['cat_name'] . '" id="cat_name" class="input form-control" placeholder="أدخل اسم القسم..." style="direction: rtl">
            <span class="input-group-addon">اسم القسم</span>
            </div>
            <span class="cat_name help-block" id="name" style="text-align: center;display: none;color:#c52d2f">validate...</span>
            <br>
            <div class="input-group" >
            <select class="input form-control" name="cat_type" id="cat_type" style="direction: rtl">' . $type . '
            </select>
            <span class="input-group-addon">نوع القسـم</span>
            </div>';
                    die();
                } else {
                    echo 0;
                }
            }
            $this->template->render("category/edit");
        }
    }

    function doeditAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $id = $this->cat->cat_id = $_POST['cat_id'];
                $this->cat->cat_name = strtoupper($_POST['cat_name']);
                $this->cat->cat_type = $_POST['cat_type'];
                if ($this->cat->update($id) >= 1) {
                    echo 1;
                    die();
                } else {
                    echo 0;
                    die();
                }
            }
        }
    }

    function searchAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $name = $this->cat->cat_name = strtoupper($_POST['cat_name']);
                $data = CategoryModel::get_cat_by_name($name);
                if (!empty($data)) {
                    $type = "";
                    if ($data[0]['cat_type'] == "out") {
                        $type = 'أون لاين';
                    } else {
                        $type = 'داخل الشركه';
                    }
                    echo '<div class="col-sm-3 col-md-4" >
                    <a href="#"><div class="media services-wrap wow fadeInDown" style="background-color: tomato;width:200px;height:5px">
                            <p style="color:#ffffff;margin-top: -25px;direction: rtl">' . $type . '</p> 
                            <center><h2 style="color:#000;margin-top: -12px;">' . $data[0]['cat_name'] . '</h2></center>
                        </div></a>
                </div>';
                } else {
                    echo 0;
                }
            }
        }
    }
    
    function deleteAction(){
         if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                if($this->cat->delete($_POST['cat_id'])){
                    if($this->cor->delete_allcor_by_catid('cat_id',$_POST['cat_id'])){
                    echo 1;}
                }  else {
                       echo 0;    
                }
            }
        }
    }
    
    function deleteallAction(){
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else { 
            if($this->cat->deleteAll()){
                  if($this->cor->deleteAll()){  echo 1;}
              }  else {
                  echo 0;    
              }
        }
    }
}
