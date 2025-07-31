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
                    <form action="?action=anecdotario&subaction=update" method="POST">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($anecdota['anecdote_id']); ?>">
                     <fieldset>
                            <label for="student_nie">NIE Estudiante:</label>
                            <select id="student_nie" name="student_nie" required>
                                <?php foreach ($students as $student): ?>
                                    <option value="<?php echo htmlspecialchars($student['student_nie']); ?>"
                                        <?php echo ($student['student_nie'] == $anecdota['student_nie']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($student['student_nie'] . " - " . $student['first_name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <br>

                            <label for="student_name">Nombre:</label>
                            <input type="text" id="student_name" name="student_name" value="<?php echo htmlspecialchars($anecdota['student_name']); ?>" required>
                            <br>
                             <!-- Error -->
                            <label for="faults">Falta:</label>
                            <input type="text" id="faults" name="faults" value="<?php echo htmlspecialchars($anecdota['faults']); ?>" required></input>
                            <br>

                            <label for="faults_date">Fecha de Falta:</label>
                            <input type="date" id="faults_date" name="faults_date" value="<?php echo htmlspecialchars($anecdota['faults_date']); ?>" required>
                      </fieldset>
                      <button type="submit">Actualizar</button>
                </form>
                <a href="index.php?action=anecdotario">Cancelar</a>
          </main>
      </div>
</body>
</html>