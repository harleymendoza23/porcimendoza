<?php
require_once '../head.php'; ?>
<!DOCTYPE html>
<html lang="es">
<body style="background:#BDC3C7 fixed no-repeat 0 0 ;">
    <?php
    require_once '../conexiones/conexion.php';
    $oconexion = new conectar();
    $oconexion = $oconexion->conexion();
    require_once '../conexiones/producto.php';
    $oproducto = new producto();
    $oproducto->id = $_GET['id'];
    $consulta = $oproducto->consultarproducto();
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
        <div class="col-12 col-sm-6" style="background-color: #FAE5D3; height: auto; width: 1000px;;  margin: 0 auto;">
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
                            <!-- este es el corrusel donde se guardan las imagenes para mostrarle al usuario -->
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
                        <br>
                        <h4>PESO DEL PRODUCTO</h4>
                        <div>
                            <label>

                                <h5> <?php echo $oproducto->tipopeso; ?></h5>

                                <h4> <?php echo $oproducto->peso; ?></h4>
                            </label>
                        </div>
                        <div class="bg-gray py-2 px-3 mt-4" style="width: 300px; height: 60px;">
                            <h2 class="mb-0">
                                $<?php echo $oproducto->precio; ?>
                            </h2>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="/PORCIMENDOZA/controller/controllerproducto.php?funcion=añadirAlCarrito&id=<?php echo $oproducto = $_GET['id']; ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Añadir al carrito</a>
                    </div>
                    <?php
                    require_once '../conexiones/producto.php';
                    $oproducto = new producto();
                    $oproducto->id = $_GET['id'];
                    $consulta = $oproducto->consultarproducto();
                    ?>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <h3 class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Características principales</h3>
                            </div>
                        </nav>
                        <div class="row">
                            <div class="col-12 col-sm-1">
                                <div class="color-palette-set">
                                    <div style="width: 100px; height: 40px;" class="bg-gray  disabled color-palette">
                                        <center>
                                            <p>RAZA:
                                            </p>
                                            <p><?php echo $oproducto->descripcion; ?>
                                            </p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <h3 class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripción</h3>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <p><?php echo $oproducto->detalleproducto; ?></p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </div>
    <?php
    require_once '../footer.php';
    ?>
</body>
</html>