document.addEventListener("DOMContentLoaded", function () {

    const botonesServicio =
        document.querySelectorAll(".btn-contacto-servicio");

    const campoServicio =
        document.getElementById("servicio");

    botonesServicio.forEach(function (boton) {

        boton.addEventListener("click", function () {

            const servicioSeleccionado =
                this.dataset.servicio;

            if (campoServicio) {
                campoServicio.value =
                    servicioSeleccionado;
            }

        });

    });

const contenedorNosotros =
    document.getElementById("contenedorNosotros");

if (contenedorNosotros) {

    fetch("api/nosotros.php")

        .then(function (respuesta) {

            if (!respuesta.ok) {
                throw new Error("Error al cargar Nosotros");
            }

            return respuesta.json();

        })

        .then(function (datos) {

            contenedorNosotros.innerHTML = `
                <div class="row align-items-center g-4">

                    <div class="col-lg-6">

                        <h2 class="fw-bold mb-3">
                            ${datos.titulo}
                        </h2>

                        <p>
                            ${datos.descripcion1}
                        </p>

                        <p>
                            ${datos.descripcion2}
                        </p>

                        <p>
                            ${datos.descripcion3}
                        </p>

                    </div>

                    <div class="col-lg-6">

                        <div class="p-4 bg-light rounded shadow-sm">

                            <h3 class="h5 fw-bold">
                                Nuestro propósito
                            </h3>

                            <p>
                                ${datos.proposito}
                            </p>

                            <hr>

                            <h3 class="h5 fw-bold">
                                Atención
                            </h3>

                            <p class="mb-1">
                                ${datos.direccion}
                            </p>

                            <p class="mb-0">
                                ${datos.referencia}
                            </p>

                        </div>

                    </div>

                </div>
            `;

        })

        .catch(function (error) {

            console.error(error);

            contenedorNosotros.innerHTML = `
                <div class="alert alert-danger">
                    No fue posible cargar la información.
                </div>
            `;

        });

}

const accordionFAQ =
    document.getElementById("accordionFAQ");

if (accordionFAQ) {

    fetch("api/faq.php")

        .then(function (respuesta) {

            if (!respuesta.ok) {
                throw new Error("Error al cargar preguntas");
            }

            return respuesta.json();

        })

        .then(function (preguntas) {

            accordionFAQ.innerHTML = "";

            preguntas.forEach(function (item, indice) {

                const abierto =
                    indice === 0 ? "show" : "";

                const botonCollapsed =
                    indice === 0 ? "" : "collapsed";

                const ariaExpanded =
                    indice === 0 ? "true" : "false";

                accordionFAQ.innerHTML += `
                    <div class="accordion-item">

                        <h3 class="accordion-header">

                            <button
                                class="accordion-button ${botonCollapsed}"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#pregunta${item.id}"
                                aria-expanded="${ariaExpanded}"
                                aria-controls="pregunta${item.id}">

                                ${item.pregunta}

                            </button>

                        </h3>

                        <div
                            id="pregunta${item.id}"
                            class="accordion-collapse collapse ${abierto}"
                            data-bs-parent="#accordionFAQ">

                            <div class="accordion-body">
                                ${item.respuesta}
                            </div>

                        </div>

                    </div>
                `;

            });

        })

        .catch(function (error) {

            console.error(error);

            accordionFAQ.innerHTML = `
                <div class="alert alert-danger">
                    No fue posible cargar las preguntas frecuentes.
                </div>
            `;

        });

}
function mostrarClima(clima) {

    const contenedorClima =
        document.getElementById("contenedorClima");

    if (!contenedorClima) {
        return;
    }

    contenedorClima.innerHTML = `

        <h3 class="h5 fw-bold">
            ${clima.Estacion}
        </h3>

        <p class="display-5 fw-bold mb-2">
            ${clima.Temp} °C
        </p>

        <p class="mb-1">
            <strong>Estado:</strong>
            ${clima.Estado}
        </p>

        <p class="mb-1">
            <strong>Humedad:</strong>
            ${clima.Humedad}%
        </p>

        <p class="text-muted mb-0">
            Actualizado:
            ${clima.HoraUpdate}
        </p>

    `;
}
const contenedorClima =
    document.getElementById("contenedorClima");

if (contenedorClima) {

    const climaGuardado =
        sessionStorage.getItem("climaSantiago");

    if (climaGuardado) {

        const clima =
            JSON.parse(climaGuardado);

        mostrarClima(clima);

    } else {

        fetch(
            "https://api.gael.cloud/general/public/clima/SCQN"
        )

            .then(function (respuesta) {

                if (!respuesta.ok) {
                    throw new Error(
                        "No fue posible obtener el clima"
                    );
                }

                return respuesta.json();

            })

            .then(function (clima) {

                sessionStorage.setItem(
                    "climaSantiago",
                    JSON.stringify(clima)
                );

                mostrarClima(clima);

            })

            .catch(function (error) {

                console.error(error);

                contenedorClima.innerHTML = `
                    <div class="alert alert-warning mb-0">
                        No fue posible cargar la información
                        del clima en este momento.
                    </div>
                `;

            });

    }

}
    const formulario =
        document.getElementById("formContacto");

    if (formulario) {

        formulario.addEventListener("submit", function (evento) {

            const nombre =
                document.getElementById("nombre").value.trim();

            const correo =
                document.getElementById("correo").value.trim();

            const mensaje =
                document.getElementById("mensaje").value.trim();

            if (
                nombre.length < 3 ||
                correo.length < 5 ||
                mensaje.length < 10
            ) {

                evento.preventDefault();

                document.getElementById(
                    "mensajeFormulario"
                ).innerHTML =
                    '<div class="alert alert-danger">' +
                    'Revisa los datos ingresados.' +
                    '</div>';

            }

        });

    }

});
document.addEventListener("DOMContentLoaded", function () {

    function activarBotonesServicios() {

        const botonesServicio =
            document.querySelectorAll(".btn-contacto-servicio");

        const campoServicio =
            document.getElementById("servicio");

        botonesServicio.forEach(function (boton) {

            boton.addEventListener("click", function () {

                const servicioSeleccionado =
                    this.dataset.servicio;

                if (campoServicio) {
                    campoServicio.value = servicioSeleccionado;
                }

            });

        });

    }

    const contenedorServicios =
        document.getElementById("contenedorServicios");

    if (contenedorServicios) {

        fetch("api/servicios.php")

            .then(function (respuesta) {

                if (!respuesta.ok) {
                    throw new Error("Error al obtener los servicios");
                }

                return respuesta.json();

            })

            .then(function (servicios) {

                contenedorServicios.innerHTML = "";

                servicios.forEach(function (servicio) {

                    const tarjeta = `
                        <div class="col-md-6 col-lg-4 mb-4">

                            <div class="card h-100 shadow-sm">

                               <img
                                    src="${servicio.imagen}"
                                    class="card-img-top"
                                     alt="${servicio.titulo}"
                                     loading="lazy"
                                    width="600"
                                     height="400">

                                <div class="card-body d-flex flex-column">

                                    <h3 class="card-title h5 fw-bold">
                                        ${servicio.titulo}
                                    </h3>

                                    <p class="card-text">
                                        ${servicio.descripcion}
                                    </p>

                                    <a
                                        href="#contacto"
                                        class="btn btn-primary mt-auto btn-contacto-servicio"
                                        data-servicio="${servicio.titulo}">
                                        Contáctanos
                                    </a>

                                </div>

                            </div>

                        </div>
                    `;

                    contenedorServicios.innerHTML += tarjeta;

                });

                activarBotonesServicios();

            })

            .catch(function (error) {

                console.error(error);

                contenedorServicios.innerHTML = `
                    <div class="alert alert-danger">
                        No fue posible cargar los servicios.
                    </div>
                `;

            });

    }

    const formulario =
        document.getElementById("formContacto");

    if (formulario) {

        formulario.addEventListener("submit", function (evento) {

            const nombre =
                document.getElementById("nombre").value.trim();

            const correo =
                document.getElementById("correo").value.trim();

            const mensaje =
                document.getElementById("mensaje").value.trim();

            if (
                nombre.length < 3 ||
                correo.length < 5 ||
                mensaje.length < 10
            ) {

                evento.preventDefault();

                document.getElementById(
                    "mensajeFormulario"
                ).innerHTML = `
                    <div class="alert alert-danger">
                        Revisa los datos ingresados.
                    </div>
                `;

            }

        });

    }

});