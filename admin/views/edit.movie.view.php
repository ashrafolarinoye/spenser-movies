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
              <h4>Edit Movie</h4>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-row">
                  
                  <div class="form-group col-md-12">
                    
                    <input type="hidden" value="<?php echo $movie['movie_id']; ?>" name="movie_id">
                    
                    <label>Title</label>
                    <input class="form-control" value="<?php echo $movie['movie_title']; ?>" name="movie_title" type="text" required="">

                    <label>Description</label>

                    <textarea type="text" class="mceNoEditor form-control" rows="10" name="movie_description" id="movie_description" required=""><?php echo $movie['movie_description']; ?></textarea>

                  </div>

                  <div class="form-group col-md-6">
                    <label>Year</label>
                    <input class="form-control" value="<?php echo $movie['movie_year']; ?>" name="movie_year" type="number" maxlength="4" required="">
                  </div>

                  <div class="form-group col-md-6">
                    <label>Duration</label>
                    <input class="form-control" value="<?php echo $movie['movie_duration']; ?>" name="movie_duration" type="text" required="">
                  </div>

                  <div class="form-group col-md-12">

                    <label>Genre</label>

                    <select multiple="multiple" data-placeholder="- Select -" class="my-select form-control" name="movie_genre[]" required="">

                     <?php foreach($selected_genres as $item): ?>

                      <option value="<?php echo $item['genre_id']; ?>" selected><?php echo $item['genre_title']; ?></option>

                    <?php endforeach; ?>

                    <?php foreach($not_selected_genres as $item): ?>
                      <option value="<?php echo $item['genre_id']; ?>"><?php echo $item['genre_title']; ?></option>
                    <?php endforeach; ?>

                  </select>

                </div>

                <div class="form-group col-md-12">
                  <label>Stars <i style="text-transform: initial;color: #c1c1c1;">(Separate With Commas)</i></label>
                  <input class="form-control" data-role="tagsinput" value="<?php echo $movie['movie_stars']; ?>" name="movie_stars" type="text" required="">
                </div>

                <div class="form-group col-md-12">
                  <label>YouTube Trailer <i style="text-transform: initial;color: #c1c1c1;">(https://www.youtube.com/watch?v=<b style="color: var(--danger-color)">M_o2z9jU_VE</b>)</i></label>
                  <input class="form-control" value="<?php echo $movie['movie_trailer']; ?>" name="movie_trailer" type="text" required="">
                </div>

                <div class="form-group col-md-12">
                  <label>Stream Link</label>
                  <input class="form-control" value="<?php echo $movie['movie_link']; ?>" name="movie_link" type="text" required="">
                </div>

                <div class="form-group col-md-12">
                  <label>Iframe Player</label>
                    <textarea type="text" class="mceNoEditor form-control" name="movie_iframe"><?php echo $movie['movie_iframe']; ?></textarea>
                </div>


                <div class="form-group col-md-4">
                  
                  <label>Status</label>

                  <select class="custom-select form-control" name="movie_status" required="">
                    <?php
                    $i = $movie['movie_status'];
                    if($i == 1)
                    {
                      echo '<option value="'.$movie['movie_status'].'" selected="selected">Publish</option>';
                      echo '<option value="0">Draft</option>';

                    }
                    else
                    {
                      echo '<option value="'.$movie['movie_status'].'" selected="selected">Draft</option>';
                      echo '<option value="1">Publish</option>';
                    }
                    ?>
                  </select>

                </div>

                  <div class="form-group col-md-4">
                    <label>Is Downloadable</label>

                    <select class="custom-select form-control" name="movie_downloadable" required="">
                      <?php
                      if($movie['movie_downloadable'] == 1)
                      {
                        echo '<option value="1" selected="selected">Yes</option>';
                        echo '<option value="0">No</option>';

                      }
                      else
                      {
                        echo '<option value="0" selected="selected">No</option>';
                        echo '<option value="1">Yes</option>';
                      }
                      ?>
                    </select>

                  </div>

                <div class="form-group col-md-4">
                  <label>Featured</label>

                  <select class="custom-select form-control" name="movie_featured" required="">
                    <?php
                    $i = $movie['movie_featured'];
                    if($i == 1)
                    {
                      echo '<option value="'.$movie['movie_featured'].'" selected="selected">Yes</option>';
                      echo '<option value="0">No</option>';

                    }
                    else
                    {
                      echo '<option value="'.$movie['movie_featured'].'" selected="selected">No</option>';
                      echo '<option value="1">Yes</option>';
                    }
                    ?>
                  </select>

                </div>

                <div class="form-group col-md-12">


                 <label>Image</label><br/>

                 <div class="new-image" id="image-preview" style="background: url(../../images/<?php echo $movie['movie_image'] ?>);background-size: cover; background-position: center; height: 266px">
                  <label for="image-upload" id="image-label">Choose File</label>
                  <input type="hidden" value="<?php echo $movie['movie_image']; ?>" name="movie_image_save">
                  <input type="file" name="movie_image" id="image-upload" />
                </div>
                
                <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>350 x 500 Pixels</b> </span>

              </div>


              <div class="form-group col-md-12">
                <hr>
                <button class="btn btn-primary" type="submit" name="save">Save</button>
                <input class="btn btn-danger" type="button" value="Delete" onclick="alertdelete();" name="trash"/>

                <script type="text/javascript">
                 function alertdelete() {
                   swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo _SITE_URL ?>/admin/controller/delete_movie.php?id=<?php echo $movie['movie_id']; ?>" });}
                 </script>
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