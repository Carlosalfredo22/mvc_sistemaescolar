<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pagos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .table img {
            border-radius: 5px;
        }
        .btn-actions {
            display: flex;
            gap: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center my-4">Lista de Pagos</h1>

    <div class="mb-3">
        <a href="?action=pagos&subaction=createpagos" class="btn btn-success">Agregar Pago</a>
        <a href="./pdf/export_pagos_pdf.php" class="btn btn-primary">Exportar PDF</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID Pago</th>
                    <th>NIE Estudiante</th>
                    <th>Nombre Estudiante</th>
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
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pagos as $pago): ?>
                    <tr>
                        <td><?= htmlspecialchars($pago['payment_id']) ?></td>
                        <td><?= htmlspecialchars($pago['student_nie']) ?></td>
                        <td><?= htmlspecialchars($pago['student_name']) ?></td>
                        <td><?= htmlspecialchars($pago['tuition']) ?></td>
                        <td><?= $pago['january'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['february'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['march'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['april'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['may'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['june'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['july'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['august'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['september'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['october'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['november'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td><?= $pago['december'] ? 'Pagado' : 'Pendiente' ?></td>
                        <td class="btn-actions">
                            <a href="?action=pagos&subaction=editpago&id=<?= htmlspecialchars($pago['payment_id']) ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?action=pagos&subaction=deletepago&id=<?= htmlspecialchars($pago['payment_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este pago?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <br>

    <a href="index.php?action=adminDashboard" class="btn btn-secondary">Volver al menú</a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
