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
              <h4>Edit Episode</h4>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                <input type="hidden" value="<?php echo $episode['episode_id']; ?>" name="episode_id">


                <div class="form-row">
                  
                  <div class="form-group col-md-12">
                    
                    <label>Title</label>
                    <input class="form-control" value="<?php echo $episode['episode_title']; ?>" name="episode_title" type="text" required="">
                  </div>

                    <label>Description</label>
                  <textarea type="text" class="mceNoEditor form-control" rows="10" name="episode_description" id="episode_description" required=""><?php echo $episode['episode_description']; ?></textarea>

                  <div class="form-group col-md-12">
                    <label>Serie</label>
                    <select class="custom-select form-control" name="episode_serie" required="">
                      <?php
                      foreach($series as $serie)
                      {
                        if($episode['episode_serie'] == $serie['serie_id'])
                        {
                          echo '<option value="'.$episode['serie_id'].'" selected="selected">'.$serie['serie_title'].'</option>';
                        }
                        else
                        {
                          echo '<option value="'.$serie['serie_id'].'">'.$serie['serie_title'].'</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Stream Link</label>
                    <input class="form-control" value="<?php echo $episode['episode_link']; ?>" name="episode_link" type="text">
                  </div>

                  <div class="form-group col-md-12">
                    <label>Iframe Player</label>
                  <textarea type="text" class="mceNoEditor form-control" name="episode_iframe"><?php echo $episode['episode_iframe']; ?></textarea>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Status</label>

                    <select class="custom-select form-control" name="episode_status" required="">
                      <?php
                      if($episode['episode_status'] == 1)
                      {
                        echo '<option value="'.$episode['episode_status'].'" selected="selected">Publish</option>';
                        echo '<option value="0">Draft</option>';

                      }
                      else
                      {
                        echo '<option value="'.$episode['episode_status'].'" selected="selected">Draft</option>';
                        echo '<option value="1">Publish</option>';
                      }
                      ?>
                    </select>

                  </div>

                  <div class="form-group col-md-12">
                    <label>Is Downloadable</label>

                    <select class="custom-select form-control" name="episode_downloadable" required="">
                      <?php
                      if($episode['episode_downloadable'] == 1)
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

                  <div class="form-group col-md-12">


                   <label>Image</label><br/>

                   <div class="new-image" id="image-preview" style="background: url(../../images/<?php echo $episode['episode_image'] ?>);background-size: cover; background-position: center; height: 200px; width: 300px;">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="hidden" value="<?php echo $episode['episode_image']; ?>" name="episode_image_save">
                    <input type="file" name="episode_image" id="image-upload" />
                  </div>
                  
                  <span class="text-danger" style="font-size: 11px; letter-spacing: 0.06em; text-transform: uppercase; font-weight: 500;">Recommended size: <b>300 x 200 Pixels</b> </span>

                </div>


                <div class="form-group col-md-12">
                  <hr>
                  <button class="btn btn-primary" type="submit" name="save">Save</button>
                  <input class="btn btn-danger" type="button" value="Delete" onclick="alertdelete();" name="trash"/>

                  <script type="text/javascript">
                   function alertdelete() {
                     swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo _SITE_URL ?>/admin/controller/delete_episode.php?id=<?php echo $episode['episode_id']; ?>" });}
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