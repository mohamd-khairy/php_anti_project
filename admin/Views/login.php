<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>تسجيل الدخول|أدمن</title>
        <style>
            /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
            @import url(http://weloveiconfonts.com/api/?family=entypo);
            @import url(http://fonts.googleapis.com/css?family=Roboto);

            /* zocial */
            [class*="entypo-"]:before {
                font-family: 'entypo', sans-serif;
            }

            *,
            *:before,
            *:after {
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box; 
            }


            h2 {
                color:rgba(255,255,255,.8);
                margin-left:12px;
            }

            body {
                background: #272125;
                font-family: 'Roboto', sans-serif;

            }

            form {
                position:relative;
                margin: 50px auto;
                width: 380px;
                height: auto;
            }

            input {
                padding: 16px;
                border-radius:7px;
                border:0px;
                background: rgba(255,255,255,.2);
                display: block;
                margin: 15px;
                width: 300px;  
                color:white;
                font-size:18px;
                height: 54px;
            }

            input:focus {
                outline-color: rgba(0,0,0,0);
                background: rgba(255,255,255,.95);
                color: #e74c3c;
            }

            button {
                float:right;
                height: 121px;
                width: 50px;
                border: 0px;
                background: #e74c3c;
                border-radius:7px;
                padding: 10px;
                color:white;
                font-size:22px;
            }

            .inputUserIcon {
                position:absolute;
                top:68px;
                right: 80px;
                color:white;
            }

            .inputPassIcon {
                position:absolute;
                top:136px;
                right: 80px;
                color:white;
            }

            input::-webkit-input-placeholder {
                color: white;
            }

            input:focus::-webkit-input-placeholder {
                color: #e74c3c;
            }
        </style>   
        <script src="js/prefixfree.min.js"></script>

    </head>
    <body>

        <form action="?rt=Home/login" method="post">
            <h2><span class="entypo-login"></span> تسجيل الدخول</h2>
            <button class="submit" type="submit" ><span class="entypo-lock"></span></button>
            <span class="entypo-user inputUserIcon"></span>
            <input type="text" class="user" id="user" placeholder=""/>
            <span class="entypo-key inputPassIcon"></span>
            <input type="password" class="pass" id="pass" placeholder=""/>
            <span  id="result" style="display: none"></span>

        </form>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="js/index.js"></script>  
        <script type="text/javascript">
                function login() {
                    var user = $("#user").val();
                    var pass = $("#pass").val();
                    if (user == "" && pass == "") {
                        $.post("?rt=Home/login", {user: user}, function (result) {
                            if (result == 'yes') {
                                window.location.href = "index.php";
                                return false;
                            } else {
                                $("#result").html('<h4  style="color: #e74c3c">الباسورد او الاسم خطأ...</h4>');
                                $("#result").show();
                            }
                        });
                    } else {
                        $("#result").html('<h4  style="color: #e74c3c">الباسورد او الاسم خطأ...</h4>');
                        $("#result").show();
                    }
                    return false;
                }


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
        </script> 
    </body>
</html>

