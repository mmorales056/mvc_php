<h1>USUARIOS</h1>

<table border="1">
    <thead>
        <tr>
            <th>Usuarios</th>
            <th>Contraseña</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $vista = new MvcController();
        $vista ->vistaUsuariosController();
        ?>
    </tbody>
</table>
