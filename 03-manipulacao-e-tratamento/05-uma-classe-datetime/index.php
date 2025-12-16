<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

define("DATE_BR", "d/m/Y H:i:s");

$dateNow = new Datetime();
$dateBirth = new Datetime("1997-06-28 00:00:00");
$dateStatic = DateTime::createFromFormat(DATE_BR, "09/12/2025 20:46:57");
$dateStatic2 = DateTime::createFromFormat("d/m/Y", "09/12/2025");

var_dump(
    $dateNow,
    $dateBirth,
    $dateStatic,
    $dateStatic2,
    get_class_methods($dateNow)
);

var_dump([
    $dateNow->format(DATE_BR),
    $dateNow->format("d"),
]);

$newDateTimeZone = new DateTimeZone("Pacific/Apia");
$newDateTme = new DateTime("now", $newDateTimeZone);

var_dump([
    $newDateTimeZone,
    $newDateTme,
    $dateNow
]);

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$dateInterval = new DateInterval("P10Y2MT10M");

var_dump($dateInterval);

$dateTime = new DateTime("now");
//$dateTime->add($dateInterval);
$dateTime->sub($dateInterval);

var_dump($dateTime);

$birth = new DateTime(date("Y") . "-06-28");
$birth->modify("+1 year");

var_dump($birth);
$dateNow = new DateTime("now");

$diff = $dateNow->diff($birth);

var_dump($diff);

if($diff->invert){
    echo "<p>Meu aniversário foi há {$diff->days} dias</p>";
}else{
    echo "<p>Meu aniversário será daqui {$diff->days} dias</p>";
}

$dateResources = new DateTime("now");

var_dump([
    $dateResources->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("30 days"))->format(DATE_BR),
    $dateResources->add(DateInterval::createFromDateString("60 days"))->format(DATE_BR),
]);

/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$start = new DateTime("now");
$interval = new DateInterval("P1M");
$end = new DateTime("2027-01-10");

$period = new DatePeriod($start, $interval, $end);

var_dump([
    $start->format(DATE_BR),
    $end->format(DATE_BR),
    $interval->format(DATE_BR)
],
    $period);

echo "<h1>Sua assinatura: </h1>";
foreach ($period as $date) {
    echo "<p>Vencimento em: {$date->format(DATE_BR)}</p>";
}