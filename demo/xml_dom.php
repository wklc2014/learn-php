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

  $dom = new DOMDocument('1.0', 'utf-8');

  $books = $dom -> appendChild($dom -> createElement('books'));

  // $name = $book -> appendChild($dom -> createElement('name'));
  // $name -> appendChild($dom -> createTextNode('张三'));

  // $city = $book -> appendChild($dom -> createElement('city'));
  // $city -> appendChild($dom -> createTextNode('绵阳'));
  // $city -> setAttribute('province', '四川省');

  // $sex = $book -> appendChild($dom -> createElement('sex'));
  // $sex -> appendChild($dom -> createTextNode('男'));

  // $time = $book -> appendChild($dom -> createElement('time'));
  // $time -> appendChild($dom -> createTextNode('2016-07-12'));

  foreach ($data as $_data) {
    $book = $books -> appendChild($dom -> createElement('book'));

    foreach ($_data as $tag => $value) {
      $tmp = $book -> appendChild($dom -> createElement($tag));
      $tmp -> appendChild($dom -> createTextNode($value));

      if ($tag === 'city' && $value === '成都') {
        $tmp -> setAttribute('province', '四川省');
      }

    }
  }

  $dom -> formatOutput = true;

  // echo $dom -> saveXML();
  echo $dom -> save('name2.xml');
?>
