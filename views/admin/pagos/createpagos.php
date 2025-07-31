<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pago</title>
    <link rel="stylesheet" href="./views/assets/Stylepagos.css">
</head>
<body>
    <header>
        <h1>Agregar Pago</h1>
    </header>
    <div class="container">
        <main>
            <form action="?action=pagos&subaction=create" method="POST">
                <!-- NIE del Estudiante -->

                <!-- Selector para NIE del Estudiante -->
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

                    <!-- Nombre del Estudiante -->
                    <label for="student_name">Nombre Estudiante:</label>
                    <input type="text" name="student_name" id="student_name" required><br><br>
                </fieldset>
                <!-- Tipo de Pago -->
                <fieldset>
                    <label for="manual">Manual:</label>
                    <input type="checkbox" name="manual" id="manual" value="1"><br><br>

                    <label for="card">Tarjeta:</label>
                    <input type="checkbox" name="card" id="card" value="1"><br><br>

                    <label for="virtual_classroom">Aula Virtual:</label>
                    <input type="checkbox" name="virtual_classroom" id="virtual_classroom" value="1"><br><br>
                </fieldset>
                <fieldset>
                    <!-- Matrícula -->
                    <label for="tuition">Matrícula:</label>
                    <input type="number" step="0.01" name="tuition" id="tuition" required><br><br>

                    <!-- Pagos Mensuales -->
                    <label for="january">Enero:</label>
                    <input type="checkbox" name="january" id="january" value="1"><br><br>

                    <label for="february">Febrero:</label>
                    <input type="checkbox" name="february" id="february" value="1"><br><br>

                    <label for="march">Marzo:</label>
                    <input type="checkbox" name="march" id="march" value="1"><br><br>

                    <label for="april">Abril:</label>
                    <input type="checkbox" name="april" id="april" value="1"><br><br>

                    <label for="may">Mayo:</label>
                    <input type="checkbox" name="may" id="may" value="1"><br><br>

                    <label for="june">Junio:</label>
                    <input type="checkbox" name="june" id="june" value="1"><br><br>

                    <label for="july">Julio:</label>
                    <input type="checkbox" name="july" id="july" value="1"><br><br>

                    <label for="august">Agosto:</label>
                    <input type="checkbox" name="august" id="august" value="1"><br><br>

                    <label for="september">Septiembre:</label>
                    <input type="checkbox" name="september" id="september" value="1"><br><br>

                    <label for="october">Octubre:</label>
                    <input type="checkbox" name="october" id="october" value="1"><br><br>

                    <label for="november">Noviembre:</label>
                    <input type="checkbox" name="november" id="november" value="1"><br><br>

                    <label for="december">Diciembre:</label>
                    <input type="checkbox" name="december" id="december" value="1"><br><br>
                </fieldset>
                <button type="submit">Agregar Pago</button>
            </form>
            <a href="index.php?action=pagos">Volver a pagos</a>
        </main>
    </div>
</body>
</html>