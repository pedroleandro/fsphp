<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.07 - Estruturas de controle");

/*
 * [ if ] https://php.net/manual/pt_BR/control-structures.if.php
 * [ elseif ] https://php.net/manual/pt_BR/control-structures.elseif.php
 * [ else ] https://php.net/manual/pt_BR/control-structures.else.php
 */
fullStackPHPClassSession("if, elseif, else", __LINE__);

dump("Olá, Mundo!");

$test = false;

if ($test) {
    dump(true);
} else {
    dump(false);
}

$age = 28;

if ($age < 20) {
    dump("bandas coloridas");
} elseif ($age > 20 && $age < 50) {
    dump("ótimas bandas");
} else {
    dump("Rock roll raiz");
}

$hour = 3;

if ($hour >= 5 && $hour < 23) {
    if ($hour < 7) {
        dump("Bob Marley");
    } else {
        dump("After Bridge");
    }
} else {
    dump("ZzzzzzzZZZZ");
}

/*
 * [ isset ] https://php.net/manual/pt_BR/function.isset.php
 * [ empty] https://php.net/manual/pt_BR/function.empty.php
 */
fullStackPHPClassSession("isset, empty, !", __LINE__);

$rock = "";

//verifica se existe
if (isset($rock)) {
    dump("Rock And Roll!");
} else {
    dump("Die");
}

$rockAndRoll = "AC/DC";

//verifica se NÃO existe ou se É vazio
if (empty($rockAndRoll)) {
    dump("Rock não existe ou está vazio!");
} else {
    dump("Rock existe e toca {$rockAndRoll}");
}

/*
 * [ switch ] https://secure.php.net/manual/pt_BR/control-structures.switch.php
 */
fullStackPHPClassSession("switch", __LINE__);

$payment = "canceled";

switch ($payment) {
    case "billet_printed":
        dump("Boleto Emitido!");
        break;
    case "canceled":
        dump("Pagamento cancelado");
        break;
    case "past_due":
    case "pending":
        dump("Pagamento pendente!");
        break;
    case "approved":
    case "completed":
        dump("Pagamento aprovado!");
        break;
    default:
        dump("Erro ao processar o pagamento!");
        break;
}


