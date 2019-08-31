<section id="feature">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>إضافه مدرب</h2>
            <div class="box-body" id="d1">
            </div> 
        </div>
        <div style="margin-left:5%">

            <div class="row">
                <form method="POST"  action="?rt=AdminInst/add"    id="form_inst" enctype="multipart/form-data" onsubmit="return form_inst(this);" >
                    <div class="input-group">
                        <input type="text"  name="inst_name" id="inst_name" class="input form-control" placeholder="أدخل اسم المدرب..." style="direction: rtl">
                        <span class="input-group-addon">اسم  المدرب</span>
                    </div>
                    <span class="inst_name help-block" id="name" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div class="input-group">
                        <input type="file" name="inst_image" id="inst_image" class="input form-control"  style="direction: rtl">
                        <span class="input-group-addon">صوره المدرب</span>
                    </div>
                    <br>

                    <div class="input-group">
                        <input type="text"  name="inst_job" id="inst_job" class="input form-control" placeholder="أدخل وظيفه المدرب ..." style="direction: rtl">
                        <span class="input-group-addon">  وظيفته</span>
                    </div>
                    <span class="inst_job help-block" id="job" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div class="input-group">
                        <input type="text"  name="inst_skill" id="inst_skill" class="input form-control" placeholder="أدخل  مهارات المدرب..." style="direction: rtl">
                        <span class="input-group-addon">  مهاراته</span>
                    </div>
                    <span class="inst_skill help-block" id="skill" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div class="input-group">
                        <input type="text"  name="inst_address" id="inst_address" class="input form-control" placeholder="أدخل  عنوان المدرب..." style="direction: rtl">
                        <span class="input-group-addon">  عنوانه</span>
                    </div>
                    <span class="inst_address help-block" id="address" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div class="input-group">
                        <div class="form-control" >
                            <div class="pull-right" ><input type="radio" name="inst_gender"  value="female" checked>انثي  </div>   
                            <div class="pull-right" ><input type="radio"  name="inst_gender"  value="male">ذكر</div>
                        </div>
                        <span class="input-group-addon">النوع:</span>
                    </div>
                    <br>

                    <div class="input-group">
                        <input type="tel" name="inst_mobile" id="inst_mobile" class="input form-control" placeholder="ادخل رقم الموبايل..." style="direction: rtl">
                        <span class="input-group-addon">الموبايل:</span>
                    </div>
                    <span class="inst_mobile help-block" id="mobile" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div class="input-group">
                        <input type="url" name="inst_facebook" id="inst_facebook" class=" form-control" placeholder="أدخل صفحته علي الفيس" style="direction: rtl">
                        <span class="input-group-addon">facebook</span>
                    </div>
                    <br>

                    <div class="input-group">
                        <input type="url" name="inst_twitter" id="inst_twitter" class=" form-control" placeholder="أدخل صفحته علي تويتر" style="direction: rtl">
                        <span class="input-group-addon">twitter</span>
                    </div>
                    <br>

                    <div class="input-group">
                        <input type="url" name="inst_google" id="inst_google" class=" form-control" placeholder="أدخل صفحته علي جوجل" style="direction: rtl">
                        <span class="input-group-addon">google</span>
                    </div>
                    <br>

                    <div class="input-group">
                        <input type="text" name="inst_details" id="inst_details" class=" form-control" placeholder="أدخل معلومات اخري" style="direction: rtl">
                        <span class="input-group-addon">معلومات اخري</span>
                    </div>
                    <br>

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
                                    $.post("?rt=AdminInst/check_mobile", {inst_mobile: mobile}, function (result) {
                                         if (result == "yes") {
                                                $('.inst_mobile').hide();
                                            } else {
                                                $('.inst_mobile').html("<h4 style='color:#c52d2f'>هذا الموبايل بالفعل موجود </h4>");
                                                $('.inst_mobile').show();
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
                                        $.post("?rt=AdminInst/check_mobile", {inst_mobile: mobile}, function (result) {
                                            if (result == "yes") {
                                                $('.inst_mobile').hide();
                                            } else {
                                                $('.inst_mobile').html("<h4 style='color:#c52d2f'>هذا الموبايل بالفعل موجود </h4>");
                                                $('.inst_mobile').show();
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
                            var hidden = ($("#name").is(":hidden") && $("#address").is(":hidden") && $("#mobile").is(":hidden") &&
                                    $("#skill").is(":hidden") && $("#job").is(":hidden"));
                            if (hidden) {
                                $("#form_inst").submit();
                                return false;
                            }
                        }


                        function form_inst(oFormElement)
                        {
                            var xhr = new XMLHttpRequest();
                            xhr.open(oFormElement.method, oFormElement.action, true);
                            xhr.send(new FormData(oFormElement));
                            oFormElement.reset();
                            return false;
                        }

</script>



