<?php
include_once 'layouts/header_lista_vuelos.php'


?>
<title>Lista de Vuelos</title>
<script src="../Recursos/js/listarVuelos.js" type="text/javascript"></script>
<?php
include_once 'layouts/nav_Pagina_Inicio.php';
?>

<?php

if(isset($_GET['res'])){
    $lista=$_GET['res'];
    //echo($lista);
    //print_r($lista);


}




?>

<script type="text/javascript">
    listarTabla(datos='<?php echo $lista ?>');
</script>
<!--
<input type="text" id="txtDatos" value='<?php echo $lista ?>' class="form-control">
-->
<section class="ContenedorFormularioReserva">
    <div class="panel panel-primary">

        <div class="panel-heading">
            <h4 class=" estiloTextReserva">Lista de Vuelos</h4>
        </div>
        <div class="panel-body">
            <form action="" class="form-horizontal">

                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vuelos</h3>
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
                                                                <th>Vuelo</th>
                                                                <th>Ubicación Salida</th>
                                                                <th>fecha Salida</th>
                                                                <th>Ubicación llegada</th>
                                                                <th>fecha llegada</th>
                                                                <th>Precio</th>
                                                                <th>Descripción</th>
                                                                <th>Estado</th>
                                                                <th>Seleccionar</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-active" id="tablaVuelos">

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


                <div class="panel  panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Vuelo internacional</h3>
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
                                                                <th>Vuelo</th>
                                                                <th>Ubicación Salida</th>
                                                                <th>fecha Salida</th>
                                                                <th>Ubicación llegada</th>
                                                                <th>fecha llegada</th>
                                                                <th>Precio</th>
                                                                <th>Descripción</th>
                                                                <th>Estado</th>
                                                                <th>Seleccionar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="table-active" id="ListaVueloRegreso">

                                                        </tbody>
                                                    </table>
                                                </div>

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
                <br>
                 <b class="ColorTextoModalIniciarSesion estiloTextReserva">Declaro que he leído y acepto las políticas de cambios, términos y condiciones de reembolsos, desistimiento (devolución de tasas) 
                 y de retracto de la aerolínea. Acepto que la tarifa que he seleccionado es promocional y por lo tanto no es reembolsable a menos que 
                 aplique algunas de las políticas anteriormente mencionadas. Declaro que acepto las condiciones de esta compra y autorizo recibir información 
                 adicional asociada a esta transacción a mi correo electrónico.</b>

                <div class="modal-footer row">
                    <p class="ColorTextoModalIniciarSesion estiloTextReserva">Al dar click en continuar acepta las políticas
                    y condiciones de la Aerolínea</p>
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