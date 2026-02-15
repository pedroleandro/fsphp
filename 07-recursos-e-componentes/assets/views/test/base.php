<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>

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

</head>
<body>
<header>
    <h3 class="trigger accept"><?= $title; ?></h3>
</header>

<?php if ($this->section("nav")): ?>
    <nav class="trigger info">
        <?= $this->section("nav"); ?>
    </nav>
<?php else: ?>
    <p class="trigger info">Lista de usuários</p>
<?php endif; ?>

<?= $this->section("content"); ?>
</body>
</html>