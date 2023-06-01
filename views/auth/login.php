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
        <link rel="stylesheet" href="../css/login.css">
    </head>

    <body>
        
        <main class="contenedor-main">
            
            <div class="contenedor-alerta">
                
                <?php foreach($errores as $error): ?>
                    <div class="alerta error">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach; ?>

            </div>

            <form class="form" action="/" method="POST">
                <fieldset>

                    <legend> Iniciar sesion </legend>

                    <div class="contenedor-radio"> 
                        <div class="radio"> <!-- RADIO-BUTTON -->
                            <input class="radio__input" type="radio" name="tipo" value="funcionario" id="funcionario">
                            <label class="radio__label" for="funcionario"> Funcionario</label>
                    
                            <input class="radio__input "type="radio" name="tipo" value="apoderado" id="apoderado">
                            <label class="radio__label" for="apoderado"> Apoderado</label>
                        </div>
                    </div>

                    <div class="campo"> <!-- CAMPOS DE TEXTO -->
                        <label class="lcamp" for="rut"> Rut </label>
                        <input class="text-area" type="text" id="rut" name="rut" placeholder="12345678-9">
                    </div>

                    <div class="campo">
                        <label class="lcamp" for="password"> Contraseña </label> 
                        <input class="text-area" type="password" id="contraseña" name="password" placeholder="********">
                    </div>

                    <div class="bform"> <!-- BOTON LOGIN -->
                        <input class="boton" type="submit" id="login" value="Login">
                    </div>

                </fieldset>
            </form>       
            
            <div class="c-fot">
                <h3> Derechos reservados, @pecompany </h3>   
            </div>

        </main>


    </body>
</html>