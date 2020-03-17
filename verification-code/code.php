<?php
  /**
   * 1.函数创建一个100，30的底图
   * 2.对底图加入颜色区域
   * 3.设置内容和之间的距离
   * 4.添加干扰点数
   * 5.增加干扰线
   * 6.销毁图片
   */
  session_start();

  header('content-type: image/png');

  // 创建底图
  // 默认输出是黑色的背景
  $image = imagecreatetruecolor(100, 30);

  // 创建一个颜色
  $bgcolor = imagecolorallocate($image, 0, 255, 255);

  // 背景色填充
  imagefill($image, 0, 0, $bgcolor);

  $captch_code = '';

  $data = 'abcdefghijklmnopqrstuvwxyz1234567890';
  for($i = 0; $i < 4; $i++) {
    $fontsize = 6;
    $fontcolor = imagecolorallocate($image, rand(0, 120), rand(0, 120), rand(0, 120));
    $fontcontent = substr($data, rand(0, strlen($data)), 1);
    $captch_code .= "$fontcontent";
    $x = ($i * 100 / 4) + rand(5, 10);
    $y = rand(5, 10);
    imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
  }

  $_SESSION['code'] = $captch_code;

  // for($i = 0; $i < 200; $i++) {
  //   $pointcolor = imagecolorallocate($image, rand(50, 200), rand(50, 200), rand(50, 200));
  //   imagesetpixel($image, rand(1, 99), rand(1, 29), $pointcolor);
  // }

  // for($i = 0; $i < 8; $i++) {
  //   $linecolor = imagecolorallocate($image, rand(60, 220), rand(60, 220), rand(60, 220));
  //   imageline($image, rand(1, 99), rand(1, 29), rand(1, 99), rand(1, 29), $linecolor);
  // }

  // 返回图片
  imagepng($image);

  // 销毁
  imagedestroy($image);
?>
