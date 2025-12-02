<?php

function functionName($arg1, $arg2, $arg3)
{
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

// obrigatórios, importantes e opcionais
function optionArgs($arg1, $arg2 = true, $arg3 = null)
{
    $body = [$arg1, $arg2, $arg3];
    return $body;
}

function calcBmi()
{
    global $weight;
    global $height;
    return $weight / ($height * $height);
}

function payTotal($price)
{
    static $total;
    $total += $price;
    return "<p>O total a pagar é R$ " . number_format($total, 2, ",", ".") . " </p>";
}

function myTeam(){
    $teamNames = func_get_args();
    $teamCount = func_num_args();
    return [$teamNames, "count" => $teamCount];
}

function myClass(...$names) {
    return $names;
}

function concept(int $grade): string {
    return match(true) {
        $grade >= 90 => "A",
        $grade >= 70 => "B",
        $grade >= 50 => "C",
        default => "D",
    };
}