<style>
    .closee {
        background: #606061;
        color: #FFFFFF;
        line-height: 25px;
        position: absolute;
        right:5px;// -12px;
        text-align: center;
        top:5px;// -10px;
        width: 24px;
        text-decoration: none;
        font-weight: bold;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px;
        -moz-box-shadow: 1px 1px 3px #000;
        -webkit-box-shadow: 1px 1px 3px #000;
        box-shadow: 1px 1px 3px #000;
    }
</style>

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
                <a href="#" onclick="mido('?rt=Course/show&cor_id=<?= $value['cor_id'] ?>');">

                    <div class="col-sm-3 col-md-3" >
                        <div class="media services-wrap wow fadeInDown" style="height:320px">

                            <div >
                                <img class="img-responsive"  style="width:700px;height:120px;"  src="<?= HostName . DS . 'img' . DS . $value['cor_image'] ?>" style="margin-left:-5% ">
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
                            <div class="media-body">
                                <h4> <center><?= $value['cor_cost'] ?>$</center></h4>
                            </div>
                        </div>
                    </div>  
                </a>  
            <?php } ?>

        </div><!--/.row-->
    </div><!--/.container-->
    <div style="margin-bottom: 28%"></div>

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

<div id="delete" class="modalDialog" >
    <div style="width: 40%; margin-top: 20%">
        <a href="#close" title="close" class="closee">X</a>
        <br>
        <button class="btn btn-lg  btn-block" type="text" >
            هل تريد حذف الكورس ؟
        </button>
        <center>
            <a href="#" style="width: 45%;background-color:#53c653" class="btn btn-lg btn-primary ">لا</a>
            <a onclick="deletecourse()" style="width: 45%" class="btn btn-lg btn-primary ">نعم</a>
        </center>
        <br>
    </div>
</div> 
