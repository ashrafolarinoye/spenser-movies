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
              <h4>New Genre</h4>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-row">

                  <div class="form-group col-md-12">

                    <label>Title</label>
                    <input type="text" value="" placeholder="" name="genre_title" class="form-control" required="">

                  </div>




                  <div class="form-group col-md-12">


                   <label>Image</label><br/>

                   <div class="new-image" id="image-preview">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="genre_image" id="image-upload" required="" />
                  </div>
                  <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>300 x 200 Pixels</b> </span>

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