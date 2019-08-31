<section id="about-us">
    <div class="container">

        <div class="team">
            <div class="center wow fadeInDown">
                <h2>المدربين</h2>
                <p>اضغط علي المدرب للتعديل </p>
            </div>
            <style>
                .closee {
                    background: #606061;
                    color: #FFFFFF;
                    line-height: 25px;
                    position: absolute;
                    right:  -12px;
                    text-align: center;
                    top: -10px;
                    width: 24px;
                    text-decoration: none;
                    font-weight: bold;
                    -webkit-border-radius: 12px;
                    -moz-border-radius: 12px;
                    border-radius: 12px;
                    -moz-box-shadow: 1px 1px 3px #000;
                    -webkit-box-shadow: 1px 1px 3px #000;
                    box-shadow: 1px 1px 3px #000;
                }
            </style>
            <?php
            $i=1;
            $data = InstractorModel::get_all_data_from_end('inst_id');
            foreach ($data as $in) {
                ?>
                <!--                <div class="row ">-->
                <div class="col-sm-4 col-md-4" > 

                    <div class="single-profile-top wow fadeInDown" data-wow-duration="500ms" data-wow-delay="100ms">
                        <a href="#delete"  onclick="del(<?= $in['inst_id'] ?>)" class="closee">X</a>

                        <div class="media">
                            <div class="pull-left" onclick="mido('?rt=AdminInst/edit&id=<?= $in['inst_id'] ?>')">
                                <a href="#" onclick="mido('?rt=AdminInst/edit&id=<?= $in['inst_id'] ?>')"><img class="media-object" style="width: 150px;height:200px"  src="<?= HostName . DS . 'img' . DS . $in['inst_image'] ?>" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div onclick="mido('?rt=AdminInst/edit&id=<?= $in['inst_id'] ?>')">
                                    <h4 ><?= $in['inst_name'] ?></h4>
                                    <h5><?= $in['inst_job'] ?></h5>
                                    <ul class="tag clearfix">
                                        <?php
                                        $sk = explode(',', $in['inst_skill']);
                                        foreach ($sk as $skill) {
                                            ?>
                                            <li class = "btn"><a href = "#"><?= $skill ?></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <ul class="social_icons">
                                    <?php if (!empty($in['inst_facebook'])) { ?>
                                        <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                    <?php } else { ?>
                                        <li><a href="http://<?= $in['inst_facebook'] ?>"><i class="fa fa-facebook"></i></a></li>           
                                        <?php
                                    }
                                    if (!empty($in['inst_twitter'])) {
                                        ?>
                                        <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li> 
                                    <?php } else {
                                        ?>
                                        <li><a href = "http://<?= $in['inst_twitter'] ?>"><i class = "fa fa-twitter"></i></a></li>
                                        <?php
                                    }
                                    if ($in['inst_google']) {
                                        ?>
                                        <li><a href="https://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                    <?php } else { ?>
                                        <li><a href="https://<?= $in['inst_google'] ?>"><i class="fa fa-google-plus"></i></a></li>

                                    <?php }
                                    ?>
                                </ul>
                                <p onclick="mido('?rt=AdminInst/edit&id=<?= $in['inst_id'] ?>')"><?= $in['inst_details'] ?></p>
                            </div>                                 
                        </div><!--/.media -->
                    </div> 
                </div><!--/.col-lg-4 -->
                <?php if (intval($i / 3)) { ?>
                    <br>
                <?php } $i++;
            }
            ?> 
        </div><!--section-->
    </div><!--/.container-->
    <div style="margin-bottom: 2%"></div>
</section><!--/about-us-->
<script>

    var arr = new Array();
    function del(i) {
        arr[arr.length] = i;
    }
    function deleteinst() {
        $.post("?rt=AdminInst/delete", {inst_id: arr[0]}, function (d) {
            if (d == 1) {
                mido("?rt=AdminInst/show");
                return false;
            }
            arr = [];
        });
    }
</script>


<div id="delete" class="modalDialog" >
    <div style="width: 40%; margin-top: 20%">
        <a href="#close" title="close" class="closee">X</a>
        <br>
        <button class="btn btn-lg  btn-block" type="text" >
            هل تريد حذف المدرب ؟
        </button>
        <center>
            <a href="#" style="width: 45%;background-color:#53c653" class="btn btn-lg btn-primary ">لا</a>
            <a onclick="deleteinst()" style="width: 45%" class="btn btn-lg btn-primary ">نعم</a>
        </center>
        <br>
    </div>
</div> 

