 
<section  class="contents" >
        <div class="page"> 
    <div class="">
        <div class="center wow fadeInDown">
            <h2 style="color: black">كـــل الفيديوهات</h2>
                      </div>
        <div class="row">
            <?php
            if (isset($_GET['id']) && !empty($_GET['id']) && intval($_GET['id'])) {
                $count = Online_corModel::getAllDatabyid($_GET['id']);
                foreach ($count as $video) {
                    ?>

                    <div class="col-sm-6 col-md-6">
                        <div class="media services-wrap wow fadeInDown" style="background-color: #c52d2f;height: 230px" >
                            <center><h3 style="margin-top: -5%;color: black"> <?= $video['on_details'] ?></h3></center>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $video['on_link'] ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                exit();
            }
            ?>
        </div><!--/.row-->
    </div><!--/.container-->
    </div>
    <div style="margin-bottom: 19%"></div>
</section>
