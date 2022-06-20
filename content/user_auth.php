<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

// use function PHPSTORM_META\type;

 include "header_php.php"; ?>
    <?php
    section("ユーザ認証");

    print_br( gettype($_SERVER));

    print_f($_FILES);
    print_f($_SERVER);
    
    // unset($_SERVER['PHP_AUTH_USER']);
    // 認証ダイアログ
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="Private Page"');
        header('HTTP/1.0 401 Unauthorized');
        die('ログインしてください');

    } else {
        print_br("ようこそ{$_SERVER['PHP_AUTH_USER']}さん");
    }

    ?>
</body>

</html>