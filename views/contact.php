<section id="contact-info">
    <div class="center">                
        <h2>كيف تصل الينا؟</h2>
    </div>

    <div class="gmap-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 map-content">
                    <ul class="row">
                        <li class="col-sm-6">
                            <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:400px;width:500px;"><div id="gmap_canvas"  style="height:500px;width:100%;"><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.webdesign-muenchen.me" id="get-map-data">ANTI Company</a></div></div><script type="text/javascript"> function init_map() {
                                    var myOptions = {zoom: 16, center: new google.maps.LatLng(31.05174169999999, 31.39774609999995), mapTypeId: google.maps.MapTypeId.ROADMAP};
                                    map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                                    marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(31.05174169999999, 31.39774609999995)});
                                    infowindow = new google.maps.InfoWindow({content: "<b>ANTI Company</b><br/>&#1575;&#1604;&#1601;&#1604;&#1603;&#1610;<br/> mansoura"});
                                    google.maps.event.addListener(marker, "click", function () {
                                        infowindow.open(map, marker);
                                    });
                                    infowindow.open(map, marker);
                                }
                                google.maps.event.addDomListener(window, 'load', init_map);</script>

                        </li> 
                        <li class="col-sm-3">
                            <address>
                                <h5>Head Office</h5>
                                <p>1537 Flint Street <br>
                                    Tumon, MP 96911</p>
                                <p>Phone:670-898-2847 <br>
                                    Email Address:info@domain.com</p>
                            </address>

                            <address>
                                <h5>Zonal Office</h5>
                                <p>1537 Flint Street <br>
                                    Tumon, MP 96911</p>                                
                                <p>Phone:670-898-2847 <br>
                                    Email Address:info@domain.com</p>
                            </address>
                        </li>


                        <li class="col-sm-3">
                            <address>
                                <h5>Zone#2 Office</h5>
                                <p>1537 Flint Street <br>
                                    Tumon, MP 96911</p>
                                <p>Phone:670-898-2847 <br>
                                    Email Address:info@domain.com</p>
                            </address>

                            <address>
                                <h5>Zone#3 Office</h5>
                                <p>1537 Flint Street <br>
                                    Tumon, MP 96911</p>
                                <p>Phone:670-898-2847 <br>
                                    Email Address:info@domain.com</p>
                            </address>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>  <!--/gmap_area -->

<section id="contact-page">
    <div class="container">
        <div class="center">        
            <h2>تــواصل معنــا..</h2>
        </div> 
        <div class="row contact-wrap"> 
            <div class="status alert alert-success" style="display: none"></div>
            <form id="contactform" action="?rt=HomePage/con_msg" onsubmit="return sendemail(oFormElement)"  method="post">
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="form-group">
                        <label>الاسم *</label>
                        <input type="text" id="name" name="name" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>الايميل *</label>
                        <input type="email" id="email" name="email" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>التليفون *</label>
                        <input type="number" id="phone" name="phone" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label> اسم الشركه</label>
                        <input type="text" id="company" name="company" class="form-control">
                    </div>                        
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>الموضوع *</label>
                        <input type="text" id="subject" name="subject" class="form-control" required="required">
                    </div>
                    <div class="form-group">
                        <label>الرساله *</label>
                        <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                    </div>                        
                    <div class="form-group">
                        <button type="submit" name="submit"  class="btn btn-primary btn-lg" required="required"> ارســل</button>
                        <div id="result">
                            <?php
                            if (isset($_GET['r'])) {
                                if ($_GET['r'] == 1) {
                                    echo '<h2 style="color:green">تم الارسال </h2>';
                                } else {
                                    echo '<h2 style="color:red">لم يتم الارسال</h2>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </form> 
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->
<script>



    function sendemail(oFormElement) {
        var xhr = new XMLHttpRequest();
        xhr.open(oFormElement.method, oFormElement.action, true);
        xhr.send(new FormData(oFormElement));
    }
</script>