<?php
ob_start();
//Con esto, se pueden enviar los headers en cualquier lugar del documento.
?>
<?php
include_once 'layouts/header.php';
?>
<title>Menú Administrador</title>
<script src="../Recursos/jquery/jquery-3.5.0.min.js" type="text/javascript"></script>
<script src="../Recursos/js/BuscarReservaDisponible.js" type="text/javascript"></script>
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
                    <h1>Gestión Reserva Pasajero</h1>
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <div class="card-title">Reserva</div>
                                            <div class="input-group">
                                                <input type="text" class="form-control float-left"
                                                    placeholder="Ingrese el codigo de la reserva" id="txtCodigoReserva">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default" id="btnBuscarReserva"><i
                                                            class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="content">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="card card-success">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Pasajero</h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-user mr-1">Nombre</i>
                                                                    </strong>
                                                                    <p class="text-muted" id="lblNombre"></p>

                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-user mr-1">Apellido</i>
                                                                    </strong>
                                                                    <p class="text-muted" id="lblApellido"></p>


                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-id-card mr-1">Cédula</i>
                                                                    </strong>
                                                                    <p class="text-muted" id="lblCedula"></p>


                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-phone mr-1">Teléfono</i>
                                                                    </strong>
                                                                    <p class="text-muted" id="lblTelefono"></p>

                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-envelope mr-1">Correo</i>
                                                                    </strong>
                                                                    <p class="text-muted" id="lblCorreo"></p>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="card card-success">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Información de Reserva
                                                                    </h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form action="" class="form-horizontal">

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Tipo
                                                                                Vuelo</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" id="txtTipoVuelo"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Estado Reserva</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    id="txtEstadoReserva"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Silla</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    id="txtSillaSeleccionada"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Descripción</label>
                                                                            <div class="col-sm-10">
                                                                                <textarea class="form-control"
                                                                                    id="txtDescripcion"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Origen</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" id="txtOrigen"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Destino</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" id="txtDestino"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Fecha
                                                                                Llegada</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="date" id="txtFechaLlegada"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Fecha
                                                                                Salida</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="date" id="txtFechaSalida"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>



                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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