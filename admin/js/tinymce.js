
$(document).ready(function() {
var host = window.location.href; //backend
host = host.split("admin"); 

tinymce.init({
    selector: "textarea",
    theme: "modern",
    width: "",
    height: "120",
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager "
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | image | media | link unlink anchor | print preview|",
   // table_toolbar: "tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",
    menubar: false,
    toolbar_items_size: 'small',
    relative_urls: false,
    remove_script_host:false,

    filemanager_title:"Responsive Filemanager",
    // filemanager_crossdomain: true,
    external_filemanager_path: host[0]+"filemanager/",
    external_plugins: { "filemanager" : host[0]+"filemanager/plugin.min.js"},
  
  
   image_advtab: true,
   
  });


 $("#imageFile").click(function(event) {
       $("#myModal").modal();
   });
   $('#myModal').on('hidden.bs.modal', function () {
      imgSrc =  $("#imageFile").val();
      // alert(imgSrc);
       $("#previewImage").attr({
          'height': '100px',
           "src": imgSrc
       });
       $("#previewImage").attr('src', imgSrc);
    })

});