

<div id="site_content">	
    <div id="content">
        <div class="content_item">
            <div class="form_settings">
                <h2>Add Student <a class="submit" href="index.php?rt=Student/list">Show All Student</a></h2>
                <h2></h2>

                <?php
                if (isset($msg)) {
                    if ($msg == 1) {
                        ?>
                        <div style="color: brown" ></h2>تمت الاضافه بنجاح</h2></div>
                        <?php
                    }
                }
                ?>
                <form method="post">
                    <p>&nbsp;</p>
                    <p><span style="font-size: x-large">Name</span><input class="contact" type="text" name="s_name" value="" /></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: x-large">Phone</span><input class="contact" type="text" name="s_phone" value="" /></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: x-large">Address</span><textarea class="contact textarea" rows="2" cols="15" name="s_address"></textarea></p>
                    <p>&nbsp;</p>
                    <p><span style="font-size: x-large"> Other details</span><textarea class="contact textarea" rows="3" cols="20" name="s_details"></textarea></p>
                    <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="ADD" /></p>
                </form>
            </div><!--close form_settings-->
        </div><!--close content_item-->
    </div><!--close content-->
</div>
