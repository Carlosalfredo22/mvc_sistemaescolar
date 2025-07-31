<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../models/Anecdotario.php';

use Mpdf\Mpdf;

// Crear instancia del modelo
$anecdotarioModel = new Anecdotario($db);
$anecdotas = $anecdotarioModel->getAll();

// Verifica si hay error
if (isset($anecdotas['error'])) {
    die('Error al obtener anécdotas: ' . $anecdotas['error']);
}

// Construir el HTML para el PDF
$html = '<h2 style="text-align:center;">Lista de Anécdotas</h2>';
$html .= '<table border="1" cellpadding="5" cellspacing="0" style="width:100%; border-collapse: collapse;">';
$html .= '
    <thead style="background-color:#343a40; color:white;">
        <tr>
            <th>ID</th>
            <th>NIE Estudiante</th>
            <th>Nombre</th>
            <th>Falta</th>
            <th>Fecha de Falta</th>
        </tr>
    </thead>
    <tbody>
';

foreach ($anecdotas as $item) {
    $html .= '<tr>';
    $html .= '<td>' . htmlspecialchars($item['anecdote_id']) . '</td>';
    $html .= '<td>' . htmlspecialchars($item['student_nie']) . '</td>';
    $html .= '<td>' . htmlspecialchars($item['student_name']) . '</td>';
    $html .= '<td>' . htmlspecialchars($item['faults']) . '</td>';
    $html .= '<td>' . htmlspecialchars($item['faults_date']) . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>';

// Crear PDF
try {
    $mpdf = new Mpdf(['utf-8', 'A4']);
    $mpdf->WriteHTML($html);
    $mpdf->Output('lista_anecdotas.pdf', 'I'); // 'I' para mostrar en navegador, 'D' para descargar
} catch (\Mpdf\MpdfException $e) {
    echo 'Error al generar el PDF: ' . $e->getMessage();
}
