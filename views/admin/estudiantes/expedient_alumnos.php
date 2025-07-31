<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 20px; }
        .table img { border-radius: 5px; }
        .btn-actions { display: flex; gap: 5px; }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center my-4">Lista de Estudiantes</h1>

    <div class="mb-3">
        <a href="?action=expedient_alumnos&subaction=createexpedient" class="btn btn-success">Agregar Estudiante</a>
        <a href="./pdf/export_students_pdf.php" class="btn btn-primary">Exportar PDF</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="table-dark">
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
                    <th>Información Académica</th>
                    <th>Fecha y Lugar de Nacimiento</th>
                    <th>Información de la Madre</th>
                    <th>Información del Padre</th>
                    <th>Documentos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= htmlspecialchars($student['id']) ?></td>
                        <td><?= htmlspecialchars($student['student_nie']) ?></td>
                        <td><?= htmlspecialchars($student['first_name']) ?></td>
                        <td><?= htmlspecialchars($student['last_name']) ?></td>
                        <td><?= htmlspecialchars($student['address']) ?></td>
                        <td><?= htmlspecialchars($student['age']) ?></td>
                        <td><?= htmlspecialchars($student['grade']) ?></td>
                        <td><?= htmlspecialchars($student['phone']) ?></td>
                        <td><?= htmlspecialchars($student['living_with']) ?></td>
                        <td>
                            <?php if (!empty($student['photo_img'])): ?>
                                <img src="uploads/<?= htmlspecialchars($student['photo_img']) ?>" alt="Foto del estudiante" width="150" />
                            <?php else: ?>
                                <span class="text-muted">No disponible</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            N°: <?= htmlspecialchars($student['book_data']['number'] ?? '') ?><br />
                            Libro: <?= htmlspecialchars($student['book_data']['book'] ?? '') ?><br />
                            Folio: <?= htmlspecialchars($student['book_data']['folio'] ?? '') ?><br />
                            Tomo: <?= htmlspecialchars($student['book_data']['tomo'] ?? '') ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($student['date_of_birth']) ?><br />
                            <?= htmlspecialchars($student['place_of_birth']) ?>
                        </td>
                        <td>
                            Nombre: <?= htmlspecialchars($student['parents']['mother']['name'] ?? '') ?><br />
                            Trabajo: <?= htmlspecialchars($student['parents']['mother']['workplace'] ?? '') ?><br />
                            Teléfono: <?= htmlspecialchars($student['parents']['mother']['phone'] ?? '') ?><br />
                            DUI: <?= htmlspecialchars($student['parents']['mother']['dui'] ?? '') ?><br />
                            Estado Civil: <?= htmlspecialchars($student['parents']['mother']['marital_status'] ?? '') ?>
                        </td>
                        <td>
                            Nombre: <?= htmlspecialchars($student['parents']['father']['name'] ?? '') ?><br />
                            Trabajo: <?= htmlspecialchars($student['parents']['father']['workplace'] ?? '') ?><br />
                            Teléfono: <?= htmlspecialchars($student['parents']['father']['phone'] ?? '') ?><br />
                            DUI: <?= htmlspecialchars($student['parents']['father']['dui'] ?? '') ?><br />
                            Estado Civil: <?= htmlspecialchars($student['parents']['father']['marital_status'] ?? '') ?>
                        </td>
                        <td>
                            Cert. Anterior: <?= htmlspecialchars($student['documents']['previous_grade_certificate'] ?? '') ?><br />
                            Cert. Comportamiento: <?= htmlspecialchars($student['documents']['behavior_certificate'] ?? '') ?><br />
                            Copia DUI Tutor: <?= htmlspecialchars($student['documents']['guardian_dui_copy'] ?? '') ?><br />
                            Reg. Financiero: <?= htmlspecialchars($student['documents']['financial_regulations'] ?? '') ?><br />
                           Otros: <?= htmlspecialchars(!empty($student['documents']['other']) ? $student['documents']['other'] : 'No hay información adicional') ?>
                        </td>
                        <td class="btn-actions">
                            <a href="?action=expedient_alumnos&subaction=editeexpedient&id=<?= htmlspecialchars($student['id']) ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="?action=expedient_alumnos&subaction=deleteexpedient&id=<?= htmlspecialchars($student['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este estudiante?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="index.php?action=adminDashboard" class="btn btn-secondary mt-3">Volver al menú</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
