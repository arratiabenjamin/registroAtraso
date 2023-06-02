<main>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="/admin/atraso/crear" method="POST">
        <fieldset>
            <legend>Registro Atraso</legend>
            <label for="rut">Rut Estudiante</label>
            <input type="text" placeholder="Ingrese Rut, Ej: 12345678-9" id="rut" name="atraso[rut_estudiante]">
            <?php 
                session_start();
            ?>
            <input type="hidden" value="<?php echo $_SESSION['usuario'];?>" name="atraso[rut_func]">
            <input type="submit" value="Subir">
        </fieldset>
    </form>
</main>
