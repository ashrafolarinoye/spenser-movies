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
                            <h4>SMTP Settings</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">
                          
                            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="formSmtp">

                                <div class="form-row">

                                    <div class="form-group col-md-12">

                                        <label>Host</label>
                                        <input class="form-control" value="<?php echo $smtp['st_smtphost']; ?>" name="st_smtphost" type="text">

                                        <label>Email</label>
                                        <input class="form-control" value="<?php echo $smtp['st_smtpemail']; ?>" name="st_smtpemail" type="text">

                                        <label>Password</label>
                                        <input class="form-control" value="<?php echo $smtp['st_smtppassword']; ?>" name="st_smtppassword" type="text">

                                        <label>Port</label>
                                        <input class="form-control" value="<?php echo $smtp['st_smtpport']; ?>" name="st_smtpport" type="text">

                                        <label>Encrypt</label>
                                        <input class="form-control" value="<?php echo $smtp['st_smtpencrypt']; ?>" name="st_smtpencrypt" type="text">

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
