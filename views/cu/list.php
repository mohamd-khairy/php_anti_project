
<section id="portfolio">
    <div class="container">

        <!--        <div class="container">-->
        <ul class="nav nav-pills" style="margin-left: 32%;font-weight: bold;">
            <li ><a data-toggle="pill" href="#menu2" onclick="a()">الكورسات التي لم تبدا</a></li>
            <li ><a data-toggle="pill" href="#menu1">الكورسات الحاليه</a></li>
            <li id="c1"><a data-toggle="pill" href="#home">كل كورساتي</a></li>

        </ul>

        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">

                <div class="row">
                    <?php
                    $data = BookModel::get_user_book($_SESSION['user_id']);
                    foreach ($data as $value) {
                        ?>
                        <a href="#" onclick="mido('?rt=Course/show&cor_id=<?= $value['cor_id'] ?>');">
                            <div class="col-sm-4 col-md-3" >
                                <div class="media services-wrap wow fadeInDown" style="background-color:#c52d2f;height:220px">
                                    <div >
                                        <img class="img-responsive"  style="width:750px;height:100px;"  src="<?= HostName . DS . 'img' . DS . $value['cor_image'] ?>" style="margin-left:-5% ">
                                    </div>
                                    <div class="media-body">
                                        <center> <h3 class="media-heading" style="font-weight: bold;color: black"><?= $value['cor_name'] ?></h3></center>
                                        <div style="margin-top: -2%">
                                            <?php $insts = Cor_instModel::get_inst_by_cor_id($value['cor_id']); ?>
                                            <h4><center><?php
                                                    $in = "";
                                                    foreach ($insts as $inst) {
                                                        $in.=$inst['inst_name'] . ",";
                                                    } $i = substr($in, 0, -1);
                                                    echo $i;
                                                    ?> </center></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>  
                    <?php } ?>

                </div><!--/.row-->

            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="row">
                    <?php
                    $data = BookModel::get_user_book($_SESSION['user_id']);
                    foreach ($data as $value) {
                        if (strtotime($value['cor_start_date']) <= strtotime(date(DateTime::ATOM))) {
                            ?>
                            <a href="#" onclick="mido('?rt=Course/show&cor_id=<?= $value['cor_id'] ?>');">
                                <div class="col-sm-4 col-md-3" >
                                    <div class="media services-wrap wow fadeInDown" style="background-color:#c52d2f;height:220px">
                                        <div >
                                            <img class="img-responsive"  style="width:750px;height:100px;"  src="<?= HostName . DS . 'img' . DS . $value['cor_image'] ?>" style="margin-left:-5% ">
                                        </div>
                                        <div class="media-body">
                                            <center> <h3 class="media-heading" style="font-weight: bold;color: black"><?= $value['cor_name'] ?></h3></center>
                                            <div style="margin-top: -2%">
                                                <?php $insts = Cor_instModel::get_inst_by_cor_id($value['cor_id']); ?>
                                                <h4><center><?php
                                                        $in = "";
                                                        foreach ($insts as $inst) {
                                                            $in.=$inst['inst_name'] . ",";
                                                        } $i = substr($in, 0, -1);
                                                        echo $i;
                                                        ?> </center></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>  
                        <?php
                        }
                    }
                    ?>

                </div><!--/.row-->    
            </div>
            <div id="menu2" class="tab-pane fade">
                <div class="row">
                    <?php
                    $data = BookModel::get_user_book($_SESSION['user_id']);
                    foreach ($data as $value) {
                        if (strtotime($value['cor_start_date']) > strtotime(date(DateTime::ATOM))) {
                            ?>
                            <div class="col-sm-4 col-md-3" >
                                <div class="media services-wrap wow fadeInDown" style="background-color:#c52d2f;height:220px">
                                    <a href="#" onclick="mido('?rt=AdminCourse/showone&cor_id=<?= $value['cor_id'] ?>');">
                                        <div >
                                            <img class="img-responsive"  style="width:750px;height:100px;"  src="<?= HostName . DS . 'img' . DS . $value['cor_image'] ?>" style="margin-left:-5% ">
                                        </div>
                                        <div class="media-body">
                                            <center> <h3 class="media-heading" style="font-weight: bold;color: black"><?= $value['cor_name'] ?></h3></center>
                                            <div style="margin-top: -2%">
                                                        <?php $insts = Cor_instModel::get_inst_by_cor_id($value['cor_id']); ?>
                                                <h4><center><?php
                                                        $in = "";
                                                        foreach ($insts as $inst) {
                                                            $in.=$inst['inst_name'] . ",";
                                                        } $i = substr($in, 0, -1);
                                                        echo $i;
                                                        ?> </center></h4>
                                            </div>

                                        </div>
                                    </a> 
                                </div>
                            </div>

                        <?php
                        }
                    }
                    ?>

                </div><!--/.row-->  


            </div>
        </div>
    </div>
    <div style="margin-bottom: 30%"></div>
</section>

<script>

    $("#c1").attr("class", "active");

</script>




