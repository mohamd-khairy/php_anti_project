
<html><head>  
        <title>Anti Certificate </title></head>
    <body>
        

        <style type="text/css">
            #bigText{    
                overflow:hidden; 
                font-size:17px;   
                font-family: Sans-Serif; 
                margin-top: 27px;    
                text-align: center;  
                font-weight: bold;

            }
            #middleText{    
                overflow:hidden; 
                font-size:15px;   
                font-family: Sans-Serif; 
                margin-top: 27px;    
                text-align: center;  
                font-weight: bold;

            }  
            #smallText{   
                overflow:hidden;   
                font-size:10px;    
                font-family: Sans-Serif;     
                margin-top: 27px;   
                text-align: center;  
                font-weight: bold;
            } 
            #position{ 
                display: list-item;// inline-block; //table-cell;   
                //vertical-align: middle; 
                // width: 100%;
                // height: 100%;
            }
            hr{
                width: 100px;
            }
            .title {
                clear: both;
                display: inline-block;
                overflow: hidden;
                white-space: nowrap;
                padding: 10px;
            }
            .imgback {
                background-image: url(../img/cert.jpg);
                background-size: 100% 100%;
                background-repeat: no-repeat;

            }

        </style>

        <script type="text/javascript">
            var cart = JSON.parse(localStorage.getItem('data'));
            /*Get string from URL*/
            var learner_name = cart[0];//learner_info.split('&')[0];  
            var cert_instructors = cart[2];//learner_info.split('&')[1];
            var cert_name = cart[1];
            var cert_date = cart[5];// window.location.href.split('?print=')[1]; 
            //style="border-radius: 25px; border: 2px solid #000000; padding: 20px; width: 730px; height: 480px;  "
            //                /*Split string into variables*/ 
            var cert_code = cart[3];
            var cert_duration = cart[4];
   
            document.write('<br><center><div id="position" class="imgback">');
            // document.write('<div id="bigText" style="margin-top:2%"></div>');
            //      document.write('<div id="bigText" style="font-weight: bold">CERTIFICATE</div>');
            //    document.write('<div id="smallText">Apply This certifies that </div>');
            document.write('<div id="bigText"></div>');
            document.write('<div id="bigText" style="margin-top:19%"></div>');

            document.write('<div id="bigText">' + unescape(learner_name) + '</div>');
            //   document.write('<div id="smallText">has successfully completed aComperensive Certificate In </div>');
            document.write('<div id="bigText" style="margin-top:3%"></div>');

            document.write('<div id="bigText">' + unescape(cert_name) + '</div>');
            // //    document.write('<div id="smallText">Instructors</div>');
            // document.write('<div id="bigText" style="margin-top:15%"></div>');
            document.write('<div id="bigText" style="margin-top:10%"></div>');
            document.write('<div id="middleText">' + unescape(cert_instructors) + '</div> ');
            // document.write('<div style="position:relative;float:right;">');
            // document.write('<div class="title" >');
            document.write('<div id="bigText" style="margin-top:5%"></div>');

            document.write('<div id="smallText">' + "<div  class='title' style='margin-left:14%'>NO:" + unescape(cert_code) + "</div><div  class='title' style='margin-left:5%'>" + unescape(cert_duration) + "</div><div  class='title' style='margin-left:9%'>" + unescape(cert_date) + '</div></div> ');
            //   + "NO:" + unescape(cert_code) + unescape(cert_duration) + unescape(cert_date) +
            document.write('<div id="bigText" style="margin-top:5%"></div>');
            document.write('</div></center><br>');

            /*Send print request to browserstyle="text-decoration: underline;text-decoration: overline;" if possible*/
            window.onload = function () {
                window.print();
            }
            arr = [];
        </script>
    </body>

</html>