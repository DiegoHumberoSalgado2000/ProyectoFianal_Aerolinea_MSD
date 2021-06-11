<?php
ob_start();
//Con esto, se pueden enviar los headers en cualquier lugar del documento.
?>


<?php

include_once 'layouts/header.php';
?>

<title>Menu Administrador</title>
<script src="../Recursos/jquery/jquery-3.5.0.min.js"></script>
<script src="../Recursos/js/datosMenuAdministrador.js" type="text/javascript"></script>
<?php
session_start();
include_once 'layouts/nav_Administrador.php';

if (isset($_SESSION["administrador"])) {
    $correoUsuarioIdentificado=$_SESSION["administrador"];
    //printf("<script type='text/javascript'>alert(' $correo'); </script>");
}else{
    $mensaje = "Solo puede ingresar un administrador en esta vista";
    header('location:../index.php?msjlogIn=' . $mensaje);
}

?>

<script type="text/javascript">
    datosRequeridos(correoUsuarioIdentificado='<?php echo $correoUsuarioIdentificado ?>');
</script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Datos Personales</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../Vista/adm_Aerolinea.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Página Administrador</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img src="../img/avatar5.png" class="profile-user-img img-fluid img-circle">
                                </div>
                                <h3 class="profile-username text-center text-success" id="lblNombre" >Nombre</h3>
                                <p class="text-muted text-center" id="lblApellido">Apellido</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b class="ColorText">Correo</b><a class="text-muted float-right" id="lblCorreo">ejemplo@ejemplo.com</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="ColorText">Cédula</b><a class="text-muted float-right" id="lblCedula">123456789</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="ColorText">Estado</b><a class="text-muted float-right" id="lblEstado">ejemplo</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="ColorText">Tipo Usuario</b>
                                        <span class="estiloTextTipoUsuario badge badge-primary float-right">Administrador</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Sobre mi</h3>
                            </div>
                            <div class="card-body">
                                <strong class="ColorText">
                                    <i class="fas fa-phone mr-1">Teléfono</i>
                                </strong>
                                <p class="text-muted" id="lblTelefono">3175914679</p>



                                <strong class="ColorText">
                                    <i class="fas fa-envelope mr-1">Correo</i>
                                </strong>
                                <p class="text-muted" id="lblCorreo2">ejemplo@ejemplo.com</p>
                                <button class="btn btn-block bg-gradient-danger" id="btnEditar">Editar</button>
                            </div>
                            <div class="card-footer">
                                <p class="text-mited">clic en botón si desea editar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Editar datos Personales</h3>
                            </div>
                            <div class="card-body">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="txtNombre" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Apellido</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="txtApellido" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Correo</label>
                                        <div class="col-sm-10">
                                            <input type="email" id="txtCorreo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Cédula</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="txtCedula" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Teléfono celular</label>
                                        <div class="col-sm-10">
                                            <input type="number" id="txtTelefono" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Contraseña</label>
                                        <div class="col-sm-10">
                                            <input type="password" id="txtContrasena" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
                                        <div class="col-sm-10">
                                            <input type="password" id="txtConfirmarContrasena" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10 float-right">
                                            <button class="btn btn-block btn-outline-success" id="btnGuardarActualizar">Actualizar</button>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Cuidado de ingresar datos erróneos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Main content -->
</div>
<!-- /.content-wrapper -->

<?php
 include_once 'layouts/footer.php';
 ?>

<?php
ob_end_flush();
?>