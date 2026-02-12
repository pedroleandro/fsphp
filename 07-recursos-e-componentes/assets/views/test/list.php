<?php $this->layout("test::base", ["title" => $title]); ?>

<?= (new \Source\Core\Session())->flash() ?>

<?php foreach ($users as $user): ?>

    <article>
        <h1><?= "{$user->getFirstName()} {$user->getLastName()}" ?></h1>
        <p><?= "{$user->getEmail()}" ?> - Registrado em d/m/Y H:i:s</p>
        <a href="./?id=<?= $user->getId() ?>" title="Editar">Editar</a>
    </article>

<?php endforeach; ?>