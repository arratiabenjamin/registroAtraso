<main>
    <h1>Funcionarios</h1>
    <?php foreach($funcionarios as $funcionario): ?>
        <h3>Rut</h3>
        <p> <?php echo $funcionario->rut_func; ?> </p>
        <h3>Nombre</h3>
        <p> <?php echo $funcionario->nombre_func; ?> </p>
        <h3>Apellido</h3>
        <p> <?php echo $funcionario->apellido_func; ?> </p>
        <h3>Email</h3>
        <p> <?php echo $funcionario->maill_func; ?> </p>
        <h2>----------------------------------</h2>
    <?php endforeach; ?>
</main>