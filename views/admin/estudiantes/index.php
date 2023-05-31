<main>
    <h1>Estudiantes</h1>
    <?php foreach($estudiantes as $estudiante): ?>
        <h3>Rut</h3>
        <p> <?php echo $estudiante->rut_estudiante; ?> </p>
        <h3>Nombre</h3>
        <p> <?php echo $estudiante->nombres_estudiante; ?> </p>
        <h3>Apellido</h3>
        <p> <?php echo $estudiante->apellidos_estudiante; ?> </p>
        <h3>Curso</h3>
        <p> <?php echo $estudiante->curso_estudiante; ?> </p>
        <h3>Rut Apoderado</h3>
        <p> <?php echo $estudiante->rutApoderado_estudiante; ?> </p>
        <h2>----------------------------------</h2>
    <?php endforeach; ?>
</main>