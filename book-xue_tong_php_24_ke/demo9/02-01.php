<?php
session_start();

print_r($_SESSION);

if (isset($_SESSION['user_name']) && isset($_SESSION['user_pass'])) {
    echo "<p>欢迎<b>" . $_SESSION['user_name'] . "</b>光临，祝你愉快！</p>";
    echo "<p>密码是：" . $_SESSION['user_pass'] . "</p>";
} else {
    echo '不存在SESSION变量！';
}
?>
<html>
    <head>
        <title>form</title>
        <link rel="stylesheet" href="../../assets/uikit-v3.2.2/css/uikit.min.css"/>
  </head>
  <body style="padding-top: 16px;">
      <div class="uk-container">
          <a href="02.php" class="uk-button uk-button-secondary">返回</a>
      </div>
    </body>
</html>
