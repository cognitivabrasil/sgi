<h1>CEI - Centro de Empreendimentos em Informática</h1>
<h2>Sistema de gerenciamento de incubadoras</h2>
<div id="form_login">
    <?php echo validation_errors(); ?>
    <?php
    echo form_open();

    echo form_input(array('name'=>'username','placeholder'=>'LOGIN'));

    echo form_password(array('name'=>'senha','placeholder'=>'SENHA'));

    echo form_submit('submit', 'entrar');
    ?>
    <?php form_close(); ?>
</div>
