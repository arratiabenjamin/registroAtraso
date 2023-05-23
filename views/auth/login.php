<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Login </title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        
        <main class="contenedor-main">
            <section class="contenedor-form">

                <?php foreach( $errores as $error ):?>
                    <div class="alerta error">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach; ?>

                <form class="form" action="/" method="post">
                    <fieldset>

                        <legend> Iniciar sesion </legend>

                        <div class="contenedor-radio"> 
                            <div class="radio"> <!-- RADIO-BUTTON -->
                                <input class="radio__input" type="radio" name="login[tipo]" value="funcionario" id="funcionario">
                                <label class="radio__label" for="funcionario"> Funcionario</label>
                        
                                <input class="radio__input "type="radio" name="login[tipo]" value="apoderado" id="apoderado">
                                <label class="radio__label" for="apoderado"> Apoderado</label>
                            </div>
                        </div>

                        <div class="campo"> <!-- CAMPOS DE TEXTO -->
                            <label class="lcamp"> Rut </label>
                            <input class="text-area" type="text" id="rut" name="login[rut]" placeholder="12345678-9">
                        </div>

                        <div class="campo">
                            <label class="lcamp"> Contraseña </label> 
                            <input class="text-area" type="text" id="contraseña" name="login[password]" placeholder="********">
                        </div>

                        <div class="bform"> <!-- BOTON LOGIN -->
                            <input class="boton" type="submit" id="login" value="Login">
                        </div>

                    </fieldset>
                </form>       

                <h3 class="footer"> Derechos reservados, @pecompany </h3>
            </section>
        </main>

    </body>
</html>