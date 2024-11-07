<?php
// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Método no permitido');
}

// Obtener los datos enviados en formato JSON
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Verificar si los datos se decodificaron correctamente
if ($data) {
    // Añadir fecha y hora a los datos
    $data['timestamp'] = date('Y-m-d H:i:s');
    
    // Guardar los datos en el archivo 'locations.txt'
    $file = 'locations.txt';
    $current = file_get_contents($file);
    $current .= json_encode($data) . "\n";
    file_put_contents($file, $current);

    echo 'Ubicación guardada correctamente';
} else {
    echo 'No se pudo obtener la ubicación';
}
?>
