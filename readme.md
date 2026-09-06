# Centro de Negocios Santiago

Proyecto académico desarrollado como simulación de una actualización de la landing page del Centro de Negocios Santiago.

El objetivo del proyecto es aplicar componentes reutilizables, consumo de APIs, buenas prácticas de desarrollo frontend, seguridad, accesibilidad, optimización y control de versiones.

## Tecnologías utilizadas

- PHP
- HTML5
- CSS3
- JavaScript
- Bootstrap 5
- MySQL
- XAMPP
- Postman
- Git
- GitHub

## Estructura del proyecto

```text
CentroNegocios/
│
├── index.php
│
├── api/
│   ├── contacto.php
│   ├── faq.php
│   ├── nosotros.php
│   └── servicios.php
│
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── img/
│   └── js/
│       └── app.js
│
├── components/
│   ├── navbar.php
│   ├── hero.php
│   ├── nosotros.php
│   ├── servicios.php
│   ├── service-card.php
│   ├── testimonios.php
│   ├── faq.php
│   ├── clima.php
│   ├── contacto.php
│   └── footer.php
│
├── config/
│   └── database.php
│
└── README.md
Instalación
Instalar XAMPP.
Copiar la carpeta CentroNegocios dentro de:
C:\xampp\htdocs\
Iniciar Apache y MySQL desde XAMPP.
Crear una base de datos llamada:
centro_negocios
Crear las tablas necesarias para:
contactos
servicios
preguntas_frecuentes
nosotros
Abrir el proyecto desde:
http://localhost/CentroNegocios/
Componentes desarrollados
Barra de navegación

Permite acceder de manera rápida a las distintas secciones de la landing page.

Tarjetas de servicios

Las tarjetas contienen:

imagen
título
descripción
botón Contáctanos

El botón selecciona automáticamente el servicio correspondiente en el formulario de contacto.

Carrusel de testimonios

Componente responsive implementado con Bootstrap.

Incluye controles de navegación y atributos de accesibilidad.

Preguntas frecuentes

Se implementa mediante un acordeón Bootstrap y su contenido se obtiene dinámicamente desde una API interna.

Formulario de contacto

Incluye:

nombre
correo electrónico
teléfono
servicio
mensaje

Además, implementa validaciones del lado del cliente y del servidor.

APIs internas
Servicios
GET /api/servicios.php
POST /api/servicios.php
PUT /api/servicios.php?id=1
DELETE /api/servicios.php?id=1
Preguntas frecuentes
GET /api/faq.php
POST /api/faq.php
PUT /api/faq.php?id=1
DELETE /api/faq.php?id=1
Nosotros
GET /api/nosotros.php
PUT /api/nosotros.php?id=1
Contacto
POST /api/contacto.php
Ejemplo de consumo de API
fetch("api/servicios.php")
    .then(function(respuesta) {
        return respuesta.json();
    })
    .then(function(servicios) {
        console.log(servicios);
    });
API externa

Se utiliza Gael Cloud para obtener información climática de Santiago.

La información se muestra dinámicamente dentro de la landing page.

Seguridad

El proyecto incorpora:

validaciones HTML
validaciones JavaScript
validaciones PHP
consultas preparadas
validación de correo electrónico
lista blanca de servicios
límite de caracteres
escape de salida
honeypot anti-bot
control de tiempo de envío
Accesibilidad y usabilidad

Se aplicaron:

etiquetas semánticas
atributos ARIA
textos alternativos en imágenes
navegación responsive
botones descriptivos
formularios con label
diseño adaptable a dispositivos móviles
navegación intuitiva
Optimización

Se implementaron:

imágenes optimizadas
formato WebP
lazy loading
sessionStorage
dimensiones definidas de imágenes
diseño responsive
reducción de llamadas innecesarias a APIs
Control de versiones

El proyecto utiliza Git y GitHub.

Se trabajó con ramas para organizar las distintas funcionalidades.

Ejemplos:

main
develop
feature-servicios
feature-faq
feature-contacto
feature-api

También se utilizaron commits descriptivos y Pull Requests para integrar cambios.

Buenas prácticas

Se aplicaron las siguientes convenciones:

nombres de archivos descriptivos
separación entre componentes
organización por carpetas
uso de consultas preparadas
reutilización de componentes
comentarios en bloques importantes
validación de datos
código organizado y legible
Autor

Proyecto académico desarrollado para fines educativos.

Este sitio corresponde a una simulación y no representa una modificación oficial del sitio web de SERCOTEC.
