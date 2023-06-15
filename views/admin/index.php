<nav class="cont nav">
        <?php if($_SESSION['admin'] === '1'){ ?>
            <a href="/admin/atrasos" class="b1 boton" id="Atraso">Atraso</a>
            <a href="/admin/alumnos" class="b2 boton" id="Alumno">Alumno</a>
            <a href="/admin/apoderados" class="b3 boton" id="Apoderado">Apoderado</a>
            <a href="/admin/funcionarios" class="b4 boton" id="Funcionario">Funcionario</a>
        <?php }else{ ?>
            <a href="/admin/atraso/crear" class="b1 boton">Atraso</a>
        <?php } ?>
</nav>

<main class="cont main">
    <table class="table" id="atraso">
    
        <h2 class="tab-title" >Atrasos</h2>
        <thead class="Atraso b1 ">
            <tr> 
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Rut Estudiante</th>
                <th>Rut Funcionario</th>
                <th>Acciones</th>
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
                    <td>
                        <form method="POST" class="w-100" action="admin/atraso/eliminar">
                            <input type="hidden" name="id" value="<?php echo $atraso->id_atraso; ?>">
                            <input type="hidden" name="entidad" value="atraso">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/admin/atraso/actualizar?id=<?php echo $atraso->id_atraso; ?>" class="boton-verde-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if($_SESSION['admin'] === '1'): ?>

        <table class="table" id="alumno">
            <h2 class="tab-title" >Alumnos</h2>
            <thead class="Alumno b2">
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Curso</th>
                    <th>Rut Apoderado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($estudiantes as $estudiante): ?>
                    <tr>
                        <td><?php echo $estudiante->rut_estudiante ?></td>
                        <td><?php echo $estudiante->nombres_estudiante ?></td>
                        <td><?php echo $estudiante->apellidos_estudiante ?></td>
                        <td><?php echo $estudiante->curso_estudiante ?></td>
                        <td><?php echo $estudiante->rut_apoderado ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <table class="table" id="apoderado">
            <h2 class="tab-title" >Apoderados</h2>
            <thead class="Apoderado b3">
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($apoderados as $apoderado): ?>
                    <tr>
                        <td><?php echo $apoderado->rut_apoderado ?></td>
                        <td><?php echo $apoderado->nombre_apoderado ?></td>
                        <td><?php echo $apoderado->apellido_apoderado ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <table class="table" id="funcionario">
            <h2 class="tab-title" >Funcionarios</h2>
            <thead class="Funcionario b4">
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($funcionarios as $funcionario): ?>
                    <tr>
                        <td><?php echo $funcionario->rut_func ?></td>
                        <td><?php echo $funcionario->nombre_func ?></td>
                        <td><?php echo $funcionario->apellido_func ?></td>
                        <td><?php echo $funcionario->email_func ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    

</main>
