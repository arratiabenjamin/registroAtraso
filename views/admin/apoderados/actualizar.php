<main>
    <div class="formulario">
        <h1>Actualizacion Apoderado</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form action="/admin/apoderado/actualizar" method="POST">
            <div class="ingresorut">
                <input type="text" id="rut" name="apoderado[nombre_apoderado]" value="<?php echo $apoderado->nombre_apoderado; ?>">
                <label for="rut">Nombre del Apoderado </label>
            </div>
            <div class="ingresorut">
                <input type="text" id="rut" name="apoderado[apellido_apoderado]" value="<?php echo $apoderado->apellido_apoderado; ?>">
                <label for="rut">Apellidos del Apoderado</label>
            </div>
            <div class="ingresorut">
                <input type="text" id="rut" name="apoderado[password_apoderado]" require>
                <label for="rut">Password de Apoderado</label>
            </div>
            <input type="hidden" name="id" value="<?php echo $apoderado->rut_apoderado;?>">

            <div class="enviar">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</main>
