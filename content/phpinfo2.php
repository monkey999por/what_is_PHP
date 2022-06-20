<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpinfo2</title>
</head>

<body>
    <?php

    use FFI\Exception;

    include "header_php.php"; ?>
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

    section('関数');
    section('関数の使い方');
    function check(string $kyoka, int $score = 0)
    {
        if ($kyoka === null)
            return;
        $gouhi = $score >= 60 ? "合格" : "不合格";
        print "教科: {$kyoka}, 得点: {$score}, 結果: {$gouhi}";
        br();
    }

    check("国語", 59);
    check("数学", 80);
    check("科学", 60);

    section("クラス");

    define('AIR_FROW_TYPE', array('弱', '中', '強'));
    define('RHYTHM_TYPE', array('nomal', 'constant', 'random'));

    $eFun = new ElectricFan();
    $eFun->power();
    $eFun->set_airFrow(1);
    $eFun->set_rhythm(2);
    $eFun->set_timer(120);
    $eFun->info();
    $eFun->power();
    // 扇風機
    class ElectricFan
    {
        private bool $switch = false;
        private int $timer = 0;
        private int $airFrow = 0;
        private int $rhythm = 0;

        // constant value in class
        private const type = 'E_FUN01';

        // constracter
        public function __construct()
        {
            section("constracter");
        }

        function power()
        {
            $this->switch = !$this->switch;
            if ($this->switch) {
                print_br("Electric fun started");
                $this->info();
            } else {
                print_br("Electric fun stopd");
            }
        }
        public function info()
        {
            // refrence constant value
            // ※「self」はカレントクラスを表します。「$this」はオブジェクト毎ですけど「self」はクラスとして考える場合に使います。
            print_br("type: " . self::type);
            print_br("timer: {$this->timer}");
            print_br("airFrow: " . AIR_FROW_TYPE[$this->airFrow]);
            print_br("rhythm: " . RHYTHM_TYPE[$this->rhythm]);
        }

        public function set_timer(int $time)
        {
            if ($time == null) {
                throw new Exception("Error Processing Request", 1);
            }
            if ($time < 0) {
                throw new Exception("Error Processing Request", 1);
            }
            $this->timer = $time;
        }

        public function set_airFrow(int $level)
        {
            if ($level === null)
                throw new Exception("Error Processing Request", 1);

            if ($level < 0 || $level >= sizeof(AIR_FROW_TYPE)) {
                throw new Exception("Error Processing Request", 1);
            }
            $this->airFrow = $level;
            print "set_airFrow done. level: {$this->airFrow}<br>";
        }
        public function set_rhythm(int $level)
        {
            if ($level === null)
                throw new Exception("Error Processing Request", 1);

            if ($level < 0 || $level >= sizeof(AIR_FROW_TYPE)) {
                throw new Exception("Error Processing Request", 1);
            }
            $this->rhythm = $level;
            print "set_rhythm done. level: {$this->rhythm}<br>";
        }
    }






    ?>

</body>


</html>