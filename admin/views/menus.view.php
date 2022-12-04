<?php require '../controller/sidebar.php'; ?>  

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">


        <style type="text/css">
        .badge-pill{height: 30px; width: 30px; line-height: 23px;}
    </style>


    <!--Main Content-->

    <div class="content sm-gutter">
        <div class="container-fluid padding-25 sm-padding-10">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h4>Menus</h4>
                    </div>
                </div>

                <div class="col-12" style="text-align: right;padding-right: 20px;">
                    <button type="button" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary"><i class="fa fa-plus add-new-i"></i> Add</button>
                </div>

                <div class="col-12">
                    <div class="block table-block mb-4" style="margin-top: 20px;">

                        <div class="row">
                            <div class="table-responsive">
                                <table id="dataTable1" class="display table table-striped" data-table="data-table">
                                    <thead>
                                        <tr>
                                          <th>Id</th>
                                          <th>Name</th>
                                          <th>Header</th>
                                          <th>Footer</th>
                                          <th>Sidebar</th>
                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Header</th>
                                      <th>Footer</th>
                                      <th>Sidebar</th>
                                      <th>Actions</th>
                                  </tr>
                              </tfoot>

                              <tbody>
                                <?php foreach($menus as $menu): ?>
                                    <tr>
                                      <td><?php echo $menu['menu_id']; ?></td>
                                      <td><?php echo $menu['menu_name']; ?></td>

                                      <td><?php if ($menu['menu_header'] == 1) {
                                          echo "<span class='badge badge-pill bg-success'><i class='fa fa-check'></i></span>";
                                      } else{
                                          echo "<span class='badge badge-pill bg-warning'><i class='fa fa-close'></i></span>";
                                      }  ?>
                                  </td>

                                  <td><?php if ($menu['menu_footer'] == 1) {
                                      echo "<span class='badge badge-pill bg-success'><i class='fa fa-check'></i></span>";
                                  } else{
                                      echo "<span class='badge badge-pill bg-warning'><i class='fa fa-close'></i></span>";
                                  }  ?>
                              </td>

                              <td><?php if ($menu['menu_sidebar'] == 1) {
                                  echo "<span class='badge badge-pill bg-success'><i class='fa fa-check'></i></span>";
                              } else{
                                  echo "<span class='badge badge-pill bg-warning'><i class='fa fa-close'></i></span>";
                              }  ?>
                          </td>


                          <td class="name"><a href="<?php echo _SITE_URL ?>/admin/controller/edit_menu.php?id=<?php echo $menu['menu_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a onclick="alertdelete_<?php echo $menu['menu_id']; ?>();" style="cursor: pointer;"><i class="fa fa-trash-o a-i-color"></i></a></td>

                          <script type="text/javascript">
                              function alertdelete_<?php echo $menu['menu_id']; ?>() {
                                  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo _SITE_URL ?>/admin/controller/delete_menu.php?id=<?php echo $menu['menu_id']; ?>" });}
                              </script>
                          </tr>
                      <?php endforeach; ?>

                  </tbody>
              </table>

          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</section>


<?php require 'new.menu.view.php'; ?>