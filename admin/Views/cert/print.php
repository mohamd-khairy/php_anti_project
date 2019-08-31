 
<section id="feature">
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>إضف بيانات الشهاده</h2>
                <div style="position:relative;float:center;">
                <center>

 <form method="POST" action="?rt=Certificate/exel" id="formfile"  enctype="multipart/form-data" onsubmit="return submitmyFormexel(this);" >
                
        <div class="input-group">
        
            <input  id="exel_file" name="exel_file" class="exel btn btn-lg btn-default" type="file" style="width: 250px" />  <input class="input btn btn-lg btn-primary " value="اضف ملف اكسل " onclick="check();" type="button" />           
            </div>
      </form>
   </center>
 </div>


            <script type="text/javascript">

    function submitmyFormexel(oFormElementss)
{
   var xhr = new XMLHttpRequest();
   xhr.open (oFormElemenss.method, oFormElementss.action, true);
   xhr.send (new FormData (oFormElementss));
   oFormElementss.reset();
   //return false;
}

           function check() {
            $file=$(".exel").val();
            if($file == ""){
                      alert("اختر ملف -_- !");
                 }else{
                  var res = $file.split(".")[1];
                  if(res == "xls" || res == 'csv'){
                    formfile.submit();
                }else{
                  alert("ادخر ملف اكسل بصيغه .xls او .csv ");
                }
              }
            }
            </script>
       <br>
                 <div style="margin-left:5%">
                   <div class="row">
                      <form>
                          <div class="input-group">
                        <input type="text" name="cu_name" id="cu_name" class="form-control" placeholder="أدخل اسم الكورس..." style="direction: rtl">
                                           <span class="input-group-addon">اسم العميل</span>
                    </div>
                    <br>
                      <div class="input-group">
                        <input type="text" name="course_name" id="course_name" class="form-control" placeholder="اسم الكورس" style="direction: rtl">
                                           <span class="input-group-addon">اسم الكورس</span>
                    </div>
                    <br>

                       <div class="input-group">
                       <input type="text" name="cert_inst"  id="cert_inst" class="form-control" placeholder="المدربين" style="direction: rtl">  
                                               <span class="input-group-addon">المدربين</span>
                    </div>
                    <br>
                    <div class="input-group">
                     <input type="number" name="cert_code" id="cert_code" class="form-control" placeholder="" style="direction: rtl">
                                             <span class="input-group-addon">كود الشهاده</span>
                   </div>
               
                     <br>
                      <div class="input-group">
                  <input type="date" name="cert_date" id="cert_date" class="form-control" placeholder="" style="direction: rtl">    
                   <span class="input-group-addon">تاريخ الشهاده</span>
                     </div>

                     <br>
                       <div class="input-group">
                  <input type="number" name="cert_duration" id="cert_duration" class="form-control" placeholder="" style="direction: rtl">    
                   <span class="input-group-addon">مده الكورس</span>
                     </div>

                     <br>               
                  
                 <input  value="طباعه" class="btn btn-lg btn-primary btn-block" onclick="popitup('active_print.php');" type="button" />
                     </form>
                </div>
            </div> 
        </div><!--/.container-->
    </section><!--/#feature-->
    <div id="r"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script language="javascript" type="text/javascript">
function popitup(url) {
  var arr = new Array();
  var url="active_print.php";
  var learner_name=$("#cu_name").val();
  var course_name=$("#course_name").val();
  var cert_inst=$("#cert_inst").val();
  var cert_code=$("#cert_code").val();
  var cert_duration=$("#cert_duration").val();
  var cert_date=$("#cert_date").val();
  arr[0]=learner_name;
  arr[1]=course_name;
  arr[2]=cert_inst;
  arr[3]=cert_code;
  arr[4]=cert_duration;
  arr[5]=cert_date;
  window.localStorage.setItem("data", JSON.stringify(arr));
    newwindow=window.open(url,'Anti','height=700,width=750');
    if (window.focus) {newwindow.focus()}
    return false;
}

// -->
</script>


