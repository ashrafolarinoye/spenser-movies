<?php require '../controller/sidebar.php'; ?>

<!--Page Container-->
<section class="page-container">
  <div class="page-content-wrapper">

    

    <!--Main Content-->

    <style type="text/css">
    .form-control{margin-bottom: 8px}
  </style>

  <div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
      <div class="row">
        <div class="col-12">
          <div class="section-title">
            <h4>Strings</h4>
          </div>
        </div>

        <div class="col-md-12">
          <div class="block form-block mb-4">
            
            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
              
              <div class="form-row">
                <div class="form-group col-md-12">

                 <label>Privacy Policy</label>
                 <textarea type="text" class="form-control" name="st_privacypolicy" id="textarea1"><?php echo $strings['st_privacypolicy']; ?></textarea>

                 <br>
                 <br>
                 <label>Terms of Service</label>
                 <textarea type="text" class="form-control" name="st_termsofservice" id="textarea2"><?php echo $strings['st_termsofservice']; ?></textarea>

                 <br>
                 <br>
                 <label>About Us</label>
                 <textarea type="text" class="form-control" name="st_aboutus" id="textarea3"><?php echo $strings['st_aboutus']; ?></textarea>


                 <hr>
                 <button class="btn btn-primary" type="submit" name="save">Save</button>
               </form>
             </div>
           </div>

         </div>
       </div>
     </div>

   </div>
 </section>