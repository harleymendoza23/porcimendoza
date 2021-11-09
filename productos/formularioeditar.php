<?php
require_once '../head.php';

require_once '../conexiones/producto.php';
require_once '../conexiones/conexion.php';
//se instancia el objeto producto
$oproducto = new producto();
//se recibe el parametro del enlace
$oproducto->id = $_GET['id'];
$registro = $oproducto->consultarproducto();
?>
<!DOCTYPE html>
<html lang="es">
<body style="background-color: #ffffff;">
    <form action="../controller/usuarioController.php" enctype="multipart/form-data" method="POST">
        <input type="text" name="id" value="<?php echo $_GET['id']; ?>" style="display: none;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-xl-3 col-md-6 col-12">
                    <h5 style="text-align:center">Nombre del producto</h5>
                    <input class="form-control" required minlength="5" maxlength="20" type="text" name="nombreProducto" value="<?php echo $oproducto->nombreProducto; ?>">
                </div>
                <div class="col col-xl-3 col-md-6 col-12">
                    <h5 style="text-align:center">Detalle del producto</h5>
                    <input class="form-control" type="text" name="detalleproducto" value="<?php echo $oproducto->detalleproducto; ?>">
                </div>
                <div class="col-md-6" >
                    <h5 style="text-align:center">Descripción del producto</h5>

                    <input class="form-control" placeholder="por ejemplo:raza doble jamon" required minlength="5" maxlength="25" type="text" name="descripcion" value="<?php echo $oproducto->descripcion; ?>">
                </div>
                

                <div class="col col-xl-3 col-md-6 col-12">
                    <h5  style="text-align:center">Peso del producto</h5>
                    <input class="form-control" type="number" min="1" max="500" name="peso" value="<?php echo $oproducto->peso; ?>">
                </div>
                <div class="col col-xl-3 col-md-6 col-12">
                    <h5 style="text-align:center">Tipo de peso</h5>
                    <!-- <input type="text" name="id" value="<?php echo $oproducto->id; ?>" style="display:none;"> -->
                    <select class="form-select" name="tipopeso" id="">
                        <option value="" disabled selected>tipo peso</option>
                        <option value='libras' <?php if ($oproducto->tipopeso == "libras") echo "selected"; ?>>Libras</option>
                        <option value='kilo' <?php if ($oproducto->tipopeso == "kilo") echo "selected"; ?>>Kilos</option>
                        <option value='arroba' <?php if ($oproducto->tipopeso == "arroba") echo "selected"; ?>>Arrobas</option>
                    </select>
                </div>
                <div class="col col-xl-3 col-md-6 col-12">
                    <h5 style="text-align:center">Precio del producto</h5>
                    <input class="form-control" type="text" minlength="5" maxlength="40" required name="precio" id="separador" value="<?php echo $oproducto->precio; ?>">
                </div>
            </div>
        </div>
        <br>
        <!-- <div class="rowg-3">
            
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Editar imagenes </h3>
                    </div>
                    <div class="card-body">
                        <div id="actions" class="row">
                            <div class="col-lg-6">
                                <div class="btn-group w-100">
                                    <span class="btn btn-success col fileinput-button">
                                        <i class="fas fa-plus"></i>
                                        <span>Agregar imagenes </span>
                                    </span>
                                    
                                    <button type="reset" class="btn btn-warning col cancel">
                                        <i class="fas fa-times-circle"></i>
                                        <span>Vaciar imagenes</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center">
                                <div class="fileupload-process w-100">
                                    <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table table-striped files" id="previews">
                            <div id="template" class="row mt-2">
                                <div class="col-auto">
                                    <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                                </div>
                                <div class="col d-flex align-items-center">
                                    <p class="mb-0">
                                        <span class="lead" data-dz-name></span>
                                        (<span data-dz-size></span>)
                                    </p>
                                    <strong class="error text-danger" data-dz-errormessage></strong>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                                    </div>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <div class="btn-group">
                                        <button class="btn btn-primary start">
                                            <i class="fas fa-upload"></i>
                                            <span>cargar</span>
                                        </button>
                                       
                                        <button data-dz-remove class="btn btn-danger delete">
                                            <i class="fas fa-trash"></i>
                                            <span>Eliminar</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>-->
        </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        </div>
        <br>
        <button type="submit" class="btn btn-success" name="funcion" value="editarproducto">Guardar</button>

        <a href="productoslista.php" class="btn btn-outline-info">volver</a>
        <a href="index.php" class="btn btn-outline-info">pagina principal</a>
    </form> 

    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/select2/js/select2.full.min.js"></script>
    <script src="../assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="../assets/plugins/moment/moment.min.js"></script>
    <script src="../assets/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="../assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <script src="../assets/plugins/dropzone/min/dropzone.min.js"></script>
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <script src="../assets/dist/js/demo.js"></script>
    <script>
        $(function() {
            $('.select2').select2()
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            $('[data-mask]').inputmask()
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
            $('#reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });
            $('#reservation').daterangepicker()
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )
            $('#timepicker').datetimepicker({
                format: 'LT'
            })
            $('.duallistbox').bootstrapDualListbox()
            $('.my-colorpicker1').colorpicker()
            $('.my-colorpicker2').colorpicker()
            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

        })
        // BS-Stepper Init
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })

        // DropzoneJS Demo Code Start
        Dropzone.autoDiscover = false

        // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
        var previewNode = document.querySelector("#template")
        previewNode.id = ""
        var previewTemplate = previewNode.parentNode.innerHTML
        previewNode.parentNode.removeChild(previewNode)

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        })

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file)
            }
        })

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
        })

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
        })

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
        })

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
        }
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
        }
        // DropzoneJS Demo Code End
    </script>




</body>

</html>
<script>
    var separador = document.getElementById('separador');

    separador.addEventListener('keyup', (e) => {
        var entrada = e.target.value.split('.').join('');
        entrada = entrada.split('').reverse();

        var salida = [];
        var aux = '';

        var paginador = Math.ceil(entrada.length / 3);

        for (let i = 0; i < paginador; i++) {
            for (let j = 0; j < 3; j++) {

                if (entrada[j + (i * 3)] != undefined) {
                    aux += entrada[j + (i * 3)];
                }
            }
            salida.push(aux);
            aux = '';

            e.target.value = salida.join('.').split("").reverse().join('');
        }
    }, false);
</script>