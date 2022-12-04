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
              <h4>New Episode</h4>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-row">
                  
                  <div class="form-group col-md-12">
                    
                    <label>Title</label>
                    <input class="form-control" value="" name="episode_title" type="text" required="">
                  </div>

                  <div class="form-group col-md-12">
                  <label>Description</label>

                  <textarea type="text" class="mceNoEditor form-control" rows="10" name="episode_description" id="episode_description"></textarea>
                </div>

                  <div class="form-group col-md-12">
                    <label>Serie</label>
                    <select class="custom-select form-control" name="episode_serie" data-live-search="true" required="">
                     <option selected="selected">- Select -</option>
                     <?php foreach($series as $serie): ?>
                       <option value="<?php echo $serie['serie_id']; ?>"><?php echo $serie['serie_title']; ?></option>
                     <?php endforeach; ?>
                   </select>
                 </div>

                 <div class="form-group col-md-12">
                  <label>Stream Link</label>
                  <input class="form-control" value="" name="episode_link" type="text" required="">
                </div>

                 <div class="form-group col-md-12">
                    <label>Iframe Player</label>
                  <textarea type="text" class="mceNoEditor form-control" name="episode_iframe"></textarea>
                </div>

                <div class="form-group col-md-12">
                  <label>Status</label>

                  <select class="custom-select form-control" name="episode_status" required="">
                   <option value="" selected>- Select -</option>
                   <option value="0">Draft</option>
                   <option value="1">Publish</option>
                 </select>

               </div>

                <div class="form-group col-md-12">
                  <label>Is Downloadable</label>

                  <select class="custom-select form-control" name="episode_downloadable" required="">
                   <option value="" selected>- Select -</option>
                   <option value="0">No</option>
                   <option value="1">Yes</option>
                 </select>

               </div>

               <div class="form-group col-md-12">


                 <label>Image</label><br/>

                 <div class="new-image" id="image-preview" style="height: 200px; width: 300px;">
                  <label for="image-upload" id="image-label">Choose File</label>
                  <input type="file" name="episode_image" id="image-upload" required="" />
                </div>

                <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>300 x 200 Pixels</b> </span>

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