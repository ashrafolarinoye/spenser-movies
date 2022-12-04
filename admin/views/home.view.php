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
                            <h4>Sections</h4>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $movies_total; ?></div>
                            <i class="dripicons-camcorder i-icon"></i>
                            <p class="label">Movies</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $series_total; ?></div>
                            <i class="dripicons-media-next i-icon"></i>
                            <p class="label">Series</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $episodes_total; ?></div>
                            <i class="dripicons-view-list i-icon"></i>
                            <p class="label">Episodes</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="block counter-block mb-4">
                            <div class="value"><?php echo $users_total; ?></div>
                            <i class="dripicons-user i-icon"></i>
                            <p class="label">Users</p>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="section-title">
                            <h4>Summary</h4>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Movies</h5>
                                <div class="graph-pills graph-home">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active active-2" href="<?php echo _SITE_URL ?>/admin/controller/movies.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Genre</th>
                                                <th>Year</th>
                                                <th>Duration</th>
                                                <th>Featured</th>
                                                <th>Status</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>

                                        <tbody class="text-middle">
                                            <?php foreach($movies as $movie): ?>

                                                <tr>
                                                    <td class="product">
                                                        <img class="product-img" style="width: 45px; height: 55px" src="../../images/<?php echo $movie['movie_image']; ?>">
                                                    </td>
                                                    <td class="name" style="text-transform: none;"><span class="span-title"><?php echo $movie['movie_title']; ?></span></td>
                                                    <td class="name"><?php echo $movie['genre_title']; ?></td>
                                                    <td class="name"><?php echo $movie['movie_year']; ?></td>
                                                    <td class="name"><?php echo $movie['movie_duration']; ?></td>
                                                    <td class="status">
                                                        <?php
                                                        if ($movie['movie_featured'] == 1) {
                                                            echo "<span class='badge badge-pill bg-success'>Yes</span>";
                                                        }else{
                                                            echo "<span class='badge badge-pill bg-warning'>No</span>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="status">
                                                        <?php
                                                        if ($movie['movie_status'] == 1) {
                                                            echo "<span class='badge badge-pill bg-success'>Publish</span>";
                                                        }else{
                                                            echo "<span class='badge badge-pill bg-warning'>Draft</span>";
                                                        }
                                                        ?>

                                                    </td>

                                                    <td class="name"><a href="<?php echo _SITE_URL ?>/admin/controller/edit_movie.php?id=<?php echo $movie['movie_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a onclick="alertdelete_<?php echo $movie['movie_id']; ?>();" style="cursor: pointer;"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                                </tr>

                                                <script type="text/javascript">
                                                  function alertdelete_<?php echo $movie['movie_id']; ?>() {
                                                      swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo _SITE_URL ?>/admin/controller/delete_movie.php?id=<?php echo $movie['movie_id']; ?>" });}
                                                  </script>
                                                  
                                              <?php endforeach; ?>

                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>  

                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="block table-block mb-4">
                            <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                                <h5 class="text-truncate">Series</h5>
                                <div class="graph-pills graph-home">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active active-2" href="<?php echo _SITE_URL ?>/admin/controller/series.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="custom-scroll" style="max-height: 250px;">
                                <div class="table-responsive text-no-wrap">
                                    <table class="table table-striped">
                                        <thead>
                                         <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Genre</th>
                                            <th>Year</th>
                                            <th>Featured</th>
                                            <th>Status</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>

                                    <tbody class="text-middle">
                                        <?php foreach($series as $serie): ?>

                                            <tr>
                                                <td class="product">
                                                    <img class="product-img" style="width: 45px; height: 55px" src="../../images/<?php echo $serie['serie_image']; ?>">
                                                </td>
                                                <td class="name" style="text-transform: none;"><span class="span-title"><?php echo $serie['serie_title']; ?></span></td>
                                                <td class="name"><?php echo $serie['genre_title']; ?></td>
                                                <td class="name"><?php echo $serie['serie_year']; ?></td>
                                                <td class="status">
                                                    <?php
                                                    if ($serie['serie_featured'] == 1) {
                                                        echo "<span class='badge badge-pill bg-success'>Yes</span>";
                                                    }else{
                                                        echo "<span class='badge badge-pill bg-warning'>No</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="status">
                                                    <?php
                                                    if ($serie['serie_status'] == 1) {
                                                        echo "<span class='badge badge-pill bg-success'>Publish</span>";
                                                    }else{
                                                        echo "<span class='badge badge-pill bg-warning'>Draft</span>";
                                                    }
                                                    ?>

                                                </td>

                                                <td class="name"><a href="<?php echo _SITE_URL ?>/admin/controller/edit_serie.php?id=<?php echo $serie['serie_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a onclick="alertdelete_<?php echo $serie['serie_id']; ?>();" style="cursor: pointer;"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                            </tr>

                                            <script type="text/javascript">
                                              function alertdelete_<?php echo $serie['serie_id']; ?>() {
                                                  swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo _SITE_URL ?>/admin/controller/delete_serie.php?id=<?php echo $serie['serie_id']; ?>" });}
                                              </script>
                                              
                                          <?php endforeach; ?>
                                          
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>  


                  <div class="col-12 col-md-12 col-lg-12">
                    <div class="block table-block mb-4">
                        <div class="block-heading d-flex align-items-center" style="border:0; padding-bottom: 0;">
                            <h5 class="text-truncate">Episodes</h5>
                            <div class="graph-pills graph-home">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active active-2" href="<?php echo _SITE_URL ?>/admin/controller/episodes.php">View All <i class="fa fa-angle-right" style="margin-left: 5px"></i></a>

                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="custom-scroll" style="max-height: 250px;">
                            <div class="table-responsive text-no-wrap">
                                <table class="table table-striped">
                                 <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Serie</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Serie</th>
                                        <th>Status</th>
                                        <th>Actions</th>

                                    </tr>
                                </tfoot>

                                <tbody>
                                    <?php foreach($episodes as $episode): ?>

                                        <tr>
                                            <td class="name" style="text-transform: none;"><span class="span-title"><?php echo $episode['episode_title']; ?></span></td>
                                            <td class="name"><a href="<?php echo _SITE_URL ?>/admin/controller/edit_serie.php?id=<?php echo $episode['episode_serie']; ?>"><?php echo $episode['serie_title']; ?></a></td>

                                            <td class="status">
                                                <?php
                                                if ($episode['episode_status'] == 1) {
                                                    echo "<span class='badge badge-pill bg-success'>Publish</span>";
                                                }else{
                                                    echo "<span class='badge badge-pill bg-warning'>Draft</span>";
                                                }
                                                ?>

                                            </td>

                                            <td class="name"><a href="<?php echo _SITE_URL ?>/admin/controller/edit_episode.php?id=<?php echo $episode['episode_id']; ?>"><i class="fa fa-cog a-i-color"></i></a> <a onclick="alertdelete_<?php echo $episode['episode_id']; ?>();" style="cursor: pointer;"><i class="fa fa-trash-o a-i-color"></i></a></td>
                                        </tr>

                                        <script type="text/javascript">
                                          function alertdelete_<?php echo $episode['episode_id']; ?>() {
                                              swal({ title: "Are you sure?", text: "You will not be able to recover this item!", type: "warning",cancelButtonClass: "btn-default btn-sm", showCancelButton: true, confirmButtonClass: "btn-danger btn-sm", confirmButtonText: "Yes, delete it!", closeOnConfirm: false }, function(){window.location.href = "<?php echo _SITE_URL ?>/admin/controller/delete_episode.php?id=<?php echo $episode['episode_id']; ?>" });}
                                          </script>
                                          
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
</div>

</section>