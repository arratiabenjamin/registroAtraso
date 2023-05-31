<main>
    <h1>Apoderados</h1>
    <?php foreach($apoderados as $apoderado): ?>
        <h3>Rut</h3>
        <p> <?php echo $apoderado->rut_apoderado; ?> </p>
        <h3>Nombre</h3>
        <p> <?php echo $apoderado->nombre_apoderado; ?> </p>
        <h3>Apellido</h3>
        <p> <?php echo $apoderado->apellido_apoderado; ?> </p>
        <h2>----------------------------------</h2>
    <?php endforeach; ?>
</main>