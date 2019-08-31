<?php
if (!isset($_GET['id'])) {

    echo '<center><h1>some thing error !! </h1></center>';
    die();
} else if (!intval($_GET['id'])) {
        echo '<center><h1>some thing error !! </h1></center>';
        die();
    
}
?>
<section id="services" class="service-item">
    <div class="container">
        <div class="row">
            <?php
            $data = CourseModel::getAllDataby_cat_id($_GET['id']);
            foreach ($data as $value) {
                ?>
                <div class="col-sm-3 col-md-3" >
                    <div class="media services-wrap wow fadeInDown" style="height:320px">
                        <a href="#" onclick="mido('?rt=AdminCourse/showone&cor_id=<?= $value['cor_id'] ?>');">

                            <div >
                                <img class="img-responsive"  style="width:700px;height:100px;"  src="<?= HostName . DS . 'img' . DS . $value['cor_image'] ?>" style="margin-left:-5% ">
                            </div>
                            <div class="media-body">
                                <center> <h3 class="media-heading" style="font-weight: bold;color: black"><?= $value['cor_name'] ?></h3></center>
                                <center>Instructor:</center>
                                        <?php $insts = Cor_instModel::get_inst_by_cor_id($value['cor_id']); ?>
                                <h4><center><?php
                                        $in = "";
                                        foreach ($insts as $inst) {
                                            $in.=$inst['inst_name'] . ",";
                                        } $i = substr($in, 0, -1);
                                        echo $i;
                                        ?> </center></h4>
                            </div>
                        </a>  
                        <div class="media-body">
                            <h4> <center><?= $value['cor_cost'] ?>$</center></h4>
                        </div>

                    </div>
                </div>
<?php } ?>

        </div><!--/.row-->
    </div><!--/.container-->
    <div style="margin-bottom: 19%"></div>

</section>
<script type="text/javascript">
    var arr = new Array();
    function m(i) {
        arr[arr.length] = i;
    }
    function deletecourse() {
        $.post("?rt=AdminCourse/delete", {cor_id: arr[0]}, function (d) {
            if (d == 1) {
                mido("?rt=AdminCourse/all");
                return false;
            }
            arr = [];
        });

    }
</script>

