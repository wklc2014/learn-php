<?php
  header("Content-Type: text/xml");

  $books = array(
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

/*
  $xmlstr = <<<XML
<?xml version="1.0" encoding="ISO-8859-1"?>
<note>
  <to>Tove</to>
  <from>Jani</from>
  <heading>Reminder</heading>
  <body>Don't forget me this weekend!</body>
</note>
XML;

echo $xmlstr;
*/
  echo '<?xml version="1.0" encoding="ISO-8859-1"?>' . "\n";
  echo "<books>\n";

  foreach ($books as $book) {
    echo "<book>\n";

    foreach ($book as $tag => $value) {
      echo "<$tag>" . htmlspecialchars($value) . "</$tag>\n";
    }

    echo "</book>\n";
  }

  echo "</books>";

?>
