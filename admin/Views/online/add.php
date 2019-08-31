<section  class="contents">
    <div class="page">                    
        <div class="row">
            <form method="POST" action="?rt=Adminonline/add" id="Formadd" enctype="multipart/form-data"
                  onsubmit="return submitForm(this);">
                <div id="result"></div>
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
                    <input type="text"  name="online_name" id="online_name" class="input form-control" placeholder="أدخل اسم الكورس..." style="direction: rtl">
                    <span class="input-group-addon">اسم الكورس</span>
                </div>
                <span class="online_name help-block" id="name" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                <br>

                <div class="input-group">
                    <input type="file"  name="online_image" id="online_image" class=" form-control"  style="direction: rtl">
                    <span class="input-group-addon">صوره الكورس</span>
                </div>
                <br>

                <div class="input-group">
                    <input type="num"  name="online_cost" id="online_cost" class="input form-control" placeholder="أدخل  تكلفه الكورس..." style="direction: rtl">
                    <span class="input-group-addon">تكلفه الكورس</span>
                </div>
                <span class="online_cost help-block" id="cost" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                <br>

                <button class="input btn btn-lg btn-primary btn-block"  type="button"
                        onclick="validateadd();">أضــــف</button>
            </form>

            <script type="text/javascript">
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

                function validateadd() {
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
                        $("#Formadd").submit();
                        return false;
                    }
                }

                function submitForm(oFormElement)
                {
                    var xhr = new XMLHttpRequest();
                    xhr.open(oFormElement.method, oFormElement.action, true);
                    xhr.send(new FormData(oFormElement));
                    oFormElement.reset();
                    $("#result").html("<h4 style='color:green; text-align:center;font-weight:bold'> تم الاضافه بنجاح</h4>");
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