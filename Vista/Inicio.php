<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inicio</title>
        <script src="Recursos/jquery/jquery-3.5.0.min.js" type="text/javascript"></script>
        <script src="Recursos/js/gestionLogin.js" type="text/javascript"></script>
        <script src="Recursos/js/gestionReserva.js" type="text/javascript"></script>
        <script src="Recursos/js/gestionCheckIn.js" type="text/javascript"></script>
        <script src="Recursos/js/gestionMiReserva.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>

    </head>

    <body style="overflow-x:hidden">


        <!--Modal-->
        <div class="modal fade" id="Registrarse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Crea tu cuenta</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-13">
                                    <div class="col-12 col-sm-6 ContenedorColoriniciarSesion">
                                        <b class="ColorTextoModalIniciarSesion">
                                            <br>
                                            Crea tu cuenta de usuario y puedes disfrutar de
                                            todos nuestros beneficios
                                            <br>
                                            <hr class="LineaHorizontal">
                                            <br>
                                            <i class="fas fa-plane"></i> Realiza tus compras de manera 100% segura y rápida
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
                                            <img src="img/LogoAerolineaMSD.png" class="ImagenBannerLogoModaliniciarSesion">
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
                                                <label for="message-text" class="control-label">Teléfono</label>
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
        <div class="modal fade" id="Iniciar_Sesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Iniciar Sesión</h4>
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

                                        </b>
                                    </div>
                                    <div class="col-4 col-sm-6">

                                        <div class="text-center">
                                            <img src="img/LogoAerolineaMSD.png" class="ImagenBannerLogoModaliniciarSesion">
                                        </div>

                                        <h3>Iniciar Sesión</h3>
                                        <hr class="LineaHorizontal">
                                        <br>
                                        <form form name="formularioLogIn" id="formularioLogIn" method="post" action="Controlador/gestionLogIn.php">
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Correo</label>
                                                <input type="email" id="txtCorreoLogin" name="txtCorreoLogin" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="control-label">Contraseña</label>
                                                <input type="password" id="txtContrasenaLogin" name="txtContrasenaLogin" class="form-control">
                                                <input type="hidden" name="type" id="txtType">
                                            </div>

                                            <div class="modal-footer row">
                                                <button type="button" class="btn btn-block btn-danger" id="btnIniciarSesion" onclick="validarLogIn('con')">Iniciar Sesión</button>
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
        <div class="modal fade" id="Mi_Reserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Mi Reserva</h4>
                    </div>
                    <div class="modal-body">
                        <p>Para gestionar tu reserva del vuelo digite
                            el código de reserva y el número de cédula
                        </p>
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Código Reserva</label>
                                <input type="number" id="codigoMiReserva" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Cédula</label>
                                <input type="number" id="cedulaMiReserva" class="form-control">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-block btn-danger" id="btnIngresarMiReserva">INGRESAR</button>

                    </div>
                </div>
            </div>
        </div>


        <!--Modal-->
        <div class="modal fade" id="Mi_Checkin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-dialog-scrollable modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Web Check-in</h4>
                    </div>
                    <div class="modal-body">
                        <p>Realice tu Check-in, desde 48 horas antes
                            de vuelos internacionales o nacionales.
                            Recuerde que es indispensable para pasar
                            a la sala de a abordage
                        </p>
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Código Réserva</label>
                                <input type="number" id="codigoReserva" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Cédula</label>
                                <input type="number" id="cedulacheckin" class="form-control">
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-block btn-danger" id="btnIngresarCheckIn">INGRESAR</button>

                    </div>
                </div>
            </div>
        </div>

        <!--myCarousel-->
        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="fill" style="background-image:url('img/aeropuertos-lujo-portada.jpg');"></div>
                    <div class="carousel-caption slide-up">
                        <h1 class="banner_heading">Flexibilidad <span> para </span> tus vuelos</h1>
                        <p class="banner_txt">¡Pensamos en ti! Por eso, te damos la mayor flexibilidad en tus vuelos para que los gestiones sin ninguna complicación.</p>
                    </div>
                </div>

                <div class="item">
                    <div class="fill" style="background-image:url('img/pixabaynubes-2.jpg');"></div>
                    <div class="carousel-caption slide-up">
                        <h1 class="banner_heading">Durante <span>el </span>Vuelo</h1>
                        <p class="banner_txt">Relájate y disfruta de nuestro servicio a bordo</p>
                    </div>
                </div>

                <div class="item">
                    <div class="fill" style="background-image:url('img/Airport inside (1)_2.jpg');"></div>
                    <div class="carousel-caption slide-up">
                        <h1 class="banner_heading">Consulta <span>y cambia </span>Tu vuelo</h1>
                        <p class="banner_txt">Revisa el estado de tu reserva, realiza cambios para vuelos sin afectaciones de fecha y hora o modifica tus datos de contacto</p>
                    </div>
                </div>

                <div class="item">
                    <div class="fill"
                         style="background-image:url('img/night-lights-airport-the-plane-wallpaper-preview.jpg');"></div>
                    <div class="carousel-caption slide-up">
                        <h1 class="banner_heading">Requisitos <span>Para tu </span>Viaje</h1>
                        <p class="banner_txt">Infórmate sobre las medidas que debes cumplir para ingresar a tu destino: pruebas de COVID-19, cuarentenas y más.</p>
                    </div>
                </div>

                <div class="item">
                    <div class="fill" style="background-image:url('img/plane-1666083_1280.jpg');"></div>
                    <div class="carousel-caption slide-up">
                        <h1 class="banner_heading">Viaja <span>Seguro </span>y con tranquilidad</h1>
                        <p class="banner_txt">Sigue nuestras recomendaciones de bioseguridad antes, durante y después de tu vuelo para que estés tranquilo en todo tu viaje..</p>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->

            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left"
                                                                                                    aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <i
                    class="fa fa-angle-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>

        </div>


        <section id="login-reg">
            <!--Linea en main.css 1412-->
            <div class="container">
                <!-- Top content -->

                <!--forms-right-icons-->
                <div class="col-md-12 col-sm-12">

                    <!--Linea en form-top en css.main 7682-->
                    <div class="form-top">
                        <div class="form-top-left">
                            <div class="ContenedorNavegacionBuscarVuelos">
                                <nav class="navigation">
                                    <ul class="show">
                                        <li><a>Reservar Vuelos</a></li>
                                        <li><a href="" data-target="#Mi_Reserva" data-toggle="modal" type="button">Mi
                                                Réserva</a></li>
                                        <li><a href="" data-target="#Mi_Checkin" data-toggle="modal" type="button">Mi
                                                Check-in</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!--Linea en main.css 3308-->
                        <div class="form-top-right">

                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="" class="login-form">


                            <div class="input-group form-group">
                                <span id="basic-addon1">
                                    <h7 class="textoh7">Solo Ida</h7>
                                    <input type="checkbox" id="chk1" name="checkbox" class="form"
                                           aria-describedby="basic-addon1">
                                </span>

                            </div>


                            <div class="ContenedorComboBoxOrigen">
                                <div class="input-group form-group">
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="fas fa-plane-departure"></i></span>
                                    <select type="text" class="form-control" id="cmbSalida" aria-describedby="basic-addon1">
                                        <option value="-1">Seleccione la ubicación de salida</option>

                                    </select>
                                </div>
                            </div>

                            <div class="ContenedorComboBoxDestino">
                                <div class="input-group form-group">

                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="fas fa-plane-arrival"></i></span>
                                    <select type="text" class="form-control" id="cmdLlegada" aria-describedby="basic-addon1">
                                        <option value="-1">Seleccione la ubicación de llegada</option>
                                    </select>
                                </div>
                            </div>

                            <div class="ContenedorFechaSalida">
                                <h6>Seleccione la Fecha de Salida</h6>
                                <div class="input-group form-group">
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="fas fa-calendar-alt"></i></span>
                                    <input type="date" class="form-control" id="FechaSalida"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="ContenedorFechaRegreso">
                                <h6>Seleccione la Fecha de llegada</h6>
                                <div class="input-group form-group">
                                    <span class="input-group-addon" id="basic-addon1"><i
                                            class="fas fa-calendar-alt"></i></span>
                                    <input type="date" class="form-control" id="FechaLlegada"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>

                            <div class="ContenedorCantidadPasajeros">
                                <h6>Seleccione números de Pasajeros</h6>
                                <div class="input-group form-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                                    <div class="col-sm-2">
                                        <input type="number" id="Origen"class="form-control" min="1" max="1" step="1" value="1" name="num"></div>

                                </div>
                            </div>



                            <div class="ContenedorBotonBuscarVuelos">
                                <button type="button" id="btnBuscarVuelo" class="boton_personalizado">Buscar Vuelo</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </section>



        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="section-heading text-center">
                        <div class="col-md-12 col-xs-12">
                            <h1>Te contamos lo que pasa en<span> Aerolinea MSD</span></h1>
                            <p class="subheading">Disfruta nuevos productos y servicios..</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/value_proposition_slider1.jpg"></div>

                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">Al preparar tu viaje</h5>
                                <p>Lo que necesitas saber con anticipación.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/value_proposition_slider2.jpg"></div>

                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">En el aeropuerto</h5>
                                <p>Hacemos fácil el día de tu viaje.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/value_proposition_slider3.jpg"></div>

                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">Durante el vuelo</h5>
                                <p>Relájate y disfruta de nuestro servicio a bordo.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/banner-secundario-pasajero-10-men.jpg">
                                </div>

                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">Beneficios para tu prueba PCR</h5>
                                <p>Trabajamos en alianza con laboratorios médicos para la toma de tu prueba COVID-19.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/Banner-secundario-booking-rentalcars.jpg">
                                </div>

                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">¿Necesitas completar tu viaje?</h5>
                                <p>Aprovecha descuentos exclusivos con Booking.com y Rentalcars.com para tu alojamiento y
                                    alquiler de autos.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/banner-secundario-nueva-app-mujer-esp.jpg">
                                </div>

                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">¡Nueva MyAerolineaMSD app!</h5>
                                <p>Compra y gestiona tus vuelos desde el celular disfrutando un diseño renovado, más rápido y
                                    simple.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt=""
                                                                src="img/Banner-secundario-parajero-tapabocas-v4.jpg"></div>

                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">Requisitos para tu viaje</h5>
                                <p>Infórmate sobre las medidas que debes cumplir para ingresar a tu destino: pruebas de
                                    COVID-19, cuarentenas y más.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/b-miamibeach-10092020.jpg"></div>

                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">Viaje a EE. UU.</h5>
                                <p>Planifique su próximo viaje con nuestras tarifas bajas a EE. UU.</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 portfolio-item">
                        <div class="portfolio-one">
                            <div class="portfolio-head">
                                <div class="portfolio-img"><img alt="" src="img/b2-MXinstallments-couple.jpg"></div>

                            </div>
                            <!-- End portfolio-head -->
                            <div class="portfolio-content">
                                <h5 class="title">Meses sin intereses</h5>
                                <p>Su siguiente viaje en cómodas mensualidades con Tarjetas y Bancos participantes</p>
                            </div>
                            <!-- End portfolio-content -->
                        </div>
                        <!-- End portfolio-item -->
                    </div>
                </div>

        </section>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    </body>

</html>