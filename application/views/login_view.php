<div id="form_login">
    <h1>CEI - Centro de Empreendimentos em Informática</h1>
    <h2>Sistema de gerenciamento</h2>
    <?php echo validation_errors(); ?>
    <?php
    echo form_open();

    echo form_input(array('name'=>'username','placeholder'=>'LOGIN'));

    echo '<br>';

    echo form_password(array('name'=>'senha','placeholder'=>'SENHA'));

    echo '<br>';

    echo form_submit('submit', 'entrar');
    ?>
    <?php form_close(); ?>
</div>
