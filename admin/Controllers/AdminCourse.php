<?php

class AdminCourse {

    private $template;
    private $cor;
    private $cor_inst;
    private $cor_content;
    private $book;
    private $comment;

    public function __construct() {
        $this->template = new AdminTemplate();
        $this->cor = new CourseModel();
        $this->cor_content = new Cor_contentModel();
        $this->cor_inst = new Cor_instModel();
        $this->book = new BookModel();
        $this->comment = new CommentModel();
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
            if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
                $this->cor->cat_id = $_POST['cat_id'];
                $this->cor->cor_num_title = $_POST['cor_num_title'];
                $this->cor->cor_cost = $_POST['cor_cost'];
                $this->cor->cor_name = $_POST['cor_name'];
                $this->cor->cor_start_date = $_POST['cor_start_date'];
                $this->cor->cor_time = $_POST['cor_time'];
                if (!empty($_FILES['cor_image']['name'])) {
                    $image = rand(0, 1000) . time() . $_FILES['cor_image']['name'];
                    move_uploaded_file($_FILES['cor_image']['tmp_name'], Upload_FOLDER . DS . $image);
                    $this->cor->cor_image = $image;
                } else {
                    $this->cor->cor_image = "ABS.jpg";
                }
                $day = " ";
                foreach ($_POST['checkbox'] as $value) {
                    $day.=$value . ",";
                    $days = substr($day, 0, -1);
                }
                $this->cor->cor_days = $days;
                $cor_id = $this->cor->insert();
                if ($cor_id >= 1) {
                    $inst = " ";
                    foreach ($_POST['inst_id'] as $value) {
                        $inst.=$value . ",";
                    }
                    $insts = substr($inst, 0, -1);

                    $this->cor_inst->inst_id = $insts;
                    $this->cor_inst->cor_id = $cor_id;
                    if ($this->cor_inst->insert() >= 1) {
                        echo 1;
                    }
                } else {
                    echo "error";
                }
            }
            $this->template->render("c/add");
        }
    }

    function get_last_idAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
                $data = CourseModel::get_last_id($_POST['cor_name']);
                echo $data[0]['cor_id'];
            }
        }
    }

    function uploadimageAction() {
        $i = rand(0, 1000) . time() . $_FILES['cor_image']['name'];
        move_uploaded_file($_FILES['cor_image']['tmp_name'], Upload_FOLDER . DS . $i);
        echo '<input type="hidden" id="current_img" value="' . $i . '">
     <img id="current_img"   src="' . HostName . DS . 'img' . DS . $i . '" style="width: 100px;height: 100px">';
    }

    function editAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
                $cor_id = $this->cor->cor_id = $_POST['cor_id'];
                $this->cor->cat_id = $_POST['cat_id'];
                $this->cor->cor_num_title = $_POST['cor_num_title'];
                $this->cor->cor_cost = $_POST['cor_cost'];
                $this->cor->cor_name = $_POST['cor_name'];
                $this->cor->cor_start_date = $_POST['cor_start_date'];
                $this->cor->cor_time = $_POST['cor_time'];
                $this->cor->cor_image = $_POST['cor_image'];
                $days = substr($_POST['days'], 0, -1);
                $this->cor->cor_days = $days;
                $this->cor->update($cor_id);
                $this->cor_inst->delete_all_inst_by_cor_id($cor_id);
                $insts = substr($_POST['inst'], 0, -1);
                $inst = explode(",", $insts);
                foreach ($inst as $value) {
                    $this->cor_inst->cor_id = $cor_id;
                    $this->cor_inst->inst_id = $value;
                    if ($this->cor_inst->insert() >= 1) {
                        echo 1;
                    } else {
                        echo 0;
                    }
                }
            }
        }
    }

    function get_titleAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            echo '<center><p style="color: #c52d2f; font-weight: bold" >اضف العناوين الرئيسيه للكورس .</p></center>
        <div class="repeat-me">
                  <form method="POST" action="#" id="form"  enctype="multipart/form-data" onsubmit="return submitmyeditForm(this);" >';
            $data = Cor_contentModel::getAllDatabyid($_POST['cor_id']);
            if ($_POST['num1'] < count($data)) {
                $data = array();
            }
            for ($i = 0; $i < $_POST['num1']; $i++) {
                if (($i) < count($data)) {
                    echo '<br><div class="input-group">
             <input type="hidden"  name="id"   id="title_' . $i . '" value="' . $data[$i]['id'] . '" >
             <input type="hidden"  name="cor_id"   id="title_' . $i . '" value="' . $_POST['cor_id'] . '" >
             <input type="text"  name="title_name" value="' . $data[$i]['title'] . '" class="title form-control"  id="title_' . $i . '"  placeholder="اسم العنوان" style="direction: rtl"> 
             <span class="input-group-addon" style="color: red">العنوان </span>
           </div>
           <input type="text" name="title_content" id="title_' . $i . '"  value="' . $data[$i]['details'] . '" class="title form-control" placeholder="محتوي العنوان" style="direction: rtl">
                       
           <p class="title_' . $i . ' help-block" id="msg" style="text-align: center;display:none ;color:#c52d2f">
              validate...</p> <br>';
                } else {

                    echo '<br><div class="input-group">
                  <input type="hidden"  name="cor_id"   id="title_' . $i . '" value="' . $_POST['cor_id'] . '" >
             <input type="hidden"  name="id"   id="title_' . $i . '"  >
             <input type="text"  name="title_name" class="title form-control"  id="title_' . $i . '"  placeholder="اسم العنوان" style="direction: rtl"> 
             <span class="input-group-addon" style="color: red">العنوان </span>
           </div>
           <input type="text" name="title_content" id="title_' . $i . '"  class="title form-control" placeholder="محتوي العنوان" style="direction: rtl">
                       
           <p class="title_' . $i . ' help-block" id="msg" style="text-align: center;display:none ;color:#c52d2f">
              validate...</p> <br>';
                }
            }
            echo ' <button class="input btn btn-lg btn-primary btn-block" onclick="validatetitle();" type="button">تعديل</button>
              </form> 
         </div>';
        }
    }

    function delete_allAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if ($this->cor_content->delete_all_content_by_id($_POST['id'])) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    function edit_titleAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
                if (!empty($_POST['id'])) {
                    $this->cor_content->delete($_POST['id']);
                }
                $this->cor_content->cor_id = $_POST['cor_id'];
                $this->cor_content->title = $_POST['title'];
                $this->cor_content->details = $_POST['content'];
                if ($this->cor_content->insert() >= 1) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        }
    }

    function add_titleAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            echo '<center><p style="color: #c52d2f; font-weight: bold" >اضف العناوين الرئيسيه للكورس .</p></center>
        <div class="repeat-me">
                  <form method="POST" action="#" id="formadd"  enctype="multipart/form-data" onsubmit="return submitmyForm(this);" >';
            for ($i = 0; $i < $_POST['num']; $i++) { //?rt=AdminCourse/add_title
                echo '<br><div class="input-group">
             <input type="hidden"  name="cor_id"   id="title_' . $i . '" value="' . $_POST['cor_id'] . '" >
             <input type="text"  name="title_name" class="title form-control"  id="title_' . $i . '"  placeholder="اسم العنوان" style="direction: rtl"> 
             <span class="input-group-addon" style="color: red">العنوان </span>
           </div>
           <input type="text" name="title_content" id="title_' . $i . '"  class="title form-control" placeholder="محتوي العنوان" style="direction: rtl">
                       
           <p class="title_' . $i . ' help-block" id="msg" style="text-align: center;display:none ;color:#c52d2f">
              validate...</p> <br>';
            }
            echo ' <button class="input btn btn-lg btn-primary btn-block" onclick="validatetitle_add();" type="button">أضــــف</button>
                       </form> 
                     </div>';
        }
    }

    function add_title_2Action() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == "post") {
                $this->cor_content->cor_id = $_POST['id'];
                $this->cor_content->title = $_POST['title'];
                $this->cor_content->details = $_POST['content'];
                if ($this->cor_content->insert() >= 1) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        }
    }

    function deleteAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (!empty($_POST['cor_id'])) {
                if ($this->cor->delete($_POST['cor_id'])) {
                    $this->cor_content->delete_all_content_by_id($_POST['cor_id']);
                    $this->cor_inst->delete_all_inst_by_cor_id($_POST['cor_id']);
                    $this->book->delete_all_inst_by_catid('cor_id', $_POST['cor_id']);
                    $this->comment->delete_by_cor_id($_POST['cor_id']);
                    echo 1;
                } else {
                    echo 0;
                }
            }
        }
    }

    function allAction() {
        $this->template->render("c/show");
    }

    function showoneAction() {
        $this->template->render("c/showone");
    }

}
