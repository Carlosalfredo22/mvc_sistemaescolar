<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Profesores</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa; /* Fondo suave */
            font-family: 'Arial', sans-serif;
        }

        /* Estilo para el título */
        h1 {
            color: #343a40;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Contenedor principal */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Estilo para la lista de profesores */
        .list-group-item {
            font-size: 1.1rem;
        }

        .btn-danger {
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Botón de Volver al Dashboard */
        .btn-secondary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1>Registros de Profesores</h1>

        <!-- Lista de profesores -->
        <ul class="list-group">
            <?php foreach ($teachers as $teacher): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><?php echo htmlspecialchars($teacher['username']); ?></span>
                    <a href="index.php?action=deleteTeacher&id=<?php echo $teacher['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Botón para volver al Dashboard -->
        <div class="text-center mt-4">
            <a href="index.php?action=adminDashboard" class="btn btn-secondary">Volver al menu</a>
        </div>
    </div>

    <!-- Bootstrap JS (para funciones interactivas como confirmaciones) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
