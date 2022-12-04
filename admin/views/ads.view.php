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
                            <h4>Ads</h4>
                        </div>
                    </div>

                    <div class="col-12" style="text-align: right;padding-right: 20px;">

                    </div>

                    <div class="col-12">
                        <div class="block table-block mb-4" style="margin-top: 20px">

                            <div class="row">
                                <div class="table-responsive">
                                    <table id="dataTable1" class="display table table-striped" data-table="data-table">
                                        <thead>
                                            <tr>
                                              <th>Id</th>
                                              <th>Title</th>
                                              <th>Status</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tfoot>
                                        <tr>
                                          <th>Id</th>
                                          <th>Title</th>
                                          <th>Status</th>
                                          <th>Actions</th>
                                      </tr>
                                  </tfoot>

                                  <tbody>
                                    <?php foreach($ads as $ad): ?>
                                        <tr>
                                          <td><?php echo $ad['id']; ?></td>
                                          <td><?php echo $ad['title']; ?></td>
                                          <td class="status">
                                            <?php
                                            if ($ad['status'] == 1) {
                                                echo "<span class='badge badge-pill bg-success'>Publish</span>";
                                            }else{
                                                echo "<span class='badge badge-pill bg-warning'>Draft</span>";
                                            }
                                            ?>

                                        </td>
                                        <td class="name">
                                            <a href="<?php echo _SITE_URL ?>/admin/controller/edit_ad.php?id=<?php echo $ad['id']; ?>" style="font-size: 14px;color: #34495e;"><i class="fa fa-cog"></i></a>
                                        </td>
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