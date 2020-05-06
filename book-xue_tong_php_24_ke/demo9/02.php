<?php
session_start();

function output($value, $text = "") {
    echo $text . "的值是：" . $value . "<br />";
}

function filterInput($name) {
    $post_value = filter_input(INPUT_POST, $name);
    $session_value = $_SESSION[$name];
    
    if ($post_value) {
        return $post_value;
    }

    return $session_value;
}
        
$submit = filterInput("submit");
$user_name = filterInput("user_name");
$user_pass = filterInput("user_pass");


output($user_name, "用户名");
output($user_pass, "密码");

if ($submit === '提交') {
    
    if ($user_name && $user_pass) {
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_pass'] = $user_pass;
        
        echo "<script>window.location.href = '02-01.php';</script>";
    }
}


echo "session>>>";
print_r($_SESSION);
echo "<br />";

echo "post>>>";
print_r($_POST);
echo "<br />";

?>

<html>
    <head>
        <title>index</title>
        <link rel="stylesheet" href="../../assets/uikit-v3.2.2/css/uikit.min.css"/>
    </head>
    <body style="padding-top: 24px;">
        <div class="uk-container">
            <form action="02.php" method="POST" style="width: 300px;">
                <div class="uk-margin">
                    <label class="uk-form-label" for="user_name">用户名：</label>
                    <input class="uk-input" id="user_name" type="text" name="user_name" placeholder="请输入用户名" value="<?=$user_name?>" />
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="user_pass">密码：</label>
                    <input class="uk-input" id="user_pass" type="password" name="user_pass" placeholder="请输入密码" value="<?=$user_pass?>" />
                </div>
                <div class="uk-margin">
                    <input class="uk-button uk-button-primary uk-width-1-1" type="submit" name="submit" value="提交" />
                </div>
                <div class="uk-margin">
                    <a href="02-01.php" class="uk-button uk-button-secondary uk-width-1-1">跳转</a>
                </div>
            </form>
        </div>
    </body>
</html>


