<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/PORCIMENDOZA/css/bootstrap.min.css" rel="stylesheet">
  <link href="/PORCIMENDOZA/css/all.min.css" rel="stylesheet">
  <link href="/PORCIMENDOZA/css/porcimendoza.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <script src="/PORCIMENDOZA/js/popper.min.js"></script>
  <script src="/PORCIMENDOZA/js/jquery-3.6.0.min.js"></script>
  <script src="/PORCIMENDOZA/js/bootstrap.min.js"></script>



  <title>porcimendoza</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">

    <div class="container-fluid">
      <div class="row g-3">
        <div class="col-md-12">
          <li style="list-style: none;" role="presentation"><a href="http://localhost/PORCIMENDOZA/index.php" class="navbar-brand">
              <h4 class="card-title"><img class="imagen" width="80" heigth="70" src="https://images.vexels.com/media/users/3/242851/isolated/preview/96a5d53e7c121ea684c79a71ff25d93b-animales-urbangrunge-cr-4-1.png">PORCIMENDOZA</h4>
            </a></li>
        </div>
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <nav>
          <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link active dropdown-toggle" href="http://localhost/PORCIMENDOZA/productos/productos.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong><i class="fas fa-users-cog"></i> Administrador</strong></a>
                  <ul class="dropdown-menu dropdown-menu-ligth" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a id="administrador" class="nav-link active" aria-current="page" href="http://localhost/PORCIMENDOZA/productos/productos.php"><i class="material-icons">more</i>nuevo producto</a></strong></li>
                    <li><a href="http://localhost/PORCIMENDOZA/productos/productoslista.php" class="nav-link active" aria-current="page"><i class="fas fa-user-tag"></i> lista de productos</a></li>
                    <li><a href="http://localhost/NOTASESTUDIANTE/listarmodulo.php" class="nav-link active" aria-current="page"><i class="fas fa-layer-group"></i> Modulos</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item"><strong><a class="nav-link active" aria-current="page" href="http://localhost/PORCIMENDOZA/index.php"><i class="material-icons">to list</i> PRODUCTOS</a></strong></li>


        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="buscar" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">buscar</button>
        </form>


        <form class="d-flex">
          <a href="controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active">inicio de sesion</a>
          <a href="controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active">registrarse</a>
          <a href="controller/usuarioController.php?funcion=cerrarSesion" class="nav-link active"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
        </form>

      </div>
    </div>
  </nav>
  <br>


</body>

</html>