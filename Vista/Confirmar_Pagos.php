<?php
include_once 'layouts/header_Pagina_Inicio.php'
?>
<title>Confirmar Pagos</title>
<script src="../Recursos/js/gestionHistorialPagos.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<?php
include_once 'layouts/nav_Pagina_Inicio.php';
?>

<?php
if (isset($_GET['res'])) {
    $codigoReserva = $_GET['res'];
    //echo($lista);
    //print_r($lista);
}
?>

<input type="hidden" id="txtCodigoReserva" value='<?php echo $codigoReserva ?>' class="form-control">

<section class="ContenedorFormularioReserva">
    <div class="panel panel-primary">

        <div class="panel-heading">
            <h4 class=" estiloTextReserva">Confirmar Pago</h4>
        </div>
        <div class="panel-body">
            <form action="" class="form-horizontal">


                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Información Bancaria</h3>
                    </div>
                    <div class="panel-body">


                        <div class="form-group row">

                            <div class="form-group">
                                <input type="hidden" id="txtIdHistorialPagos" class="form-control">
                                <input type="hidden" id="txtCondiResultado" class="form-control">
                                <input type="hidden" id="txtMsjResultado" class="form-control">
                            </div>

                            <label for="" class="col-sm-2 col-form-label">Tarjeta de Crédito</label>
                            <div class="col-sm-5">
                                <select  id="CmbTargetaCredito" class="form-control">
                                    <option>Seleccione el tipo de tarjeta de Crédito</option>
                                    <option>Visa</option>
                                    <option>Mastercard</option>
                                    <option>American Express</option>
                                    <option>Diners</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Mes de Vencimiento</label>
                            <div class="col-sm-5">
                                <select id="CmbMesVencimiento" class="form-control">
                                    <option>Seleccione el mes de Vencimiento</option>
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Opciones de Pago</label>
                            <div class="col-sm-5">
                                <select id="CmbCantidadCuotas" class="form-control">
                                    <option>Seleccione la cantidad de Cuotas</option>
                                    <option>1 Cuotas Mensuales</option>
                                    <option>2 Cuotas Mensuales</option>
                                    <option>3 Cuotas Mensuales</option>
                                    <option>4 Cuotas Mensuales</option>
                                    <option>5 Cuotas Mensuales</option>    
                                    <option>6 Cuotas Mensuales</option>
                                    <option>7 Cuotas Mensuales</option>
                                    <option>8 Cuotas Mensuales</option>
                                    <option>9 Cuotas Mensuales</option>
                                    <option>10 Cuotas Mensuales</option>
                                    <option>11 Cuotas Mensuales</option>
                                    <option>12 Cuotas Mensuales</option>
                                    <option>13 Cuotas Mensuales</option>
                                    <option>14 Cuotas Mensuales</option>
                                    <option>15 Cuotas Mensuales</option>
                                    <option>16 Cuotas Mensuales</option>
                                    <option>17 Cuotas Mensuales</option>
                                    <option>18 Cuotas Mensuales</option>
                                    <option>19 Cuotas Mensuales</option>
                                    <option>20 Cuotas Mensuales</option>
                                    <option>21 Cuotas Mensuales</option>
                                    <option>22 Cuotas Mensuales</option>
                                    <option>23 Cuotas Mensuales</option>
                                    <option>24 Cuotas Mensuales</option>
                                    <option>25 Cuotas Mensuales</option>
                                    <option>26 Cuotas Mensuales</option>
                                    <option>27 Cuotas Mensuales</option>
                                    <option>28 Cuotas Mensuales</option>
                                    <option>29 Cuotas Mensuales</option>
                                    <option>30 Cuotas Mensuales</option>
                                    <option>31 Cuotas Mensuales</option>
                                    <option>32 Cuotas Mensuales</option>
                                    <option>33 Cuotas Mensuales</option>
                                    <option>34 Cuotas Mensuales</option>
                                    <option>35 Cuotas Mensuales</option>
                                    <option>36 Cuotas Mensuales</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Año de Vencimiento</label>
                            <div class="col-sm-5">
                                <select id="CmbAvencimiento" class="form-control">
                                    <option>Seleccione el Año de Vencimiento</option>
                                    <option>2021</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    <option>2026</option>
                                    <option>2027</option>
                                    <option>2028</option>
                                    <option>2029</option>
                                    <option>2030</option>
                                    <option>2031</option>
                                    <option>2032</option>
                                    <option>2033</option>
                                    <option>2034</option>
                                    <option>2035</option>
                                    <option>2036</option>
                                    <option>2037</option>
                                    <option>2038</option>
                                    <option>2039</option>
                                    <option>2040</option>
                                    <option>2041</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Número de Tarjeta</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtNumeroTargetaCredito" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Número de Verificación</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtNumeroVerificacion" class="form-control">
                            </div>

                        </div>
                    </div>

                </div>

                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Información del Pasajero</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <div class="col-sm-5">
                                <input  type="hidden" id="txtIdReservaPasajero" class="form-control">
                                <input type="hidden" id="txtCondiResultado" class="form-control">
                                <input type="hidden" id="txtMsjResultado" class="form-control">
                            </div>
                        </div>

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
                            <label for="" class="col-sm-2 col-form-label">Teléfono</label>
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
                            <label for="" class="col-sm-2 col-form-label">Identificación</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtDocumentoIdentidad" class="form-control">
                            </div>

                        </div>

                    </div>
                </div>

                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Resumen de Pago</h3>
                    </div>

                    <div class="panel-body"> 
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Valor Tiquete</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtValorTiquete" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">     
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Servicio Adicional</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtServicioAdicionales" class="form-control">
                            </div>
                        </div>
                    </div>  
                    <div class="panel-body">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">TOTAL A PAGAR</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtTotalAPagar" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer row">
                    <div class="offset-sm-2 col-sm-12 float-right">
                        <button type="button" class="btn btn-danger" id="btnPagarReserva">PAGAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include_once 'layouts/footer_Pagina_Inicio.php';
?>