<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="./views/assets/StyleProfesor.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom navbar-shadow">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="#">Profesor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="?action=expedient_alumnos"><i class="material-icons">folder</i> Expedientes Alumnos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=anecdotario"><i class="material-icons">book</i> Anecdotario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=medicaldata"><i class="material-icons">health_and_safety</i> Datos Médicos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logout"><i class="material-icons">exit_to_app</i> Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <!-- Bienvenida -->
        <div class="section mt-5" id="index-banner">
            <div class="container text-center">
                <h1 class="display-4">Bienvenido al portal Liceo Cristiano</h1>
            </div>
        </div>

        <center>
            <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']['username']); ?></h2>
        </center>

    <!-- Contenido principal con cards -->
    <div class="container mt-4">
        <div class="row">
            <!-- Card Expedientes Alumnos -->
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-body text-center">
                        <i class="material-icons" style="font-size: 50px; color: #007bff;">folder</i>
                        <h5 class="card-title">Expedientes Alumnos</h5>
                        <p class="card-text">Gestiona los expedientes de los estudiantes.</p>
                        <a href="?action=expedient_alumnos" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Card anecdotario -->
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-body text-center">
                        <i class="material-icons" style="font-size: 50px; color: #007bff;">book</i>
                        <h5 class="card-title">Anecdotario</h5>
                        <p class="card-text">Consulta los anecdotarios de los estudiantes.</p>
                        <a href="?action=anecdotario" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>

            <!-- Card Anecdotario -->
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-body text-center">
                        <i class="material-icons" style="font-size: 50px; color: #007bff;">health_and_safety</i>
                        <h5 class="card-title">Datos Medicos</h5>
                        <p class="card-text">Consulta los datos médicos de los estudiantes.</p>
                        <a href="?action=medicaldata" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <!-- Card Salir -->
            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-body text-center">
                        <i class="material-icons" style="font-size: 50px; color: #dc3545;">exit_to_app</i>
                        <h5 class="card-title">Salir</h5>
                        <p class="card-text">Cerrar sesión y salir del sistema.</p>
                        <a href="index.php?action=logout" class="btn btn-danger">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <footer class="footer footer-shadow">
        <div class="footer-left">
            <img src="./views/assets/LOGO-VERDE-SAULO.png" alt="Logo de la página energía solar">
            <p>&copy; <a href="#">Liceo Cristiano Saulo de Tarso</a></p>
        </div>
        <div class="footer-right">
            <a href="#">Información</a>
            <a href="#">Contáctanos</a>
        </div>
    </footer>
</body>
</html>
