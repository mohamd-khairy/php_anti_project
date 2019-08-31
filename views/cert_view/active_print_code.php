<?php if (isset($msg) && $msg == -1) { ?>
    <br>
    <center>
        <div class="box-body">
            <div class="alert alert-danger h4" role="alert"><strong>خطا!</strong>..لا توجد شهاده بهذا الكود..!! ?></div>

        </div> 
    </center>
    <br>
    <div style="margin-bottom: 29.5%"></div>
<?php } else {
    if(!isset($data_cert)){
        exit();
    }
    ?>
    <input type="hidden" name="cu_name" id="cu_name" value="<?= $data_cert['user'] ?>">
    <input type="hidden" name="course_name" id="course_name" value="<?= $data_cert['cert'] ?>
           ">
    <input type="hidden" name="cert_inst" id="cert_inst" value="<?= $data_cert['inst'] ?>
           ">
    <input type="hidden" name="cert_code" id="cert_code" value="<?= $data_cert['code'] ?>
           ">
    <input type="hidden" name="cert_duration" id="cert_duration" value="<?= $data_cert['duration'] ?>
           ">
    <input type="hidden" name="cert_date" id="cert_date" value="<?= $data_cert['date'] ?>
           ">
    <center> <input type="button" onclick="print()" name="" id="" class="btn " value="print" >
    </center>
    <style type="text/css">
        #bigText{    
            overflow: hidden; 
            font-size:26px;   
            font-family: Sans-Serif; 
            margin-top: 27px;    
            text-align: center;
        }
        #middleText{    
            overflow:hidden; 
            font-size:20px;   
            font-family: Sans-Serif; 
            margin-top: 27px;    
            text-align: center;   }  
        #smallText{   
            overflow:hidden;   
            font-size:15px;    
            font-family: Sans-Serif;     
            margin-top: 27px;   
            font-weight: bold;
            text-align: center;   } 
        #position{ 
            display: inline-block; //table-cell;   
            //vertical-align: middle;
            width: 80%;
            height: 100%;
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
            background-image: url(img/cert.jpg);
            background-size: 100% 100%;
            background-repeat: no-repeat;

        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        var learner_name = $("#cu_name").val();
        var cert_name = $("#course_name").val();
        var cert_inst = $("#cert_inst").val();
        var cert_code = $("#cert_code").val();
        var cert_duration = $("#cert_duration").val();
        var cert_date = $("#cert_date").val();
        /*Rounded border   border-radius: 25px; border: 2px solid #000000; padding: 20px; width: 800px; height: 300px;*/
        document.write('<br><center><div id="position" class="imgback">');
        document.write('<div id="bigText" style="margin-top:19%"></div>');
        //      document.write('<div id="bigText" style="font-weight: bold">CERTIFICATE</div>');
        //    document.write('<div id="smallText">Apply This certifies that </div>');
        document.write('<div id="bigText">' + unescape(learner_name) + '</div>');
        //   document.write('<div id="smallText">has successfully completed aComperensive Certificate In </div>');
        document.write('<div id="bigText" style="margin-top:4%"></div>');

        document.write('<div id="bigText">' + unescape(cert_name) + '</div>');
        // //    document.write('<div id="smallText">Instructors</div>');
        // document.write('<div id="bigText" style="margin-top:15%"></div>');
        document.write('<div id="bigText" style="margin-top:12%"></div>');
        document.write('<div id="middleText">' + unescape(cert_inst) + '</div> ');
        // document.write('<div style="position:relative;float:right;">');
        // document.write('<div class="title" >');
        document.write('<div id="bigText" style="margin-top:5%"></div>');

        document.write('<div id="smallText">' + "<div  class='title' style='margin-left:14%'>NO:" + unescape(cert_code) + "</div><div  class='title' style='margin-left:8%'>" + unescape(cert_duration)  +"</div><div  class='title' style='margin-left:9%'>"+ unescape(cert_date) + '</div></div> ');
        //   + "NO:" + unescape(cert_code) + unescape(cert_duration) + unescape(cert_date) +
        document.write('<div id="bigText" style="margin-top:5%"></div>');
        document.write('</div></center><br>');

        function print() {
            var arr = new Array();
            var url = "active_print_user.php";
            arr[0] = learner_name;
            arr[1] = cert_name;
            arr[2] = cert_inst;
            arr[3] = cert_code;
            arr[4] = cert_duration;
            arr[5] = cert_date;
            window.localStorage.setItem("data", JSON.stringify(arr));
            newwindow = window.open(url, 'Anti', 'height=700,width=750');
            if (window.focus) {
                newwindow.focus()
            }
            return false;
            // window.print();
        }
    </script>
<?php } ?>
