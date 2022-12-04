<div id="add_link" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-primary close" data-dismiss="modal" style="font-size: 24px;">&times;</button>
    <h4 class="modal-title" style="font-size: 16px;">New Custom Link</h4>
  </div>
  <div class="modal-body">
    <form enctype="multipart/form-data" method="post" id="insert_form">
      <div class="form-group">
       <label>Label</label>
       <input type="text" name="navigation_label" id="navigation_label" placeholder="Label Name" class="form-control" required="" />

       <br />
       
       <label class="control-label">Url</label>
       <input type="text" name="navigation_url" id="navigation_url" placeholder="https://www.example.com " class="form-control" required="" />


       <br />
       <label class="control-label">Target</label>

       <select class="custom-select form-control" name="navigation_target">
         <option value="_self" selected="">Self</option>
         <option value="_blank">Blank</option>
         <option value="_top">Top</option>
       </select>
       <br>
       <br>

       <input type="text" name="navigation_type" value="custom" hidden="true" />
       <input type="text" name="menu_id" value="<?php echo $_GET["id"]; ?>" hidden="true" />
       <input type="text" name="navigation_order" hidden="true" />


       <input type="submit" name="add" id="add" value="Create" class="btn btn-primary" />

     </div>
   </form>
 </div>
</div>
</div>
</div>

<script>  
  $(document).ready(function(){
   $('#insert_form').on("submit", function(event){  
    event.preventDefault();  
    if($('#navigation_label').val() == '')  
    {  
      
    }
    else if($('#navigation_url').val() == '')  
    {  
      
    }
    else  
    {  
     $.ajax({  
      url:"<?php echo _SITE_URL ?>/admin/controller/new_navlink.php",  
      method:"POST",  
      data:$('#insert_form').serialize(),  
      beforeSend:function(){  
       $('#add').val("Creating");  
     },  
     success:function(data){  
       $('#insert_form')[0].reset();  
       $('#add_link').modal('hide');
       location.reload();
     }  
   });  
   }  
 });

 });  
</script>  
