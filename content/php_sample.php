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
    <?php section("入力フォーム"); ?>
    <form action="./php_sample_l.php" method="POST">
        <input type="text" name="text1" value="<?php if (isset($form_data["text1"])) {
                                                    echo $form_data["text1"];
                                                } ?>">
        <input type="submit" value="送信">
    </form>







</body>

</html>