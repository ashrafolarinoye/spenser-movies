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
              <h4>New User</h4>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-row">

                  <div class="form-group col-md-12">

                   <label>Name</label>
                   <input type="text" value="" placeholder="" name="user_name" class="form-control" required="">

                   <label>Email</label>
                   <input type="text" value="" placeholder="" name="user_email" class="form-control" id="user_email" onBlur="checkEmailAvailability()" required="">
                   <label id="email-availability-status"></label>

                   <label>Password</label>
                   <input type="password" value="" placeholder="" name="user_password" class="form-control" id="password-field" required="">
                   <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                   <label class="control-label">Role</label>

                   <select class="custom-select form-control" name="user_role" required="">
                     <option value="" selected>- Select -</option>
                     <option value="1">Administrator</option>
                     <option value="2">Subscriber</option>
                   </select>


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
