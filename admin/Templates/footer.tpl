<?php 
if(isset($_SESSION['manager_id'])){ ?>
    <div class="clear"></div>

 <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Anti</a>. All Rights Reserved.
                </div>
               <!--  <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="?rt=HomePage/about">About Us</a></li>
                        <li><a href="?rt=HomePage/contact">Contact Us</a></li>
                    </ul>
                </div> -->
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
<?php }else{
    
} ?>