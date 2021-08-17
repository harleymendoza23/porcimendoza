<?php
require_once '../head.php'; ?>



<!DOCTYPE html>
<html lang="en">

<body style="background:#BDC3C7 fixed no-repeat 0 0 ;">
    <?php
    require_once '../conexiones/producto.php';
    require_once '../conexiones/conexion.php';
    $oconexion = new conectar();
    $oconexion = $oconexion->conexion();
    $oproducto = new producto();
    $oproducto->id = $_GET['id'];
    $listarproducto = $oproducto->consultarproducto();
    ?>



    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $oproducto->nombreProducto; ?></h1>
                </div>

            </div>
        </div>
    </section>


    <section class="content" style="background-color: #CACFD2;">
        <?php

        require_once '../conexiones/producto.php';
        $oproducto = new producto();
        $oproducto->id = $_GET['id'];
        $consulta = $oproducto->consultarproducto();



        ?>

        <div class="card card-solid" style="background-color: #E5E7E9;">
            <div class="card-body">
                <div class="row">


                    <div class="col-12 col-sm-6">




                        <?php
                        require_once '../conexiones/imagenes.php';
                        $oimagenes = new imagenes();
                        $oimagenes->idproducto = $_GET['id'];
                        $vistaimagen = $oimagenes->consultarimagen();
                        ?>
                        <div class="card-group mt-12">

                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <?php
                                    $bandera = true;
                                    foreach ($vistaimagen as $registroimg) {
                                    ?>
                                        <div class="carousel-item <?php if ($bandera) {
                                                                        $bandera = false;
                                                                        echo "active";
                                                                    } ?>">
                                            <img src="<?php echo $registroimg['archivos']; ?>" data-bs-interval="10000" class="d-block w-100" alt="...">
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                        </div>


                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?php echo $oproducto->nombreProducto; ?></h3>

                        <hr>
                        <h4>PESO DEL PRODUCTO</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center active">
                                <input type="radio" autocomplete="off" checked>
                                <h5> <?php echo $oproducto->tipopeso; ?></h5>

                                <h4> <?php echo $oproducto->peso; ?></h4>
                            </label>


                        </div>


                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                               $/ <?php echo $oproducto->precio; ?>
                            </h2>

                        </div>

                        <div class="mt-4">
                           <a href="carrocompras.php" class="btn btn-primary btn-lg btn-flat"><i class="fas fa-cart-plus fa-lg mr-2"></i>
                        carro de compras</a>
                            <!-- <div class="btn btn-primary btn-lg btn-flat" href="carrocompras.php">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                carro de compras
                            </div> -->
                        </div>



                    </div>

                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripción del producto</a>

                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <p><?php echo $oproducto->detalleproducto; ?></p>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </section>

    </div>
    <?php
    require_once '../footer.php';
    ?>

</body>

</html>