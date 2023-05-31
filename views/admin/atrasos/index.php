<main>
    <h1>Atrasos</h1>
    <?php foreach($atrasos as $atraso): ?>
        <h3>Id</h3>
        <p> <?php echo $atraso->id_atraso; ?> </p>
        <h3>Fecha</h3>
        <p> <?php echo $atraso->fecha_atraso; ?> </p>
        <h3>Hora</h3>
        <p> <?php echo $atraso->hora_atraso; ?> </p>
        <h3>Rut Estudiante</h3>
        <p> <?php echo $atraso->rutEstudiante_atraso; ?> </p>
        <h3>Rut Funcionario</h3>
        <p> <?php echo $atraso->rutFuncionario_atraso; ?> </p>
        <h2>----------------------------------</h2>
    <?php endforeach; ?>
</main>