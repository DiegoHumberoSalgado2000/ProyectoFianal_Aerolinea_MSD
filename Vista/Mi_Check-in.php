<?php
include_once 'layouts/header_Check-in.php';
?>
<title>Mi Check-in</title>
<script src="../Recursos/js/gestionDatosCheckIn.js" type="text/javascript"></script>
<?php
include_once 'layouts/nav_Check-in.php';
?>

<?php

if(isset($_GET['res'])){
    $Datos=$_GET['res'];
    //echo($lista);
    //print_r($lista);


}
?>

<script type="text/javascript">
    LlenarDatos(datos='<?php echo $Datos ?>');
</script>
<input type="hidden" id="txtIdReserva" class="form-control">

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
                            <label for="" class="col-sm-2 col-form-label">Cédula</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtCedula" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Télefono</label>
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
                                <input type="text" id="txtNumeroSilla" class="form-control">
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
                                <input type="text" id="txtEstadoReserva" class="form-control">
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
                                <input type="text" id="txtTipoVuelo" class="form-control">
                            </div>

                        </div>

                        

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Estado del Vuelo</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtEstadoVuelo" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Placa del Avión</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtPlaca" class="form-control">
                            </div>
                        </div>

                       
                    </div>
                </div>

                <div class="modal-footer row">
                    <p class="ColorTextoModalIniciarSesion estiloTextReserva">Si desea puede descargar el pasaporte del
                        vuelo dando click en él
                        botón de imprimir Check-in
                    </p>
                    <div class="offset-sm-2 col-sm-12 float-right">
                        <button type="button" class="btn btn-danger"id="btnImprimirCheckIn">Imprimir Check-in</button>
                    </div>
                </div>

                <div class="modal-footer row">

                    <p class="ColorTextoModalIniciarSesion estiloTextReserva">Si desea validar el check-in debe dar
                        clic en el botón
                        de Aceptar para que pueda entrar en la sala de abordaje del Vuelo
                    </p>
                    <div class="offset-sm-2 col-sm-12 float-right">
                        <button type="button" class="btn btn-danger" id="btnAceptarCheckIn">Aceptar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include_once 'layouts/footer_Check-in.php';
?>