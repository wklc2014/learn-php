<?php

  require("VerificationCode.class.php");

  $image = new VerificationCode();
  $im = $image->getCodeImage();

  $text = $image->random();

  // echo $text;

  @header("Content-Type:image/png");
  imagepng($im);
  imagedestroy($im);

?>
