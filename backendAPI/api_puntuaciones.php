<?php
header("Content-Type: application/json; charset=UTF-8");

$datos = json_decode(file_get_contents("php://input"));

if(isset($datos->jugador) && isset($datos->puntos) && isset($datos->juego)) {
    $conexion = new mysqli("localhost", "retronexus_user", "superpassword", "retronexus_db");
    $stmt = $conexion->prepare("INSERT INTO rtnx_puntuaciones (usuario_nombre, juego_id, puntuacion) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $datos->jugador, $datos->juego, $datos->puntos);

    if($stmt->execute()) {
        echo json_encode(["mensaje" => "Puntuación guardada correctamente."]);
    } else {
        echo json_encode(["error" => "Fallo al guardar en la base de datos."]);
    }
    $stmt->close();
    $conexion->close();
} else {
    echo json_encode(["error" => "Datos incompletos."]);
}
?>