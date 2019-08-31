<section  class="contents">
    <div class="page">     
        <div class="center wow fadeInDown">
            <div class="input-group">
                <input type="text"  onkeypress="return searchKeyPress(event);" id="search"   class="form-control" style="background-color: #F1F1F1;direction: rtl" placeholder="أدخل اسم القســــم" >
                <span class="input-group-addon">أبـحـث</span>
            </div>
            <div id="result"></div>
        </div>

        <div class="row">
            <div id="result_search"></div>
            <div id="cor">
                <?php
                $data = OnlineModel::get_all_data_from_end('online_id');
                foreach ($data as $on) {
                    ?>
                    <div class="col-sm-2 col-md-4"  >
                        <div class="media services-wrap wow fadeInDown" style="height:300px; background-color: #c52d2f"> 
                            <a href="#deletecor"  onclick="del(<?= $on['online_id'] ?>)" class="closee">X</a>

                            <a href="#" onclick="mido('?rt=Adminonline/online_showone&id=<?= $on['online_id'] ?>')">
                                <div >
                                    <img class="img-responsive"  style="width:200px;height:150px;"  src="<?= HostName . DS . 'img' . DS . $on['online_image'] ?>" style="margin-left:-5% ">
                                </div>
                                <div class="media-body">
                                    <center><h3 class="media-heading" style="font-weight: bold;color: black"><?= $on['online_name'] ?></h3>
                                    </center>
                                </div>                        
                                <div class="media-body">
                                    <?php
                                    if ($on['online_cost'] != 0) {
                                        $cost = $on['online_cost'] . " $";
                                    } else {
                                        $cost = 'free';
                                    }
                                    ?>
                                    <h4 class="pull-left"> <?= $cost ?></h4>
                                     <?php $count= Online_corModel::getAllDatabyid($on['online_id']); ?>
                                    <h4 class="pull-right"> <center><?=  count($count)?> Video</center></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div><!--/.row-->
        </div>
    </div><!--/.container-->
</section>

<div id="deletecor" class="modalDialog" >
    <div style="width: 40%; margin-top: 20%">
        <a href="#close" title="close" class="closee">X</a>
        <br>
        <button class="btn btn-lg  btn-block" type="text" >
            هل تريد حذف الكورس ؟
        </button>
        <center>
            <a href="#" style="width: 45%;background-color:#53c653" class="btn btn-lg btn-primary ">لا</a>
            <a onclick="deletecor()" style="width: 45%" class="btn btn-lg btn-primary ">نعم</a>
        </center>
        <br>
    </div>
</div> 

<script>


    var arr = new Array();
    function del(i) {
        arr[arr.length] = i;
    }
    function deleteallcor() {
        $.post("?rt=Adminonline/deleteall", function (data) {
            if (data == 'yes') {
                mido("?rt=Adminonline/showall");
                return false
            }
        });
    }
    function deletecor() {
        $.post("?rt=Adminonline/delete", {online_id: arr[0]}, function (d) {
            if (d == 'yes') {
                mido("?rt=Adminonline/showall");
                return false;
            } else {
                window.location.href = "?rt=Adminonline/showall#";
                $("#result").html("<center><h4 style='color:#c52d2f'>لم يتم الحذف...</h4></center>");
                $('#result').show();
            }
            arr = [];
        });
    }
    function searchKeyPress(e) {
        e = e || window.event;
        if (e.keyCode == 13)
        {
            $.post("?rt=Adminonline/search", {online_name: $("#search").val()}, function (data) {

                if (data != 'no') {
                    $("#result_search").html( data );
                    $('#cor').hide();
                    $('#result_search').show();
                    $("#search").keyup(function () {
                        if (!this.value) {
                            $('#result_search').hide();
                            $('#cor').show();
                        }
                    });
                } else {
                    $("#result").html("<h4 style='color:#c52d2f'>هذاالكورس  غير موجود ...</h4>");
                    $('#cor').show();
                    $('#result_search').hide();

                    setTimeout(function () {
                        $('#result').fadeOut('fast');
                    }, 3000);
                }
            });
            return false;
        }

        return true;
    }

</script>