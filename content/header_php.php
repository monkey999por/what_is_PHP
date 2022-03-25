<?php
echo "<a href=\"index.php\">index</a>";
echo "<br>";
for ($i = 1; $i < 6; $i++) {
    echo "<a href=\"phpinfo{$i}.php\">phpinfo{$i}</a>";
    echo "<br>";
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
header( 'Expires: Thu, 01 Jan 1970 00:00:00 GMT' );
header( 'Last-Modified: '.gmdate( 'D, d M Y H:i:s' ).' GMT' );
