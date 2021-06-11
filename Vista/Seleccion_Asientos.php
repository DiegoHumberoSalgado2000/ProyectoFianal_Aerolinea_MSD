<?php
include_once 'layouts/header_seleccion_asientos.php'
?>
<title>Seleccionar Asiento</title>
<?php
include_once 'layouts/nav_seleccion_asientos.php';


if(isset($_GET['res'])){
    $codigo=$_GET['res'];
    //echo($lista);
    //print_r($codigo);

}
?>
<!--
<script type="text/javascript">
    datosRequeridos(datos='<?php echo $codigo ?>');
</script>
-->
<input type="hidden" id="txtIdItinerarioEncri" class="form-control" value='<?php echo $codigo ?>' >

<body style="overflow-x:hidden">
<input type="hidden" class="form-control" id="txtIdItinerarioVuelo" value=<?php echo $codigo ?> >
<input type="hidden" class="form-control" id="txtIdSillaSeleccionada" >
        <!--Modal-->
        <div class="modal fade" id="Registrarse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Registrarme</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-13">
                                    <div class="col-12 col-sm-6 ContenedorColoriniciarSesion">
                                        <b class="ColorTextoModalIniciarSesion">
                                            <br>
                                            Crea tu cuenta de usuario y poder disfrutar de
                                            todos nuestros beneficios
                                            <br>
                                            <hr class="LineaHorizontal">
                                            <br>
                                            <i class="fas fa-plane"></i> Realizar tus compras de manera 100% segura y rápida
                                            <br>
                                            <br>
                                            <br>
                                            <i class="fas fa-plane"></i> Realiza tu check-in online de forma más rápida
                                            <br>
                                            <br>
                                            <br>
                                            <i class="fas fa-plane"></i> Viaja con tus familiares o compañeros de trabajo de
                                            forma más rápida
                                            <br>
                                            <br>
                                            <br>
                                            <i class="fas fa-plane"></i> Entérate primero de nuestros mejores descuentos
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>

                                        </b>
                                    </div>
                                    <div class="col-4 col-sm-6">

                                        <div class="text-center">
                                            <img src="../img/LogoAerolineaMSD.png" class="ImagenBannerLogoModaliniciarSesion">
                                        </div>

                                        <h3>Registrarme</h3>
                                        <hr class="LineaHorizontal">
                                        <form action="">
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Nombre</label>
                                                <input type="text" class="form-control" id="txtNombre">
                                                <input type="hidden" id="txtIdPasajero" class="form-control">
                                                <input type="hidden" id="txtCondiResultado" class="form-control">
                                                <input type="hidden" id="txtMsjResultado" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Apellido</label>
                                                <input type="text" class="form-control" id="txtApellido">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Cédula</label>
                                                <input type="text" class="form-control" id="txtCedula">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Correo</label>
                                                <input type="email" class="form-control" id="txtCorreo">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Télefono</label>
                                                <input type="phone" class="form-control" id="txtTelefono">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Contraseña</label>
                                                <input type="password" class="form-control" id="txtContrasena">
                                            </div>
                                            <div class="modal-footer row">
                                                <button type="button" class="btn btn-block btn-danger" id="btnRegistrar">Registrarse</button>
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

                <!--Modal-->
                <div class="modal fade" id="InfoAsiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Información del asiento</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-13">
                                <div class="text-center">
                                            <img src="../img/LogoAerolineaMSD.png" class="ImagenBannerLogoModaliniciarSesion">
                                        </div>
                                    <div class="col-4 col-sm-6">


                                        <h3>Información</h3>
                                        <hr class="LineaHorizontal">
                                        <form action="">
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Número silla</label>
                                                <input type="text" class="form-control" id="txtNumeroSilla">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Precio</label>
                                                <input type="text" class="form-control" id="txtPrecio">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Estado</label>
                                                <input type="text" class="form-control" id="txtEstadoSilla">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Tipo silla</label>
                                                <input type="email" class="form-control" id="txtTipo">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Descripción</label>
                                                <textarea class="form-control"  rows="5" id="txtDescripcionSilla"></textarea>
                                                <input type="hidden" class="form-control" id="txtIdSilla">
                                            </div>
                                            <div class="modal-footer row">
                                                <button type="button" class="btn btn-block btn-danger" id="btnSeleccionarSilla">Seleccionar Silla</button>
                                            </div>
                                        </form>

                                    </div>

                                    <div class="col-4 col-sm-6">

                                        <h3>Información Personal</h3>
                                        <hr class="LineaHorizontal">

                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Correo</label>
                                                <input type="text" class="form-control" id="txtCorreoSilla">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Contraseña</label>
                                                <input type="password" class="form-control" id="txtContrasenaSilla">
                                                <input type="hidden" class="form-control" id="txtIdPersona">
                                            </div>
                                            <div class="modal-footer row">
                                                <button type="button" class="btn btn-block btn-danger" id="btnValidarDatos">Validar Datos</button>
                                            </div>

                                            <div class="form-group">
                                                <label for="message-text" class="control-label" class="close"  class="close" data-dismiss="modal">Si va a validar los datos , antes tiene que estar registrado</label>

                                            </div>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

