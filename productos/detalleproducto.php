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

    <section class="content" style="background-color: #CACFD2;">
        <?php
        require_once '../conexiones/producto.php';
        $oproducto = new producto();
        $oproducto->id = $_GET['id'];
        $consulta = $oproducto->consultarproducto();

        $publicidad = new producto();
        $publicidad->id <> $_GET['id'];
        $consulta01 = $publicidad->consultar_para_detalle();

        $publicidadimg = new producto();
        if (isset($_GET['page'])) $pagina = $_GET['page'];
        else $pagina = 1;
        $consulta02 = $oproducto->listadetalle($pagina);
        $numeroregistro = $oproducto->numeroregistro;
        $numpagina = intval($numeroregistro / 2);
        if (fmod($numeroregistro, 2) > 0) $numpagina++;
        ?>
        <br>
        <div class="container-fluid">

            <div class="row">
                <div class="col col-xl-3 col-md-6 col-12 container-fluid" style="background-color: gainsboro; border-style: ridge;">
                    <section class="content-header">

                        <div class="row mb-2">
                            <div class="col-sm-12" style="border-style: inset;">
                                <label>Productos que tambien le pueden interesar</label>
                            </div>
                        </div>

                    </section>
                    <br>

                    <?php
                    foreach ($consulta02 as $registro) {
                    ?>
                        <div class="col-md-12 ">

                            <?php
                            require_once '../conexiones/imagenes.php';
                            $oimagen = new imagenes();
                            $oimagen->idproducto = $registro['id'];
                            $vistaimagen = $oimagen->consultarimagen_publicidad();
                            ?>
                            <div class="card mb-100 shadow-sm" >
                                <div class="card-header">
                                    <h4 class="my-0 font-weight-bold"><?php echo $registro['nombreProducto']; ?></h4>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
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
                                                    <img style=" height: 180px;  width: 170px;" src="<?php echo $registroimg['archivos']; ?>" data-bs-interval="100" class="d-block w-100" style="max-width:100%;  width:auto;height:auto;" alt="...">
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </div>
                                    <ul class="list-unstyled mt-1 mb-4">
                                        <h1 style="text-align:center;" class="card-title pricing-card-title precio">$ <span class="">
                                                <?php echo $registro['precio']; ?>
                                            </span></h1>
                                    </ul>
                                    <ul class="list-unstyled mt-4 mb-2">

                                        <li><?php echo $registro['peso'] . "" . $registro['tipopeso']; ?></li>

                                    </ul>
                                </div>
                                <a href="/PORCIMENDOZA/productos/detalleproducto.php?id=<?php echo $registro['id']; ?>" class="btn bg-info" style="width:auto; height: 40px;"> detalle del producto</a>
                                <a href="/PORCIMENDOZA/controller/controllerproducto.php?funcion=añadirAlCarrito&id=<?php echo $registro['id']; ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i>Añadir al carrito</a>

                            </div>

                        </div>


                    <?php
                    }
                    ?>
                </div>







                <div class="col col-xl-6 col-md-6 col-12 container">
                    <div class="container-fluid" >
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
                                        <div class="card-body" style="border-style: ridge;">
                                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
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
                                                            <img style=" height: 300px;  width: 200px;" src="<?php echo $registroimg['archivos']; ?>" data-bs-interval="10000" class="d-block w-100" alt="...">
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
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h3 class="my-3" style="border-style: inset;"><?php echo $oproducto->nombreProducto; ?></h3>
                                    <br>
                                    <h4 style="border-style: inset;">PESO DEL PRODUCTO</h4>
                                    <div class="bg-gray py-2 px-3 mt-4" style="border: solid; width: 150px; height: 80px;">
                                        <label>

                                            <h5> <?php echo $oproducto->tipopeso; ?></h5>

                                            <h4> <?php echo $oproducto->peso; ?></h4>
                                        </label>
                                    </div>
                                    <div class="bg-gray py-2 px-3 mt-4" style="width: 150px; height: 60px; border: solid;">
                                        <h2 class="mb-0">
                                            $<?php echo $oproducto->precio; ?>
                                        </h2>
                                    </div>
                                    <div class="bg-gray py-2 px-3 mt-4" style="border-style: dashed;">
                                        <p>El domicilio es totalmente gratis, desde el momento que realice la compra nuestro personal se comunicara con el usuario para cordinar la entrega del producto.</p>
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
                                        <div>
                                            <h3 class="nav-item nav-link active" style="border-style: inset;" aria-selected="true">Características principales</h3>
                                        </div>
                                    </nav>
                                    <div class="row">
                                        <div class="col-12 col-sm-5">
                                            <div>
                                                <div class="bg-gray  ">
                                                    <p style="border-style: dashed;">RAZA: <?php echo $oproducto->descripcion; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <nav class="w-100">
                                        <div>
                                            <h3 style="border-style: inset;" aria-selected="true">Descripción</h3>
                                        </div>
                                    </nav>
                                    <div class="tab-content p-3" id="nav-tabContent">
                                        <p><?php echo $oproducto->detalleproducto; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-2 container-fluid" style="background-color: gainsboro;border-style: ridge;">
                    <br>
                    <a href="../index.php" class="btn btn-dark"><i class="fas fa-arrow-circle-left"></i> Pagina principal</a>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once '../footer.php';
    ?>
</body>

</html>