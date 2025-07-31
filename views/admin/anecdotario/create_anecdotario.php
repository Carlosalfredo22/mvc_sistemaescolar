<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Anécdota</title>
    <link rel="stylesheet" href="./views/assets/Styleanecdotario.css">
</head>
<body>
    <header>
        <h1>Crear Nueva Anécdota</h1>
    </header>
    <div class="container">
        <main>
            <!-- Formulario para crear una anécdota -->
            <form action="?action=anecdotario&subaction=create" method="POST">
                <fieldset>
                <label for="student_nie">NIE Estudiante:</label>
                <select name="student_nie" id="student_nie" required>
                    <option value="">Seleccione un estudiante</option>
                    <?php foreach ($students as $student): ?>
                        <option value="<?= htmlspecialchars($student['student_nie']) ?>">
                            <?= htmlspecialchars($student['student_nie'] . ' - ' . $student['first_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br><br>
                <label for="student_name">Nombre Estudiante:</label>
                <input type="text" id="student_name" name="student_name" required><br><br>

                <label for="faults">Falta:</label>
                <input type="text" id="faults" name="faults" required><br><br>

                <label for="faults_date">Fecha de Falta:</label>
                <input type="date" id="faults_date" name="faults_date" required><br><br>
                </fieldset>
                <button type="submit">Crear Anécdota</button>
            </form>
            <a href="index.php?action=anecdotario">Volver a la lista de anécdotas</a>
        </main>
    </div>
</body>
</html>