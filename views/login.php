<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="./views/assets/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="login-container">
         <!-- Logo de la escuela -->
         <img src="./views/assets/LOGO-VERDE-SAULO.png" alt="Logo de la escuela" style="width: 100px; height: auto;">
        <form method="POST" action="index.php">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit">Ingresar</button>
        </form>
        <!-- Si hay un mensaje de error, se muestra aquí -->
        <?php if (isset($error_message)) { ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php } ?>
    </div>


    <?php
    // Si hay un error de login, muestra SweetAlert2
    if (isset($error_message)) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Invalid credentials',
                text: '$error_message',
            });
        </script>";
    }
    ?>
</body>
</html>
