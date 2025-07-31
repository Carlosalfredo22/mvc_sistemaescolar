<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agregar Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4 text-center">Agregar Nuevo Estudiante</h2>

    <form action="index.php?action=expedient_alumnos&subaction=create" method="POST" enctype="multipart/form-data">
        <h4>Información del Estudiante</h4>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="student_nie" class="form-label">NIE:</label>
                <input type="text" name="student_nie" id="student_nie" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="first_name" class="form-label">Nombre:</label>
                <input type="text" name="first_name" id="first_name" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="last_name" class="form-label">Apellido:</label>
                <input type="text" name="last_name" id="last_name" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="age" class="form-label">Edad:</label>
                <input type="number" name="age" id="age" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="address" class="form-label">Dirección:</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="grade" class="form-label">Grado:</label>
                <input type="text" name="grade" id="grade" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="phone" class="form-label">Teléfono:</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label for="living_with" class="form-label">Viviendo con:</label>
            <input type="text" name="living_with" id="living_with" class="form-control">
        </div>

        <div class="mb-3">
            <label for="photo_img" class="form-label">Foto del estudiante:</label>
            <input type="file" name="photo_img" id="photo_img" class="form-control" accept="image/*" required>
        </div>

        <hr>
        <h4>Información Académica</h4>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="number" class="form-label">Número:</label>
                <input type="text" name="number" id="number" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="book" class="form-label">Libro:</label>
                <input type="text" name="book" id="book" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="folio" class="form-label">Folio:</label>
                <input type="text" name="folio" id="folio" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="tomo" class="form-label">Tomo:</label>
                <input type="text" name="tomo" id="tomo" class="form-control">
            </div>
        </div>

        <hr>
        <h4>Fecha y Lugar de Nacimiento</h4>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date_of_birth" class="form-label">Fecha de nacimiento:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="place_of_birth" class="form-label">Lugar de nacimiento:</label>
                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control">
            </div>
        </div>

        <hr>
        <h4>Información de la Madre</h4>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="mother_name" class="form-label">Nombre:</label>
                <input type="text" name="mother_name" id="mother_name" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="mother_workplace" class="form-label">Lugar de trabajo:</label>
                <input type="text" name="mother_workplace" id="mother_workplace" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="mother_phone" class="form-label">Teléfono:</label>
                <input type="text" name="mother_phone" id="mother_phone" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="mother_dui" class="form-label">DUI:</label>
                <input type="text" name="mother_dui" id="mother_dui" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="mother_marital_status" class="form-label">Estado civil:</label>
                <input type="text" name="mother_marital_status" id="mother_marital_status" class="form-control">
            </div>
        </div>

        <hr>
        <h4>Información del Padre</h4>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="father_name" class="form-label">Nombre:</label>
                <input type="text" name="father_name" id="father_name" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="father_workplace" class="form-label">Lugar de trabajo:</label>
                <input type="text" name="father_workplace" id="father_workplace" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="father_phone" class="form-label">Teléfono:</label>
                <input type="text" name="father_phone" id="father_phone" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="father_dui" class="form-label">DUI:</label>
                <input type="text" name="father_dui" id="father_dui" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="father_marital_status" class="form-label">Estado civil:</label>
                <input type="text" name="father_marital_status" id="father_marital_status" class="form-control">
            </div>
        </div>

        <hr>
        <h4>Documentos Requeridos</h4>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="previous_grade_certificate" class="form-label">Certificado Grado Anterior:</label>
                <input type="text" name="previous_grade_certificate" id="previous_grade_certificate" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="behavior_certificate" class="form-label">Certificado de Comportamiento:</label>
                <input type="text" name="behavior_certificate" id="behavior_certificate" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="guardian_dui_copy" class="form-label">Copia DUI Tutor:</label>
                <input type="text" name="guardian_dui_copy" id="guardian_dui_copy" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="financial_regulations" class="form-label">Reglamento Financiero:</label>
                <input type="text" name="financial_regulations" id="financial_regulations" class="form-control">
            </div>
            <div class="col-md-4">
                <label for="other_documents" class="form-label">Otros:</label>
                <input type="text" name="other_documents" id="other_documents" class="form-control">
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="index.php?action=expedient_alumnos" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">Agregar Estudiante</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
