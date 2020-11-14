<?php
$directory = "media";
$images = glob($directory . "/*.jpg");

foreach($images as $image)
{
echo $image;
}
?>
