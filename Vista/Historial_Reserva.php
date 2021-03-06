<?php
//include_once 'layouts/header_lista_vuelos.php'


?>
<title>Lista de reservas</title>

<script src="../Recursos/jquery/jquery-3.5.0.min.js"></script>
<script src="../Recursos/js/gestionHistorialReserva.js" type="text/javascript"></script>




<?php
session_start();
include_once 'layouts/nav_historial_reserva.php';

if (isset($_SESSION["pasajero"])) {
    $correoUsuarioIdentificado=$_SESSION["pasajero"];
    //printf("<script type='text/javascript'>alert(' $correo'); </script>");
}else{
    $mensaje = "Solo puede ingresar un pasajero en la vista de historial reserva";
    header('location:../index.php?msjlogIn=' . $mensaje);
}

?>

<script type="text/javascript">
    datosRequeridos(correoUsuarioIdentificado='<?php echo $correoUsuarioIdentificado ?>');
</script>


<script type="text/javascript">
 //   listarTabla(datos='<?php echo $lista ?>');
</script>
<!--
<input type="text" id="txtDatos" value='<?php echo $lista ?>' class="form-control">
-->
<section class="ContenedorFormularioReserva">
    <div class="panel panel-primary">

        <div class="panel-heading">
            <h4 class=" estiloTextReserva">Lista de reservas</h4>
        </div>
        <div class="panel-body">
            <form action="" class="form-horizontal">

                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mis reservas</h3>
                    </div>
                    <div class="panel-body">
                        <section>
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card-success">
                                                <div class="card-body p-0">
                                                    <table class="table table-over text-nowrap">
                                                        <thead class="table-success">
                                                            <tr>
                                                                <th>c??digo reserva</th>
                                                                <th>Vuelo</th>
                                                                <th>Ubicaci??n Salida</th>
                                                                <th>fecha Salida</th>
                                                                <th>Ubicaci??n llegada</th>
                                                                <th>fecha llegada</th>
                                                                <th>Precio vuelo</th>
                                                                <th>N??mero silla</th>
                                                                <th>Precio silla</th>
                                                                <th>Tipo silla</th>
                                                                <th>Estado reserva</th>



                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-active" id="tablaHistorialReserva">

                                                        </tbody>
                                                    </table>
                                                    <div class="offset-sm-2 col-sm-12 float-right">



                                                <div class="card-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>



                <b class="ColorTextoModalIniciarSesion estiloTextReserva">Declaro que he le??do y acepto las pol??ticas de cambios, t??rminos y condiciones de reembolsos, desistimiento (devoluci??n de tasas) 
                y de retracto de la aerol??nea. Acepto que la tarifa que he seleccionado es promocional y por lo tanto no es reembolsable a menos que 
                aplique algunas de las pol??ticas anteriormente mencionadas. Declaro que acepto las condiciones de esta compra y autorizo recibir informaci??n 
                adicional asociada a esta transacci??n a mi correo electr??nico.</b>


            </form>
        </div>
    </div>
</section>

<?php
include_once 'layouts/footer_Pagina_Inicio.php';
?>