# Guía de Buenas Prácticas

## 1. Organización del proyecto

El proyecto debe mantener una estructura clara y separada por responsabilidades.

Ejemplo:

```text
CentroNegocios/
│
├── api/
├── assets/
│   ├── css/
│   ├── img/
│   └── js/
├── components/
├── config/
├── index.php
└── README.md
Esta organización permite identificar rápidamente la función de cada archivo y facilita el mantenimiento del proyecto.

2. Convenciones de nomenclatura

Se recomienda utilizar nombres claros y descriptivos.

Ejemplos de archivos:

servicios.php
contacto.php
navbar.php
app.js
style.css

Para variables en PHP y JavaScript se recomienda utilizar camelCase.

Ejemplo:

$servicioSeleccionado = "Marketing Digital";
const contenedorServicios = document.getElementById("contenedorServicios");

Los nombres deben indicar claramente qué información almacenan.

3. Componentes reutilizables

Las partes repetitivas de la interfaz deben separarse en componentes.

En este proyecto se utilizaron componentes como:

navbar.php
hero.php
servicios.php
testimonios.php
faq.php
contacto.php
footer.php

Esto evita repetir código y facilita futuras modificaciones.

4. Separación de responsabilidades

La interfaz, la lógica y el acceso a datos deben mantenerse separados.

Ejemplo:

components/ → interfaz
assets/js/ → interactividad
api/ → endpoints
config/ → conexión a base de datos

Esto mejora la comprensión y mantenimiento del código.

5. Uso de variables

Se recomienda:

Evitar nombres como $x, $dato1 o $temp.
Utilizar nombres descriptivos.
Declarar las variables lo más cerca posible de donde serán utilizadas.
Evitar repetir información innecesariamente.

Ejemplo:

$correo = trim($_POST["correo"] ?? "");
6. Consultas a base de datos

Las operaciones que utilicen datos ingresados por usuarios deben utilizar consultas preparadas.

Ejemplo:

$stmt = $conexion->prepare(
    "INSERT INTO contactos
    (nombre, correo, telefono, servicio, mensaje)
    VALUES (?, ?, ?, ?, ?)"
);

Esto reduce el riesgo de ataques de inyección SQL.

7. Validación de datos

Los formularios deben validarse tanto en el cliente como en el servidor.

Validación del cliente:

<input
    type="email"
    name="correo"
    required>

Validación del servidor:

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    exit;
}

No se debe confiar solamente en las validaciones HTML o JavaScript.

8. Accesibilidad

Se recomienda aplicar las siguientes prácticas:

Utilizar etiquetas HTML semánticas.
Asociar cada campo del formulario con un label.
Agregar texto alternativo a las imágenes.
Permitir navegación mediante teclado.
Mantener buen contraste entre texto y fondo.
Utilizar atributos ARIA cuando sean necesarios.
Evitar utilizar solamente colores para comunicar información.

Ejemplo:

<label for="correo">
    Correo electrónico
</label>

<input
    type="email"
    id="correo"
    name="correo">
9. Usabilidad

La interfaz debe ser comprensible e intuitiva.

Se recomienda:

Mantener una navegación simple.
Utilizar botones con nombres claros.
Mostrar mensajes de error comprensibles.
Mantener consistencia visual.
Evitar formularios innecesariamente extensos.
Adaptar la interfaz a dispositivos móviles.
10. Diseño responsive

Se recomienda utilizar el sistema de grillas de Bootstrap.

Ejemplo:

<div class="col-md-6 col-lg-4">

Esto permite adaptar los componentes a distintos tamaños de pantalla.

También se recomienda utilizar:

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">
11. Optimización de imágenes

Las imágenes deben:

estar comprimidas;
utilizar dimensiones adecuadas;
utilizar formatos modernos como WebP;
aplicar carga diferida cuando corresponda.

Ejemplo:

<img
    src="imagen.webp"
    alt="Descripción de la imagen"
    loading="lazy"
    width="600"
    height="400">
12. Consumo de APIs

Las solicitudes a APIs deben controlar posibles errores.

Ejemplo:

fetch("api/servicios.php")
    .then(function(respuesta) {

        if (!respuesta.ok) {
            throw new Error("Error al cargar los servicios");
        }

        return respuesta.json();
    })
    .catch(function(error) {
        console.error(error);
    });

Esto permite que la aplicación responda correctamente ante fallas del servidor.

13. Seguridad

El proyecto debe considerar:

consultas preparadas;
validación en cliente;
validación en servidor;
control de datos obligatorios;
listas de valores permitidos;
escape de salida;
protección contra bots;
límites de caracteres;
control del método HTTP.

Ejemplo:

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit;
}
14. Git y GitHub

Se recomienda utilizar ramas independientes para cada funcionalidad.

Ejemplos:

feature-servicios
feature-contacto
feature-api
feature-seguridad

Los commits deben explicar claramente el cambio realizado.

Ejemplos:

feat: agregar carrusel de testimonios
fix: corregir validacion de formulario
docs: actualizar README
perf: optimizar carga de imagenes

Antes de fusionar una rama se recomienda realizar una revisión mediante Pull Request.

15. Comentarios en el código

Los comentarios deben utilizarse para explicar partes importantes del código.

Ejemplo:

// Consumo de API de servicios

No es necesario comentar cada línea si el código ya es suficientemente claro.

16. Manejo de errores

Los mensajes de error no deben mostrar información sensible sobre el servidor o la base de datos al usuario final.

En su lugar, se recomienda utilizar mensajes simples como:

No fue posible procesar la solicitud.

Los errores técnicos pueden registrarse durante el desarrollo.

17. Mantenimiento

Cada nueva funcionalidad debe considerar:

creación de una rama;
implementación;
pruebas;
revisión;
documentación;
Pull Request;
integración.

De esta forma se reduce la posibilidad de incorporar errores a la versión principal.