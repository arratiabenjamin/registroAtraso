<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PECOMPANY</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@200;400;700&display=swap" rel="stylesheet">
        <link rel="preload" href="<?php echo $style;?>.css">
        <link rel="stylesheet" href="<?php echo $style;?>.css">
    </head>

    <body>
        <header class="header">
            <a href="/admin" class="title"><span>@PECO</span>MPANY</a>
            <a href="/logout" class="boton">Logout</a>
        </header>

        <?php echo $contenido; ?>

    </body>

</html>