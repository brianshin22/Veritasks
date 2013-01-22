
var config = {
// Valid file formats
support : "image/jpg,image/png,image/bmp,image/jpeg,image/gif", 
form: "addListing", // Form ID
dragArea: "dragAndDropFiles", // Upload Area ID
uploadUrl: "devnull.php" // Server side file url
}
//Initiate file uploader.
$(document).ready(function()
{
initMultiUploader(config);
});
