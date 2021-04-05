


<?php

include_once 'layouts/header.php';

?>
<title>Menu Administrador</title>
<script src="../Recursos/jquery/jquery-3.5.0.min.js" type="text/javascript"></script>
<script src="../Recursos/js/gestionAvion.js" type="text/javascript"></script>
<?php

include_once 'layouts/nav_Administrador.php';

?>

<!-- Modal -->

<div class="modal fade" id="gestionMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gestion Marca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre Marca</label>
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
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Fabricante</label>
                        <select type="text" class="form-control" id="recipient-name">
                            <option>Seleccione el Fabricante</option>
                        </select>
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
<div class="modal fade" id="gestionFabricante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gestion Fabricante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre Fabricante</label>
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
<div class="modal fade" id="gestionColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gestion Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre Color</label>
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


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion Aviones</h1>
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
<!-- Seccion de gestion de avion--->
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
                                <button data-toggle="modal" data-target="#gestionMarca" type="button"
                                    class="btn btn-block btn-outline-warning btn-sm">Gestion Marca</button>

                                <button data-toggle="modal" data-target="#gestionFabricante" type="button"
                                    class="btn btn-block btn-outline-warning btn-sm">Gestion Fabricante</button>

                                <button data-toggle="modal" data-target="#gestionColor" type="button"
                                    class="btn btn-block btn-outline-warning btn-sm">Gestion Color</button>
                            </div>
                            <div class="card-footer">
                                <p class="text-mited">click en botones para gestionar</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Aviones</h3>
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Placa</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="txtPlaca" class="form-control">
                                            <input type="hidden" id="txtIdAvion" class="form-control">
                                            <input type="hidden" id="txtCondiResultado" class="form-control">
                                            <input type="hidden" id="txtMsjResultado" class="form-control">
                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Fabricante</label>
                                        <div class="col-sm-9">
                                            <select type="text" id="selFabricante" class="form-control">
                                                <option value="-1">Seleccione</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Marca</label>
                                        <div class="col-sm-9">
                                            <select type="text" id="selMarca" class="form-control">
                                                <option value="-1">Seleccione</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Color</label>
                                        <div class="col-sm-9">
                                            <select type="text" id="selColor" class="form-control">
                                                <option value="-1">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Descripccion</label>
                                        <div class="col-sm-9">
                                        <textarea class="form-control" id="txtDescripcion"></textarea>
                                        </div>

                                    </div>

                                    <div class="modal-footer row">
                                        <div class="offset-sm-2 col-sm-12 float-right">
                                            <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                                            <button type="button" class="btn btn-primary" id="btnBuscar">Buscar</button>
                                            <button type="button" class="btn btn-primary" id="btnModificar">Modificar</button>
                                            <button type="button" class="btn btn-primary" id="btnEliminar">Eliminar</button>
                                            <button type="button" class="btn btn-primary" id="btnCancelar">Cancelar</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
<!-- Seccion de listar--->
    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Lista Aviones</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-over text-nowrap">
                                    <thead class="table-success">
                                        <tr>
                                            <th>Placa</th>
                                            <th>Marca</th>
                                            <th>Color</th>
                                            <th>Descripccion</th>
                                            <th>Estado</th>
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