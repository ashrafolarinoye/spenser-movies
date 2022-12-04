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
                            <h4>Brand</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">
                          
                            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                                <div class="form-row">

                                    <div class="form-group col-md-12">

                                        <table class="display table table-striped logos">
                                            
                                            <tr>
                                                <td><label>Favicon</label><br>
                                                    <span>Recommended Size: <b>128 x 128 Pixels</b></span></td>
                                                    <td><label>Current Favicon</label></td>
                                                </tr>

                                                <tr style="height: 120px">
                                                    <td>
                                                        <input type="hidden" value="<?php echo $brand['st_favicon']; ?>" name="st_favicon_save">
                                                        <input type="file" name="st_favicon" />
                                                    </td>
                                                    <td><img src="../../images/<?php echo $brand['st_favicon']; ?>"></td>
                                                </tr>

                                                <tr>
                                                    <td><label>White Logo</label><br>
                                                        <span>Recommended Size: <b>320 x 71 Pixels</b></span></td>
                                                        <td><label>Current White Logo</label></td>
                                                    </tr>

                                                    <tr style="height: 120px">
                                                        <td>
                                                            <input type="hidden" value="<?php echo $brand['st_whitelogo']; ?>" name="st_whitelogo_save">
                                                            <input type="file" name="st_whitelogo" />
                                                        </td>
                                                        <td style="background-color: var(--primary-color);"><img src="../../images/<?php echo $brand['st_whitelogo']; ?>"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><label>Dark Logo</label><br>
                                                            <span>Recommended Size: <b>320 x 71 Pixels</b></span></td>
                                                            <td><label>Current Dark Logo</label></td>
                                                        </tr>

                                                        <tr style="height: 120px">
                                                            <td>
                                                                <input type="hidden" value="<?php echo $brand['st_darklogo']; ?>" name="st_darklogo_save">
                                                                <input type="file" name="st_darklogo" />
                                                            </td>
                                                            <td><img src="../../images/<?php echo $brand['st_darklogo']; ?>"></td>
                                                        </tr>

                                                        <tr>
                                                            <td><label>Icon</label><br>
                                                                <span>Recommended Size: <b>152 x 152 Pixels</b></span></td>
                                                                <td><label>Current Icon</label></td>
                                                            </tr>

                                                            <tr style="height: 120px">
                                                                <td>
                                                                    <input type="hidden" value="<?php echo $brand['st_icon']; ?>" name="st_icon_save">
                                                                    <input type="file" name="st_icon" />
                                                                </td>
                                                                <td><img src="../../images/<?php echo $brand['st_icon']; ?>"></td>
                                                            </tr>

                                                        </table>


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
