<h1> REGISTRO DE USUARIOS</h1>

<form method="post">
    <input type="text" placeholder="Usuario" name="usuarioRegistro" required>
    <input type="password" placeholder="Contraseña" name="passwordRegistro" required>
    <input type="email" placeholder="email" name="emailRegistro" required>
    <input type="submit" value="Enviar">

</form>

<?php

$registro = new MvcController();
$registro -> registroUsuarioController();
