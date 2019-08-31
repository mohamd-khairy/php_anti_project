<section  class="contents">
    <div class="page">                    
        <div class="row">
            <form method="POST"  id="Formaddblog" enctype="multipart/form-data" onsubmit="return uploadimage(this)">
                <div id="result"></div>
                <br>

                <div class="input-group">
                    <input type="file"  name="blog_image" id="blog_image" class="input form-control" placeholder="أدخل اسم القسم..." style="direction: rtl">
                    <span class="input-group-addon">صوره الخبر</span>
                </div>
                <span class="blog_image help-block" id="image" style="text-align: center;display: none;color:#c52d2f">validate...</span>
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
                <button class="input btn btn-lg btn-primary btn-block"  type="button" onclick="validateadd();" 
                        >أضــــف</button>
            </form>
          <!--   <script src="//cdn.ckeditor.com/4.5.11/basic/ckeditor.js"></script>
            <script>
                    CKEDITOR.replace('editor1');
            </script> -->
            <script type="text/javascript">
                $(".input").bind('blur', function (event) {
                    var $this = $(this);

                    if ($this.val() == '') {
                        $('.' + $this.attr('id') + '').html("<h4 style='color:#c52d2f'>هذا الحقل مطلووب...</h4>");
                        $('.' + $this.attr('id') + '').show();
                    }
                    else {
                        $('.' + $this.attr('id') + '').hide();
                    }
                });

                function validateadd() {
                    $("input").each(function () {
                        var $this = $(this);
                        if ($this.val() == "") {
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
                    var hidden = ($("#image").is(":hidden") && $("#title").is(":hidden") && $("#content").is(":hidden"));
                    if (hidden) {
                        $("#Formaddblog").submit();
                    }
                    return false;
                }

                function uploadimage(oFormElement) {
                    var content=CKEDITOR.instances.editor1.getData();
                    var title=$("#blog_title").val();
                    $.ajax({
                        url: "?rt=AdminBlog/uploadimage",
                        type: "POST",
                        data: new FormData(oFormElement),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            $.post("?rt=AdminBlog/add",{blog_title:title,editor1:content,blog_image:data},function(result){
                               if (result == 'yes') {
                                 oFormElement.reset();
                               CKEDITOR.instances.editor1.setData( '', function() { this.updateElement(); } );
                                 $("#result").html("<h4 style='color:green; text-align:center;font-weight:bold'>");
                               }else{
                                $("#result").html("<h4 style='color:#c52d2f'>لم تتم الاضافه ...</h4>");

                               }
                             return false;
                            });
                        },
                        error: function () {
                        }
                    });
                         return false;
                }
//                function form_blog(oFormElement)
//                {
//
//
//
//
//                    var xhr = new XMLHttpRequest();
//                    xhr.open(oFormElement.method, "?rt=AdminBlog/add", true);
//                    xhr.send(new FormData(oFormElement));
//                    oFormElement.reset();
//                    return false;
//                }


                setTimeout(function () {
                    $('#result').fadeOut('fast');
                }, 3000);
            </script>

        </div>
    </div> 
</section><!--/#feature-->