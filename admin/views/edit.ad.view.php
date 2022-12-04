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
              <h4>Edit Ad</h4>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-row">
                  
                  <div class="form-group col-md-12">

                    <label><?php echo $ad['title']; ?></label>
                    <label style="margin: 0; color: #9E9E9E; text-transform: none; font-size: 13px; font-weight: 400;"><?php echo $ad['subtitle']; ?></label>
                    <input type="hidden" value="<?php echo $ad['id']; ?>" name="id">
                  </div>


                  <div class="form-group col-md-12">

                    <textarea type="text" class="mceNoEditor form-control" rows="10" name="content" id="content" required=""><?php echo $ad['content']; ?></textarea>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Status</label>

                    <select class="custom-select form-control" name="status" required="">
                      <?php
                      if($ad['status'] == 1)
                      {
                        echo '<option value="'.$ad['status'].'" selected="selected">Publish</option>';
                        echo '<option value="0">Draft</option>';

                      }
                      else
                      {
                        echo '<option value="'.$ad['status'].'" selected="selected">Draft</option>';
                        echo '<option value="1">Publish</option>';
                      }
                      ?>
                    </select>

                  </div>


                </div>

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