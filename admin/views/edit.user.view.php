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
              <h4>Edit User</h4>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-row">

                  <div class="form-group col-md-12">

                    <input type="hidden" value="<?php echo $usr['user_id']; ?>" name="user_id">
                    
                    <label>Name</label>
                    <input type="text" value="<?php echo $usr['user_name']; ?>" name="user_name" class="form-control" required="">

                    <br/>

                    <label>Email</label>
                    <input type="text" value="<?php echo $usr['user_email']; ?>" name="user_email" class="form-control" required="">

                    <br/>

                    <label>Password</label>
                    <input type="hidden" value="<?php echo $usr['user_password']; ?>" name="user_password_save">
                    <input type="password" value="" placeholder="" name="user_password" class="form-control" id="password-field">
                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                    <br/>

                    <label class="control-label">Status</label>

                    <select class="custom-select form-control" name="user_status" required="">
                      <?php
                      $i = $usr['user_status'];
                      if($i == 1)
                      {
                        echo '<option value="'.$usr['user_status'].'" selected="selected">Active</option>';
                        echo '<option value="0">Inactive</option>';

                      }
                      else
                      {
                        echo '<option value="'.$usr['user_status'].'" selected="selected">Inactive</option>';
                        echo '<option value="1">Active</option>';
                      }
                      ?>
                    </select>
                    <br/>
                    <br/>

                    <p style="font-size: 13px; font-weight: 300;color: var(--primary-color);"><b style="font-size: 13px;">Date of registration: </b> <?php echo FormatDate($usr['user_created']); ?> · <b style="font-size: 13px;">Latest update: </b> <?php echo FormatDate($usr['user_updated']); ?></p>


                    <hr>
                    <button class="btn btn-primary" type="submit" name="save">Save</button>
                    <input class="btn btn-danger" type="button" value="Delete" onclick="alertdelete();" name="trash"/>
                    
                    <script type="text/javascript">
                     function alertdelete() {
                       swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo _SITE_URL ?>/admin/controller/delete_user.php?id=<?php echo $user['user_id']; ?>" });}
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
