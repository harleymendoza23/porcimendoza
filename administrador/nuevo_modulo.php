<?php
require '../head.php';
?>
<html>
<body  style="background-color:lemonchiffon;">
    <div class="container">
        <center>
            <form action="../crear/crear_modulo.php" method="GET" id="color">
                <div class="col-sm-3">
                    <h4>nombre modulo</h4>
                    <input type="text" name="nombre_modulo">
                </div>
                <div class="col-sm-3"><br>
                  <input type="submit" class="btn btn-info" value="guardar" onclick="datos()">
                </div><br>
    </div>
    </center>
    </form>
</body>

</html>