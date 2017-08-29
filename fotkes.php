<?php
include 'headeris.html';

echo '
<form action="uploadphoto.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>';


// for jpg
function resize_imagejpg($file, $w, $h) {
   list($width, $height) = getimagesize($file);
   $src = imagecreatefromjpeg($file);
   $dst = imagecreatetruecolor($w, $h);
   imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
   return $dst;
}

 // for png
function resize_imagepng($file, $w, $h) {
   list($width, $height) = getimagesize($file);
   $src = imagecreatefrompng($file);
   $dst = imagecreatetruecolor($w, $h);
   imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
   return $dst;
}

// for gif
function resize_imagegif($file, $w, $h) {
   list($width, $height) = getimagesize($file);
   $src = imagecreatefromgif($file);
   $dst = imagecreatetruecolor($w, $h);
   imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
   return $dst;
}
Now let's handle the upload part. First step, upload the file to your desired directory. Then called one of the above functions based on file type (jpg, png or gif) and pass the absolute path of your uploaded file as below:

 // jpg  change the dimension 750, 450 to your desired values
 $img = resize_imagejpg('path/image.jpg', 750, 450);
The return value $img is a resource object. We can save to a new location or override the original as below:

 // again for jpg
 imagejpeg($img, 'path/newimage.jpg');

include 'footeris.html';


?>
