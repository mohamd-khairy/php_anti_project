
<?php 
if(isset($_GET['rt']) && (explode('/',$_GET['rt'])[0] == "Category") ){ ?>

<style type="text/css">
    .contents{float: left;width: 73%;margin-left: 3%; display: block;}
    .page{float: center;padding: 10px;width: 90%;margin:-20px 30px;}
    aside{ width: 20%; float: right; display: block; height:100%; min-height: 434px;margin-right: 20px ;margin-top:50px ;}
    aside a {display: block; margin: 5px;padding: 5px; text-align: right;font-weight: bold;}
    a:hover, a:visited, a:link, a:active{ text-decoration: none;}
    .btn-danger{border-radius: 5px;padding: 9px 15px;}
    .clear{width: 100%;height: 50px; clear: both;}
</style>
<aside >
    <a class="btn-danger" onclick="mido('?rt=Category/add')"    href="#">أضف قســم جديد</a>
    <a class="btn-danger" onclick="mido('?rt=Category/edit')"   href="#">تعديل قســـم</a>
    <a class="btn-danger" onclick="mido('?rt=Category/showall')" href="#">كــل الاقســـام</a>
    <a class="btn-danger"  href="#deleteall">حـذف كل الاقســـام</a>

</aside>

<div id="deleteall" class="modalDialog" >
    <div style="width: 40%; margin-top: 20%">
        <a href="#close" title="close" class="closee">X</a>
        <br>
        <button class="btn btn-lg  btn-block" type="text" >
            هل تريد حذف كل الاقسام ؟
        </button>
        <center>
            <a href="#" style="width: 45%;background-color:#53c653" class="btn btn-lg btn-primary ">لا</a>
            <a onclick="deleteallcat()" style="width: 45%" class="btn btn-lg btn-primary ">نعم</a>
        </center>
        <br>
    </div>
</div> 
<?php }else if(isset($_GET['rt']) && (explode('/',$_GET['rt'])[0] == "Adminonline")){ ?>

<style type="text/css">
    .contents{float: left;width: 73%;margin-left: 3%; display: block;}
    .page{float: center;padding: 10px;width: 90%;margin:-20px 30px;}
    aside{ width: 20%; float: right; display: block; height:100%; min-height: 434px;margin-right: 20px ;margin-top:50px ;}
    aside a {display: block; margin: 5px;padding: 5px; text-align: right;font-weight: bold;}
    a:hover, a:visited, a:link, a:active{ text-decoration: none;}
    .btn-danger{border-radius: 5px;padding: 9px 15px;}
    .clear{width: 100%;height: 50px; clear: both;}
</style>
<aside >
    <a class="btn-danger" onclick="mido('?rt=Adminonline/add')"     href="#">أضف كورس جديد</a>
    <a class="btn-danger" onclick="mido('?rt=Adminonline/addvideo')"     href="#">أضف فيديو للكورس</a>
    <a class="btn-danger" onclick="mido('?rt=Adminonline/edit')"    href="#">تعديل كورس</a>
    <a class="btn-danger" onclick="mido('?rt=Adminonline/showall')" href="#">كــل الكورسات</a>
    <a class="btn-danger"  href="#deleteallcor">حـذف كل الكورسات</a>

</aside>

<div id="deleteallcor" class="modalDialog" >
    <div style="width: 40%; margin-top: 20%">
        <a href="#" title="close" class="closee">X</a>
        <br>
        <button class="btn btn-lg  btn-block" type="text" >
            هل تريد حذف كل الكورسات ؟
        </button>
        <center>
            <a href="#" style="width: 45%;background-color:#53c653" class="btn btn-lg btn-primary ">لا</a>
            <a onclick="deleteallcor()" style="width: 45%" class="btn btn-lg btn-primary ">نعم</a>
        </center>
        <br>
    </div>
</div> 
<?php }else if(isset($_GET['rt']) && (explode('/',$_GET['rt'])[0] == "AdminBlog")){ ?>
<style type="text/css">
    .contents{float: left;width: 73%;margin-left: 3%; display: block;}
    .page{float: center;padding: 10px;width: 90%;margin:-20px 30px;}
    aside{ width: 20%; float: right; display: block; height:100%; min-height: 434px;margin-right: 20px ;margin-top:50px ;}
    aside a {display: block; margin: 5px;padding: 5px; text-align: right;font-weight: bold;}
    a:hover, a:visited, a:link, a:active{ text-decoration: none;}
    .btn-danger{border-radius: 5px;padding: 9px 15px;}
    .clear{width: 100%;height: 50px; clear: both;}
</style>
<aside >
    <a class="btn-danger" onclick="mido('?rt=AdminBlog/add')"     href="#">أضف خبر جديد</a>
    <a class="btn-danger" onclick="mido('?rt=AdminBlog/edit')"    href="#">تعديل خبر</a>
    <a class="btn-danger" onclick="mido('?rt=AdminBlog/delete')" href="#"> حذف خبر</a>
    <a class="btn-danger"  href="#deleteallnews">حـذف كل الاخبار</a>

</aside>

<div id="deleteallnews" class="modalDialog" >
    <div style="width: 40%; margin-top: 20%">
        <a href="#" title="close" class="closee">X</a>
        <br>
        <button class="btn btn-lg  btn-block" type="text" >
            هل تريد حذف كل الاخبار ؟
        </button>
        <center>
            <a href="#" style="width: 45%;background-color:#53c653" class="btn btn-lg btn-primary ">لا</a>
            <a onclick="deleteallnews()" style="width: 45%" class="btn btn-lg btn-primary ">نعم</a>
        </center>
        <br>
    </div>
</div> 
<?php } ?>