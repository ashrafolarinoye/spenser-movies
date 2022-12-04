    tinymce.init({
    selector: "textarea:not(.mceNoEditor)",
    height: 400,
    relative_urls : false,
    remove_script_host : false,
    convert_urls : true,
    plugins: [
      'advlist autolink lists link image charmap hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save directionality',
      'paste textpattern imagetools'
    ],
    toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image forecolor backcolor',
    // image upload url
    images_upload_url: '../../admin/controller/image_upload.php',
    
    // override default upload handler
    images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
      
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '../../admin/controller/image_upload.php');
      
        xhr.onload = function() {
            var json;
        
            if (xhr.status != 200) {
                failure('HTTP Error: ' + xhr.status);
                return;
            }
        
            json = JSON.parse(xhr.responseText);
        
            if (!json || typeof json.location != 'string') {
                failure('Invalid JSON: ' + xhr.responseText);
                return;
            }
        
            success(json.location);
        };
      
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
      
        xhr.send(formData);
    },
    image_advtab: true
});