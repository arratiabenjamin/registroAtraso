<header class="header">
    <h1 class="title"><span>@PECO</span>MPANY</h1>
    <a href="/logout" class="boton">Logout</a>
</header>

<nav class="cont nav">
        <a href="/admin/atraso/crear" class="b1 boton" id="Atraso">Atraso</a>
        <?php if($_SESSION['admin'] === '1'): ?>
            <a href="/admin/alumno/crear" class="b2 boton" id="Alumno">Alumno</a>
            <a href="/admin/apoderado/crear" class="b3 boton" id="Apoderado">Apoderado</a>
            <a href="/admin/funcionario/crear" class="b4 boton" id="Funcionario">Funcionario</a>
        <?php endif; ?>
</nav>

<main class="cont main">
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

    <table class="table">
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

    <table class="table">
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

    <table class="table">
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

</main>
