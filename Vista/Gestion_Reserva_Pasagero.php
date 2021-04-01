<?php
include_once 'layouts/header.php';
?>
<title>Menu Administrador</title>
<?php
include_once 'layouts/nav_Administrador.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion Reserva Pasagero</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../Vista/Emp_Aerolinea.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Pagina Empleado</li>
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
                                                <input id="buscarReserva" type="text" class="form-control float-left"
                                                    placeholder="Ingrese el codigo de la reserva">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default"><i
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
                                                                    <h3 class="card-title">Pasagero</h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-user mr-1">Nombre</i>
                                                                    </strong>
                                                                    <p class="text-muted"></p>

                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-user mr-1">Apellido</i>
                                                                    </strong>
                                                                    <p class="text-muted"></p>


                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-id-card mr-1">Cedula</i>
                                                                    </strong>
                                                                    <p class="text-muted"></p>


                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-phone mr-1">Telefono</i>
                                                                    </strong>
                                                                    <p class="text-muted"></p>

                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-envelope mr-1">Correo</i>
                                                                    </strong>
                                                                    <p class="text-muted"></p>

                                                                    <strong class="ColorText">
                                                                        <i class="fas fa-users mr-1">Genero</i>
                                                                    </strong>
                                                                    <p class="text-muted"></p>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="card card-success">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Informacion de Reserva
                                                                    </h3>
                                                                </div>
                                                                <div class="card-body">
                                                                    <form action="" class="form-horizontal">

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Estado</label>
                                                                            <div class="col-sm-10">
                                                                                <select id="CmbEstadoReserva"
                                                                                    class="form-control">
                                                                                    <option>Seleccine el estado</option>
                                                                                    <option>Desabilitado</option>
                                                                                    <option>Activo</option>
                                                                                </select>
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Hora
                                                                                Salida</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="date" id="FechaSalida"
                                                                                    class="form-control">
                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Silla</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text"
                                                                                    id="SillaSeleccionada"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Origen</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" id="Origen"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>


                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Destino</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" id="Destino"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Fecha
                                                                                Llegada</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="date" id="FechaLlegada"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Fecha
                                                                                Salida</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="date" id="FechaSalida"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Tipo
                                                                                Vuelo</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" id="TipoVuelo"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label for=""
                                                                                class="col-sm-2 col-form-label">Estado
                                                                                Vuelo</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" id="EstadoVuelo"
                                                                                    class="form-control">
                                                                            </div>
                                                                        </div>

                                                                        <div class="card-footer">
                                                                            <div
                                                                                class="offset-sm-2 col-sm-12 float-right">
                                                                                <button
                                                                                    class="btn btn-block btn-primary">Guardar</button>
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