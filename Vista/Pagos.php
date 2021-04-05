<?php
include_once 'layouts/header_Pagina_Inicio.php'
?>
<title>Pagos</title>
<?php
include_once 'layouts/nav_Pagina_Inicio.php';
?>

<section class="ContenedorFormularioReserva">
    <div class="panel panel-primary">

        <div class="panel-heading">
            <h4 class=" estiloTextReserva">Detalles de tu Reserva</h4>
        </div>
        <div class="panel-body">
            <form action="" class="form-horizontal">


                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Informacion Vuelo</h3>
                    </div>
                    <div class="panel-body">


                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Ubicacion de Salida</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtUbicacionSalida" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Ubicacion de Llegada</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtUbicacionLlegada" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Fecha de Salida</label>
                            <div class="col-sm-5">
                                <input type="date" id="txtFechaSalida" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Numero de Vuelo</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtNumeroVuelo" class="form-control">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pasajero</h3>
                    </div>
                    <div class="panel-body">


                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtNombre" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Apellido</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtApellido" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Cedula</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtCedula" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtTelefono" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtCorreo" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Genero</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtGenero" class="form-control">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Total Costo</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Total a Pagar</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtTotalPago" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer row">
                        <div class="offset-sm-2 col-sm-12 float-right">
                            <button type="button" class="btn btn-danger">Pagar</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>


<?php
include_once 'layouts/footer_Pagina_Inicio.php';
?>