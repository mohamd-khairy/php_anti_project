<?php  if(isset($_SESSION['manager_id'])){ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> أدمن|أنتي</title>
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
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
        <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyASNboFIyjqApMKGIz7DxMmCn3sWgFoy9w" async="" defer="defer"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    </head><!--/head-->
    <body class="homepage" id="mizo">
        <header id="header">
            <nav class="navbar navbar-inverse" role="banner">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" 
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <a class="navbar-brand "  href="index.php"><img style="width: 100px;height: 60px" src="../img/ABS.png" alt="logo"></a>   
                    </div>
                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav" >
                            <?php 
                            if(!isset($_GET['active'])){
                            $active='index';
                            }else{
                            $active=$_GET['active'];
                            }?>
                            <li  ><a href="?rt=Home/logout" id="btn">تسجيل الخروج</a></li>
                            <li  class=" <?php if($active == 'cert'){
                                     echo 'active'; }?>" ><a onclick="mido_get('?rt=Certificate/print&active=cert', '?rt=Certificate/print');" href="#">طباعه شهاده</a></li>
                            <li   class=" <?php if($active == 'grade'){
                                      echo 'active'; }?>"><a onclick="mido_get('?rt=AdminCustomer/addgrade&active=grade', '?rt=AdminCustomer/addgrade')" href="#" >اضافه خريج</a></li>
                            <li class=" <?php if($active == 'blog'){
                                    echo 'active'; }?>" ><a onclick="mido_get('?rt=AdminBlog/show&active=blog', '?rt=AdminBlog/show');" href="#"> المدونه</a></li>

                                <li class="dropdown  <?php if($active == 'inst'){
                                    echo 'active'; }?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="btn"> <i class="fa fa-angle-down"></i>المدربين
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a onclick="mido_get('?rt=AdminInst/add&active=inst', '?rt=AdminInst/add')" href="#">أضف مدرب</a></li>
                                    <li><a onclick="mido_get('?rt=AdminInst/show&active=inst')" href="#">تعديل مدرب</a></li>
                                </ul>
                            </li>

                            <li  class="  <?php if($active == 'on'){
                                     echo 'active'; }?>" ><a onclick="mido_get('?rt=Adminonline/showall&active=on', '?rt=Adminonline/showall');" href="#">اون لاين كورس</a></li>

                                 <li class="dropdown  <?php if($active == 'cu'){
                                     echo 'active'; }?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="btn"><i class="fa fa-angle-down"></i>العملاء 
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a onclick="mido_get('?rt=AdminCustomer/all&active=cu', '?rt=AdminCustomer/all');" href="#"> العملاء</a></li>
                                    <li><a onclick="mido_get('?rt=AdminCustomer/showbook&active=cu','?rt=AdminCustomer/showbook');" href="#"> الحجوزات</a></li>
                                </ul>
                            </li>

                            <li  class=" <?php if($active == 'cat'){
                                     echo 'active'; }?>"><a onclick="mido_get('?rt=Category/showall&active=cat', '?rt=Category/showall');" href="#">الاقســام</a></li>

                                 <li class="dropdown <?php if($active == 'cor'){
                                     echo 'active'; }?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="btn"> <i class="fa fa-angle-down"></i>الكورسات 
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a onclick="mido_get('?rt=AdminCourse/add&active=cor', '?rt=AdminCourse/add');" href="#">اضف كورس</a></li>
                                    <li><a onclick="mido_get('?rt=AdminCourse/all&active=cor', '?rt=AdminCourse/all');" href="#">تعديل كورس</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div><!--/.container-->
            </nav><!--/nav-->
        </header><!--/header-->
        <!-- Trigger/Open The Modal -->


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
                right: 5px; /*right: -12px;*/
                text-align: center;
                top:5px;/*top: -10px;*/
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
            -webkit-transition: opacity 400ms ease-in;
            -moz-transition: opacity 400ms ease-in;
            transition: opacity 400ms ease-in;

            /*for cert style*/

        </style>


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript">


                                        $(".title").each(function () {
                                            var $this = $(this);
                                            if ($this.val() == "") {
                                                $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                                                $('.' + $this.attr('id') + '').show();
                                            } else {
                                                $('.' + $this.attr('id') + '').hide();
                                            }
                                        });


                                        var m;
                                        function validatetitle() {
                                            $("input").each(function () {
                                                var $this = $(this);
                                                if ($this.val() == "") {
                                                    $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                                                    $('.' + $this.attr('id') + '').show();
                                                } else {
                                                    $('.' + $this.attr('id') + '').hide();
                                                }
                                            });
                                            m = true;
                                            $("#form").find("p").each(function ()
                                            {
                                                if ($(this).is(':visible'))
                                                {
                                                    m = false;
                                                }
                                            }
                                            );
                                            if (m) {

                                                var old_id = $("#cor_id").val();

                                                $.post("?rt=AdminCourse/delete_all", { id: old_id}, function (d) {
                                                    if (d == 1) {

                                                        $("#form").submit();
                                                    }
                                                });
                                            }
                                        }




                                        var v;
                                        function validatetitle_add() {
                                            $("input").each(function () {
                                                var $this = $(this);
                                                if ($this.val() == "") {
                                                    $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                                                    $('.' + $this.attr('id') + '').show();
                                                } else {
                                                    $('.' + $this.attr('id') + '').hide();
                                                }
                                            });
                                            v = true;
                                            $("#formadd").find("p").each(function ()
                                            {
                                                if ($(this).is(':visible'))
                                                {
                                                    v = false;
                                                }
                                            }
                                            );
                                            if (v) {
                                                $("#formadd").submit();
                                            }
                                        }

                                        function submitmyeditForm(oFormElements)
                                        {
                                            var old_id = $("#cor_id").val();

                                            var values = { };
                                            var arr = new Array();
                                            $.each($('#form').serializeArray(), function (i, field) {
                                                values[field.name] = field.value;
                                                arr[arr.length] = field.name;
                                                if (arr.length == 4) {
                                                    arr = [];
                                                    $.post("?rt=AdminCourse/edit_title", { id: values.id, cor_id: values.cor_id, title: values.title_name, content: values.title_content}, function (data) {

                                                    });
                                                }
                                            });
                                            window.location.href = "?rt=AdminCourse/showone&cor_id=" + old_id + "#";
                                            return false;
                                        }


                                        function submitmyForm(oFormElements)
                                        {
                                            var values = { };
                                            var arr = new Array();
                                            $.each($('#formadd').serializeArray(), function (i, field) {
                                                values[field.name] = field.value;
                                                arr[arr.length] = field.name;
                                                if (arr.length == 3) {
                                                    arr = [];
                                                    $.post("?rt=AdminCourse/add_title_2", { id: values.cor_id, title: values.title_name, content: values.title_content}, function (data) {
                                                        window.location.href = "?rt=AdminCourse/add#";
                                                        return false;
                                                    });
                                                }
                                            });

                                            return false;
                                        }


                                        function ChangeUrl(page, url) {
                                            if (typeof (history.pushState) != "undefined") {
                                                var obj = { Page: page, Url: url};
                                                history.pushState(obj, obj.Page, obj.Url);
                                            } else {
                                                window.location.href = "index.php";
                                            }
                                        }

                                        function mido(path) {
                                            $("#mizo").load(path);
                                            ChangeUrl('Page1', path);
                                        }

                                        function mido_get(true_path, fake_path) {
                                            $("#mizo").load(true_path);
                                            ChangeUrl('Page1', fake_path);
                                        }
                                        function onReady(callback) {
                                            var intervalID = window.setInterval(checkReady, 1000);
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
                                        });


        </script>  
        <?php } ?>