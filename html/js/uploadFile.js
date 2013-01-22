

$(document).ready(function(){
  var inputElement = document.getElementById("photos");
inputElement.addEventListener("change", handleFiles, false);
  var preview = document.getElementById("preview");
    $("#uploading").click(sendFiles);
function handleFiles() {
    var fileList = this.files; /* now you can work with the file list */
  for (var i = 0; i < fileList.length; i++) {
    var file = fileList[i];
    var imageType = /image.*/;
     
    if (!file.type.match(imageType)) {
      continue;
    }
     
    var img = document.createElement("img");
    img.classList.add("obj");
    img.file = file;
    preview.appendChild(img);
     
    var reader = new FileReader();
    reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
    reader.readAsDataURL(file);
  }
}

function sendFiles() {
  var imgs = document.querySelectorAll(".obj");
   
  for (var i = 0; i < imgs.length; i++) {
    new FileUpload(imgs[i], imgs[i].file);
  }
}

function FileUpload(img, file) {
  var reader = new FileReader();  
  //this.ctrl = createThrobber(img);
  var xhr = new XMLHttpRequest();
  this.xhr = xhr;
   
  var self = this;
 
   
  xhr.upload.addEventListener("load", function(e){
          self.ctrl.update(100);
          var canvas = self.ctrl.ctx.canvas;
          canvas.parentNode.removeChild(canvas);
      }, false);
  xhr.open("POST", "devnull.php");
  xhr.overrideMimeType('text/plain; charset=x-user-defined-binary');
  reader.onload = function(evt) {
    xhr.send(evt.target.result);
  };
  reader.readAsBinaryString(file);
}


});
