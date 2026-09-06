<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "../config/database.php";

$metodo = $_SERVER["REQUEST_METHOD"];

switch ($metodo) {

    case "GET":

        $sql = "
            SELECT id, pregunta, respuesta
            FROM preguntas_frecuentes
            WHERE activo = 1
            ORDER BY id ASC
        ";

        $resultado = $conexion->query($sql);

        $preguntas = [];

        while ($fila = $resultado->fetch_assoc()) {
            $preguntas[] = $fila;
        }

        echo json_encode(
            $preguntas,
            JSON_UNESCAPED_UNICODE
        );

        break;


    case "POST":

        $datos = json_decode(
            file_get_contents("php://input"),
            true
        );

        $pregunta = trim($datos["pregunta"] ?? "");
        $respuesta = trim($datos["respuesta"] ?? "");

        if (empty($pregunta) || empty($respuesta)) {

            http_response_code(400);

            echo json_encode([
                "mensaje" => "Faltan datos obligatorios"
            ]);

            exit;
        }

        $stmt = $conexion->prepare(
            "INSERT INTO preguntas_frecuentes
            (pregunta, respuesta)
            VALUES (?, ?)"
        );

        $stmt->bind_param(
            "ss",
            $pregunta,
            $respuesta
        );

        $stmt->execute();

        http_response_code(201);

        echo json_encode([
            "mensaje" => "Pregunta creada correctamente",
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

        $pregunta = trim($datos["pregunta"] ?? "");
        $respuesta = trim($datos["respuesta"] ?? "");

        if (empty($pregunta) || empty($respuesta)) {

            http_response_code(400);

            echo json_encode([
                "mensaje" => "Faltan datos"
            ]);

            exit;
        }

        $stmt = $conexion->prepare(
            "UPDATE preguntas_frecuentes
             SET pregunta = ?,
                 respuesta = ?
             WHERE id = ?"
        );

        $stmt->bind_param(
            "ssi",
            $pregunta,
            $respuesta,
            $id
        );

        $stmt->execute();

        echo json_encode([
            "mensaje" => "Pregunta actualizada correctamente"
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
            "UPDATE preguntas_frecuentes
             SET activo = 0
             WHERE id = ?"
        );

        $stmt->bind_param(
            "i",
            $id
        );

        $stmt->execute();

        echo json_encode([
            "mensaje" => "Pregunta eliminada correctamente"
        ]);

        break;


    default:

        http_response_code(405);

        echo json_encode([
            "mensaje" => "Método no permitido"
        ]);
}

$conexion->close();

?>