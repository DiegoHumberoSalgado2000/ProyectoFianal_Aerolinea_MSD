<?php
include_once 'layouts/header_Mi_Reserva.php';
?>
<title>Mi Reserva</title>
<script src="../Recursos/js/gestionDatosMiReserva.js" type="text/javascript"></script>
<?php
include_once 'layouts/nav_Mi_Reserva.php';
?>
<?php

if(isset($_GET['res'])){
    $Datos=$_GET['res'];
    //echo($lista);
    //print_r($lista);
}
?>
<!---<script type="text/javascript"> 

    LlenarDatos(datos='<?php echo $Datos ?>');

</script>
-->
<input type="hidden" id="txtIdReserva" class="form-control">
<input type="hidden" id="txtDatos" value='<?php echo $Datos ?>' class="form-control">

<section class="ContenedorFormularioReserva">
    <div class="panel panel-primary">

        <div class="panel-heading">
            <h4 class=" estiloTextReserva">Mi Reserva</h4>
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
                        <h3 class="panel-title">Información de la Reserva</h3>
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
                <div class="modal-footer row">
                    <p class="ColorTextoModalIniciarSesion estiloTextReserva">Si desea cancelar su reserva solo tiene
                        como plazo mínimo de 8 dias antes del Vuelo</p>
                    <br>
                    <div class="offset-sm-2 col-sm-12 float-right">
                        <button type="button" class="btn btn-danger" id="btnCancelarReserva">Cancelar Reserva</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
include_once 'layouts/footer_Mi_Reserva.php';
?>