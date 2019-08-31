<section id="feature">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>إضافه خريج جديد</h2>
            <div class="box-body" id="d1">
            </div> 
        </div>
        <div style="margin-left:5%">
            <div class="row">
                <form method="POST" action="?rt=AdminCustomer/addgrade"  id="myFormgrade" enctype="multipart/form-data" onsubmit="return submitFormgrade(this);" >
                    <br>
                    <div class="input-group">
                        <input type="text"  name="g_name" id="g_name" class="input form-control" placeholder="أدخل اسم الخريج..." style="direction: rtl">
                        <span class="input-group-addon">اسم الخريج</span>
                    </div>
                    <span class="g_name help-block" id="name" style="text-align: center;display: none;color:#c52d2f">validate...</span>
                    <br>
                    <div class="input-group">
                        <input type="file" name="g_image" id="g_image" class="input form-control"  style="direction: rtl">
                        <span class="input-group-addon">صوره الخريج</span>
                    </div>
                    <span class="g_image help-block" id="image" style="text-align: center;display: none;color:#c52d2f">validate..</span>
                    <br>
                    <div class="input-group">
                        <input type="text" name="g_job" id="g_job" class="input form-control" placeholder="ادخل وظيفه الخريج" style="direction: rtl">  
                        <span class="input-group-addon">الوظيفه</span>
                    </div>
                    <span class="g_job help-block" id="job" style="text-align: center;display: none;color:#c52d2f">validate..</span>
                    <br>
                    <div class="input-group">
                        <input type="text" name="g_job_place" id="g_job_place" class="input form-control" placeholder="ادخل مكان  الوظيفه " style="direction: rtl">  
                        <span class="input-group-addon">مكان الوظيفه</span>
                    </div>
                    <span class="g_job_place help-block" id="place" style="text-align: center;display: none;color:#c52d2f">validate..</span>
                    <br>
                    <button class="input btn btn-lg btn-primary btn-block"  type="button" onclick="validate();" 
                            >أضــــف</button>
                </form>
            </div>
        </div> 
    </div><!--/.container-->
    <div style="margin-bottom: 6%"></div>
</section><!--/#feature-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
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

                        function validate() {
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
                            
                            var hidden = ($("#place").is(":hidden") && $("#image").is(":hidden") && $("#name").is(":hidden") && $("#job").is(":hidden"));
                            if (hidden) {
                                $("#myFormgrade").submit();
                                return false;
                            }
                        }

                        function submitFormgrade(oFormElement)
                        {
                            var xhr = new XMLHttpRequest();
                            xhr.open(oFormElement.method, oFormElement.action, true);
                            xhr.send(new FormData(oFormElement));
                            oFormElement.reset();
                            return false;
                        }
</script>
