<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include "header_php.php"; ?>

<body>
    <?php
    section("セッション管理");
    session_start();   

    if (!isset($_COOKIE["PHPSESSID"])) {
        print_br("セッションを開始");

        $_SESSION["visited"] = 1;
    } else {
        print_br("セッション継続中");
        print_br("セッションID: " . session_id());

        $_SESSION["visited"] += 1;
    }
    print_br($_SESSION["visited"]);

    section("セッション削除");
    if ($_SESSION["visited"] > 5) {
        unset($_SESSION["visited"]);
        // session事態を削除　※$_SESSIONをアンセットしないこと
        $_SESSION = array();

        // クッキーからセッションID削除
        // if (isset($_COOKIE['PHPSESSID'])) {
        //     setcookie("PHPSESSID", "", time() - 60);
        // }

        // セッションの全データ削除
        session_destroy();
    }

    session_regenerate_id(true);
    ?>
</body>

</html>