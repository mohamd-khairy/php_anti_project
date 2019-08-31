<section id="blog" class="container">
    <div class="blog">
        <div class="row">
            <div class="col-md-9">
                <?php
                $id = intval($_GET['id']);
                $data = BlogModel::getAllDatabyid($id);
                if (empty($data)) {
                    exit();
                } else {
                    $value = $data[0];
                }
                ?>
                <div class="blog-item">
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 blog-content">
                            <a href="#"><img class="img-responsive img-blog" style="width: 700px;height: 400px" src="<?= HostName . DS . 'img' . DS . $value['blog_image'] ?>" width="100%" alt="" /></a>
                            <h2><a href="blog-item.html"><?= $value['blog_title'] ?></a></h2>
                            <h3><?= $value['blog_content'] ?> .....</h3>
                        </div>
                    </div>    
                </div><!--/.blog-item-->
                <div class="row" >
                    <div class="clients-area center wow fadeInDown" style=" margin-top: -3%">
                        <div class="col-sm-12">
                            <center><h2>الكومنتات</h2></center>
                            <br>
                            <?php
                            $comments = CommentModel::get_all_comment_by_blog_id($value['blog_id']);
                            foreach ($comments as $com) {
                                ?>
                                <div class="single_comments">
                                    <img class="pull-left" style="width: 60px;height: 60px" src="<?= HostName . DS . 'img' . DS . $com['cus_image'] ?>">
                                    <p><?= $com['comment_details'] ?></p>
                                    <div class="entry-meta small muted">
                                        <span>By <a href="#"><?= $com['cus_name'] ?></a></span <span>On <a href="#">Creative</a></span>
                                    </div>
                                </div><br>
                            <?php } ?>
                        </div>
                    </div>                     
                    <!--/.recent comments-->
                </div>


            </div><!--/.col-md-8-->

    

        </div><!--/.row-->

    </div><!--/.blog-->

</section><!--/#blog-->


<script type="text/javascript">


    function msgKeyPresscomment(e) {
        e = e || window.event;
        if (e.keyCode == 13)
        {
            var val = $("#comment_text").val();
            if (val == "") {
                alert("اكتب الكومنت .. ! ");
                return false;
            } else {
                var blog_id = $("#blog_id").val();
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