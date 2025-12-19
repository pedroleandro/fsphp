<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulários em PHP</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <main>
        <section class="form-section">
            <header class="form-header">
                <h1>Formulário em PHP</h1>
                <p>Preencha os dados abaixo e envie o formulário.</p>
            </header>
        </section>

        <form class="form-post" name="post" action="./" method="<?= $form->method; ?>" enctype="multipart/form-data" novalidate>

            <p class="form-actions">
                <a href="./" title="Atualizar">Atualizar</a>
            </p>

            <div class="form-grid">
                <input type="text" name="name" value="<?= $form->name; ?>" placeholder="Nome:"/>
                <input type="email" name="mail" value="<?= $form->mail; ?>" placeholder="E-mail:"/>
            </div>

            <button type="submit">Enviar Agora!</button>

        </form>
    </main>
</body>
</html>