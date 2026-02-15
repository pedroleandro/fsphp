<?php

use Source\Support\Pager;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.10 - Paginador de resultados");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ paginator ] https://packagist.org/packages/coffeecode/paginator
 */
fullStackPHPClassSession("paginator", __LINE__);

$total = db()->query("SELECT count(id) as total FROM users")->fetch()->total;

$getPage = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);

$pager = new Pager("?page=");

$pager->pager($total, 5, $getPage, 2);

echo <<<style
<style>
.paginator {
    display: block;
    text-align: center;
    list-style: none;
    padding: 0;
    margin-top: 30px;
}

.paginator_item {
    display: inline-block;
    margin: 0 10px;
    padding: 4px 12px;
    background: #A287E7;
    color: #fff;
    text-decoration: none;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}

.paginator_item:hover {
    background: #8A6ED5;
}

.paginator_active,
.paginator_active:hover {
    background: #cccccc;
}
</style>
style;

$users = (new \Source\Models\UserModel())->findAll($pager->limit(), $pager->offset());

foreach ($users as $user) {

    $register = date_format_to_br();

    echo <<<user
        <article>
        <h1>{$user->getFirstName()} {$user->getLastName()}</h1>
        <p>{$user->getEmail()} - Registro em {$register}</p>
</article>
user;

}

echo $pager->render();

var_dump($total);