<section class="ContenedorFormularioReserva">
    <div class="panel panel-primary">

        <div class="panel-heading">
            <h4 class=" estiloTextReserva">Seleccione la Silla</h4>
        </div>
        <div class="panel-body">
                <br>
                <br>
                <section class="ContenedorSillasAvion">
                    <table>
                        <tr>
                            <td><button id="Uno"  data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase2">1</button></td>
                            <td><button id="Dos"  data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase2">2</button></td>
                            <td><button id="Tres"  data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase">3</button></td>
                            <td><button id="Cuatro"  data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase">4</button></td>
                        </tr>
                    </table>
                </section>
                <br>
                <section class="ContenedorSillasAvion">
                    <table>
                        <tr>
                            <td><button id="Cinco" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase2">5</button></td>
                            <td><button id="Seis" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase2">6</button></td>
                            <td><button id="Siete" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase">7</button></td>
                            <td><button id="Ocho" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase">8</button></td>
                        </tr>
                    </table>

                </section>
                <br>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="Nueve" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">9</button></td>
                            <td><button id="Diez" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">10</button></td>
                            <td><button id="Once" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">11</button></td>
                            <td><button id="Doce" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">12</button></td>
                            <td><button id="Trece" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">13</button></td>
                            <td><button id="Catorce" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">14</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="Quince" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">15</button></td>
                            <td><button id="Dieciseis" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">16</button></td>
                            <td><button id="Diecisiete" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">17</button></td>
                            <td><button id="Dieciocho" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">18</button></td>
                            <td><button id="Diecinieve" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">19</button></td>
                            <td><button id="Veinte" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">20</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="VeintiUno" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">21</button></td>
                            <td><button id="VeintiDos" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">22</button></td>
                            <td><button id="VeintiTres" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">23</button></td>
                            <td><button id="VeintiCuatro" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">24</button></td>
                            <td><button id="VeintiCinco" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">25</button></td>
                            <td><button id="veintiSeis" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">26</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="VeintiSiete" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">27</button></td>
                            <td><button id="VeintiOcho" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">28</button></td>
                            <td><button id="VeintiNueve" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">29</button></td>
                            <td><button id="Treinta" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">30</button></td>
                            <td><button id="TreintaUno" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">31</button></td>
                            <td><button id="TreintaDos" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">32</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="TreintaTres" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">33</button></td>
                            <td><button id="TreintaCuatro" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">34</button></td>
                            <td><button id="TreintaCinco" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">35</button></td>
                            <td><button id="TreintaSeis" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">36</button></td>
                            <td><button id="TreintaSiete" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">37</button></td>
                            <td><button id="TreintaOcho" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">38</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="TreintaNueve" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">39</button></td>
                            <td><button id="Cuarenta" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">40</button></td>
                            <td><button id="CuarentaUno" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">41</button></td>
                            <td><button id="CuarentaDos" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">42</button></td>
                            <td><button id="CuarentaTres" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">43</button></td>
                            <td><button id="CuarentaCuatro" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">44</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="CuarentaCinco" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">45</button></td>
                            <td><button id="CuarentaSeis" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">46</button></td>
                            <td><button id="CuarentaSiete" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">47</button></td>
                            <td><button id="CuarentaOcho" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">48</button></td>
                            <td><button id="CuarentaNueve" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">49</button></td>
                            <td><button id="Cincuenta" data-target="#InfoAsiento" data-toggle="modal" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">50</button></td>
                        </tr>
                    </table>

                </section>
                <br>
                <br>
                <div class="modal-footer row">
                    <p class="ColorTextoModalIniciarSesion estiloTextReserva">Al dar click en continuar acepta las
                        políticas
                        y condiciones de la Aerolínea</p>
                    <div class="offset-sm-2 col-sm-12 float-right">
                        <button type="button" id="btnReservar" class="btn btn-danger">Reservar</button>
                    </div>
                </div>

        </div>








    </div>





</section>



<?php
include_once 'layouts/footer_Pagina_Inicio.php';
?>