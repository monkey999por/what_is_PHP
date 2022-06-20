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
    section("DB connection");
    try {
        // 事前にphp.iniでextension=pdo_mysqlを有効化する
        $dbhandler = new PDO("mysql:host=localhost:3306;dbname=my_chat;charset=utf8mb4", "root", "sampletest123");

    } catch (\Throwable $th) {
        echo "接続失敗";
        echo $th->getMessage();
    }

    $result = $dbhandler->query("select user_id,user_name,password from user");
    print_f($result->fetch(PDO::FETCH_ASSOC));
    
    section("prepara");
    


    ?>


</body>

</html>