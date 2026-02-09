<form action="./" name="upload" method="post" enctype="multipart/form-data">
    <input name="send" value="<?= ($formSend ?? ""); ?>"/>
    <input name="name" type="text" value="Nome do arquivo" required/>
    <input name="file" type="file" required/>
    <button class="green"><?= $formSend; ?></button>
</form>