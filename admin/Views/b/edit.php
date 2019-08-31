<section  class="contents">
    <div class="page">                    
        <div class="row">
            <br>
            <?php $data = BlogModel::get_all_data_from_end('blog_id'); ?>
            <div class="input-group">

                <select class="form-control" style="direction: rtl" id="news" onmouseout="news()">
                    <?php foreach ($data as $blog) { ?>
                        <option value="<?= $blog['blog_id'] ?>"><?= $blog['blog_title'] ?></option>
                    <?php } ?>
                </select>
                <span class="input-group-addon">اختار الخبر</span>
            </div>
            <br>

            <script>
                function news() {
                    var id = $("#news").val();
                    $.post('?rt=AdminBlog/getnews', {blog_id: id}, function (data) {
                        var values = data.split(",");
                        $("#id").val(values[0]); //id
                        $("#blog_title").val(values[1]);//title
                        $("#current_img").attr('src', 'http://localhost/anti/img/' + values[2]);
                        $("#current_img_name").val(values[2]);//image
                        CKEDITOR.instances.editor1.setData(values[3]);//content
                        $("#edit").show();
                    });
                }
            </script>

            <form method="POST"  id="Formaddblog" enctype="multipart/form-data" onsubmit="return uploadimage(this)">
                <br>
                <div style="display: none" id="edit">
                    <input type="hidden" name="blog_id" id="id" >

                    <div class="pull-left" style="margin-top: -3%" id="image"> 
                        <input type="hidden" id="current_img_name" >
                        <img id="current_img"  src="" style="width: 100px;height: 100px"></div>
                    <div class="input-group">
                        <span class="input-group-addon">الصوره الحاليه </span>
                        <input type="file"  name="blog_image" id="blog_image" class="input form-control" placeholder="أدخل اسم القسم..." style="direction: rtl">
                        <span class="input-group-addon">صوره الخبر</span>
                    </div>
                    <br>

                    <div class="input-group">
                        <input type="text"  name="blog_title" id="blog_title" class="input form-control" placeholder="أدخل اسم القسم..." style="direction: rtl">
                        <span class="input-group-addon"> عنوان الخبر</span>
                    </div>
                    <span class="blog_title help-block" id="title" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div class="input-group">
                        <textarea name="editor1" style="direction: rtl" id="editor1" class="input form-control"   placeholder="أدخل اسم القسم..."></textarea>
                        <span class="input-group-addon"> محتوي الخبر</span>
                    </div>
                    <span class="editor1 help-block" id="content" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>

                    <div id="result"></div>
                    <button class="input btn btn-lg btn-primary btn-block"  type="button" onclick="validateedit();" 
                            >تعديل</button>
                </div>
            </form>
            <script src="//cdn.ckeditor.com/4.5.11/basic/ckeditor.js"></script>
            <script>
                        CKEDITOR.replace('editor1');
            </script>
            <script type="text/javascript">
                $(".input").bind('blur', function (event) {
                    var $this = $(this);
                    if ($this.val() == '' && $this.attr('id') != "blog_image") {
                        $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                        $('.' + $this.attr('id') + '').show();
                    }
                    else {
                        $('.' + $this.attr('id') + '').hide();
                    }
                });

                function validateedit() {
                    $("input").each(function () {
                        var $this = $(this);
                        if ($this.val() == '' && $this.attr('id') != "blog_image") {
                            $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                            $('.' + $this.attr('id') + '').show();
                        }
                        else {
                            $('.' + $this.attr('id') + '').hide();
                        }
                    });
                    if (CKEDITOR.instances.editor1.getData() == "") {
                        $('.editor1').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                        $('.editor1').show();
//                        alert(CKEDITOR.instances.editor1.getData());
                    } else {
                        $('.editor1').hide();

                    }
                    var hidden = ($("#title").is(":hidden") && $("#content").is(":hidden"));
                    if (hidden) {
                        $("#Formaddblog").submit();
                    }
                    return false;
                }

                function uploadimage(oFormElement) {
                    var content = CKEDITOR.instances.editor1.getData();
                    var title = $("#blog_title").val();
                    var blog_id = $("#id").val();
                    var img = $("#current_img_name").val();
                    if ($("#blog_image").val() == "") {
                        $.post("?rt=AdminBlog/edit", {blog_id: blog_id, blog_title: title, blog_image: img, editor1: content}, function (result) {
                            if (result == 'yes') {
                                mido("?rt=AdminBlog/edit");
                            } else {
                                $("#result").html("<h4 style='color:#c52d2f'>لم تتم الاضافه ...</h4>");
                                $("#result").show();
                            }
                        });
                    } else {
                        $.ajax({
                            url: "?rt=AdminBlog/uploadimage",
                            type: "POST",
                            data: new FormData(oFormElement),
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function (data) {
                                $.post("?rt=AdminBlog/edit", {blog_id: blog_id, blog_title: title, editor1: content, blog_image: data}, function (result) {
                                    if (result == 'yes') {
                                        mido("?rt=AdminBlog/edit");
                                    } else {
                                        $("#result").html("<h4 style='color:#c52d2f'>لم تتم الاضافه ...</h4>");
                                        $("#result").show();
                                    }
                                    return false;
                                });
                            },
                            error: function () {
                            }
                        });
                    }
                    return false;
                }
//                setTimeout(function () {
//                    $('#result').fadeOut('fast');
//                }, 3000);
            </script>

        </div>
    </div> 
</section><!--/#feature-->