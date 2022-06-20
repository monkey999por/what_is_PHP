<script type="text/javascript">
    // const timer = 1000    // ミリ秒で間隔の時間を指定
    // window.addEventListener('load',function(){
    //   setInterval('location.reload()',timer);
    // });
</script>
<?php
echo "<a href=\"index.php\">index</a>";
echo "<br>";
// 目次
exec("dir /S /B .\*.php", $result);

foreach ($result as $page) {
    $file_name = pathinfo($page, PATHINFO_BASENAME);    
    print_br("<a href=\"{$file_name}\">{$file_name}</a>");
}

function br()
{
    print '<br>';
}
function section(string $section = "unknown")
{
    print '<br>■ ' . $section . '<br>';
}
function print_br(mixed $str = "")
{
    if ($str === "") {
        br();
    } else {
        print $str;
        br();
    }
}

// cache無効か
header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');

function print_f(array $ary)
{
    foreach ($ary as $key => $value) {
        print_br("{$key} :  {$value}");
    }
}

// クラス名や名前空間の先頭・冒頭につけるバックスラッシュ「\」は、グローバル空間であることを明示するという役割です。
