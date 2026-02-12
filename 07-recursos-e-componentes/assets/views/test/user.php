<?php $this->layout("test::base", ["title" => "Editando usuário {$user->getFirstName()}"]); ?>

<?php $this->start("nav"); ?>

<a href="./" title="Voltar">Voltar</a>

<?php $this->stop(); ?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="first_name" value="<?= $user->getFirstName(); ?>">

    <input type="text" name="last_name" value="<?= $user->getLastName(); ?>">

    <input type="text" name="email" value="<?= $user->getEmail(); ?>">

    <button>Atualizar</button>
</form>
