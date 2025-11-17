<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);

$myAge = function($year){
    $age = date("Y") - $year;
    return "<h5>Você tem {$age} anos de idade</h5>";
};

echo $myAge(1900);
echo $myAge(1997);
echo $myAge(2000);
echo $myAge(2005);

$priceBrazil = function($price){
    return "R$" . number_format($price, 2, ',', '.');
};

echo "<p>O projeto custa {$priceBrazil(3600)}! Vamos fechar?</p>";

$myCart = [];

$myCart["totalPrice"] = 0;
$cartAdd = function($item, $qtd, $price) use (&$myCart){
    $myCart[$item] = $qtd * $price;
    $myCart["totalPrice"] += $myCart[$item];
};

$cartAdd("HTML5", 1, 297);
$cartAdd("CSS3", 1, 197);
$cartAdd("JavaScript", 1, 497);
$cartAdd("PHP", 1, 997);

var_dump($myCart, $cartAdd);

/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);

$iterator = 4000;
function showDates($days){
    $saveDate= [];

    for($day = 1; $day < $days; $day++){
        $saveDate[] = date("d/m/Y", strtotime("{$day}days"));
    }

    return $saveDate;
}

echo "<div style='text-align: center;'>";
foreach(showDates(0) as $date){
    echo "<small class='tag'>{$date}</small>\n";
}
echo "</div>";

function generatorDates($days)
{
    for($day = 1; $day < $days; $day++){
        yield date("d/m/Y", strtotime("{$day}days"));
    }
}

echo "<div style='text-align: center;'>";
foreach(generatorDates($iterator) as $date){
    echo "<small class='tag'>{$date}</small>\n";
}
echo "</div>";