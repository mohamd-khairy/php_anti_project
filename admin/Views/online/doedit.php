<?php
if (isset($_GET['id']) && intval($_GET['id'])) {

    $row = OnlineModel::getAllDatabyid($_GET['id']);
    $row = $row[0];
} else {
    die();
}
?>
<section  class="contents">
    <div class="page">                    
        <div class="row">
            <div id="result"></div>

            <form method="POST" action="?rt=Adminonline/doedit" id="Formedit" enctype="multipart/form-data"
                  onsubmit="return submitFormedit(this);">
                <input type="hidden" name="online_id" id="online_id" value="<?= $_GET['id'] ?>" >
                <br>
                <div class="input-group" >
                    <?php
                    $data = CategoryModel::get_all_data_from_end('cat_id');
                    $found = 0;
                    ?>
                    <select class="input form-control" name="cat_id" id="cat_id" style="direction: rtl">
                        <?php
                        foreach ($data as $value) {
                            if ($value['cat_type'] == 'out') {
                                $found = 1;
                                if ($row['cat_id'] == $value['cat_id']) {
                                    ?>
                                    <option  selected value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option>
                                <?php } else {
                                    ?>
                                    <option  value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option>
                                    <?php
                                }
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
                <span class="cat_id help-block"   id="cat" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                <br>

                <div class="input-group">
                    <input type="text" name="online_name"  value="<?= $row['online_name'] ?>"   id="online_name" class="input form-control" placeholder="أدخل اسم الكورس..." style="direction: rtl">
                    <span class="input-group-addon">اسم الكورس</span>
                </div>
                <span class="online_name help-block" id="name" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                <br>
                <br>
                <div class="pull-left" style="margin-top: -3%" id="image"> 
                    <img   src="<?= HostName . DS . 'img' . DS . $row['online_image'] ?>" style="width: 100px;height: 100px"></div>
                <div class="input-group">
                    <span class="input-group-addon">الصوره الحاليه </span>
                    <input type="file"  name="online_image" id="online_image" class=" form-control"  style="direction: rtl">
                    <span class="input-group-addon">صوره الكورس</span>
                </div>
                <br>
                <br>

                <div class="input-group">
                    <?php $n = Online_corModel::getCount(); ?>
                    <input type="number" class="input form-control" id="numRepeat" name="cor_num_title" onchange="return editshow()"  value="<?= $n['count'] ?>"  style="direction: rtl">    
                    <span class="input-group-addon">أدخل عدد فيديوهات  الكورس</span>
                </div>
                <span class="numRepeat help-block" id="num" style="text-align: center;display: none;color:#c52d2f">validate...</span>

                <br>


                <div class="input-group">
                    <input type="num"  name="online_cost" value="<?= $row['online_cost'] ?>"   id="online_cost" class="input form-control" placeholder="أدخل  تكلفه الكورس..." style="direction: rtl">
                    <span class="input-group-addon">تكلفه الكورس</span>
                </div>
                <span class="online_cost help-block" id="cost" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                <br>



                <button class="input btn btn-lg btn-primary btn-block"  type="button"
                        onclick="validateedit();">تعديل</button>
            </form>

            <script type="text/javascript">
                var id = $("#online_id").val();
                function editshow() {
                    var n = ($("#numRepeat").val());
                    $.post("?rt=Adminonline/editvideo", {num1: n, online_id: id}, function (e) {
                        $("#e").html(e);
                        window.location.href = "?rt=Adminonline/doedit&id=" + id + "#editshow";
                    });
                    return false;
                }
                var m;
                function validatevideo() {
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
                        var old_id = $("#online_id").val();
                        $.post("?rt=Adminonline/delete_all_old_video", {online_id: old_id}, function (d) {
                            if (d == 'yes') {
                                $("#form").submit();
                            }
                        });
                    }
                }




                function submiteditvideo(oFormElements)
                {
                    var old_id = $("#online_id").val();

                    var values = {};
                    var arr = new Array();
                    $.each($('#form').serializeArray(), function (i, field) {
                        values[field.name] = field.value;
                        arr[arr.length] = field.name;
                        if (arr.length == 3) {
                            arr = [];
                            $.post("?rt=Adminonline/edit_viedo_finish", {online_id: values.online_id, on_details: values.on_details, on_link: values.on_link}, function (data) {
                            });
                        }
                    });
                    window.location.href = "?rt=Adminonline/doedit&id=" + old_id + "#";
                    return false;
                }


                $(".input").bind('blur', function (event) {
                    var $this = $(this);
                    if ($this.val() == '') {
                        $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                        $('.' + $this.attr('id') + '').show();
                    } else if ($this.attr('id') == "cat_id" && $this.val() == 0) {
                        $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>اضف قسم اولا ...</h4>");
                        $('.' + $this.attr('id') + '').show();
                    }
                    else {
                        $('.' + $this.attr('id') + '').hide();
                    }
                });

                function validateedit() {
                    $("input").each(function () {
                        var $this = $(this);
                        if ($this.val() == "") {
                            $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
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
                    var hidden = ($("#cat").is(":hidden") && $("#name").is(":hidden") && $("#cost").is(":hidden"));
                    if (hidden) {
                        $("#Formedit").submit();
                        return false;
                    }
                }

                function submitFormedit(oFormElement)
                {
                    var xhr = new XMLHttpRequest();
                    xhr.open(oFormElement.method, oFormElement.action, true);
                    xhr.send(new FormData(oFormElement));
                    $("#result").html("<h4 style='color:green; text-align:center;font-weight:bold'> تم التعديل  بنجاح</h4>");
                    $("#result").show();
                    setTimeout(function () {
                        $('#result').fadeOut('fast');
                    }, 3000);
                    return false;
                }


            </script>
        </div>
    </div> 
</section><!--/#feature-->
<div id="editshow" class="modalDialog">
    <div>
        <a href="#closetitle" title="closetitle" class="closee">X</a>
        <br>

        <div id="e"></div>

        <br>
    </div>
</div> 
