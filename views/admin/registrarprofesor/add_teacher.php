<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir profesor</title>
    <link rel="stylesheet" href="./views/assets/StyleTeacherListAdd.css"> 
</head>
<body>
    <div class="add-teacher-container">
        <h1>Añadir profesor</h1>
        <form method="post" action="index.php?action=addTeacher">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">registrar</button>
        </form>
        <!-- Si quieres agregar un enlace para cancelar o regresar -->
        <a href="index.php?action=adminDashboard">Volver al menu</a>
    </div>
</body>
</html>
