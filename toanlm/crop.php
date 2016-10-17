<?php 
require_once '../lib/WideImage.php';
$sourceFolder = "images";

$sourceImage = $sourceFolder . '/' .'img.jpg';
$image = WideImage::load($sourceImage);

// watermark
$sourceWatermark = $sourceFolder . '/' .'watermark.png';
$watermark = WideImage::load($sourceWatermark);

// crop
$cropped = $image->resize(300, 200)->crop('center', 'center', 200, 250);

$targetFolder = "cropped";
$targetImage = $targetFolder . '/' . 'cropped.jpg';
$cropped->saveToFile($targetImage);

$cropped->output('jpg', 100);

// merge watermark
$merge = $image->merge($watermark, 'left + 500', 'top + 200', 150);

$targetMFolder = "merged";
$targetMerge = $targetMFolder . '/' . 'merged.jpg';
$merge->saveToFile($targetMerge);
$merge->output('jpg', 100);
?>