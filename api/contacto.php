<?php

require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo "Método no permitido";
    exit;
}

$nombre = trim($_POST["nombre"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$servicio = trim($_POST["servicio"] ?? "");
$mensaje = trim($_POST["mensaje"] ?? "");
$website = trim($_POST["website"] ?? "");
$formInicio = intval($_POST["form_inicio"] ?? 0);

if (!empty($website)) {
    http_response_code(400);
    echo "Solicitud inválida";
    exit;
}

$tiempoActual = time();

if ($formInicio <= 0 || ($tiempoActual - $formInicio) < 3) {
    http_response_code(400);
    echo "Formulario enviado demasiado rápido.";
    exit;
}


if (
    empty($nombre) ||
    empty($correo) ||
    empty($servicio) ||
    empty($mensaje)
) {
    http_response_code(400);
    echo "Todos los campos obligatorios deben ser completados.";
    exit;
}

if (strlen($nombre) < 3 || strlen($nombre) > 100) {
    http_response_code(400);
    echo "Nombre inválido.";
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo "Correo electrónico inválido.";
    exit;
}

if (strlen($telefono) > 20) {
    http_response_code(400);
    echo "Teléfono inválido.";
    exit;
}

if (strlen($mensaje) < 10 || strlen($mensaje) > 1000) {
    http_response_code(400);
    echo "El mensaje debe contener entre 10 y 1000 caracteres.";
    exit;
}

$serviciosPermitidos = [
    "Administración",
    "Finanzas",
    "Marketing Digital",
    "Innovación",
    "Digitalización",
    "Vinculación Empresarial"
];

if (!in_array($servicio, $serviciosPermitidos, true)) {
    http_response_code(400);
    echo "Servicio inválido.";
    exit;
}


$sql = "
    INSERT INTO contactos
    (nombre, correo, telefono, servicio, mensaje)
    VALUES (?, ?, ?, ?, ?)
";

$stmt = $conexion->prepare($sql);

if (!$stmt) {
    http_response_code(500);
    echo "Error al preparar la consulta.";
    exit;
}

$stmt->bind_param(
    "sssss",
    $nombre,
    $correo,
    $telefono,
    $servicio,
    $mensaje
);

if ($stmt->execute()) {

    $nombreSeguro = htmlspecialchars(
        $nombre,
        ENT_QUOTES,
        "UTF-8"
    );

    echo "
    <!DOCTYPE html>
    <html lang='es'>

    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>

        <title>Consulta enviada</title>

        <link
            href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
            rel='stylesheet'>
    </head>

    <body class='bg-light'>

        <main class='container py-5'>

            <div class='card shadow-sm p-5 text-center'>

                <h1 class='h3 mb-3'>
                    Consulta enviada correctamente
                </h1>

                <p>
                    Gracias por contactarnos,
                    {$nombreSeguro}.
                </p>

                <a
                    href='../index.php'
                    class='btn btn-primary'>
                    Volver al sitio
                </a>

            </div>

        </main>

    </body>

    </html>
    ";

} else {

    http_response_code(500);
    echo "No fue posible guardar la consulta.";
}

$stmt->close();
$conexion->close();

?>