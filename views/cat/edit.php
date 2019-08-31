<section  class="contents">
    <div class="page">                    
        <div class="row">
            <form method="POST"  id="Formadd" enctype="multipart/form-data" onsubmit="return submitadd(this);" >                 <br>
                <br>
                <div id="e"></div>
                <br>
                <div class="input-group" >
                    <?php $data = CategoryModel::get_all_data_from_end('cat_id'); ?>
                    <select class="input form-control" name="cat_id" id="cat_id" style="direction: rtl">
                        <?php foreach ($data as $value) { ?>
                            <option  value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option>
                        <?php } ?>
                    </select>
                    <span class="input-group-addon">القســـم</span>
                </div>
                <br>
                <button class="input btn btn-lg btn-primary btn-block"  type="button" onclick="edit();" 
                        >تعديــل</button>
            </form>
        </div>
    </div> 
</section><!--/#feature-->


<div id="catedit" class="modalDialog" >
    <div style="width: 50%; margin-top: 15%">
        <a href="#close" title="close" class="closee">X</a>
        <br>
        <div id="result"></div>

        <br>
        <button class="input btn btn-lg btn-primary btn-block"  type="button" onclick="doedit();" 
                >تعديــل</button>
    </div>
</div> 

<script type="text/javascript">
    function edit() {
        var cat_id = $("#cat_id").val();
        var url = "?rt=Category/edit";
        $.post(url, {cat_id: cat_id}, function (data) {
            if (data[0] != 0) {
                $("#result").html(data);
                $("#result").show();
                window.location.href = "?rt=Category/edit#catedit";
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
