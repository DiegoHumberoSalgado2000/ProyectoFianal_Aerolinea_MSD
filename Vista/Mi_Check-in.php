<?php
include_once 'layouts/header_Check-in.php';
?>
<title>Mi Check-in</title>
<?php
include_once 'layouts/nav_Check-in.php';
?>


<section class="ContenedorFormularioReserva">
    <div class="panel panel-primary">

        <div class="panel-heading">
            <h4 class=" estiloTextReserva">Mi Check-in</h4>
        </div>
        <div class="panel-body">
            <form action="" class="form-horizontal">


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

                    </div>
                </div>

                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Informacion de la Reserva</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Silla</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtEstado" class="form-control">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Origen</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtOrigen" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Destino</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtDestino" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">FechaSalida</label>
                            <div class="col-sm-5">
                                <input type="date" id="txtFechaSalida" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">FechaLlegada</label>
                            <div class="col-sm-5">
                                <input type="date" id="txtFechaLlegada" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Estado Reserva</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtEstado Vuelo" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vuelo</h3>
                    </div>
                    <div class="panel-body">



                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Tipo Vuelo</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtEstado" class="form-control">
                            </div>

                        </div>

                        

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Estado del Vuelo</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtSilla" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Placa del Avion</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtOrigen" class="form-control">
                            </div>
                        </div>

                       
                    </div>
                </div>

                <div class="modal-footer row">
                    <p class="ColorTextoModalIniciarSesion estiloTextReserva">Si quere puede descargar el pasaporte del
                        buelo dando click en el
                        boton de imprimir Check-in
                    </p>
                    <div class="offset-sm-2 col-sm-12 float-right">
                        <button type="button" class="btn btn-danger">imprimir Check-in</button>
                    </div>
                </div>

                <div class="modal-footer row">

                    <p class="ColorTextoModalIniciarSesion estiloTextReserva">Si quiere validar el chack-in debe dar
                        click en el boton
                        de Aceptar para que pueda entar en la sala de abordaje del Vuelo
                    </p>
                    <div class="offset-sm-2 col-sm-12 float-right">
                        <button type="button" class="btn btn-danger">Aceptar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include_once 'layouts/footer_Check-in.php';
?>