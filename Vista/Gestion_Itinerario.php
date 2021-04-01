<?php
include_once 'layouts/header.php';
?>
<title>Menu Administrador</title>
<?php
include_once 'layouts/nav_Administrador.php';
?>


<!-- Modal -->
<div class="modal fade" id="GestionUbicacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubicacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Ubicacion</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Descripccion:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Estado</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                </form>
            </div>
            <div class="modal-footer row">
                <div class="offset-sm-2 col-sm-11 float-right">
                    <button type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-primary">Buscar</button>
                    <button type="button" class="btn btn-primary">Modificar</button>
                    <button type="button" class="btn btn-primary">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="GestionAeropuerto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aeropuerto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre Aeropuerto</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Descripccion:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Ubicacion</label>
                        <select class="form-control" id="message-text">
                            <option>Seleccione la Ubicacion</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Estado</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                </form>
            </div>
            <div class="modal-footer row">
                <div class="offset-sm-2 col-sm-11 float-right">
                    <button type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-primary">Buscar</button>
                    <button type="button" class="btn btn-primary">Modificar</button>
                    <button type="button" class="btn btn-primary">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion Itinerario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../Vista/adm_Aerolinea.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Pagina Administrador</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Gestion</h3>
                            </div>
                            <div class="card-body">
                                <button data-toggle="modal" data-target="#GestionUbicacion" type="button"
                                    class="btn btn-block btn-outline-warning btn-sm">Ubicacion</button>

                                <button data-toggle="modal" data-target="#GestionAeropuerto" type="button"
                                    class="btn btn-block btn-outline-warning btn-sm">Aeropuerto</button>
                            </div>
                            <div class="card-footer">
                                <p class="text-mited">click en botones para gestionar</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Itinerario</h3>
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Vuelo</label>
                                        <div class="col-sm-9">
                                        <select type="text" id="CmbUbicacionLlegada" class="form-control">
                                                <option>Seleccione el Vuelo</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Ubicacion llegada</label>
                                        <div class="col-sm-9">
                                            <select type="text" id="CmbUbicacionLlegada" class="form-control">
                                                <option>Seleccione la Ubicaion llegada</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Ubicacion Salida</label>
                                        <div class="col-sm-9">
                                            <select type="text" id="CombubicacionSalida" class="form-control">
                                                <option>Seleccione la Ubicacion Salida</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Fecha llegada</label>
                                        <div class="col-sm-9">
                                            <input type="date" id="Placa" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Fecha Salida</label>
                                        <div class="col-sm-9">
                                            <input type="date" id="Placa" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="Placa" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Descripccion</label>
                                        <div class="col-sm-9">
                                        <textarea class="form-control" id="message-text"></textarea>
                                        </div>

                                    </div>


                                    <div class="modal-footer row">
                                        <div class="offset-sm-2 col-sm-12 float-right">
                                            <button type="button" class="btn btn-primary">Guardar</button>
                                            <button type="button" class="btn btn-primary">Buscar</button>
                                            <button type="button" class="btn btn-primary">Modificar</button>
                                            <button type="button" class="btn btn-primary">Eliminar</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Lista Itinerario</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-over text-nowrap">
                                    <thead class="table-success">
                                        <tr>
                                            <th>Vuelo</th>
                                            <th>Ubicacion llegada</th>
                                            <th>Ubicacion Salida</th>
                                            <th>Fecha llegada</th>
                                            <th>Fecha Salida</th>
                                            <th>Estado</th>
                                            <th>Descripccion</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-active" id="ListaAviones">

                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once 'layouts/footer.php';
?>