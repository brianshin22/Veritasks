$(document).ready(function(){

$("#filepicker").change(function(){
    var out='';
    var len = event.fpfiles.length;
    for(var i=0;i<len - 1;i++)
    {out+=event.fpfiles[i].url;out+=' '};
    out+=event.fpfiles[i].url;
    $("#imageurls").val(out);
    $("#nupload").html(len + " photos uploaded");
});

});
