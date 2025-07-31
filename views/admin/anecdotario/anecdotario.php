<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Anécdotas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace al CSS personalizado -->
    <style>
        /* Estilo general */
        body {
            background-color: #f8f9fa; /* Color de fondo suave */
            font-family: Arial, sans-serif;
        }

        /* Título principal */
        h1 {
            color: #343a40; /* Color oscuro */
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Contenedor principal */
        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Tabla */
        .table {
            border-radius: 8px;
            overflow: hidden;
        }

        /* Estilo de botones */
        .btn {
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-warning:hover {
            background-color: #d39e00;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Botón de volver al dashboard */
        .btn-secondary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Lista de Anécdotas</h1>

        <!-- Botón para crear nueva anécdota -->
        <div class="text-end mb-3">
            <a href="index.php?action=anecdotario&subaction=create_anecdotario" class="btn btn-primary">Crear Nueva Anécdota</a>
             <a href="./pdf/export_anecdotas_pdf.php" class="btn btn-danger">Exportar PDF</a>
        </div>

        <!-- Tabla responsiva -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>NIE Estudiante</th>
                        <th>Nombre</th>
                        <th>Falta</th>
                        <th>Fecha de Falta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anecdotas as $anecdota): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($anecdota['anecdote_id']); ?></td>
                            <td><?php echo htmlspecialchars($anecdota['student_nie']); ?></td>
                            <td><?php echo htmlspecialchars($anecdota['student_name']); ?></td>
                            <td><?php echo htmlspecialchars($anecdota['faults']); ?></td>
                            <td><?php echo htmlspecialchars($anecdota['faults_date']); ?></td>
                            <td>
                                <a href="?action=anecdotario&subaction=edit_anecdotario&id=<?= htmlspecialchars($anecdota['anecdote_id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="?action=anecdotario&subaction=deleteanecdotario&id=<?= htmlspecialchars($anecdota['anecdote_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta anécdota?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Botón para volver al Dashboard -->
        <div class="text-center mt-4">
            <a href="index.php?action=adminDashboard" class="btn btn-secondary">Volver al menu</a>
        </div>
    </div>

    <!-- Bootstrap JS (para funciones interactivas como confirmaciones y modals) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
