<?php
/**
 * create session
 * 1. start 
 * 2. register 
 * 3. use
 * 4. cancel
 */
session_start();
$_SESSION["simple"] = "赵六";
$_SESSION["明日科技"] = "mrkj";

//$id = session_id();
//
//if (isset($id)) {
//    echo $_SESSION["mr"];
//} else {
//    $_SESSION["mr"] = "123";
//}

//$time = 1 * 60;
//$_SESSION["user_name"] = "张三";

//$path = "./session_files/";
//session_save_path($path);
//session_start();
//setcookie("local_name", "123", time() + 10);

function deleteCookie() {
    setcookie("local_name", "");
}

?>
<html>
    <head>
        <title>session</title>
    </head>
    <body>
        <?php echo $_SESSION["user_name"] ?>
        <p>
            <input type="button" value="按钮" onclick="<?php deleteCookie; ?>" />
        </p>
    </body>
</html>

