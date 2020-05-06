<?php
$name_1 = '张三';
$name_2 = &$name_1;

echo $name_2 . '<br />';

$name_1 = '李四';

echo '$name_1 = ' . $name_1 . '<br />';
echo '$name_2 = ' . $name_2 . '<br />';
?>
