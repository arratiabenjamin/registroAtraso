<main>
    <div class="formulario">
        <h1>Ingreso Rut</h1>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form action="/admin/atraso/actualizar" method="POST">
            <div class="ingresorut">
                <input type="text" id="rut" name="atraso[rut_estudiante]" value="<?php echo $atraso->rut_estudiante?>">
                <label for="rut">Ingrese rut estudiante</label>
            </div>
            <input type="hidden" name="id" value="<?php echo $atraso->id_atraso;?>">
            <div class="enviar">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</main>