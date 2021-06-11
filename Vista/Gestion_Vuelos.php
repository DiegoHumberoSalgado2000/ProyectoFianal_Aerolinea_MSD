<?php
ob_start();
//Con esto, se pueden enviar los headers en cualquier lugar del documento.
?>

<?php
include_once 'layouts/header.php';
?>
<title>Menú Administrador</title>
<script src="../Recursos/jquery/jquery-3.5.0.min.js" type="text/javascript"></script>
<script src="../Recursos/js/gestionVuelo.js" type="text/javascript"></script>
<?php
include_once 'layouts/nav_Administrador.php';
session_start();
if (isset($_SESSION["administrador"])) {
    $correoUsuarioIdentificado=$_SESSION["administrador"];
    //printf("<script type='text/javascript'>alert(' $correo'); </script>");
}else{
    $mensaje = "Solo puede ingresar un administrador en esta vista";
    header('location:../index.php?msjlogIn=' . $mensaje);
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión Vuelos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../Vista/adm_Aerolinea.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Página Administrador</li>
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
                                <h3 class="card-title">Vuelo</h3>
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Tipo Vuelo</label>
                                        <div class="col-sm-9">
                                        <select type="text" id="selTipoVuelo" class="form-control">
                                                <option value="-1">Seleccione el Tipo de Vuelo</option>
                                                <option>Vuelo Nacional</option>
                                                <option>Vuelo Internacional</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Avión</label>
                                        <div class="col-sm-9">
                                            <select type="text" id="selAvion" class="form-control">
                                                <option value="-1">Seleccione Avión</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Descripción</label>
                                        <div class="col-sm-9">
                                        <textarea class="form-control" id="txtDescripcion"></textarea>
                                        <input type="hidden" id="txtIdVuelo" class="form-control">
                                            <input type="hidden" id="txtCondiResultado" class="form-control">
                                            <input type="hidden" id="txtMsjResultado" class="form-control">
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

    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Lista De Vuelos</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-over text-nowrap">
                                    <thead class="table-success">
                                        <tr>
                                            <th>Tipo Vuelo</th>
                                            <th>Avión</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="table-active" id="ListaVuelo">

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
</div>

<?php
include_once 'layouts/footer.php';
?>

<?php
ob_end_flush();
?>