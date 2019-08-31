<?php
if(isset($_COOKIE['cookie_cus_email'])){
$cookie=CustomerModel::get_customer_by_email($_COOKIE['cookie_cus_email']);
$_SESSION['user_id']=$cookie[0]['cus_id'];
}else if(isset($_SESSION['user_id'])){
$datatuserr=CustomerModel::get_customer_by_id($_SESSION['user_id']);
if(empty($datatuserr)){
unset($_SESSION['user_id']);
} 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>عـــلــم</title>
        <!-- core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
       
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyASNboFIyjqApMKGIz7DxMmCn3sWgFoy9w" async="" defer="defer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
    </head><!--/head-->
    <body class="homepage" id="mizo">
        <header id="header">
            <div style="background-color: #c52d2f"  class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-4">
                            <?php  if(!isset($_SESSION['user_id'])) { ?>
                            <!--                             #c52d2f;-->
                            <div class="top-number"><a style="color: #000; font-weight: bold" href="#login" >تسجيل الدخول  </a> | <a href="#signup" style="color: white;">  حساب جديد </a></div>
                            <?php } else{
                            $data=CustomerModel::get_customer_by_id($_SESSION['user_id']);
                            ?>
                            <div class="top-number"><a href='?rt=HomePage/logout' style="color: white;font-weight: bold"> تسجيل الخروج </a> | <a href="#"  onclick="mido('?rt=Customer/list')" style="color: #000; font-weight: bold"><?= $data[0]['cus_name']?></a></div>
                            <?php   } ?>
                        </div>
                        <div class="col-sm-6 col-xs-8">
                            <div class="social">
                                <ul class="social-share">
                                    <li style="margin-right: 50px">
                                        <form id="formsearch" action="?rt=Cert/search" onsubmit="return search(this)" method="POST"><input type="text" id="search" name="search"  onkeypress="return msgKeyPress(event);"  class="form-control" placeholder="ابحث عن الشهاده بالكود"></form>
                                    </li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!--/.container-->
            </div><!--/.top-bar-->    
            <script type="text/javascript">
                        function search(oFormelemens) {
                        var xhr = new XMLHttpRequest();
                                xhr.open(oFormelemens.method, oFormelements.action, true);
                                xhr.send(new FormData(oFormelements));
                                oFormelements.reset();
                        }
                function msgKeyPress(e) {
                e = e || window.event;
                        if (e.keyCode == 13)
                {
                var val = $("#search").val();
                        if (val == "") {
                alert("ادخل كود الشهاده ");
                        return false;
                } else if (isNaN(val)) {
                alert("ارقام فقط ..");
                        return false;
                } else {
                $("formsearch").submit();
                }
                }
                return true;
                }
            </script>


            <nav style="background-color: #fff;"  class="navbar navbar-inverse" role="banner">
                <div class="container" >
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand"  href="index.php"><img style="width: 100px;height: 130px" src="img/ABS.png" alt="logo"></a>
                    </div>
                    <style>
                        .title {
                            clear: both;
                            display: inline-block;
                            overflow: hidden;
                            white-space: nowrap;
                            padding: 10px;
                        }
                    </style>
                    <center><h1 style="color: #333333 ;font-weight: bold">عـــلـــم للتـدريـب والاستشـارات</h1>
                    </center>
                    <div class="collapse navbar-collapse navbar-right" style=" margin-right: 150px;font-weight: bold">
                        <ul class="nav navbar-nav"  style="font-size: 20px;">
                            <?php 
                            if(!isset($_GET['active'])){
                            $active='index';
                            }else{
                            $active=$_GET['active'];
                            }?>
                            <li class=" <?php if($active == 'con'){
                                    echo 'active'; }?>"><a  onclick="mido_get('?rt=HomePage/contact&active=con', '?rt=HomePage/contact');" href="#" style="color: black" > اتصل بنـا</a></li>
                            <li class="<?php if($active == 'blog'){
                                    echo 'active'; }?>"><a onclick="mido_get('?rt=Blog/show&active=blog', '?rt=Blog/show');" href="#" style="color: black;font-weight: bold">الاخبار</a></li> 

                                <?php
                                if(isset($_SESSION['user_id'])){ 
                                ?>
                                <li class="dropdown  <?php if($active == 'act'){
                                    echo 'active'; }?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: black;font-weight: bold">الاقسام <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php $cats=CategoryModel::get_all_data_from_end('cat_id');
                                    foreach($cats as $cat){
                                    ?>
                                    <li><a onclick="mido_get('?rt=Cat/show&id=<?=$cat['cat_id']?>&active=act', '?rt=Cat/show&id=<?=$cat['cat_id']?>');" href="#"><?=$cat['cat_name']?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li class=" <?php if($active == 'online'){
                                    echo 'active'; }?>"><a href="#"  onclick="mido_get('?rt=Course/online&active=online', '?rt=Course/online')" style="color: black">  التدريب الالكتروني</a></li>
                            <li class=" <?php if($active == 'profile'){
                                    echo 'active'; }?>"><a onclick="mido('?rt=Customer/list&active=profile', '?rt=Customer/list');" href="#"  style="color: black" >كورساتي</a></li>
                            <li class=" <?php if($active == 'index'){
                                    echo 'active'; }?>"><a  onclick="mido('index.php');" href="#" style="color: black" > الرئيسيه</a></li>


                                <?php }else{ ?>
                                <li  class="  <?php if($active == 'about'){
                                    echo 'active'; }?>"><a href="#" onclick="mido_get('?rt=HomePage/about&active=about', '?rt=HomePage/about')" id="button_signup"  style="color: black;font-weight: bold" >من نحن</a></li>

                                <li  class="  <?php if($active == 'inst'){
                                    echo 'active'; }?>"><a href="#" onclick="mido_get('?rt=Instractor/show&active=inst', '?rt=HomePage/about')" id="button_signup"  style="color: black;font-weight: bold" > مدربينا</a></li>

                                <li class=" btn-slide  <?php if($active == 'online'){
                                    echo 'active'; }?>" ><a onclick="mido_get('?rt=Course/online&active=online', '?rt=Course/online')"  href="#"  style="color: black;font-weight: bold"   >التدريب الالكتروني</a></li>
                            <li class="dropdown  <?php if($active == 'act'){
                                    echo 'active'; }?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="color: black;font-weight: bold" >الاقسام <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu"  style="color: black;font-weight: bold" >
                                    <?php $cats=CategoryModel::get_all_data_from_end('cat_id');
                                    foreach($cats as $cat){
                                    if($cat['cat_type']=='in'){
                                    ?>
                                    <li><a onclick="mido_get('?rt=Cat/show&id=<?=$cat['cat_id']?>&active=act', '?rt=Cat/show&id=<?=$cat['cat_id']?>');" href="#"><?=$cat['cat_name']?></a></li>
                                    <?php } } ?>
                                </ul>
                            </li>
                            <li class=" <?php if($active == 'index'){
                                    echo 'active'; }?>"><a onclick="mido('index.php');" href="#" style="color: black;font-weight: bold"  > الرئيسيه</a></li>
                                <?php  } ?>                        
                            </ul>
                        </div>

                    </div><!--/.container-->
                </nav><!--/nav-->
            </header><!--/header-->
            <!-- Trigger/Open The Modal -->

            <script type="text/javascript">

                        function ChangeUrl(page, url) {
                        if (typeof (history.pushState) != "undefined") {
                        var obj = {Page: page, Url: url};
                                history.pushState(obj, obj.Page, obj.Url);
                        } else {
                        window.location.href = "index.php";
                                // alert("Browser does not support HTML5.");
                        }
                        }
                function mido_get(true_path, fake_path) {
                $("#mizo").load(true_path);
                        ChangeUrl('Page1', fake_path);
                }

                function mido(path) {
                $("#mizo").load(path);
                        ChangeUrl('Page1', path);
                }

                function onReady(callback) {
                var intervalID = window.setInterval(checkReady, 500);
                        function checkReady() {
                        if (document.getElementsByTagName('body')[0] !== undefined) {
                        window.clearInterval(intervalID);
                                callback.call(this);
                        }
                        }
                }

                function show(id, value) {
                document.getElementById(id).style.display = value ? 'block' : 'none';
                }

                onReady(function () {
                show('mizo', true);
                        show('loading', false);
                });</script>
            <style type="text/css">
            #mizo {
                display: none;
            }
            #loading {
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                z-index: 100;
                width: 100vw;
                height: 100vh;
                background-color: rgba(192, 192, 192, 0.5);
                background-image: url("http://i.stack.imgur.com/MnyxU.gif");
                background-repeat: no-repeat;
                background-position: center;
            }
        </style>


        <div id="loading"></div>

        <style type="text/css">

            .modalDialog {
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                position: fixed;
                font-family: Arial, Helvetica, sans-serif;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background: rgba(0,0,0,0.8);
                z-index: 99999;
                opacity:0;
                -webkit-transition: opacity 400ms ease-in;
                -moz-transition: opacity 400ms ease-in;
                transition: opacity 400ms ease-in;
                pointer-events: none;
            }
            .modalDialog:target {
                opacity:1;
                pointer-events: auto;
            }

            .modalDialog > div {
                width: 400px;
                /*  display: inline-block; 
                 overflow: auto;
                   position: relative;
                   margin: 10% 10% 10% 10% ;
                   padding:  5px 20px 13px 20px;
                   border-radius: 10px;
                   margin:10% auto;
               display: inline-block;*/
                position: relative;
                margin:10% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
                background: #fff;
                background: -moz-linear-gradient(#fff, #999);
                background: -webkit-linear-gradient(#fff, #999);
                background: -o-linear-gradient(#fff, #999);
            }
            .closee {
                background: #606061;
                color: #FFFFFF;
                line-height: 25px;
                position: absolute;
                right: -12px;
                text-align: center;
                top: -10px;
                width: 24px;
                text-decoration: none;
                font-weight: bold;
                -webkit-border-radius: 12px;
                -moz-border-radius: 12px;
                border-radius: 12px;
                -moz-box-shadow: 1px 1px 3px #000;
                -webkit-box-shadow: 1px 1px 3px #000;
                box-shadow: 1px 1px 3px #000;
            }

            .closee:hover { background: #00d9ff; }
            -webkit-transition:opacity 400ms ease-in;
            -moz-transition: opacity 400ms ease-in;
            transition: opacity 400ms ease-in;
        </style>
        <?php if(!isset($_SESSION['user_id'])){ ?>
        <div id="login" class="modalDialog">
            <div>
                <a href="#" title="closelogin" class="closee">X</a>

                <div class="container" style="margin-left:-2%">
                    <div class="omb_login">
                        <center><strong class="omb_authTitle">Login or <a  href="#signup">تسجيــل</a></strong></center>
                        <div class="row omb_row-sm-offset-3 omb_socialButtons">
                            <div class="col-xs-4 col-sm-2">
                                <a href="../anti/index3.php" class="btn btn-lg btn-block omb_btn-facebook">
                                    <i class="fa fa-facebook visible-xs"></i>
                                    <span class="hidden-xs">Facebook</span>
                                </a>
                            </div>
                            <div class="col-xs-4 col-sm-2">
                                <a href="../anti/index4.php" class="btn btn-lg btn-block omb_btn-twitter">
                                    <i class="fa fa-twitter visible-xs"></i>
                                    <span class="hidden-xs">Twitter</span>
                                </a>
                            </div>  
                            <div class="col-xs-4 col-sm-2">
                                <a href="../anti/index2.php" class="btn btn-lg btn-block omb_btn-google">
                                    <i class="fa fa-google-plus visible-xs"></i>
                                    <span class="hidden-xs">Google+</span>
                                </a>
                            </div>  
                        </div>

                        <div class="row omb_row-sm-offset-3 omb_loginOr">
                            <div class="col-xs-12 col-sm-6">
                                <hr class="omb_hrOr">
                                <span class="omb_spanOr">or</span>
                            </div>
                        </div>

                        <div class="row omb_row-sm-offset-3">
                            <div class="col-xs-12 col-sm-6">    
                                <form class="omb_loginForm" action="?rt=HomePage/login" autocomplete="off" method="POST">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="input form-control" id="username" name="username" placeholder="email address">
                                    </div>
                                    <span class="username help-block"  id="usernamelogin" style="display: none">validate</span>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input  type="password" id="password" class="input form-control" name="password" placeholder="Password">
                                    </div>
                                    <span class="password help-block" id="passwordlogin" style="display: none">validate</span>

                                    <button class="input btn btn-lg btn-primary btn-block" onclick="validatelogin();" type="button">تسجيل الدخول</button>
                                </form>
                            </div>
                        </div>

                        <div class="row omb_row-sm-offset-3">
                            <div class="col-xs-12 col-sm-3">
                                <label class="checkbox">
                                    <input type="checkbox" name="checkbox" id="checkbox" value="remember-me">تذكرني
                                </label>
                            </div>

                        </div> 
                    </div>
                </div>
            </div>
        </div>


        <div id="signup" class="modalDialog">
            <div>
                <a href="#" title="closesignup" class="closee">X</a>

                <div class="row">
                    <center><strong class="omb_authTitle">تسجيل أو <a href="#login" >لديك حساب بالفعل</a></strong><br><br>
                        <form method="POST" id="formregister"  action="?rt=Customer/add" style="direction: rtl" enctype="multipart/form-data"
                              onsubmit="return registeruser(this);" >
                            <div class="input-group">
                                <span class="input-group-addon">الاسم:</span>
                                <input type="text"  name="cus_name" id="cus_name" class="input form-control" placeholder="ادخل اسمك ...">
                            </div>
                            <span class="cus_name help-block" id="namer" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">الصوره:</span>
                                <input type="file" name="cus_image" id="cus_image" class="form-control">    
                            </div>

                            <br>

                            <div class="input-group">
                                <span class="input-group-addon">الايميل:</span>
                                <input type="email" name="cus_email" id="cus_email" class="input form-control" placeholder="ادخل ايميلك...">    
                            </div>
                            <span class="cus_email help-block" id="emailr" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">الباسورد:</span>
                                <input type="password" name="cus_password" id="cus_password" class="input form-control" placeholder="ادخل الباسورد...">  
                            </div>
                            <span class="cus_password help-block" id="passwordr" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon">النوع:</span>
                                <div class="form-control" >
                                    <div class="pull-right" ><input type="radio" name="cus_gender"  value="female" checked>انثي  </div>   
                                    <div class="pull-right" ><input type="radio"  name="cus_gender"  value="male">ذكر</div>
                                </div>
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon">الموبايل:</span>
                                <input type="tel" name="cus_mobile" id="cus_mobile" class="input form-control" placeholder="ادخل رقم الموبايل..."></div>
                            <span class="cus_mobile help-block" id="phoner" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                            <br>

                            <button class="input btn btn-lg btn-primary btn-block" onclick="validateregister();"  type="button">تسجيـــل</button>
                        </form>

                    </center>
                </div>
            </div>
        </div>   

        <?php } ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript">
                                        var mobile = $('#cus_mobile').val();
                                        var email = $('#cus_email').val();
                                        $(".input").bind('blur', function (event) {
                                var $this = $(this);
                                        if ($this.val() == "") {
                                $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                                        $('.' + $this.attr('id') + '').show();
                                } else if ($this.attr('id') == 'cus_email' && $this.val() != '') {
                                var email = $('#cus_email').val();
                                        $.post("?rt=Customer/check_email",{cus_email:email}, function (result) {
                                        if (result == 0) {
                                        $('.cus_email').html("<h4 style='color:#c52d2f'>هذا الايميل بالفعل موجود </h4>");
                                                $('.cus_email').show();
                                        } else {
                                        $('.cus_email').hide();
                                        }
                                        });
                                } else if ($this.attr('id') == 'cus_mobile') {
                                var num = $('#cus_mobile').val().length;
                                        if (!$.isNumeric($this.val())) {
                                $('.cus_mobile').html("<h4 style='color:#c52d2f'>ادخل الموبايل بصوره صحيحه </h4>");
                                        $('.cus_mobile').show();
                                } else if ($.isNumeric($this.val()) && num != 11) {
                                $('.cus_mobile').html("<h4 style='color:#c52d2f'> الرقم غير صحيح .. </h4>");
                                        $('.cus_mobile').show();
                                } else if ($this.val() !== "") {
                                var mobile = $('#cus_mobile').val();
                                        $.post("?rt=Customer/check_mobile",{cus_mobile:mobile}, function (result) {
                                        if (result == 0) {
                                        $('.cus_mobile').html("<h4 style='color:#c52d2f'>هذا الموبايل بالفعل موجود </h4>");
                                                $('.cus_mobile').show();
                                        } else {
                                        $('.cus_mobile').hide();
                                        }
                                        });
                                } else {
                                $('.cus_mobile').hide();
                                }
                                } else {
                                $('.' + $this.attr('id') + '').hide();
                                }

                                });
                                        function validatelogin() {
                                        $("input").each(function () {
                                        var $this = $(this);
                                                if ($this.val() == "") {
                                        $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                                                $('.' + $this.attr('id') + '').show();
                                        } else {
                                        if ($this.attr('id') != 'checkbox') {
                                        $('.' + $this.attr('id') + '').hide();
                                        }
                                        }
                                        });
                                                var hiddenlogin = ($("#passwordlogin").is(":hidden") && $("#usernamelogin").is(":hidden"));
                                                if (hiddenlogin) {
                                        var username = $('#username').val();
                                                var password = $('#password').val();
                                                if ($("#checkbox").prop('checked')) {
                                        var checkbox = $('#checkbox').val();
                                                var values = { username:username, password:password, checkbox:checkbox};
                                        } else {
                                        var values = { username:username, password:password};
                                        }
                                        $.post("?rt=HomePage/login", values, function (result) {
                                        if (result == 0) {
                                        $("#passwordlogin").html("<h4 style='color:#c52d2f'>الباسورد او الايميل خطأ</h4>");
                                                $('#passwordlogin').show();
                                        } else if (result == 1) {
                                        mido("index.php");
                                        }
                                        });
                                        }
                                        }

                                function validateregister() {
                                $("input").each(function () {
                                var $this = $(this);
                                        if ($this.val() == "") {
                                $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                                        $('.' + $this.attr('id') + '').show();
                                        var email = $('#cus_email').val();
                                        $.post("?rt=Customer/check_email",{ cus_email:email}, function (result) {
                                        if (result == 0) {
                                        $('.cus_email').html("<h4 style='color:#c52d2f'>هذا الايميل بالفعل موجود </h4>");
                                                $('.cus_email').show();
                                        } else {
                                        $('.cus_email').hide();
                                        }
                                        });
                                } else if ($this.attr('id') == 'cus_mobile') {
                                var num = $('#cus_mobile').val().length;
                                        if (!$.isNumeric($this.val())) {
                                $('.cus_mobile').html("<h4 style='color:#c52d2f'>ادخل الموبايل بصوره صحيحه </h4>");
                                        $('.cus_mobile').show();
                                } else if ($.isNumeric($this.val()) && num != 11) {
                                $('.cus_mobile').html("<h4 style='color:#c52d2f'> الرقم غير صحيح .. </h4>");
                                        $('.cus_mobile').show();
                                } else if ($this.val() !== "") {
                                var mobile = $('#cus_mobile').val();
                                        $.post("?rt=Customer/check_mobile",{ cus_mobile:mobile}, function (result) {
                                        if (result == 0) {
                                        $('.cus_mobile').html("<h4 style='color:#c52d2f'>هذا الموبايل بالفعل موجود </h4>");
                                                $('.cus_mobile').show();
                                        } else {
                                        $('.cus_mobile').hide();
                                        }
                                        });
                                } else {
                                $('.cus_mobile').hide();
                                }
                                } else {
                                $('.' + $this.attr('id') + '').hide();
                                }
                                });
                                        var hidden = ($("#namer").is(":hidden") && $("#emailr").is(":hidden") && $("#passwordr").is(":hidden") &&
                                                $("#phoner").is(":hidden"));
                                        if (hidden) {
                                $("#formregister").submit();
                                }
                                }

                                function registeruser() {
                                var xhr = new XMLHttpRequest();
                                        xhr.open(this.method, this.action, true);
                                        xhr.send(new FormData(this));
                                }
        </script>