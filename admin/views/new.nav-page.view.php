<div id="add_page" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-primary close" data-dismiss="modal" style="font-size: 24px;">&times;</button>
    <h4 class="modal-title" style="font-size: 16px;">Add Page</h4>
  </div>
  <div class="modal-body">
    <form enctype="multipart/form-data" method="post" id="insert_page">
      <div class="form-group">

       <label class="control-label">Pages</label>


       <select class="custom-select form-control" name="page_id" required="">
        <?php
        foreach($pages as $page)
        {
          echo '<option value="'.$page['page_id'].'">'.$page['page_title'].'</option>';
        }
        ?>
      </select>

      <br />
      <label class="control-label">Target</label>

      <select class="custom-select form-control" name="navigation_target">
       <option value="_self" selected="">Self</option>
       <option value="_blank">Blank</option>
       <option value="_top">Top</option>
     </select>
     <br>
     <br>

     <input type="text" name="navigation_type" value="page" hidden="true" />
     <input type="text" name="menu_id" value="<?php echo $_GET["id"]; ?>" hidden="true" />
     <input type="text" name="navigation_order" hidden="true" />


     <input type="submit" name="insert" id="insert" value="Add" class="btn btn-primary" />

   </div>
 </form>
</div>
</div>
</div>
</div>

<script>  
  $(document).ready(function(){
   $('#insert_page').on("submit", function(event){  
    event.preventDefault();  
    $.ajax({  
      url:"<?php echo _SITE_URL ?>/admin/controller/new_navpage.php",  
      method:"POST",  
      data:$('#insert_page').serialize(),  
      beforeSend:function(){  
       $('#insert').val("Creating");  
     },  
     success:function(data){  
       $('#insert_page')[0].reset();  
       $('#add_page').modal('hide');
       location.reload();
     }  
   });  
  });

 });  
</script>  
