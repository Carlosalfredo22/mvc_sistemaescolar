<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pago</title>
    <link rel="stylesheet" href="./views/assets/Stylepagos.css">
</head>
<body>
    <header>
        <h1>Editar Pago</h1>
    </header>
    <div class="container">
        <main>
            <form action="?action=pagos&subaction=update" method="POST">
                <fieldset>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($pago['payment_id']); ?>">

                        <label for="student_nie">NIE Estudiante:</label>
                        <select name="student_nie" id="student_nie" required>
                            <option value="">Seleccione un estudiante</option>
                            <?php foreach ($students as $student): ?>
                                <option value="<?= htmlspecialchars($student['student_nie']) ?>" 
                                    <?= ($student['student_nie'] == $pago['student_nie']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($student['student_nie'] . ' - ' . $student['first_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <label for="student_name">Nombre Estudiante:</label>
                        <input type="text" name="student_name" value="<?= htmlspecialchars($pago['student_name']); ?>" required><br>
                </fieldset>
                <fieldset>
                    <label for="manual">Pago Manual</label>
                    <input type="hidden" name="manual" value="0">
                    <input type="checkbox" name="manual" value="1" <?= $pago['manual'] ? 'checked' : ''; ?>><br>

                    <label for="card">Pago con Tarjeta</label>
                    <input type="hidden" name="card" value="0">
                    <input type="checkbox" name="card" value="1" <?= $pago['card'] ? 'checked' : ''; ?>><br>

                    <label for="virtual_classroom">Pago Aula Virtual</label>
                    <input type="hidden" name="virtual_classroom" value="0">
                    <input type="checkbox" name="virtual_classroom" value="1" <?= $pago['virtual_classroom'] ? 'checked' : ''; ?>><br>
                </fieldset>
                <fieldset>
                    <label for="tuition">Matrícula:</label>
                    <input type="number" name="tuition" value="<?= htmlspecialchars($pago['tuition']); ?>" step="0.01" required><br>

                    <label for="january">Enero</label>
                    <input type="hidden" name="january" value="0">
                    <input type="checkbox" name="january" value="1" <?= $pago['january'] ? 'checked' : ''; ?>><br>

                    <label for="february">Febrero</label>
                    <input type="hidden" name="february" value="0">
                    <input type="checkbox" name="february" value="1" <?= $pago['february'] ? 'checked' : ''; ?>><br>

                    <label for="march">Marzo</label>
                    <input type="hidden" name="march" value="0">
                    <input type="checkbox" name="march" value="1" <?= $pago['march'] ? 'checked' : ''; ?>><br>

                    <label for="april">Abril</label>
                    <input type="hidden" name="april" value="0">
                    <input type="checkbox" name="april" value="1" <?= $pago['april'] ? 'checked' : ''; ?>><br>

                    <label for="may">Mayo</label>
                    <input type="hidden" name="may" value="0">
                    <input type="checkbox" name="may" value="1" <?= $pago['may'] ? 'checked' : ''; ?>><br>

                    <label for="june">Junio</label>
                    <input type="hidden" name="june" value="0">
                    <input type="checkbox" name="june" value="1" <?= $pago['june'] ? 'checked' : ''; ?>><br>

                    <label for="july">Julio</label>
                    <input type="hidden" name="july" value="0">
                    <input type="checkbox" name="july" value="1" <?= $pago['july'] ? 'checked' : ''; ?>><br>

                    <label for="august">Agosto</label>
                    <input type="hidden" name="august" value="0">
                    <input type="checkbox" name="august" value="1" <?= $pago['august'] ? 'checked' : ''; ?>><br>

                    <label for="september">Septiembre</label>
                    <input type="hidden" name="september" value="0">
                    <input type="checkbox" name="september" value="1" <?= $pago['september'] ? 'checked' : ''; ?>><br>

                    <label for="october">Octubre</label>
                    <input type="hidden" name="october" value="0">
                    <input type="checkbox" name="october" value="1" <?= $pago['october'] ? 'checked' : ''; ?>><br>

                    <label for="november">Noviembre</label>
                    <input type="hidden" name="november" value="0">
                    <input type="checkbox" name="november" value="1" <?= $pago['november'] ? 'checked' : ''; ?>><br>

                    <label for="december">Diciembre</label>
                    <input type="hidden" name="december" value="0">
                    <input type="checkbox" name="december" value="1" <?= $pago['december'] ? 'checked' : ''; ?>><br>
                </fieldset>
                <input type="submit" value="Actualizar Pago" class="actualizarpago">
            </form>
            <a href="index.php?action=pagos">Volver a pagos</a>
        </main>
    </div>
</body>
</html>