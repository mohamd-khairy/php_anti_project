
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
                            <div class="col-xs-2 col-sm-2 text-center">
                                <div class="entry-meta">
                                    <span id="publish_date"><?= date('d M ', strtotime($value['blog_datetime'])); ?></span>
                                    <span><i class="fa fa-comment"></i> <a  onclick="m(<?= $value['blog_id'] ?>);" id="button_comment"   href="#comment">2 Comments</a></span>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-10 blog-content">
                                <a href="#"><img class="img-responsive img-blog" src="<?= HostName . DS . 'img' . DS . $value['blog_image'] ?>" width="100%" alt="" /></a>
                                <h2><a href="#"><?= $value['blog_title'] ?></a></h2>
                                <h3><?= substr($value['blog_content'], 0, 300) ?> .....</h3>
                                <a class="btn btn-primary readmore" onclick="mido('?rt=AdminBlog/blog_details&id=<?= $value['blog_id'] ?>')" href="#">اقرأ المزيد  <i class="fa fa-angle-right"></i></a>
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
                                        if (isset($_SESSION['manager_id'])) {
                                            $data = CustomerModel::get_customer_by_id(0)[0];
                                            ?>
                                            <div class="row">
                                                <a href="#" class="pull-left" style="margin-top: -2%"><img style="width: 70px;height: 70px" src="<?= HostName . DS . 'img' . DS . $data['cus_image'] ?>"></a>

                                                <div class="single_comments">
                                                    <div class="pull-right entry-meta small muted" style="width: 90%;">
                                                        <input type="hidden" id="cus_id" name="cus_id" value="0">
                                                        <input type="text" id="comment_text" name="comment_details" onkeypress="return msgKeyPresscomment(event);" class="pull-right form-control col-sm-12"  placeholder="... تعليقك علي الكورس "></form>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php }
                                        ?>
                                        <br>
                                        <?php $data = CustomerModel::get_customer_by_id(0); ?>
                                        <div style="display: none" id="current_comment">
                                            <img class="pull-left" style="width: 60px;height: 60px" src="<?= HostName . DS . 'img' . DS . $data[0]['cus_image'] ?>">
                                            <p id="user_comment"></p>
                                            <div class="entry-meta small muted">
                                                <span>By <a href="#"><?= $data[0]['cus_name'] ?></a></span <span>  at  <a href="#"><?= date(' H:i a - M Y ', strtotime($data[0]['comment_datetime'])) ?></a></span>
                                            </div>
                                        </div>

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
        </div>
    </div>
</section>