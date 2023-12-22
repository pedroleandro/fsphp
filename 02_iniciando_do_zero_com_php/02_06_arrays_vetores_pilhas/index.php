<?php
require __DIR__ . '/../fullstackphp/fsphp.php';
fullStackPHPClassName("02.06 - Arrays, vetores e pilhas");

/**
 * [ arrays ] https://php.net/manual/pt_BR/language.types.array.php
 */
fullStackPHPClassSession("index array", __LINE__);

$arrayA = array(1, 2, 3);
$arrayA = [0, 1, 2, 3];
var_dump($arrayA);

$arrayIndex = [
    "Brian",
    "Angus",
    "Malcolm"
];

$arrayIndex[] = "Cliff";
$arrayIndex[] = "Phil";

var_dump($arrayIndex);

/**
 * [ associative array ] "key" => "value"
 */
fullStackPHPClassSession("associative array", __LINE__);

$arrayAssoc = [
    "vocal" => "Brian",
    "solo_guitar" => "Angus",
    "base_guitar" => "Malcolm",
    "bass_guitar" => "Cliff"
];

$arrayAssoc["drums"] = "Phil";
$arrayAssoc["rock_band"] = "AC/DC";

var_dump($arrayAssoc);

/**
 * [ multidimensional array ] "key" => ["key" => "value"]
 */
fullStackPHPClassSession("multidimensional array", __LINE__);

$brian = ["Brian" => "mic"];
$angus = ["name" => "Angus", "Instrument" => "Guitar"];
$instruments = [
    $brian,
    $angus
];
var_dump($instruments);

var_dump([
    "Brian" => $brian,
    "Angus" => $angus
]);

/**
 * [ array access ] foreach(array as item) || foreach(array as key => value)
 */
fullStackPHPClassSession("array access", __LINE__);

$acdc = [
    "band" => "AC/DC",
    "vocal" => "Brian",
    "solo_guitar" => "Angus",
    "base_guitar" => "Malcolm",
    "bass_guitar" => "Cliff",
    "drums" => "Phil"
];

echo "<p>O vocal da banda AC/DC é {$acdc['vocal']}, e junto com o {$acdc['solo_guitar']} fazem um ótimo show de rock</p>";

$pearl = [
    "band" => "Pearl Jam",
    "vocal" => "Eddie",
    "solo_guitar" => "Mike",
    "base_guitar" => "Stone",
    "bass_guitar" => "Jeff",
    "drums" => "Jack"
];

$rockBands = [
    "acdc" => $acdc,
    "pearl_jam" => $pearl
];

var_dump($rockBands);

echo "<p>{$rockBands['pearl_jam']['vocal']}</p>";

foreach ($acdc as $artist){
    echo "<p>{$artist}</p>";
}

foreach ($acdc as $key => $value){
    echo "<p>{$value} é o {$key} da banda!</p>";
}

foreach ($acdc as $function => $artist){
    echo "<p>{$artist} é o {$function} da banda!</p>";
}

foreach ($rockBands as $rockBand){
    var_dump($rockBand);
    $artist = "<article><h1>%s</h1><p>%s</p><p>%s</p><p>%s</p><p>%s</p><p>%s</p></article>";
    vprintf($artist, $rockBand);
}

// Desafio: exibir os integrantes de cada banda e sua função.

$bandComplete = "";

foreach ($rockBands as $rockBand){
    foreach ($rockBand as $function => $artist){

        if($function === "band"){
            $bandComplete .= "<article><h1>{$artist} é o nome da banda</h1></article>";
        }else{
            $bandComplete .= "<p>{$artist} é o {$function} da banda</p>";
        }
    }
}

echo "<p>$bandComplete</p>";