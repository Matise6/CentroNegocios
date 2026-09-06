<?php

function mostrarTarjetaServicio($titulo, $descripcion, $imagen, $servicio)
{
    ?>
    
    <div class="col-md-6 col-lg-4 mb-4">
        <div class="card h-100 shadow-sm">

            <img
                src="<?php echo $imagen; ?>"
                class="card-img-top"
                alt="<?php echo $titulo; ?>">

            <div class="card-body d-flex flex-column">

                <h3 class="card-title h5 fw-bold">
                    <?php echo $titulo; ?>
                </h3>

                <p class="card-text">
                    <?php echo $descripcion; ?>
                </p>

                <a
                    href="#contacto"
                    class="btn btn-primary mt-auto btn-contacto-servicio"
                    data-servicio="<?php echo $servicio; ?>">
                    Contáctanos
                </a>

            </div>

        </div>
    </div>

    <?php
}

?>