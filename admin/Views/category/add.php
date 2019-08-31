<section  class="contents">
    <div class="page">                    
        <div class="row">
            <form method="POST"  id="Formadd" enctype="multipart/form-data">
                <div id="result"></div>
                <br>
                <div class="input-group" >
                    <select class="input form-control" name="cat_type" id="cat_type" style="direction: rtl">
                        <option  value="out">أون لاين</option>
                        <option  value="in">داخل الشركه</option>
                    </select>
                    <span class="input-group-addon">نوع القسـم</span>
                </div>
                <br>
                <div class="input-group">
                    <input type="text"  name="cat_name" id="cat_name" class="input form-control" placeholder="أدخل اسم القسم..." style="direction: rtl">
                    <span class="input-group-addon">اسم القسم</span>
                </div>
                <span class="cat_name help-block" id="name" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                <br>

                <button class="input btn btn-lg btn-primary btn-block"  type="button" onclick="validateadd();" 
                        >أضــــف</button>
            </form>

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
                    var hidden = ($("#name").is(":hidden"));
                    if (hidden) {
                        var cat_name = $("#cat_name").val();
                        var cat_type = $("#cat_type").val();
                        $.post("?rt=Category/add", {cat_name: cat_name, cat_type: cat_type}, function (r) {
                            if (r[0] == 1) {
                                $("#result").html("<h4 style='color:green; text-align:center;font-weight:bold'>تم اضافه القسم بنجاح</h4>");
                                $("#result").show();
                                $("#Formadd").trigger("reset");
                            } else {
                                $("#result").html("<h4 style='color:#c52d2f; text-align:center;font-weight:bold'>لم تتم الاضافه</h4>");
                                $("#result").show();
                            }
                        });
                        setTimeout(function () {
                            $('#result').fadeOut('fast');
                        }, 3000);
                        return false;
                    }
                }


            </script>
        </div>
    </div> 
</section><!--/#feature-->