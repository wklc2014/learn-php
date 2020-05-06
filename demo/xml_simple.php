<?php

  $data = array(
    array(
      'name' => '张三',
      'city' => '绵阳',
      'sex' => '男',
      'time' => '2016-07-12',
    ),
    array(
      'name' => '李四',
      'city' => '成都',
      'sex' => '女',
      'time' => '2019-07-12',
    ),
    array(
      'name' => '赵六',
      'city' => '乐山',
      'sex' => '男',
      'time' => '2020-03-12',
    ),
  );

  $string = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<dom></dom>
XML;

  $books = new SimpleXMLElement($string);

  foreach ($data as $_data) {
    $book = $books -> addChild('book');

    foreach ($_data as $tag => $value) {
      $tmp = $book -> addChild($tag, $value);

      if ($tag === 'city' && $value === '成都') {
        $tmp -> addAttribute('province', '四川省');
      }

    }

  }

  echo $books->asXML('name_simple.xml');
?>
