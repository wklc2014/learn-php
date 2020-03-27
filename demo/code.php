<?php
  $image_file = "../assets/images/pic.jpg";

  $img = getimagesize($image_file);

  // var_dump($img);

  $image = @imagecreatetruecolor(100, 30) or die("无法初始化GD图形库");

  $background_color = imagecolorallocate($image, 255, 0, 0);

  var_dump($background_color);

?>
