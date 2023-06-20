<main>
    <?php foreach($estudiantes as $estudiante): ?>
        <table class="table">
            <h2 class="tab-title"> <?php echo $estudiante->nombres_estudiante . " " . $estudiante->apellidos_estudiante ?> </h2>
            <thead class="Atraso b1">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Rut Estudiante</th>
                    <th>Rut Funncionario</th>
                </tr>

            </thead>
            <tbody>
                <?php foreach($atrasos as $atraso): ?>
                    <?php foreach($atraso as $a): ?>
                        <?php if($a->rut_estudiante === $estudiante->rut_estudiante): ?>
                            <tr>
                                <td>
                                    <?php echo $a->id_atraso ?>
                                </td>
                                <td>
                                    <?php echo $a->fecha_atraso ?>
                                </td>
                                <td>
                                    <?php echo $a->hora_atraso ?>
                                </td>
                                <td>
                                    <?php echo $a->rut_estudiante ?>
                                </td>
                                <td>
                                    <?php echo $a->rut_func ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>
</main>