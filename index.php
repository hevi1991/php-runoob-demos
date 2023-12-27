<!DOCTYPE html>
<html>

<body>

    <h1>My first PHP page</h1>

    <?php
    echo "Hello World!";
    // 注释
    /* 多行
    注释 */
    ?>
    <hr>

    <h1>变量</h1>
    <?php
    // 格式：
    // $字母大小写、数字、下划线
    $x = 5;
    $y = 6;
    $z = $x + $y;
    echo $z;
    ?>
    <hr />

    <h1>作用域</h1>
    <?php
    // 在所有函数外部定义的变量，拥有全局作用域。
    // 除了函数外，全局变量可以被脚本中的任何部分访问，要在一个函数中访问一个全局变量，需要使用 global 关键字。
    $v = 11;
    function my_test()
    {
        $y = 10;
        // 使用 global 关键字声明其为全局变量
        global $v;
        echo "变量 y 为 $y";
        echo "<br/>";
        echo "变量 v 为 $v";
        echo "<br/>";
        // $GLOBALS 对象，与global关键字作用相同
        echo $GLOBALS['x'] + $y;
    }
    my_test();
    echo "<hr />";
    echo "变量 y 为 $y";
    echo "<br/>";
    echo "变量 v 为 $v";
    echo "<br/>";
    function static_area_test()
    {
        // static 声明后，不被删除，且仅赋值一次
        static $x = 0;
        $x++;
        echo "$x; ";
    }
    static_area_test();
    static_area_test();
    static_area_test();
    ?>
    <hr />

    <h1>echo 和 print</h1>
    <?php
    // echo 支持多个参数，没有返回值
    echo "a", "b", "c", "<br/>";
    // print 只支持一个参数，返回值1
    print "A";
    echo "<hr/>";

    ////  EOF(heredoc) 使用说明，大概是多行文本？
    $name = "Linda";
    echo <<<EOF
    <h2>我的第一个标题 $name</h2>
    <p>我的第一个段落</p>
    EOF;
    ?>
    <hr />

    <h1>数据类型</h1>
    <?php
    // 字符串类型
    $t_string = "hello world";
    // 整型
    $t_int = 112233;
    // 浮点型
    $t_float = 3.1415;
    // 布尔类型
    $t_bool_true = true;
    $t_bool_false = false;
    // 数组
    $t_arr = array("Volvo", "BMW", "Toyota");
    // 对象
    class Clazz
    {
        var $color;
        // 构造函数
        function __construct($color = "green")
        {
            // 参数默认值
            $this->color = $color;
        }

        function what_color()
        {
            // 取对象值
            return $this->color;
        }
    }
    $t_class = new Clazz("red");
    echo "class->color:", $t_class->what_color(), "<br/>";
    // 空值
    $t_null = null;
    // 验证值的函数 var_dump
    echo var_dump($t_string), "<br/>";
    echo var_dump($t_int), "<br/>";
    echo var_dump($t_float), "<br/>";
    echo var_dump($t_bool_true), "<br/>";
    echo var_dump($t_arr), "<br/>";
    echo var_dump($t_class), "<br/>";
    echo var_dump($t_null), "<br/>";
    // 资源类型
    // 资源 resource 是一种特殊变量，保存了到外部资源的一个引用。
    $fp = fopen("foo", "r");
    echo get_resource_type($fp); // stream
    
    echo "<hr/>";
    ?>

    <h1>类型比较</h1>
    <?php
    // 松散比较
    if (42 == "42") {
        echo '1、值相等';
    }
    // 严格比较
    if (42 === "42") {
        echo '2、类型相等';
    } else {
        echo '3、类型不相等';
    }
    echo "<hr/>";
    ?>

    <h1>常量</h1>
    <?php
    // 设置常量，使用 define() 函数
    define("GREETING", "Hey, Welcome;");
    echo GREETING;
    // 常量的作用域是全局的
    function test_const()
    {
        echo GREETING;
    }
    test_const();
    ?>

    <h1>字符串</h1>
    <?php
    $txt = "Hello world!";
    echo $txt;
    echo "<br/>";
    // 用.串联字符串
    $txt2 = "what a nice day!";
    echo $txt . " " . $txt2 . "<br/>";
    // 查询字符串长度
    echo "length: " . strlen("Hello world!") . "<br/>";
    // 查询字符串下标
    echo "world start with index: " . strpos("Hello world!", "world");
    ?>

    <h1>运算符</h1>
    <?php
    // 字符串使用.相加
    echo "abc" . "def" . "<br/>";

    // 整除 intdiv(被除数, 除数) 返回向下取整的结果
    echo intdiv(10, 3);
    echo "<br/>";

    // 数组运算符
    $x = array('a' => 'red', 'b' => 'green');
    $y = array('c' => 'blue', 'd' => 'yellow');
    // 数组键值对相等
    var_dump($x == $y);
    // 数组键值对且顺序相等
    var_dump($x === $y);
    // 数组不相等
    var_dump($x != $y);
    // 数组相加
    $z = $x + $y;
    echo var_dump($z);

    // 三元运算符
    // 除了【条件?真返回:假返回】之外，还
    // 可以省略条件返回值的中值
    // $v = $c ?: 'novalue';
    
    // 组合比较符 PHP7+
    $a = 1;
    $b = 2;
    // 大于则为1，等于为0，小于为-1
    $d = $a <=> $b; // -1
    $e = $a <=> $d; // 0
    $f = $b <=> $a; // 1
    
    // 条件优先级，建议使用括号，增加可读性
    ?>
</body>

</html>