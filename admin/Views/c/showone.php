
<?php
if (isset($_GET['cor_id']) && intval($_GET['cor_id'])) {
    $values = CourseModel::getAllDatabyid($_GET['cor_id']);
    if (!empty($values)) {
        $val = $values[0];
        ?>


        <section id="feature">
            <div class="container">
                <div class="center wow fadeInDown">
                    <h2>تعديل الكــورس </h2>
                </div>
                <div style="margin-left:5%">
                    <div class="row">
                        <br>
                        <br>
                        <div class="pull-left" style="margin-top: -3%" id="image"> 
                            <input type="hidden" id="current_img" value="<?= $val['cor_image'] ?>">
                            <img   src="<?= HostName . DS . 'img' . DS . $val['cor_image'] ?>" style="width: 100px;height: 100px"></div>
                        <div class="input-group">
                            <span class="input-group-addon">الصوره الحاليه </span>
                            <form action="?rt=AdminCourse/uploadimage" method="POST" onchange="return image(this);" >
                                <input type="file" name="cor_image" id="cor_image"  class="form-control" style="direction: rtl;"></form>
                            <span class="input-group-addon">صوره الكورس</span>
                        </div>
                        <br> 
                        <br>

                        <form method="post" action="?rt=AdminCourse/edit" enctype="multipart/form-data" id="myFormedit"  onsubmit="return submitform(this)">
                            <input type="hidden" id="cor_id"  name="cor_id" value="<?= $val['cor_id'] ?>">

                            <div class="input-group" >
                                <?php $data = CategoryModel::get_all_data_from_end('cat_id'); ?>
                                <select class="input form-control" name="cat_id" id="cat_id" style="direction: rtl">
                                    <?php
                                    foreach ($data as $value) {
                                        if($value['cat_type']=='in'){
                                        if ($value['cat_id'] == $val['cat_id']) {
                                            ?>
                                            <option selected  value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option>
                                        <?php } else { ?>
                                            <option  value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option>

                                        <?php }
                                        }}
                                    ?>
                                </select>
                                <span class="input-group-addon">القســـم</span>
                            </div>
                            <br>


                            <div class="input-group">
                                <input type="text" name="cor_name" id="cor_name" class="input form-control" value="<?= $val['cor_name'] ?>" placeholder="أدخل اسم الكورس..." style="direction: rtl">
                                <span class="input-group-addon">اسم الكورس</span>
                            </div>
                            <span class="cor_name help-block" id="name" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                            <br>
                            <div class="input-group">
                                <input type="number" name="cor_cost" id="cor_cost" value="<?= $val['cor_cost'] ?>" class="input form-control" placeholder="ادخل تكلفه الكورس" style="direction: rtl">  
                                <span class="input-group-addon">التكلفه</span>
                            </div>
                            <span class="cor_cost help-block" id="cost" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                            <br>
                            <div class="input-group">
                                <input type="date" name="cor_start_date" id="cor_start_date" value="<?= $val['cor_start_date'] ?>" class="input form-control" placeholder="" style="direction: rtl">
                                <span class="input-group-addon">تاريخ البدايه</span>
                            </div>
                            <span class="cor_start_date help-block" id="date" style="text-align: center;display: none;color:#c52d2f">validate...</span>

                            <br>
                            <div class="input-group">
                                <input type="time" name="cor_time" id="cor_time" class="input form-control" value="<?= $val['cor_time'] ?>" placeholder="" style="direction: rtl">    
                                <span class="input-group-addon">معاد الكورس</span>
                            </div>
                            <span class="cor_time help-block" id="time" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                            <br>

                            <div class="input-group">
                            <?php $n = Cor_contentModel::getAllDatabyid($val['cor_id']); ?>
                                <input type="number" class="input form-control" name="cor_num_title" onchange="return editshow()"  value="<?= count($n) ?>" id="numRepeat" style="direction: rtl">    
                                <span class="input-group-addon">أدخل عدد العناوين الرئيسيه للكورس</span>
                            </div>
                            <span class="numRepeat help-block" id="num" style="text-align: center;display: none;color:#c52d2f">validate...</span>

                        </form>
                        <br>
                        <div class="input-group">
                            <div class="form-control" style="direction: rtl">
                                <?php
                                $pos = strpos($val['cor_days'], ",");
                                if (!empty($pos)) {
                                    $alldays = explode(',', $val['cor_days']);
                                } else {
                                    $alldays[0] = $val['cor_days'];
                                }
                                //$i=array();
                                $i = ['السبت1', 'الاحد2', "الاثنين3", "الثلاثاء4", "الاربعاء5", "الخميس6", "الجمعه7"];
                                array_push($alldays, 0, 0, 0, 0, 0, 0, 0);
                                $h = 0;
                                foreach ($i as $day) {
                                    $d = substr($day, -1, 1); //1
                                    if (is_numeric($alldays[$h])) {
                                        $all = $alldays[$h];
                                    } else {
                                        $all = substr($alldays[$h], -1, 1); //1
                                    }
                                    $da = substr($day, 0, -1); //السبت
                                    if ($d == $all) {
                                        ++$h;
                                        ?>
                                        <input type="checkbox" name="checkbox[]" id="checkbox<?= $d ?>"  checked value="<?= $da . $d ?>"><?= $da ?>
                                    <?php } else { ?>
                                        <input type="checkbox" name="checkbox[]" id="checkbox<?= $d ?>"  value="<?= $da . $d ?>"><?= $da ?>
                                    <?php
                                    }
                                }
                                ?>
                            </div>
                            <span class="input-group-addon">ايام الكورس:</span>
                        </div>

                        <br>
                            <?php $insts = Cor_instModel::get_inst_by_cor_id($val['cor_id']); ?>
                        <div class="input-group">
                                        <?php $data = InstractorModel::get_all_data_from_end('inst_id'); ?>
                            <select class="form-control"  style="direction: rtl" id="inst_select" 
                                    onmouseout="a()" name="cor_inst[]" multiple="multiple" tabindex="1">
                                        <?php
                                        $inst = " ";
                                        $c = count($insts) - 1;
                                        foreach ($data as $value) {
                                            if ($c >= 0 && $value['inst_id'] == $insts[$c]['inst_id']) {
                                                $inst.=$insts[$c]['inst_name'] . ",";
                                                ?>
                                        <option  value="<?= $value['inst_id'] ?>" selected><?= $value['inst_name'] ?></option>
                                        <?php $c--;
                                    } else {
                                        ?>
                                        <option  value="<?= $value['inst_id'] ?>"><?= $value['inst_name'] ?></option>
                                        <?php
                                    }
                                    // if($c == 0){ break;}
                                }
                                ?>
                            </select>
                            <span class="input-group-addon">اختر مدربيني اخرين </span>
        <?php $inst = substr($inst, 0, -1); ?>
                            <input type="text"  id="cor_inst" value="<?= $inst ?>" class="input form-control" placeholder="اسم المدرب" style="direction: rtl">    
                            <span class="input-group-addon">المدربين الحالين</span>

                        </div>
                        <span class="cor_inst help-block" id="inst" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                        <br>
                        <div id="yes" style="text-align: center"></div>
                        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="validateedit();">
                            تعديل
                        </button>

                    </div>
                </div> 
            </div><!--/.container-->
        </section><!--/#feature-->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript">
                            var k = $("#numRepeat").val();
                            var id = $("#cor_id").val();

                            function editshow() {
                                var n = ($("#numRepeat").val());
                                $.post("?rt=AdminCourse/get_title", {num1: n, cor_id: id}, function (e) {
                                    $("#e").html(e);
                                    window.location.href = "?rt=AdminCourse/showone&cor_id=" + id + "#editshow";
                                });

                                return false;
                            }

                            var cor_name = $("#cor_name").val();
                            var cor_cost = $("#cor_cost").val();
                            var cor_start_date = $("#cor_start_date").val();
                            var cor_time = $("#cor_time").val();

                            function a() {
                                $("#cor_inst").val($("#inst_select option:selected").text());
                            }



                            $(".input").bind('blur', function (event) {
                                var $this = $(this);
                                if ($this.val() == '') {
                                    $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                                    $('.' + $this.attr('id') + '').show();
                                } else if ($this.attr('id') == "cor_cost" && $this.val() <= 0) {
                                    $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>ادخل المبلغ بصوره صحيحه...</h4>");
                                    $('.' + $this.attr('id') + '').show();
                                } else if ($this.attr('id') == "cor_start_date" && (new Date().getTime() > new Date($this.val()).getTime())) {
                                    $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا التاريخ انتهي ...</h4>");
                                    $('.' + $this.attr('id') + '').show();
                                } else {
                                    $('.' + $this.attr('id') + '').hide();
                                }
                            });

                            function validateedit() {
                                $("input").each(function () {
                                    var $this = $(this);
                                    if ($this.val() == "") {
                                        $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                                        $('.' + $this.attr('id') + '').show();
                                    } else if ($this.attr('id') == "cor_cost" && $this.val() <= 0) {
                                        $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>ادخل المبلغ بصوره صحيحه...</h4>");
                                        $('.' + $this.attr('id') + '').show();
                                    } else if ($this.attr('id') == "cor_start_date" && (new Date().getTime() > new Date($this.val()).getTime())) {
                                        $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا التاريخ انتهي ...</h4>");
                                        $('.' + $this.attr('id') + '').show();
                                    } else {
                                        $('.' + $this.attr('id') + '').hide();
                                    }
                                });
                                var hidden = ($("#name").is(":hidden") && $("#cost").is(":hidden") && $("#inst").is(":hidden") &&
                                        $("#date").is(":hidden") && $("#time").is(":hidden") && $("#num").is(":hidden"));
                                if (hidden) {
                                    $("#myFormedit").submit();
                                    return false;
                                }
                            }

                            function image(oFormElement) {
                                $.ajax({
                                    url: "?rt=AdminCourse/uploadimage",
                                    type: "POST",
                                    data: new FormData(oFormElement),
                                    contentType: false,
                                    cache: false,
                                    processData: false,
                                    success: function (data) {
                                        //  alert(data);
                                        $("#image").html(data);
                                    },
                                    error: function () {
                                    }
                                });
                            }


                            function submitform(oFormElement)
                            {
                                //get days
                                var day = " ";
                                for (var i = 1; i <= 7; i++) {
                                    if ($("#checkbox" + i).prop('checked')) {
                                        day += $("#checkbox" + i).val() + ",";
                                    }
                                }
                                //get instructors
                                var inst = " ";
                                $('#inst_select :selected').each(function (i, selected) {
                                    inst += $(selected).val() + ",";
                                });
                                var img = $("#current_img").val();
                                var cat_id = $("#cat_id").val();

                                var values = {};
                                $.each($('#myFormedit').serializeArray(), function (i, field) {
                                    values[field.name] = field.value;
                                });

                                $.post("?rt=AdminCourse/edit", {cat_id: cat_id, days: day, inst: inst, cor_image: img, cor_time: values.cor_time, cor_name: values.cor_name, cor_cost: values.cor_cost, cor_start_date: values.cor_start_date, cor_num_title: values.cor_num_title, cor_id: values.cor_id}, function (result) {
                                    var lastChar = result.substr(result.length - 1);
                                    if (lastChar == 1) {
                                        $("#yes").html("<h4 style='color:green'>تم التعديل بنجاح ...</h4>");
                                        $("#yes").show();
                                    } else {
                                        $("#yes").html("<h4 style='color:#c52d2f'>لم يتم التعديل بنجاح ...</h4>");
                                        $("#yes").show();
                                    }
                                    setTimeout(function () {
                                        $('#yes').fadeOut('fast');
                                    }, 3000);
                                });
                                return false;
                            }

        </script>

    <?php } else { ?>
        <br>
        <center>
            <div class="box-body">
                <div class="alert alert-danger h4" role="alert"><strong>خطا!</strong>..لا يوجد كورس بهذا الرقم..!! ?></div>
            </div> 
        </center>
        <br>
        <div style="margin-bottom: 33%"></div>
    <?php
    }
} else {
    ?>
    <br>
    <center>
        <div class="box-body">
            <div class="alert alert-danger h4" role="alert"><strong>خطا!</strong>..لا يوجد كورس بهذا الرقم..!! ?></div>
        </div> 
    </center>
    <br>
    <div style="margin-bottom: 33%"></div>
<?php } ?> 

<div id="editshow" class="modalDialog">
    <div>
        <a href="#closetitle" title="closetitle" class="closee">X</a>
        <br>

        <div id="e"></div>

        <br>
    </div>
</div> 
