<section  class="service-item" style="background-color: #c52d2f">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2 style="color: black">كـــل الفيديوهات</h2>
<!--                 <p class="lead" style="color: black">اضغط علي الكورس للتعديل</p>
            -->            </div>
        <div class="row">
            <?php
            if (isset($_GET['id']) && !empty($_GET['id']) && intval($_GET['id'])) {
                $count = Online_corModel::getAllDatabyid($_GET['id']);
                foreach ($count as $video) {
                    ?>

                    <div class="col-sm-4 col-md-4">
                        <div class="media services-wrap wow fadeInDown" style="height: 230px" >
                            <center><h3 style="margin-top: -5%"> <?= $video['on_details'] ?></h3></center>
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
    <div style="margin-bottom: 19%"></div>
</section>
