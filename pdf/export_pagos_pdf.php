<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php'; // Aquí debe estar la conexión $db
require_once __DIR__ . '/../models/Pago.php';

use Mpdf\Mpdf;

// Crear instancia del modelo con la conexión
$pagoModel = new Pago($db);
$pagos = $pagoModel->getAll();

// Si hay error en la consulta
if (isset($pagos['error'])) {
    die('Error al obtener datos: ' . $pagos['error']);
}

// Comienza a construir el HTML
$html = '<h2 style="text-align:center;">Lista de Pagos</h2>';
$html .= '<table border="1" cellpadding="5" cellspacing="0" style="width:100%; border-collapse: collapse;">';
$html .= '
    <thead style="background-color:#333; color:#fff;">
        <tr>
            <th>ID Pago</th>
            <th>NIE</th>
            <th>Nombre</th>
            <th>Matrícula</th>
            <th>Enero</th>
            <th>Febrero</th>
            <th>Marzo</th>
            <th>Abril</th>
            <th>Mayo</th>
            <th>Junio</th>
            <th>Julio</th>
            <th>Agosto</th>
            <th>Septiembre</th>
            <th>Octubre</th>
            <th>Noviembre</th>
            <th>Diciembre</th>
        </tr>
    </thead>
    <tbody>
';

foreach ($pagos as $pago) {
    $html .= '<tr>';
    $html .= '<td>' . htmlspecialchars($pago['payment_id']) . '</td>';
    $html .= '<td>' . htmlspecialchars($pago['student_nie']) . '</td>';
    $html .= '<td>' . htmlspecialchars($pago['student_name']) . '</td>';
    $html .= '<td>' . htmlspecialchars($pago['tuition']) . '</td>';
    $html .= '<td>' . ($pago['january'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['february'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['march'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['april'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['may'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['june'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['july'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['august'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['september'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['october'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['november'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '<td>' . ($pago['december'] ? 'Pagado' : 'Pendiente') . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody></table>';

// Crear y generar el PDF
try {
    $mpdf = new Mpdf(['utf-8', 'A4-L']); // Horizontal
    $mpdf->WriteHTML($html);
    $mpdf->Output('lista_pagos.pdf', 'I');
} catch (\Mpdf\MpdfException $e) {
    echo 'Error al generar PDF: ' . $e->getMessage();
}
