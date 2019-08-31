<?php
if (!isset($_GET['id'])) {

    echo '<center><h1>some thing error !! </h1></center>';
    die();
} else if (!intval($_GET['id'])) {
        echo '<center><h1>some thing error !! </h1></center>';
        die();
    
}
?>
<section  class="service-item">
    <div class="container">
        <div class="row">
            <?php
            $data = OnlineModel::getAllDataby_cat_id($_GET['id']);
            foreach ($data as $on) {
                    ?>
                    <div class="col-sm-2 col-md-3"  >
                        <div class="media services-wrap wow fadeInDown" style="height:300px; background-color: #c52d2f"> 
                            <a href="#deletecor"  onclick="del(<?= $on['online_id'] ?>)" class="closee">X</a>

                            <a href="#" onclick="mido('?rt=Adminonline/online_showone&id=<?= $on['online_id'] ?>')">
                                <div >
                                    <img class="img-responsive"  style="width:200px;height:150px;"  src="<?= HostName . DS . 'img' . DS . $on['online_image'] ?>" style="margin-left:-5% ">
                                </div>
                                <div class="media-body">
                                    <center><h3 class="media-heading" style="font-weight: bold;color: black"><?= $on['online_name'] ?></h3>
                                    </center>
                                </div>                        
                                <div class="media-body">
                                    <?php
                                    if ($on['online_cost'] != 0) {
                                        $cost = $on['online_cost'] . " $";
                                    } else {
                                        $cost = 'free';
                                    }
                                    ?>
                                    <h4 class="pull-left"> <?= $cost ?></h4>
                                     <?php $count= Online_corModel::getAllDatabyid($on['online_id']); ?>
                                    <h4 class="pull-right"> <center><?=  count($count)?> Video</center></h4>
                                </div>
                            </a>
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
