
<section id="main-slider" class="no-margin">
    <div class="carousel slide">
        <div >
            <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators visible-xs">
                    <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-slider" data-slide-to="1"></li>
                    <li data-target="#carousel-slider" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img style="width: 1270px;height: 487px" src="img/s.jpg" class="img-responsive" alt=""> 
                    </div>
                    <div class="item">
                        <img style="width: 1270px;height: 487px" src="img/m.png" class="img-responsive" alt=""> 
                    </div> 

                    <div class="item ">
                        <img style="width: 1270px;height: 487px" src="img/s1.jpg" class="img-responsive" alt=""> 
                    </div>  
                    <div class="item ">
                        <img style="width: 1270px;height: 487px" src="img/s2.jpg" class="img-responsive" alt=""> 
                    </div>
                    <div class="item ">
                        <img style="width: 1270px;height: 487px" src="img/v.png" class="img-responsive" alt=""> 
                    </div>

                </div>
            </div> <!--/#carousel-slider-->
        </div><!--/#about-slider-->
    </div>
    <a class="prev hidden-xs"  style="margin-top: -10%" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>

    </a>
    <a class="next hidden-xs" style="margin-top: -10%" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script type="text/javascript">
    function submit() {
        $("#myformask").submit();
    }
    function ans() {
        var xhr = new XMLHttpRequest();
        xhr.open(this.method, this.action, true);
        xhr.send(new FormData(this));
        return false;
        this.reset();

    }
</script>


<section id="feature" style="margin-top: -250px" >
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>احدث الاقسام </h2>
        </div>

        <div class="row">
            <div class="features">
                <?php
                $i = 1;
                $section = CategoryModel::get_all_data_from_end('cat_id');
                foreach ($section as $cat) {
                    if($cat['cat_type']=='in'){
                    if ($i > 6) {
                        break;
                    }
                    ?>
                    <a onclick="mido('?rt=Cat/show&id=<?= $cat['cat_id'] ?>');" href="#">
                        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                            <div class="feature-wrap">
                                <i class="fa fa-cogs"></i>

                                <h2 style="margin-top: 50px"><?= $cat['cat_name'] ?></h2>
                            </div>
                        </div><!--/.col-md-4-->
                    </a>
                    <?php
                    $i++;
                    
                    }
                }
                ?>
            </div><!--/.services-->
        </div><!--/.row-->    
    </div><!--/.container-->
</section><!--/#feature-->



<section id="recent-works">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>أحدث الدورات </h2>
            <p class="lead">فريق العمل لدينا في شركه أنتــي يقدم مجموعه من اهم الكورسات التي تؤهلك للعمل في اكبر الشركات... <br> لماشاهده كل الكورسات سجل الدخول اولا ..</p>
        </div>
        <div class="row wow fadeInDown">
            <?php
            $data = CourseModel::get_all_data_from_end('cor_id');
            $i = 0;
            foreach ($data as $value) {
                ?>
                <div class="col-xs-12 col-sm-4 col-md-3" style="margin-top: 1%;">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" style="width: 250px;height: 250px" src="<?= HostName . DS . 'img' . DS . $value['cor_image'] ?>" alt="">
                        <div class="overlay" style="width: 250px;height: 250px">
                            <div class="recent-work-inner">
                                <center>
                                    <h3><a href="#"><?= $value['cor_name'] ?></a> </h3>
                                    <h3 style="color: black;font-weight: bold"><?= date("l M Y  ", strtotime($value['cor_start_date'])) ?></h3>
                                    <p><?= $value['cor_time'] ?></p>
                                    <a class="btn btn-default" href="#" 
                                       onclick="mido('?rt=Course/show&cor_id=<?= $value['cor_id'] ?>');"  ><i class="fa fa-eye"></i> View</a>
                                </center>
                            </div> 
                        </div>
                    </div>
                </div>  
                <?php
                if ($i >= 7) {
                    break;
                }
                $i++;
            }
            ?>
        </div> 
    </div><!--/.container-->
</section><!--/#feature-->





<section id="about-us">
    <div class="container">
        <div class="team">
            <div class="center wow fadeInDown">
                <h2>مدربينــا</h2>
                <p class="lead">نمتلك نخبه من افضل المدربين فالوطن العربي والشرق الاوسط.</p>
                <div class="btn-group" >
                    <ul class="pagination pagination-sm inline">
                        <li><a onclick="mido('?rt=Instractor/show')" href="#">كل المدربين</a></li>
                    </ul>
                </div>
            </div>

            <?php
            $data = InstractorModel::get_all_data_from_end('inst_id');
            $i = 1;
            foreach ($data as $in) {
                if ($i > 3) {
                    break;
                }
                ?>
                <div class="col-sm-4 col-md-4" > 
                    <div class="single-profile-top wow fadeInDown" data-wow-duration="500ms" data-wow-delay="100ms">
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
                $i++;
            }
            ?>
        </div><!--section-->
    </div><!--/.container-->
</section><!--/about-us-->

<section id="middle">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>لماذا الناس تفضل شركتنا..؟</h2>
            <p class="lead">متدربينا يعملون الان في اكبر الشركات </p>
        </div>

        <div class="row">
            <?php
            $grade = GradeModel::get_all_data_from_end('grad_id');
            foreach ($grade as $g) {
                ?>
                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <img class="img-responsive img-circle" style="width:100px;height:100px;"  src="<?=HostName.DS.'img'.DS.$g['grad_image']?>">
                        </div>
                        <center><div class="media-body">
                                <h3 class="media-heading"><?= $g['grad_name'] ?></h3>
                                <center>Works For:</center>
                                <h4><center><?= $g['grad_job_place'] ?></center></h4>
                            </div></center>
                    </div>
                </div>
            <?php } ?>                                              
        </div><!--/.row-->

    </div><!--/.container-->
</section><!--/#middle-->

<section id='shares' >
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>شركاؤنــا</h2>
<!--            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>-->
        </div>    

        <div class="partners">
            <ul>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" style="padding: 5px" src="img/partners/hrc.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" style="width: 250px; height: 100px; margin-left: 30px" src="img/partners/atd.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" style="width: 250px; height: 100px;margin-left: 40px;background-color: #c52d2f" src="img/partners/hbx.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms"  style="margin-left: 80px;" src="img/partners/ilm.png"></a></li>
                <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" style="height: 90px; margin-left: 50px;margin-bottom: -10px" src="img/partners/h.svg"></a></li>

            </ul>
        </div>        
    </div><!--/.container-->
</section><!--/#partner-->

