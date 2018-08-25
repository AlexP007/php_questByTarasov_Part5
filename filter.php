<?php
/**
 * Created by PhpStorm.
 * User: alexanderpanteleev
 * Date: 25.08.18
 * Time: 16:09
 */

//массив

$array =  [[ "title" => "Lenovo", "price" => 9e3, "reviews" => 107, "rating" => 11], [ "title" => "iPhone", "price" => 9e4, "reviews" => 120, "rating" => 12], [ "title" => "Samsung", "price" => 5e4, "reviews" => 110, "rating" => 14], [ "title" => "Lenovo", "price" => 2e4, "reviews" => 130, "rating" => 15], [ "title" => "Xiaomi ", "price" => 7e3, "reviews" => 110, "rating" => 13], ];

// принимает ключ для сортировки методом GET

$searchKey =  empty($_GET['key']) ? "title" : $_GET['key'] ;
// анонимная функция

$filter = function($el1,$el2) use ($searchKey){
    return $el1[$searchKey] > $el2[$searchKey]? 1 : -1;
};

// создам свой массив с ключами

/**
 * @param $arr
 * @return array
 */
function createKeys($arr){
    $keys = [];
    foreach($arr as $key => $value){
        
        foreach($value as $key1 => $value1) {
            if( !in_array($key1,$keys) ) {array_push($keys,$key1);} //если ключа нет, добавим его
        }
    }
    return $keys;
}
$keys = createKeys($array);

// создадим ссылки для сортировки

/**
 * @param $arr
 * @return string
 */
function createRef($arr){
    $string='';
    foreach($arr as $value){
        $string .= "<a href='/?key=$value' >$value</a><br>";
    }
    return $string;
}

// функция сортировки

usort($array, $filter);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Выберите ключ для сортировки</h3>
    <p>
    <?= createRef($keys)?>
    </p>
    <h3>Вот массив отсортированный по ключу</h3>
<pre>
    <?php print_r($array); ?>
</pre>
</body>
</html>
