<?php
$data = InstractorModel::get_inst_by_id($_GET['id']);
if (!empty($data)) {
    $inst = $data[0];
} else {
    die();
}
?>
<section id="feature">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>إضافه مدرب</h2>
            <div class="box-body" id="d1">
            </div> 
        </div>
        <div style="margin-left:5%">

            <div class="row">
                <form method="POST"  action="?rt=AdminInst/edit"  id="form_edit" enctype="multipart/form-data" onsubmit="return form_edit(this);" >
                    <div class="input-group">
                        <input type="hidden" name="inst_id" id="inst_id" value="<?= $inst['inst_id'] ?>" />
                        <input type="text"  name="inst_name" value="<?= $inst['inst_name'] ?>" id="inst_name" class="input form-control" placeholder="أدخل اسم المدرب..." style="direction: rtl">
                        <span class="input-group-addon">اسم  المدرب</span>
                    </div>
                    <span class="inst_name help-block" id="ename" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>
                    <br>
                    <div class="pull-left" style="margin-top: -3%" id="image"> 
                        <img   src="<?= HostName . DS . 'img' . DS . $inst['inst_image'] ?>" style="width: 100px;height: 100px"></div>
                    <div class="input-group">
                        <span class="input-group-addon">الصوره الحاليه </span>
                        <input type="file" name="inst_image" id="inst_image" class="input form-control"  style="direction: rtl">
                        <span class="input-group-addon">صوره المدرب</span>
                    </div>
                    <br>
                    <br>
                    <div class="input-group">
                        <input type="text"  name="inst_job" id="inst_job" value="<?= $inst['inst_job'] ?>" class="input form-control" placeholder="أدخل وظيفه المدرب ..." style="direction: rtl">
                        <span class="input-group-addon">  وظيفته</span>
                    </div>
                    <span class="inst_job help-block" id="ejob" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div class="input-group">
                        <input type="text"  name="inst_skill" id="inst_skill" value="<?= $inst['inst_skill'] ?>" class="input form-control" placeholder="أدخل  مهارات المدرب..." style="direction: rtl">
                        <span class="input-group-addon">  مهاراته</span>
                    </div>
                    <span class="inst_skill help-block" id="eskill" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div class="input-group">
                        <input type="text"  name="inst_address" id="inst_address" value="<?= $inst['inst_address'] ?>" class="input form-control" placeholder="أدخل  عنوان المدرب..." style="direction: rtl">
                        <span class="input-group-addon">  عنوانه</span>
                    </div>
                    <span class="inst_address help-block" id="eaddress" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>



                    <div class="input-group">
                        <input type="tel" name="inst_mobile" id="inst_mobile" value="<?= $inst['inst_mobile'] ?>" class="input form-control" placeholder="ادخل رقم الموبايل..." style="direction: rtl">
                        <span class="input-group-addon">الموبايل:</span>
                    </div>
                    <span class="inst_mobile help-block" id="emobile" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div class="input-group">
                        <input type="url" name="inst_facebook" id="inst_facebook" value="<?= $inst['inst_facebook'] ?>" class=" form-control" placeholder="أدخل صفحته علي الفيس" style="direction: rtl">
                        <span class="input-group-addon">facebook</span>
                    </div>
                    <br>

                    <div class="input-group">
                        <input type="url" name="inst_twitter" id="inst_twitter" value="<?= $inst['inst_twitter'] ?>" class=" form-control" placeholder="أدخل صفحته علي تويتر" style="direction: rtl">
                        <span class="input-group-addon">twitter</span>
                    </div>
                    <br>

                    <div class="input-group">
                        <input type="url" name="inst_google" id="inst_google" value="<?= $inst['inst_google'] ?>" class=" form-control" placeholder="أدخل صفحته علي جوجل" style="direction: rtl">
                        <span class="input-group-addon">google</span>
                    </div>
                    <br>

                    <div class="input-group">
                        <input type="text" name="inst_details" id="inst_details" value="<?= $inst['inst_details'] ?>" class=" form-control" placeholder="أدخل معلومات اخري" style="direction: rtl">
                        <span class="input-group-addon">معلومات اخري</span>
                    </div>
                    <br>
                    <div id="result"></div>
                    <button class="input btn btn-lg btn-primary btn-block"  type="button" onclick="validate();" 
                            >أضــــف</button>
                </form>
            </div>
        </div> 
    </div><!--/.container-->
