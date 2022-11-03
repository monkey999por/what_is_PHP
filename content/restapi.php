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
    // 連想配列用意
    $array = [
        'A' => [
            'hello',
            'world',
            'OK'
        ],
        'B' => [
            'test',
            'object'
        ]
    ];
    
    // Origin null is not allowed by Access-Control-Allow-Origin.とかのエラー回避の為、ヘッダー付与
    header("Access-Control-Allow-Origin: *");
    sleep(3);
    
    echo json_encode($array);
    ?>
    
</body>
</html>