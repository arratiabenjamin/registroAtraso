<main>
    <div class="formulario">
        <h1>Ingreso Rut</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form action="/admin/atraso/crear" method="POST">
            <div class="ingresorut">
                <input type="text" id="rut" name="atraso[rut_estudiante]">
                <label for="rut">Ingrese rut estudiante</label>
            </div>
            <?php 
                session_start();
            ?>
            <input type="hidden" value="<?php echo $_SESSION['usuario'];?>" name="atraso[rut_func]">
            <div class="enviar">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</main>
