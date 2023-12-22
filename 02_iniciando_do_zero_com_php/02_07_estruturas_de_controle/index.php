<?php
require __DIR__ . '/../fullstackphp/fsphp.php';
fullStackPHPClassName("02.07 - Estruturas de controle");

/*
 * [ if ] https://php.net/manual/pt_BR/control-structures.if.php
 * [ elseif ] https://php.net/manual/pt_BR/control-structures.elseif.php
 * [ else ] https://php.net/manual/pt_BR/control-structures.else.php
 */
fullStackPHPClassSession("if, elseif, else", __LINE__);

$test = false;

if ($test) {
    var_dump(true);
} else {
    var_dump(false);
}

$age = 26;

if ($age < 20) {
    var_dump("Bandas coloridas");
} elseif ($age > 20 && $age < 50) {
    var_dump("Ótimas bandas");
} else {
    var_dump("Rock and Roll Raiz");
}

$hour = 14;

if ($hour >= 5 && $hour < 23) {
    if ($hour < 7) {
        var_dump("Bob Marley");
    } else {
        var_dump("After Bridge");
    }
} else {
    var_dump("ZzzzzzZZZZ");
}

/*
 * [ isset ] https://php.net/manual/pt_BR/function.isset.php
 * [ empty] https://php.net/manual/pt_BR/function.empty.php
 */
fullStackPHPClassSession("isset, empty, !", __LINE__);

$rock = "";

if (isset($rock)) {
    var_dump('Variável "$rock" existe');
} else {
    var_dump("Die");
}

// o sinal de exclamação ! faz a validação contrária, ou seja, usando o isset é perguntar se aquilo não existe. Isso não existe?

$rockAndRoll = "AC/DC";
//$rockAndRoll = "";
if (!empty($rockAndRoll)) {
    var_dump('Variável "$rockAndRoll" existe e tem conteúdo');
} else {
    var_dump("Variável não existe ou não tem conteúdo");
}

// o empty verifica da seguinte forma: não existe ou está vazia?


/*
 * [ switch ] https://secure.php.net/manual/pt_BR/control-structures.switch.php
 */
fullStackPHPClassSession("switch", __LINE__);

$payment = "approved";

switch ($payment) {
    case "billet_printed":
        var_dump("Boleto impresso!");
        break;
    case "canceled":
        var_dump("Pagamento cancelado!");
        break;
    case "past_due":
    case "pending":
        var_dump("Agurdando pagamento!");
        break;
    case "approved":
    case "completed":
        var_dump("Pagamento aprovado!");
        break;
    default:
        var_dump("Erro ao processar pagamento!");
        break;
}