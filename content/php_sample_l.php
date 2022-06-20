<?php
echo "post data: " . $_POST["text1"];
setcookie("form-data[text1]", $_POST["text1"]);
?>
<br>
<br>
<a href="php_sample.php">戻る</a>