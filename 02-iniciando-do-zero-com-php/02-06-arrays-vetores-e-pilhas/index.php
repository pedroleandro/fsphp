<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.06 - Arrays, vetores e pilhas");

/**
 * [ arrays ] https://php.net/manual/pt_BR/language.types.array.php
 */
fullStackPHPClassSession("index array", __LINE__);

$arrA = array(1, 2, 3);

$arrB = [1, 2, 3];

var_dump($arrA);

$arrayIndex = [
    "Pedro",
    "Marckel",
    "Paulo"
];

$arrayIndex[] = "Maurício";
$arrayIndex[] = "Victor";

var_dump($arrayIndex);


/**
 * [ associative array ] "key" => "value"
 */
fullStackPHPClassSession("associative array", __LINE__);

$arrayAssociative = [
    "vocal" => "Brian",
    "solo_guitar" => "Angus",
    "base_guitar" => "Malcolm",
    "bass_guitar" => "Cliff"
];

$arrayAssociative["drums"] = "Phil";
$arrayAssociative["rock_band"] = "AC/DC";

var_dump($arrayAssociative);


/**
 * [ multidimensional array ] "key" => ["key" => "value"]
 */
fullStackPHPClassSession("multidimensional array", __LINE__);

$brian = ["Brian", "Mic"];

$angus = ["name" => "Angus", "instrument" => "Guitar"];

$instruments = [
    $brian,
    $angus
];

var_dump($instruments);

var_dump([
    "brian" => $brian,
    "angus" => $angus,
]);


/**
 * [ array access ] foreach(array as item) || foreach(array as key => value)
 */
fullStackPHPClassSession("array access", __LINE__);

$acdc = [

    "rock_band" => "AC/DC",
    "vocal" => "Brian",
    "solo_guitar" => "Angus",
    "base_guitar" => "Malcolm",
    "bass_guitar" => "Cliff",
    "drums" => "Phil"
];

echo "<p>O vocal da banda {$acdc['rock_band']} é {$acdc['vocal']}</p>";

$pearl = [
    "rock_band" => "Pearl Jam",
    "vocal" => "Eddie",
    "solo_guitar" => "Mike",
    "base_guitar" => "Stone",
    "bass_guitar" => "Jeff",
    "drums" => "Jack"
];

$rock_bands = [
    "acdc" => $acdc,
    "pearl" => $pearl,
];

var_dump($rock_bands);

echo "<p>{$rock_bands['pearl']['vocal']}</p>";

foreach ($acdc as $item) {
    echo "<p>{$item}</p>";
}

foreach ($acdc as $key => $value) {
    echo "<p>{$value} is a {$key} of band!</p>";
}

foreach ($rock_bands as $rock_band) {
    $article = "<article>
<h1>%s</h1>
<p>%s</p>
<p>%s</p>
<p>%s</p>
<p>%s</p>
<p>%s</p>
</article>";

    vprintf($article, $rock_band);
}

