<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpinfo2</title>
</head>

<body>
    <?php include "header_php.php"; ?>
    <?php
    section('キーの自動付与aaabb');
    // 数値が順番に
    $ary[] = "value1";
    $ary[] = "value2";
    print_r($ary);
    br();
    // 現在持っているキーの中で最大の数値の次の値を自動付与
    $ary[12] = "value12";
    $ary['str'] = "str13";
    $ary[] = "non-specified-key";
    print_r($ary);
    br();

    section('多次元配列');
    section('二次元');
    $x = array(10, 20, 30, 40);
    $y = array(3, 6, 9, 12);
    $z = array(
        'low' => 1000,
        'moddle' => 2000,
        'high' => 3000
    );
    // 二次元
    $tow_dim = array($x, $y);
    echo $tow_dim[1][3];
    br();
    var_dump($tow_dim);
    // 三次元
    section('三次元');
    $three_dim = array($tow_dim, $z);
    br();
    echo $three_dim[0][0][2];
    br();
    echo '<pre>';
    var_dump($three_dim);
    echo '</pre>';
    br();
   
    echo '<pre>';
    echo json_encode(
        $three_dim,
        JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );
    echo '</pre>';
    echo 'test';
    echo '123';
    echo 345679;
    br();
    echo 876;
    echo 876;
    echo 876;
    echo 'ok';

    ?>

</body>

</html>