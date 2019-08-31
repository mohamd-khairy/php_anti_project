
<section id="about-us">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>عن الشركــه</h2>
            <p class="lead">ان شركتنا تتقدم بخطا ثابتة لتكون أفضل شركة تدريب واستشارات إدارية واقتصادية في الوطن العربي تدمج العلم الحديث بالجودة العالية لتقديم أفضل النتائج</p>
        </div>

        <!-- about us slider -->
        <div id="about-slider">
            <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators visible-xs">
                    <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-slider" data-slide-to="1"></li>
                    <li data-target="#carousel-slider" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="img/s11.jpg" class="img-responsive" alt=""> 
                    </div>
                    <div class="item">
                        <img src="img/s11.jpg" class="img-responsive" alt=""> 
                    </div> 
                    <div class="item">
                        <img src="img/s11.jpg" class="img-responsive" alt=""> 
                    </div> 
                </div>

                <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                    <i class="fa fa-angle-left"></i> 
                </a>

                <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
                    <i class="fa fa-angle-right"></i> 
                </a>
            </div> <!--/#carousel-slider-->
        </div><!--/#about-slider-->


        <!-- Our Skill -->
        <div class="skill-wrap clearfix">

            <div class="center wow fadeInDown">
                <h2>التأسيس </h2>
                <p class="lead">تأسست شركة  علم  في  عام  2009
                    تضم الشركة نخبة من المتخصصين في مجال التدريب،
                    ومجموعة كبيرة من الكفاءات التدريبية من مختلف التخصصات والجنسيات حول العالم،
                    وتطبق الشركة معايير الأقيسة العالية والمهنية الاحترافية في مجال التدريب والاستشارات،
                    وتتوزع فروع الشركة حاليا في جميع دول الخليج العربي بواقع ستة مكاتب عاملة.

                </p>

                <h2>الرساله </h2>
                <p class="lead">الشركة العربية الرائدة في الاستشارات والتدريب القيادي والإداري والالكتروني تجمع بين الأصالة والإبداع.
                </p>
            </div>


        </div><!--/.our-skill-->


        <!-- our-team -->
        <div class="team">
            <div class="center wow fadeInDown">
                <h2>فريق العمل</h2>
            </div>

            <div class="row clearfix">
                <?php
                $data = InstractorModel::get_all_data_from_end('inst_id');
                $i = 1;
                foreach ($data as $in) {
                    if ($i > 2) {
                        break;
                    }
                    ?>
                    <div class="col-sm-6 col-md-6" > 
                        <div class="single-profile-top wow fadeInDown" data-wow-duration="500ms" data-wow-delay="100ms">
                            <div class="media">
                                <div class="pull-left" >
                                    <a  ><img class="media-object" style="width: 200px;height:200px"  src="<?= HostName . DS . 'img' . DS . $in['inst_image'] ?>" alt=""></a>
                                </div>
                                <div class="media-body">
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
                                <p ><?= $in['inst_details'] ?></p>
                            </div>                                 
                        </div><!--/.media -->
                    </div><!--/.col-lg-4 -->
                    <?php
                    $i++;
                }
                ?>

            </div> <!--/.row -->
            <div class="row team-bar">
                <div class="first-one-arrow hidden-xs">
                    <hr>
                </div>
                <div class="first-arrow hidden-xs">
                    <hr> <i class="fa fa-angle-up"></i>
                </div>
                <div class="second-arrow hidden-xs">
                    <hr> <i class="fa fa-angle-down"></i>
                </div>
                <div class="third-arrow hidden-xs">
                    <hr> <i class="fa fa-angle-up"></i>
                </div>
                <div class="fourth-arrow hidden-xs">
                    <hr> <i class="fa fa-angle-down"></i>
                </div>
            </div> <!--skill_border-->       

            <div class="row clearfix">   

                <?php
                $data = InstractorModel::get_all_data_from_end('inst_id');
                $i = 1;
                foreach ($data as $in) {
                    if ($i > 2) {
                        if ($i > 4) {
                            break;
                        }
                        ?>
                        <div class="col-sm-6 col-md-6" > 
                            <div class="single-profile-bottom wow fadeInUp" data-wow-duration="500ms" data-wow-delay="100ms">
                                <div class="media">
                                    <div class="pull-left" >
                                        <a  ><img class="media-object" style="width: 150px;height:200px"  src="<?= HostName . DS . 'img' . DS . $in['inst_image'] ?>" alt=""></a>
                                    </div>
                                    <div class="media-body">
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
                                    <p ><?= $in['inst_details'] ?></p>
                                </div>                                 
                            </div><!--/.media -->
                        </div><!--/.col-lg-4 -->
                        <?php
                    }
                    $i++;
                }
                ?>               


            </div>  <!--/.row-->
        </div><!--section-->
    </div><!--/.container-->
</section><!--/about-us-->
