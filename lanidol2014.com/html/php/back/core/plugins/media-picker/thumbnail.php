<?php
header('Content-Type: image/png');
include('class/SimpleImage.php');
$image = new SimpleImage();

$img_url=(isset($_REQUEST["img"]))? '../../'.$_REQUEST["img"]: NULL;
$width	=(isset($_REQUEST["w"]))? $_REQUEST["w"]: 0;
$height	=(isset($_REQUEST["h"]))? $_REQUEST["h"]: 0;

if(isset($img_url) && $width>0 && $height>0){
	$image->load($img_url);
	
	if($image->getWidth()>$image->getHeight())
		$image->resizeToWidth($width);
	else
		$image->resizeToHeight($height);

	if($image->getWidth()>$width)
		$image->resizeToWidth($width);
	if($image->getHeight()>$height)
		$image->resizeToHeight($height);

}
else
	$image->load("images/notfound.png");

$image->output();
?>