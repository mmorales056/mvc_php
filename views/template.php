<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/css/estilos.css">
    <title>Crudphp</title>
</head>
<body>
    <?php include "modulos/navegacion.php";?>
    <section>
        <?php
            $mvc = new MvcController();
            $mvc-> enlacesPaginasController();
        ?>
    </section>
</body>
</html>