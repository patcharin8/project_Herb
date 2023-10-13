<?php
if(isset($_POST['submit'])) {
$target_dir = "../../project1/uploads/";
$filePicUrl = "";

// upload picture
if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['size'] > 0) {
  $pictureExtention = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
  if (!in_array($pictureExtention, ["png", "jpg"])) {
    echo "กรุณาเลือกไฟล์ .png หรือ .jpg เท่านั้น";
    exit;
  }

  $filename = uniqid() . "." . $pictureExtention;
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir" . $filename)) {
    // $filePicUrl = "http://localhost/koreanUp/uploads/course/" . $filename;
    echo 'upload success';
    exit;
  }
}

}
?>
<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>