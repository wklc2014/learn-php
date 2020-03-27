<?php
  // 输入验证码

  class VerificationCode {

    function random($len = 4) {
      $source_string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      $source_string_length = strlen($source_string);
      $strings = "";
      for ($i = 0; $i < $len; $i++) {
        $x = mt_rand(0, $source_string_length - 1);
        $text = $source_string[$x];
        $strings .= $text;
      }
      return $strings;
    }

    function __construct() {
      $this->width = 100;
      $this->height = 30;
      $this->code_length = 4;
      $this->back_color = array(35, 219, 235);
      $this->pix_color = array(187, 230, 247);
      $this->font_color = array(0, 255, 255);
      $this->pix_length = 1000;
    }

    function getCodeImage() {
      $width = $this->width;
      $height = $this->height;
      $code_length = $this->code_length;
      $back_color = $this->back_color;
      $pix_color = $this->pix_color;
      $font_color = $this->font_color;
      $pix_length = $this->pix_length;

      $back_red = $back_color[0];
      $back_green = $back_color[1];
      $back_blue = $back_color[2];

      // print_r($font_color);

      $pix_red = $pix_color[0];
      $pix_green = $pix_color[1];
      $pix_blue = $pix_color[2];

      $font_red = $font_color[0];
      $font_green = $font_color[1];
      $font_blue = $font_color[2];

      $text = $this->random($code_length);

      $im = imagecreatetruecolor($width, $height);
      $back = imagecolorallocate($im, $back_red, $back_green, $back_blue);
      $pix = imagecolorallocate($im, $pix_red, $pix_green, $pix_blue);
      $font = imagecolorallocate($im, $font_red, $font_green, $font_blue);

      for ($i = 0; $i < $pix_length; $i++) {
        // imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $pix);
      }

      imagestring($im, 5, 7, 5, $text, $font);
      imagerectangle($im, 0, 0, $width - 1, $height - 1, $font);

      return $im;
    }
  }
?>
