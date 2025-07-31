<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/Medical.php';

use Mpdf\Mpdf;

$medicalModel = new Medical($db);
$medicalData = $medicalModel->getAll();

if (isset($medicalData['error'])) {
    die("Error al obtener los datos médicos: " . $medicalData['error']);
}

if (empty($medicalData)) {
    die("No hay datos para mostrar.");
}

// Prueba para ver la estructura real:
# var_dump($medicalData);
# exit;

$html = '<h2 style="text-align:center;">Lista de Registros Médicos</h2>';
$html .= '<table border="1" cellpadding="5" cellspacing="0" style="width:100%; border-collapse: collapse;">';
$html .= '<thead style="background-color:#007bff; color:#fff;">';
$html .= '<tr>
            <th>ID</th>
            <th>NIE Estudiante</th>
            <th>Enfermedad</th>
            <th>Medicamento</th>
            <th>Alergia</th>
          </tr>';
$html .= '</thead><tbody>';

foreach ($medicalData as $data) {
    $html .= '<tr>';
    $html .= '<td>' . htmlspecialchars($data['id']) . '</td>';
    $html .= '<td>' . htmlspecialchars($data['student_nie']) . '</td>';
    $html .= '<td>' . htmlspecialchars($data['disease']) . '</td>';
    $html .= '<td>' . htmlspecialchars($data['medication']) . '</td>';
    $html .= '<td>' . htmlspecialchars($data['allergy']) . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>';

ob_clean();

try {
    $mpdf = new Mpdf(['utf-8']);
    $mpdf->WriteHTML($html);
    $mpdf->Output('registros_medicos.pdf', 'I');
} catch (\Mpdf\MpdfException $e) {
    echo "Error al generar PDF: " . $e->getMessage();
}
exit;
