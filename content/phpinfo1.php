<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php include "header_php.php"; ?>
    <?php

    // php設定表示
    //phpinfo();

    // here document
    section('here document');
    $var = 'test';
    print <<< TEST
hello <br> 
this is app {$var} le. bye.
TEST;



    // 文字列結合 .
    section('文字列結合 .');
    print_br('こんにちは。' . 'お元気ですか?');

    printf('-', $_COOKIE);
    print_br();
    echo 'test', 'aaa';
    print_br();
    print 'test' . $uninit;

    // シングルクォートとダブルクォート
    section('シングルクォートとダブルクォート');
    $val1 = "[[value]]";
    print_br('@ hello t\shis is single quote: {$val1}');
    print_br("@ hello t\shis is single quote: {$val1}");

    // deepcopy
    section('deepcopy');
    $var1 = "test1";
    $var2 = $var1;
    print_br('var1: ' . $var1 . ' var2: ' . $var2);

    // shallow copy. $var1 =& $var2
    section('shallow copy. $var1 =& $var2');
    $var2 = &$var1;
    print_br('var2:' . $var2);
    $var1 = "changed";
    print_br('var2:' . $var2);

    // operator
    section('operator');
    $num = 1;
    print $num++;
    print $num;
    print ++$num;
    // string join
    section('string join');
    $str = 'str';
    $str2 = &$str;
    $str .= " add" . $str2;
    print_br($str);
    print_br($str2);

    // constant value　define('TAX', '1.08');
    section('constant value define(\'TAX\', \'1.08\');');
    define('TAX', '1.08');
    print_br(100 * TAX);

    // if
    section("if");
    if (1 === 1) {
        print_br("if true");
    }
    // phpは大文字が基本？
    $ok = TRUE;
    $ng = FALSE;
    if ($ok)
        print_br('$ok: ' . $ok); // 1
    if (!$ng)
        print_br('$ng: ' . $ng); // no value

    // くそみてえなはんてい
    section('くそみてえなはんてい');
    class Blank
    {
    };
    $array = [false, '0', 0, "", [], NULL, new Blank(), new ArrayObject()];
    foreach ($array as $key => $value) {
        var_dump($value);
        print_br('value is ' . ($value ? "ok" : "ng"));
        // var_dump($value);
    }

    // 関係演算子
    section('関係演算子');
    var_dump(1 != 1);
    print_br();
    var_dump(1 <> 1); //!=と同じ

    // 論理演算子
    section("論理演算子");
    print_br(1 && 0 ? "ok" : "ng");
    print_br(1 and 0 ? "ok" : "ng");
    print_br(1 || 0 ? "ok" : "ng");
    print_br(1 or 0 ? "ok" : "ng");
    print_br(1 xor 0 ? "ok" : "ng");
    print_br(!FALSE);

    // switch
    section('switch');
    switch ('ok') {
        case 'ng':
            break;
        case 'ok':
            print_br('ok');
        case 'dummy':
            print_br('dummy');
            break;
        default:
            print_br('default');
            break;
    }

    // 三項演算子
    section('三項演算子 条件式 ? 式1 : 式2');
    print_br('this is pen' === 'this is apple' ? "ok" : 'ng');
    $result = 'apple' >= 'microsoft' ? 'wow' : 'hey';
    print_br($result);
    // phpではこれは出来ないっぽい
    // print_br(

    // FALSE ? "ok" : 
    // 'ok' === 'ng' ? 'nono' :
    // 1 == 1 ? 'ok' : 'ng');

    // while
    section('while');
    $count = 0;
    while ($count < 5) {
        print_br($count);
        $count++;
    };
    $count = 0;
    while (TRUE) {
        print_br('hello' . $count);
        $count++;
        if ($count === 3) break;
    }

    // breakで多階層ループを抜ける
    $count = 0;
    while (TRUE) {
        $count++;
        print_br('-end 1 : count: ' . $count);
        while (TRUE) {
            $count++;
            print_br('-  end 2 : count: ' . $count);
            while (TRUE) {
                $count++;
                if ($count > 10) break 2; // 抜ける階層指定
                print_br('-     end 3 : count: ' . $count);
            }
            if ($count > 20) break;
        }

        if ($count > 30) break;
    }

    // continueも同様
    // continue;
    // continue 2;

    // do while
    section('do while');
    $count = 0;
    do {
        print_br($count);
        echo $count++;
    } while ($count === 9);

    // for
    section('for');
    for ($i = 0; $i < 10; $i++) {
        echo $i;
    }
    // 複数
    for ($x = 0, $y = 0; $x  < 10; $x++, $y++) {
        // echo $x.$y;
        print 'x=' . $x . ',y=' . $y;
        br();
    }
    // foreach
    // 注意する点としては配列の要素そのものを取り出しているわけではなく、要素の値を変数にコピーして代入しているだけという点です。
    section('foreach');
    $preflist = array('tokyo', 'osaka', 'nagoya');
    foreach ($preflist as $pref) {
        print $pref;
        br();
    }
    // foreach key=> value
    section('foreach key=> value');
    foreach ($preflist as $key => $value) {
        print $key . '=' . $value;
        br();
    }

    // 非推奨？
    // foreach文で配列要素の値を変更する
    section('foreach文で配列要素の値を変更する');
    // リファレンス渡し
    $changed_list = array('befor1', 'before2', 'befor3');
    foreach ($changed_list as $key => &$ref) {
        $ref = 'new_value' . $key;
    }
    // 今回は要素の値に対する参照を取得し、各要素の値を1.05倍して再度格納しています。最後に「unset」関数を呼び出しているのは、foreach文が終了しても変数「value」には配列の最後の要素に対する参照が設定されたままのため、その後のプログラムで間違って要素の値を書き換えないように変数の割り当てを明示的に解除しています。
    unset($ref);
    var_dump($changed_list);
    br();
    // 値渡し
    $base_list = array('befor1', 'before2', 'befor3');
    foreach ($base_list as $key => $value) {
        $value = 'new_value' . $key;
    }
    var_dump($base_list);

    // 配列
    section('配列');
    $arr[0] = 0;
    $arr[1] = 1;
    $arr[2] = 2;
    var_dump($arr);
    br();
    foreach ($arr as $key => $val) {
        echo $key . '=' . $val;
        br();
    }
    print_r($arr);
    section('key, value をこんな感じでもかける');
    // key, value をこんな感じでもかける
    $ar = array('test' => 'OK', 'test2' => 'NG');
    foreach ($ar as $key => $value) {
        print($key.'='.$value);
    }
    
    // 複数の要素を作成する場合、キーは連続した整数である必要はありません。
    section('いろんな配列のキー');

    $vars[0] = 14;
    $vars[2] = 'Tokyo';
    $vars[-4] = 8400;

    // 文字列キー
    $vars['tako'] = 'たこたこ';
    $vars['ika'] = 'いか';
    $vars['tanuki'] = 'たぬき';

    // var key
    $key = 'key';
    $vars[$key] = 'var key';
    // 変数展開キー
    $key_val = "key_desuyo";
    $vars["koreha_{$key_val}"] = $key_val . 'value';
    // 定数　キー
    define('CONST_KEY', 'const_key');
    $vars[CONST_KEY] = '114514}_value';
    foreach ($vars as $key => $value) {
        echo "vars[{$key}]={$value}";
        br();
    }

    ?>
</body>

</html>