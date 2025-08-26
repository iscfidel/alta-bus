
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Metrorrey</title>
</head>

<body>
    <?php include 'components/offcanvas.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="mt-4 ps-2 fw-normal">Reporte Contadores</h3>
                <hr>
            </div>
        </div>
        <div class="row bg-body-tertiary">
            <div class="col-12 mt-2">
                <div class="mb-4 d-flex align-items-center gap-3">
                    <span class="form-label mb-0">Realizar busqueda mediante:</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="inputSwitch" style="width:2.5em;height:1.5em">
                        <label class="form-check-label ms-2" for="inputSwitch" id="switchLabel">Filtros</label>
                    </div>
                </div>
                <form id="formArchivo" action="/alta_buses/subir-archivo" method="POST" enctype="multipart/form-data" class="bg-body-tertiary mt-1 pt-1 mx-1" style="display:none;">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Seleccion de archivo</label>
                        <input class="form-control" type="file" id="formFile" name="archivo">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary mb-3">Enviar</button>
                    </div>
                </form>
                <form id="formFiltros" action="" method="post" class="bg-body-tertiary mt-1 pt-1 mx-1">
                    <div class="d-flex gap-3 align-items-end">
                        <div class="form-floating mb-3 flex-grow-1">
                            <input type="text" class="form-control" id="fechaInicial" name="fechaInicial" placeholder="Fecha Inicial" value="" />
                            <label for="fechaInicial">Contrato</label>
                        </div>
                        <div class="form-floating mb-3 flex-grow-1">
                            <input type="number" class="form-control" id="fechaFinal" name="fechaFinal" placeholder="Fecha Final" value="" />
                            <label for="fechaFinal">Ruta</label>
                        </div>
                        <div class="form-floating mb-3 flex-grow-1">
                            <input type="number" class="form-control" id="idDispositivo" name="idDispositivo" placeholder="ID Dispositivo" value="" />
                            <label for="idDispositivo">Ramal</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-outline-primary mb-3">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <hr class="bg-body-tertiary">
        <div class="row bg-body-tertiary justify-content-center mx-1">
            <div class="col-12 mt-2">
                <?php if (isset($resultado) && is_string($resultado)): ?>
                    <div class="alert alert-info mt-3">
                        <strong>Resultado del procesamiento:</strong>
                        <pre><?= htmlspecialchars($resultado) ?></pre>
                    </div>
                <?php endif; ?>
                <?php
                // Campos a mostrar
                $camposMostrar = ['NUMERO', 'NOMBRE TIPO DE RUTA', 'RUTA', 'id_Station', 'id_Line'];
                $indices = [];
                if (isset($resultado) && is_array($resultado) && count($resultado) > 0) {
                    foreach ($resultado[0] as $i => $col) {
                        if (in_array($col, $camposMostrar)) {
                            $indices[] = $i;
                        }
                    }
                }
                ?>
                <table class="table table-striped-columns text-center">
                    <thead>
                        <tr>
                            <?php foreach ($indices as $i): ?>
                                <th scope="col"><?= htmlspecialchars($resultado[0][$i]) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($resultado) && is_array($resultado) && count($resultado) > 1): ?>
                            <?php foreach ($resultado as $filaIndex => $fila): ?>
                                <?php if ($filaIndex === 0) continue; // Saltar encabezado ?>
                                <tr>
                                    <?php foreach ($indices as $i): ?>
                                        <td><?= htmlspecialchars($fila[$i]) ?></td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="editForm" class="modal-content border-0 shadow-sm">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-semibold" id="editModalLabel">Editar Ruta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body pt-2">
                    <input type="hidden" name="id" id="modal-id">
                    <div class="row g-3">
                        <div class="col-6">
                            <label for="modal-id_station" class="form-label small text-muted mb-1">ID Estación</label>
                            <input type="text" class="form-control form-control-sm" name="id_station" id="modal-id_station" required>
                        </div>
                        <div class="col-6">
                            <label for="modal-name_station" class="form-label small text-muted mb-1">Nombre Estación</label>
                            <input type="text" class="form-control form-control-sm" name="name_station" id="modal-name_station" required>
                        </div>
                        <div class="col-6">
                            <label for="modal-created_station" class="form-label small text-muted mb-1">Fecha Estación</label>
                            <input type="date" class="form-control form-control-sm" name="created_station" id="modal-created_station" required>
                        </div>
                        <div class="col-6">
                            <label for="modal-id_line" class="form-label small text-muted mb-1">ID Línea</label>
                            <input type="text" class="form-control form-control-sm" name="id_line" id="modal-id_line" required>
                        </div>
                        <div class="col-6">
                            <label for="modal-name_line" class="form-label small text-muted mb-1">Nombre Línea</label>
                            <input type="text" class="form-control form-control-sm" name="name_line" id="modal-name_line" required>
                        </div>
                        <div class="col-6">
                            <label for="modal-created_line" class="form-label small text-muted mb-1">Fecha Línea</label>
                            <input type="date" class="form-control form-control-sm" name="created_line" id="modal-created_line" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-dark px-4">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputSwitch = document.getElementById('inputSwitch');
            const formArchivo = document.getElementById('formArchivo');
            const formFiltros = document.getElementById('formFiltros');
            const switchLabel = document.getElementById('switchLabel');
            
            function updateForms() {
                if (inputSwitch.checked) {
                    formArchivo.style.display = '';
                    formFiltros.style.display = 'none';
                    switchLabel.textContent = 'Archivo';
                } else {
                    formArchivo.style.display = 'none';
                    formFiltros.style.display = '';
                    switchLabel.textContent = 'Filtros';
                }
            }
            inputSwitch.addEventListener('change', updateForms);
            updateForms();
        });
        </script>
        <script src="<?php echo assets('search-bus.js'); ?>"></script>
</body>

</html>