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
                            <h4>New Page</h4>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="block form-block mb-4">

                            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                <div class="form-row">
                                  
                                  <div class="form-group col-md-12">
                                    
                                    <label>Title</label>
                                    <input class="form-control" value="" name="page_title" type="text" required="">

                                    <label>Description</label>
                                    <textarea type="text" class="form-control" name="page_description" id="page_description"></textarea>

                                    <label>Status</label>
                                    <select class="custom-select form-control" name="page_status" required="">
                                       <option value="" selected>- Select -</option>
                                       <option value="0">Draft</option>
                                       <option value="1">Publish</option>
                                   </select>

                                   <label>Layout</label>

                                   <select class="custom-select form-control" name="page_layout" required="">
                                       <option value="" selected>- Select -</option>
                                       <option value="0">Hide Sidebar</option>
                                       <option value="1">Show Sidebar</option>
                                   </select>

                               </div>

                               <div class="form-group col-md-12">
                                  <hr>
                                  <button class="btn btn-primary" type="submit" name="save">Save</button>
                              </div>


                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</section>