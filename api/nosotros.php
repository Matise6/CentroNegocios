<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../config/database.php";

$metodo = $_SERVER["REQUEST_METHOD"];

switch ($metodo) {

    case "GET":

        $sql = "
            SELECT
                id,
                titulo,
                descripcion1,
                descripcion2,
                descripcion3,
                proposito,
                direccion,
                referencia
            FROM nosotros
            LIMIT 1
        ";

        $resultado = $conexion->query($sql);

        if ($resultado && $resultado->num_rows > 0) {

            $datos = $resultado->fetch_assoc();

            echo json_encode(
                $datos,
                JSON_UNESCAPED_UNICODE
            );

        } else {

            http_response_code(404);

            echo json_encode([
                "mensaje" => "Información no encontrada"
            ]);

        }

        break;


    case "PUT":

        $id = $_GET["id"] ?? 1;

        $datos = json_decode(
            file_get_contents("php://input"),
            true
        );

        $titulo = trim($datos["titulo"] ?? "");
        $descripcion1 = trim($datos["descripcion1"] ?? "");
        $descripcion2 = trim($datos["descripcion2"] ?? "");
        $descripcion3 = trim($datos["descripcion3"] ?? "");
        $proposito = trim($datos["proposito"] ?? "");
        $direccion = trim($datos["direccion"] ?? "");
        $referencia = trim($datos["referencia"] ?? "");

        if (
            empty($titulo) ||
            empty($descripcion1) ||
            empty($descripcion2) ||
            empty($descripcion3) ||
            empty($proposito) ||
            empty($direccion) ||
            empty($referencia)
        ) {

            http_response_code(400);

            echo json_encode([
                "mensaje" => "Faltan datos obligatorios"
            ]);

            exit;
        }

        $stmt = $conexion->prepare(
            "UPDATE nosotros
             SET
                titulo = ?,
                descripcion1 = ?,
                descripcion2 = ?,
                descripcion3 = ?,
                proposito = ?,
                direccion = ?,
                referencia = ?
             WHERE id = ?"
        );

        $stmt->bind_param(
            "sssssssi",
            $titulo,
            $descripcion1,
            $descripcion2,
            $descripcion3,
            $proposito,
            $direccion,
            $referencia,
            $id
        );

        $stmt->execute();

        echo json_encode([
            "mensaje" => "Información actualizada correctamente"
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