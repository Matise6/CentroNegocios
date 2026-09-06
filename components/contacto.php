<section id="contacto" class="py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Contáctanos</h2>

            <p class="text-muted">
                Completa el formulario y selecciona el servicio en el que necesitas apoyo.
            </p>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <form
                    id="formContacto"
                    action="api/contacto.php"
                    method="POST"
                    class="p-4 border rounded shadow-sm">

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="nombre" class="form-label">
                                Nombre
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="nombre"
                                name="nombre"
                                required
                                maxlength="100">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="correo" class="form-label">
                                Correo electrónico
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                id="correo"
                                name="correo"
                                required
                                maxlength="150">

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label for="telefono" class="form-label">
                                Teléfono
                            </label>

                            <input
                                type="tel"
                                class="form-control"
                                id="telefono"
                                name="telefono"
                                maxlength="20">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label for="servicio" class="form-label">
                                Servicio
                            </label>

                            <select
                                class="form-select"
                                id="servicio"
                                name="servicio"
                                required>

                                <option value="">
                                    Selecciona un servicio
                                </option>

                                <option value="Administración">
                                    Administración
                                </option>

                                <option value="Finanzas">
                                    Finanzas
                                </option>

                                <option value="Marketing Digital">
                                    Marketing Digital
                                </option>

                                <option value="Innovación">
                                    Innovación
                                </option>

                                <option value="Digitalización">
                                    Digitalización
                                </option>

                                <option value="Vinculación Empresarial">
                                    Vinculación Empresarial
                                </option>

                            </select>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label for="mensaje" class="form-label">
                            Mensaje
                        </label>

                        <textarea
                            class="form-control"
                            id="mensaje"
                            name="mensaje"
                            rows="5"
                            maxlength="1000"
                            required></textarea>

                    </div>

                    <div class="mb-3">

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="acepta"
                                required>

                            <label
                                class="form-check-label"
                                for="acepta">

                                Confirmo que los datos ingresados son correctos.

                            </label>

                        </div>

                    </div>

    
                    <div class="d-none">

                        <label for="website">
                            No completar este campo
                        </label>

                        <input
                            type="text"
                            id="website"
                            name="website"
                            autocomplete="off">

                    </div>
                        <input
                             type="hidden"
                            name="form_inicio"
                            value="<?php echo time(); ?>">
                    <button
                        type="submit"
                        class="btn btn-primary">
                        Enviar consulta
                    </button>

                </form>

                <div
                    id="mensajeFormulario"
                    class="mt-3"
                    aria-live="polite">
                </div>

            </div>

        </div>

    </div>

</section>