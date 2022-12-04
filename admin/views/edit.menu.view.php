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
              <h4>Edit Menu</h4>
            </div>
          </div>

          <div class="col-md-12">
            <div class="block form-block mb-4">

              <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="form-row">
                  
                  <div class="form-group col-md-12">
                    
                    <input type="hidden" value="<?php echo $menu['menu_id']; ?>" name="menu_id">

                    <label>Name</label>
                    
                    <input type="text" value="<?php echo $menu['menu_name']; ?>" name="menu_name" class="form-control" required="">

                    <br>

                    <label class="control-label">Navigation</label>

                    <fieldset>

                      <ul class="listas sortable ui-sortable">
                        <?php
                        foreach($navigations as $nav)
                        {
                          echo '<li class="ui-sortable-handle" id="item-'.$nav['navigation_id'].'"> <span style="font-weight:bold;font-size: 14px;">' . $nav['navigation_label'] . '</span> · <span style="font-size:12px">' . $nav['navigation_url'] . '</span><a class="delete-nav" href="../controller/delete_nav.php?id=' . $nav["navigation_id"] . '"> Remove</a></li>';
                        }
                        ?>

                      </ul>
                      <?php if (!empty($navigations)){ echo '
                      <table>
                      <tr>
                      <td><button class="save btn btn-embossed btn-primary">Save Order</button></td>
                      <td><div id="response" style="margin-left: 10px;color: #68bb69; font-size: 13px;"></div></td>
                      </tr>
                      </table>
                      ';}else{
                        echo "<p style='padding-bottom: 10px; font-size: 11px; text-transform: uppercase; color: #868e96;'>no items found</p>";
                      } ?>
                    </fieldset>

                    <br>

                    <button type="button" data-toggle="modal" data-target="#add_page" class="btn btn-primary"><i class="fa fa-plus add-new-i"></i> Add Page</button>

                    <button type="button" data-toggle="modal" data-target="#add_link" class="btn btn-primary"><i class="fa fa-plus add-new-i"></i> Add Custom Link</button>

                    <br>
                    

                    <label>Status</label>

                    <select class="custom-select form-control" name="menu_status" required="">
                      <?php
                      $i = $menu['menu_status'];
                      if($i == 1)
                      {
                        echo '<option value="'.$menu['menu_status'].'" selected="selected">Publish</option>';
                        echo '<option value="0">Draft</option>';

                      }
                      else
                      {
                        echo '<option value="'.$menu['menu_status'].'" selected="selected">Draft</option>';
                        echo '<option value="1">Publish</option>';
                      }
                      ?>
                    </select>


                    <label>Header</label>

                    <select class="custom-select form-control" name="menu_header" required="">
                      <?php
                      $i = $menu['menu_header'];
                      if($i == 1)
                      {
                        echo '<option value="'.$menu['menu_header'].'" selected="selected">Show</option>';
                        echo '<option value="0">Hide</option>';

                      }
                      else
                      {
                        echo '<option value="'.$menu['menu_header'].'" selected="selected">Hide</option>';
                        echo '<option value="1">Show</option>';
                      }
                      ?>
                    </select>

                    <label>Footer</label>
                    <select class="custom-select form-control" name="menu_footer" required="">
                      <?php
                      $i = $menu['menu_footer'];
                      if($i == 1)
                      {
                        echo '<option value="'.$menu['menu_footer'].'" selected="selected">Show</option>';
                        echo '<option value="0">Hide</option>';

                      }
                      else
                      {
                        echo '<option value="'.$menu['menu_footer'].'" selected="selected">Hide</option>';
                        echo '<option value="1">Show</option>';
                      }
                      ?>
                    </select>

                    <label>Sidebar</label>

                    <select class="custom-select form-control" name="menu_sidebar" required="">
                      <?php
                      $i = $menu['menu_sidebar'];
                      if($i == 1)
                      {
                        echo '<option value="'.$menu['menu_sidebar'].'" selected="selected">Show</option>';
                        echo '<option value="0">Hide</option>';

                      }
                      else
                      {
                        echo '<option value="'.$menu['menu_sidebar'].'" selected="selected">Hide</option>';
                        echo '<option value="1">Show</option>';
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
                       swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo _SITE_URL ?>/admin/controller/delete_menu.php?id=<?php echo $menu['menu_id']; ?>" });}
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

 <script type="text/javascript">
  //<![CDATA[
  var ul_sortable = $('.sortable');
  ul_sortable.sortable({
    revert: 100,
    placeholder: 'placeholder'
  });
  ul_sortable.disableSelection();
  var btn_save = $('button.save'),
  div_response = $('#response');
  btn_save.on('click', function(e) {
    e.preventDefault();
    var sortable_data = ul_sortable.sortable('serialize');
    div_response.text('Updating....');
    $.ajax({
      data: sortable_data,
      type: 'POST',
      url: 'save_navigation.php?menu='+<?php echo $menu['menu_id']; ?>,
      success:function(result) {
        div_response.text(result);
      }
    });
  });
    //]]>
  </script>

  <?php require 'new.nav-link.view.php'; ?>

  <?php require 'new.nav-page.view.php'; ?>