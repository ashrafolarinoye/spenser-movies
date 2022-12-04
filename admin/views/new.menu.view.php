<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="btn btn-primary close" data-dismiss="modal" style="font-size: 24px;">&times;</button>
    <h4 class="modal-title" style="font-size: 16px;">Add New</h4>
  </div>
  <div class="modal-body">
    <form enctype="multipart/form-data" method="post" id="insert_form">

     <label class="control-label">Name</label>
     <input type="text" name="menu_name" id="menu_name" class="form-control" required="" />
     <br />
     <br>


     <label>Header</label>

     <select class="custom-select form-control" name="menu_header" required="">
       <option value="" selected>- Select -</option>
       <option value="0">Hide</option>
       <option value="1">Show</option>
     </select>
     <br>
     <br>
     <label>Footer</label>

     <select class="custom-select form-control" name="menu_footer" required="">
       <option value="" selected>- Select -</option>
       <option value="0">Hide</option>
       <option value="1">Show</option>
     </select>
     <br>
     <br>
     <label>Sidebar</label>

     <select class="custom-select form-control" name="menu_sidebar" required="">
       <option value="" selected>- Select -</option>
       <option value="0">Hide</option>
       <option value="1">Show</option>
     </select>

     <br/>
     <br/>

     <input type="submit" name="insert" id="insert" value="Create" class="btn btn-primary" />

   </form>
 </div>
</div>
</div>
</div>

<script>  
  $(document).ready(function(){
   $('#insert_form').on("submit", function(event){  
    event.preventDefault();  
    if($('#menu_name').val() == '')  
    {  
      
    }
    else  
    {  
     $.ajax({  
      url:"<?php echo _SITE_URL ?>/admin/controller/new_menu.php",  
      method:"POST",  
      data:$('#insert_form').serialize(),  
      beforeSend:function(){  
       $('#insert').val("Creating");  
     },  
     success:function(data){  
       $('#insert_form')[0].reset();  
       $('#add_data_Modal').modal('hide');
       location.reload();
     }  
   });  
   }  
 });

 });  
</script>  
