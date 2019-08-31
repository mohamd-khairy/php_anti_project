<section  class="contents">
    <div class="page">                    
        <div class="row">
            <form method="POST"  id="Formedit" enctype="multipart/form-data">
                <br>
                <div class="input-group" >
                    <?php $data = OnlineModel::get_all_data_from_end('online_id'); ?>
                    <select class="input form-control" name="online_id" id="online_id" style="direction: rtl">
                        <?php foreach ($data as $value) { ?>
                            <option  value="<?= $value['online_id'] ?>"><?= $value['online_name'] ?></option>
                        <?php } ?>
                    </select>
                    <span class="input-group-addon">الكورس</span>
                </div>
                <br>
                <button class="input btn btn-lg btn-primary btn-block"  type="button" onclick="edit();" 
                        >تعديــل</button>
            </form>
        </div>
    </div> 
</section><!--/#feature-->



<script type="text/javascript">
    function edit() {
        var online_id = $("#online_id").val();
        mido("?rt=Adminonline/doedit&id="+online_id);
    }

</script>
