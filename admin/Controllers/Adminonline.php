<?php

class Adminonline {

    private $template;
    private $online;
    private $on_cor;

    public function __construct() {
        $this->template = new AdminTemplate();
        $this->online = new OnlineModel();
        $this->on_cor = new Online_corModel();
    }

    function indexAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render("Home");
        }
    }

    function online_showoneAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render('online/online_showone');
        }
    }

    function delete_all_old_videoAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                if ($this->on_cor->delete_all_on_co_by_catid('online_id', $_POST['online_id'])) {
                    echo 'yes';
                } else {
                    echo 'no';
                }
            }
        }
    }

    function edit_viedo_finishAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->on_cor->online_id = $_POST['online_id'];
                $this->on_cor->on_link = $_POST['on_link'];
                $this->on_cor->on_details = $_POST['on_details'];
                $this->on_cor->insert();
            }
        }
    }

    function editvideoAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            echo '<center><p style="color: #c52d2f; font-weight: bold" >اضف الفيديوهات للكورس .</p></center>
                  <div class="repeat-me">
                  <form method="POST" action="#" id="form"  enctype="multipart/form-data" onsubmit="return submiteditvideo(this);" >';
            $data = Online_corModel::getAllDatabyid($_POST['online_id']);
            if ($_POST['num1'] < count($data)) {
                $data = array();
            }
            for ($i = 0; $i < $_POST['num1']; $i++) {
                if (($i) < count($data)) {
                    echo '<br><div class="input-group">
                    <input type="hidden"  name="online_id"   id="title_' . ($i + 1 * 100) . '" value="' . $_POST['online_id'] . '" >
                    <input type="text"  name="on_details" value="' . $data[$i]['on_details'] . '" class="title form-control"  id="title_' . ($i + 1 * 100) . '"  placeholder="اسم الفيديو" style="direction: rtl"> 
                    <span class="input-group-addon" style="color: red">اسم الفيديو </span>
                    </div>
                    <p class="title_' . ($i + 1 * 100) . ' help-block" id="msg" style="text-align: center;display:none ;color:#c52d2f">
                    validate...</p>
                    <div class = "input-group">
                    <input type = "text" name = "on_link" id = "title_' . ($i + 2 * 100) . '" value = "' . $data[$i]['on_link'] . '" class = "title form-control" placeholder = "لينك الفيديو" style = "direction: rtl">
                    <span class = "input-group-addon" style = "color: red">لينك الفيديو </span>
                    </div>
                    <p class = "title_' . ($i + 2 * 100) . ' help-block" id = "msg" style = "text-align: center;display:none ;color:#c52d2f">
                    validate...</p> <br>';
                } else {
                    echo '<br><div class = "input-group">
                    <input type = "hidden" name = "online_id" id = "title_' . ($i + 3 * 100) . '" value = "' . $_POST['online_id'] . '" >
                    <input type = "text" name = "on_details" class = "title form-control" id = "title_' . ($i + 3 * 100) . '" placeholder = "اسم الفيديو" style = "direction: rtl">
                    <span class = "input-group-addon" style = "color: red">اسم الفيديو </span>
                    </div>
                    <p class="title_' . ($i + 3 * 100) . ' help-block" id="msg" style="text-align: center;display:none ;color:#c52d2f">
                    validate...</p>
                    <div class = "input-group">
                    <input type = "text" name = "on_link" id = "title_' . ($i + 4 * 100) . '" class = "title form-control" placeholder = "لينك الفيديو" style = "direction: rtl">
                    <span class = "input-group-addon" style = "color: red">لينك الفيديو </span>
                    </div>
                    <p class = "title_' . ($i + 4 * 100) . ' help-block" id = "msg" style = "text-align: center;display:none ;color:#c52d2f">
                    validate...</p> <br>';
                }
            }
            echo ' <button class = "input btn btn-lg btn-primary btn-block" onclick = "validatevideo();" type = "button">تعديل</button>
                    </form>
                    </div> ';
        }
    }

    function doeditAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $id = $this->online->online_id = $_POST['online_id'];
                $roww = OnlineModel::getAllDatabyid($id);
                if (!empty($roww)) {
                    $rows = $roww[0];
                } else {
                    die();
                }
                $this->online->online_name = strtoupper($_POST['online_name']);
                $this->online->online_cost = $_POST['online_cost'];
                $this->online->cat_id = $_POST['cat_id'];
                if (!empty($_FILES['online_image']['name'])) {
                    $img = time() . rand(0, 1000) . $_FILES['online_image']['name'];
                    move_uploaded_file($_FILES['online_image']['tmp_name'], Upload_FOLDER . DS . $img);
                    $this->online->online_image = $img;
                } else {
                    $this->online->online_image = $rows['online_image'];
                }
                if ($this->online->update($id) >= 1) {
                    echo 'yes';
                } else {
                    echo 'no';
                }
            }
            $this->template->render('online/doedit');
        }
    }

    function editAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render('online/edit');
        }
    }

    function showallAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render('online/showall');
        }
    }

    function show_cor_cat_onlineAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            $this->template->render("online/show_cor_cat_online");
        }
    }

    function addAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->online->online_name = strtoupper($_POST['online_name']);
                $this->online->online_cost = $_POST['online_cost'];
                $this->online->cat_id = $_POST['cat_id'];
                if (!empty($_FILES['online_image']['name'])) {
                    $img = time() . rand(0, 1000) . $_FILES['online_image']['name'];
                    move_uploaded_file($_FILES['online_image']['tmp_name'], Upload_FOLDER . DS . $img);
                    $this->online->online_image = $img;
                } else {
                    $this->online->online_image = 'ABS.jpg';
                }
                if ($this->online->insert() >= 1) {
                    echo 'yes';
                } else {
                    echo 'no';
                }
            }
            $this->template->render('online/add');
        }
    }

    function videoAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                if (isset($_POST['num_video']) && isset($_POST['online_id'])) {
                    $m = 100;
                    echo '<center><p style = "color: #c52d2f; font-weight: bold" >اضف الفيديوهات التابعه للكورس .</p></center>
                    <form method = "POST" action = "#" id = "formon" enctype = "multipart/form-data" onsubmit = "return submitvideo(this);"> ';
                    for ($i = 1; $i <= $_POST['num_video']; $i++) {
                        echo '<br>
                    <input type = "hidden" name = "online_id" id = "online_id" value = "' . $_POST['online_id'] . '" >
                    <div class = "input-group">
                    <input type = "text" name = "on_name" class = "video form-control" id = "video_' . ($i + 1 * $m) . '" placeholder = "اسم الفيديو" style = "direction: rtl">
                    <span class = "input-group-addon" style = "color: red">اسم الفيديو </span>
                    </div>
                    <p class = "video_' . ($i + 1 * $m) . ' help-block" id = "msg" style = "text-align: center;display:none ;color:#c52d2f">
                    validate...</p>

                    <div class = "input-group">
                    <input type = "text" name = "on_url" class = "video form-control" id = "video_' . ($i + 2 * $m) . '" placeholder = "لينك الفيديو" style = "direction: rtl">
                    <span class = "input-group-addon" style = "color: red"> اللينك </span>
                    </div>
                    <p class = "video_' . ($i + 2 * $m) . ' help-block" id = "msg" style = "text-align: center;display:none ;color:#c52d2f">
                    validate...</p> <br>';
                    }
                    echo ' <button class = "video btn btn-lg btn-primary btn-block" onclick = "validateon();" type = "button">أضــــف</button>
                    </form>

                    ';
                }
            }
        }
    }

    function addvideoAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->on_cor->online_id = $_POST['online_id'];
                $this->on_cor->on_link = $_POST['on_url'];
                $this->on_cor->on_details = $_POST['on_name'];
                $this->on_cor->insert();
            }
            $this->template->render('online/addvideo');
        }
    }

    function searchAction() {
        if (!isset($_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $name = strtoupper($_POST['online_name']);
                $data = OnlineModel::search_real('online_name ', $name);
                if (!empty($data)) {
                    foreach ($data as $on) {
                        if ($on['online_cost'] != 0) {
                            $cost = $on['online_cost'] . " $";
                        } else {
                            $cost = 'free';
                        }
                        echo ' <div class = "col-sm-4 col-md-4">
                    <div class = "media services-wrap wow fadeInDown" style = "height:300px; background-color: #c52d2f">

                    <a href = "#" ">
                                <div >
                                    <img class="img-responsive"  style="width:200px;
                    height:150px;
                    "  src="' . HostName . DS . 'img' . DS . $on['online_image'] . '" style="margin-left:-5% ">
                                </div>
                                <div class="media-body">
                                    <center>   <h3 class="media-heading" style="font-weight: bold;
                    color: black">' . $on['online_name'] . '</h3>
                                    </center>
                                </div>                        
                                <div class="media-body">
                                 
                                    <h4 class="pull-left">' . $cost . '</h4>
                                    <h4 class="pull-right"> <center>10 Video</center></h4>

                                </div>
                            </a>
                        </div>
                    </div>';
                    }
                } else {
                    echo 'no';
                }
            }
        }
    }

    function deleteAction() {
        if (!isset(
                        $_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if ($this->online->delete($_POST['online_id'])) {
                if ($this->on_cor->delete_all_on_co_by_catid('online_id', $_POST['online_id'])) {
                    echo "yes";
                }
            } else {
                echo 'no';
            }
        }
    }

    function deleteallAction() {
        if (!isset(
                        $_SESSION['manager_id'])) {
            $this->template->render("login");
        } else {
            if ($this->online->deleteAll()) {
                if ($this->on_cor->deleteAll()) {
                    echo "yes";
                }
            } else {
                echo 'no';
            }
        }
    }

}
