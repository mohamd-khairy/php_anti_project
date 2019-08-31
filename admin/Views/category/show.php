<section  class="contents">
    <div class="page">     
        <div class="center wow fadeInDown">
            <div class="input-group">
                <input type="text"  onkeypress="return searchKeyPress(event);" id="search"   class="form-control" style="background-color: #F1F1F1;direction: rtl" placeholder="أدخل اسم القســــم" >
                <span class="input-group-addon">أبـحـث</span>
            </div>
            <div id="error"></div>
        </div>

        <div class="row" >
            <div id="result_search"></div>
            <div id="cat">
                <?php
                $data = CategoryModel::get_all_data_from_end('cat_id');
                foreach ($data as $cat) {
                    if ($cat['cat_type'] == 'out') { ?>
                <div class="col-sm-3 col-md-4" >
                            <div class="media services-wrap wow fadeInDown" style="background-color: #c52d2f;width:200px;height:5px">
                                <a href="#delete"  onclick="del(<?= $cat['cat_id'] ?>)" class="closee">X</a>
                                <a href="#" onclick="mido('?rt=Adminonline/show_cor_cat_online&id=<?= $cat['cat_id'] ?>')">
                                    <p style="color:#ffffff;margin-top: -30px;"><?php
                                        if ($cat['cat_type'] == "out") {
                                            echo 'أون لاين';
                                        } else {
                                            echo 'داخل الشركه';
                                        }
                                        ?></p> 
                                    <center><h2 style="color:#000;margin-top: -12px;"><?= $cat['cat_name'] ?></h2></center>
                                </a>
                            </div>
                        </div>
                        
                <?php    } else {
                        ?>
                        <div class="col-sm-3 col-md-4" >
                            <div class="media services-wrap wow fadeInDown" style="background-color: #c52d2f;width:200px;height:5px">
                                <a href="#delete"  onclick="del(<?= $cat['cat_id'] ?>)" class="closee">X</a>
                                <a href="#" onclick="mido('?rt=Category/show_cor_cat&id=<?= $cat['cat_id'] ?>')">
                                    <p style="color:#ffffff;margin-top: -30px;"><?php
                                        if ($cat['cat_type'] == "out") {
                                            echo 'أون لاين';
                                        } else {
                                            echo 'داخل الشركه';
                                        }
                                        ?></p> 
                                    <center><h2 style="color:#000;margin-top: -12px;"><?= $cat['cat_name'] ?></h2></center>
                                </a>
                            </div>
                        </div>
                    <?php }
                }
                ?>
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</section>

<div id="delete" class="modalDialog" >
    <div style="width: 40%; margin-top: 20%">
        <a href="#close" title="close" class="closee">X</a>
        <br>
        <button class="btn btn-lg  btn-block" type="text" >
            هل تريد حذف القسـم ؟
        </button>
        <center>
            <a href="#" style="width: 45%;background-color:#53c653" class="btn btn-lg btn-primary ">لا</a>
            <a onclick="deletecat()" style="width: 45%" class="btn btn-lg btn-primary ">نعم</a>
        </center>
        <br>
    </div>
</div> 



<script>


    var arr = new Array();
    function del(i) {
        arr[arr.length] = i;
    }
    function deleteallcat() {
        $.post("?rt=Category/deleteall", function (data) {
            if (data == 1) {
                mido("?rt=Category/showall");
                return false
            }
        });
    }
    function deletecat() {
        $.post("?rt=Category/delete", {cat_id: arr[0]}, function (d) {
            if (d == 1) {
                mido("?rt=Category/showall");
                return false;
            }
            arr = [];
        });
    }
    function searchKeyPress(e) {
        e = e || window.event;
        if (e.keyCode == 13)
        {
            $.post("?rt=Category/search", {cat_name: $("#search").val()}, function (data) {

                if (data != 0) {
                    $("#result_search").html("<div style='margin-left:40%' >" + data + "</div>");
                    $('#cat').hide();
                    $('#result_search').show();
                    $("#search").keyup(function () {
                        if (!this.value) {
                            $('#result_search').hide();
                            $('#cat').show();
                        }
                    });
                } else {
                    $("#error").html("<h4 style='color:#c52d2f'>هذا القسم  غير موجود ...</h4>");
                    $('#cat').show();
                    $('#result_search').hide();

                    setTimeout(function () {
                        $('#error').fadeOut('fast');
                    }, 3000);
                }
            });
            return false;
        }

        return true;
    }

</script>