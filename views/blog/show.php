<section id="blog" class="container">
    <div class="blog">
        <div class="row">
            <div class="col-md-8">
                <?php
                $data = BlogModel::get_all_data_from_end('blog_id');
                foreach ($data as $value) {
                    ?>
                    <div class="blog-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-2 text-center">
                                <div class="entry-meta">
                                    <span id="publish_date"><?= date('d M ', strtotime($value['blog_datetime'])); ?></span>
                                    <span><i class="fa fa-comment"></i> <a  onclick="m(<?= $value['blog_id'] ?>);" id="button_comment"   href="#comment"><?= count(CommentModel::get_all_comment_by_blog_id($value['blog_id'])) ?> Comments</a></span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="#"><img class="img-responsive img-blog" style="width: 700px;height: 400px" src="<?= HostName . DS . 'img' . DS . $value['blog_image'] ?>" width="100%" alt="" /></a>
                                <h2><a href="#"><?= $value['blog_title'] ?></a></h2>
                                <h3><?= substr($value['blog_content'], 0, 300) ?> .....</h3>
                                <a class="btn btn-primary readmore" onclick="mido('?rt=Blog/blog_details&id=<?= $value['blog_id'] ?>')" href="#">اقرأ المزيد  <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>    
                    </div><!--/.blog-item-->

                    <div id="comment" class="modalDialog">
                        <div>
                            <a href="#" title="closecomment" class="closee">X</a>
                            <center><h2 > الكومنتات </h2></center>
                            <div class="row" >
                                <div class="clients-area center wow fadeInDown" style=" margin-top: -3%">
                                    <div class="col-sm-12">
                                        <?php
                                        if (isset($_SESSION['user_id'])) {
                                            $data = CustomerModel::get_customer_by_id($_SESSION['user_id'])[0];
                                            ?>
                                            <div class="row">
                                                <a href="#" class="pull-left" style="margin-top: -2%"><img style="width: 70px;height: 70px" src="<?= HostName . DS . 'img' . DS . $data['cus_image'] ?>"></a>

                                                <div class="single_comments">
                                                    <div class="pull-right entry-meta small muted" style="width: 90%;">
                                                        <input type="hidden" id="cus_id" name="cus_id" value="<?= $_SESSION['user_id'] ?>">
                                                        <input type="text" id="comment_text" name="comment_details" onkeypress="return msgKeyPresscomment(event);" class="pull-right form-control col-sm-12"  placeholder="... تعليقك علي الكورس "></form>
                                                    </div>
                                                </div>

                                            </div>

                                            <br>
                                            <?php $data = CustomerModel::get_customer_by_id($_SESSION['user_id']); ?>
                                            <div style="display: none" id="current_comment">
                                                <img class="pull-left" style="width: 60px;height: 60px" src="<?= HostName . DS . 'img' . DS . $data[0]['cus_image'] ?>">
                                                <p id="user_comment"></p>
                                                <div class="entry-meta small muted">
                                                    <span>By <a href="#"><?= $data[0]['cus_name'] ?></a></span <span>at  <a href="#"><?= date(' H:i a - M Y ', strtotime($data[0]['comment_datetime'])) ?></a></span>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                        <br>
                                        <?php
                                        $comments = CommentModel::get_all_comment_by_blog_id($value['blog_id']);
                                        foreach ($comments as $com) {
                                            ?>
                                            <div class="single_comments">
                                                <img class="pull-left" style="width: 60px;height: 60px" src="<?= HostName . DS . 'img' . DS . $com['cus_image'] ?>">
                                                <p><?= $com['comment_details'] ?></p>
                                                <div class="entry-meta small muted">
                                                    <span>By <a href="#"><?= $com['cus_name'] ?></a></span <span>  at  <a href="#"><?= date(' H:i a - M Y ', strtotime($com['comment_datetime'])) ?></a></span>
                                                </div>
                                            </div><br>
                                        <?php } ?>
                                    </div>
                                </div>                     
                                <!--/.recent comments-->
                            </div>
                        </div>
                    </div>


                <?php } ?>


            </div><!--/.col-md-8-->

            <aside class="col-md-4">
                <div class="widget categories">
                    <h3>أحدث الكومنتات </h3>
                    <div class="row">
                        <?php
                        $i = 0;
                        $comments = CommentModel::get_all_comment_from_end();
                        foreach ($comments as $com) {
                            $i++;
                            ?>
                            <div class="col-sm-12">
                                <div class="single_comments">
                                    <img style="width: 100px;height: 100px" src="<?= HostName . DS . 'img' . DS . $com['cus_image'] ?>" alt=""  />
                                    <p><?= $com['comment_details'] ?> </p>
                                    <div class="entry-meta small muted">
                                        <span>By <a href="#"><?= $com['cus_name'] ?></a></span <span>at  <a href="#"><?= date(' H:i a - M Y ', strtotime($com['comment_datetime'])) ?></a></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($i >= 5) {
                                break;
                            }
                        }
                        ?>

                    </div>                     
                </div><!--/.recent comments-->


                <div class="widget categories">
                    <h3>الاقســام</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category">
                                <?php
                                $i = 0;
                                $cats = CategoryModel::get_all_data_from_end('cat_id');
                                foreach ($cats as $cat) {
                                    if ($cat['cat_type'] == 'in') {
                                        $i++;
                                        $count = CourseModel::getAllDataby_cat_id($cat['cat_id']);
                                        ?>
                                        <li><a  title="<?= count($count) ?>"    onclick="mido('?rt=Cat/show&id=<?= $cat['cat_id'] ?>');" href="#"><?= $cat['cat_name'] ?></a></li>
                                        <?php
                                        if ($i == 10) {
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>                     
                </div><!--/.categories-->


                <div class="widget blog_gallery">
                    <h3>مدربينا</h3>
                    <ul class="sidebar-gallery">
                        <div class="row">
                            <div class="col-sm-10">
                                <?php
                                $i = 0;
                                $trainer = InstractorModel::get_all_data_from_end('inst_id');
                                foreach ($trainer as $inst) {
                                    $i++;
                                    ?>
                                    <li><a onclick="mido('?rt=Instractor/show')" href="#"><img title="<?= $inst['inst_name'] ?>" style="width:110px ;height:70px " src="<?= HostName . DS . 'img' . DS . $inst['inst_image'] ?>" alt="" /></a></li>
                                            <?php
                                            if ($i == 10) {
                                                break;
                                            }
                                        }
                                        ?>
                            </div>
                        </div>
                    </ul>
                </div><!--/.blog_gallery-->
            </aside>  
        </div><!--/.row-->
    </div>
</section><!--/#blog-->


<script type="text/javascript">
    var arr = new Array();
    function m(f) {
        arr = [];
        arr[0] = f;
    }

    function msgKeyPresscomment(e) {
        e = e || window.event;
        if (e.keyCode == 13)
        {
            var val = $("#comment_text").val();
            if (val == "") {
                alert("اكتب الكومنت .. ! ");
                return false;
            } else {
                var blog_id = arr[0];
                var cus_id = $("#cus_id").val();
                var comment_details = $("#comment_text").val();
                $.post("?rt=Blog/comment", {blog_id: blog_id, cus_id: cus_id, comment_details: comment_details},
                function (result) {
                    if (result != 'no') {
                        document.getElementById("user_comment").innerHTML = result;
                        $("#current_comment").show();
                        $("#comment_text").val("");
                    } else {
                        alert("no");
                    }
                });
                return false;
            }
        }
        return true;
    }
</script>