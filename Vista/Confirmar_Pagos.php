<?php
include_once 'layouts/header_Pagina_Inicio.php'
?>
<title>Confirmar Pagos</title>
<?php
include_once 'layouts/nav_Pagina_Inicio.php';
?>


<section class="ContenedorFormularioReserva">
    <div class="panel panel-primary">

        <div class="panel-heading">
            <h4 class=" estiloTextReserva">Confirmar Pago</h4>
        </div>
        <div class="panel-body">
            <form action="" class="form-horizontal">


                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Informacion Bancaria</h3>
                    </div>
                    <div class="panel-body">


                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Targeta de Credito</label>
                            <div class="col-sm-5">
                                <select  id="CmbTargetaCredito" class="form-control">
                                <option>Seleccione el tipo de targeta de Credito</option>
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
                                <select id="CmbAñoVencimiento" class="form-control">
                                <option>Seleccion el Año de Vencimiento</option>
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
                            <label for="" class="col-sm-2 col-form-label">Numero de Targeta</label>
                            <div class="col-sm-5">
                                <input type="number" id="txtNumeroTargetaCredito" class="form-control">
                            </div>

                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Numero de Verificacion</label>
                            <div class="col-sm-5">
                                <input type="number" id="txtNumeroVerificacion" class="form-control">
                            </div>

                        </div>
                    </div>
                    
                </div>

                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Informacion del Pasajero</h3>
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
                            <label for="" class="col-sm-2 col-form-label">Direccion</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtDireccion" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Pais</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtPais" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Ciudad</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtCiudad" class="form-control">
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Documento de Identidad</label>
                            <div class="col-sm-5">
                                <select id="txtCmbDocumentoIdentidad" class="form-control">
                                <option>Seleccione el tipo de Documento de Identidad</option>
                                <option>Cedula de Ciudadania</option>
                                <option>Documento de Identidad</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Identificacion</label>
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
                            <label for="" class="col-sm-2 col-form-label">Total Tarifa</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtTotalTarifa" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Total Tasa e Impuestos</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtTotalTasaImpuestos" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Check-in en el Aeropuerto</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtCheck-inAeropuerto" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Compra Tranquilo</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtCompraTranquilo" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Fila Express</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtFilaExpress" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Segun por perdida de Equipaje</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtPerdidaEquipaje" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Segun Medico</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtSegunMedico" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Segun por Cancelacion</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtSegunCancelacion" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Total Sobrecargos</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtTotalSobrecargos" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Total IVA</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtTotalIVA" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">TOTAL A PAGAR</label>
                            <div class="col-sm-5">
                                <input type="text" id="txtTotalPagar" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer row">
                        <div class="offset-sm-2 col-sm-12 float-right">
                            <button type="button" class="btn btn-danger">PAGAR =></button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</section>

<?php
include_once 'layouts/footer_Pagina_Inicio.php';
?>