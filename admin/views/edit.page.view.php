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
              <h4>Edit Page</h4>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-row">
                  
                  <div class="form-group col-md-12">
                    
                    <input type="hidden" value="<?php echo $page['page_id']; ?>" name="page_id">
                    
                    <label>Title</label>
                    <input class="form-control" value="<?php echo $page['page_title']; ?>" name="page_title" type="text" required="">

                    <label>Description</label>

                    <textarea type="text" class="form-control" name="page_description" id="page_description"><?php echo $page['page_description']; ?></textarea>

                    <label>Status</label>

                    <select class="custom-select form-control" name="page_status" required="">
                      <?php
                      $i = $page['page_status'];
                      if($i == 1)
                      {
                        echo '<option value="'.$page['page_status'].'" selected="selected">Publish</option>';
                        echo '<option value="0">Draft</option>';

                      }
                      else
                      {
                        echo '<option value="'.$page['page_status'].'" selected="selected">Draft</option>';
                        echo '<option value="1">Publish</option>';
                      }
                      ?>
                    </select>

                    <label>Layout</label>

                    <select class="custom-select form-control" name="page_layout" required="">
                      <?php
                      $type = $page['page_layout'];
                      if($type == 1)
                      {
                        echo '<option value="'.$page['page_layout'].'" selected="selected">Show Sidebar</option>';
                        echo '<option value="0">Hide Sidebar</option>';

                      }
                      else
                      {
                        echo '<option value="'.$page['page_layout'].'" selected="selected">Hide Sidebar</option>';
                        echo '<option value="1">Show Sidebar</option>';
                      }
                      ?>
                    </select>

                  </div>



                  <div class="form-group col-md-12">
                    <hr>
                    <button class="btn btn-primary" type="submit" name="save">Save</button>
                    <input class="btn btn-danger" type="button" value="Delete" onclick="alertdelete();" name="trash"/>

                    <script type="text/javascript">
                     function alertdelete() {
                       swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo _SITE_URL ?>/admin/controller/delete_page.php?id=<?php echo $page['page_id']; ?>" });}
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
