<center>
    <?php
    if (isset($_GET['r'])) {
        if ($_GET['r'] == '1') {
            ?>
            <div class="box-body">
                <div class="alert alert-success h5" style="font-weight: bold" role="alert">تمت الارسال بنجاح...</div>
            </div>

        <?php } else { ?>
            <div class="box-body">
                <div class="alert alert-danger h4" style="font-weight: bold" role="alert"><strong>خطأ!</strong>..لم يتم الارسال.. </div>
            </div>
            <?php
        }
    }
    ?>
</center>

<section id="middle" style="margin-top: -5%;" >
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="mido">
                <div class="box box-primary">

                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <div class="btn-group" >
                                <ul class="pagination pagination-sm inline">
                                    <li><a  onclick="exportdata();"  title="حدد البيانات المراد اخراجها"  href="#">أخرج بيانات الي ملف اكسل</a></li>
                                </ul>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" onclick="send_contact_id();" class="btn btn-danger btn-sm"> ارسل ايمبل للمحددين </button>
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <thead style="text-align: center;font-weight: bold">
                                    <tr>
                                        <td class="label-danger">تعديل</td>
                                        <td class="label-danger">الحاله</td>
                                        <td class="label-danger">المبلغ المتبقي </td>
                                        <td class="label-danger">المبلغ المدفوع </td>
                                        <td class="label-danger"><b>الوظيفه</b></td>
                                        <td class="label-danger">الكورس</td>
                                        <td class="label-danger">الاسم</td>
                                        <td class="label-danger">#</td>
                                        <td class="label-danger">
                                            <p><label><input type="checkbox"  id="checkAll"/>الكل</label></p>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <?php
                                    $i = 1;
                                    $data = BookModel::get_all_data_from_end('book_id');
                                    foreach ($data as $bo) {
                                        $cor = CourseModel::getAllDatabyid($bo['cor_id']);
                                        $cus = CustomerModel::get_customer_by_id($bo['cus_id']);
                                        if (!empty($cor)) {
                                            $course = $cor[0];
                                        } else {
                                            $course = [];
                                        }
                                        if (!empty($cus)) {
                                            $customer = $cus[0];
                                        } else {
                                            $customer = [];
                                        }
                                        ?>
                                        <tr  > 
                                            <td>
                                                <div class="btn-group">
                                                    <a  onclick="mido('?rt=AdminCustomer/checkbook&cus_id=<?=$bo['cus_id']?>&cor_id=<?=$bo['cor_id']?>')" href="#" type="button"  class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </td>
                                            <td onclick="mido('?rt=AdminCustomer/Aprofile&id=<?= $bo['cus_id'] ?>')" class="mailbox-controls"><?php
                                                if ($bo['active'] == 0) {
                                                    echo 'لم تتم المراجعه';
                                                } else {
                                                    echo 'تمت المراجعه';
                                                }
                                                ?></td>
                                            <td onclick="mido('?rt=AdminCustomer/Aprofile&id=<?= $bo['cus_id'] ?>')" class="mailbox-name"><?= $bo['book_last'] ?></td>
                                            <td onclick="mido('?rt=AdminCustomer/Aprofile&id=<?= $bo['cus_id'] ?>')" class="mailbox-name"><?= $bo['book_pay'] ?></td>
                                            <td onclick="mido('?rt=AdminCustomer/Aprofile&id=<?= $bo['cus_id'] ?>')" class="mailbox-subject"><?= $bo['cus_job'] ?></td>
                                            <td onclick="mido('?rt=AdminCustomer/Aprofile&id=<?= $bo['cus_id'] ?>')" class="mailbox-subject"><b><?= $course['cor_name'] ?></td>
                                            <td onclick="mido('?rt=AdminCustomer/Aprofile&id=<?= $bo['cus_id'] ?>')" class="mailbox-subject"><?= $customer['cus_name'] ?></td>
                                            <td onclick="mido('?rt=AdminCustomer/Aprofile&id=<?= $bo['cus_id'] ?>')" class="mailbox-controls"><?= $i++ ?></td>
                                            <td  class="mailbox-controls"><input type="checkbox" value="<?= $bo['cus_id'] ?>"  onclick="insert(<?= $bo['cus_id'] ?>);" id="checkbox" /></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <script  type="text/javascript">
//                                function check(id){
//                                    alert(id);
//                                    $.post("?rt=AdminCustomer/checkbook",{cus_id:id},function(res){
//                                        alert(res);
//                                    });
//                                }
                                
                                ar = [];
                                window.localStorage.setItem("cus_id", JSON.stringify(ar));
                                var ar = new Array();

                                function exportdata() {
                                    var cart = JSON.parse(localStorage.getItem('cus_id'));
                                    $.post("?rt=AdminCustomer/export", {customer_id: cart}, function (data) {
                                        if (data != 'no') {
                                            // $("#download_file").show();
                                            var cart = JSON.parse(localStorage.getItem('cus_id'));
                                            if (cart.length != 0) {
//                                                alert(cart.length);
                                                window.location.href = "?rt=AdminCustomer/showbook#download_file";
                                                return false;
                                            } else {
                                                alert("اختر العملاء اولا ");
                                            }
                                        }
                                    });
                                }

                                $("#checkAll").change(function () {
                                    $("input:checkbox").prop('checked', $(this).prop("checked"));
                                    if ($("#checkAll").prop('checked') != true) {
                                        ar = [];
                                        window.localStorage.setItem("cus_id", JSON.stringify(ar));
                                    } else {
                                        $("input:checkbox").each(function () {
                                            var input = $(this).val(); // This is the jquery object of the input, do what you will
                                            if (input != "on") {
                                                if (include(ar, input) !== true) {
                                                    ar[ar.length] = input;
                                                    window.localStorage.setItem("cus_id", JSON.stringify(ar));
                                                }
                                            }
                                        });
                                    }
                                });
                                function include(ar, obj) {
                                    for (var i = 0; i < ar.length; i++) {
                                        if (ar[i] == obj)
                                            return true;
                                    }
                                }
                                function insert(val) {
                                    if (include(ar, val)) {
                                        ar = ar.filter(item => item != val);
                                        window.localStorage.setItem("cus_id", JSON.stringify(ar));
                                    } else {
                                        ar[ar.length] = val;
                                        window.localStorage.setItem("cus_id", JSON.stringify(ar));
                                    }
                                }

                                function send_contact_id() {
                                    window.localStorage.setItem("cus_id", JSON.stringify(ar));
                                    if (ar.length <= 0) {
                                        alert("اختار العميل المراد ارسال ايميل له !");
                                    } else {
                                        $("#cus_id").val(ar);
                                        window.location.href = "?rt=AdminCustomer/showbook#sendemail";
                                    }
                                }

                                function send_email() {
                                    window.localStorage.setItem("cus_id", JSON.stringify(ar));
                                    if (ar.length <= 0) {
                                        alert("اختار العميل المراد ارسال ايميل له !");
                                    } else {
                                        //alert(0);
                                        //  $("#formemail").submit();
                                    }
                                }
                                function send_data(oFormElement) {
                                    alert(0);
                                    var xhr = new XMLHttpRequest();
                                    xhr.open(oFormElement.method, oFormElement.action, true);
                                    xhr.send(new FormData(oFormElement));
                                    oFormElement.reset();
                                    return false;
                                }


                                function aa(a) {
                                    var xmlhttp = new XMLHttpRequest();
                                    var id = a;
                                    xmlhttp.open("GET", "?rt=Contact/delete&contact_id=" + id, false);
                                    xmlhttp.send(null);
                                    document.getElementById('d1').innerHTML = xmlhttp.responseText;
                                    var btn = event.target;
                                    $(btn).closest("tr").remove();
                                }

                            </script>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>

                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
            <div style="margin-top: 40%"></div>
        </div>
        <!-- /.row -->
    </div>
</section>


<div id="download_file" class="modalDialog" >
    <div style="width: 70%; height: 30%">
        <a href="#" title="close" class="closee">X</a>
        <br>
        <button class="btn btn-lg  btn-block" type="text" >
            حمل الملف من هنا 
        </button>
        <center>
            <?php
            $file = "../exp/customer_data.csv";
            echo '<center><a  class="btn  btn-success btn-lg" href="' . $file . '">Download</a></center>';
            ?>
        </center>
    </div>
</div> 

<div id="sendemail" class="modalDialog" >
    <div >
        <a href="#" title="close" class="closee">X</a>
        <br>

        <form action="?rt=AdminCustomer/email" method="post" enctype="multipart/form-data"  id="formemail" onsubmit="return send_data(oFormElement)" >
            <div class="box-body">
                <div class="form-group">
                    <textarea class="form-control" id="content" name="cus_content" type="text"  placeholder="ادخل محتوي الايميل ..."></textarea>
                </div>
            </div>
            <!-- /.box-body -->
            <center>
                <div class="box-footer">                        
                    <div>
                        <input type="hidden" name="cus_id" id="cus_id">
                        <button type="submit" class="btn btn-primary" onclick="send_email()"><i class="fa fa-envelope-o"  ></i> ارسل</button>
                    </div>
                </div>
            </center>
        </form>
    </div>
</div> 