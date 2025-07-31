<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Registro Médico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body { background-color: #f8f9fa; }
        .container { margin-top: 40px; max-width: 600px; }
        .card { padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        .btn-back { margin-top: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center mb-4">Editar Registro Médico</h2>
    <div class="card">
        <form action="index.php?action=medicaldata&subaction=update" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($medicalRecord['id']) ?>" />

            <div class="mb-3">
                <label for="student_nie" class="form-label">Estudiante</label>
                <select name="student_nie" id="student_nie" class="form-select" required>
                    <option value="">Seleccione un estudiante</option>
                    <?php foreach ($students as $student): ?>
                        <option value="<?= htmlspecialchars($student['student_nie']) ?>"
                            <?= $student['student_nie'] === $medicalRecord['student_nie'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="disease" class="form-label">Enfermedad</label>
                <input type="text" class="form-control" id="disease" name="disease" required
                    value="<?= htmlspecialchars($medicalRecord['disease']) ?>" />
            </div>

            <div class="mb-3">
                <label for="medication" class="form-label">Medicamento</label>
                <input type="text" class="form-control" id="medication" name="medication" required
                    value="<?= htmlspecialchars($medicalRecord['medication']) ?>" />
            </div>

            <div class="mb-3">
                <label for="allergy" class="form-label">Alergia</label>
                <input type="text" class="form-control" id="allergy" name="allergy" required
                    value="<?= htmlspecialchars($medicalRecord['allergy']) ?>" />
            </div>

            <button type="submit" class="btn btn-primary w-100">Actualizar Registro</button>
        </form>

        <a href="index.php?action=medicaldata" class="btn btn-secondary btn-back w-100 mt-3">Cancelar y Volver</a>
    </div>
</div>
</body>
</html>
