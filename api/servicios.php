<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../config/database.php";

$metodo = $_SERVER["REQUEST_METHOD"];

switch ($metodo) {

    case "GET":

        $sql = "
            SELECT id, titulo, descripcion, imagen
            FROM servicios
            WHERE activo = 1
            ORDER BY id ASC
        ";

        $resultado = $conexion->query($sql);

        $servicios = [];

        while ($fila = $resultado->fetch_assoc()) {
            $servicios[] = $fila;
        }

        echo json_encode(
            $servicios,
            JSON_UNESCAPED_UNICODE
        );

        break;


    case "POST":

        $datos = json_decode(
            file_get_contents("php://input"),
            true
        );

        $titulo = trim($datos["titulo"] ?? "");
        $descripcion = trim($datos["descripcion"] ?? "");
        $imagen = trim($datos["imagen"] ?? "");

        if (
            empty($titulo) ||
            empty($descripcion) ||
            empty($imagen)
        ) {
            http_response_code(400);

            echo json_encode([
                "mensaje" => "Faltan datos obligatorios"
            ]);

            exit;
        }

        $stmt = $conexion->prepare(
            "INSERT INTO servicios
            (titulo, descripcion, imagen)
            VALUES (?, ?, ?)"
        );

        $stmt->bind_param(
            "sss",
            $titulo,
            $descripcion,
            $imagen
        );

        $stmt->execute();

        http_response_code(201);

        echo json_encode([
            "mensaje" => "Servicio creado correctamente",
            "id" => $stmt->insert_id
        ]);

        break;


    case "PUT":

        $id = $_GET["id"] ?? null;

        $datos = json_decode(
            file_get_contents("php://input"),
            true
        );

        if (!$id) {

            http_response_code(400);

            echo json_encode([
                "mensaje" => "ID requerido"
            ]);

            exit;
        }

        $titulo = trim($datos["titulo"] ?? "");
        $descripcion = trim($datos["descripcion"] ?? "");
        $imagen = trim($datos["imagen"] ?? "");

        if (
            empty($titulo) ||
            empty($descripcion) ||
            empty($imagen)
        ) {

            http_response_code(400);

            echo json_encode([
                "mensaje" => "Faltan datos"
            ]);

            exit;
        }

        $stmt = $conexion->prepare(
            "UPDATE servicios
             SET titulo = ?,
                 descripcion = ?,
                 imagen = ?
             WHERE id = ?"
        );

        $stmt->bind_param(
            "sssi",
            $titulo,
            $descripcion,
            $imagen,
            $id
        );

        $stmt->execute();

        echo json_encode([
            "mensaje" => "Servicio actualizado correctamente"
        ]);

        break;


    case "DELETE":

        $id = $_GET["id"] ?? null;

        if (!$id) {

            http_response_code(400);

            echo json_encode([
                "mensaje" => "ID requerido"
            ]);

            exit;
        }

        $stmt = $conexion->prepare(
            "UPDATE servicios
             SET activo = 0
             WHERE id = ?"
        );

        $stmt->bind_param(
            "i",
            $id
        );

        $stmt->execute();

        echo json_encode([
            "mensaje" => "Servicio eliminado correctamente"
        ]);

        break;


    default:

        http_response_code(405);

        echo json_encode([
            "mensaje" => "Método no permitido"
        ]);

         break;
}

$conexion->close();

?>  