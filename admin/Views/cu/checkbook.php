
<section id="feature">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2> مراجعه الحجز</h2>
            <div class="box-body" id="d1">
            </div> 
        </div>
        <?php
        if (isset($_GET['cus_id']) && isset($_GET['cor_id']) && intval($_GET['cus_id']) && intval($_GET['cor_id'])) {
            $dataa = BookModel::check_user_book($_GET['cus_id'], $_GET['cor_id']);
            if (!empty($dataa)) {
                $data = $dataa[0];
                $cor = CourseModel::getAllDatabyid($data['cor_id'])[0];
                $cus = CustomerModel::get_customer_by_id($_GET['cus_id'])[0];
            }
        } else {
            exit();
        }
        ?>
        <div style="margin-left:5%">
            <div class="row">
                <form method="POST" action="?rt=AdminCustomer/checkbook"  id="myFormgrade" onsubmit="return submitFormgrade(this);" >
                    <br>
                    <input type="hidden" name="cus_id" id="cus_id" value="<?= $data['cus_id'] ?>" />
                    <input type="hidden" name="cor_id" id="cor_id" value="<?= $data['cor_id'] ?>" />
                    <input type="hidden" name="book_id" id="book_id" value="<?= $data['book_id'] ?>" />
                    <input type="hidden" name="cus_address" id="cus_address" value="<?= $data['cus_address'] ?>" />
                    <input type="hidden" name="cus_birth_date" id="cus_birth_date" value="<?= $data['cus_birth_date'] ?>" />
                    <input type="hidden" name="cus_job" id="cus_job" value="<?= $data['cus_job'] ?>" />

                    <div class="input-group">
                        <span class="input-group-addon"><?= $cus['cus_name']; ?></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><?= $cor['cor_name'] ?></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><?= $cus['cus_mobile'] ?></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><?= $data['cus_address'] ?></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><?= $cus['cus_email'] ?></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><?= $cor['cor_start_date'] ?></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><?= $cor['cor_days'] ?></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><?= $cor['cor_cost'] ?></span>
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="number" name="book_pay" id="book_pay" value="<?= $data['book_pay'] ?>" class="input form-control"  style="direction: rtl">  
                        <span class="input-group-addon">المبلغ المدفوع</span>
                    </div>
                    <span class="book_pay help-block" id="pay" style="text-align: center;display: none;color:#c52d2f">validate..</span>
                    <br>
                    <div class="input-group">
                        <input type="number" name="book_last" id="book_last" value="<?= $data['book_last'] ?>" class="input form-control"  style="direction: rtl">  
                        <span class="input-group-addon">المبلغ المتبقي</span>
                    </div>
                    <span class="book_last help-block" id="last" style="text-align: center;display: none;color:#c52d2f">validate..</span>
                    <br>
                    <button class="input btn btn-lg btn-primary btn-block"  type="button" onclick="validate();" 
                            >تمت المراجعه</button>
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

                            var hidden = ($("#pay").is(":hidden") && $("#last").is(":hidden"));
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
                            window.location.href = '?rt=AdminCustomer/showbook&active=cu';
                            return false;
                        }
</script>
