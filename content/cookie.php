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
    section("クッキーの利用");
    setcookie("cookie1", "cookvalue1");
    

    // 削除
    // 過去日付を指定すれば消える
    setcookie("cookie1", "", time() - 60);

    // 複数のcookie
    setcookie("ary[1]", "1");
    setcookie("ary[2]", "2");
    setcookie("ary[3]", "3");
    print_f($_COOKIE["ary"]);
    ?>
</body>

</html>