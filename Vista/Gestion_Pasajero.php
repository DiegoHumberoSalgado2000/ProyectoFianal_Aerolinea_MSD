<?php
include_once 'layouts/header.php';
?>
<title>Manu Administrador</title>
<script src="../Recursos/jquery/jquery-3.5.0.min.js" type="text/javascript"></script>
<script src="../Recursos/js/gestionPasajero.js" type="text/javascript"></script>    
<?php
include_once 'layouts/nav_Administrador.php';
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion Pasajero</h1>
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
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Pasajero</h3>
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">


                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txtNombre">
                                            <input type="hidden" id="txtIdPasajero" class="form-control">
                                            <input type="hidden" id="txtCondiResultado" class="form-control">
                                            <input type="hidden" id="txtMsjResultado" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Apellido</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txtApellido">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Cedula</label>
                                        <div class="col-sm-9">
                                            <input type="number" id="txtCedula" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Correo</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="txtCorreo">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Telefono</label>
                                        <div class="col-sm-9">
                                            <input type="phone" class="form-control" id="txtTelefono">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="message-text">
                                                <option>Seleccione el Estado</option>
                                                <option>Activo</option>
                                                <option>Inactivo</option>
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
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>


<?php
include_once 'layouts/footer.php';
?>