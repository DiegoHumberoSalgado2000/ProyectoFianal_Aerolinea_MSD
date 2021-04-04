<?php
include_once 'layouts/header_Pagina_Inicio.php'
?>
<title>Informacion Pasajero</title>
<?php
include_once 'layouts/nav_Pagina_Inicio.php';
?>

<section class="ContenedorFormularioReserva">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class=" estiloTextReserva">Pasajero</h4>
        </div>
        <div class="panel-body">

            <form action="" class="form-horizontal">
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
                <br>
                <b class="ColorTextoModalIniciarSesion estiloTextReserva">Valide si sus datos personales 
                    son correctos</b>
                <div class="modal-footer row">
                    <div class="offset-sm-2 col-sm-12 float-right">
                        <button type="button" class="btn btn-danger">Continuar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>

<?php
include_once 'layouts/footer_Pagina_Inicio.php';
?>