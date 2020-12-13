<?php include_once("header.php");
include_once("classes/UploadData.php");
include_once("classes/VidProcessor.php");

//check if form is submitted or button is pressed

if(!isset($_POST['uploadButton'])) {
    echo "no form data has been sent";
}

$uploadData = new UploadData(
    $_FILES['fileInput'], 
    $_POST['titleInput'], 
    $_POST['descInput'],
    $_POST['privacyInput'], 
    $_POST['categoryInput'], "replacing by");
$vidProcessor = new VidProcessor($con);
$wasSuccessful = $vidProcessor->upload($uploadData);

if ($wasSuccessful) {
    echo "Video uploaded successfully";
}
?>