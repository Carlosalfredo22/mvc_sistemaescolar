<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../models/Estudiante.php';
require_once __DIR__ . '/../config.php'; // carga la conexión $db

use Mpdf\Mpdf;

$model = new Estudiante($db); // usa $db que definiste en config.php
$students = $model->getAll();

$html = '
<h2 style="text-align:center;">Lista de Estudiantes</h2>
<table border="1" cellpadding="6" cellspacing="0" style="width:100%; border-collapse:collapse;">
    <thead style="background-color:#333; color:#fff;">
        <tr>
            <th>ID</th>
            <th>NIE</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Edad</th>
            <th>Grado</th>
            <th>Teléfono</th>
            <th>Viviendo con</th>
            <th>Foto</th>
            <th>Fecha de Nacimiento</th>
            <th>Lugar de Nacimiento</th>
        </tr>
    </thead>
    <tbody>
';

foreach ($students as $student) {
    $html .= '<tr>';
    $html .= '<td>' . htmlspecialchars($student['id']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['student_nie']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['first_name']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['last_name']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['address']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['age']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['grade']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['phone']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['living_with']) . '</td>';

    // --- PROCESAR FOTO ---
    $filename = trim($student['photo_img']);
    $filename = preg_replace('/[^\w\.\-]/', '', $filename); // limpiar caracteres no válidos
    $imgPath = realpath(__DIR__ . '/../uploads/' . $filename);

    // Si no existe o nombre vacío, usar imagen por defecto
    if (!$filename || !$imgPath || !file_exists($imgPath)) {
        $imgPath = realpath(__DIR__ . '/../uploads/default_avatar.png');
    }

    if ($imgPath && file_exists($imgPath)) {
        // Usar ruta absoluta para la imagen
        $html .= '<td><img src="' . $imgPath . '" width="100" height="100" style="object-fit:cover; border-radius:5px;"></td>';
    } else {
        $html .= '<td><span style="color:red;">Sin foto</span></td>';
    }

    $html .= '<td>' . htmlspecialchars($student['date_of_birth']) . '</td>';
    $html .= '<td>' . htmlspecialchars($student['place_of_birth']) . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>';

// --- GENERAR PDF ---
$mpdf = new Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('lista_estudiantes.pdf', 'I'); // Mostrar en navegador
