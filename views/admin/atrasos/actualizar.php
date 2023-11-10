<main id="main">

    <form class="form" action="/admin/atraso/actualizar" method="POST">
        <legend class="tittle"> Actualizar Atraso</legend>
        <!-- CAMPOS -->
        <div class="cont-campos">
            <h5>Rut estudiante:</h5>
            <input class="text-area" type="text" id="rut_estu" name="atraso[rut_estu]" value="<?php echo $atraso->rut_estu;?>" placeholder="12345678-9">
        </div>
        <div class="cont-campos">
            <h5>Comentario:</h5>
            <input class="text-area" type="text" id="comentario_atr" name="atraso[comentario_atr]" value="<?php echo $atraso->comentario_atr;?>" placeholder="Intento de Fuga (Opcional)">
        </div>
        <input type="hidden" name="id" value="<?php echo $atraso->id_atr;?>">

        <!-- BOTON AGREGAR -->
        <div class="cont-boton">
            <input class="boton" type="submit" id="atraso" value="Agregar">
        </div>
    </form>

    <script src="../../js/app.js"></script>
    <script src="../../js/filter.js"></script>

</main>