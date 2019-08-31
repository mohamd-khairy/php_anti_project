
<section  class="service-item" style="background-color: #c52d2f">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2 style="color: black">كـــل الكورسات</h2>
<!--                 <p class="lead" style="color: black">اضغط علي الكورس للتعديل</p>
            -->            </div>
        <div class="row">
            <?php
            $data = OnlineModel::get_all_data_from_end('online_id');
            foreach ($data as $cor) {
                ?>
                <a href="#" onclick="mido('?rt=Course/online_showone&id=<?= $cor['online_id'] ?>')">
                    <div class="col-sm-4 col-md-3" >
                        <div class="media services-wrap wow fadeInDown" style="height:250px">
                            <div >
                                <img class="img-responsive"  style="width:700px;height:120px;"  src="<?= HostName . DS . 'img' . DS . $cor['online_image'] ?>" style="margin-left:-5% ">
                            </div>
                            <div class="media-body">
                                <center><h3 class="media-heading" style="font-weight: bold;color: black"><?= $cor['online_name'] ?></h3>
                                </center>
                            </div>                        
                            <div class="media-body">
                                <?php
                                if ($cor['online_cost'] != 0) {
                                    $cost = $cor['online_cost'] . " $";
                                } else {
                                    $cost = 'free';
                                }
                                ?>
                                <h4 class="pull-left"> <?= $cost ?></h4>
                                <?php $count = Online_corModel::getAllDatabyid($cor['online_id']); ?>
                                <h4 class="pull-right"> <center><?= count($count) ?> Video</center></h4>

                            </div>
                        </div>
                    </div></a>

            <?php } ?>

        </div><!--/.row-->
    </div><!--/.container-->
    <div style="margin-bottom: 19%"></div>
</section>
