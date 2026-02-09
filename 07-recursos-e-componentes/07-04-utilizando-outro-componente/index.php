<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.04 - Utilizando um componente");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ instance ] https://packagist.org/packages/phpmailer/phpmailer
 */
fullStackPHPClassSession("instance", __LINE__);

use League\Csv\Reader;
use Source\DTO\PremierLeagueDTO;

$csv = Reader::from('Premier_League_Player_Statistics_2023-24_20260207_050947.csv', 'r');
$csv->setHeaderOffset(0);

$header = $csv->getHeader();

$records = $csv->getRecordsAsObject(PremierLeagueDTO::class);

foreach ($records as $record) {
    var_dump([
        $record->Player,
        $record->Team,
        $record->Goals
    ]);
}

/*
 * [ configure ]
 */
fullStackPHPClassSession("configure", __LINE__);