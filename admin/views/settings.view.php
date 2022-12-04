<?php require '../controller/sidebar.php'; ?>  

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">

        
        <!--Main Content-->

        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4>Settings</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">
                          
                            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="formSettings">

                                <div class="form-row">

                                    <div class="form-group col-md-12">

                                        <h6 class="block-bw-heading bold-form-heading" style="margin-top: 0; padding-top: 5px">General</h6>

                                        <label>Site Name</label>
                                        <input class="form-control" value="<?php echo $settings['st_sitename']; ?>" name="st_sitename" type="text">

                                        <label>Description</label>
                                        <textarea class="mceNoEditor form-control" rows="5" name="st_description" style="padding: 15px"><?php echo $settings['st_description']; ?></textarea>

                                        <label>Keywords</label>
                                        <input class="form-control" data-role="tagsinput" value="<?php echo $settings['st_keywords']; ?>" name="st_keywords" type="text">

                                        <h6 class="block-bw-heading bold-form-heading" style="margin-top: 20px; padding-top: 5px">Social Links</h6>

                                        <label>Facebook</label>
                                        <input class="form-control" value="<?php echo $settings['st_facebook']; ?>" name="st_facebook" type="text">

                                        <label>Twitter</label>
                                        <input class="form-control" value="<?php echo $settings['st_twitter']; ?>" name="st_twitter" type="text">

                                        <label>Instagram</label>
                                        <input class="form-control" value="<?php echo $settings['st_instagram']; ?>" name="st_instagram" type="text">

                                        <label>YouTube</label>
                                        <input class="form-control" value="<?php echo $settings['st_youtube']; ?>" name="st_youtube" type="text">

                                    </div>

                                </div>
                                <hr>
                                <button class="btn btn-primary" type="submit" name="save">Save</button>
                                <div id="saved"><i class="fa fa-check"></i> Options Saved</div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
