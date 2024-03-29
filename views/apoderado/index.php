<main id="main">
    <?php foreach ($estudiantes as $estudiante) : ?>
        <h2><?php echo $estudiante->nombres_estu . " " . $estudiante->apellidos_estu . " / " . $estudiante->rut_estu ?></h2>
        <table class="table">
            <tbody>
                <tr class="header row">
                    <th class="cell pl">N° </th>
                    <th class="cell">Fecha</th>
                    <th class="cell h">Hora</th>
                </tr>
                <?php $i = 0; ?>
                <?php foreach ($atrasos as $atraso) : ?>
                    <?php if ($atraso->rut_estu === $estudiante->rut_estu) : ?>
                        <?php $i += 1; ?>
                        <tr class="row">
                            <td class="cell pl"><?php echo $i ?></td>
                            <td class="cell"><?php echo $atraso->fecha_atr ?></td>
                            <td class="cell h"><?php echo $atraso->hora_atr ?></td>
                        </tr>
                    <?php endif; ?>
                    <?php if(is_array($atraso)): ?>
                        <?php $i = count($atraso); ?>
                        <?php foreach ($atraso as $a) : ?>
                            <?php if ($a->rut_estu === $estudiante->rut_estu) : ?>
                                <tr class="row">
                                    <td class="cell pl"><?php echo $i ?></td>
                                    <td class="cell"><?php echo $a->fecha_atr ?></td>
                                    <td class="cell h"><?php echo $a->hora_atr ?></td>
                                </tr>
                            <?php $i -= 1; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endforeach; ?>
        <div class="cont__printBtn">
            <button id="printBtn"><span>Generar informe</span><i class="fa-solid fa-file-pdf"></i></button>
        </div>
</main>

<script src="../js/imprimirPdf.js"></script>
<script src="../js/app.js"></script>