<section id="middle" style="direction: rtl;margin-top: -5%;" >
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow fadeInDown">
                <div class="accordion">
                    <h2>كل العملاء</h2>
                    <div class="panel-group" id="accordion1">
                        <?php
                        $c = 1;
                        $a = "";
                        $n = '';
                        $data = CustomerModel::get_all_data_from_end('cus_id');
                        foreach ($data as $cus) {
                            if ($c == 1) {
                                $a = 'active';
                                $n = 'in';
                            } else {
                                $a = '';
                                $n = '';
                            }
                            ?>
                            <div class="panel panel-default">
                                <div class="panel-heading <?= $a ?>">
                                    <h3 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?= $c ?>">
                                            <i class="fa fa pull-left"><?= $c ?></i>

                                            <?= $cus['cus_name'] ?>
                                            <i class="fa fa-angle-right pull-right"></i>
                                        </a>
                                    </h3>
                                </div>

                                <div id="collapse<?= $c ?>" class="panel-collapse collapse <?= $n ?> ">
                                    <div class="panel-body">
                                        <div class="media accordion-inner">
                                            <div class="pull-left">
                                                <img class="img-responsive" style="width:100px; height:100px; " src="<?= HostName . DS . 'img' . DS . $cus['cus_image'] ?>">
                                            </div>
                                            <div class="media-body">
                                                <h4><?= $cus['cus_gender'] ?>
                                                </h4>
                                                <h3><?= $cus['cus_mobile'] ?></h3>
                                                <p><?= $cus['cus_email'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $c++;
                        } ?>  
                    </div><!--/#accordion1-->
                </div>
            </div>
        </div><!--/.row--
        </div><!--/.container-->
        <div style="margin-bottom:28%;"></div>
    </div>
</section><!--/#middle-->
