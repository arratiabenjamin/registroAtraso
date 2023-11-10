<main id="main">
    <table class="table">
        <h2 class="tab-title">Atrasos</h2>
        
        <!-- Nueva Tabla -->
        <tbody>
            <tr class="header row">
                <th class="cell pl">ID </th>
                <th class="cell">Fecha</th>
                <th class="cell h">Hora</th>
                <th class="cell">Rut Estudiante</th>
                <th class="cell">Nombre Estudiante</th>
                <th class="cell">Curso</th>
                <th class="cell">Comentario</th>
                <th class="cell act">Acciones </th>
            </tr>
        <tbody id="atrasos">
            <?php foreach ($atrasos as $atraso) : ?>
                <tr class="row">
                    <!-- Info Varia -->
                    <td class="cell pl"><?php echo $atraso->id_atr ?></td>
                    <td class="cell"><?php echo $atraso->fecha_atr ?></td>
                    <td class="cell h"><?php echo $atraso->hora_atr ?></td>
                    <td class="cell"><?php echo $atraso->rut_estu ?></td>
                    
                    <!-- Nombre y Curso Estudiante -->
                    <?php foreach ($estudiantes as $estudiante) : ?>
                        <?php if($estudiante->rut_estu == $atraso->rut_estu): ?>
                            <td class="cell"><?php echo $estudiante->nombres_estu . "<br>" . $estudiante->apellidos_estu ?></td>
                            <td class="cell"><?php echo $estudiante->id_curso ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    
                    <!-- Comentario -->
                    <td class="cell"><?php echo $atraso->comentario_atr ? $atraso->comentario_atr : "N/A" ?></td>
                    
                    <!-- Acciones -->
                    <td class="action cell">

                        <a href="/admin/atraso/actualizar?id=<?php echo $atraso->id_atr; ?>">
                            <input class="btn-action actualizar" type="button" value="Editar" />
                        </a>

                        <form method="POST" action="<?php echo $_SERVER['PATH_INFO'] == '/admin' ? 'admin/atraso/eliminar' : 'atraso/eliminar' ?>">
                            <input class="btn-action eliminar" type="submit" value="Borrar" />
                            <input type="hidden" name="id" value="<?php echo $atraso->id_atr; ?>" />
                            <input type="hidden" name="entidad" value="atraso" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        </tbody>
    </table>
    
    <!--Antigua-->
    <!--
    <table class="table" id="tabla_atrs">
        <h2 class="tab-title">Atrasos</h2>
        <tbody>
            <tr class="header row" id="columnas">
                <th class="cell pl">ID </th>
                <th class="cell">Fecha</th>
                <th class="cell h">Hora</th>
                <th class="cell">Rut Estudiante</th>
                <th class="cell">Rut Funcionario</th>
                <th class="cell act">Acciones </th>
            </tr>
        <tbody id="atrasos">

            <?php foreach ($atrasos as $atraso) : ?>
                <tr class="row">
                    <td class="cell pl"><?php echo $atraso->id_atr ?></td>
                    <td class="cell"><?php echo $atraso->fecha_atr ?></td>
                    <td class="cell h"><?php echo $atraso->hora_atr ?></td>
                    <td class="cell"><?php echo $atraso->rut_estu ?></td>
                    <td class="cell"><?php echo $atraso->rut_func ?></td>
                    <td class="action cell">

                        <a href="/admin/atraso/actualizar?id=<?php echo $atraso->id_atr; ?>">
                            <input class="btn-action actualizar" type="button" value="Editar" />
                        </a>

                        <form method="POST" action="atraso/eliminar">
                            <input class="btn-action eliminar" type="submit" value="Borrar" />
                            <input type="hidden" name="id" value="<?php echo $atraso->id_atr; ?>" />
                            <input type="hidden" name="entidad" value="atraso" />
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
        </tbody>
    </table>
    -->
    
    <script src="../js/filtrosAtraso.js"></script>
    <script src="../js/filter.js"></script>
</main>