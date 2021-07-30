$(document).ready(function($){
 Dropzone.options.frmFileUpload = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  accept: function(file, done) {
    if (file.name == "remessa.txt") {
      done("Erro ao subir o arquivo");
    }
    else { done(); }
  }
};

});