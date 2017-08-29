<?php
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

//make thumb
function make_thumb($src,$dest,$desired_width) {
	/* read the source image */
	$source_image = imagecreatefromjpeg($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height*($desired_width/$width));
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width,$desired_height);
	/* copy source image at a resized size */
	imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
	/* create the physical thumbnail image to its destination */
	imagejpeg($virtual_image,$dest);
}
//make thumb png
//make thumb
function make_thumbpng($src,$dest,$desired_width) {
	/* read the source image */
	$source_image = imagecreatefrompng($src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	/* find the "desired height" of this thumbnail, relative to the desired width  */
	$desired_height = floor($height*($desired_width/$width));
	/* create a new, "virtual" image */
	$virtual_image = imagecreatetruecolor($desired_width,$desired_height);
	/* copy source image at a resized size */
	imagecopyresized($virtual_image,$source_image,0,0,0,0,$desired_width,$desired_height,$width,$height);
	/* create the physical thumbnail image to its destination */
	imagepng($virtual_image,$dest);
}


//$images_dir = 'mediateka/Dideles/';
$thumbs_dir = 'mediateka/Mazos/';
$thumbs_width = 150;
$images_per_row = 4;
//save image
  function save_image($img,$fullpath){
	$ch = curl_init ($img);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	$rawdata=curl_exec($ch);
	curl_close ($ch);
	if(file_exists($fullpath)){
		unlink($fullpath);
	}
	$fp = fopen($fullpath,'x');
	fwrite($fp, $rawdata);
	fclose($fp);
}

?>
