
<div class="container my-5">
    <div class="row">
        <div class="col-md-5">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#entrada" data-bs-toggle="tab">Entrada</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#salida" data-bs-toggle="tab">Salida</a>

                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="entrada">
            <form id="formulario" method="post">
                <h2>Formulario de Asistencias</h2>
                <input type="text" name="nombre" placeholder="Ingresar Nombre" class="form-control my-3">
                <input type="text" name="apellido" placeholder="Ingresar Apellido" class="form-control my-3">
                <select id="sexo" name="sexo" class="form-select col-lg-6 col-sm-12">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">Otro</option>
                </select>
                <input type="text" name="especialidad" placeholder="Ingrese Especialidad" class="form-control my-3">
                <!--                <input type="file" name="archivo" class="form-control my-3">-->
                <button class="btn btn-primary" type="submit">Guardar</button>
            </form>
            </div>
                <div class="tab-pane fade" id="salida">
                    <form id="formularioSali" method="post">
                        <h2>Formulario de Salida</h2>
                        <input type="text" name="nombreSalida" placeholder="Ingresar Nombre" class="form-control my-3">
                        <input type="text" name="apellidoSalida" placeholder="Ingresar Apellido" class="form-control my-3">
                        <select id="sexo" name="sexoSalida" class="form-select col-lg-6 col-sm-12">
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                            <option value="3">Otro</option>
                        </select>
                        <input type="text" name="especialidadSalida" placeholder="Ingrese Especialidad salida" class="form-control my-3">
                        <!--                <input type="file" name="archivo" class="form-control my-3">-->
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>
                </div>


                </div>
            <div class="mt-3" id="alerta"></div>
        </div>

        <div class="col-md-7">
            <table class="table table-bordered table-hover" id="tabla">
<!--                <caption>TABLA DE EMPLEADOS</caption>-->
                <thead class="table-dark">
                <tr>
                        <h3>TABLA DE EMPLEADOS REGISTRADOS</h3>

                </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Fecha Asistencia</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td></td>
                    </tr>
                    <!-- Agrega más filas de datos aquí si es necesario -->
                </tbody>
            </table>
            <a href="./fpdf/reporte.php" target="_blank" class="btn btn-warning">Generar Reporte</a>


        </div>

        <div class="container my-5">
            <h3>Filtro de Asistencias Semanal</h3>
            <form id="filtroFormulario" method="post">
                <div class="row">
                    <div class="col-md-3">
                        <label for="fechaInicio" class="form-label">Fecha de inicio:</label>
                        <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                    </div>
                    <div class="col-md-3">
                        <label for="fechaFin" class="form-label">Fecha de fin:</label>
                        <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary mt-4">Cargar</button>
                    </div>
                </div>
            </form>
            <div class="col-md-7">
                <table class="table table-bordered table-hover filtroTabla" id="filtroTabla">
                    <thead class="table-dark">
                    <tr>

                    </tr>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Fecha Asistencia</th>
                        <th scope="col">Estado</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <!-- Agrega más filas de datos aquí si es necesario -->
                    </tbody>
                </table>
                <a href="./fpdf/reporteSemanal.php" target="_blank" class="btn btn-warning">Generar Reporte Semanal</a>


            </div>        </div>


    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <script src="app.js"></script>