</section><!--/#feature-->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript">
                        var inst_name = $("#inst_name").val();

                        $(".input").bind('blur', function (event) {
                            var $this = $(this);
                            if ($this.val() == '') {
                                $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                                $('.' + $this.attr('id') + '').show();
                            } else if ($this.attr('id') == 'inst_mobile') {
                                var num = $('#inst_mobile').val().length;
                                if (!$.isNumeric($this.val())) {
                                    $('.inst_mobile').html("<h4 style='color:#c52d2f'>ادخل الموبايل بصوره صحيحه </h4>");
                                    $('.inst_mobile').show();
                                } else if ($.isNumeric($this.val()) && num != 11) {
                                    $('.inst_mobile').html("<h4 style='color:#c52d2f'> الرقم غير صحيح .. </h4>");
                                    $('.inst_mobile').show();
                                } else if ($this.val() !== "") {
                                    var mobile = $('#inst_mobile').val();
                                    var id = $('#inst_id').val();
                                    $.post("?rt=AdminInst/check_mobile", {inst_mobile: mobile}, function (result) {
                                        if (result != 'yes' && result != id) {
                                            $('.inst_mobile').html("<h4 style='color:#c52d2f'>هذا الموبايل بالفعل موجود </h4>");
                                            $('.inst_mobile').show();
                                        } else {
                                            $('.inst_mobile').hide();

                                        }
                                    });
                                } else {
                                    $('.inst_mobile').hide();
                                }
                            }
                            else {
                                $('.' + $this.attr('id') + '').hide();
                            }
                        });

                        function validate() {
                            $("input").each(function () {
                                var $this = $(this);
                                if ($this.val() == "") {
                                    $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                                    $('.' + $this.attr('id') + '').show();
                                } else if ($this.attr('id') == 'inst_mobile') {
                                    var num = $('#inst_mobile').val().length;
                                    if (!$.isNumeric($this.val())) {
                                        $('.inst_mobile').html("<h4 style='color:#c52d2f'>ادخل الموبايل بصوره صحيحه </h4>");
                                        $('.inst_mobile').show();
                                    } else if ($.isNumeric($this.val()) && num != 11) {
                                        $('.inst_mobile').html("<h4 style='color:#c52d2f'> الرقم غير صحيح .. </h4>");
                                        $('.inst_mobile').show();
                                    } else if ($this.val() !== "") {
                                        var mobile = $('#inst_mobile').val();
                                        var id = $('#inst_id').val();
                                        $.post("?rt=AdminInst/check_mobile", {inst_mobile: mobile}, function (result) {
                                            if (result != 'yes' && result != id) {
                                                $('.inst_mobile').html("<h4 style='color:#c52d2f'>هذا الموبايل بالفعل موجود </h4>");
                                                $('.inst_mobile').show();
                                            } else {
                                                $('.inst_mobile').hide();

                                            }
                                        });
                                    } else {
                                        $('.inst_mobile').hide();
                                    }
                                }
                                else {
                                    $('.' + $this.attr('id') + '').hide();
                                }
                            });
                            var hidden = ($("#ename").is(":hidden") && $("#eaddress").is(":hidden") && $("#emobile").is(":hidden") &&
                                    $("#eskill").is(":hidden") && $("#ejob").is(":hidden"));
                            if (hidden) {
                                $("#form_edit").submit();
                                return false;
                            }
                        }


                        function form_edit(form_editElement)
                        {
                            var xhr = new XMLHttpRequest();
                            xhr.open(form_editElement.method, form_editElement.action, true);
                            xhr.send(new FormData(form_editElement));
                            $("#result").html("<center><h4 style='color:green'>تم التعديل بنجاح...</h4></center>");
                            $('#result').show();
                            setTimeout(function () {
                                $("#result").fadeOut('fast');
                            }, 5000);
                            return false;
                        }
                       
</script>

