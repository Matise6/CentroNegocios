# Retrospectiva del proyecto

## Objetivo de la sesión

Analizar el proceso de desarrollo de la landing page del Centro de Negocios Santiago, identificando aspectos positivos, dificultades y oportunidades de mejora para futuras iteraciones.

## ¿Qué salió bien?

- La división del proyecto en componentes facilitó la organización del código.
- El uso de Bootstrap permitió crear una interfaz responsive de forma rápida.
- La creación de APIs internas permitió separar los datos de la interfaz.
- Postman facilitó las pruebas de los endpoints.
- Git y GitHub ayudaron a mantener un historial ordenado de cambios.
- Las validaciones en cliente y servidor mejoraron la seguridad del formulario.
- El consumo de la API externa permitió incorporar información dinámica.

## ¿Qué dificultades se presentaron?

- Se presentaron conflictos con los puertos de Apache y MySQL.
- Fue necesario configurar correctamente los servicios de XAMPP.
- La integración entre JavaScript, PHP y MySQL requirió varias pruebas.
- Al principio algunos contenidos estaban escritos directamente en los componentes y luego fue necesario migrarlos a APIs.
- La organización de ramas y Pull Requests requirió coordinación.

## ¿Qué podemos mejorar?

- Definir la estructura de la base de datos antes de comenzar el desarrollo.
- Crear los endpoints antes de diseñar las secciones que consumen los datos.
- Realizar pruebas de accesibilidad durante el desarrollo y no solamente al final.
- Crear ramas desde el inicio para cada funcionalidad.
- Mantener commits más pequeños y descriptivos.
- Optimizar las imágenes antes de incorporarlas al proyecto.

## Plan de acción para la próxima iteración

1. Definir previamente la estructura del proyecto.
2. Crear un documento con los endpoints y los datos que utilizará cada componente.
3. Crear una rama para cada funcionalidad antes de iniciar su desarrollo.
4. Realizar pruebas de accesibilidad y responsive después de implementar cada sección.
5. Revisar el rendimiento de las imágenes antes de subirlas al repositorio.
6. Realizar revisiones de código mediante Pull Requests antes de integrar cambios a la rama principal.
7. Mantener actualizado el README con cada nueva funcionalidad.

## Conclusión

La retrospectiva permitió identificar que la organización por componentes, el uso de APIs y el control de versiones facilitaron el desarrollo del proyecto. Para futuras iteraciones se propone mejorar principalmente la planificación inicial, las pruebas de accesibilidad y la organización del trabajo mediante ramas y revisiones de código.