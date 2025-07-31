<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Registros Médicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .btn-actions {
            display: flex;
            gap: 5px;
        }
        .table th {
            background-color: #007bff !important;
            color: white !important;
        }
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f1f1f1;
        }
        .table-striped tbody tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center my-4">Lista de Registros Médicos</h1>
    <a href="./pdf/export_medical_pdf.php" class="btn btn-danger mb-3">Exportar PDF</a>
    <a href="index.php?action=medicaldata&subaction=createForm" class="btn btn-success mb-3">Nuevo Registro</a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIE Estudiante</th>
                    <th>Enfermedad</th>
                    <th>Medicamento</th>
                    <th>Alergia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicalData as $data): ?>
                    <tr>
                        <td><?= htmlspecialchars($data['id']) ?></td>
                        <td><?= htmlspecialchars($data['student_nie']) ?></td>
                        <td><?= htmlspecialchars($data['disease']) ?></td>
                        <td><?= htmlspecialchars($data['medication']) ?></td>
                        <td><?= htmlspecialchars($data['allergy']) ?></td>
                        <td class="btn-actions">
                            <a href="index.php?action=medicaldata&subaction=editForm&id=<?= $data['id'] ?>" class="btn btn-sm btn-primary">Editar</a>
                            <a href="index.php?action=medicaldata&subaction=deleteMedical&id=<?= $data['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <br>
    <a href="index.php?action=adminDashboard" class="btn btn-secondary">Volver al menú</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
