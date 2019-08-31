<section id="bottom">
    <div style="margin-top: 5%"></div>
    <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>الشركه</h3>
                    <ul>
                        <li><a href="?rt=HomePage/about">عن انتي </a></li>
                        <li><a  href="?rt=HomePage/contact">تواصل معنا </a></li>
                    </ul>
                </div>    
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>النشاطات</h3>
                    <ul>
                        <li><a href="?rt=Blog/show">المدونه</a></li>
                        <li><a href="index.php#recent-works">الدورات</a></li>

                    </ul>
                </div>    
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>فريق العمل</h3>
                    <ul>
                        <li><a href="?rt=HomePage/about">المدربين </a></li>
                        <li><a href="index.php#middle">الخريجين  </a></li>
                        <li><a href="index.php#shares">شركاؤنا</a></li>
                    </ul>
                </div>    
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h3>الاقسام</h3>
                    <ul>
                        <?php $cats=CategoryModel::get_all_data_from_end('cat_id');
                        $i=0;     
                        foreach($cats as $cat){
                        ++$i;
                        if($i > 2){ break;}
                        ?>
                        <li><a onclick="mido('?rt=Cat/show&id=<?=$cat['cat_id']?>');" href="#"><?=$cat['cat_name']?></a></li>

                        <?php } ?>


                    </ul>
                </div>    
            </div><!--/.col-md-3-->
        </div>
    </div>
</section><!--/#bottom-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates"> علم   </a> All Rights Reserved.
            </div>
            <div class="col-sm-6">
                <ul class="pull-right">
                    <li><a href="index.php">الصفحه الرئيسيه</a></li>
                    <li><a href="?rt=HomePage/service_">شروط الخدمه </a></li>
                    <li><a href="?rt=HomePage/private_"> سياسه الخصوصيه </a></li>
                    <li><a href="?rt=HomePage/about">عن عـلم </a></li>
                    <li><a href="?rt=HomePage/contact">تواصل معنا  </a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/main.js"></script>
<script src="js/wow.min.js"></script>
</body>
</html>