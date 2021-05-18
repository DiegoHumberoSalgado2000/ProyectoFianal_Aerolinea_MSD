<?php
include_once 'layouts/header_seleccion_asientos.php'
?>
<title>Seleccionar Asiento</title>
<?php
include_once 'layouts/nav_seleccion_asientos.php';
?>

<body style="overflow-x:hidden">


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
                                            todos nuetros beneficios
                                            <br>
                                            <hr class="LineaHorizontal">
                                            <br>
                                            <i class="fas fa-plane"></i> Realizar tus compras de manera 100% segura y rapida
                                            <br>
                                            <br>
                                            <br>
                                            <i class="fas fa-plane"></i> Realizatu check-in online de forma mas rapida
                                            <br>
                                            <br>
                                            <br>
                                            <i class="fas fa-plane"></i> Viaja con tus familiares o compañeros de trabajo de
                                            forma mas raoida
                                            <br>
                                            <br>
                                            <br>
                                            <i class="fas fa-plane"></i> Enterate primero de nuetros mejores descuentos
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
                                                <label for="message-text" class="control-label">Cedula</label>
                                                <input type="text" class="form-control" id="txtCedula">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Correo</label>
                                                <input type="email" class="form-control" id="txtCorreo">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Telefono</label>
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
                                    <div class="col-4">

                                        <div class="text-center">
                                            <img src="../img/LogoAerolineaMSD.png" class="ImagenBannerLogoModaliniciarSesion">
                                        </div>

                                        <h3>Información</h3>
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
                                                <label for="message-text" class="control-label">Cedula</label>
                                                <input type="text" class="form-control" id="txtCedula">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Correo</label>
                                                <input type="email" class="form-control" id="txtCorreo">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Telefono</label>
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
                            <td><button id="Dos" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase2">2</button></td>
                            <td><button id="Tres" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase">3</button></td>
                            <td><button id="Cuatro" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase">4</button></td>
                        </tr>
                    </table>
                </section>
                <br>
                <section class="ContenedorSillasAvion">
                    <table>
                        <tr>
                            <td><button id="Cinco" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase2">5</button></td>
                            <td><button id="Seis" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase2">6</button></td>
                            <td><button id="Siete" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase">7</button></td>
                            <td><button id="Ocho" class="DiseñoBotones sombra MoverBotonesSillaPrimeraClase">8</button></td>
                        </tr>
                    </table>

                </section>
                <br>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="Nueve" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">9</button></td>
                            <td><button id="Diez" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">10</button></td>
                            <td><button id="Once" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">11</button></td>
                            <td><button id="Doce" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">12</button></td>
                            <td><button id="Trece" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">13</button></td>
                            <td><button id="Catorce" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">14</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="Quince" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">15</button></td>
                            <td><button id="Dieciseis" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">16</button></td>
                            <td><button id="Diecisiete" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">17</button></td>
                            <td><button id="Dieciocho" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">18</button></td>
                            <td><button id="Diecinieve" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">19</button></td>
                            <td><button id="Veinte" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">20</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="VeintiUno" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">21</button></td>
                            <td><button id="VeintiDos" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">22</button></td>
                            <td><button id="VeintiTres" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">23</button></td>
                            <td><button id="VeintiCuatro" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">24</button></td>
                            <td><button id="VeintiCinco" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">25</button></td>
                            <td><button id="veintiSeis" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">26</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="VeintiSiete" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">27</button></td>
                            <td><button id="VeintiOcho" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">28</button></td>
                            <td><button id="VeintiNueve" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">29</button></td>
                            <td><button id="Treinta" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">30</button></td>
                            <td><button id="TreintaUno" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">31</button></td>
                            <td><button id="TreintaDos" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">32</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="TreintaTres" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">33</button></td>
                            <td><button id="TreintaCuatro" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">34</button></td>
                            <td><button id="TreintaCinco" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">35</button></td>
                            <td><button id="TreintaSeis" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">36</button></td>
                            <td><button id="TreintaSiete" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">37</button></td>
                            <td><button id="TreintaOcho" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">38</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="TreintaNueve" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">39</button></td>
                            <td><button id="Cuarenta" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">40</button></td>
                            <td><button id="CuarentaUno" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">41</button></td>
                            <td><button id="CuarentaDos" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">42</button></td>
                            <td><button id="CuarentaTres" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">43</button></td>
                            <td><button id="CuarentaCuatro" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">44</button></td>
                        </tr>
                    </table>

                </section>
                <section class="ContenedorSillasAvionSegundaClase">
                    <table>
                        <tr>
                            <td><button id="CuarentaCinco" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">45</button></td>
                            <td><button id="CuarentaSeis" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">46</button></td>
                            <td><button id="CuarentaSiete" class="DiseñoBotones2 MoverBotonesSillaSegundaClase2">47</button></td>
                            <td><button id="CuarentaOcho" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">48</button></td>
                            <td><button id="CuarentaNueve" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">49</button></td>
                            <td><button id="Cincuenta" class="DiseñoBotones2 MoverBotonesSillaSegundaClase">50</button></td>
                        </tr>
                    </table>

                </section>
                <br>
                <br>
                <div class="modal-footer row">
                    <p class="ColorTextoModalIniciarSesion estiloTextReserva">Al dar click en continuar acepta las
                        politicas
                        y condiciones de la Aerolinea</p>
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