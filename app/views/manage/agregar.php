<?= $head ?>
<title><?= $title ?></title>

<body bg-primary>
    <div class="modal modal-sheet position-static d-flex flex-column bg-body-secondary p-4 py-md-5" tabindex="-1"
        role="dialog" id="modalSheet">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <form action="#" method="POST" class="text-start">
                    <div class="modal-header border-bottom-0 d-flex flex-column">
                        <div class="d-flex justify-content-between col-12">
                            <div class="w-100">
                                <img class="float-start" src="../img/moneda.png" height="30px" alt="moneda">
                            </div>
                            <div class="col-3 d-flex">
                                <div class="col">
                                    <label for="formGroupExampleInput" class="form-label">Estado</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input name="estado" value="<?= isset($_POST['estado']) ? $_POST['estado'] : ""; ?>"
                                        class="form-check-input" type="checkbox" role="switch"
                                        id="formGroupExampleInput" height="100%" checked>
                                </div>
                            </div>
                        </div>
                        <Div class="w-100">
                            <h3 class="fs-5" style="text-align: start;">Configurar una nueva franja horaria</h3>
                        </Div>
                        <Div class="w-100">
                            <h5 class="fs-6 text-secondary">Completa los datos requeridos</h5>
                        </Div>
                        <div class="row row-cols-2 d-flex">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <label for="formGroupExampleInput" class="form-label" for="franja">Nombre</label>
                                    <span class="text-danger"
                                        style="font-size= 15px !important;"><?= isset($mensaje['nombre']) ? $mensaje['nombre'] : "" ?></span>
                                </div>
                                <div class="">
                                    <input name="nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : ""; ?>"
                                        class="form-control form-control-sm col-12" type="text" placeholder=""
                                        id="monto">
                                </div>
                            </div>

                            <div class="col-6 mt-4">
                                <div class="d-flex justify-content-between">
                                    <label for="formGroupExampleInput" class="form-label">Hora Desde</label> <span
                                        class="text-danger"
                                        style="font-size= 15px !important;"><?= isset($mensaje['horaDesde']) ? $mensaje['horaDesde'] : "" ?></span>
                                </div>
                                <div class="">
                                    <input name="horaDesde"
                                        value="<?= isset($_POST['horaDesde']) ? $_POST['horaDesde'] : ""; ?>"
                                        class="form-control form-control-sm col-12" type="time"
                                        placeholder="Día - Semana" id="monto">
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <div class="d-flex justify-content-between">
                                    <label for="formGroupExampleInput" class="form-label">Hora Hasta</label> <span
                                        class="text-danger"
                                        style="font-size= 15px !important;"><?= isset($mensaje['horaHasta']) ? $mensaje['horaHasta'] : "" ?></span>
                                </div>
                                <div class="">
                                    <input name="horaHasta"
                                        value="<?= isset($_POST['horaHasta']) ? $_POST['horaHasta'] : ""; ?>"
                                        class="form-control form-control-sm col-12" type="time"
                                        placeholder="Día - Semana" id="monto">
                                </div>
                            </div>

                            <div class="col-6 mt-4">
                                <div class="d-flex justify-content-between">
                                    <label for="formGroupExampleInput" class="form-label">Fecha Desde</label> <span
                                        class="text-danger"
                                        style="font-size= 15px !important;"><?= isset($mensaje['fechaDesde']) ? $mensaje['fechaDesde'] : "" ?></span>
                                </div>
                                <div class="">
                                    <input name="fechaDesde"
                                        value="<?= isset($_POST['fechaDesde']) ? $_POST['fechaDesde'] : ""; ?>"
                                        class="form-control form-control-sm col-12" type="date"
                                        placeholder="Día - Semana" id="monto">
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <div class="d-flex justify-content-between">
                                    <label for="formGroupExampleInput" class="form-label">Fecha Hasta</label> <span
                                        class="text-danger"
                                        style="font-size= 15px !important;"><?= isset($mensaje['fechaHasta']) ? $mensaje['fechaHasta'] : "" ?></span>
                                </div>
                                <div class="">
                                    <input name="fechaHasta"
                                        value="<?= isset($_POST['fechaHasta']) ? $_POST['fechaHasta'] : ""; ?>"
                                        class="form-control form-control-sm col-12" type="date"
                                        placeholder="Día - Semana" id="monto">
                                </div>
                            </div>
                        </div>

                        <div class="card text-center col-12 my-4 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Días</h5>
                                <div class="d-flex justify-content-between">
                                    <div class="col">
                                        <p class="fs-5 col-12 d-flex justify-content-center">LUN</p>
                                        <div class="form-check col-12 d-flex justify-content-center">
                                            <input name="lun" value="<?= isset($_POST['lun']) ? $_POST['lun'] : ""; ?>"
                                                class="form-check-input bg-azul-300" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="fs-5 col-12 d-flex justify-content-center">MAR</p>
                                        <div class="form-check col-12 d-flex justify-content-center">
                                            <input name="mar" value="<?= isset($_POST['mar']) ? $_POST['mar'] : ""; ?>"
                                                class="form-check-input bg-azul-300" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="fs-5 col-12 d-flex justify-content-center">MIE</p>
                                        <div class="form-check col-12 d-flex justify-content-center">
                                            <input name="mie" value="<?= isset($_POST['mie']) ? $_POST['mie'] : ""; ?>"
                                                class="form-check-input bg-azul-300" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="fs-5 col-12 d-flex justify-content-center">JUE</p>
                                        <div class="form-check col-12 d-flex justify-content-center">
                                            <input name="jue" value="<?= isset($_POST['jue']) ? $_POST['jue'] : ""; ?>"
                                                class="form-check-input bg-azul-300" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="fs-5 col-12 d-flex justify-content-center">VIE</p>
                                        <div class="form-check col-12 d-flex justify-content-center">
                                            <input name="vie" value="<?= isset($_POST['vie']) ? $_POST['vie'] : ""; ?>"
                                                class="form-check-input bg-azul-300" type="checkbox" value=""
                                                id="flexCheckChecked" checked>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="fs-5 col-12 d-flex justify-content-center">SAB</p>
                                        <div class="form-check col-12 d-flex justify-content-center">
                                            <input name="sab" value="<?= isset($_POST['sab']) ? $_POST['sab'] : ""; ?>"
                                                class="form-check-input bg-azul-300" type="checkbox" value=""
                                                id="flexCheckChecked">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="fs-5 col-12 d-flex justify-content-center">DOM</p>
                                        <div class="form-check col-12 d-flex justify-content-center">
                                            <input name="dom" value="<?= isset($_POST['dom']) ? $_POST['dom'] : ""; ?>"
                                                class="form-check-input bg-azul-300" type="checkbox" value=""
                                                id="flexCheckChecked">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <p class="fs-5 col-12 d-flex justify-content-center">FER</p>
                                        <div class="form-check col-12 d-flex justify-content-center">
                                            <input name="fer" value="<?= isset($_POST['fer']) ? $_POST['fer'] : ""; ?>"
                                                class="form-check-input bg-azul-300" type="checkbox" value=""
                                                id="flexCheckChecked">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-around col-12">
                            <a href="listar">
                                <div class="btn btn-outline-secondary">Cancelar</div>
                            </a>
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </Div>
                </form>
            </div>
        </div>
    </div>
</body>