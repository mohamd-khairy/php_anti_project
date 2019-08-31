
<section id="about-us">
    <div class="container">

        <div class="team">
            <div class="center wow fadeInDown">
                <h2>مدربينــا</h2>
                <p class="lead">نمتلك نخبه من افضل المدربين فالوطن العربي والشرق الاوسط.</p>
            </div>

            <?php
            $data = InstractorModel::get_all_data_from_end('inst_id');
            $i = 1;
            foreach ($data as $in) {
                ?>
                <!--                <div class="row ">-->
                <div class="col-sm-4 col-md-4" > 

                    <div class="single-profile-top wow fadeInDown" data-wow-duration="500ms" data-wow-delay="100ms">

                        <div class="media">
                            <div class="pull-left" onclick="mido('?rt=Instractor/show&id=<?= $in['inst_id'] ?>')">
                                <a  onclick="mido('?rt=Instractor/show&id=<?= $in['inst_id'] ?>')"><img class="media-object" style="width: 150px;height:200px"  src="<?= HostName . DS . 'img' . DS . $in['inst_image'] ?>" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div onclick="mido('?rt=Instractor/show&id=<?= $in['inst_id'] ?>')">
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
                                <p onclick="mido('?rt=Instractor/show&id=<?= $in['inst_id'] ?>')"><?= $in['inst_details'] ?></p>
                            </div>                                 
                        </div><!--/.media -->
                    </div> 
                </div><!--/.col-lg-4 -->

                <?php if (intval($i / 3)) { ?>
                    <br>
                <?php } $i++;
            } ?>
        </div><!--section-->
    </div><!--/.container-->
</section><!--/about-us-->