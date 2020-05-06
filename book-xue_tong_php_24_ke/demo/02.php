<?php
  // print_r($_POST);
  $user_name = $_POST['user_name'];
  $user_password = $_POST['user_password'];
  if (isset($_POST['submit']) && $_POST['submit'] === '提交') {
    if (empty($user_name) || empty($user_password)) {
      echo "<script>alert('用户名或密码不能为空！')</script>";
    } else {
      echo "输入的用户名为: " . $user_name . " <br/>";
      echo "密码为：" . $user_password . "<br />";
      echo "密码长度为：" . strlen($user_password) . "<br />";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>form</title>
  <link rel="stylesheet" href="../../assets/uikit-v3.2.2/css/uikit.min.css">
</head>
<body style="padding-top: 24px;">
<div class="uk-container">
  <form class="uk-form-stacked" style="width: 300px;" action="02.php" method="POST">
    <div class="uk-margin">
        <label class="uk-form-label" for="user_name">用户名：</label>
        <div class="uk-form-controls">
          <input type="text" class="uk-input" id="user_name" name="user_name" placeholder="请输入用户名" />
        </div>
    </div>
    <div class="uk-margin">
      <label class="uk-form-label" for="user_password">密码：</label>
        <div class="uk-form-controls">
          <input type="password" class="uk-input" id="user_password" name="user_password" placeholder="请输入密码" />
        </div>
    </div>
    <div class="uk-margin">
      <div class="uk-form-controls">
        <input type="submit" class="uk-button uk-button-primary uk-width-1-1" name="submit" value="提交" />
      </div>
    </div>
</form>
</div>
</body>
</html>
