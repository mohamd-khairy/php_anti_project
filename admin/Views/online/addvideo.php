<section  class="contents">
    <div class="page">                    
        <div class="row">
            <form method="POST"  id="Formadd" enctype="multipart/form-data" onsubmit="return submitadd(this);" >                 <br>
                <br>
                <div id="e"></div>
                <br>
                <div class="input-group" >
                    <?php $data = OnlineModel::get_all_data_from_end('online_id'); ?>
                    <select class="input form-control" name="online_id" id="online_id" style="direction: rtl">
                        <?php
                        foreach ($data as $value) {
                            $videos = Online_corModel::getAllDatabyid($value['online_id']);
                            if (empty($videos)) {
                                ?>
                                <option  value="<?= $value['online_id'] ?>"><?= $value['online_name'] ?></option>
                            <?php }
                        }
                        ?>
                    </select>
                    <span class="input-group-addon">الكورس</span>
                </div>
                <br>
                <div class="input-group">
                    <input type="num"  name="num_video" id="num_video" class="input form-control" placeholder="أدخل  عدد الفيديوهات..." style="direction: rtl">
                    <span class="input-group-addon"> عدد الفيديوهات</span>
                </div>
                <span class="num_video help-block" id="cost" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                <br>
                <button class="input btn btn-lg btn-primary btn-block"  type="button" onclick="yes();" 
                        >اضف</button>
            </form>
        </div>
    </div> 
</section><!--/#feature-->


<div id="addvideo" class="modalDialog" >
    <div style="width: 50%; margin-top: 15%">
        <a href="#close" title="close" class="closee">X</a>
        <br>
        <div id="result"></div>

        <br>

    </div>
</div> 

<script type="text/javascript">

    var m;
    function validateon() {
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
        $("#formon").find("p").each(function ()
        {
            if ($(this).is(':visible'))
            {
                m = false;
            }
        });
        if (m) {
            $("#formon").submit();
        }
    }

    function submitvideo(oFormElements)
    {
        var values = {};
        var arr = new Array();
        $.each($('#formon').serializeArray(), function (i, field) {
            values[field.name] = field.value;
            arr[arr.length] = field.name;
            if (arr.length == 3) {
                arr = [];
                $.post("?rt=Adminonline/addvideo", {online_id: values.online_id, on_name: values.on_name, on_url: values.on_url}, function (data) {
                });
            }
        });
        window.location.href = "?rt=Adminonline/addvideo#";
        return false;
    }

    function yes() {
        var online_id = $("#online_id").val();
        var num_video = $("#num_video").val();
        var url = "?rt=Adminonline/video";
        $.post(url, {online_id: online_id, num_video: num_video}, function (data) {
            if (data != 'no') {
                $("#result").html(data);
                $("#result").show();
                window.location.href = "?rt=Adminonline/addvideo#addvideo";
            } else {
                $("#e").html("<h4 style='color:#c52d2f'>شئ ما خطأ...</h4>");
                $("#e").show();
            }
        });
    }

    function doedit() {
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
        var hidden = ($("#name").is(":hidden"));
        if (hidden) {
            var cat_id = $("#cat_id").val();
            var cat_type = $("#cat_type").val();
            var cat_name = $("#cat_name").val();
            var url = "?rt=Category/doedit";
            $.post(url, {cat_id: cat_id, cat_name: cat_name, cat_type: cat_type}, function (data) {
                if (data != 0) {
                    $("#e").html("<h4 style='color:green; text-align:center;font-weight:bold'>تم تعديل القسم بنجاح</h4>");
                    $("#e").show();
                    window.location.href = "?rt=Category/edit#close";
                    return false;
                    setTimeout(function () {
                        $('#e').fadeOut('fast');
                    }, 3000);
                }
            });
        }
    }

</script>
