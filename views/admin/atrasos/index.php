<main>
<table class="table">

<h2 class="tab-title" >Atrasos</h2>
<thead class="Atraso b1 ">
    <tr> 
        <th>ID</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Rut Estudiante</th>
        <th>Rut Funcionario</th>
    </tr>
</thead>
<tbody>
    <?php foreach($atrasos as $atraso): ?>
        <tr>
            <td><?php echo $atraso->id_atraso ?></td>
            <td><?php echo $atraso->fecha_atraso ?></td>
            <td><?php echo $atraso->hora_atraso ?></td>
            <td><?php echo $atraso->rut_estudiante ?></td>
            <td><?php echo $atraso->rut_func ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>

<div class="formulario">
    <h1>Ingreso Rut</h1>
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