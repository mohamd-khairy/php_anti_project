<section  class="contents">
    <div class="page">                    
        <div class="row">
            <br>
            <form>
                <?php $data = BlogModel::get_all_data_from_end('blog_id'); ?>
                <div class="input-group">

                    <select class="form-control" style="direction: rtl" id="news">
                        <?php foreach ($data as $blog) { ?>
                            <option value="<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></option>
                        <?php } ?>
                    </select>
                    <span class="input-group-addon">اختار الخبر</span>
                </div>
                <br>
                <a class="input btn btn-lg btn-primary btn-block"  href="#deletenews" type="button"  
                   >حـــذف</a>
            </form>
        </div>
    </div>
</section>

<script>
    function deleteallnews() {
        $.post("?rt=AdminBlog/deleteall", {blog_id: 1}, function (data) {
            if (data == 'yes') {
                mido("?rt=AdminBlog/show");
            }else{
                alert('error');
            }
        });
    }
    
    function deletenews() {
        var id = $("#news").val();
        $.post("?rt=AdminBlog/delete", {blog_id: id}, function (data) {
            if (data == 'yes') {
               mido("?rt=AdminBlog/delete");
             // window.location.href="?rt=AdminBlog/delete";
            }else{
                alert('error');
            }
        });
    }

</script>

<div id="deletenews" class="modalDialog" >
    <div style="width: 40%; margin-top: 20%">
        <a href="#" title="close" class="closee">X</a>
        <br>
        <button class="btn btn-lg  btn-block" type="text" >
            هل تريد حذف  الخبر ؟
        </button>
        <center>
            <a href="#" style="width: 45%;background-color:#53c653" class="btn btn-lg btn-primary ">لا</a>
            <a onclick="deletenews()" style="width: 45%" class="btn btn-lg btn-primary ">نعم</a>
        </center>
        <br>
    </div>
</div> 