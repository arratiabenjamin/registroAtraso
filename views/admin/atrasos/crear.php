<main>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <div class="formulario">
        <h1>Ingreso Rut</h1>
        <form>
            <div class="ingresorut">
                <input type="text" name="" id="">
                <label>Ingrese rut estudiante</label>
            </div>
            <div class="enviar">
                <input type="submit" value="Enviar">
            </div>
        </form>
</main>
