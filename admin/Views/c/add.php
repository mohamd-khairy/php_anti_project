

<style type="text/css">
    .title {
        clear: both;
        display: inline-block;
        overflow: hidden;
        white-space: nowrap;
        padding: 10px;
    }

</style> 

<section id="feature">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>إضافه كــورس جديد</h2>
            <div class="box-body" id="d1">
            </div> 
        </div>
        <div style="margin-left:5%">

            <div class="row">
                <form method="POST"  id="myForm" enctype="multipart/form-data" onsubmit="return submitForm(this);" >
                    <br>
                    <div class="input-group" >
                        <?php
                        $data = CategoryModel::get_all_data_from_end('cat_id');
                        $found = 0;
                        ?>
                        <select class="input form-control" name="cat_id" id="cat_id" style="direction: rtl">
                            <?php
                            foreach ($data as $value) {
                                if ($value['cat_type'] == 'in') {
                                    $found = 1;
                                    ?>
                                    <option  value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option>
                                    <?php
                                }
                            }
                            if ($found == 0) {
                                ?>
                                <option  value="0">لا يوجد اقسام</option>

                            <?php }
                            ?>
                        </select>
                        <span class="input-group-addon">القســـم</span>
                    </div>
                    <span class="cat_id help-block" id="cat" style="text-align: center;display: none;color:#c52d2f">validate...</span>

                    <br>
                    <div class="input-group">
                        <input type="text"  name="cor_name" id="cor_name" class="input form-control" placeholder="أدخل اسم الكورس..." style="direction: rtl">
                        <span class="input-group-addon">اسم الكورس</span>
                    </div>
                    <span class="cor_name help-block" id="name" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>
                    <div class="input-group">
                        <input type="file" name="cor_image" id="cor_image" class="input form-control"  style="direction: rtl">
                        <span class="input-group-addon">صوره الكورس</span>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="number" name="cor_cost" id="cor_cost" class="input form-control" placeholder="ادخل تكلفه الكورس" style="direction: rtl">  
                        <span class="input-group-addon">التكلفه</span>
                    </div>
                    <span class="cor_cost help-block" id="cost" style="text-align: center;display: none;color:#c52d2f">validate..</span>
                    <br>

                    <div class="input-group">
                        <input type="date" name="cor_start_date" id="cor_start_date" class="input form-control" placeholder="" style="direction: rtl">
                        <span class="input-group-addon">تاريخ البدايه</span>
                    </div>
                    <span class="cor_start_date help-block" id="date" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div class="input-group">
                        <input type="time" name="cor_time" id="cor_time" class="input form-control" placeholder="" style="direction: rtl">    
                        <span class="input-group-addon">معاد الكورس</span>
                    </div>
                    <span class="cor_time help-block" id="time" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>
                    <div class="input-group">
                        <div class="input form-control" style="direction: rtl">
                            <input type="checkbox" name="checkbox[]" id="checkbox1" checked value="السبت1">السبت
                            <input type="checkbox" name="checkbox[]" id="checkbox2"  value="الاحد2">الاحد
                            <input type="checkbox" name="checkbox[]" id="checkbox3"  value="الاثنين3">الاثنين
                            <input type="checkbox" name="checkbox[]" id="checkbox4"  value="الثلاثاء4">الثلاثاء
                            <input type="checkbox" name="checkbox[]" id="checkbox5"  value="الاربعاء5">الاربعاء
                            <input type="checkbox" name="checkbox[]" id="checkbox6"  value="الخميس6">الخميس
                            <input type="checkbox" name="checkbox[]" id="checkbox7"  value="الجمعه7">الجمعه
                        </div>
                        <span class="input-group-addon">ايام الكورس:</span>
                    </div>

                    <br>
                    <div class="input-group" >
                        <?php $data = InstractorModel::get_all_data_from_end('inst_id'); ?>
                        <select class="input form-control" name="inst_id[]" style="direction: rtl">
                            <?php foreach ($data as $value) { ?>
                                <option  value="<?= $value['inst_id'] ?>"><?= $value['inst_name'] ?></option>
                            <?php } ?>
                        </select>
                        <span class="input-group-addon">المدرب</span>
                    </div>
                    <span class="cor_inst help-block" id="inst" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>


                    <div class="input-group">
                        <input type="number" name="cor_num_title" id="cor_num_title"  class="input form-control" placeholder="عدد العناوين" style="direction: rtl">    
                        <span class="input-group-addon">ادخل عدد العناوين الرئيسيه</span>
                    </div>
                    <span class="cor_num_title help-block" id="num" style="text-align: center;display: none;color:#c52d2f">validate...</span>
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

                        var cor_name;
                        var val_num =document.getElementById("cor_num_title").value;
                        var cor_cost = $("#cor_cost").val();
                        var cor_start_date = $("#cor_start_date").val();
                        var cor_time = $("#cor_time").val();
                        var cor_inst = $("#cor_inst").val();
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
                            } else if ($this.attr('id') == "cat_id" && $this.val() == 0) {
                                $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>اضف قسم اولا ...</h4>");
                                $('.' + $this.attr('id') + '').show();
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
                                } else if ($this.attr('id') == "cor_cost" && $this.val() <= 0) {
                                    $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>ادخل المبلغ بصوره صحيحه...</h4>");
                                    $('.' + $this.attr('id') + '').show();
                                } else if ($this.attr('id') == "cor_start_date" && (new Date().getTime() > new Date($this.val()).getTime())) {
                                    $('.' + $this.attr('id') + '').html("< h4 style='color:#c52d2f'>هذ ا التاريخ انتهي ...</h4>");
                                    $('.' + $this.attr('id') + '').show();
                                }
                                else {
                                    $('.' + $this.attr('id') + '').hide();
                                }
                            });
                            if ($('#cat_id').attr('id') == "cat_id" && $('#cat_id').val() == 0) {
                                $('.cat_id').html("<h4 style='color:#c52d2f'>اضف قسم اولا ...</h4>");
                                $('.cat_id').show();
                            }
                            var hidden = ($("#cat").is(":hidden") && $("#name").is(":hidden") && $("#cost").is(":hidden") && $("#inst").is(":hidden") &&
                                    $("#date").is(":hidden") && $("#time").is(":hidden") && $("#num").is(":hidden"));
                            if (hidden) {
                                cor_name = document.getElementById("cor_name").value;
                                val_num =document.getElementById("cor_num_title").value;
                                $("#myForm").submit();
                                return false;
                            }
                        }


                        function submitForm(oFormElement)
                        {
                            var xhr = new XMLHttpRequest();
                            xhr.open(oFormElement.method, oFormElement.action, true);
                            xhr.send(new FormData(oFormElement));
                            oFormElement.reset();
                            $.post("?rt=AdminCourse/get_last_id", {cor_name: cor_name}, function (id) {
                                $.post("?rt=AdminCourse/add_title", {num: val_num, cor_id: id}, function (result) {
                                    $("#r").html(result);
                                    window.location.href = "?rt=AdminCourse/add#titleadd";
                                });
                            });
                            return false;
                        }

</script>

<div id="titleadd" class="modalDialog">
    <div>
        <a href="#closetitle" title="closetitle" class="closee">X</a>
        <br>

        <div id="r"></div>

        <br>
    </div>
</div> 




