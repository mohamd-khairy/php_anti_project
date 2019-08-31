
<?php
if (isset($_GET['cor_id']) && intval($_GET['cor_id'])) {
    $data = CourseModel::getAllDatabyid($_GET['cor_id']);
//print_r($data);
    if (empty($data)) {
        ?>
        <script type="text/javascript">
            alert("لا توجد بيانات لهذا الكورس .. هناك خطا!");
        </script>
        <?php
    } else {
        $val = $data[0];
        ?>

        <section id="feature" class="transparent-bg" style="margin-top: -8%">
            <div class="container">
                <div class="get-started center wow fadeInDown">
                    <h2><?= $val['cor_name'] ?></h2>
                    <p class="lead">هذا الكورس من اهم الكورسات التي موجوده لدينا ...</p>
                </div><!--/.get-started-->

                <?php
                $titles = Cor_contentModel::getAllDatabyid($val['cor_id']);
                if (!empty($titles)) {
                    ?>
                    <div class="row wow fadeInDown">
                        <div class="col-xs-12 col-sm-12">
                            <div class="tab-wrap">
                                <div class="media">
                                    <div class="parrent pull-left">
                                        <ul class="nav nav-tabs nav-stacked">
                                            <?php
                                            $i = 1;
                                            $a = '';
                                            foreach ($titles as $tit) {
                                                if ($i == 1) {
                                                    $a = 'active';
                                                } else {
                                                    $a = '';
                                                }
                                                ?>
                                                <li class="<?= $a ?>"><a href="#tab<?= $i ?>" data-toggle="tab" class="analistic-01"><?= $tit['title'] ?> </a></li>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </ul>
                                    </div>

                                    <div class="parrent media-body">
                                        <div class="tab-content">
                                            <?php
                                            $j = 1;
                                            $b = '';
                                            foreach ($titles as $ti) {
                                                if ($j == 1) {
                                                    $b = 'active in';
                                                } else {
                                                    $b = '';
                                                }
                                                ?>
                                                <div class="tab-pane <?= $b ?>" id="tab<?= $j ?>">
                                                    <div class="media-body">
                                                        <h2><?= $ti['details'] ?></h2>
                                                    </div>
                                                </div>
                                                <?php
                                                $j++;
                                            }
                                            ?>


                                        </div> <!--/.tab-content-->  
                                    </div> <!--/.media-body--> 
                                </div> <!--/.media-->     
                            </div><!--/.tab-wrap-->               
                        </div><!--/.col-sm-6-->
                    </div><!--/.row-->
                <?php } ?>
            </div>
        </section>

        <div id='msg'></div>
        <section class="pricing-area shortcode-item wow fadeInDown"  style="margin-top: -5%">
            <div class="container">
                <div class="col-sm-3"></div>
                <div class="row text-center">
                    <!-- if course  started  -->
                    <?php if (strtotime($val['cor_start_date']) <= strtotime(date('Y-m-d'))) { ?>
                        <div class="col-sm-6 plan price-two wow fadeInDown">
                            <ul>
                                <li class="heading-two">
                                    <h2 style="font-weight: bold"><?= $val['cor_name'] ?></h2>
                                    <span>$ <?= $val['cor_cost'] ?> </span>
                                </li>
                                <li><?= $val['cor_start_date'] ?> start</li>
                                <li><?php
                                    if (!empty($val['cor_days'])) {
                                        $dy = "";
                                        $d = explode(',', $val['cor_days']);
                                        foreach ($d as $day) {
                                            $dy.=substr($day, 0, -1) . ",";
                                        }
                                        echo substr($dy, 0, -1);
                                    }
                                    ?></li>
                                <li><?= $val['cor_time'] ?> Am </li>
                                <?php
                                $insts = Cor_instModel::get_inst_by_cor_id($val['cor_id']);
                                if (!empty($insts)) {
                                    $in = "";
                                    foreach ($insts as $inst) {
                                        $in.=$inst['inst_name'] . ",";
                                    }
                                    $in = substr($in, 0, -1);
                                    ?>
                                    <li> <?= $in ?> :المدربين</li>
                                <?php } ?>
                                <?php
                                if (isset($_SESSION['user_id'])) {
                                    $here = BookModel::check_user_book($_SESSION['user_id'], $_GET['cor_id']);
                                    if (empty($here)) {
                                        ?>
                                        <li class="plan-action">
                                            <a href="#Enroll" class="btn btn-primary">سجــل الان  </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="col-sm-6 plan price-three wow fadeInDown">
                            <img src="images/ribon_one.png">
                            <ul>
                                <li class="heading-three">
                                    <h2 style="font-weight: bold"><?= $val['cor_name'] ?></h2>
                                    <span>$ <?= $val['cor_cost'] ?> / Month</span>
                                </li>
                                <li><?= $val['cor_start_date'] ?> start</li>
                                <li><?php
                                    if (!empty($val['cor_days'])) {

                                        $dy = "";
                                        $d = explode(',', $val['cor_days']);
                                        foreach ($d as $day) {
                                            $dy.=substr($day, 0, -1) . ",";
                                        }
                                        echo substr($dy, 0, -1);
                                    }
                                    ?></li>
                                <li><?= $val['cor_time'] ?> Am </li>
                                <?php
                                $insts = Cor_instModel::get_inst_by_cor_id($val['cor_id']);
                                if (!empty($insts)) {
                                    $in = "";
                                    foreach ($insts as $inst) {
                                        $in.=$inst['inst_name'] . ",";
                                    }
                                    $in = substr($in, 0, -1);
                                    ?>
                                    <li><?= $in ?> :المدربين</li>
                                <?php } ?>                                <li class="plan-action">
                                <?php if (isset($_SESSION['user_id'])) { ?>
                                    <?php
                                    $here = BookModel::check_user_book($_SESSION['user_id'], $_GET['cor_id']);
                                    if (empty($here)) {
                                        ?>
                                        <li class="plan-action">
                                            <a href="#Enroll" class="btn btn-primary">سجــل الان  </a>
                                        </li>
                                    <?php } ?>
                                <?php } else { ?>
                                    <a href="#login" class="btn btn-primary">سجــل الان  </a>
            <?php } ?>
                                </li>
                            </ul>
                        </div>
        <?php } ?>

                    <div class="col-sm-3"></div>

                </div>
            </div>
        </section><!--/pricing_area-->



        <div id="Enroll" class="modalDialog" >
            <div style="width: 500px">
                <a href="#closeenrol" title="closeenrol" class="closee">X</a>
                <center><p>اكمل الحجز</p></center>
                <div class="row">
                    <form  action="#">
                        <div class="input-group">
                            <input type="hidden" name='cor_id' id="cor_id" value="<?= $_GET['cor_id'] ?>">
                            <input type="hidden" name='cus_id' id="cus_id" value="<?= $_SESSION['user_id'] ?>">

                            <input type="text" name="cus_address" id="cus_address" class="input form-control" placeholder="أدخل العنوان..." style="direction: rtl">
                            <span class=" input-group-addon">العنوان</span>
                        </div>
                        <span class="cus_address help-block" id="address" style="text-align: center;display: none;color:#c52d2f">validate..</span>

                        <br>
                        <div class="input-group">
                            <input type="text" name="cus_job" id='cus_job' class="input form-control"  placeholder="أدخل الوظيفه..." style="direction: rtl">
                            <span class="input-group-addon"> الوظيفه</span>

                        </div>
                        <span class="cus_job help-block" id="job" style="text-align: center;display: none;color:#c52d2f">validate..</span>

                        <br>
                        <div class="input-group">
                            <input type="date" name="cus_birth_date" id="cus_birth_date"  class="input form-control"  style="direction: rtl">  
                            <span class="input-group-addon">تاريخ الميلاد</span>
                        </div>
                        <span class="cus_birth_date help-block" id="date" style="text-align: center;display: none;color:#c52d2f">validate..</span>

                        <br>

                        <input class="btn btn-lg btn-primary btn-block" onclick="validate_book()"  type="button" value="أحجز">

                    </form>
                </div>
            </div>
        </div>   
        <script>
            $(".input").bind('blur', function (event) {
                var $this = $(this);

                if ($this.val() == '') {
                    $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                    $('.' + $this.attr('id') + '').show();
                } else if ($this.attr('id') == "cus_birth_date" && (new Date().getTime() <= new Date($this.val()).getTime())) {
                    $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'> أدخل تاريخ الميلاد صحيح ...</h4>");
                    $('.' + $this.attr('id') + '').show();
                }
                else {
                    $('.' + $this.attr('id') + '').hide();
                }
            });

            function validate_book() {
                $("input").each(function () {
                    var $this = $(this);
                    if ($this.val() == "") {
                        $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                        $('.' + $this.attr('id') + '').show();
                    } else if ($this.attr('id') == "cus_birth_date" && (new Date().getTime() <= new Date($this.val()).getTime())) {
                        $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'> أدخل تاريخ الميلاد صحيح ...</h4>");
                        $('.' + $this.attr('id') + '').show();
                    }
                    else {
                        $('.' + $this.attr('id') + '').hide();
                    }
                });
                var hidden = ($("#address").is(":hidden") && $("#job").is(":hidden") && $("#date").is(":hidden"));
                if (hidden) {
                    var cus_id = $("#cus_id").val(), cor_id = $("#cor_id").val()
                            , cus_address = $("#cus_address").val(), cus_job = $("#cus_job").val(), cus_birth_date = $("#cus_birth_date").val();
                    var params = {cus_id: cus_id, cor_id: cor_id, cus_address: cus_address, cus_job: cus_job, cus_birth_date: cus_birth_date};
                    var url = "?rt=Book/add";
                    $.post("?rt=Book/check", {cus_id: cus_id, cor_id: cor_id}, function (result) {
                        //alert(result);
                        if (result[0] == 0) {
                            $("#Enroll").hide();
                            $("#msg").html("<center><h4 style='color:#c52d2f'>انت بالفعل مسجل هذا الكورس ... </h4></center>");
                            $("#msg").show();
                        } else {
                            $.post(url, params, function (data) {
                                if (data == 1) {
                                    $("#Enroll").hide();
                                    $("#msg").html("<center><h4 style='color:green'>تم  التسجيل بنجاح </h4></center>");
                                    $("#msg").show();
                                } else {
                                    $("#Enroll").hide();
                                    $("#msg").html("<center><h4 style='color:#c52d2f'> لم يتم التسجيل ... </h4></center>");
                                    $("#msg").show();
                                }
                                setTimeout(function () {
                                    $('#msg').fadeOut('fast');
                                }, 5000);
                            });
                            return false;
                        }
                        setTimeout(function () {
                            $('#msg').fadeOut('fast');
                        }, 5000);
                    });
                }
            }
        </script>




        <div class="clients-area center wow fadeInDown" style=" margin-top: -3%">
            <!--  this show if log in active -->
            <?php
            if (isset($_SESSION['user_id'])) {
                $data = CustomerModel::get_customer_by_id($_SESSION['user_id'])[0];
                ?>
                <div class="row">
                    <div class="media comment_section">
                        <div class="pull-left post_comments">
                            <a href="#"><img  style=" margin-top: -1%" src="<?= HostName . DS . 'img' . DS . $data['cus_image'] ?>" class="img-circle" alt="" /></a>
                        </div>
                        <div class="media-body post_reply_comments">
                            <form method="post"   id="formcomment">
                                <input type="hidden" name="cor_id" id="cor_id" value="<?= $val['cor_id'] ?>">
                                <input type="hidden" name="cus_id" id="cus_id" value="<?= $data['cus_id'] ?>">
                                <input type="text" name="comment_details" onkeypress="return msgKeyPresscomment(event);" class="pull-right form-control col-sm-9" id="comment" placeholder="... تعليقك علي الكورس "></form>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    function msgKeyPresscomment(e) {
                        e = e || window.event;
                        if (e.keyCode == 13)
                        {
                            var val = $("#comment").val();
                            if (val == "") {
                                alert("اكتب الكومنت .. ! ");
                                return false;
                            } else {
                                //   $("formcomment").submit();
                                var cor_id = $("#cor_id").val();
                                var cus_id = $("#cus_id").val();
                                var comment_details = $("#comment").val();
                                $.post("?rt=Course/comment", {cor_id: cor_id, cus_id: cus_id, comment_details: comment_details},
                                function (result) {
                                    if (result == 0) {
                                        alert('error');
                                    } else {
                                        document.getElementById("result").innerHTML = result;
                                        $("#comment").val("");
                                    }
                                });
                                return false;
                            }
                        }
                        return true;
                    }
                </script>
            <?php }
            ?>
            <section >

                <h2>ماذا قال العملاء عن هذا الكورس ?</h2>
                <div id="result"></div>
                <?php
                $comment = CommentModel::get_comment_by_cor_id($val['cor_id']);
                // print_r($comment);

                foreach ($comment as $value) {
                    ?>
                    <div class="media comment_section">
                        <div class="pull-left post_comments">
                            <a href="#"><img style=" margin-top: -1%" src="<?= HostName . DS . 'img' . DS . $value ['cus_image'] ?>" class="img-circle" alt="" /></a>
                        </div>
                        <div class="media-body post_reply_comments">
                            <h3><?= $value['cus_name'] ?></h3>
                            <h4><?= date("M d  Y  - H:i A", strtotime($value['comment_datetime'])) ?></h4>

                            <p><?= $value['comment_details'] ?></p>
                        </div>
                    </div>

        <?php } ?>
            </section>
        </div>

        </div><!--/.container-->
        <?php
    }
} else {
    ?>
    <script type="text/javascript">
        window.location.href = "index.php";
        alert("لا توجد بيانات لهذا الكورس .... هناك خطا!");

    </script>
<?php } ?>
